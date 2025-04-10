<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Home extends MX_Controller
{

    public function __construct()
    {
    parent::__construct();
    modules::run('web/web_panel_ini/web_ini');
    $this->load->library('form_validation');
    $this->load->helper('aes','custom_helper', 'message_sender');
    }

    public function index()
    {
        //pre($this->session->userdata()); die;
        if (isset($_SESSION['id']) && $_SESSION['new_user'] != 0) {
            $this->session->unset_userdata('redirect_url');
        }
        if (isset($_SESSION['manage_profile_flag'])) {
            $this->session->unset_userdata('manage_profile_flag');
        }
        if($this->session->userdata('new_user')==1){
            $url='updateUserPrefrences';
            $document = array('push_notification'=>'1');
            $res=file_curl_contents($url, $document);
            //if($res["status"]==1){
                $_SESSION['toggels_check'] =1;
            //}
        }
        // if($this->session->userdata('id')!='' && !$this->session->userdata('toggels_check')){
        //     $url1 = "getUserPrefrences";
        //     $document = array();
        //     $toggels = call_curl_by_get_method($url1, $document);
        //     $_SESSION['toggels_check'] = isset($toggels['data']['push_notification'])??0;
        // }

        $view_data['page'] = "dashboard";
        $data['page_title'] = "Dashboard";
        $data['page_data'] = $this->load->view('web/home/dashboard', $view_data, True);
        echo modules::run('web/template/call_default_template', $data);
        matomo_hit('Page', 'View', 'Home');
    }
    

    public function setCookie($cookie_name,$data,$expire_time='86400'){ // one day default
        if($cookie_name){
            if(is_array($data)){
                $cookie_data = base64_encode(json_encode($data));
            } else {
                $cookie_data = base64_encode($data);
            }
            //pre(strlen($session_data_str)); die;
            $sess_cookie_data = array(
                'name'   => $cookie_name,
                'value'  => $cookie_data,
                'expire' => $expire_time, 
            );
            set_cookie($sess_cookie_data);
            return true;
        } else {
            return true;
        }
    }


    public function getCookie($cookie_name){
        $return_data = null;
        if(@get_cookie($cookie_name)){
            $temp_data = get_cookie($cookie_name);
            try{
                $return_data = json_decode(base64_decode($temp_data),true);
            } catch(Exception $e){
                $return_data = base64_decode($temp_data);
            }        
        }
        return $return_data;
    }


    public function getCarouselTime(){
        $time = 10000;
        if($this->input->post()){
            $url = "getMasterHit";
            $data = call_curl_by_get_method($url, $document=array());
            if (isset($data['data']['slider_interval'])) {
                $time = $data['data']['slider_interval'];
            }
        }
        echo json_encode($time);
    }

    public function getSkipableTime(){
        $data = array(
            'status' => false,
            'nskipable_start' => 0,
            'nskipable_end' => 0
        );
        $nskipable_start = 10000;
        if($this->input->post()){
            $url = "getMasterHit";
            $data = call_curl_by_get_method($url, $document=array());
            if (isset($data['data']['nskipable_start']) && isset($data['data']['nskipable_end'])) {
                $data = array(
                    'status' => true,
                    'nskipable_start' => $data['data']['nskipable_start'],
                    'nskipable_end' => $data['data']['nskipable_end']
                );
            }
        }
        echo json_encode($data);
    }

    public function ajax_data()
    {
        //session_write_close();

        $view_data = array();
        $url1 = "getMasterHit";
        $document = array();
        $rented_list = array();
        $view_data['nav_banner'] = call_curl_by_get_method($url1, $document);
        if (isset($view_data['nav_banner']['data']['ageGroup'])) {
            $age = dob_to_age();
            foreach ($view_data['nav_banner']['data']['ageGroup'] as $key => $value) {
                if($age >= $value['minAge'] && $age <= $value['maxAge']){
                    $this->session->set_userdata('age_group',$value['id']);
                    break;
                }
            }
        }
        if (isset($view_data['nav_banner']['data']['resolution'])) {
            if(!empty($view_data['nav_banner']['data']['resolution'])){
                $subs_arr = $all_default = [];
                foreach($view_data['nav_banner']['data']['resolution'] as $each_resolution){ //pre($each_resolution);
                    if(isset($each_resolution['default']) && $each_resolution['default'] == 1 && $each_resolution['platform'] == "website"){
                        $default_resolution = $each_resolution['resolution'];
                        $default_resolution = preg_replace('/\D/', '', $default_resolution); // Removes all non-numeric characters
                        //pre($default_resolution);
                        $this->session->set_userdata("default_resolution",$default_resolution);
                    }
                    if(isset($each_resolution['default']) && $each_resolution['default'] == 1){
                        $all_default[] = $each_resolution;
                    }
                    if($each_resolution['platform'] == "website"){
                        $subs_arr[] = $each_resolution;
                    }
                }
                $this->session->set_userdata("all_resolution",$all_default);
                $this->session->set_userdata('plan_features',$subs_arr);
            }
            
        }
        //die;
        if (isset($view_data['nav_banner']['data'])) {
            // Providers array those binds with PB subscription plan
            if(isset($view_data['nav_banner']['data']['pbpartners'])){
                $this->session->set_userdata('pbpartners',$view_data['nav_banner']['data']['pbpartners']);
            }
            
            foreach ($view_data['nav_banner']['data']['banners'] as $key => $value) {
                if (!in_array($value['id'], $rented_list)) {
                    $rented_list[] = $value['id'];
                }
                $view_data['nav_banner']['data']['banners'][$key]['ids'] = aes_cbc_encryption_($value['id']);
                $view_data['nav_banner']['data']['banners'][$key]['video_ids'] = aes_cbc_encryption_($value['video_id']);
                $view_data['nav_banner']['data']['banners'][$key]['in_watchlist'] = 0;
                $view_data['nav_banner']['data']['banners'][$key]['is_rented'] = 0;
                // $view_data['nav_banner']['data']['banners'][$key]['category_title'] = '';
            }
            
            if ($this->session->id && !empty($rented_list)) {
                $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . join(',', $rented_list);
                $watchList = 'getWatchListById/showIds/' . join(',', $rented_list);
                $rentData = call_curl_by_get_method($rent_url, []);
                $watchListData = call_curl_by_get_method($watchList, []);
                if ($rentData['status'] && !empty($rentData['data'])) {
                    foreach ($view_data['nav_banner']['data']['banners'] as $keys => $value) {
                        if (in_array($value['id'], $rented_list)) {
                            foreach ($rentData['data'] as $rkey => $rvalues) {
                                if ($rvalues['show_id'] == $value['id']) {
                                    $view_data['nav_banner']['data']['banners'][$keys]['is_rented'] = $rvalues['isOnRent'];
                                }
                            }
                        }
                    }
                }
                if ($watchListData['status'] && !empty($watchListData['data'])) {
                    foreach ($view_data['nav_banner']['data']['banners'] as $keys => $value) {
                        if (in_array($value['id'], $rented_list)) {
                            foreach ($watchListData['data'] as $rkey => $rvalues) {
                                if ($rvalues['show_id'] == $value['id']) {
                                    $view_data['nav_banner']['data']['banners'][$keys]['in_watchlist'] = $rvalues['isOnWatchlist'];
                                }
                            }
                        }
                    }
                }
            }
            //pre($view_data['nav_banner']['data']['e-commerce']);
            if(isset($view_data['nav_banner']['data']['e-commerce'])){
                foreach ($view_data['nav_banner']['data']['e-commerce'] as $key => $value) {
                    $meta_info = array(
                        "access_key"=>$value['access_key'],
                        "secret_key"=>$value['secret_key'],
                        "webview_frontend"=>$value['webview_frontend'],
                        "encryption_type"=>"HMAC"
                    );
                    $view_data['nav_banner']['data']['e-commerce'][$key]['redirect_url'] =  $this->get_ondc_redirect_url($meta_info);
                    // $view_data['nav_banner']['data']['banners'][$key]['category_title'] = '';
                }
            }
            foreach ($view_data['nav_banner']['data']['genres'] as $key => $value) {
                $view_data['nav_banner']['data']['genres'][$key]['id'] = aes_cbc_encryption_($value['id']);
                $view_data['nav_banner']['data']['genres'][$key]['title'] = aes_cbc_encryption_($value['title']);
            }
            foreach ($view_data['nav_banner']['data']['content_languages'] as $key => $value) {
                $view_data['nav_banner']['data']['content_languages'][$key]['id'] = aes_cbc_encryption_($value['id']);
                $view_data['nav_banner']['data']['content_languages'][$key]['title'] = aes_cbc_encryption_($value['title']);
            }
            foreach ($view_data['nav_banner']['data']['categories'] as $key => $value) {
                $view_data['nav_banner']['data']['categories'][$key]['ids'] = aes_cbc_encryption_($value['id']);
                $view_data['nav_banner']['data']['categories'][$key]['titles'] = aes_cbc_encryption_($value['title']);
            }
            $this->session->set_userdata('avtar', $view_data['nav_banner']['data']['avatar'] ?? '');
        }
        echo json_encode($view_data);
    }

    public function ajax_data_part1()
    {
        //session_write_close();

        $view_data = array();
        $url2 = "getHomeContent";
        $url3 = "getRecomendationForYou/platform/0";
        $document = array();
        $view_data['home_data'] = call_curl_by_get_method($url2, $document);
        if (!empty($this->session->userdata)) {
            $recommendation_data = call_curl_by_get_method($url3, $document);
            $recommendation = isset($recommendation_data['data'][0]) ? $recommendation_data['data'][0] : [];
            //pre($recommendation);
            if (!empty($recommendation)) {
                $recommendation['recommendation'] = 1;
            }
        }
        if (isset($recommendation) && !empty($recommendation)) {
            array_splice($view_data['home_data']['data'], 1, 0, [$recommendation]);  /// push recommended data to 1 index
        }
        $rented_list = [];
        if (isset($view_data['home_data']['data'])) {
            foreach ($view_data['home_data']['data'] as $keys => $value) {
                if (!isset($view_data['home_data']['data'][$keys]['status'])) {
                    $view_data['home_data']['data'][$keys]['status'] = 1;
                }
                $view_data['home_data']['data'][$keys]['category_id'] = aes_cbc_encryption_(($value['category_id']) ?? 0);
                foreach ($value['shows'] as $key => $values) {
                    if (!in_array($values['id'], $rented_list)) {
                        $rented_list[] = $values['id'];
                    }
                    $view_data['home_data']['data'][$keys]['shows'][$key]['ids'] = aes_cbc_encryption_($values['id']);
                    $view_data['home_data']['data'][$keys]['shows'][$key]['in_watchlist'] = 0;
                    $view_data['home_data']['data'][$keys]['shows'][$key]['is_rented'] = 0;
                    $view_data['home_data']['data'][$keys]['shows'][$key]['video_ids'] = aes_cbc_encryption_($values['video_id']);
                }
            }
        }
        if ($this->session->id && !empty($rented_list)) {
            $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . join(',', $rented_list);
            $rentData = call_curl_by_get_method($rent_url, []);
            $watchList = 'getWatchListById/showIds/' . join(',', $rented_list);
            $watchListData = call_curl_by_get_method($watchList, []);
            if ($rentData['status'] && !empty($rentData['data'])) {
                foreach ($view_data['home_data']['data'] as $keys => $value) {
                    foreach ($value['shows'] as $key => $values) {
                        if (in_array($values['id'], $rented_list)) {
                            foreach ($rentData['data'] as $rkey => $rvalues) {
                                if ($rvalues['show_id'] == $values['id']) {
                                    $view_data['home_data']['data'][$keys]['shows'][$key]['is_rented'] = $rvalues['isOnRent'];
                                }
                            }
                        }
                    }
                }
            }
            if ($watchListData['status'] && !empty($watchListData['data'])) {
                foreach ($view_data['home_data']['data'] as $keys => $value) {
                    foreach ($value['shows'] as $key => $values) {
                        if (in_array($values['id'], $rented_list)) {
                            foreach ($watchListData['data'] as $rkey => $rvalues) {
                                if ($rvalues['show_id'] == $values['id']) {
                                    $view_data['home_data']['data'][$keys]['shows'][$key]['in_watchlist'] = $rvalues['isOnWatchlist'];
                                }
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($view_data);
    }


    public function ajax_data_continue()
    {
        //session_write_close();

        $view_data = array();
        $url3 = "getContinueWatching/lastupdated/0000000000/platform/0";
        $document = array();
        $view_data['continue_watching'] = call_curl_by_get_method($url3, $document);
        echo json_encode($view_data);
    }


    public function ajax_live_data()
    {
        //session_write_close();

        $publisher_id = $this->input->get('publisherId')??0;
        $view_data = call_curl_by_get_method("getLiveEvents/0?publisherId=".$publisher_id."&event=live&event=upcoming", []);
        //$view_data = [];
        if (isset($view_data['data'])) {
            foreach ($view_data['data'] as $key => $value) { 
                $final_data = [];
                foreach($value as $key_1 => $val1){ //pre($key_1);
                    if($key_1 == "id"){
                        $final_data['ids'] = aes_cbc_encryption_($val1);
                    }
                    $final_data[$key_1] = $val1;
                }
                $view_data['data'][$key] = $final_data;
            }
        }
        echo json_encode($view_data);
    }


    public function logout()
    {
        //session_write_close();
        session_unset();
        session_destroy();
        redirect('user-login');
    }



    public function change_content_lang()
    {
        if ($this->input->post()) {
           
           // matomo_hit('Page', 'AppLanguage', 'LanguagePrefrence'.' ( '.$_POST['lang_title'] . ')');
            $lang_id = $_POST['lang_id'];
            $language = strtolower($_POST['lang_title']);
            $lang = array(
                'lang_id' =>  $language,
                'langid' => $lang_id
            );
            $this->session->set_userdata($lang);
            $this->lang->load('landing_home_lang', $language);
            $return_data = ["lang" => $this->lang->line('App-Language-Changed'), "button_text" => $this->lang->line("ok")];
            //session_write_close();
            echo json_encode($return_data);
        }
    }


    public function addFavourites()
    {
        //pre($_POST); die();
        $url = "addFavourites";
        if ($this->input->post('type') == 1) {
            $url = "removeFavourite";
        }

        $document = array(
            'show_id' => $this->input->post('show_id')
        );
        $res = file_curl_contents($url, $document);

        echo json_encode($res);
    }


    public function matomo_hit()
    { 
        if ($_POST['type'] == 2) {
            matomo_content_hit('ContinueWatching', 'Delete', $_POST['title'], 'Deleted', 3);
        }
        if ($_POST['type'] == 4) {
            matomo_content_hit($_POST['user'], $_POST['types'], $_POST['title'], isset($_POST['genres']) ? $_POST['genres'] : '',isset($_POST['check_event']) ? $_POST['check_event'] : '',isset($_POST['search_jao']) ? $_POST['search_jao'] : '');
             return true;
        }

        if ($_POST['type'] == 9) {
            matomo_content_hit($_POST['user'], $_POST['types'], $_POST['title'], isset($_POST['genres']) ? $_POST['genres'] : '', $event = 0);
        } else {
            matomo_hit($_POST['user'], $_POST['types'], $_POST['title'], '',isset($_POST['search_jao']) ? $_POST['search_jao'] : '');
        }
        return true;
    }
    

    public function getWatchlistById()
    {
        if ($this->input->post()) {
        $ids = $this->input->post('ids');
        $ids = implode(",", $ids);
        $url = 'getWatchListById/showIds/'.$ids;
        $data = call_curl_by_get_method($url,array());
        echo json_encode($data);
        }
    }


    public function language()
    {
        //pre($this->session->userdata()); die;
        $view_data = array();
        $data['without_head'] = 1;
        //$view_data['language'] = $this->get_langauges();
        
        //pre($view_data); die;
        $data['page_data'] = $this->load->view('web/home/language', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function ajax_get_all_lang(){
        //session_write_close();

        $status = false; $msg = "Error";
        $url = 'getMasterHit';
        $return_data = [];
        $masterHit_data = call_curl_by_get_method($url, $document = array());
        //pre($masterHit_data); die;
        if(isset($masterHit_data['status']) && $masterHit_data['status'] == true){
            $lang = $masterHit_data['data']['languages'];
            $pages = $masterHit_data['data']['static_pages'];
            $hns = $masterHit_data['data']['help_support']??'';
            $slider_interval = $masterHit_data['data']['slider_interval']??3000;
            $nskipable_start = $masterHit_data['data']['nskipable_start']??0;
            $nskipable_end = $masterHit_data['data']['nskipable_end']??0;
            $return_data = ['lang'=>$lang,'pages'=>$pages,'hns'=>$hns,'sldr'=>$slider_interval,'nskipable_start'=>$nskipable_start,'nskipable_end'=>$nskipable_end];
            $status = true; $msg = "Success";
        }
        echo json_encode(['status'=>$status,'message'=>$msg,'data'=>$return_data]);
    }


    // public function get_langauges(){
    //     $lang = $this->getCookie("lang");
    //     //pre($lang); die;
    //     if(!$lang){
    //         $url = 'getMasterHit';
    //         $masterHit_data = call_curl_by_get_method($url, $document = array());
    //         if(isset($masterHit_data['status']) && $masterHit_data['status'] == true){
    //             $lang = $masterHit_data['data']['languages'];
    //             if(!empty($lang)){
    //                 $this->setCookie("lang",$lang);
    //             }
    //         }
    //     }
    //     return $lang;
    // }

    
    public function provider()
    {
        $id = str_replace(" ", "+", $this->input->get('id'));
        $content_id = aes_cbc_decryption_($id);
        $view_data = array();
        $view_data['id'] = $content_id;
        $data['page_data'] = $this->load->view('web/home/index_new2', $view_data, True);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function index_new()
    {
        if (isset($_SESSION['id']) && $_SESSION['new_user'] != 0) {
            $this->session->unset_userdata('redirect_url');
        }
        $view_data['page'] = "dashboard";
        $data['page_title'] = "Dashboard";

        $data['page_data'] = $this->load->view('web/home/dashboard_new', $view_data, True);
        echo modules::run('web/template/call_default_template', $data);
        matomo_hit('Page', 'View', 'Home');
    }


    public function ajax_data_part()
    {
     
        //session_write_close();

        $tag = $this->input->post('tag')??0;
        $url2 = "getHomeSection/0?publisher_id=0".'&tag='.$tag;
        $document = array();
        $id = $this->input->post('id');
        $live = $this->input->post('live');
        if($id!='true'&& $id!=''){
            $url2 = "getHomeSection/0?publisher_id=".$id.'&tag='.$tag;
        // $url5 =  "subscriptionPlansV2/0/".$id;
        // $getplandata =  call_curl_by_get_method($url5, $document);
        }
        if($id=='true'&& $id!=''){
            $plateform = 0;
            $isKid = ($this->session->userdata('Iskid')) ?? 0;
            $isDefault = $this->session->isDefaults??0;
            $country = $this->session->userdata('country_name')??'India';
            $ageGroup = $this->session->userdata('age_group')??0;
            // $url2 = "getLiveSection/0?publisher_id=0&event=true".'&tag='.$tag;
            $url2 = "getLiveSection/".$plateform."/".$isKid."/".$isDefault."/".$country."/".$ageGroup;
        }
        $view_data = array();
        $url = "getContinueWatching/lastupdated/0000000000/platform/0";
        $url1 = "getSponsorVideo/0";
    
        $url3 = "getRecomendationForYou/platform/0";
        $url4 = "getPublisherByPlaylist?is_home_page=1&page=1";
      
        // pre($getplandata['data']['plans']['0']['pricing']);die;
        $view_data['home_data'] = call_curl_by_get_method($url2, $document);
        $getPublisher =  call_curl_by_get_method($url4, $document);
        $getPublisher = isset($getPublisher['data']) ? $getPublisher['data'] : [];
        //  pre($getPublisher);die;
        if (!empty($this->session->id )) {
            $continue_watching = call_curl_by_get_method($url, $document);
            $recommendation_data = call_curl_by_get_method($url3, $document);
            $recommendation = isset($recommendation_data['data'][0]) ? $recommendation_data['data'][0] : [];


            //pre($recommendation);
            if (!empty($recommendation)) {
                $recommendation['recommendation'] = 1;
            }
        }
        if (isset($recommendation['list']) && !empty($recommendation)) {
            foreach ($recommendation['list'] as $key => $value) {
                $recommendation['list'][$key]['ids'] = aes_cbc_encryption_($value['id']);
            }
           // array_splice($view_data['home_data']['data'], 1, 0, [$recommendation]);  /// push recommended data to 1 index
        }
        // if (isset($getPublisher) && !empty($getPublisher)) {
        //     foreach ($getPublisher as $key => $value) {
        //         $getPublisher[$key]['ids'] = aes_cbc_encryption_($value['id']);
        //     }
        //    // array_splice($view_data['home_data']['data'], 1, 0, [$recommendation]);  /// push recommended data to 1 index
        // }
       // pre($view_data);die("end");
        $rented_list = [];
        if (isset($view_data['home_data']['data'])) {
            foreach ($view_data['home_data']['data'] as $keys => $value) {
                if (!isset($view_data['home_data']['data'][$keys]['status'])) {
                    $view_data['home_data']['data'][$keys]['status'] = 1;
                }
                $view_data['home_data']['data'][$keys]['below_recomendation'] = ($value['below_recomendation']) ?? 0;
                if($view_data['home_data']['data'][$keys]['category_id'] != null && $view_data['home_data']['data'][$keys]['category_id']!=''&& $view_data['home_data']['data'][$keys]['category_id']>0){
                $view_data['home_data']['data'][$keys]['category_id'] = aes_cbc_encryption_(($value['category_id']) ?? 0);
                }
                if($view_data['home_data']['data'][$keys]['genres_id'] != null && $view_data['home_data']['data'][$keys]['genres_id']!=''&& $view_data['home_data']['data'][$keys]['genres_id']>0){
                $view_data['home_data']['data'][$keys]['genres_id'] = aes_cbc_encryption_(($value['genres_id']) ?? 0);
                }
                if($view_data['home_data']['data'][$keys]['publisher_id'] != null && $view_data['home_data']['data'][$keys]['publisher_id']!=''&& $view_data['home_data']['data'][$keys]['publisher_id']>0){
                $view_data['home_data']['data'][$keys]['publisher_ids'] = aes_cbc_encryption_(($value['publisher_id']) ?? 0);
                }
                if($view_data['home_data']['data'][$keys]['tag_id'] != null && $view_data['home_data']['data'][$keys]['tag_id']!=''&& $view_data['home_data']['data'][$keys]['tag_id']>0){
                $view_data['home_data']['data'][$keys]['tag_id'] = aes_cbc_encryption_(($value['tag_id']) ?? 0);
                }
                // $view_data['home_data']['data'][$keys]['genres_id'] = aes_cbc_encryption_(($value['genres_id']) ?? 0);
                // $view_data['home_data']['data'][$keys]['tag_id'] = aes_cbc_encryption_(($value['tag_id']) ?? 0);
                // $view_data['home_data']['data'][$keys]['publisher_ids'] = aes_cbc_encryption_(($value['publisher_id']) ?? 0);
                $ondc = (isset($view_data['home_data']['data'][$keys]['playlist_type_id']) && $view_data['home_data']['data'][$keys]['playlist_type_id'] == "15")?"YES":"NO";
                foreach ($value['list'] as $key => $values) {
                    if($ondc == "YES"){
                        $meta_data = $view_data['home_data']['data'][$keys]['list'][$key]['meta_data'];
                        $view_data['home_data']['data'][$keys]['list'][$key]['redirect_url'] = $this->get_ondc_redirect_url($meta_data);
                    }
                    if (!in_array($values['id'], $rented_list)) {
                        $rented_list[] = $values['id'];
                    }
                    // if(isset($getplandata['data']['plans']['0']['pricing'])&& !empty($getplandata['data']['plans']['0']['pricing']) ){
                    // if( $view_data['home_data']['data'][$keys]['playlist_type_id'] == 2){
                    //     $view_data['home_data']['data'][$keys]['list'][$key]['pricing'] =  $getplandata['data']['plans']['0']['pricing']['0'];
                    // }
                    // }
                    $view_data['home_data']['data'][$keys]['list'][$key]['ids'] = aes_cbc_encryption_($values['id']);
                    $view_data['home_data']['data'][$keys]['list'][$key]['titles'] = aes_cbc_encryption_($values['title']);
                    $view_data['home_data']['data'][$keys]['list'][$key]['in_watchlist'] = 0;
                    $view_data['home_data']['data'][$keys]['list'][$key]['is_rented'] = 0;
                    $view_data['home_data']['data'][$keys]['list'][$key]['video_ids'] = aes_cbc_encryption_(($values['video_id'])??'');
                }
                
                if (isset($recommendation) && !empty($recommendation)) {
                if( $view_data['home_data']['data'][$keys]['playlist_type_id'] == 6){
                    $view_data['home_data']['data'][$keys]['list'] = $recommendation['list'];
                    $view_data['home_data']['data'][$keys]['recommendation'] = $recommendation['recommendation'];

                }
              }
              if (isset($getPublisher) && !empty($getPublisher)) {
                if( $view_data['home_data']['data'][$keys]['playlist_type_id'] == 18 || ($view_data['home_data']['data'][$keys]['playlist_type_id'] == 11 && (isset($view_data['home_data']['data'][$keys]['nature'])) && $view_data['home_data']['data'][$keys]['nature'] == 1)){
                    foreach($getPublisher as $key => $get){
                        // pre($key); pre($get);  pre( $view_data['home_data']['data'][$keys]['id']);echo "ssd";

                        if( $view_data['home_data']['data'][$keys]['id'] == $key ){
                            foreach ($get as $keyp => $value) {
                                $get[$keyp]['ids'] = aes_cbc_encryption_($value['id']);
                            }
                            $view_data['home_data']['data'][$keys]['list'] =  $get;
                        }
                    }
                   
                    
                }
              }
            //   if (isset($continue_watching['data']) && !empty($continue_watching['data'])) {
            //     if( $view_data['home_data']['data'][$keys]['playlist_type_id'] == 3){
            //         $view_data['home_data']['data'][$keys]['list'] = $continue_watching['data'];
            //     }
            // }
            if (isset($view_data['home_data']['data'][$keys]['list']) && empty($view_data['home_data']['data'][$keys]['list'])) {
                if ($view_data['home_data']['data'][$keys]['playlist_type_id'] != 3 && $view_data['home_data']['data'][$keys]['playlist_type_id'] != 12 ) {
                // if (($view_data['home_data']['data'][$keys]['playlist_type_id'] != 3 || !$this->session->id) || $view_data['home_data']['data'][$keys]['playlist_type_id'] != 12) {
                    unset($view_data['home_data']['data'][$keys]);
                }

            }
         }
       
         $view_data['home_data']['data'] = array_values($view_data['home_data']['data']);

        }
        // pre($view_data['home_data']['data']);die;
        $sponser = call_curl_by_get_method($url1, $document);
        if (!empty($sponser)) {
            foreach ($view_data['home_data']['data'] as &$vres) {
                foreach ($sponser['data'] as $sres) {
                    if ($vres['id'] == $sres['playlist_id']) {
                        $newarray = $vres['list'];
                        usort($sres['list'], function ($a, $b) {
                            return $a['position'] <=> $b['position'];
                        });
                        foreach ($sres['list'] as $slist) {
                             $slist['ids'] = aes_cbc_encryption_($slist['show_id']);
                             $slist['id'] = $slist['show_id'];
                             $slist['titles'] = aes_cbc_encryption_($slist['title']);
                             if (isset($slist['position'])) {
                                $position = $slist['position'];
                                if ($position >= count($newarray)) {
                                    $newarray[] = $slist;
                                } else {
                                    array_splice($newarray, $position, 0, [$slist]);
                                }
                            }
                            $inserted = false;                            
                            // foreach ($vres['list'] as $key => &$vlist) {
                            //     if ($key === $slist['position']) {
                            //         array_splice($vres['list'], $key, 0, [$slist]);
                            //         $newarray[] = $slist['position']; 
                            //         $inserted = true;
                            //         break; 
                            //     }
                            // }
                            // if (!$inserted && $slist['position'] >= count($vres['list'])) {
                            //     array_push($vres['list'], $slist);
                            //     $newarray[] = $slist['position'];
                            // }
                        }
                        $vres['list'] = $newarray;
                    }
                }
            }
        }
        
        if ($this->session->id && !empty($rented_list)) {
            $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . join(',', $rented_list);
            $rentData = call_curl_by_get_method($rent_url, []);
            $watchList = 'getWatchListById/showIds/' . join(',', $rented_list);
            $watchListData = call_curl_by_get_method($watchList, []);
            if ($rentData['status'] && !empty($rentData['data'])) {
                foreach ($view_data['home_data']['data'] as $keys => $value) {
               if (isset($value['list']) && is_array($value['list'])) {
                foreach ($value['list'] as $key => $values) {                   
                        if (in_array($values['id'], $rented_list)) {
                            foreach ($rentData['data'] as $rkey => $rvalues) {
                                if ($rvalues['show_id'] == $values['id']) {
                                    $view_data['home_data']['data'][$keys]['list'][$key]['is_rented'] = $rvalues['isOnRent'];
                                }
                            }
                        }
                    }
                }

                }
            }
            if ($watchListData['status'] && !empty($watchListData['data'])) {
                foreach ($view_data['home_data']['data'] as $keys => $value) {
                    if (isset($value['list']) && is_array($value['list'])) {
                    foreach ($value['list'] as $key => $values) {
                        if (in_array($values['id'], $rented_list)) {
                            foreach ($watchListData['data'] as $rkey => $rvalues) {
                                if ($rvalues['show_id'] == $values['id']) {
                                    $view_data['home_data']['data'][$keys]['list'][$key]['in_watchlist'] = $rvalues['isOnWatchlist'];
                                }
                            }
                        }
                    }
                }
                }
            }
        }
        
        // pre($view_data);die;
        
        echo json_encode($view_data);
    }


    private function get_ondc_redirect_url($meta_data){
        //session_write_close();
        $redirect_url = "";
        if(isset($meta_data['secret_key']) && !empty($meta_data['secret_key'])){ //pre($meta_data); die;
            // $meta_data['secret_key'] = "9eae2cd83e4a261ff0048bedfae28227f7818998e34a2a046fc989026016c9e9";
            // $meta_data['access_key'] = "B6F559BA72C826FB198EB3BF2799C";
            // $meta_data['encryption_type'] = "HMAC"; // for testing
            // Format the date as ISO 8601 with 'Z' for UTC timezone
            $date = new DateTime('now', new DateTimeZone('UTC'));
            // Add 20 minutes to the current time
            $date->modify('+20 minutes');
            $formatted_date = $date->format('Y-m-d\TH:i:s.u\Z');

            $FE_url = $meta_data['webview_frontend'];
            $profile_id_encoded = $this->session->userdata('tempuuid');
            if($this->session->userdata('id')){
                if($this->session->userdata('mobile')){

                    $profile_id_encoded = ($this->session->userdata('country_code'))."-".$this->session->userdata('mobile');
                } else {
                    $profile_id_encoded = $this->session->userdata('email');
                }
            }
            $profile_id_encoded = rawurlencode(base64_encode($profile_id_encoded));
            
            $lang = rawurlencode($this->session->userdata('lang_id')??"English");
            $guest_value = rawurlencode(($this->session->userdata('id'))?"Registered":"Guest");
            //timestamp = rawurlencode("2024-09-01T08:13:36Z"); 
            $timestamp = rawurlencode($formatted_date); //"2024-08-26T08:07:33Z";
            //pre($profile_id_encoded); die;

            // Remove trailing slash if it exists
            $cleaned_FE_url = rtrim($FE_url, '/');
            $ondc_base_url = $cleaned_FE_url.'/userId/'.$profile_id_encoded.'/userType/'.$guest_value.'/language/'.$lang.'/accessKey/'.$meta_data['access_key'].'/timestamp/'.$timestamp;
            $enc_type = (isset($meta_data['encryption_type']))?$meta_data['encryption_type']:"HMAC";
            if($enc_type == "HMAC"){
                $hash_token = rawurlencode(base64_encode(hash_hmac("sha256", $ondc_base_url,$meta_data['secret_key'],true)));
            } else {
                $hash_token = rawurlencode(aes_cbc_encryption_games($ondc_base_url,$meta_data['secret_key']));
            }
            //pre($hash_token); die;
            $redirect_url = $ondc_base_url."/hash/".$hash_token;
            //pre($redirect_url); die;
        }
        return $redirect_url;
    }
   
    
    public function getDrmData(){
        //session_write_close();
        $res = array('status'=>false);
        if($this->input->post()){
            $vdcId =(string)$this->input->post('vdcId');
            $mediaId = (int)$this->input->post('mediaId');
            if(!empty($vdcId) && !empty($mediaId)){
                $documents = array(
                    'media_id' => $mediaId,
                    'vdc_id' => $vdcId
                );
                $drmUrl = "createDrmLicense?display=true";
                $data = file_curl_contents($drmUrl, $documents);
                if($data['status'] && !empty($data['data']['file_url']) && !empty($data['data']['token'])){
                    $res = array(
                        'status' => true,
                        'file_url' => $data['data']['file_url'],
                        'token' => $data['data']['token']
                    );
                }
            }
        }
        echo json_encode($res);
    }


    public function notification_toggle(){
        $status = false; $message = "something went wrong";
        //pre($this->input->post());die;
        if($this->input->post()){
            $this->session->set_userdata('toggle_check_set',true);
            $status = true;
            $url='updateUserPrefrences';
            if($this->session->userdata('id')){
                $document = array('push_notification'=>$_POST['toggle_status']);
                $res=file_curl_contents($url, $document);
                //pre($res);
            } 
            if($this->input->post('toggle_status') == true){
                $message = "Notifiocation has been turned-on";
                $this->session->set_userdata('toggels_check',true);
            } else {
                $message = "Notifiocation has been turned-off";
                $this->session->unset_userdata('toggels_check');
            }  
        }
        echo json_encode(['status'=>$status,'message'=>$message,'token'=>base64_encode(json_encode($_SESSION))]);
    }


    public function encode_string_url(){
        $return_string = "";
        // Read the raw input data
        $raw_input = file_get_contents('php://input');
        
        // Decode the JSON input data
        $post_data = json_decode($raw_input, true);
        if(isset($post_data['id'])){
            $id = (int)$post_data['id'];
            $return_string = aes_cbc_encryption_($id);
        }
        echo json_encode(["enc_id"=>$return_string]);
    }


    public function check_version(){
        if ($this->session->userdata('id')) {
            $url = 'activePlan';//'devices';
            $data = call_curl_by_get_method($url,array());
            echo json_encode($data);
        }
    }


    public function create_user_by_ondc(){
        $status = false; $message = "error"; $data = "";
        if (!$this->session->userdata('id')) {
            //pre($this->session->userdata()); die;
            $url = 'authenticateEcomUser';
            $res = file_curl_contents($url,['user_id'=>$this->session->userdata('tempuuid')]);
            //pre($res); die;
            if($res && $res['status'] == true){
                if(isset($res['data']['jwt'])){
                    $status = true; $message = "success";
                    $this->session->set_userdata('jwt',$res['data']['jwt']);
                    $ses_data = array(
                        'username' => $res['data']['user_details']['user_profiles'][0]['username'],
                        'master_name' => $res['data']['user_details']['user_profiles'][0]['username'],
                        'profile_id' => $res['data']['user_details']['user_profiles'][0]['profile_id'],
                        'name' => $res['data']['user_details']['user_profiles'][0]['username'],
                        'Iskid' => $res['data']['user_details']['user_profiles'][0]['is_kid'],
                        'id' => $res['data']['user_details']['id'],
                        'uuid' => $res['data']['user_details']['uuid'],
                        'user_device_info_id' => isset($res['data']['user_details']['user_device_info_id'])?$res['data']['user_details']['user_device_info_id']:"web",
                        'mobile' => isset($res['data']['user_details']['mobile']) ? $res['data']['user_details']['mobile'] : '',
                        'email' => $res['data']['user_details']['email'] ?? "",
                        'login_via' => $res['data']['user_details']['login_via'],
                        'new_user' => $res['data']['user_details']['new_user'],
                        'is_verified' => ($res['data']['user_details']['is_verified'])??0,
                        'pro_img' => $res['data']['user_details']['user_profiles'][0]['profile'],
                        'country_code' => isset($res['data']['user_details']['country_code']) ? $res['data']['user_details']['country_code'] : '',                        'gender' => isset($res['data']['user_details']['gender']) ? $res['data']['user_details']['gender'] : '',
                        'dob' => isset($res['data']['user_details']['dob']) ? $res['data']['user_details']['dob'] : '',
                        'manage_device_flag' => false
                    );
                    if(isset($res['data']['user_details']['uuid'])){
                        $ses_data['ud_id'] = $res['data']['user_details']['uuid'];
                    }
                    $this->session->set_userdata($ses_data);
                    $data = base_url('watching-profile');
                }
            }
        }
        echo json_encode(['status'=>$status,'message'=>$message,"data"=>$data]);
    }


    public function decode_hash(){
        //pre($this->input->get()); die;
        $url = $this->input->get('url');
        $key = $this->input->get('key')??'9eae2cd83e4a261ff0048bedfae28227f7818998e34a2a046fc989026016c9e9';
        $sha = ($this->input->get('sha')=="yes")?true:false;
        $sha = false;
        if($url != ""){
            try{
                echo "<p style='max-width: 100vw;    box-sizing: border-box; overflow-wrap: break-word;'><br><b>FInal url :- </b>".$url;
                // Parse the URL
                $parsed_url = parse_url($url);
                $path = $parsed_url['path'];
                
                
                $path_parts = explode('/hash/', $path);
                $hash_value = isset($path_parts[1]) ? $path_parts[1] : '';
                echo "<br><br><b>Hash Value :- </b>".$hash_value;
                if(strlen(base64_decode($hash_value)) == "64"){
                    echo "<br><br><b>Encoder :- </b>HMAC";
                    echo "<br><br><b>Key :- </b>".$key;
                } else {
                    echo "<br><br><b>Encoder :- </b>AES";
                    echo "<br><br><b>Key :- </b>".$key;
                    $enc_hash_string = aes_cbc_decryption_games($hash_value,$key,$sha,true);
                    echo "<br><br><b>Decoded Hash :- </b>".$enc_hash_string;
                }                
            } catch(Exeception $e){
                pre($e);
            }
        } else {
            echo "Please provide valid url";
        }

    }


    public function app_in_list()
    {
        $view_data = array();
        $data['without_head'] = 1;
        //$view_data['app_in_list'] = $this->get_langauges();
        
        //pre($view_data); die;
        $data['page_data'] = $this->load->view('web/home/app_in_list', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function getPublisherData(){
        ////session_write_close();
        $data = array('status'=>false, 'message'=>'something went wrong', 'data'=>[]);
        if($this->input->post()){
            $is_home_page = $this->input->post('is_home_page')??0;
            $id = $this->input->post('id')??'';
            $page = $this->input->post('page')??1;
            if($page){
                $url = 'getPublisherByPlaylist?playlist_id='. $id.'&is_home_page='.$is_home_page.'&page='.$page;
                $document = [];
                $data = call_curl_by_get_method($url, $document);
                // pre($data);die;
                $data['url']=$url;
                if (isset($data['data']) && !empty($data)) {
                    foreach ($data['data'] as $key => $value) {
                        $data['data'][$key]['ids'] = aes_cbc_encryption_($value['id']);
                    }
                   // array_splice($view_data['home_data']['data'], 1, 0, [$recommendation]);  /// push recommended data to 1 index
                }
                $data['response']=$data['data'];
            }
        }
        echo json_encode($data);
    }


    public function live_events()
    {
        $view_data = array();
        $data['without_head'] = 1;
        //$view_data['app_in_list'] = $this->get_langauges();
        
        //pre($view_data); die;
        $data['page_data'] = $this->load->view('web/home/live_events', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function primary(){
        if($this->input->post()){
            $this->form_validation->set_rules('passKey', 'Pass Key', 'required|alpha_numeric|min_length[5]|max_length[10]');
            if($this->form_validation->run()){
                $referer = $this->input->post('referer');
                $passKey = $this->input->post('passKey');
                if($passKey == '9721abcd' || $passKey == '1234abc'){
                    setcookie('passKey',$passKey,time() + 31536000);
                    $this->session->set_userdata('passKey',$passKey);
                    redirect(base_url());die;
                }
            }            
        }
        $referer = $this->input->server('HTTP_REFERER')??base_url();
        $view_data = array();
        $view_data['referer'] = $referer;
        $data['without_head'] = 1;
        //$view_data['app_in_list'] = $this->get_langauges();
        
        //pre($view_data); die;
        $data['page_data'] = $this->load->view('web/home/primary', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function getShorts(){
        ////session_write_close();
        $res = array(
            'status' => false,
            'data' => [],
            'totalCount' => 0,
            'itemsPerPage' => 0,
            'stillDataRemains' => false
        );
        if($this->input->post()){
            $page = $this->input->post('page')??1;
            $limit = $this->input->post('limit')??1;
            $feedType = $this->input->post('feedType')??'ALL';
            $count = 0;
            $itemsPerPage = 0;
            $stillDataRemains = true;
            $items = [];
            while($count <= $limit){
                $url = 'getHomeRecomendation/tag/'.$feedType.'/page/'.$page.'/platform/3/userId/'.($this->session->id??'');
                $data = call_curl_by_get_method($url, []);
                if($data['status'] && !empty($data['data'])){
                    if($count == 0){
                        foreach ($data['data'] as $key => $value) {
                            $count += 1;
                            $value['enc_id'] = aes_cbc_encryption_($value['id']);
                            $items[] = $value;
                        }
                        $itemsPerPage = $count;
                    }else{
                        foreach ($data['data'] as $key => $value) {
                            $count += 1;
                            $value['enc_id'] = aes_cbc_encryption_($value['id']);
                            $items[] = $value;
                        }
                    }                    
                    $page += 1;
                }else{
                    $stillDataRemains = false;
                    break;
                }
            }
            if($count > 0){
                $res = array(
                    'status' => true,
                    'data' => $items,
                    'totalCount' => $count,
                    'itemsPerPage' => $itemsPerPage,
                    'stillDataRemains' => $stillDataRemains
                );
            }         
        }
        echo json_encode($res);
    }


    public function countArray($array) {
        $count = 0;
        foreach ($array as $item) {
            // If the item is an array, count its elements recursively
            if (is_array($item)) {
                $count += count($item);
            } else {
                $count++;
            }
        }
        return $count;
    }
    
}

