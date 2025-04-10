<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Player extends MX_Controller
{
    //$this->redis_magic='';
    function __construct()
    {
        parent::__construct();
        modules::run('web/web_panel_ini/web_ini');
        $this->load->helper(array('aes', 'url', 'custom', 'custom_helper', 'message_sender'));
        $this->load->library(array('form_validation', 'MatomoTracker'));
        $this->load->library('session');
        $this->load->model('Page_model');
        header("Access-Control-Allow-Origin: *");
        // $this->redis_magic = new Redis_magic();
    }

    public function playMedia()
    {
        $episode_id_str = $this->input->get('id');
        $adParams = [];
        $adEnabled = false;
        $type = $this->input->get('type');
        $type_str = $this->input->get('type');
        $dur = $this->input->get('dur') ?? '';
        if (empty($episode_id_str)) {
            show_404();
            die;
        }
        $redirtct = ($this->session->userdata('redirect')) ?? 0;
        $this->session->unset_userdata('redirect');
        $max_res = $this->session->userdata('max_quality')?? DEFAULT_RESOLUTION;
        $view_data['max_res'] = $max_res;
        $episode_id = str_replace(" ", '+', $episode_id_str);
        $view_data['urlencrypted_id'] = $episode_id_str;
        $types = str_replace(" ", '+', $type_str);
        $episode_id = aes_cbc_decryption_($episode_id);
        $types = aes_cbc_decryption_($types);
        unset($_SESSION['redirect_url']);
       // $url1 = "getContentDetail?id=" . $episode_id;
       $url1 = "getContentDetails/" . $episode_id;
       $content_details = call_curl_by_get_method($url1, $document = array());
          if(!$content_details['status']){
            redirect(base_url('no-data'));die;
            // $this->session->set_flashdata('msg_status', "400");
            // $this->session->set_flashdata('toast_msg', $content_details['message']);
            // $referer = $this->input->server('HTTP_REFERER');
            // if ($referer) {
            //     redirect($referer);
            // } else {
            //     redirect(base_url());
            // }
           }
           if ($content_details['status']) {
            if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid']==2) ) {
                $referer = $this->input->server('HTTP_REFERER');
                if(!$this->session->id){
                 $this->session->set_userdata('redirect_url', $referer);
                 redirect('user-login');die;
                }

            }
        }
           $video_id = 0;
            if ($content_details['status']) {
                if (isset($content_details['data']['season'][0]) && !empty($content_details['data']['season'][0])) {
                    $v_id = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) {
                        return ($var['is_trailer'] == '0');
                    }));
                    $video_id = ($v_id[0]['id']) ?? 0;
                }
            }
            
            $isSubscribed = SUBSCRIPTION_CHECK;
            $show_ads = $this->session->userdata('show_ads')??true;
            if (isset($content_details['data']['owned_by'])) {
                if ($content_details['data']['owned_by'] > 0) {
                    $constantName = 'SUBSCRIPTION_CHECK' . "_" .$content_details['data']['owned_by'];
                    if (defined($constantName)) {
                        $isSubscribed = constant($constantName);
                    }else{
                        $isSubscribed = 0;
                    }
                    if($isSubscribed == 1){
                        $show_ads = false; 
                    }
                }
            }
            $chkparam = '?display=false';
            if($show_ads == false){
                $chkparam = '?display=true';      
            }
            $view_data['encrypted_id'] = aes_cbc_encryption_($video_id);
            $url =  "getVideoUrl/" . $video_id.$chkparam;
            $document2 = array('video_id' => $video_id);
            $document = array();
            $video_details = call_curl_by_get_method($url, $document);
            if(isset($video_details['data']['is_free'])){
                if($video_details['data']['free_episode']!=1 && ($video_details['data']['is_free']==0 || ($video_details['data']['is_free']==1 && $video_details['data']['free_time']<5))){
                    $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $referer = $this->input->server('HTTP_REFERER');
                    if(!$this->session->id){
                     $this->session->set_userdata('redirect_url', $redirect_url);
                     redirect('user-login');die;
                    }
                }
            }
            if(!isset($video_details['data']) || empty($video_details['data'])){
                redirect(base_url('no-data'));die;
            }
            if(!$video_details['status'] && isset($video_details['data']['is_paid'])){
                if($video_details['data']['is_paid'] == 1){
                    redirect(base_url('subscription?publisherid='.($content_details['data']['owned_by']??0)));die;
                }
                $this->session->set_flashdata('msg_status', "400");
                $this->session->set_flashdata('toast_msg', $video_details['message']);
                $referer = $this->input->server('HTTP_REFERER');
                if ($referer) {
                    redirect($referer);die;
                } else {
                    redirect(base_url());die;
                }
            }
            $video_details['data']['header'] = 'pallycon-customdata-v2';
            if(isset($video_details['data']['ad_enable'])){
                if($video_details['data']['ad_enable']==1){
                    $adEnabled = true;
                }
            }
            

                 //pre($content_details);die;
                //  pre($isSubscribed);die("palymedia");

           if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid'] == 1) && !$isSubscribed) {
            $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $this->session->set_userdata('redirect_url', $redirect_url);
          //  if ($this->session->id) {
                redirect('subscription');
                die;
           // } else {
              //  redirect('user-login');
              //  die;
           // }
        } else if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid'] == 2)) {
            // $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . $video_details['data']['show_id'];
    
            // $rentData = call_curl_by_get_method($rent_url, []);
            // // pre($rentData);
            // // die;
            // if ($this->session->id) {
            //     $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . $video_details['data']['show_id']??0;
            //     $rentData = call_curl_by_get_method($rent_url, []);
            //     if ($rentData['status'] && !empty($rentData['data'])) {
            //         foreach ($rentData['data'] as $key => $value) {
            //             if ($value['show_id'] == $video_details['data']['id']) {
            //                 $video_details['data']['is_rented'] = $value['isOnRent'];
            //             }
            //         }
            //     }
            // }
            if(!($video_details['status']) || !($content_details['status'])){
                $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $referer = $this->input->server('HTTP_REFERER');
                if(!$this->session->id){
                 $this->session->set_userdata('redirect_url', $referer);
                 redirect('user-login');die;
                }
                $this->session->set_flashdata('msg_status', "300");
                if(!($video_details['status'])){
                    $this->session->set_flashdata('toast_msg', $video_details['message']);
                    redirect($referer);die;
                }else if(!($content_details['status'])){
                    $this->session->set_flashdata('toast_msg', $content_details['message']);
                    redirect($referer);die;

                }
                // if ($referer) {
                //     redirect($referer);
                // } else {                   
                //     redirect(base_url());
                // }
            }
            if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid'] == 2 && ($video_details['status']) && !isset($video_details['data']['title']))) {            
                    $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $referer = $this->input->server('HTTP_REFERER'); 
                    if($this->session->id) {
                 //   $this->session->set_userdata('redirect_url', $redirect_url);
                    $this->session->set_flashdata('msg_status', "300");
                    $this->session->set_flashdata('toast_msg', $this->lang->line('available_on_rent'));
                    if ($referer) {
                        redirect($referer);
                    } else {
                       
                    redirect(base_url());
                    }
                   
                } else {
                    $this->session->set_userdata('redirect_url',  $referer);
                   // pre($_SESSION);die;
                    redirect('user-login');
                    die;
                }
            }
        }
    //     if($this->session->id){
    //     if (!($video_details['status']) || !($content_details['status']) || ($this->session->userdata('Iskid') != $content_details['data']['is_child'])) {
    //         redirect(base_url('/')); //die;
    //     }
    //    }
        $content_id = $video_details['data']['show_id'] ?? 0;
        // $url1 = "getContentDetail?id=" . $content_id;
        // $content_details = call_curl_by_get_method($url1, $document);
        $time = time();
        if ($types == 'continue_watching') {
            matomo_content_hit('ContinueWatching', 'Select', $episode_id . '/' . $content_details['data']['title'] . '/' . $time, $content_details['data']['genres']);
        }
        if ($types == 'watchlist') {
            matomo_content_hit('Watchlist', 'Play', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
        }
        if ($types == 'next') {
            matomo_content_hit('Audio', 'Next', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
        }
        if ($types == 'prev') {
            matomo_content_hit('Audio', 'Previous', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
        }
        if ($type_str == 'banners') {
            matomo_content_hit('Banners', 'WatchNow', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
        }
        if ($types == 'next') {
            matomo_content_hit('Audio', 'Next', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
        }
        if ($types == 'prev') {
            matomo_content_hit('Audio', 'Previous', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
        }

        $view_data['episode_id'] = $episode_id;
        $view_data['dur'] = $dur;
        $view_data['content_details'] = $content_details;
        if (isset($video_details['error']) && $video_details['error'] == '100100') {
            $this->logout();
        }
        $vdc_id = $video_details['data']['vdc_id'] ?? '';
        if (isset($video_details['data']['is_drm_protected']) && $video_details['data']['is_drm_protected'] == 1 && ($content_details['data']['owned_by']==0)) {
            $documents = array('media_id' => $video_details['data']['id'] ?? '', 'vdc_id' => $vdc_id);
            $urls = "createDrmLicense".$chkparam.'';
            $url  = file_curl_contents($urls, $documents);
            $video_details['data']['file_url'] = ($url['data']['file_url']) ?? '';
            $video_details['data']['player_params'] = ($url['data']['player_params']) ?? $video_details['data']['player_params'];
            $video_details['data']['token'] = ($url['data']['token']) ?? '';
        }
        if(isset($video_details['data']['player_params']) && !empty($video_details['data']['player_params'])){
            if(!isset($video_details['data']['ad_enable'])){
                $adEnabled = true;
            }
            if(in_array('os',$video_details['data']['player_params'])){
                $adParams['os'] = '4';
            }
            if(in_array('ai',$video_details['data']['player_params'])){
                $adParams['ai'] = adAI??'sb.wavespb.com';
            }
            if(in_array('trq',$video_details['data']['player_params'])){
                $milliseconds = round(microtime(true) * 1000);
                $adParams['trq'] = (string)$milliseconds;
            }
            if(in_array('dt',$video_details['data']['player_params'])){
                $adParams['dt'] = '4';
            }
            if(in_array('vmi',$video_details['data']['player_params'])){
                $adParams['vmi'] = 'web';
            }
            if(in_array('asi',$video_details['data']['player_params'])){
                $adParams['asi'] = 'web';
            }
            if(in_array('prerollasi',$video_details['data']['player_params'])){
                $adParams['prerollasi'] = 'web';
            }
            if(in_array('gn',$video_details['data']['player_params'])){
                $adParams['gn'] = (string) $this->session->gender??'male';
            }
            if(in_array('ag',$video_details['data']['player_params'])){
                $adParams['ag'] = (string) $this->session->age??'';
            }
            if(in_array('ifa',$video_details['data']['player_params'])){
                $adParams['ifa'] = '';
            }
            if(in_array('vid_d',$video_details['data']['player_params'])){
                $adParams['vid_d'] = (string) ($video_details['data']['video_duration']??0);
            }
            if(in_array('cvl',$video_details['data']['player_params'])){
                $adParams['cvl'] = (string) ($video_details['data']['video_duration']??0);
            }
            if(in_array('contentpartner',$video_details['data']['player_params'])){
                $adParams['contentpartner'] = $video_details['data']['content_partner_key']??'';
            }                
            if(in_array('description_url',$video_details['data']['player_params'])){
                $fullUrl = $this->get_current_url();
                $description_url = urlencode($fullUrl);
                $adParams['description_url'] = $description_url;
            }
            if(in_array('ctid',$video_details['data']['player_params'])){
                $adParams['ctid'] = (string) $video_details['data']['id']??0;
            }
            if(in_array('ctype',$video_details['data']['player_params'])){
                $adParams['ctype'] = 'VOD';
            }
            if(in_array('shnm',$video_details['data']['player_params'])){
                $adParams['shnm'] = (string) ($content_details['data']['title']??'');
            }
            if(in_array('cttitle',$video_details['data']['player_params'])){
                $adParams['cttitle'] = (string) ($video_details['data']['title']??'');
            }
            if(in_array('gnr',$video_details['data']['player_params'])){
                $adParams['gnr'] = (string) ($content_details['data']['genres']??'');
            }
            if(in_array('iskp',$video_details['data']['player_params'])){
                $adParams['iskp'] = (string) ($this->session->Iskid??'');
            }
            if(in_array('lang',$video_details['data']['player_params'])){
                $adParams['lang'] = (string) $content_details['data']['language_title']??'';
            }
            //$adParams = json_encode($adParams);
        }
        $tracking_params = $video_details['data']['tracking_params']??[];
        $tracking_params_prefix = $video_details['data']['tracking_params_prefix']??'md_';
        $queryParams = [];
        foreach ($tracking_params as $key) {
            if (strpos($key, $tracking_params_prefix) === 0) {
                $originalKey = substr($key, 3);
                $apnd_key = '';          
            }else{
                $originalKey = $key;
                $apnd_key = $tracking_params_prefix;
            }
            if (isset($adParams[$originalKey])) {
                $queryParams[$apnd_key.$key] = $adParams[$originalKey];
            }
        }
        $queryParams = http_build_query($queryParams);
        $view_data['queryParams'] = $queryParams;
        $view_data['adParams'] = json_encode($adParams);
        $view_data['types'] = $types??'' ;

        $bandwidth = array();
        //if (!$this->session->DeviceType) {
            $browser = detectBrowser();
            $this->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 2);
            $DeviceType = $browser['DeviceType'];
        // } else {
        //     $DeviceType = $this->session->DeviceType;
        // }
        $view_data['DeviceType'] = $DeviceType;
        $video_details['data']['licenceUrl'] = BASEURLAPI.BASEVERSION.'onRequestCreateVideoLicense';
        $video_details['data']['fairplayUrl'] = 'https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId='.SITE_ID;
        
        if(isset($content_details['data']['owned_by']) && $content_details['data']['owned_by'] > 0){
            $url = $content_details['data']['website_url'];
            $contentId = 0;
            if ($content_details['status']) {
                if (isset($content_details['data']['season'][0]) && !empty($content_details['data']['season'][0])) {
                    $v_id = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) {
                        return ($var['is_trailer'] == '0');
                    }));
                    $contentId = ($v_id[0]['contentId']);
                }
            }
            $apiKey = !empty($content_details['data']['access_key'])?$content_details['data']['access_key']:'UdRFvK66uiA7IjRLE3liwTG9';
            $document = array(
                "contentId"=>$contentId
            );
            $publisherid =$content_details['data']['owned_by'];
            $partenerData = $this->get_partener_content($contentId, $publisherid);
            if ($partenerData) {
                $format = ($DeviceType == 2) ? 'HLS' : 'DASH';
                if (isset($partenerData[$format]) && !empty($partenerData[$format]['url'])) {
                    $video_details['data']['file_url'] = $partenerData[$format]['url'];
                    if(!empty($partenerData[$format]['licenceUrl'])){
                        $video_details['data']['licenceUrl'] = $partenerData[$format]['licenceUrl'];
                    }
                    $video_details['data']['token'] = $partenerData[$format]['token'] ?? $video_details['data']['token'];
                    if($partenerData[$format]['identifier']=='lionsgate'){
                        $adEnabled = false;
                        $video_details['data']['header'] = 'X-VUDRM-TOKEN';
                    }
                    if ($format === 'HLS') {
                        $video_details['data']['fairplayUrl'] = $partenerData[$format]['certificateUrl'] ?? null;
                    }
                }
            }
        }
        $view_data['video_details'] = $video_details;
        $view_data['adEnabled'] = $adEnabled;
        $view_data['isSubscribed'] = $isSubscribed;
        $view_data['video_details']['data']['redirtct'] = $redirtct;
        if (isset($video_details['data']['media_type']) && ($video_details['data']['media_type']) == 1) {
            $lastSlashPos = strrpos($view_data['video_details']['data']['file_url'], '/');
            $baseurl = substr($view_data['video_details']['data']['file_url'], 0, $lastSlashPos + 1);
            $view_data['baseurl'] = $baseurl;
            $data['without_head'] = 1;
            //  matomo_hit('Audio', 'Start', $view_data['video_details']['data']['title']);

            $data['page_data'] = $this->load->view('web/player/audio', $view_data, true);
        } else {
            if (isset($video_details['data']['is_drm_protected']) && ($video_details['data']['is_drm_protected']) == 1) {
                $data['without_head'] = 1;
                $data['page_data'] = $this->load->view('web/player/play_episode_hls', $view_data, true);
            } else {
                $data['without_head'] = 1;
                $data['page_data'] = $this->load->view('web/player/play_episode_hls', $view_data, true);
            }
        }
        echo modules::run('web/template/call_default_template', $data);
    }

    public function get_current_url(){
        $current_url = current_url();
        $query_string = $_SERVER['QUERY_STRING'];
        $full_url = $query_string ? $current_url . '?' . $query_string : $current_url;
        return $full_url;
    }

    public function play()
    {

        $adParams = [];
        $adEnabled = false;
        $episode_id_str = $this->input->get('id');
        $type_str = $this->input->get('type');
        $dur = $this->input->get('dur') ?? '';
        $view_data['dur'] = $dur;
        if (empty($episode_id_str)) {
            show_404();
            die;
        }
        $redirtct = ($this->session->userdata('redirect')) ?? 0;
        $this->session->unset_userdata('redirect');
        unset($_SESSION['redirect_url']);
        $episode_id = str_replace(" ", '+', $episode_id_str);
        $types = str_replace(" ", '+', $type_str);
        $view_data['encrypted_id'] = $episode_id;
        $episode_id = aes_cbc_decryption_($episode_id);
        $types = aes_cbc_decryption_($types);
        //pre($episode_id);die('sss');
        // pre($content_details);die;
        $isSubscribed = SUBSCRIPTION_CHECK;
        $show_ads = $this->session->userdata('show_ads')??true;
        if (isset($content_details['data']['owned_by'])) {
            if ($content_details['data']['owned_by'] > 0) {
                $constantName = 'SUBSCRIPTION_CHECK' . "_" .$content_details['data']['owned_by'];
                if (defined($constantName)) {
                    $isSubscribed = constant($constantName);
                }else{
                    $isSubscribed = 0;
                }
                if($isSubscribed == 1){
                    $show_ads = false; 
                }
            }
        }
        $chkparam = '?display=false';
        if($show_ads==false){
          $chkparam = '?display=true';      
        }

        $url =  "getVideoUrl/" . $episode_id.$chkparam;
        $document2 = array('video_id' => $episode_id);
        $document = array();
        $video_details = call_curl_by_get_method($url, $document);
        if( isset($video_details['data']['is_free'])){
            if((isset($video_details['data']['free_episode']) && ($video_details['data']['free_episode']!=1) && ($video_details['data']['is_free']==0 ||($video_details['data']['is_free']==1 && $video_details['data']['free_time']<5)))){
                $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $referer = $this->input->server('HTTP_REFERER');
                if(!$this->session->id){
                 $this->session->set_userdata('redirect_url', $redirect_url);
                 redirect('user-login');die;
                }
            }

        }
        if(!isset($video_details['data']) || empty($video_details['data'])){
            redirect(base_url('no-data'));die;
        }
        if(isset($video_details['data']['ad_enable'])){
            if($video_details['data']['ad_enable']==1){
                $adEnabled = true;
            }
        }
        $video_details['data']['header'] = 'pallycon-customdata-v2';
        
        $view_data['urlencrypted_id'] = aes_cbc_encryption_($video_details['data']['show_id'] ?? 0);
        // pre($video_details);
        // die;
        if(!($video_details['status'])&& $video_details['data']['is_paid']==2 || !($video_details['status'])&& $video_details['data']['is_paid']==1){
            $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $referer = $this->input->server('HTTP_REFERER');
            $this->session->set_flashdata('msg_status', "300");
            if(!($video_details['status'])){
                $this->session->set_flashdata('toast_msg', $video_details['message']);
            }
            if ($referer) {
                redirect($referer);
            } else {                   
                redirect(base_url());
            }
        }
   
        if (isset($video_details['data']['is_paid']) && ($video_details['data']['is_paid'] == 1) && ! $isSubscribed) {
            $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $this->session->set_userdata('redirect_url', $redirect_url);
        //  if ($this->session->id) {
                redirect('subscription?publisherid='.($content_details['data']['owned_by']??0));
                die;
        // } else {
            //  redirect('user-login');
            //  die;
        // }
        } else if (isset($video_details['data']['is_paid']) && ($video_details['data']['is_paid'] == 2)) {
            if (isset($video_details['data']['is_paid']) && ($video_details['data']['is_paid'] == 2) && !isset($video_details['data']['title'])) {            
                    $this->session->set_flashdata('msg_status', "300");
                    $this->session->set_flashdata('toast_msg', $this->lang->line('available_on_rent'));
                    $play_url = $_GET['play-video'];
                    $redirecturl = PLAYVIDEO . $play_url;
                    // if ($this->session->id) {
                    if(!empty($play_url)){
                    redirect( $redirecturl );
                    die;
                    }else{
                        redirect(base_url('/'));
                        die;
                    }
                // }else{
                //     $this->session->set_userdata('redirect_url', $redirect_url);
                //     redirect('user-login');
                //     die;
                // }
            }
        }
        if(!$video_details['status']){
            redirect('no-data');
            die;
        }
        $content_id = $video_details['data']['show_id'] ?? 0;
        $url1 = "getContentDetails/" . $content_id;
        $content_details = call_curl_by_get_method($url1, $document);
        // pre($content_details);die("sssss");
        // if($this->session->id){
        //     if (!($video_details['status']) || !($content_details['status']) || ($this->session->userdata('Iskid') != $content_details['data']['is_child'])) {
        //         redirect(base_url('/'));
        //         //die;
        //     }
        // }
        $max_res = $this->session->userdata('max_quality')?? DEFAULT_RESOLUTION;
        $view_data['max_res'] = $max_res;
        if (isset($video_details['error']) && $video_details['error'] == '100100') {
            $this->logout();
        }
        $vdc_id = $video_details['data']['vdc_id'] ?? '';
        if (isset($video_details['data']['is_drm_protected']) && $video_details['data']['is_drm_protected'] == 1 && (isset($content_details['data']['owned_by']) && $content_details['data']['owned_by']==0)) {
            $documents = array('media_id' => $video_details['data']['id'] ?? '', 'vdc_id' => $vdc_id, 'is_download' => 0);
            $urls = "createDrmLicense".$chkparam;
            $url  = file_curl_contents($urls, $documents);
            $video_details['data']['file_url'] = ($url['data']['file_url']) ?? '';
            $video_details['data']['token'] = ($url['data']['token']) ?? '';
            $video_details['data']['player_params'] = ($url['data']['player_params']) ?? $video_details['data']['player_params'];
        }
        if(isset($video_details['data']['player_params']) && !empty($video_details['data']['player_params'])){
            if(!isset($video_details['data']['ad_enable'])){
                $adEnabled = true;
            }
            if(in_array('os',$video_details['data']['player_params'])){
                $adParams['os'] = '4';
            }
            if(in_array('ai',$video_details['data']['player_params'])){
                $adParams['ai'] = adAI??'sb.wavespb.com';
            }
            if(in_array('trq',$video_details['data']['player_params'])){
                $milliseconds = round(microtime(true) * 1000);
                $adParams['trq'] = (string) $milliseconds;
            }
            if(in_array('vmi',$video_details['data']['player_params'])){
                $adParams['vmi'] = 'web';
            }
            if(in_array('asi',$video_details['data']['player_params'])){
                $adParams['asi'] = 'web';
            }
            if(in_array('dt',$video_details['data']['player_params'])){
                $adParams['dt'] = '4';
            }
            if(in_array('prerollasi',$video_details['data']['player_params'])){
                $adParams['prerollasi'] = 'web';
            }
            if(in_array('gn',$video_details['data']['player_params'])){
                $adParams['gn'] = (string) $this->session->gender??'male';
            }
            if(in_array('ag',$video_details['data']['player_params'])){
                $adParams['ag'] = (string) $this->session->dob??'';
            }
            if(in_array('ifa',$video_details['data']['player_params'])){
                $adParams['ifa'] = '';
            }
            if(in_array('vid_d',$video_details['data']['player_params'])){
                $adParams['vid_d'] = (string) ($video_details['data']['video_duration']??0);
            }
            if(in_array('cvl',$video_details['data']['player_params'])){
                $adParams['cvl'] = (string) ($video_details['data']['video_duration']??0);
            }
            if(in_array('contentpartner',$video_details['data']['player_params'])){
                $adParams['contentpartner'] = (string) $video_details['data']['content_partner_key']??'';
            }
            if(in_array('ctid',$video_details['data']['player_params'])){
                $adParams['ctid'] = (string) $video_details['data']['id']??0;
            }
            if(in_array('ctype',$video_details['data']['player_params'])){
                $adParams['ctype'] = 'VOD';
            }
            if(in_array('shnm',$video_details['data']['player_params'])){
                $adParams['shnm'] = (string) ($content_details['data']['title']??'');
            }
            if(in_array('cttitle',$video_details['data']['player_params'])){
                $adParams['cttitle'] = (string) ($video_details['data']['title']??'');
            }
            if(in_array('gnr',$video_details['data']['player_params'])){
                $adParams['gnr'] = (string) ($content_details['data']['genres']??'');
            }
            if(in_array('iskp',$video_details['data']['player_params'])){
                $adParams['iskp'] = (string) ($this->session->Iskid??'');
            }
            if(in_array('lang',$video_details['data']['player_params'])){
                $adParams['lang'] = (string) $content_details['data']['language_title']??'';
            }
            //$adParams = json_encode($adParams);
        }
        $tracking_params = $video_details['data']['tracking_params']??[];
        $tracking_params_prefix = $video_details['data']['tracking_params_prefix']??'md_';
        $queryParams = [];
        foreach ($tracking_params as $key) {
            if (strpos($key, $tracking_params_prefix) === 0) {
                $originalKey = substr($key, 3);
                $apnd_key = '';           
            }else{
                $originalKey = $key;
                $apnd_key = $tracking_params_prefix;
            }
            if (isset($adParams[$originalKey])) {
                $queryParams[$apnd_key.$key] = $adParams[$originalKey];
            }
        }
        $queryParams = http_build_query($queryParams);
        $view_data['queryParams'] = $queryParams;
        $season_check = '';
        if (isset($content_details['data']['season']) && !empty($content_details['data']['season'])) {
            $season_check = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) use ($episode_id) {
                return $var['id'] == $episode_id;
            }));
        }
        $category_title = ($content_details['data']['category_title']) ?? '';
        $season_id = isset($season_check[0]['season_id']) ? $season_check[0]['season_id'] : '';
        $season_name = isset($season_check[0]['season']) ? $season_check[0]['season'] : '';
        $episode_name = isset($season_check[0]['title']) ? $season_check[0]['title'] : '';
        $view_data['episode_id'] = $episode_id;
        $moto_title = @$content_details['data']['id'] . '/' . @$content_details['data']['title'] . '/' . $category_title . '/' .   $season_id . '/' . $season_name . '/' . $episode_id . '/' . $episode_name;

        if ($types == 'continue_watching' && isset($content_details['data']['title'])) {
            matomo_content_hit('ContinueWatching', 'Select',     $moto_title, $content_details['data']['genres']);
        }
        // if (!$this->session->DeviceType) {
            $browser = detectBrowser();
            $this->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 2);
            $DeviceType = $browser['DeviceType'];
        // } else {
        //     $DeviceType = $this->session->DeviceType;
        // }
        $view_data['adParams'] = json_encode($adParams);
        $view_data['DeviceType'] = $DeviceType;
        $bandwidth = array();
        $video_details['data']['licenceUrl'] = BASEURLAPI.BASEVERSION.'onRequestCreateVideoLicense';
        $video_details['data']['fairplayUrl'] = 'https://license-global.pallycon.com/ri/fpsKeyManager.do?siteId='.SITE_ID;
        if(isset($content_details['data']['owned_by']) && $content_details['data']['owned_by'] >0){
            $url = $content_details['data']['website_url'];
            $apiKey = !empty($content_details['data']['access_key'])?$content_details['data']['access_key']:'UdRFvK66uiA7IjRLE3liwTG9';
            $contentId = 0;
            if ($content_details['status']) {
                if (isset($content_details['data']['season'][0]) && !empty($content_details['data']['season'][0])) {
                    $v_id = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) {
                        return ($var['is_trailer'] == '0');
                    }));
                    $contentId = ($v_id[0]['contentId']);
                }
            }
            $document = array(
                "contentId"=>$contentId
            );
            $publisherid = $content_details['data']['owned_by'];
            $partenerData = $this->get_partener_content($contentId, $publisherid);
            // if($partenerData){
            //     if($DeviceType == 2){
            //         if(isset($partenerData['HLS'])&& !empty($partenerData['HLS'])){
            //         $video_details['data']['file_url'] = $partenerData['HLS']['url'];
            //         $video_details['data']['licenceUrl'] = $partenerData['HLS']['licenceUrl'];
            //         $video_details['data']['fairplayUrl'] = $partenerData['HLS']['certificateUrl'];
            //         }
            //     }else{
            //         if(isset($partenerData['DASH'])&& !empty($partenerData['DASH'])){
            //         $video_details['data']['file_url'] = $partenerData['DASH']['url'];
            //         $video_details['data']['licenceUrl'] = $partenerData['DASH']['licenceUrl'];
            //         }
            //     }                
            // }
            if ($partenerData) {
                $format = ($DeviceType == 2) ? 'HLS' : 'DASH';
                if (isset($partenerData[$format]) && !empty($partenerData[$format]['url']) && !empty($partenerData[$format]['licenceUrl'])) {
                    $video_details['data']['file_url'] = $partenerData[$format]['url'];
                    $video_details['data']['licenceUrl'] = $partenerData[$format]['licenceUrl'];
                    $video_details['data']['token'] = $partenerData[$format]['token'] ?? $video_details['data']['token'];
                    if($partenerData[$format]['identifier']=='lionsgate'){
                        $adEnabled = false;
                        $video_details['data']['header'] = 'X-VUDRM-TOKEN';
                    }
                    if ($format === 'HLS') {
                        $video_details['data']['fairplayUrl'] = $partenerData[$format]['certificateUrl'] ?? null; // Optional key
                    }
                }
            }
            
        }     
        $view_data['types'] = $types??'' ;
        $view_data['adEnabled'] = $adEnabled;
        $view_data['isSubscribed'] = $isSubscribed??0;
        $view_data['video_details'] = $video_details;
        $view_data['video_details']['data']['redirtct'] = $redirtct;
        $view_data['content_details'] = $content_details;
        if (isset($video_details['data']['media_type']) && ($video_details['data']['media_type']) == 1) {
            if (isset($view_data['video_details']['data']['is_drm_protected']) && $view_data['video_details']['data']['is_drm_protected'] == 1) {
                if ($DeviceType != 2) {
                    $bandwidth = $this->get_mpd_bitrate($view_data['video_details']['data']['file_url'], 'bandwidth');
                }
            } else {
                if ($DeviceType != 2) {
                    $bandwidth = $this->get_available_bitrates($view_data['video_details']['data']['file_url'], 'AVERAGE-BANDWIDTH');
                }
            }
            $lastSlashPos = strrpos($view_data['video_details']['data']['file_url'], '/');
            $baseurl = substr($view_data['video_details']['data']['file_url'], 0, $lastSlashPos + 1);
            $view_data['baseurl'] = $baseurl;
            $view_data['bandwidth'] = $bandwidth;
            $data['without_head'] = 1;
            //  matomo_hit('Audio', 'Start', $view_data['video_details']['data']['title']);
            $data['page_data'] = $this->load->view('web/player/audio', $view_data, true);
        } else {

            if (isset($video_details['data']['is_drm_protected']) && ($video_details['data']['is_drm_protected']) == 1) {
                $data['without_head'] = 1;
                $data['page_data'] = $this->load->view('web/player/play_episode_hls', $view_data, true);
            } else {
                $data['without_head'] = 1;
                $data['page_data'] = $this->load->view('web/player/play_episode_hls', $view_data, true);
            }
        }
        // pre($view_data['video_details']);die;
        echo modules::run('web/template/call_default_template', $data);
    }

    public function get_partener_content($contentId, $publisherid) {
        //pre($contentId);die;
        // $publisherid = 32; 
        // $contentId ='fzVlEzUU'; 
        //  $apiKey ='UdRFvK66uiA7IjRLE3liwTG9'; 
     //   pre($publisherid);pre($content_id);
         $urls = 'getContentPlaybackInfo?publisher_id='. $publisherid; 
         $documents = array('contentId'=>$contentId);
         $return  = file_curl_contents($urls, $documents);
         if(isset($return['data'])&& !empty($return['data'])){
            $return = $return['data'];
         }else{
            $return = '';
         }
        // $url = !empty($url)?$url:'https://www.ptcplay.com/ddott/getContentPlaybackInfo.php';
        // $data = array(
        //     "contentId" => $contentId
        // );
        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Authorization: Bearer ' . $apiKey,
        //     'Content-Type: application/json'
        // ));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        // $response = curl_exec($ch);
        // if (curl_errno($ch)) {
        //     return false;
        // }
        // curl_close($ch);
        // $return = json_decode($response, true); 
        // if (!empty($return['playUrls'])) {
        //     $return['playUrls']['HLS'] = $return['playUrls'][0] ?? null;
        //     $return['playUrls']['DASH'] = $return['playUrls'][1] ?? null;
        
        //     unset($return['playUrls'][0], $return['playUrls'][1]);
        // }
        
        // pre($return['playUrls']);
        // die;
        // $return = $return['playUrls'];
         return $return;
    }

    public function get_available_bitrates($m3u8_url, $search = 'AVERAGE-BANDWIDTH')
    {
        $streams = array();
        try {
            try {
                $m3u8_content = @file_get_contents($m3u8_url);
            } catch (Exception $e) {
                $m3u8_content = false;
            }
            if ($m3u8_content !== false) {
                $lines = explode("\n", $m3u8_content);
                $bitrates = array();
                $streams = array();
                $current_bitrate = null;
                foreach ($lines as $line) {
                    if (strpos($line, '#EXT-X-STREAM-INF:') === 0) {
                        $parts = explode(',', $line);
                        foreach ($parts as $part) {
                            if (strpos($part, $search . '=') === 0) {
                                $bitrate = substr($part, strlen($search . '='));
                                $current_bitrate = $bitrate;
                                $bitrates[] = $bitrate;
                            }
                        }
                    } elseif (!empty($line) && $line[0] !== '#') {
                        if ($current_bitrate !== null) {
                            $streams[$current_bitrate] = trim($line);
                            $current_bitrate = null;
                        }
                    }
                }
            } else {
                $streams = array();
            }
        } catch (Exception $e) {
            $streams = array();
        }
        return $streams;
    }
    
    public  function get_mpd_bitrate($mpdUrl, $search = 'height')
    {
        $bitratesWithUrls = array();
  //  pre($mpdUrl);die;
        if ($mpdUrl) {
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $mpdUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $mpdContent = curl_exec($ch);
                curl_close($ch);
    
                if ($mpdContent !== false) {
                    $pattern = '/<Representation.*?' . $search . '=["\'](\d+)["\'].*?<BaseURL>(.*?)<\/BaseURL>/s';
                        preg_match_all($pattern, $mpdContent, $matches, PREG_SET_ORDER);
                        foreach ($matches as $match) {
                        $bandwidth = $match[1];
                        $baseUrl = rtrim($match[2], '/');
                        if (!empty($bandwidth) && !empty($baseUrl)) {
                            $bitratesWithUrls[$bandwidth] = $baseUrl;
                        }
                    }
                } else {
                    error_log('Error fetching MPD content from URL: ' . $mpdUrl);
                }
            } catch (Exception $e) {
                
                error_log('Error processing MPD file: ' . $e->getMessage());
            }
        }
    
        return $bitratesWithUrls;
    }

    public function check_video_id()
    {
        $video_id = $this->input->post('video_id');
        $chkparam = '?display=false';
        $url =  "getVideoUrl/" . $video_id.$chkparam;
        $document2 = array('video_id' => $video_id);
        $document = array();
         $video_details = call_curl_by_get_method($url, $document);
         $status = false;
         if($video_details['data']['is_live']>1){
            $status = true;
         }
     
         echo json_encode(array('status' => $status ? 1 : 0));
         exit;  
    }

    public function channel_details(){
        $channel_details = ['status'=>false, 'data'=>[]];
        if($this->input->post()){
            $adParams = [];
            $adEnabled = false;
            $channel_id = $this->input->post('channel_id');
            if($channel_id){
                $url = "getLiveChannelDetails/".$channel_id;
                $channel_details = call_curl_by_get_method($url, $document=[]);
                if($channel_details['status'] && !empty($channel_details['data'])){
                    if (isset($channel_details['data']['is_drm_protected']) && $channel_details['data']['is_drm_protected'] == 1) {
                        $vdc_id = $channel_details['data']['vdc_id'] ?? '';
                        $documents = array('media_id' => $channel_details['data']['media_id'] ?? '', 'vdc_id' => $vdc_id);
                        $urls = "createDrmLicense";
                        $url  = file_curl_contents($urls, $documents);
                        $channel_details['data']['file_url'] = ($url['data']['file_url']) ?? '';
                        $channel_details['data']['token'] = ($url['data']['token']) ?? '';
                    }
                    if(isset($channel_details['data']['ad_enable'])){
                        if($channel_details['data']['ad_enable']==1){
                            $adEnabled = true;
                        }
                    }
                    if(isset($channel_details['data']['player_params']) && !empty($channel_details['data']['player_params'])){
                        if(!isset($channel_details['data']['ad_enable'])){
                            $adEnabled = true;
                        }
                        if(in_array('os',$channel_details['data']['player_params'])){
                            $adParams['os'] = '4';
                        }
                        if(in_array('ai',$channel_details['data']['player_params'])){
                            $adParams['ai'] = adAI??'sb.wavespb.com';
                        }
                        if(in_array('trq',$channel_details['data']['player_params'])){
                            $milliseconds = round(microtime(true) * 1000);
                            $adParams['trq'] = (string)$milliseconds;
                        }
                        if(in_array('vmi',$channel_details['data']['player_params'])){
                            $adParams['vmi'] = 'web';
                        }
                        if(in_array('asi',$channel_details['data']['player_params'])){
                            $adParams['asi'] = 'web';
                        }
                        if(in_array('prerollasi',$channel_details['data']['player_params'])){
                            $adParams['prerollasi'] = 'web';
                        }
                        if(in_array('gn',$channel_details['data']['player_params'])){
                            $adParams['gn'] = (string) $this->session->gender??'male';
                        }
                        if(in_array('ag',$channel_details['data']['player_params'])){
                            $adParams['ag'] = (string) $this->session->age??'';
                        }
                        if(in_array('ifa',$channel_details['data']['player_params'])){
                            $adParams['ifa'] = '';
                        }
                        if(in_array('vid_d',$channel_details['data']['player_params'])){
                            $adParams['vid_d'] = (string) ($channel_details['data']['video_duration']??0);
                        }
                        if(in_array('cvl',$channel_details['data']['player_params'])){
                            $adParams['cvl'] = (string) ($channel_details['data']['video_duration']??0);
                        }
                        if(in_array('contentpartner',$channel_details['data']['player_params'])){
                            $adParams['contentpartner'] = (string) $channel_details['data']['content_partner_key']??'';
                        }
                        if(in_array('ctid',$channel_details['data']['player_params'])){
                            $adParams['ctid'] = (string) $channel_details['data']['id']??0;
                        }
                        if(in_array('ctype',$channel_details['data']['player_params'])){
                            $adParams['ctype'] = 'VOD';
                        }
                        if(in_array('shnm',$channel_details['data']['player_params'])){
                            $adParams['shnm'] = (string) ($content_details['data']['title']??'');
                        }
                        if(in_array('cttitle',$channel_details['data']['player_params'])){
                            $adParams['cttitle'] = (string) ($channel_details['data']['title']??'');
                        }
                        if(in_array('gnr',$channel_details['data']['player_params'])){
                            $adParams['gnr'] = (string) ($content_details['data']['genres']??'');
                        }
                        if(in_array('iskp',$channel_details['data']['player_params'])){
                            $adParams['iskp'] = (string) ($this->session->Iskid??'');
                        }
                        if(in_array('lang',$channel_details['data']['player_params'])){
                            $adParams['lang'] = (string) isset($channel_details['data']['language_title'])?$channel_details['data']['language_title']:'';
                        }
                        $channel_details['data']['adParams'] = $adParams;
                        $tracking_params = $channel_details['data']['tracking_params']??[];
                        $queryParams = [];
                        foreach ($tracking_params as $key) {
                            if (strpos($key, 'md_') === 0) {
                                $originalKey = substr($key, 3);
                                $apnd_key = '';           
                            }else{
                                $originalKey = $key;
                                $apnd_key = 'md_';
                            }
                            if (isset($adParams[$originalKey])) {
                                $queryParams[$apnd_key.$key] = $adParams[$originalKey];
                            }
                        }
                        $queryParams = http_build_query($queryParams);
                        $channel_details['data']['queryParams'] = $queryParams;
                        $channel_details['data']['adEnabled'] = $adEnabled;
                    }
                }
                echo json_encode($channel_details);
            } 
        }
    }

}