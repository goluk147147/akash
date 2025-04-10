<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Watchlist extends MX_Controller {

    public function __construct() {
        parent::__construct();
        modules::run('web/web_panel_ini/web_ini');  
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'custom', 'cookie'));
        $this->load->helper("services");
        $this->load->helper("aes");
    }
    public function add_to_watchlist(){
        if(empty($_POST['geners'])){
            matomo_hit($_POST['user'], $_POST['types'], $_POST['title']);
        }else{ 
            //$_POST['geners']=   ($_POST['geners']='rate')??'';
        matomo_content_hit($_POST['user'], $_POST['types'], $_POST['title'],$_POST['geners']);
        }

        return true;
    }
    public function add_to_watchlist_dim(){
        if(empty($_POST['geners'])){
            matomo_hit($_POST['user'], $_POST['types'], $_POST['title']);
        }else{ 
            //$_POST['geners']=   ($_POST['geners']='rate')??'';
        matomo_content_hit($_POST['user'], $_POST['types'], $_POST['title'],$_POST['geners'], $_POST['event'], $_POST['pid_name']);
        }

        return true;
    }
    public function add_to_watchlist_like(){
        if(empty($_POST['geners'])){
         matomo_content_hit($_POST['user'], $_POST['types'], $_POST['title']);
        }else{
            //$_POST['geners']=   ($_POST['geners']='rate')??'';
        matomo_content_hit($_POST['user'], $_POST['types'], $_POST['title'],$_POST['geners']);
        }

        return true;
    }

    public function get_watchlist(){
        matomo_hit('Page','View','Watchlist');
        if(empty($this->session->id)){
            redirect('user-login');
        }
        $profile_id = $this->session->profile_id; 
        // $url = "Menu_master/get_menu_master";
        $url = "getWatchList?profile_id=".$profile_id;
        $document = array();
        $view_data['watchlist'] = call_curl_by_get_method($url,$document);
        // pre($view_data['watchlist']);die;
          if (isset($view_data['watchlist']['error']) && $view_data['watchlist']['error'] == '100100') {
                 $this->logout();
            }
        $view_data['page'] = "watchlist";
        matomo_hit('Watchlist','list','');
       $data['page_data'] = $this->load->view('web/watchlist/watchlist', $view_data, true);
       $data['without_head'] = 2;
       echo modules::run('web/template/call_default_template',$data);

    }

    public function get_data()
    {
        $start = $this->input->post('start');
        $latest_time = $this->input->post('last_updated');
        $url = 'getWatchList/lastupdated/'.$latest_time.'/page/' . $start;
        $document = array();
        $data =  call_curl_by_get_method($url, $document, 'V1/');
        $rented_list = [];
        if ($data['status']) {
            foreach ($data['data'] as $key => $value) {
                if(!in_array($value['show_id'],$rented_list)){
                    $rented_list[] = $value['show_id'];
                }                
                $data['data'][$key]['enc_show_id'] = aes_cbc_encryption_($value['show_id']);
                $data['data'][$key]['thumbnail_url'] = $value['thumbnail'];
                $data['data'][$key]['media_type'] = $value['type'];
                $data['data'][$key]['updated_at'] = $value['last_updated'];
            }
            if($this->session->id && !empty($rented_list)){
                $rent_url = 'retrieveRentalStatusByContentIds/contentIds/'.join(',',$rented_list);
                $rentData = call_curl_by_get_method($rent_url,[]);
                if($rentData['status'] && !empty($rentData['data'])){
                    foreach ($data['data'] as $keys => $values) {
                        if(in_array($values['show_id'],$rented_list)){
                            foreach ($rentData['data'] as $rkey => $rvalues) {
                                if($rvalues['show_id']==$values['show_id']){
                                    $data['data'][$keys]['is_rented'] = $rvalues['isOnRent'];
                                }
                            }
                        }
                    }
                }
            }
        }
        echo json_encode($data);
    }

    public function remove_from_watchlist(){
        $title = $this->input->post('title');
        $geners = $this->input->post('geners');
        matomo_content_hit('Watchlist', 'Delete', $title,$geners);
       // matomo_hit('BUTTON','REMOVE TO WATCH LIST','BUTTON_CLICKED');
        $type_id = aes_cbc_decryption_($this->input->post('type_id'));
        $product_id = aes_cbc_decryption_($this->input->post('product_id'));
        // $main_id = aes_cbc_decryption_($this->input->post('main_id'));
        $url = "manageWatchList";
        $activity = 2;
        $document = array('activity' => 2, 'id' => $product_id, 'show_id'=>$product_id);
        $data = file_curl_contents($url,$document);
        echo json_encode($data);
    }

      public function logout()
    {
        session_unset();
        session_destroy();
        redirect('user-login');
    }
}
