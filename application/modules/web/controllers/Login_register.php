<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_register extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        modules::run('web/web_panel_ini/web_ini');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'custom', 'cookie'));
        $this->load->helper("services");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
    }

    public function MVF_login()
    {
        if (!empty($this->session->userdata('id'))) {
            redirect('/');
        }
        $data['page_data'] = $this->load->view('web/login/login', true);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function OTP_login()
    {
        //pre($this->session->userdata());die('ok');
        // matomo_hit('Login', 'Login');
        if (!empty($this->session->userdata('id'))) {
            redirect('/');
        }
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/login/otp_login', true);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function delete_account()
    {
        // $id= $_SESSION['profile_data'][0]['user_id'];
        // matomo_hit('AppSetting', 'Delete' .'/'.$id);
        
        $url = 'removeUserAccount';
        $res = file_curl_contents($url, array());
           $this->session->sess_destroy();
        echo json_encode($res);
    }


    public function user_login()
    {

        $data = $this->input->post(); //pre($data);die;
        $url = "users/login_auth";
        $input = $this->input->post();
        $data = [
            'mobile' => $input['mobile'],
            'password' => $input['password'],
            'is_social' => 0,
            'device_id' => 1,
            "device_tokken" => $input['device_token'] ?? "",
            'location' => [
                "lat" => "",
                "lng" => "",
                "ip" => $_SERVER['REMOTE_ADDR'] ?? '',
                "os_version" => "",
                "device_model" => "",
                "manufacturer" => "",
            ]
        ];
        $res = file_curl_contents($url, $data);
        if ($res['status']) {
            $this->session->set_userdata('jwt', $res['data']['jwt']);
            $url = "users/get_my_profile";
            $document1 = array(
                'jwt' => $res['data']['jwt'],
                'device_id' => 0
            );
            $res = file_curl_contents($url, $document1);
            // pre($res);die();
            if ($res['status']) {  //store data in session
                $ses_data = array(
                    'username' => $res['data']['email'],
                    'name' => $res['data']['name'],
                    'id' => $res['data']['id'],
                    'mobile' => $res['data']['mobile'],
                    'pro_img' => $res['data']['profile_picture'],
                    'email' => $res['data']['email'],
                    'APP_ID' => APP_ID
                );
                $this->session->set_userdata($ses_data);
                echo json_encode(array('status' => true, 'is_login' => 1, 'message' => "Login Success."));
            }
        } else {
            echo json_encode($res);
        }

        
    }

    public function user_register()
    {

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $url = "users/registration";
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'password' => $this->input->post('password'),
            'country_code' => $this->input->post('countrycode'),
            'otp' => $this->input->post('otp'),
            'is_social' => 0,
            'device_type' => 3,
            'device_id' => 1,
            'social_type' => 0,
            'device_token' => 12345678,
            'city' => 1,
            'state' => 1
        );
        $res1 = file_curl_contents($url, $data, $pass = 0);
        $res1 = json_decode($res1, TRUE);
        if ($res1['status']) {
            $this->session->set_userdata('jwt', $res1['data']['jwt']);
            $url = "users/get_my_profile";
            $document1 = array(
                'jwt' => $res1['data']['jwt'],
                'device_id' => 0
            );

            $res = file_curl_contents($url, $document1);
            if ($res['status']) {  //store data in session
                $ses_data = array(
                    'username' => $res['data']['email'],
                    'name' => $res['data']['name'],
                    'id' => $res['data']['id'],
                    'mobile' => $res['data']['mobile'],
                    'pro_img' => $res['data']['profile_picture'],
                    'email' => $res['data']['email'],
                    'APP_ID' => APP_ID
                );
                $this->session->set_userdata($ses_data);
                echo json_encode(array('status' => true, 'is_login' => 1));
            }
        } else {
            echo json_encode($res1['status']);
        }
        die;
    }

    public function send_register_otp()
    {

        $this->form_validation->set_rules('mobile', 'mobile', 'required');

        if ($this->form_validation->run() == FALSE) {
            $error = $this->form_validation->get_all_errors();

            $response['status'] = false;
            $response['message'] = $error;
            $response['token']  = $this->security->get_csrf_hash();
        } else {
            $input = $this->input->post();

            $data = [
                'mobile' => $input['mobile'],
                'is_registration' => 1,
                'resend' => 0,
            ];

            $url = "users/send_verification_otp";
            $res = file_curl_contents($url, $data);
            //pre($res);die;
            echo json_encode($res);
            die;
        }
    }


    public function logout()
    {
        //$url = "userLogout";
        $url = "logout";
        $cont_lastupdated = 0;
        $watchList_lastupdated = 0;
        $rating_lastupdated = 0;
        $fav_lastupdated0 = 0;
        $fav_lastupdated1 = 0;
        $document = array();
        $contWatchData = $this->input->post('contWatchData');
        $watchListData = $this->input->post('watchListData');
        $ratingData = $this->input->post('ratingData');
        $favData0 = $this->input->post('favData0');
        $favData1 = $this->input->post('favData1');
        $logout = $this->input->post('logout');
        if (!empty($contWatchData)) {
            $contWatchUrl = "continueWatching";
            $cont_watch_cache = file_curl_contents($contWatchUrl, $contWatchData, '', 'V1/');
            if ($cont_watch_cache['status']) {
                $cont_lastupdated = $cont_watch_cache['data']['lastupdated'];
            }
        }
        if (!empty($watchListData)) {
            $contWatchUrl = "watchList";
            $contWatchCache = file_curl_contents($contWatchUrl, $watchListData, '', 'V1/');
            if ($contWatchCache['status']) {
                $watchList_lastupdated = $contWatchCache['data']['lastupdated'];
            }
        }
        if (!empty($ratingData)) {
            $ratingDataUrl = "rating";
            $ratingDataCache = file_curl_contents($ratingDataUrl, $ratingData, '', 'V1/');
            if ($ratingDataCache['status']) {
                $rating_lastupdated = $ratingDataCache['data']['lastupdated'];
            }
        }
        if (!empty($favData0)) {
            $favDataUrl0 = "favourites";
            $favDataCache = file_curl_contents($favDataUrl0, $favData0, '', 'V1/');
            if ($favDataCache['status']) {
                $fav_lastupdated0 = $favDataCache['data']['lastupdated'];
            }
        }
        if (!empty($favData1)) {
            $favDataUrl1 = "favourites";
            $favDataCache = file_curl_contents($favDataUrl1, $favData1, '', 'V1/');
            if ($favDataCache['status']) {
                $fav_lastupdated1 = $favDataCache['data']['lastupdated'];
            }
        }
        if ($logout == 1) {
            // matomo_hit('Login', 'Logout');
            $logout = file_curl_contents($url, $document);
            //pre($logout); die;
            $logout['status'] = 1;
            if ($logout['status'] ) {
                session_unset();
                session_destroy();
                $res = array(
                    'status' => true,
                    'message' => $this->lang->line("successfully_logout"), //'You are successfully logged out',
                    'cont_lastupdated' => $cont_lastupdated,
                    'watchList_lastupdated' => $watchList_lastupdated,
                    'rating_lastupdated' => $rating_lastupdated,
                    'fav_lastupdated0' => $fav_lastupdated0,
                    'fav_lastupdated1' => $fav_lastupdated1
                );
            } else {
                $res = array('status' => false, 'message' => $this->lang->line("request_failed"));
            }
        } else {
            $res = array(
                'status' => true,
                'message' => $this->lang->line("successfully_logout"), //'You are successfully logged out',
                'cont_lastupdated' => $cont_lastupdated,
                'watchList_lastupdated' => $watchList_lastupdated,
                'rating_lastupdated' => $rating_lastupdated,
                'fav_lastupdated0' => $fav_lastupdated0,
                'fav_lastupdated1' => $fav_lastupdated1
            );
        }
        echo json_encode($res);
    }

    public function forgot_password()
    {
        if (!empty($this->session->userdata('id'))) {
            redirect('/');
        }
        $data['page_data'] = $this->load->view('web/login/forgot_password', true);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function send_forgot_otp()
    {
        $url = "users/retrive_password";
        $data = array(
            'mobile' => $this->input->post('mobile')
        );
        $res = file_curl_contents($url, $data);
        // pre($res);die;
        echo json_encode($res);
    }


    public function verify_forgot_otp()
    { 
        $url = "users/retrive_password";
        $data = array(
            'mobile' => $this->input->post('mobile'),
            'otp' => $this->input->post('otp'),
            'password' => $this->input->post('password'),
        );
        $res = file_curl_contents($url, $data);
        echo json_encode($res);
    }

    public function update_password()
    {
        $url = "users/retrive_password";
        $data = array(
            'mobile' => $this->input->post('mobile'),
            'password' => $this->input->post('password'),
        );
        $res = file_curl_contents($url, $data);
        echo json_encode($res);
    }

    public function prasar_login()
    {
        // matomo_hit('Page', 'View', 'LoginPopup');
        // matomo_hit('Page', 'View', 'MyProfile');
       
        if (empty($this->session->userdata('id'))) {
            redirect('/');
        }

        if (!$this->session->userdata('avtar')) {
            $url = "getMasterHit";
            $res1 = call_curl_by_get_method($url, $document = array());
            $this->session->set_userdata('avtar', $res1['data']['avatar'] ?? '');
        }
        $view_data['profiles'] = $this->session->userdata('profile_data');
        $view_data['count']  = $this->session->userdata('count');
        $data['page_data'] = $this->load->view('web/login/profile_parse', $view_data, true);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function send_otp()
    {
        $login = ($this->input->post('user') == 'UserDetail') ? 'UserDetail' : 'Login';
        // if ($this->input->post('resend') == 1 && $this->input->post('user_detail') == 0 ) {
        //     matomo_hit($login, 'ResendOTP');
        // }
        // else if($this->input->post('resend') == 1 && $this->input->post('user_detail') == 1 ) {
        //     //matomo_hit('UserDetails', 'ResendOTP');
        // }
        //  else {
        //     if($this->input->post('user_detail') == 1){
        //         matomo_hit('UserDetails', 'SendOTP');
        //     }
        //     else{
        //     matomo_hit($login, 'SendOTP');
        //     }
        // }
        if(isset($_POST['primary_url'])){
        $url =   !empty($_POST['primary_url'] == 1) ? "verifyPrimaryAccount" : "sendOtpVerification";
        }else{
            $url = "userLoginSignup";

        }
        $data = array(
            'mobile' => $this->input->post('phone'),
            'country_code' => ($this->input->post('countryCode')) ?? "+91",
            'otp' => ""
        );

        $res = file_curl_contents($url, $data);
       // pre($res);die;
        echo json_encode($res);
    }
    public function verify_otp()
    {
        $url1 = base_url();
        if ($this->input->post()) {
            $this->form_validation->set_rules('otp', 'otp', 'required|numeric|exact_length[6]');
            if ($this->form_validation->run()) {
                $url = "userLoginSignup";
                $activePlanUrl = "activePlan";
                $data = array(
                    'mobile' => $this->input->post('phone'),
                    'country_code' => ($this->input->post('countryCode')) ?? "+91",
                    'otp' => $this->input->post('otp')
                );
                $res = file_curl_contents($url, $data);   
                //pre($res); die;
                //$res = json_decode('{"status":true,"message":"OTP verified successfully","data":{"jwt":"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6NjMsInV1aWQiOiJjMTM0M2M2Mi0zYjRkLTQ4N2UtYWMzYy02N2NlMmQ5YjBhMWMiLCJkZXZpY2VfdHlwZSI6IjMiLCJ2ZXJzaW9uX2NvZGUiOiJWMS4wLjAuMS4zLjIuMSIsInVkX2lkIjoxNzI2MTE4OTA3LCJ0ZW1wVXNlciI6dHJ1ZSwiaWF0IjoxNzI2MTE4OTA3LCJleHAiOjE3MjYxMTk4MDd9.hGY-PMjLylU1Jy5GO9NMwiom5ViIIjBrTZ_eAWzgAg0","user_details":{"id":"c1343c62-3b4d-487e-ac3c-67ce2d9b0a1c","uuid":"c1343c62-3b4d-487e-ac3c-67ce2d9b0a1c","country_code":"+91","mobile":"9015190272","email":null,"gender":null,"dob":null,"login_via":0,"new_user":0,"loggedin_devices":[{"user_device_info_id":"b130e3f6-4e13-43aa-b28b-00f2522eec8c","device_type":3,"device_token":"0161086418644515","device_id":"0161086418644515","device_model":"Mozilla Firefox (130.0)","current_status":1,"created_at":1725604372},{"user_device_info_id":"e4af3d18-d67b-4e07-9812-e09d6e61ce5c","device_type":3,"device_token":"da9q6E6IAZFhksULAiCLyq:APA91bEA4rvoyED_qMlJrUajZNyfjwi4iIpbf7-fjfhbs_XJAAqw0op0PB9sgn7ex7MReZE9JcfD06kVn10zbd94r9M8mvPDsZVvSybts3LdEFc_Qey5rYVrrqsYRXjsBuE2Qr4mOyrS","device_id":"da9q6E6IAZFhksULAiCLyq:APA91bEA4rvoyED_qMlJrUajZNyfjwi4iIpbf7-fjfhbs_XJAAqw0op0PB9sgn7ex7MReZE9JcfD0","device_model":"Google Chrome (128.0.0.0)","current_status":1,"created_at":1725861953},{"user_device_info_id":"10399d0c-82cd-490e-a90b-5e7d62034ac7","device_type":3,"device_token":"fJjobNetutvv79eGJ9g7mx:APA91bFIaLKCWVZv8L5S-4zmtUHq27xy-DumDWDtv8Ffbj1J3KQYkLP1ucg4-l-G0xIakwOYsVQwYtP_pCLnzwqDzA_k5ql3TosMq7j8BGr99kK5Uf-2wQ27Q2xCDwpiImQAPFgOdnEZ","device_id":"fJjobNetutvv79eGJ9g7mx:APA91bFIaLKCWVZv8L5S-4zmtUHq27xy-DumDWDtv8Ffbj1J3KQYkLP1ucg4-l-G0xIakwOYsVQwY","device_model":"Opera","current_status":1,"created_at":1725965772},{"user_device_info_id":"0448ed51-5d49-48d6-a17a-a99cddc8ab65","device_type":3,"device_token":"foV5SnNGq_R9UDW8--sqXH:APA91bGYGEXCH2kKk-q2D8xisr29jNiwVt_CCDYEvxLlXND6SI_rdE-J2--6Er4PHVrsHIX7YyLsS71-raOeOskQ9nIJFE7aZw-Gmn15EEF4LDTfW2aL91PV1Pod5J4dersr9-5r62tG","device_id":"foV5SnNGq_R9UDW8--sqXH:APA91bGYGEXCH2kKk-q2D8xisr29jNiwVt_CCDYEvxLlXND6SI_rdE-J2--6Er4PHVrsHIX7YyLsS","device_model":"Opera","current_status":1,"created_at":1725966850}],"is_device_limit_exceeded":false,"user_profiles":[{"profile_id":"15f43102-5706-11ef-bcdd-0a66e1068957","up_id":"15f43102-5706-11ef-bcdd-0a66e1068957","uuid":"c1343c62-3b4d-487e-ac3c-67ce2d9b0a1c","user_id":"c1343c62-3b4d-487e-ac3c-67ce2d9b0a1c","username":"You","profile":"https:\/\/d3u46owbs61oyy.cloudfront.net\/avtar\/25383181714825773_you1.png","is_default":1,"is_kid":0,"created_at":1722598748,"is_synced":1,"last_updated":1722598748,"modified_at":1722598748,"status":0,"is_deleted":0,"is_subscribe":1},{"profile_id":"15f43201-5706-11ef-bcdd-0a66e1068957","up_id":"15f43201-5706-11ef-bcdd-0a66e1068957","uuid":"c1343c62-3b4d-487e-ac3c-67ce2d9b0a1c","user_id":"c1343c62-3b4d-487e-ac3c-67ce2d9b0a1c","username":"Kids","profile":"https:\/\/d3u46owbs61oyy.cloudfront.net\/avtar\/55879201714825789_you.png","is_default":1,"is_kid":1,"created_at":1722598748,"is_synced":1,"last_updated":1722598748,"modified_at":1722598748,"status":0,"is_deleted":0,"is_subscribe":1}],"is_verified":0}},"error":"","statusCode":200,"messageCode":"108","cd_time":1726118907}',true);         
                if ($res['status']) {
                    $loginVia = $res['data']['user_details']['login_via'];
                    $this->session->set_userdata('jwt', $res['data']['jwt'] ?? "");
                    $ses_data = array(
                        'username' => $res['data']['user_details']['user_profiles'][0]['username'],
                        'master_name' => $res['data']['user_details']['user_profiles'][0]['username'],
                        'profile_id' => $res['data']['user_details']['user_profiles'][0]['profile_id'],
                        'name' => $res['data']['user_details']['user_profiles'][0]['username'],
                        'Iskid' => $res['data']['user_details']['user_profiles'][0]['is_kid'],
                        'isDefault' => $res['data']['user_details']['user_profiles'][0]['is_default'],
                        'id' => $res['data']['user_details']['id'],
                        'uuid' => $res['data']['user_details']['uuid'],
                        'user_device_info_id' => isset($res['data']['user_details']['user_device_info_id'])?$res['data']['user_details']['user_device_info_id']:"web",
                        'mobile' => isset($res['data']['user_details']['mobile']) ? $res['data']['user_details']['mobile'] : '',
                        'email' => $res['data']['user_details']['email'] ?? "",
                        'login_via' => $res['data']['user_details']['login_via'],
                        'new_user' => $res['data']['user_details']['new_user'],
                        'is_verified' => ($res['data']['user_details']['is_verified'])?$res['data']['user_details']['is_verified']:0,
                        'pro_img' => $res['data']['user_details']['user_profiles'][0]['profile'],
                        'country_code' => isset($res['data']['user_details']['country_code']) ? $res['data']['user_details']['country_code'] : '',                        'gender' => isset($res['data']['user_details']['gender']) ? $res['data']['user_details']['gender'] : '',
                        'dob' => isset($res['data']['user_details']['dob']) ? $res['data']['user_details']['dob'] : '',
                        'manage_device_flag' => false
                    );
                    if( $ses_data['Iskid']==0){
                        $ses_data['pro_imga'] =$ses_data['pro_img'];
                    }
                    if(isset($res['data']['user_details']['uuid'])){
                        $ses_data['ud_id'] = $res['data']['user_details']['uuid'];
                    }
                    $device_limit_exceed = false; 
                    if(isset($res['data']['user_details']['is_device_limit_exceeded']) && $res['data']['user_details']['is_device_limit_exceeded'] == true){
                        $ses_data['manage_device_flag'] = true;
                        $device_limit_exceed = true; 
                    }
                    $this->session->set_userdata($ses_data);
                    //$this->session->set_userdata('lang_id', $this->input->post('lang_id') ?? 1);
                    //$this->session->unset_userdata('temp_lang_set');
                    $this->session->userdata('temp_lang_set');
                    $new_user = 0;
                    if ($res['data']['user_details']['new_user'] == 1) {
                        $new_user = 1;
                        if (!empty($this->session->userdata('redirect_url'))) {
                            $url1 = (string) $this->session->userdata('redirect_url');
                            $this->session->unset_userdata('redirect_url');
                        }
                        $activePlanUrl = "activePlan";
                        $activePlan = call_curl_by_get_method($activePlanUrl, []);
                        //pre($activePlan); die;
                        $max_res = DEFAULT_RESOLUTION;
                        if(isset($activePlan['data']['plan']) && !empty($activePlan['data']['plan'])){
                            $usersActivePlan = $activePlan['data']['plan'];
                            
                            if(isset($usersActivePlan['features']) && !empty($usersActivePlan['features'])){
                                foreach($usersActivePlan['features'] as $key => $value){
                                    if(isset($value['type']) && ($value['type']==6)){
                                        preg_match('/\((\d+)[Pp]\)/', $value['value'], $matches);
                                        if (!empty($matches)) {
                                            $max_res = $matches[1];
                                        }
                                    }else if($value['title']=='Video max Quality'){
                                        preg_match('/\((\d+)[Pp]\)/', $value['value'], $matches);
                                        if (!empty($matches)) {
                                            $max_res = $matches[1];
                                        }
                                    }
                                }
                            }                            
                            $this->session->set_userdata('active_plan',$usersActivePlan);
                        }                        
                        $this->session->set_userdata('max_quality',$max_res);
                        $price = $activePlan['data']['detail']['tvod_discount']??0;
                        $this->session->set_userdata('tvod_discount',$price);
                    } else {
                        $url1 = base_url("watching-profile");
                    }
                    if($device_limit_exceed == true){
                        $url1 = base_url("manage-device");
                        $this->session->set_userdata('all_devices', $res['data']['user_details']['loggedin_devices']);
                    }
                    $profile_data = $res['data']['user_details']['user_profiles'];
                    $this->session->set_userdata('count', count($res['data']['user_details']['user_profiles']));
                    $this->session->set_userdata('profile_data', $profile_data);
                    //pre($this->session->userdata());
                    $res = (array('status' => true, 'is_login' => 1, 'new_user' => $new_user, 'message' => "Login Success.", 'url' => $url1, 'device_limit_exceed' => $device_limit_exceed,'login_via'=> $loginVia,'token'=>base64_encode(json_encode($_SESSION))));
                } 
            } else {
                $res = array('status' => false, 'message' => "Please enter valid mobile number.");
            }
        } else {
            $res = array('status' => false, 'message' => "Please enter valid mobile number.");
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($res));
    }

    public function get_watching_details()
    {
        $timestamp = $this->input->post('timestamp');
        $url = "getContinueWatching/lastupdated/" . $timestamp."/platform/0";
        $document = array();
        $lastupdated = 0;
        $data = call_curl_by_get_method($url, $document);
        if ($data['status']) {
            $new_data = array();
            if (!empty($data['data'])) {
                foreach ($data['data'] as $key => $value) {
                    if ($lastupdated < $value['last_updated']) {
                        $lastupdated = $value['last_updated'];
                    }
                    $new_data[$key]['id'] = $value['id'];
                    $new_data[$key]['show_id'] = $value['show_id'];
                    $new_data[$key]['title'] = $value['title'];
                    if (!empty($value['poster_url'])) {
                        $new_data[$key]['poster_url'] = $value['poster_url'];
                    } else {
                        $new_data[$key]['poster_url'] = base_url('assets/images/posterPlaceholder.png');
                    }
                    $new_data[$key]['video_id'] = $value['video_id'];
                    $new_data[$key]['encrypted_id'] = aes_cbc_encryption_($value['video_id']);
                    $new_data[$key]['last_updated'] = $value['last_updated'];
                    $new_data[$key]['updated_at'] = $value['last_updated'];
                    $new_data[$key]['paused_at'] = $value['paused_at'];
                    $new_data[$key]['video_duration'] = $value['video_duration'];
                    $new_data[$key]['is_deleted'] = $value['is_deleted']??0;
                    $new_data[$key]['is_synced'] = $value['is_synced']??1;
                }
                $data['data'] = $new_data;
            }
        }
        $res = array();
        if ($data['status']) {
            $profile_id = $this->session->profile_id;
            $res = array(
                'key' => $profile_id . '-continueWatching',
                'data' => $data['data'],
                'last_updated' => $lastupdated
            );
        }
        echo json_encode($res);
        //}
    }

    public function get_watchlist()
    {
        //if ($this->input->post()) {
        $timestamp = $this->input->post('timestamp');
        $url = "getWatchList/lastupdated/" . $timestamp . "/page/1";
        $document = array();
        $lastupdated = 0;
        $data = call_curl_by_get_method($url, $document, 'V2/');
        if ($data['status']) {
            $new_data = array();
            if (!empty($data['data'])) {
                foreach ($data['data'] as $key => $value) {
                    $lstupdate = $value['last_updated'] ?? 0;
                    if ($lastupdated < $lstupdate) {
                        $lastupdated = $lstupdate;
                    }
                    $new_data[$key]['id'] = $value['id'];
                    $new_data[$key]['title'] = $value['title'];
                    $new_data[$key]['show_id'] = $value['show_id'];
                    $new_data[$key]['enc_show_id'] = aes_cbc_encryption_($value['show_id']);
                    // $new_data[$key]['video_id'] = $value['video_id'];
                    // $new_data[$key]['enc_video_id'] = aes_cbc_encryption_($value['video_id']);
                    $new_data[$key]['media_type'] = $value['type'];
                    $new_data[$key]['poster_url'] = $value['poster_url'];
                    $new_data[$key]['thumbnail_url'] = $value['thumbnail'];
                    $new_data[$key]['description'] = $value['description'];
                    $new_data[$key]['is_synced'] = $value['is_synced'];
                    $new_data[$key]['is_deleted'] = 0;
                    $new_data[$key]['last_updated'] = $lstupdate;
                }
                $data['data'] = $new_data;
            }
        }
        $res = array();
        if ($data['status']) {
            $profile_id = $this->session->profile_id;
            $res = array(
                'key' => $profile_id . '-watchList',
                'data' => $data['data'],
                'last_updated' => $lastupdated
            );
        }
        echo json_encode($res);
        //}
    }

    public function get_ratings()
    {
        //if ($this->input->post()) {
        $timestamp = $this->input->post('timestamp');
        $url = "getRatings/lastupdated/" . $timestamp . "/page/1";
        $document = array();
        $lastupdated = 0;
        $data = call_curl_by_get_method($url, $document, 'V2/');
        if ($data['status']) {
            $new_data = array();
            if (!empty($data['data'])) {
                foreach ($data['data'] as $key => $value) {
                    if ($lastupdated < $value['last_updated']) {
                        $lastupdated = $value['last_updated'];
                    }
                    $new_data[$key]['id'] = $value['id'];
                    $new_data[$key]['show_id'] = $value['show_id'];
                    $new_data[$key]['enc_show_id'] = aes_cbc_encryption_($value['show_id']);
                    $new_data[$key]['rating'] = $value['rating'];
                    $new_data[$key]['is_synced'] = 1;
                    $new_data[$key]['is_deleted'] = 0;
                    $new_data[$key]['last_updated'] = $value['last_updated'];
                }
                $data['data'] = $new_data;
            }
        }
        $res = array();
        if ($data['status']) {
            $profile_id = $this->session->profile_id;
            $res = array(
                'key' => $profile_id . '-ratings',
                'data' => $data['data'],
                'last_updated' => $lastupdated
            );
        }
        echo json_encode($res);
        //}
    }

    public function get_favourite_list()
    {
        //if ($this->input->post()) {
        $timestamp = $this->input->post('timestamp');
        $type = $this->input->post('type');
        $url = "getFavourites/lastupdated/" . $timestamp . "/page/1/type/" . $type.'/platform/0';
        $document = array();
        $lastupdated = 0;
        $data = call_curl_by_get_method($url, $document, 'V1/');
        if ($data['status']) {
            $new_data = array();
            if (!empty($data['data'])) {
                foreach ($data['data'] as $key => $value) {
                    $lstupdate = $value['last_updated'] ?? 0;
                    if ($lastupdated < $lstupdate) {
                        $lastupdated = $lstupdate;
                    }
                    $new_data[$key]['show_id'] = $value['id'];
                    $new_data[$key]['id'] = $value['channel_id'];
                    $new_data[$key]['enc_id'] = aes_cbc_encryption_($value['id']);
                    $new_data[$key]['type'] = $value['type'];
                    $new_data[$key]['thumbnail'] = $value['thumbnail'];
                    $new_data[$key]['poster_url'] = $value['poster_url'];
                    $new_data[$key]['still_live'] = $value['still_live'];
                    $new_data[$key]['is_synced'] = 1;
                    $new_data[$key]['is_deleted'] = 0;
                    $new_data[$key]['last_updated'] = $lstupdate;
                }
                $data['data'] = $new_data;
            }
        }
        $res = array();
        if ($data['status']) {
            $profile_id = $this->session->profile_id;
            $res = array(
                'key' => $profile_id . '-' . (($type==2)?0:$type) . 'favourites',
                'data' => $data['data'],
                'last_updated' => $lastupdated
            );
        }
        echo json_encode($res);
        //}
    }

    public function change_user()
    {
        $img_url = base_url() . "assets/images/person_1.png";
        //matomo_hit('BUTTON', 'PROFILE CHANGED', 'BUTTON_CLICKED');
        $url = base_url();
        $status = false;
        $msg = $this->lang->line("not_responded");
        if ($this->input->post()) {
            //pre($_SESSION);die;
            $this->form_validation->set_rules('profile_id', 'profile_id', 'required');
            $profiles = $this->session->userdata('profile_data');
            if (empty($profiles)) {
                $this->session->sess_destroy();
            } else {
                if ($this->form_validation->run()) {
                    $flag = false;
                    $profile_id = $this->input->post('profile_id');
                    $count = 0;
                    foreach ($profiles as  $value) {
                        if ($value['profile_id'] == $this->input->post('profile_id')) {
                            $flag = true;
                            $ses_data = array(
                                'username' => $value['username'],
                                'profile_id' => $value['profile_id'],
                                'pro_img' => ($value['profile']) ?? $img_url,
                                'name' => $value['username'],
                                'Iskid' => $value['is_kid'],
                                'isDefault'=> $value['is_default']

                            );
                            
                            $this->session->set_userdata($ses_data);
                            
                            $ses_data['Iskid'] = ($ses_data['Iskid'] == 0) ? 'Adult' : 'Child';
                            $string = "{$ses_data['profile_id']}/{$ses_data['username']}/{$ses_data['Iskid']}";
                            // if ($this->session->userdata('profile_count')) {
                            //     matomo_hit('Profile', 'Switch',  $string);
                            // } else {
                            //     matomo_hit('Profile', 'Select',  $string);
                            // }
                            $this->session->set_userdata('profile_count', 1);
                        }
                        if ($count == 0) {
                            $ses_data1['master_name'] = $value['username'];
                            $this->session->set_userdata($ses_data1);
                        }
                        ++$count;
                    }
                    if ($flag == false) {
                        $this->session->sess_destroy();
                    } else {
                        if (!empty($this->session->userdata('redirect_url'))) {
                            $redirects = array('redirect' => 1);
                            $url = (string) $this->session->userdata('redirect_url');
                            if($this->session->userdata('redirect_url') == base_url("subscription")){
                                if(SUBSCRIPTION_CHECK == 1){
                                    $url = base_url("upgrade-subscription");
                                }
                            }
                            $this->session->set_userdata($redirects);
                            $this->session->unset_userdata('redirect_url');
                        }
                        $activePlanUrl = "activePlan";
                        $activePlan = call_curl_by_get_method($activePlanUrl, []);
                        //pre($activePlan); die;
                        $max_res = DEFAULT_RESOLUTION;
                        if(isset($activePlan['data']['plan']) && !empty($activePlan['data']['plan'])){
                            $usersActivePlan = $activePlan['data']['plan'];
                            
                            if(isset($usersActivePlan['features']) && !empty($usersActivePlan['features'])){
                                foreach($usersActivePlan['features'] as $key => $value){
                                    if(isset($value['type']) && ($value['type']==6)){
                                        preg_match('/\((\d+)[Pp]\)/', $value['value'], $matches);
                                        if (!empty($matches)) {
                                            $max_res = $matches[1];
                                        }
                                    }else if($value['title']=='Video max Quality'){
                                        preg_match('/\((\d+)[Pp]\)/', $value['value'], $matches);
                                        if (!empty($matches)) {
                                            $max_res = $matches[1];
                                        }
                                    }
                                }
                            }
                            
                            $this->session->set_userdata('active_plan',$usersActivePlan);

                        }
                        $this->session->set_userdata('max_quality',$max_res);
                        $price = $activePlan['data']['detail']['tvod_discount']??0;
                        $this->session->set_userdata('tvod_discount',$price);
                        
                        $status = true;
                        $msg = $this->lang->line("change_account");
                    }
                } else {
                    $this->session->sess_destroy();
                }
            }
        } else {
            $this->session->sess_destroy();
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('status' => $status, 'message' => $msg, 'url' => $url, 'token'=>base64_encode(json_encode($_SESSION)))));
    }


    public function add_user($pr = '')
    {

        if ($this->input->post()) {
            $url = "updateUserProfile";
            $is_kid = 0;
            if ($this->input->post('is_kid') == 'true') {
                $is_kid = 1;
            }
            //echo $is_kid;
            $profile_id = (string)$this->input->post('profile_id');
            $profile_ids = $this->input->post('profile_id') ?? $this->session->userdata('profile_id');
            $username = (string)$this->input->post('username');
            $document = array(
                'username' =>   $username,
                'activity' => 1,
                'is_kid' => $is_kid,
                'profile' => $this->input->post('profile')
            );
            ////  for delete
            if ($this->input->post('activity') == 3) {
                $document['activity'] = (int)$this->input->post('activity');
                $document['profile_id'] = $profile_id;
                $document['is_kid'] = $is_kid;
                $kidval = ($document['is_kid'] == 0) ? 'Adult' : 'Child';
                $string = "{$document['profile_id']}/{$document['username']}/{$kidval}";
            //    matomo_hit('Profile', 'Delete', $string);
            }
            // for update
            if ($this->input->post('activity') == 2) {
                $document['activity'] = (int)$this->input->post('activity');
                $document['profile_id'] = $profile_id;
                $document['is_kid'] = $is_kid;
                $kidval = ($document['is_kid'] == 0) ? 'Adult' : 'Child';
                $string = "{$document['profile_id']}/{$document['username']}/{$kidval}";
                $avtar = $string;
              //  matomo_hit('Profile', 'Edit', $string);
                // matomo_hit('UserName', 'Edit', $string);
                // matomo_hit('Avatar', 'Edit', $avtar);
            }
            if ($this->input->post('activity') != 3 && $this->input->post('activity') != 2) {
                $kidval = ($document['is_kid'] == 0) ? 'Adult' : 'Child';
                $document['profile_id'] = $profile_id;
                $string = "{$profile_ids}/{$document['username']}/{$kidval}";
                $avtar = $string;
               // matomo_hit('Profile', 'Add', $string);
                // matomo_hit('UserName', 'Add', $string);
                // matomo_hit('Avatar', 'Add', $avtar);
            }
            //pre($document); //die;
            $res = file_curl_contents($url, $document, $profile_id);
            if (isset($res['status']) && $res['status'] == true) {
                $url = "getUserProfile/lastupdated/" . $res['cd_time'];
                $res1 = call_curl_by_get_method($url, $document);
                //TODO:dupllicate data is coming for same profile.
                if ($res1['status']) {
                    unset($_SESSION['profile_data']);
                    unset($_SESSION['count']);

                    $profile_data = $res1['data'];

                    $seen = [];
                    $uniqueArray = array_filter($profile_data, function ($item) use (&$seen) {
                        if (in_array($item['profile_id'], $seen)) {
                            return false;
                        } else {
                            $seen[] = $item['profile_id'];
                            return true;
                        }
                    });
                    $profile_data = [];
                    foreach ($uniqueArray as $value) {
                        $profile_data[] = $value;
                    }
                    //pre($profile_data); die;

                    $this->session->set_userdata('count', count($profile_data, 0));
                    $this->session->set_userdata('profile_data', $profile_data);
                    foreach ($profile_data as $value) {
                        if ($value['profile_id'] == $this->session->profile_id) {
                            $ses_data = array(
                                'profile_id' => $value['profile_id'],
                                'username'  => $value['username'],
                                'name'  => $value['username'],
                                'pro_img' => $value['profile'],
                                'master_name' => $value['username']
                            );
                           if($this->session->Iskid == 0){
                            $ses_data['pro_imga'] =  $ses_data['pro_img'];
                           }
                            $this->session->set_userdata($ses_data);
                        }
                    }
                }
                echo json_encode($res);
                if ($pr == 1) {
                    $this->session->set_userdata('profile_selected', false);
                }
            }
        }
    }

    public function save_details()
    {
        if ($this->input->post()) {
            $url = "users/update_profile";

            $document = array(
                'name' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            );
            // pre($data);die;

            $res = file_curl_contents($url, $document);
            // pre($res);die;
            //pre($res);die;
            echo json_encode($res);
        }
    }

    public function watching_profile()
    {
       // matomo_hit('Login',"Who’sWatching");
        if (empty($this->session->userdata('id'))) {
            redirect('/');
        }
        if (!empty($this->session->profile_selected)) {
            redirect(base_url());
            die;
        }
        $this->session->set_userdata('profile_selected', true);
        if (!$this->session->userdata('avtar')) {
            $url = "getMasterHit";
            $res1 = call_curl_by_get_method($url, $document = array());
            $this->session->set_userdata('avtar', $res1['data']['avatar'] ?? '');
        }

        $view_data['profiles'] = $this->session->userdata('profile_data');
        //pre($view_data['profiles']); die();
        $view_data['count']  = $_SESSION['count'];
        $data['page_data'] = $this->load->view('web/login/watching_profile', $view_data, true);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function set_session()
    {
        if ($this->input->post()) {
            $url = $this->input->post('url');
            if (!empty($url)) {
                $this->session->set_userdata('redirect_url', $url);
            } else {
                $this->session->unset_userdata('redirect_url');
            }
        }
        echo json_encode(true);
    }
    public function my_account()
    {
        if (empty($this->session->userdata('id'))) {
            redirect('/');
        }
        $url = "activePlan";
        $activePlan = call_curl_by_get_method($url, $document = array());
        $view_data['activePlan'] = $activePlan;
        $data['page_data'] = $this->load->view('web/dashboard/my_account', $view_data, TRUE);
        $data['without_head'] = 2;
        echo modules::run('web/template/call_default_template', $data);
    }

    public function my_user_deatails()
    {
        if (empty($this->session->userdata('id'))) {
            redirect('/');
        }
        $view_data = array();
        // matomo_hit('Page', 'View', 'UserDetails');
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/my_user_deatails', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function account_otp_send()
    {
        if ($this->input->post()) {
            pre($_POST);
            die;
        } else {
            pre("something went wrong");
            die;
        }
    }
    public function sendOtpVerification()
    {
        // if ($this->input->post('resend') == 1) {
        //     matomo_hit('UserDetail', 'ResendOTP');
        // } else {
        //     //matomo_hit('UserDetail', 'SendOTP');
        // }
        $url =   !empty($_POST['primary_url'] == 1) ? "verifyPrimaryAccount" : "sendOtpVerification";
        $data = array(
            'mobile' => trim($this->input->post('mediumValue')),
            'country_code' => ($this->input->post('countryCode')) ?? "+91",
            "otp" => $_POST['otp']
        );

        $res = file_curl_contents($url, $data);
        if(!empty($res['status']) && $url == 'sendOtpVerification'){
            $verified['userss'] = '';
            if (filter_var($data['mobile'], FILTER_VALIDATE_EMAIL)) {
                $verified['email']=$data['mobile'];
            }
            if (is_numeric($data['mobile']) && strlen($data['mobile']) > 10) {
                $verified['mobile'] = $data['mobile'];

            }
            $this->session->set_userdata($verified);
        }
        // pre($res);die;
        if($res['status']==true){
            $res['click_via'] = $_POST['click_via'];
        }
        // if ($res['status'] && isset($_POST['click_via']) && $_POST['click_via'] != 1) {
        //     matomo_hit('UserDetail', 'Select', 'WithMoileNumber');
        // } else {
        //     matomo_hit('UserDetail', 'Select', 'WithEmailId');
        // }

        // matomo_hit('UserDetail', 'VerifiedOTP');

        echo json_encode($res);
    }

    public function updateMasterUserProfile()
    {

      //  $array_gender = [1 => 'Male', 2 => 'Female', 3 => 'Others'];
        if (empty($this->session->userdata('id'))) {
            redirect('/');
        }
        if ($this->input->post()) {

            $url = "updateUserMasterProfile";
            $date = date('Y-m-d', strtotime($this->input->post('dob')));
            $data = $document = array(
                'username' => $this->input->post('username'),
                // 'country_code' => $this->input->post('country_code'),
                // 'mobile' => $this->input->post('mobile'),
                // 'email' => $this->input->post('email_id'),
                'gender' => $this->input->post('gender'),
                'dob' => $date,
                'login_via' => $this->input->post('login_via')
            );
            $mobile = '';
            if($_POST['email_id']!=''&& $_POST['mobile']!=''){
                $mobile = $_POST['mobile'];
            }
            if( $this->session->userdata('is_verified') == 0){
                // if($document['login_via']==0  ){
                //     unset($document['mobile']);
                //     unset($document['login_via']);
                // if( $document['email'] !=''){
                //  $document['login_via'] = 1;            
                // }
                $this->session->set_userdata('is_verified',1);
            }else{
                // unset($document['login_via']);
                // if ($document['mobile'] != '') {
                //     $document['login_via'] =0 ;
                // }else{
                //     unset($document['mobile']);

                // }
                $this->session->set_userdata('is_verified',1);
                // unset($document['email']);
            }
            // else{
                // unset($document['email']);  
                // unset($document['mobile']);
                // unset($document['login_via']);
            // }
            // if(empty($document['gender'])){
                // unset($document['gender']);
  
            // }
            // if(empty($document['dob']) || ($document['dob'] == '1970-01-01')){
                // unset($document['dob']);
            // }
            // if (!empty($data['dob'])) {
            //     matomo_hit('UserDetails', 'DateOfBirth', "DOB ( " . $data['dob'] . ")");
            // }
            // if (!empty($data['gender'])) {
            //     matomo_hit('UserDetails', 'Gender', "SelectedGender( " . $array_gender[$data['gender']] . ")");
            // }
            // $m_data = $data['username'] . '/' . $data['mobile'] . '/' . (isset($data['email']) ? $data['email'] : '') . '/' . ($data['gender'] > 0 ? $array_gender[$data['gender']] : '') . '/' . (isset($data['dob']) ? $data['dob'] : '');

            // matomo_hit('UserDetails', 'Update', $m_data);
            //  pre($document);
            $res = file_curl_contents($url, $document);
            // pre($res);die;
            // if ($data['login_via'] == 1 &&   $mobile == '') {
            //     $data['mobile'] = '';
            // }

            $data['name'] = $data['username'];
            $data['master_name'] = $data['username'];
            $data['country_code'] = "+91";
            if ($res['status'] == true) {
                if ($this->session->userdata('Iskid') != 0) {
                    unset($data['username']);
                }
                $this->session->set_userdata($data);

                if ($this->session->userdata("profile_data")) {
                    $all_profile = $this->session->userdata('profile_data');
                    //pre($all_profile); //die;
                    if (isset($all_profile[0])) {
                        $all_profile[0]['username'] = $data['master_name'];
                        $ses_data1['profile_data'] = $all_profile;
                        //pre($ses_data1); die;
                        $this->session->set_userdata($ses_data1);
                    }
                }
            }
                $res['enc'] = base64_encode(json_encode($_POST));
                $res['token'] = base64_encode(json_encode($_SESSION));
            echo json_encode($res);
        }
        die;
    }

    public function settings_details()
    {
        // matomo_hit("Page", "View", "AppSetting");
        $data['without_head'] = 2;
        $view_data = [];
        $data['page_data'] = $this->load->view('web/dashboard/settings', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function sub_devices()
    {
        $url = "activePlan";
        $url2 = "devices";
        $activePlan = call_curl_by_get_method($url, $document = array());
        $mandate_id = ""; $valid_till = "";
        $view_data['mandate_status'] = "1";
        $view_data['payment_method_type'] = "";
        if($activePlan && isset($activePlan['data']) && isset($activePlan['data']['detail'])){
            $mandate_id = isset($activePlan['data']['detail']['mandate_id'])?$activePlan['data']['detail']['mandate_id']:"";
            $valid_till = date("d M, Y",$activePlan['data']['detail']['expiry_date']);
            $view_data['mandate_status'] = isset($activePlan['data']['detail']['mandate_status'])?$activePlan['data']['detail']['mandate_status']:"1";
            $view_data['payment_method_type'] = isset($activePlan['data']['detail']['payment_method_type'])?$activePlan['data']['detail']['payment_method_type']:"";;
        }
        //$view_data['mandate_status'] = "0";
        $view_data['activePlan'] = $activePlan;
        //pre($view_data);die;
        $all_devices = call_curl_by_get_method($url2, $document = array());
        //pre($all_devices); die;
        $my_devices = $other_devices = [];
        if(isset($all_devices['data']) && !empty($all_devices['data'])){
            $i = 0;
            foreach($all_devices['data'] as $each){
                if($each['user_device_info_id'] == $this->session->userdata('user_device_info_id') && $i<1){   // only one device can be shown in my device category/current logged-in device.
                    $my_devices[] = $each;
                    ++$i;
                } else {
                    $other_devices[] = $each;
                }
            }
        }
        
        $view_data['my_devices'] = $my_devices;
        $view_data['valid_till'] = $valid_till;
        $view_data['mandate_id'] = $mandate_id;
        $view_data['other_devices'] = $other_devices;
        $view_data['payment_detail_exists'] = false;


        $url3 = "orderHistory/type/0/page/1";
        $url4 = "orderHistory/type/1/page/1";
        $view_data['subs_status'] = call_curl_by_get_method($url3, []);
        $view_data['transaction'] = call_curl_by_get_method($url4, []);
        $view_data['subs_transaction_exists'] = $view_data['rent_transaction_exists'] = false;
        if(isset($view_data['subs_status']['data']) && !empty($view_data['subs_status']['data'])){ //die('1');
            $view_data['subs_transaction_exists'] = true;
        } 
        if(isset($view_data['transaction']['data']) && !empty($view_data['transaction']['data'])){ //die('2');
            $view_data['rent_transaction_exists'] = true;
        }
        if($view_data['subs_transaction_exists'] == true || $view_data['rent_transaction_exists'] == true) { //die('3');
            $view_data['payment_detail_exists'] = true;
        }

        //pre($view_data['payment_detail_exists']); die;

    // pre($view_data['my_devices']);die; 
      //  matomo_hit("Page", "View", "RegisteredDevice");
        $data['page_data'] = $this->load->view('web/dashboard/subsc_device', $view_data, TRUE);
        $data['without_head'] = 2;
        echo modules::run('web/template/call_default_template', $data);
    }


    public function set_temp_lang(){
        $status = false; $msg = "Error"; $url = base_url();
        if($this->input->post('lang_id')){
            $lang_id = $_POST['lang_id'];
            $lang_matomo = $_POST['lang'];
            $language = strtolower($_POST['lang']);
            // matomo_hit('App', 'Select', 'LanguagePreference ('. $lang_matomo .')');
            $lang = array(
                'lang_id' =>  $language,
                'langid' => $lang_id
            );
            $this->session->set_userdata($lang);
            $this->lang->load('landing_home_lang', $language);
            if($this->input->post('skip')){
                $this->session->userdata('temp_lang_set');
            }
            $status = true; $msg = "success";
        }
        if($this->session->userdata('redirect_url') && $this->session->userdata('redirect_url') != ""){
            $url = $this->session->userdata('redirect_url');
        }
        echo json_encode(['status'=>$status,'message'=>$msg,'url'=>$url]);
    }


    public function save_firebase_token(){
        $status = false;
        if($this->input->post('token')){
            $this->session->set_userdata('firebase_token',$this->input->post('token'));
            $status = true;
        }
        echo json_encode(['status'=>$status]);
    }  

    public function token_to_session(){
        $status = false; $redirection = false;
        if($this->input->post('token')){
            //pre($this->input->post()); die;
            $token = $this->input->post('token');
            $sess_data = json_decode(base64_decode($this->input->post('token')),true);
            //pre($sess_data); die;
            if(!empty($sess_data) && isset($sess_data['jwt'])){
                //pre($sess_data); //die;
                if(isset($sess_data['__ci_last_regenerate'])){
                    unset($sess_data['__ci_last_regenerate']);
                }
                $status = true;
                //if(!$this->session->userdata('session_set')){
                    $this->session->set_userdata($sess_data);
                    $redirection = true;
                //} 
                //$this->session->set_userdata('session_set',true); die;
                //pre($this->session->userdata()); die('okkk');
                //$token = base64_encode(json_encode($_SESSION));
            }
        }
        echo json_encode(['status'=>$status,'redirection'=>$redirection]);
    }


    public function sessionSet(){
        $token = $this->input->post();
        $sess_data = json_decode(base64_decode($this->input->post('sess')),true);
        $this->session->set_userdata($sess_data);
        // pre($_SESSION);die;
        echo json_encode(['status'=>true]); die;
    }
     
    public function newotp_login(){
        $data['page_data'] = $this->load->view('web/login/newotp_login', true);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function deleteSendOtp()
    {
        $login = ($this->input->post('user') == 'UserDetail') ? 'UserDetail' : 'Login';
        if(isset($_POST['primary_url'])){
            $url =   !empty($_POST['primary_url'] == 1) ? "verifyPrimaryAccount" : "sendOtpVerification";
        }else{
            $url = "verifyRegistration";
        }
        $data = array(
            'mobile' => $this->input->post('phone'),
            'country_code' => ($this->input->post('countryCode')) ?? "+91",
            'otp' => ""
        );
        //pre($url); //Invalid mobile number provided  //Invalid email provided
        $res = file_curl_contents($url, $data);
        if($res){
            if(isset($res['status']) && $res['status'] == false){
                $msg =  $res['message'];
                $existing_msg = $res['message'];
                if($existing_msg == "This mobile number is already in use"){
                    $msg = "Invalid mobile number provided";
                } else if($existing_msg == "This email is already in use"){
                    $msg = "Invalid email provided";
                }
                $res['message'] = $msg;
            }
        }
        //pre($res);die;
        echo json_encode($res);
    }



    public function verifyDeleteSendOtp()
    {
        $url1 = base_url();
        if ($this->input->post()) {
            $this->form_validation->set_rules('otp', 'otp', 'required|numeric|exact_length[6]');
            if ($this->form_validation->run()) {
                $url = "verifyRegistration";
                $data = array(
                    'mobile' => $this->input->post('phone'),
                    'country_code' => ($this->input->post('countryCode')) ?? "+91",
                    'otp' => $this->input->post('otp')
                );
                //pre($data);
                $res = file_curl_contents($url, $data);   
                //pre($res); die;
                if ($res['status']) {
                    $this->session->set_userdata('jwt', $res['data']['jwt'] ?? "");
                    $ses_data = array(
                        'id' => $res['data']['user_details']['id'],
                        'uuid' => $res['data']['user_details']['uuid'],
                        //'user_device_info_id' => isset($res['data']['user_details']['user_device_info_id'])?$res['data']['user_details']['user_device_info_id']:"web",
                        'mobile' => isset($res['data']['user_details']['mobile']) ? $res['data']['user_details']['mobile'] : '',
                        'email' => $res['data']['user_details']['email'] ?? "",
                        'country_code' => isset($res['data']['user_details']['country_code']) ? $res['data']['user_details']['country_code'] : '',                        'gender' => isset($res['data']['user_details']['gender']) ? $res['data']['user_details']['gender'] : '',
                       
                    );
                    $this->session->set_userdata($ses_data);
                    //pre($this->session->userdata());
                    $url1 = base_url();
                    $res = (array('status' => true, 'message' => "Account Verified.", 'url' => $url1));
                } 
            } else {
                $res = array('status' => false, 'message' => "Please enter valid mobile number.");
            }
        } else {
            $res = array('status' => false, 'message' => "Please enter valid mobile number.");
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($res));
    }

    public function buypassdelete(){
        if($this->session->userdata('jwt')){
            $url = "removeuseraccount";
            $res = file_curl_contents($url, []);
            //pre($res);die;
            //$this->session->sess_destroy();
            session_unset();
            session_destroy();
            echo json_encode($res);
        } else{
            echo json_encode([]);
        }
    }


    public function save_redirect(){
        //pre($this->input->post());
        $url = $this->input->post('redirect_url');
        if($url){
            $this->session->set_userdata('redirect_url',$url);
            echo json_encode(['status'=>true]); die;
        } else {
            echo json_encode(['status'=>false]); die;
        }
        
    }
}