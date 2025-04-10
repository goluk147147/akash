<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Live extends MX_Controller {

    public function __construct() {
        parent::__construct();
        
        modules::run('web/web_panel_ini/web_ini');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'custom', 'cookie', 'services'));
        $this->load->helper('aes');

    }

    function getEpgData(){
        if($this->input->post()){
            $id = $this->input->post('id');
            if(!empty($id)){
                $epgurl = "epg/epgDetail/266";
                $epgDetailData = call_curl_by_get_method($epgurl, $document=array());
                echo json_encode($epgDetailData);
            }
        }
    }

    function epgDetailsData(){
        if($this->input->post()){
            $epgDetailData = [];
            $id = $this->input->post('id');
            $key = $this->input->post('key')??'past_shows';
            if(!empty($id)){
                $epgurl = "epg/epgDetail/266";
                $epgDetailData = call_curl_by_get_method($epgurl, $document=array());
                if($epgDetailData['status'] && isset($epgDetailData['data'][$key])){
                    foreach ($epgDetailData['data'][$key] as $skey => $value) {
                        $epgDetailData['data'][$key][$skey]['enc_id'] = aes_cbc_encryption_($value['id']);
                        $epgDetailData['data'][$key][$skey]['date'] = $this->formatTimestamp($value['start']);
                    }
                }
            }
            echo json_encode($epgDetailData);
        }
    }

    public function live_channel()
    {
        $view_data = array();
        $queryParams = [];
        $adParams = [];
        $adEnabled = false;
        $liveButton = true;
        $max_res = $this->session->userdata('max_quality')?? DEFAULT_RESOLUTION;
        $view_data['max_res'] = $max_res;
        // if(!$this->session->id){
        //     $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        //     $this->session->set_userdata('redirect_url', $redirect_url);
        //     redirect('user-login');die;
        // }
        $id = $this->input->get('id');
        if($id != ""){
            $video = str_replace(" ", "+", $id);
            $video_type = str_replace(" ", "+", $this->input->get('type'));
            $video_details = array();
        }
        $file_url = $this->input->get('file_url');
        if(!empty($file_url)){
            $view_data['file_url'] = $file_url;
        }
        $vdc_id = $this->input->get('vdc_id');
        $media_id = $this->input->get('show_id');
        if($vdc_id != "" && $media_id != ""){
            $documents = array('media_id' => $media_id, 'vdc_id' => $vdc_id);
            $drmUrl = "createDrmLicense";
            $url  = file_curl_contents($drmUrl, $documents);
            if(isset($url['status']) && $url['status'] == false){
                redirect('no-data'); die;
            }
            $drm_file_url = ($url['data']['file_url']) ?? '';
            $drm_token = ($url['data']['token']) ?? '';
            $view_data['drm_file_url'] = $drm_file_url;
            $view_data['drm_token'] = $drm_token;
        }
        // $video = $this->input->get('video')??'';
        if (!$this->session->DeviceType) {
            $browser = detectBrowser();
            $this->session->set_userdata('DeviceType',$browser['DeviceType']??1);
            $DeviceType = $browser['DeviceType'];
        }else{
            $DeviceType = $this->session->DeviceType;
        }
        $view_data['DeviceType'] = $DeviceType??1;
        $bitrate = array();
        unset($_SESSION['redirect_url']);        
        $livetype = $this->input->get('type');
        
        if ($id != "" && $video != "") { 
            $enc_id = str_replace(" ", '+', $video);
            $view_data['enc_id'] = $enc_id;
            $video = aes_cbc_decryption_($enc_id);
            $video_type = aes_cbc_decryption_($video_type);
            $view_data['epgId'] = $video;
            $epgurl = "epg/epgDetail/".$video;
            // if($livetype=='radio'){
            //     $epgurl = "getLiveChannelDetails/".$video;
            // }   
            //pre($epgurl);         
            $epgDetailData = call_curl_by_get_method($epgurl, $document=array());
           // pre($epgDetailData); die;
            // if($livetype=='radio'){
            //     $detailData = $epgDetailData['data'];
            //     unset($epgDetailData['data']);
            //     $epgDetailData['data']['details'] = $detailData;
            // }
            if(isset($epgDetailData['data']['details']['ad_enable'])){
                if($epgDetailData['data']['details']['ad_enable']==1){
                    $adEnabled = true;
                }
            }
            if(isset($epgDetailData['data']['details']['player_params']) && !empty($epgDetailData['data']['details']['player_params'])){
                if(!isset($epgDetailData['data']['details']['ad_enable'])){
                    $adEnabled = true;
                }
                if(in_array('os',$epgDetailData['data']['details']['player_params'])){
                    $adParams['os'] = '4';
                }
                if(in_array('ai',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ai'] = adAI??'sb.wavespb.com';
                }
                if(in_array('trq',$epgDetailData['data']['details']['player_params'])){
                    $milliseconds = round(microtime(true) * 1000);
                    $adParams['trq'] = (string)$milliseconds;
                }
                if(in_array('dt',$epgDetailData['data']['details']['player_params'])){
                    $adParams['dt'] = '4';
                }
                if(in_array('vmi',$epgDetailData['data']['details']['player_params'])){
                    $adParams['vmi'] = 'web';
                }
                if(in_array('asi',$epgDetailData['data']['details']['player_params'])){
                    $adParams['asi'] = 'web';
                }
                if(in_array('prerollasi',$epgDetailData['data']['details']['player_params'])){
                    $adParams['prerollasi'] = 'web';
                }
                if(in_array('gn',$epgDetailData['data']['details']['player_params'])){
                    $adParams['gn'] = (string) $this->session->gender??'male';
                }
                if(in_array('ag',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ag'] = (string) $this->session->age??'';
                }
                if(in_array('ifa',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ifa'] = '';
                }
                if(in_array('vid_d',$epgDetailData['data']['details']['player_params'])){
                    $adParams['vid_d'] = (string) ($epgDetailData['data']['details']['video_duration']??0);
                }
                if(in_array('cvl',$epgDetailData['data']['details']['player_params'])){
                    $adParams['cvl'] = (string) ($epgDetailData['data']['details']['video_duration']??0);
                }
                if(in_array('contentpartner',$epgDetailData['data']['details']['player_params'])){
                    $adParams['contentpartner'] = (string) $epgDetailData['data']['details']['content_partner_key']??'';
                }
                
                if(in_array('ctid',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ctid'] = (string) $epgDetailData['data']['details']['id']??0;
                }
                if(in_array('ctype',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ctype'] = 'LIVE';
                }
                if(in_array('chnm',$epgDetailData['data']['details']['player_params'])){
                    $adParams['chnm'] = (string) ($epgDetailData['data']['details']['title']??'');
                }
                if(in_array('gnr',$epgDetailData['data']['details']['player_params'])){
                    $adParams['gnr'] = (isset($epgDetailData['data']['details']['genres']) && !empty($epgDetailData['data']['details']['genres']))?(string) ($epgDetailData['data']['details']['genres']):'';
                }
                if(in_array('iskp',$epgDetailData['data']['details']['player_params'])){
                    $adParams['iskp'] = (string) ($this->session->Iskid??'');
                }
                if(in_array('lang',$epgDetailData['data']['details']['player_params'])){
                    $adParams['lang'] = (string) isset($epgDetailData['data']['details']['language_title'])?$epgDetailData['data']['details']['language_title']:'';
                }
                $tracking_params = $epgDetailData['data']['details']['tracking_params']??[];
                $tracking_params_prefix = $epgDetailData['data']['details']['tracking_params_prefix']??'md_';
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
            }
            //$contentpartner = $epgDetailData['data']['details']['content_partner_key']??'';
            //pre($epgDetailData);die;
            $totalEndTime = [];
            if(isset($epgDetailData['data']['upcoming_shows'])){
                foreach($epgDetailData['data']['upcoming_shows'] as $key => $value){
                    $totalEndTime[] = $value['end'];
                }
            }
            if(isset($epgDetailData['data']['details']['end']) && !empty($epgDetailData['data']['details']['end'])){
                // $liveButton = false;
                $epgDetailData['data']['details']['start'] = strtotime($epgDetailData['data']['details']['start']);
                $epgDetailData['data']['details']['end'] = strtotime($epgDetailData['data']['details']['end']);
             }
            if(isset($epgDetailData['data']['past_shows'])){                
                $epgDetailData['data']['past_shows'] = array_reverse($epgDetailData['data']['past_shows']);
            }

            $vdc_id = $epgDetailData['data']['details']['vdc_id'] ?? '';
            if (isset($epgDetailData['data']['details']['is_drm_protected']) && $epgDetailData['data']['details']['is_drm_protected'] == 1) {
                $documents = array('media_id' => $epgDetailData['data']['details']['video_id'] ?? '', 'vdc_id' => $vdc_id);
                $drmUrl = "createDrmLicense";
                $url  = file_curl_contents($drmUrl, $documents);
                $epgDetailData['data']['details']['file_url'] = ($url['data']['file_url']) ?? '';
                $epgDetailData['data']['details']['token'] = ($url['data']['token']) ?? '';
            }
            if(!empty($epgDetailData['data']['details']['start']) && !empty($epgDetailData['data']['details']['end'])){
                $start = $epgDetailData['data']['details']['start'];
                $end = $epgDetailData['data']['details']['end'];
                // $epgDetailData['data']['details']['file_url'] .= '?start='.$start.'&end='.$end;
            }
            $url = "getLiveChannelDetails/".$video;
            // $document2 = array('video_id' => $episode_id);
            $document = array();
            $video_details = call_curl_by_get_method($url, $document);
            if(isset($video_details['data']['ad_enable'])){
                if($video_details['data']['ad_enable']==1){
                    $adEnabled = true;
                }
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
                if(in_array('ctid',$video_details['data']['player_params'])){
                    $adParams['ctid'] = (string) $video_details['data']['id']??0;
                }
                if(in_array('ctype',$video_details['data']['player_params'])){
                    $adParams['ctype'] = 'LIVE';
                }
                if(in_array('chnm',$video_details['data']['player_params'])){
                    $adParams['chnm'] = (string) ($video_details['data']['title']??'');
                }
                if(in_array('gnr',$video_details['data']['player_params'])){
                    $adParams['gnr'] = (isset($video_details['data']['genres']) && !empty($video_details['data']['genres']))?(string) ($video_details['data']['genres']):'';
                }
                if(in_array('iskp',$video_details['data']['player_params'])){
                    $adParams['iskp'] = (string) ($this->session->Iskid??'');
                }
                if(in_array('lang',$video_details['data']['player_params'])){
                    $adParams['lang'] = (string) isset($video_details['data']['language_title'])?$video_details['data']['language_title']:'';
                }
                $tracking_params = $video_details['data']['tracking_params']??[];
                $tracking_params_prefix = $video_details['data']['tracking_params_prefix']??'md_';
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
            }
            // pre($video_details);die;
            if (isset($video_details['data']['is_paid']) && $video_details['data']['is_paid'] && !SUBSCRIPTION_CHECK) {
                $redirect_url = $_SERVER['REQUEST_SCHEME'].'://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $this->session->set_userdata('redirect_url',$redirect_url);
                if ($this->session->id) {
                    redirect('subscription');die;
                }else{
                    redirect('user-login');die;
                }
            }
            $queryParams = http_build_query($queryParams);
            $view_data['queryParams'] = $queryParams;
            $view_data['adParams'] = json_encode($adParams);
            $view_data['adEnabled'] = $adEnabled;
            $favu = "getFavouriteList";
            $favu_details = call_curl_by_get_method($favu, $document);
            $fav = @array_merge((array)$favu_details['data']['channels'], (array)$favu_details['data']['radio']);

            $video_details['data']['favorite'] = 0;

            //print_r($fav); die();
            if($video_details && $video_details['data'] &&  isset($video_details['data']['id'])){
                foreach ($fav as $arr1) {
                    // pre($arr1);
                    // pre($video_details['data']);
                    // print_r($arr1['show_id']); die();
                        
                    if ($arr1['id'] == $video_details['data']['id']) {
                        $video_details['data']['favorite'] = 1;
                    }
                    
                    // if($arr1['radio']['show_id']==$video_details['data']['id']){
                    //  $video_details['data']['favorite']=1;
                    // }
                }
            }
            if (isset($video_details['error']) && $video_details['error'] == '100100') {
                $this->logout();
            }
            $vdc_id = $video_details['data']['vdc_id'] ?? '';
            if (isset($video_details['data']['is_drm_protected']) && $video_details['data']['is_drm_protected'] == 1) {
                $documents = array('media_id' => $video_details['data']['media_id'] ?? '', 'vdc_id' => $vdc_id);
                $urls = "createDrmLicense";
                $url  = file_curl_contents($urls, $documents);
                $video_details['data']['file_url'] = ($url['data']['file_url']) ?? '';
                $video_details['data']['token'] = ($url['data']['token']) ?? '';
            }
            // $view_data['content_details'] = $video_details;
            $view_data['epgDetailData'] = $epgDetailData;
            //pre($view_data['epgDetailData']);die;
            $view_data['content_details'] = $video_details;
            $view_data['totalEndTime'] = json_encode($totalEndTime);
        }
    
        $date =date("m/d/Y h:i:s A");
        // if(isset($video_typ) && $video_type == 'next' && $video_details['data']['title'] !=''){
        //     matomo_content_hit('Live Audio', 'Next', $video_details['data']['id'].'/'.$video_details['data']['title'], ($video_details['data']['genres']) ?? "");    // pre($t_id);
        // }
        $view_data['liveButton'] = $liveButton;
        $view_data['video'] = $video??'';
        $view_data['videoType'] = 'epg';
        // if(isset($video_typ) && $video_type == 'prev' && isset($video_details['data']['title']) && $video_details['data']['title'] !=''){
        //     matomo_content_hit('Live Audio', 'Previous', $date, ($video_details['data']['genres']) ?? "");        // pre($t_id);    
        // }
        // if (isset($video_details['data']['details']['media_type']) && $video_details['data']['details']['media_type'] == 1) {
        if ($livetype == 'radio') {
            // if( isset($video_details['data']['title']) && $video_details['data']['title'] != ''){
            //     matomo_hit('LiveRadio', 'Listen', $video_details['data']['id'].'/'.$video_details['data']['title'], ($video_details['data']['genres']) ?? ""); 
            //     // matomo_hit('LiveAudio', 'DateAndTime', $date, ($video_details['data']['genres']) ?? "", 3);        // pre($t_id);
            // }
            $view_data['video_details'] = $video_details;
            $data['page_data'] = $this->load->view('web/dashboard/live_audio', $view_data, true);
        } else { 
            // if( isset($video_details['data']['title']) && $video_details['data']['title'] !=''){
            //     matomo_content_hit('LiveVideo', 'DateAndTime',$date, (@$video_details['data']['genres']) ?? "", 3);
            //     matomo_hit('Live', 'View(Video)',@$video_details['data']['id'].'/'. @$video_details['data']['title'], ($video_details['data']['genres']) ?? "" , $event=0);
            
            // }
            
            $data['page_data'] = $this->load->view('web/player/live_channel', $view_data, true);
        }
        $data['without_head'] = 2;
        echo modules::run('web/template/call_default_template', $data);
    }

    function live(){
        if(!$this->session->id){
            $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $this->session->set_userdata('redirect_url',$redirect_url);
            redirect('user-login');die;
        }
        $view_data = array();
        $max_res = $this->session->userdata('max_quality')?? DEFAULT_RESOLUTION;
        $view_data['max_res'] = $max_res;
        $adParams = [];
        $queryParams = [];
        $adEnabled = false;
        $liveButton = true;
        $id = $this->input->get('id');
        if(empty($id)){
            show_404();
            die;
        }
        $video = str_replace(" ", "+", $id);
        // if (!$this->session->DeviceType) {
            $browser = detectBrowser();
            $this->session->set_userdata('DeviceType',$browser['DeviceType']??1);
            $DeviceType = $browser['DeviceType'];
        // }else{
        //     $DeviceType = $this->session->DeviceType;
        // }
        $view_data['DeviceType'] = $DeviceType??1;
        $bitrate = array();
        unset($_SESSION['redirect_url']);        
        $livetype = $this->input->get('type');
        
        if ($id != "" && $video != "") { 
            $enc_id = str_replace(" ", '+', $video);
            $view_data['enc_id'] = $enc_id;
            $video = aes_cbc_decryption_($enc_id);
            $view_data['epgId'] = $video;
            $url = "getContentDetails/" . $video;
            $content_details = call_curl_by_get_method($url, $document = array());
            if(!$content_details['status']){
                redirect(base_url('no-data'));die;
            }
            if ($content_details['status']) {
                if (isset($content_details['data']['is_paid']) && !empty($content_details['data']['is_paid']==2) ) {
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
            $url =  "getVideoUrl/" . $video_id. $chkparam;
            $document2 = array('video_id' => $video_id);
            $document = array();
            $video_details = call_curl_by_get_method($url, $document);
            if(!isset($video_details['data']) || empty($video_details['data'])){
                redirect(base_url('no-data'));die;
            }
            if (isset($video_details['error']) && $video_details['error'] == '100100') {
                $this->logout();
            }
            $video_details['data']['channel_name'] = $content_details['data']['title'];
            $video_details['data']['genres'] = $content_details['data']['genres'];
            
            $epgDetailData['status']=true;
            $epgDetailData['data']['details'] = $video_details['data'];

            //$contentpartner = $epgDetailData['data']['details']['content_partner_key']??'';
          //  pre($epgDetailData);die;
            $totalEndTime = [];
            if(isset($epgDetailData['data']['upcoming_shows'])){
                foreach($epgDetailData['data']['upcoming_shows'] as $key => $value){
                    $totalEndTime[] = $value['end'];
                }
            }
            if(isset($epgDetailData['data']['details']['end']) && !empty($epgDetailData['data']['details']['end'])){
                // $liveButton = false;
                $epgDetailData['data']['details']['start'] = strtotime($epgDetailData['data']['details']['start']);
                $epgDetailData['data']['details']['end'] = strtotime($epgDetailData['data']['details']['end']);
             }
            if(isset($epgDetailData['data']['past_shows'])){                
                $epgDetailData['data']['past_shows'] = array_reverse($epgDetailData['data']['past_shows']);
            }

            $vdc_id = $epgDetailData['data']['details']['vdc_id'] ?? '';
            if (isset($epgDetailData['data']['details']['is_drm_protected']) && $epgDetailData['data']['details']['is_drm_protected'] == 1) {
                $documents = array('media_id' => $epgDetailData['data']['details']['id'] ?? '', 'vdc_id' => $vdc_id);
                $drmUrl = "createDrmLicense";
                $url  = file_curl_contents($drmUrl, $documents);
                $epgDetailData['data']['details']['file_url'] = ($url['data']['file_url']) ?? '';
                $epgDetailData['data']['details']['token'] = ($url['data']['token']) ?? '';
            }
            if(isset($epgDetailData['data']['details']['ad_enable'])){
                if($epgDetailData['data']['details']['ad_enable']==1){
                    $adEnabled = true;
                }
            }
            if(isset($epgDetailData['data']['details']['player_params']) && !empty($epgDetailData['data']['details']['player_params'])){
                if(!isset($epgDetailData['data']['details']['ad_enable'])){
                    $adEnabled = true;
                }
                if(in_array('os',$epgDetailData['data']['details']['player_params'])){
                    $adParams['os'] = '4';
                }
                if(in_array('ai',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ai'] = adAI??'sb.wavespb.com';
                }
                if(in_array('trq',$epgDetailData['data']['details']['player_params'])){
                    $milliseconds = round(microtime(true) * 1000);
                    $adParams['trq'] = (string)$milliseconds;
                }
                if(in_array('dt',$epgDetailData['data']['details']['player_params'])){
                    $adParams['dt'] = '4';
                }
                if(in_array('vmi',$epgDetailData['data']['details']['player_params'])){
                    $adParams['vmi'] = 'web';
                }
                if(in_array('asi',$epgDetailData['data']['details']['player_params'])){
                    $adParams['asi'] = 'web';
                }
                if(in_array('prerollasi',$epgDetailData['data']['details']['player_params'])){
                    $adParams['prerollasi'] = 'web';
                }
                if(in_array('gn',$epgDetailData['data']['details']['player_params'])){
                    $adParams['gn'] = (string) $this->session->gender??'male';
                }
                if(in_array('ag',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ag'] = (string) $this->session->age??'';
                }
                if(in_array('ifa',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ifa'] = '';
                }
                if(in_array('vid_d',$epgDetailData['data']['details']['player_params'])){
                    $adParams['vid_d'] = (string) ($epgDetailData['data']['details']['video_duration']??0);
                }
                if(in_array('cvl',$epgDetailData['data']['details']['player_params'])){
                    $adParams['cvl'] = (string) ($epgDetailData['data']['details']['video_duration']??0);
                }
                if(in_array('contentpartner',$epgDetailData['data']['details']['player_params'])){
                    $adParams['contentpartner'] = $epgDetailData['data']['details']['content_partner_key']??'';
                }
                if(in_array('ctid',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ctid'] = (string) $epgDetailData['data']['details']['id']??0;
                }
                if(in_array('ctype',$epgDetailData['data']['details']['player_params'])){
                    $adParams['ctype'] = 'LIVE';
                }
                if(in_array('chnm',$epgDetailData['data']['details']['player_params'])){
                    $adParams['chnm'] = (string) ($epgDetailData['data']['details']['title']??'');
                }
                if(in_array('gnr',$epgDetailData['data']['details']['player_params'])){
                    $adParams['gnr'] = (isset($epgDetailData['data']['details']['genres']) && !empty($epgDetailData['data']['details']['genres']))?(string) ($epgDetailData['data']['details']['genres']):'';
                }
                if(in_array('iskp',$epgDetailData['data']['details']['player_params'])){
                    $adParams['iskp'] = (string) ($this->session->Iskid??'');
                }
                if(in_array('lang',$epgDetailData['data']['details']['player_params'])){
                    $adParams['lang'] = (string) isset($epgDetailData['data']['details']['language_title'])?$epgDetailData['data']['details']['language_title']:'';
                }
                $tracking_params = $epgDetailData['data']['details']['tracking_params']??[];
                $tracking_params_prefix = $epgDetailData['data']['details']['tracking_params_prefix']??'md_';
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
            }
            if(isset($epgDetailData['data']['details']) && !empty($epgDetailData['data']['details'])){
                $video_details['data'] = $epgDetailData['data']['details'];
            }
            
            if(isset($epgDetailData['data']['details']['end']) && !empty($epgDetailData['data']['details']['start']) && !empty($epgDetailData['data']['details']['end'])){
                $start = $epgDetailData['data']['details']['start'];
                $end = $epgDetailData['data']['details']['end'];
                // $epgDetailData['data']['details']['file_url'] .= '?start='.$start.'&end='.$end;
            }
            $video_details['data'] = $epgDetailData['data']['details'];
            $view_data['adParams'] = json_encode($adParams);
            $view_data['adEnabled'] = $adEnabled;
            // $view_data['content_details'] = $video_details;
            $view_data['epgDetailData'] = $epgDetailData;
            //pre($view_data['epgDetailData']);die;
            $view_data['content_details'] = $video_details;
            $view_data['totalEndTime'] = json_encode($totalEndTime);
        }
        $date =date("m/d/Y h:i:s A");
        $queryParams = http_build_query($queryParams);
        $view_data['queryParams'] = $queryParams??'';
        $view_data['video'] = $video??'';
        $view_data['video_id'] = $video_id??'';
        $view_data['videoType'] = 'live events';
        $view_data['liveButton'] = $liveButton??'';
        $data['page_data'] = $this->load->view('web/player/live_channel', $view_data, true);
        $data['without_head'] = 2;
        echo modules::run('web/template/call_default_template', $data);
    }


    public function pb_live()
    { 
        $channels = 'channels';
        $radio = 'radio';
        $view_data['channels'] = $channels;
        $view_data['radio'] = $radio;
        $url = "getLiveChannels";
        $document = array('page' => 1);
        $live = [];//call_curl_by_get_method($url, $document);

        $channelTags = [];
        $masterUrl = "getMasterHit";
        $master_data = call_curl_by_get_method($masterUrl, $document=array());
        if(isset($master_data['data']['channelTags'])){
            $channelTags = $master_data['data']['channelTags'];
        }

       // pre($live);die;
        matomo_hit("Page","View","Live");
        matomo_hit("Live","Select","LiveChannel");
        $view_data['live'] = $live;
        $view_data['channelTags'] = $channelTags;
        $view_data['page'] = "live";
        $data['page_data'] = $this->load->view('web/dashboard/pb_live', $view_data, true);
        echo modules::run(TempMSG, $data);
    }

    function filter_live_data(){
        $data = array(
            'status' => false,
            'data' => ''
        );
        if($this->input->post()){
            $id = $this->input->post('id')??0;
            $type = $this->input->post('type')??0;
            if($id >= 0){
                $url = 'getLiveChannelsV2/0/'.$type.'/'.$id;
                $data = call_curl_by_get_method($url, []);
            }
        }
        echo json_encode($data);
    }

    public function favorite()
    {
        $types = $this->input->get('type')??"channels";
        // if($this->input->get('type')){
        //     $types = aes_cbc_decryption_(str_replace(" ", '+', $this->input->get('type')));
        // }
        $channels = 'channels';
        $radio = 'radio';
        $url = "getFavouriteList";
        $document = array();
        $live = array();
        $view_data['types'] = $types;
        $view_data['channels'] = $channels;
        $view_data['radio'] = $radio;
        $view_data['live'] = $live;
        $view_data['page'] = "live";
        $data['page_data'] = $this->load->view('web/dashboard/favorite', $view_data, true);
        echo modules::run(TempMSG, $data);
    }

    private function formatTimestamp($timestamp) {
        $daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $today = strtotime('today');
        $tomorrow = strtotime('tomorrow');
        $yesterday = strtotime('yesterday');
    
        // Determine the relative day (Today, Tomorrow, or the day of the week)
        if ($timestamp >= $today && $timestamp < $tomorrow) {
            $relativeDay = "Today";
        } elseif ($timestamp >= $tomorrow && $timestamp < $tomorrow + 86400) {
            $relativeDay = "Tomorrow";
        } elseif ($timestamp >= $yesterday && $timestamp < $today) {
            $relativeDay = "Yesterday";
        } else {
            $relativeDay = $daysOfWeek[date('w', $timestamp)];
        }
    
        // Format the date with the ordinal suffix
        $dayOfMonth = date('j', $timestamp);
        $ordinalSuffix = date('S', $timestamp);
        $formattedDate = "{$dayOfMonth}{$ordinalSuffix}, {$relativeDay}";
    
        return $formattedDate;
    }


    }
