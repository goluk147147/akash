<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('LOCALHOST', '1');

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('pre')) {
    function pre($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

if (!function_exists('profile')) {
    function profile()
    {
        $CI = &get_instance();

        $url = 'users/get_my_profile';

        $data = [];

        if (empty($CI->session->userdata('my_profile'))) {
            $d = file_curl_contents($url, $data);

            $CI->session->set_userdata('my_profile', $d);
        } else {
            $d = $CI->session->userdata('my_profile');
            // pre($d);die;
        }
        if (isset($d['data']['id'])) {
            $newdata = array(
                'id' => $d['data']['id'],
            );
            $CI->session->set_userdata($newdata);
        }
        return $d;
    }
}

if (!function_exists('saveCache')) {
    function saveCache($data, $input)
    {
        $CI = &get_instance();
        $saveSessionArr['checkSession'] = !empty($CI->session->userdata('checkSession')) ? $CI->session->userdata('checkSession') : [];
        $jsonKey = json_encode($input);
        $jsonKey = "'" . $jsonKey . "'";
        $sessionData[$jsonKey] = $data;
        array_push($saveSessionArr['checkSession'], $sessionData);
        $CI->session->set_userdata($saveSessionArr);
    }
}

if (!function_exists('detectBrowser_bckup')) {
    function detectBrowser_bckup()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown Browser";
        $browserVersion = "";
        $DeviceType = 1;

        // Check for Internet Explorer
        if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
            $browser = "Explorer";
            $DeviceType = 1;
            $browserVersion = preg_match('/MSIE ([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }
        // Check for Edge
        elseif (preg_match('/Edge/i', $userAgent)) {
            $browser = "Edge";
            $DeviceType = 3;
            $browserVersion = preg_match('/Edge\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }
        // Check for Chrome
        elseif (preg_match('/Chrome/i', $userAgent) && !preg_match('/Edge/i', $userAgent)) {
            $browser = "Chrome";
            $DeviceType = 1;
            $browserVersion = preg_match('/Chrome\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }
        // Check for Firefox
        elseif (preg_match('/Firefox/i', $userAgent)) {
            $browser = "Firefox";
            $DeviceType = 1;
            $browserVersion = preg_match('/Firefox\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }
        // Check for Safari
        elseif (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome/i', $userAgent)) {
            $browser = "Safari";
            $DeviceType = 2;
            $browserVersion = preg_match('/Version\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }
        // Check for Opera
        elseif (preg_match('/Opera/i', $userAgent)) {
            $browser = "Opera";
            $DeviceType = 1;
            $browserVersion = preg_match('/Opera\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }
        // Check for other browsers
        else {
            $browserVersion = preg_match('/\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }

        return array(
            'name' => $browser,
            'version' => $browserVersion,
            'DeviceType' => $DeviceType
        );
    }
}

if (!function_exists('detectBrowser')) { // this function using for mainly for device type 
    function detectBrowser()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown"; // Default browser
        $browserVersion = "";
        $DeviceType = 3; // Default device type (e.g., desktop or non-iOS mobile)

        // Check for iOS device (iPhone or iPad)
        $isIOS = preg_match('/(iPhone|iPad)/i', $userAgent);
        // Check for Chrome on iOS (look for 'CriOS')
        if (preg_match('/CriOS\/([0-9.]+)/', $userAgent, $matches)) {
            $browser = "Chrome";
            $DeviceType = $isIOS ? 2 : 3;
            $browserVersion = $matches[1];
        }
        // Check for Chrome on other platforms
        elseif (preg_match('/Chrome\/([0-9.]+)/', $userAgent, $matches)) {
            $browser = "Chrome";
            $DeviceType = 3;
            $browserVersion = $matches[1];
        }
        // Check for Safari but not Chrome
        elseif (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome/i', $userAgent)) {
            $browser = "Safari";
            $DeviceType = 2;
            $browserVersion = preg_match('/Version\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }

        // If an iOS device is detected, ensure DeviceType is set to 2
        if ($isIOS) {
            $DeviceType = 2;
        }

        return array(
            'name' => $browser,
            'version' => $browserVersion,
            'DeviceType' => $DeviceType
        );
    }
}

if (!function_exists('getBrowserName')) {
    function getBrowserName() {
        $browserName = "Unknown";
        $CI = & get_instance();
        //pre($_SERVER); //die;
        if($CI->session->userdata('browserName')){
            $browserName = $CI->session->userdata('browserName');
        } else {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $version = "Unknown";

            // Detect Opera
            if (strpos($userAgent, "Opera") !== false || strpos($userAgent, "OPR") !== false) {
                $browserName = "Opera";
                $versionStart = strpos($userAgent, "OPR") + 4;
                $version = substr($userAgent, $versionStart);
                $version = strtok($version, ")");
            }
            // Detect Edge
            elseif (strpos($userAgent, "Edg") !== false) {
                $browserName = "Microsoft Edge";
                $versionStart = strpos($userAgent, "Edg") + 4;
                $version = substr($userAgent, $versionStart);
            }
            elseif (strpos($userAgent, "Edge") !== false) {
                $browserName = "Microsoft Edge";
                $versionStart = strpos($userAgent, "Edge") + 5;
                $version = substr($userAgent, $versionStart);
            }
            // Detect Chrome
            elseif (strpos($userAgent, "Chrome") !== false && strpos($userAgent, "Safari") !== false) {
                $browserName = "Google Chrome";
                $versionStart = strpos($userAgent, "Chrome") + 7;
                $version = substr($userAgent, $versionStart);
            }
            // Detect Firefox
            elseif (strpos($userAgent, "Firefox") !== false) {
                $browserName = "Mozilla Firefox";
                $versionStart = strpos($userAgent, "Firefox") + 8;
                $version = substr($userAgent, $versionStart);
            }
            // Detect Safari
            elseif (strpos($userAgent, "Safari") !== false && strpos($userAgent, "Chrome") === false) {
                $browserName = "Apple Safari";
                $versionStart = strpos($userAgent, "Version") + 8;
                $version = substr($userAgent, $versionStart);
            }
            // Detect Internet Explorer
            elseif (strpos($userAgent, "Trident") !== false) {
                $browserName = "Microsoft Internet Explorer";
                $versionStart = strpos($userAgent, "rv:") + 3;
                $version = substr($userAgent, $versionStart);
            }

            // Remove extra information
            $version = strtok($version, "; ");
            //$browser_name = $browserName . " (" . $version . ")"; // with version
            $browser_name = $browserName; // without version
        }
        return $browser_name;
    }
}

if (!function_exists('file_curl_contents')) {
    function file_curl_contents($url, $document, $header = '', $version = 'V1/')
    {
        //log_message('debug',json_encode(getallheaders()));
        $CI = & get_instance();
        //$_SERVER['REQUEST_METHOD'] = "POST";
        $jwt = $CI->session->userdata('jwt');

        //$CI->session->set_userdata(['lang_id'=>1]);
        $user_id = $CI->session->userdata('id');
        $user_device_info_id = ($CI->session->userdata('user_device_info_id')) ?? 0;
        $Iskid = ($CI->session->userdata('Iskid')) ?? 0;
        $lang_id = ($CI->session->userdata('langid')) ?? 1;
        // $lang_id = 1;

        $uuid = $CI->session->userdata('uuid');
        if (!$user_id) {
            $user_id = 0;
        }
        $profile_id = ($CI->session->userdata('profile_id')) ?? 0;

        if (!empty($header)) {
            $profile_id = $header;
        }
        $DeviceType = 3;
        $CI->load->helper('aes');
        if (!$CI->session->DeviceType) {
            $browser = detectBrowser();
            $CI->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 3);
            $DeviceType = $browser['DeviceType'];
        } else {
            $DeviceType = $CI->session->DeviceType;
        }


        if(!$CI->session->userdata('token_gen')){
            $token = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 2)), 0, 16);
            $CI->session->set_userdata('token_gen',$token);
        } else {
            $token = $CI->session->userdata('token_gen');
        }

        if($CI->session->userdata('unique_visitor_id')){
            $device_token = $CI->session->userdata('unique_visitor_id');
        } else {
            $device_token = $token;
        }
        $CI->session->set_userdata('device_token',$device_token);
        $device_model = getBrowserName();
        //pre($device_model); die;
        //$DeviceType = 3;
        $isDefault = $CI->session->isDefaults??0;
        $headers = array(
            'Devicetype:'.$DeviceType,
            'Userid:' . $user_id,
            'Uuid:' . $uuid,
            'Profileid:' . $profile_id,
            //'Version: 2001',
            'Version:'.WEB_VERSION,
            'Devicemodel:'.$device_model,
            'Langid:1',
            'Iskid:' . $Iskid,
            'Deviceid:'. $token,
            'Devicetoken:'.$device_token,
            'Content-Type: application/json',
            'Authorization:Bearer ' . $jwt,
            'Userdeviceinfoid:'.$user_device_info_id,
            'age:'. dob_to_age(),
            'country:'. $CI->session->userdata('country_name'),
            'country_code:'. $CI->session->userdata('country_code'),
            'ip:'.$CI->session->userdata('ip'),
            'ud_id:'.($CI->session->userdata('ud_id')),
            'isDefault:'.$isDefault,
            'langcode:'.$lang_id,
            'cloudfront-viewer-country-name-web:'. $CI->session->userdata('country_name')??'India',

        );
        if($CI->session->userdata('manage_device_flag') == true){
            array_push($headers, "istempuser:true");
        } else {
            if(strpos($url, "subscriptionPlansV2")){ 
                unset($headers[11]); 
            } else if(!$CI->session->userdata('id')){
                unset($headers[11]); 
            }
        }
        if(strpos($url, "getHomeSection")){
            $headers['Devicetype']=3;
        }
        //pre($headers); //die;
        $file_url = BASEURLAPI .$version. $url;
        // if(($url == "paymentInitializeV2" && PAYMENT_GATEWAY == "BILLDESK") || ($url == "cancelSubscription") || ($url == "paymentComplete" && PAYMENT_GATEWAY == "BILLDESK")){ // BILLDESK Payment API is on different server
        //     $file_url = "https://devapi.pb-online.co.in/api/" .$version. $url;  
        // }

        $ch = curl_init();
        //pre($CI->session->userdata('jwt'));
        //pre($file_url);
        //pre($document);
        $document = json_encode($document);
        curl_setopt_array($ch, array(
            CURLOPT_URL =>  $file_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $document,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_USERAGENT => getUserAgent()

        ));
        $server_output = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // log_message('debug',$file_url);
        // log_message('debug',json_encode($headers));
        // log_message('debug',json_encode($document));

        // $info = curl_getinfo($ch);
        // pre($info);
        // pre($_SERVER['REQUEST_METHOD']);
        //pre($server_output); die("ok");
        curl_close($ch);
        $lang = $CI->session->userdata('lang_id') ? $CI->session->userdata('lang_id'): "english" ;
        if ($server_output === false) {
            $return = array(
                'status' => false,
                'message' => $CI->lang->line("request_failed")
            );
        } else {
            $return =  json_decode($server_output, True);
            if (!isset($return['status'])) {
                $return = array(
                    'status' => false,
                    'message' => "Server not responded" //$CI->lang->line("not_responded")
                );
            } else {
                generate_api_logs($return,$file_url,$headers);
                // if(!$CI->session->userdata('id')){
                //     $CI->session->unset_userdata('session_expired');
                // } {
                    if ($url == "getMasterHit") {
                        $lang_json_url = isset($return['message']['lang_json_url']) ? $return['message']['lang_json_url'] : base_url('assets/website_assets/lang_strings.json');
                        $CI->session->set_userdata('lang_json_url', $lang_json_url);
                    }
                    $msg_string_arr = get_lang_json($lang);
                    if (isset($return['messageCode']) && !empty($return['messageCode'])) {
                        if (isset($msg_string_arr[$return['messageCode']]) && !empty($msg_string_arr[$return['messageCode']])) {
                            $return['message'] = $msg_string_arr[$return['messageCode']];
                        }
                    }
                    $return['cd_time'] = time();
                //}
            }
        }
        
        // $response_dec = aes_cbc_decryption($server_output, $token);
        $lastUpdate = $CI->session->userdata('lastUpdate');
        return $return;
    }
}

if (!function_exists('call_curl_by_get_method')) {

    function call_curl_by_get_method($url, $document, $version = 'V1/')
    {
        //log_message('debug',json_encode(getallheaders()));
        $CI = & get_instance();
        //pre($url);
        //$_SERVER['REQUEST_METHOD'] = "GET";
        //pre($CI->session->userdata());
        $jwt = $CI->session->userdata('jwt');
        //$CI->session->set_userdata(['lang_id'=>1]);
        $user_id = $CI->session->userdata('id');
        $Iskid = ($CI->session->userdata('Iskid')) ?? 0;
        $DeviceType = 3;
        $user_device_info_id = ($CI->session->userdata('user_device_info_id')) ?? 0;
        $lang_id = ($CI->session->userdata('langid')) ?? 1;
        // $lang_id = 1;
        if (!$CI->session->DeviceType) {
            $browser = detectBrowser();
            $CI->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 3);
            $DeviceType = $browser['DeviceType'];
        } else {
            $DeviceType = $CI->session->DeviceType;
        }
        // if ($CI->session->DeviceType) {
        // $DeviceType = $CI->session->DeviceType;
        // }
        $uuid = $CI->session->userdata('uuid');
        if (!$user_id) {
            $user_id = 0;
        }
        if ($CI->session->userdata("appid") && $jwt != '') {
            $appid = $CI->session->userdata("appid");
        } else {
            $appid = (defined("APP_ID") && APP_ID) ? APP_ID : 0;
        }
        $profile_id = ($CI->session->userdata('profile_id')) ?? 0;

        $CI->load->helper('aes');
        

        if(!$CI->session->userdata('token_gen')){
            $token = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 2)), 0, 16);
            $CI->session->set_userdata('token_gen',$token);
        } else {
            $token = $CI->session->userdata('token_gen');
        }

        if($CI->session->userdata('unique_visitor_id')){
            $device_token = $CI->session->userdata('unique_visitor_id');
        } else {
            $device_token = $token;
        }
        
        $CI->session->set_userdata('device_token',$device_token);
        $device_model = getBrowserName();
        $isDefault = $CI->session->isDefaults??0;

        //$DeviceType = 3;
        $headers = array(
            'Devicetype:' . $DeviceType,/// DONT Change the order
            'Userid:' . $user_id,
            'Uuid:' . $uuid,
            'Profileid:' . $profile_id,
             //'Version: 2001',
            'Version:'.WEB_VERSION,
            'Devicemodel:'.$device_model,
            'Langid: 1' ,
            'Iskid:' . $Iskid,
            'Deviceid:'. $token,
            'Devicetoken:'.$device_token,
            'Content-Type: application/json',
            'Authorization:Bearer '.$jwt,    /// DONT Change the order,
            'Userdeviceinfoid:'.$user_device_info_id,
            'age:'. dob_to_age(),
            'country:'. $CI->session->userdata('country_name'),
            'country_code:'. $CI->session->userdata('country_code'),
            'ip:'.$CI->session->userdata('ip'),
            'ud_id:'.($CI->session->userdata('ud_id')),
           'isDefault:'. $isDefault,
           'langcode:'.$lang_id,
           'cloudfront-viewer-country-name-web:'. $CI->session->userdata('country_name')??'India',
        );
        if(!$CI->session->userdata('header_data')){
            $CI->session->set_userdata('header_data',base64_encode(json_encode($headers)));
        }
        //pre($CI->session->userdata());
        if($CI->session->userdata('manage_device_flag') == true){
            array_push($headers, "istempuser:true");
        } else {
            if(strpos($url, "subscriptionPlansV2") && $url != "devices"){ 
                unset($headers[11]); 
            } else if(!$CI->session->userdata('id')){ 
                unset($headers[11]); 
            }
        }
        
        if(strpos($url, "HomeSection")){
            $headers[0]='Devicetype:3';
        }

        
        
        //unset($headers[11]); 

        //if(BASEURLAPI == "https://node-api.pb-online.co.in/api"){
            $url = appendUserId($url);
        //} 
        // pre($url);die;
        $file_url = BASEURLAPI .$version. $url;
        // log_message('debug',$file_url);
        // log_message('debug',json_encode($headers));
        // if($CI->session->userdata('id')){  // Backend team asking user_id in every API call Having GET method.
        //     if(strpos($file_url, "?")){ 
        //         $file_url = $file_url . "&userId=".$CI->session->userdata('id');
        //     } else {
        //         $file_url = $file_url . "?userId=".$CI->session->userdata('id');
        //     }
        // }
        //pre($file_url); die;
        $ch = curl_init();
        curl_setopt_array($ch, array( // Change $curl to $ch
            CURLOPT_URL => $file_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0, // Increase timeout if necessary
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers, // Remove the $
            CURLOPT_USERAGENT =>  getUserAgent()   //$_SERVER['HTTP_USER_AGENT']
        ));
        $server_output = curl_exec($ch);
        $lang = $CI->session->userdata('lang_id') ? $CI->session->userdata('lang_id') : "english";
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        // pre($document); 
        // pre($file_url);
        // pre($server_output); //die;
        //log_message('OUTPUT',$server_output);
        if ($server_output === false) {
            $data = array(
                'status' => false,
                'message' => $CI->lang->line("request_failed") //'API Request failed'
            );
        } else {
            
            $data =  json_decode($server_output, True);
            if (!isset($data['status'])) {
                $data = array(
                    'status' => false,
                    'message' => "Server not responded" //$CI->lang->line("not_responded")
                );
            } else {
                generate_api_logs($data,$file_url,$headers);
                // if(!$CI->session->userdata('id')){
                //     $CI->session->unset_userdata('session_expired');
                // } {
                    if ($url == "getMasterHit") {
                        $lang_json_url = isset($data['message']['lang_json_url']) ? $data['message']['lang_json_url'] : base_url('assets/website_assets/lang_strings.json');
                        //pre($lang_json_url); //die;
                        $CI->session->set_userdata('lang_json_url', $lang_json_url);
                    }
                    $msg_string_arr = get_lang_json($lang);
                    if (isset($data['messageCode']) && !empty($data['messageCode'])) {
                        if (isset($msg_string_arr[$data['messageCode']]) && !empty($msg_string_arr[$data['messageCode']])) {
                            //pre($msg_string_arr[$data['messageCode']]);
                            $data['message'] = $msg_string_arr[$data['messageCode']];
                        }
                    }
                    $data['cd_time'] = time();
                //}
                
            }
        }
        return $data;
    }
}

if (!function_exists('appendUserId')) {
    function appendUserId($url){
        $array = ['subscriptionPlansV2','orderHistory','activePlan','retrieveRentalStatusByContentIds','rentedContent','getUserProfile','getUserPrefrences','devices','getFavourites','getFavouriteListById','getContinueWatching','getWatchList','getWatchListById','getRatings','getRatingListById','getRecomendationForYou','getVideoUrl','getRating'];
        foreach ($array as $key => $value) {
            if (strpos($url, $value) !== false) {
                $url = modifyUrl($url, $value);
                break;
            }
        }
        return $url;      
    }
}

if (!function_exists('modifyUrl')) {
    function modifyUrl($url, $value) {
        $parsedUrl = parse_url($url);
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
        $CI = & get_instance();
        $profile_id = array("getWatchList", "getWatchListById", "getRatingListById", "getRatings","getFavourites","getFavouriteListById","getContinueWatching");

            if (in_array( $value, $profile_id)){
               $userIdPath = '/userId/'.($CI->session->userdata('profile_id')??0);
            }else{
                $userIdPath = '/userId/'.($CI->session->id);
            }
        
        if ($query) {
            if(isset($parsedUrl['scheme']) && isset($parsedUrl['host'])){
                return $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . $userIdPath . '?' . $query;
            }else{
                return $parsedUrl['path'] . $userIdPath . '?' . $query;
            }
        } else {
            if(isset($parsedUrl['scheme']) && isset($parsedUrl['host'])){
                return $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . $userIdPath;
            }else{
                return $parsedUrl['path'] . $userIdPath;
            }
        }
    }
}

if (!function_exists('game_curl_contents')) {
    function game_curl_contents($file_url, $document = [], $header = [])
    {
        $return = "";
        $CI = & get_instance();

        $secret_key = $header['SecretKey']??"";
        $AccessKey = $header['AccessKey']??"";

        $headers = array(
            'Content-Type: application/json',
            'App-ID:'.$AccessKey,
            'App-Secret:' . $secret_key,
        );
        
        $ch = curl_init();
        $document = json_encode($document);
        curl_setopt_array($ch, array(
            CURLOPT_URL => $file_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $document,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_USERAGENT => getUserAgent()
        ));
        // pre($headers); //die;
        // pre($file_url);
        // pre($document);
        $server_output = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //pre($server_output); die("ok");
        curl_close($ch);
        $lang = $CI->session->userdata('lang_id') ? $CI->session->userdata('lang_id'): "english" ;
        if ($server_output !== false) {
            $return =  json_decode($server_output, True);
        } 
        return $return;
    }
}

if (!function_exists('matomo_hit')) {

    function matomo_hit($action, $view, $pageaction = '', $search_jao="" )
    {
        $CI = &get_instance();
        //  pre($_POST);die;
        // if( $view == 'Logout'){
        //     // setcookie('_pk_id', '', time() - 3600, '/');
        //     setcookie('_pk_ses', '', time() - 3600, '/');
        //     // pre($_COOKIE);die;
        //     $this->configSessionCookieTimeout = 0;
          
        // }
      
        try {

            if(isset($_SESSION['gender'])){
                if($_SESSION['gender']==1){
                    $gender= "Male";
                }
                else if($_SESSION['gender']==2){
                    
                    $gender = "Female";
                }
                else{
                    $gender= "Not Available";
                   }
               }
               else{
                $gender= "Not Available";
               }
        
           if(isset($_SESSION['dob'])){
            if($_SESSION['dob'] !=""){
            $dob = $_SESSION['dob'];
            
            $dobDateTime = new DateTime($dob);
            $todayDate = date('Y-m-d');
            $date2006 = new DateTime($todayDate);
            //pre($date2006);die;
            $diffYears = $dobDateTime->diff($date2006)->y;
            
            }
            else{
                $diffYears= "Not Availabel";
            }
             }
             else{
                $diffYears= "Not Availabel";
             }
            $time = date('H:i:s');
            $res = versions($CI);
            // if (isset($res['data']['log_capture']) && ($res['data']['log_capture'] == 1) && ($_SERVER['SERVER_NAME'] != LOCALHOST)) {
            //     $user_id = $CI->session->userdata('id') ?? generate_uuid($CI);
            //     $profile_id = ($CI->session->userdata('profile_id')) ? $user_id . '_' . $CI->session->userdata('profile_id') . '_' . ($CI->session->userdata('Iskid') == 0 ? 'Adult' : 'Child') : $user_id;
            //     //$profile_id = ($CI->session->userdata('profile_id')) ? $user_id.'_'.$CI->session->userdata('profile_id') . '_' . ($CI->session->userdata('Iskid')==0?'Adult': 'Child' ): $user_id;
            //     $CI = &get_instance();
            //     $tracker = new MatomoTracker($res['data']['log_server_id'], $res['data']['log_url']);
            //     $tracker->setIp($_SERVER['REMOTE_ADDR']);
            //     $tracker->setUserId($profile_id);
            //     if(isset($_POST['search_jao']) && ($_POST['search_jao'])!='' ){
            //         $tracker->setCustomDimension(4,$_POST['search_jao']);
            //         }
            //     $tracker->doTrackEvent($action, $view, $pageaction);
            //     $tracker->setLocalTime($time);
            //     $tracker->setCustomTrackingParameter(1, WEB_VERSION);
            //     $tracker->setCustomTrackingParameter(2, $diffYears);
            //     $tracker->setCustomTrackingParameter(3, $gender);
            //     $tracker->setLatitude('28.5638656');
            //     $tracker->setLongitude('77.3521408');
            //     $tracker->setCountry('India');
            //     $tracker->setRegion('South');
            //     $tracker->setCity('Noida');
            //     $tracker->setGenerationTime(0.5);
            //     //matomo_media_hit($action, $view, $pageaction);
                  
            // }
        
        } catch (Exception $e) {
            // Handle the exception, log it, or take appropriate action.
            // For now, we'll just print the error message.
            //  echo 'Error: ' . $e->getMessage();
        }
    }
}

if (!function_exists('matomo_content_hit')) {

    function matomo_content_hit($action, $view, $pageaction = '', $content_type = '', $checkevent = 1, $pid_name = '',$search_jao='')
    { 
        try {    
            if(isset($_SESSION['gender'])){
                if($_SESSION['gender']==1){
                    $gender= "Male";
                }
                else if($_SESSION['gender']==2){
                    
                    $gender = "Female";
                }
                else{
                    $gender= "Not Available";
                   }
               }
               else{
                $gender= "Not Available";
               }
        
           if(isset($_SESSION['dob'])){
            if($_SESSION['dob'] !=""){
            $dob = $_SESSION['dob'];
            
            $dobDateTime = new DateTime($dob);
            $todayDate = date('Y-m-d');
            $date2006 = new DateTime($todayDate);
            //pre($date2006);die;
            $diffYears = $dobDateTime->diff($date2006)->y;
            
            }
            else{
                $diffYears= "Not Availabel";
            }
             }
             else{
                $diffYears= "Not Availabel";
             }
            $CI = &get_instance();
            $time = date('H:i:s');
            $res = versions($CI);
            //  if (isset($res['data']['log_capture']) && ($res['data']['log_capture'] == 1) && ($_SERVER['SERVER_NAME'] != LOCALHOST)) {
            //     $user_id = $CI->session->userdata('id') ?? generate_uuid($CI);
            //     $profile_id = ($CI->session->userdata('profile_id')) ? $user_id . '_' . $CI->session->userdata('profile_id') . '_' . ($CI->session->userdata('Iskid') == 0 ? 'Adult' : 'Child') : $user_id;
            //     $tracker = new MatomoTracker($res['data']['log_server_id'], $res['data']['log_url']);
            //     $tracker->setUserId($profile_id);
                
            //     if($checkevent == 1 || $checkevent == '' ){
                   
            //         if(isset($_POST['search_jao']) && ($_POST['search_jao'])!='' ){
            //             $tracker->setCustomDimension(4,$_POST['search_jao']);
            //             }  
            //         $tracker->doTrackEvent($action, $view, $pageaction);
            //         }
                   
            //       if($checkevent == 2){
            //     $tracker->setCustomDimension(6,$pid_name);
            //       }
            //       if($content_type!=''){
            //         $pag_con= $pageaction.'-'.$content_type;
            //     $tracker->doTrackContentInteraction($action . '/' . $view, $pageaction,$content_type);
            //       }else{ 
            //         $tracker->doTrackContentInteraction($action . '/' . $view, $pageaction, ' ');
            //       }
            //     $tracker->doTrackContentImpression($pageaction, $content_type, ' ');
            //     $tracker->setLocalTime($time);
            //     $tracker->setCustomTrackingParameter(1, WEB_VERSION);
            //     $tracker->setCustomTrackingParameter(2, $diffYears);
            //     $tracker->setCustomTrackingParameter(3, $gender);
            //     $tracker->setLatitude('28.5638656');
            //     $tracker->setLongitude('77.3521408');
            //     $tracker->setCountry('India');
            //     $tracker->setRegion('South');
            //     $tracker->setCity('Noida');
            //     $tracker->setGenerationTime(0.5);
            //     //matomo_media_hit($action, $view, $pageaction);
            //  }
          
        } catch (Exception $e) {
            // Handle the exception, log it, or take appropriate action.
            // For now, we'll just print the error message.
            //   echo 'Error: ' . $e->getMessage();
        }
    }
}

if (!function_exists('matomo_media_hit')) {
    function matomo_media_hit($action, $view, $pageaction = '')
    {
        $CI = &get_instance();
        $res = versions($CI);
        // pre($res);die;
        // if (isset($res['data']['log_capture']) && ($res['data']['log_capture'] == 1)) {
        //     $user_id = $CI->session->userdata('id') ?? generate_uuid($CI);

        //     try {
        //         $tracker = new MatomoTracker($res['data']['log_server_id'], $res['data']['log_url']);
        //         $tracker->setUserId($user_id);
        //         $tracker->doTrackEvent($action, $view, $pageaction);
        //         $tracker->setCustomTrackingParameter('cma_id', 9);
        //         $tracker->setCustomTrackingParameter('ma_re', 'https://d1wcwl7hbrnc51.cloudfront.net/file_library/videos/vod_non_drm_ios/4019277/1714584062_8878555228643209/1714556895722_524738421439724160_video_VOD.m3u8');
        //         $tracker->setCustomTrackingParameter('ma_ti', 'Media title');
        //         $tracker->setCustomTrackingParameter('ma_mt', 'Video');
        //         $tracker->setCustomTrackingParameter('ma_pn', 'video js');
        //         $tracker->setCustomTrackingParameter('ma_st', '400');
        //         $tracker->setCustomTrackingParameter('ma_le', '3600');
        //         $tracker->setCustomTrackingParameter('ma_ttp', '30');
        //         $tracker->setCustomTrackingParameter('ma_w', '720');
        //         $tracker->setCustomTrackingParameter('ma_st', '1280');
        //         $tracker->setCustomTrackingParameter('ma_fs', '10,30,50');
        //         $tracker->setCustomTrackingParameter('ma_se', '0');
        //         $tracker->setGenerationTime(0.5);

        //         // You can include other tracking methods here if needed

        //         // $tracker->doTrackPageView('Page Title');
        //         // $tracker->doTrackGoal($goalId, $revenue);
        //         // $tracker->doTrackPageView('view video');
        //         // pre($tracker);die;
        //     } catch (Exception $e) {
        //         // Handle any exceptions here
        //         //  echo 'Caught exception: ',  $e->getMessage(), "\n";
        //     }
        // }
    }
}

if (!function_exists('generate_uuid')) {
    function generate_uuid($CI)
    {
        $uuid = $CI->session->tempuuid ?? vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
        $CI->session->set_userdata('tempuuid', $uuid);
        return $uuid;
    }

    function versions($CI)
    {
        $url = "getVersionV2/deviceType/3";
        $res = call_curl_by_get_method($url, $document = array());
        $CI->session->set_userdata('matamo_url', $res['data']['log_url'] ?? '');
        if(BASEURLAPI=="https://api.wavespb.com/api/" && ENVIRONMENT != "production"){
         $CI->session->set_userdata('matamo_url','');

        }
        return $res;
    }


    // function location()
    // {
    //     $data = json_decode(file_get_contents("http://ipinfo.io/"));
    //     if($data){
    //      //  pre($data); pre($data->loc);die;
    //     return $data;
    //     }else{
    //     return array();
    //     }
    // }

    function dob_to_age() {
        $age =100;
        $CI = &get_instance();
        $Iskid = ($CI->session->userdata('Iskid')) ?? 0;
        if($CI->session->userdata('id')){
            $age =   ($Iskid ==1)? 12:100;
        }
        if(isset($_SESSION['dob']) && $_SESSION['dob'] != "") {
           if($CI->session->isDefault == 1 && $Iskid == 0){
            $_SESSION['isDefaults'] = 1;
           }
            
            $dob = $_SESSION['dob'];
            if(isset($_SESSION['age'])){
                $age =  $_SESSION['age'];
            } else {
                // Create DateTime objects for date of birth and today's date
                $dobDateTime = new DateTime($dob);
                $todayDate = new DateTime(); 
        
                $diff = $dobDateTime->diff($todayDate);
                $diffYears = $diff->y;
                if($diffYears > 0){
                    $_SESSION["age"] = $diffYears;
                }
                $age =  $diffYears;
            }
        } 
        return $age;
    }

    function getUserAgent() {
        // $user_agent = $_SERVER['HTTP_USER_AGENT'];
        // if(isset($_SESSION['user_agent'])){
        //     $user_agent =  $_SESSION['user_agent'];
        //     $_SESSION["user_agent"] = $user_agent;
        // } 
        $user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36";
        return $user_agent;
    }

    
    


    function get_lang_json($lang = "english")
    {  // 1-default english
        $CI = &get_instance();
        $return_data = [];
        $json_url = base_url('assets/website_assets/lang_strings.json');
        if ($CI->session->userdata('lang_json_url')) {
            $json_url = $CI->session->userdata('lang_json_url');
            $json_data = json_decode(@file_get_contents($json_url), true);
            //$json_data = json_decode(base_url('assets/website_assets/lang_strings.json'),true);
            if (isset($json_data) && !empty($json_data)) {
                $lang_code = "en";
                switch ($lang) {
                    case "english":
                        $lang_code = "en";
                        break;
                    case "hindi":
                        $lang_code = "hi";
                        break;
                    case "bengali":
                        $lang_code = "bn";
                        break;
                    case "telugu":
                        $lang_code = "te";
                        break;
                    case "tamil":
                        $lang_code = "ta";
                        break;
                    case "punjabi":
                        $lang_code = "pa";
                        break;
                    case "malayalam":
                        $lang_code = "ml";
                        break;
                    case "marathi":
                        $lang_code = "mr";
                        break;
                    case "kannada":
                        $lang_code = "kn";
                        break;
                    case "gujarati":
                        $lang_code = "gu";
                        break;
                }
                if (array_key_exists($lang_code, $json_data)) {
                    $return_data = $json_data[$lang_code];
                } 
                $CI->session->set_userdata('lang_code',$lang_code);
                //pre($return_data);
            }
        }
        return $return_data;
    }
}

if (!function_exists('isMobile')) {
    function isMobile()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $mobileAgents = array(
            'iPhone', 'iPad', 'Android', 'webOS', 'BlackBerry', 'iPod', 'Symbian', 'Windows Phone'
        );
        foreach ($mobileAgents as $device) {
            if (stripos($userAgent, $device) !== false) {
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('generate_api_logs')){
    function generate_api_logs($inputRequest,$api_url,$custom_headers){
        return true;  // Comment out this line for print logs on local machine
        if (is_array($inputRequest)){
            $CI = &get_instance();
            $method = $_SERVER['REQUEST_METHOD'];
            //$api_url = $_SERVER['REQUEST_URI'];
            $headers = getallheaders();
            if(!empty($custom_headers)){
                foreach($custom_headers as $each){
                    $each_line = explode(":",$each);
                    $headers[$each_line[0]] = $each_line[1];
                }
            }
            unset($inputRequest['data']);

            $inputRequest = json_encode($inputRequest);
            $log  = "Time: " . date("F j, Y, h:i:s a"). PHP_EOL ;
            $log  .= "API:". $api_url. PHP_EOL;
            $log  .= "Method: " . $method. PHP_EOL;
            $log  .= "HEADERS: " . json_encode($headers). PHP_EOL;
            $log  .= "REQUEST " . json_encode($CI->input->post()) . PHP_EOL;
            $log  .= "RESPONSE: " . $inputRequest . PHP_EOL;
            
            $log  .= "-------------------------" . PHP_EOL;
            
            $logFile = "assets\log\local_logs.txt";
            file_put_contents($logFile, $log, FILE_APPEND);
            return;
        }
    }
}

// if(!function_exists('get_client_ip_and_country')){
//     function get_client_ip_and_country() {
//         $ipaddress = "0.0.0.0";
//         $country_code = "IN";
//         try{
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/json");
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//             $output = curl_exec($ch);
//             curl_close($ch);
            
//             $data = json_decode($output, true);
//             if(isset($data['ip']) && $data['ip'] != ""){
//                 $ipaddress = $data['ip'];
//                 $country_code = $data['country'];
//             }
//         } catch(Exeception $err){
//             if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP']) {
//                 $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//             } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
//                 $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//             } else if (isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED']) {
//                 $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//             } else if (isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR']) {
//                 $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//             } else if (isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED']) {
//                 $ipaddress = $_SERVER['HTTP_FORWARDED'];
//             } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']) {
//                 $ipaddress = $_SERVER['REMOTE_ADDR'];
//             }
//             // Handle the localhost IPv6 address
//             if ($ipaddress == '::1') {
//                 $ipaddress = '127.0.0.1';
//             }
//         } finally{
//             $json_url = base_url('assets/website_assets/country_iso_code.json');
//             $country_iso_json_data = json_decode(@file_get_contents($json_url), true);
//             $country_name = "India";
//             if (array_key_exists($country_code, $country_iso_json_data)) {
//                 $country_name = $country_iso_json_data[$country_code];
//             } 
//             return ['ip'=>$ipaddress,'country_code'=>$country_code,'country_name'=>$country_name];
//         }
//     }
// }


if(!function_exists('get_client_ip_and_country')){
    function get_client_ip_and_country() {
        $version = 'V1/';
        $ipaddress = "127.0.0.1";
        $country_code = "IN"; $country_name = "India";
        try{
            $ipaddress = get_server_ip();
            //pre($_SERVER);
            //pre($ipaddress); die;
            // Handle the localhost IPv6 address

            if(isset($_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY_NAME']) && $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY_NAME'] != ""){
                $country_name = $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY_NAME'];
            } else if(isset($_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY']) && $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'] != ""){
                $country_name = $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'];
            } else {
                if($ipaddress != "" || $ipaddress != '127.0.0.1'){
                    $CI = &get_instance();
                    $ip_url = "lookup/ip/".$ipaddress;

                    $jwt = $CI->session->userdata('jwt');
                    $user_id = $CI->session->userdata('id');
                    $Iskid = ($CI->session->userdata('Iskid')) ?? 0;
                    $DeviceType = 3;
                    $user_device_info_id = ($CI->session->userdata('user_device_info_id')) ?? 0;
                    $device_model = getBrowserName();
                    //$DeviceType = 3;
                    $headers = array(
                        'Devicetype:' . $DeviceType,
                        'Version:'.WEB_VERSION,
                        'Devicemodel:'.$device_model,
                        'Content-Type: application/json',
                        'Authorization:Bearer '.$jwt,    /// DONT Change the order,
                        'Userdeviceinfoid:'.$user_device_info_id,
                    );
                
                    //pre($headers); die;
                    $file_url = BASEURLAPI .$version. $ip_url;
                    $ch = curl_init();
                    curl_setopt_array($ch, array( // Change $curl to $ch
                        CURLOPT_URL => $file_url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0, // Increase timeout if necessary
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => $headers, // Remove the $
                        CURLOPT_USERAGENT =>  getUserAgent()   //$_SERVER['HTTP_USER_AGENT']
                    ));
                    $server_output = curl_exec($ch);
                    $lang = $CI->session->userdata('lang_id') ? $CI->session->userdata('lang_id') : "english";
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);
                    //pre($server_output);die;
                    if ($server_output != false) {
                        $data =  json_decode($server_output, True);
                        //pre($data); die;
                        if(isset($data['data']['result']) && !empty($data['data']['result'])){ 
                            $country_name = ($data['data']['result']['country_name'])??'India';
                            $country_code = $data['data']['result']['country'];
                        }
                    }
                }
            }            
        } catch(Exeception $err){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($output, true);
            if(isset($data['ip']) && $data['ip'] != ""){
                $ipaddress = $data['ip'];
                $country_code = $data['country'];
            }
        } 
        // finally{
        //     $json_url = base_url('assets/website_assets/country_iso_code.json');
        //     $country_iso_json_data = json_decode(@file_get_contents($json_url), true);
        //     $country_name = "India";
        //     if (array_key_exists($country_code, $country_iso_json_data)) {
        //         $country_name = $country_iso_json_data[$country_code];
        //     } 
            
        // }
        return ['ip'=>$ipaddress,'country_code'=>$country_code,'country_name'=>$country_name];
    }
}

if(!function_exists('get_server_ip')){
    function get_server_ip() {
        $ipaddress = "127.0.0.1";
        try{
            if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP']) {
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else if (isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED']) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            } else if (isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR']) {
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            } else if (isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED']) {
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']) {
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            }
        } catch(Exeception $err){
            $ipaddress = "127.0.0.1";
        }
        if ($ipaddress == '::1') {
            $ipaddress = '127.0.0.1';
        }
        return $ipaddress;
    }
}

if(!function_exists('base64UTF8_encode')){
    function base64UTF8_encode($data) {
        $base64Encoded = "";
        if($data != ""){
            try {
                // Try to convert the data to UTF-8 using 'auto' detection
                $utf8Data = mb_convert_encoding($data, 'UTF-8', 'auto');
            } catch (Exception $e) {
                // If an error occurs, use a fallback encoding
                $utf8Data = mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1');
            }
        }
        // Encode the UTF-8 data to Base64
        return base64_encode($utf8Data);
    }
}

if(!function_exists('base64UTF8_decode')){
    function base64UTF8_decode($data) {
        $base64decoded = "";
        if($data != ""){
            try{
                $utf8Data = base64_decode($data);
                // Convert the UTF-8 data back to the original encoding
                $base64decoded = mb_convert_encoding($utf8Data, 'auto', 'UTF-8');
            } catch(Execption $e){
                $base64decoded = base64_decode($data);
            }
        }
        return $base64decoded;
    }
}
