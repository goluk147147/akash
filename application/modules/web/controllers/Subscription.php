<?php

use Razorpay\Api\Api;

defined('BASEPATH') or exit('No direct script access allowed');

class Subscription extends MX_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        modules::run('web/web_panel_ini/web_ini');
        $this->load->helper(array('aes', 'url', 'custom', 'custom_helper', 'message_sender'));
        $this->load->library(array('form_validation', 'MatomoTracker'));
        $this->load->library('session');
        $this->load->helper('cookie');
    }

    public function subscription_pay()
    {
        $logged_in = false;
        if ($this->session->id) {
            $logged_in = true;
        }
        $publisher_id = 0;
        $publisher_id = ($this->input->get('publisherid'))?$this->input->get('publisherid'):0; 
        // if(defined('SUBSCRIPTION_CHECK') && SUBSCRIPTION_CHECK == 1){
        //    redirect('upgrade-subscription?publisherid='.$publisher_id);
        // }
        $this->session->set_userdata('publisherid',$publisher_id);
        $url =  "subscriptionPlansV2/0/".$publisher_id;
        $url2 = "getLiveChannels";
        $document = [];$subs_plans =  [];
        $subscriptions = call_curl_by_get_method($url, $document);
        //pre($subscriptions); die;
        $publisher_name = TITLE;
        $handled_default_case = false;
        if(empty($subscriptions['data']['plans'])){
            $url =  "subscriptionPlansV2/0/0";
            $subscriptions = call_curl_by_get_method($url, []);
            if(!empty($subscriptions['data']['plans'])){
                $handled_default_case = true;
                $handled_default_case = true;
                // $updated_publisher_id = "0,".$publisher_id;
                // $this->session->set_userdata('publisherid',$updated_publisher_id);
            }
        } 
        if(empty($subscriptions['data']['plans'])){
            redirect('no-data'); die;
        }
            $i = 0;
            if($publisher_id != 0){
                foreach($subscriptions['data']['plans'] as $eachplan){
                    $j = 0;
                    if(!empty($eachplan['pricing'])){
                        $j++;
                        if($j == 1 && $i == 0){
                            $subs_plans[] = $subscriptions['data']['plans'][$i];
                        }
                    }
                    $i++;
                }
                $subscriptions['data']['plans'] = $subs_plans;
                $publisher_name = isset($subscriptions['data']['publisher']['title'])?$subscriptions['data']['publisher']['title']:TITLE;
                if($handled_default_case == true){
                    $publisher_name = TITLE;
                }
            } 
        
        $total_plans = count($subscriptions['data']['plans']);
        
        //pre(json_encode($subscriptions)); echo "<br>"; die;
        $view_data['channels'] = call_curl_by_get_method($url2, $document);
        $view_data['subscriptions'] = $subscriptions ?? [];
        if (isset($view_data['subscriptions']['error']) && !empty($view_data['subscriptions']['error']) && $view_data['subscriptions']['error'] == 100100) {
            $this->logout();
        }
        // $type = $_GET['type'] ?? '';
        // if ($type == 'details') {
        //     matomo_hit("ContentDetailPage", "Select", "SubscribeToWatchNow");
        // }
        // if ($type == 'myaccount') {
        //     matomo_hit("MyAccount", "Select", "Subscription");
        // }
        if($publisher_name == ""){
            $publisher_name = TITLE;
        }
        $view_data['page'] = "subscription";
        $view_data['logged_in'] = $logged_in;
        $view_data['publisher_id'] = $publisher_id;
        $view_data['total_plans'] = $total_plans;
        $view_data['publisher_name'] = $publisher_name; //$this->lang->line('Subscribewatch');
        $view_data['handled_default_case'] = $handled_default_case;
        //pre($view_data); die;
        if (isMobile()) {  // for mobile browser
            if($publisher_id == 0 ){
                $data['page_data'] = $this->load->view('web/subscription/mobile_subscription', $view_data, true);
            } else {
                $data['page_data'] = $this->load->view('web/subscription/subscription', $view_data, true);
            }
        } else {
            $data['page_data'] = $this->load->view('web/subscription/subscription', $view_data, true);
        }
        $data['without_head'] = 1;
        echo modules::run('web/template/call_default_template', $data);
        //matomo_hit("Page", "View", "Subscription");
    }

    public function upgrade_subscriptions()
    {
        $publisher_id = ($this->input->get('publisherid'))?$this->input->get('publisherid'):0; 
        
        $this->session->set_userdata('publisherid',$publisher_id);
        $url = "activePlan";
        $url1 =  "subscriptionPlansV2/0/".$publisher_id;
        $url2 = "getLiveChannels";
        $activePlan = call_curl_by_get_method($url, $document = array());
        if (isset($activePlan['status']) && !$activePlan['status']) {
            $message = isset($activePlan['message']) ? $activePlan['message'] : 'Something went wrong. Please try again.';
            $this->session->set_flashdata('msg_status', "400");
            $this->session->set_flashdata('toast_msg', $message);
            redirect(base_url());
            exit;
        }
        
        $subscriptions = call_curl_by_get_method($url1, $document);
        $handled_default_case = false;
        if(empty($subscriptions['data']['plans'])){
            $subscriptions = call_curl_by_get_method("subscriptionPlansV2/0/0", []);
            if(!empty($subscriptions['data']['plans'])){
                $handled_default_case = true;
            }
        } 
        if(empty($subscriptions['data']['plans'])){
            redirect('no-data'); die;
        }
        //pre($subscriptions['data']); die;
        $i = 0; $publisher_name = "";
        if($publisher_id != 0){
            $subs_plans = [];
            foreach($subscriptions['data']['plans'] as $eachplan){
                $j = 0;
                if(!empty($eachplan['pricing'])){
                    $j++;
                    if($j == 1 && $i == 0){
                        $subs_plans[] = $subscriptions['data']['plans'][$i];
                    }
                }
                $i++;
            }
            $subscriptions['data']['plans'] = $subs_plans;
            $publisher_name = isset($subscriptions['data']['publisher']['title'])?$subscriptions['data']['publisher']['title']:TITLE;
            if($handled_default_case == true){
                $publisher_name = TITLE;
            }
        } 
        if($publisher_name == ""){
            $publisher_name = TITLE;
        }
        $total_plans = count($subscriptions['data']['plans']);

        //pre($subscriptions);die("shhs");
        $view_data['channels'] = call_curl_by_get_method($url2, $document);
        $view_data['activePlan'] = $activePlan;
        $is_upgradable = 0;
        //pre($activePlan['data']['plan']['is_upgradable']); die;
        if(isset($activePlan['data']['plan']['is_upgradable'])){
            $is_upgradable = $activePlan['data']['plan']['is_upgradable'];
        }
       // matomo_hit("Page", "View", "UpgradeSubscription");
        // pre($view_data['activePlan']);die;
        $view_data['subscriptions'] = $subscriptions;
        $view_data['is_upgradable'] = $is_upgradable;
        $view_data['handled_default_case'] = $handled_default_case;
        $view_data['total_plans'] = $total_plans;
        $view_data['publisher_name'] = $publisher_name; //$this->lang->line('Subscribewatch');
        //pre($view_data); die;
        if (isMobile()) {  // for mobile browser
            $data['page_data'] = $this->load->view('web/subscription/mobile_upgrade_subscriptions', $view_data, true);
        } else {
            $data['page_data'] = $this->load->view('web/subscription/upgrade_subscriptions', $view_data, true);
        }
        $data['without_head'] = 1;
        echo modules::run('web/template/call_default_template', $data);
    }


    public function mobile_upgrade_subscriptions()
    {

        $url = "activePlan";
        $url1 =  "subscriptionPlansV2/0/0";
        $url2 = "getLiveChannels";
        $activePlan = call_curl_by_get_method($url, $document = array());
        if (!$activePlan['status']) {
            $this->session->set_flashdata('msg_status', "400");
            $this->session->set_flashdata('toast_msg', $activePlan['message'] ?? 'Something went wrong. Please try again.');
            redirect(base_url());
            die;
        }
        $subscriptions = call_curl_by_get_method($url1, $document);
        $view_data['channels'] = call_curl_by_get_method($url2, $document);
        $view_data['activePlan'] = $activePlan;
        //matomo_hit("Subscription", "View", "Upgrade");

        $view_data['subscriptions'] = $subscriptions;
        $data['page_data'] = $this->load->view('web/subscription/current_upgrade_subscriptions', $view_data, true);


        $data['without_head'] = 1;
        echo modules::run('web/template/call_default_template', $data);
    }

    public function subscription_status()
    {   
        //pre($_REQUEST); die('ss');
       // matomo_hit("CurrentPlanDetail", "Select", "LiveRadioChannels");

        $publisherid = 0;
        $url = "activePlan";
        $url1 =  "subscriptionPlansV2/0/".$publisherid;
        $url2 = "getLiveChannels";
        $activePlan = call_curl_by_get_method($url, $document = array());
        if (!$activePlan['status']) {
            $this->session->set_flashdata('msg_status', "400");
            $this->session->set_flashdata('toast_msg', $activePlan['message'] ?? 'Something went wrong. Please try again.');
            redirect(base_url());
            die;
        }
        // $pur_date = date('d-m-Y', ($activePlan['data']['detail']['purchase_date']));
        // $exp_date = date('d-m-Y', ($activePlan['data']['detail']['expiry_date']));
        // matomo_hit("Page", "View", "CurrentPlanDetail(" . $activePlan['data']['detail']['plan_name'] . "/" . $activePlan['data']['detail']['pricing_title'] . "/" . $activePlan['data']['detail']['amount'] . "/" . $pur_date . "/" . $exp_date . ")");
        $subscriptions = call_curl_by_get_method($url1, $document);
        $view_data['channels'] = call_curl_by_get_method($url2, $document);
        $view_data['activePlan'] = $activePlan;
        $view_data['subscriptions'] = $subscriptions;
        $view_data['publisherid'] = $publisherid;
        if (isMobile()) {  // for mobile browser
            $data['page_data'] = $this->load->view('web/subscription/mobile_current_plan', $view_data, true);
        } else {
            $data['page_data'] = $this->load->view('web/subscription/current_plan', $view_data, true);
        }
        $data['without_head'] = 1;
        echo modules::run('web/template/call_default_template', $data);
    }

    private function decodeBase64Url($data) {
        $base64 = str_replace(['-', '_'], ['+', '/'], $data);
        $padded = str_pad($base64, strlen($base64) % 4, '=', STR_PAD_RIGHT);
        return base64_decode($padded);
    }
    

    private function verifySignature($dataToVerify, $signature, $algorithm) {
        $key = BILLDESK_SECRET_KEY; // Replace with your actual key
        switch ($algorithm) {
            case 'HS256':
                $hash = hash_hmac('sha256', $dataToVerify, $key, true);
                break;
            case 'HS384':
                $hash = hash_hmac('sha384', $dataToVerify, $key, true);
                break;
            case 'HS512':
                $hash = hash_hmac('sha512', $dataToVerify, $key, true);
                break;
            default:
                throw new Exception("Unsupported or invalid algorithm");
        }
        // Compare the signature with the expected hash
        return hash_equals($hash, $signature);
    }


    public function decryptPayload($jws) {
        try {
            list($encodedHeader, $encodedPayload, $encodedSignature) = explode('.', $jws);
            $header = json_decode($this->decodeBase64Url($encodedHeader), true);
            $payload = json_decode($this->decodeBase64Url($encodedPayload), true);
            $signature = $this->decodeBase64Url($encodedSignature);
            //pre($signature);
            $dataToVerify = "$encodedHeader.$encodedPayload";
            if (!$this->verifySignature($dataToVerify, $signature, $header['alg'] = "HS256")) {
                throw new Exception("Invalid signature");
            }
            //pre($payload);
            return $payload;
        } catch (Exception $e) {
            throw new Exception("Failed to decrypt payload: " . $e->getMessage());
        }
    }


    public function razor_verify()
    {
        if (isset($_POST['pre_transaction_id']) && $_POST['pre_transaction_id'] != '') {
            $pre_transaction_id = $_POST['pre_transaction_id'];
            $txn_id = $_POST['razorpay_order_id'];
            $movie_id = $_POST['movie_id'];
            $price = $_POST['price_id'];
            $validity = $_POST['validity'];
            $url =  "paymentComplete";
            if ($_POST['price_id'] == 0) {
                $document = array('type' => 2, 'pay_via' => 3, 'pre_transaction_id' => $pre_transaction_id, 'post_transaction_id' => $txn_id, 'transaction_status' => 1, 'payment_mode' => 1, 'movie_id' => $movie_id);
            } else {
                $document = array('type' => 2, 'pay_via' => 3, 'plan_id' => $movie_id, 'pre_transaction_id' => $pre_transaction_id, 'post_transaction_id' => $txn_id, 'transaction_status' => 1, 'payment_mode' => 0);
            }
            $data['success'] = [
                'pro_id' => $_POST['pro_id'],
                'pre_transaction_id' => $pre_transaction_id,
                'post_transaction_id' => $txn_id,
                'plane_price' => $price,
                'validity' => $validity
            ];

            $this->session->set_userdata($data);
            // pre($document);die;
            $data = file_curl_contents($url, $document);
            
            $profile_data = $this->session->profile_data;
            foreach ($profile_data as $pkey => $pvalue) {
                $profile_data[$pkey]['is_subscribe'] = 1;
            }
            $this->session->set_userdata('profile_data', $profile_data);
            if ($data['status'] == 1) {
                if($this->session->userdata('manage_device_flag')){
                    
                    if(isset($data['data']['jwt'])){ 
                        //pre($this->session->userdata('jwt'));
                        $this->session->set_userdata('jwt',$data['data']['jwt']);
                        $this->session->unset_userdata('manage_device_flag');
                        //pre($data['data']['jwt']); //die;
                        //pre($this->session->userdata('jwt'));
                    }
                }
                //pre($data); die;
                echo json_encode($data);
            }
        } else {
            if (SUBSCRIPTION_CHECK) {
                redirect(base_url('upgrade-subscription'));
            } else {
                redirect(base_url('subscription'));
            }
        }
    }

    private function payment_failed_status($is_rental, $show_id = ""){
        //return true;
        //pre($_SESSION);die;
        // $this->session->set_flashdata('msg_status', "400");
        // $this->session->set_flashdata('toast_msg', 'Payment Failed. Please try again.');
        $this->session->set_userdata('payment_process',"false"); 
        $redirect_url = base_url();
        if($is_rental == true){
            $redirect_url = base_url('play-video?id=').$show_id;
            //matomo_hit("AvailableToRent","PaymentStatus","Failure");
        } else {
            //matomo_hit("Subscription","PaymentStatus","Failure");
            if(isset($_SESSION['referer']) && !empty($_SESSION['referer'])){
                $redirect_url = $_SESSION['referer'];
            } else {
                $redirect_url = base_url('subscription');
            }
        }    
        redirect($redirect_url);
        die;  
    }


    public function billdesk_subscription_status()
    { 
        // $_REQUEST = array(
        //     "transaction_response" => "eyJhbGciOiJIUzI1NiIsImNsaWVudGlkIjoidWF0cHJzaGJodCIsImtpZCI6IkhNQUMifQ.eyJtZXJjaWQiOiJVQVRQUlNIQkhUIiwidHJhbnNhY3Rpb25fZGF0ZSI6IjIwMjQtMTItMDZUMDA6MTU6NDMrMDU6MzAiLCJzdXJjaGFyZ2UiOiIwLjAwIiwicGF5bWVudF9tZXRob2RfdHlwZSI6Im5ldGJhbmtpbmciLCJhbW91bnQiOiI5MC4wMCIsInJ1IjoiaHR0cHM6Ly9zYi53YXZlc3BiLmNvbS9iaWxsZGVzay1zdWJzY3JpcHRpb24tc3RhdHVzIiwib3JkZXJpZCI6Im40d3diOW1pY2RpMTczMzQyNDMxNyIsInRyYW5zYWN0aW9uX2Vycm9yX3R5cGUiOiJzdWNjZXNzIiwiZGlzY291bnQiOiIwLjAwIiwicGF5bWVudF9jYXRlZ29yeSI6IjAyIiwiYmFua19yZWZfbm8iOiJCSUxMREVTSzEyIiwidHJhbnNhY3Rpb25pZCI6IlVTQklJMjkwMDAxNU9ZIiwidHhuX3Byb2Nlc3NfdHlwZSI6Im5iIiwiYmFua2lkIjoiU0JJIiwiYWRkaXRpb25hbF9pbmZvIjp7ImFkZGl0aW9uYWxfaW5mbzEiOiI5OTk5OTU0MzMzIiwiYWRkaXRpb25hbF9pbmZvMyI6Ijg3MyIsImFkZGl0aW9uYWxfaW5mbzIiOiJubyBlbWFpbCIsImFkZGl0aW9uYWxfaW5mbzUiOiIxNSIsImFkZGl0aW9uYWxfaW5mbzQiOiIxMiJ9LCJpdGVtY29kZSI6IkRJUkVDVCIsInRyYW5zYWN0aW9uX2Vycm9yX2NvZGUiOiJUUlMwMDAwIiwiY3VycmVuY3kiOiIzNTYiLCJhdXRoX3N0YXR1cyI6IjAzMDAiLCJ0cmFuc2FjdGlvbl9lcnJvcl9kZXNjIjoiVHJhbnNhY3Rpb24gU3VjY2Vzc2Z1bCIsIm9iamVjdGlkIjoidHJhbnNhY3Rpb24iLCJjaGFyZ2VfYW1vdW50IjoiOTAuMDAifQ.d75SeFbY-Ut0Cd69T_bANVV0Wsr1Vwb_9OfEaJyjS1k"
        // );

        // building session data again
        // 1st attempt
        if(!$this->session->userdata('billdesk_data')){  
            $this->convert_cookie_to_sess(); //die;
            // 2nd attempt
            if(!$this->session->userdata('id')){  
                ?>
                <script type="text/javascript">var base_url = "<?=base_url()?>";</script>
                <script type="text/javascript" src="<?= base_url('assets/js/set_session.js') ?>"></script>
                <?php
            }
            if($this->session->userdata('lang_id')){
                $this->lang->load('landing_home_lang', $this->session->userdata('lang_id'));
            }
        }
        
        //pre($this->session->userdata()); die;
        $publisher_id = ($this->session->userdata('publisherid'))?$this->session->userdata('publisherid'):0;
        $payment_response = $_REQUEST;
        //pre($payment_response);  //die;
        $is_rental = false; $show_id = "";
        $billdesk_sess_data = $this->session->userdata('billdesk_data');
        //pre($billdesk_sess_data); //die;
        $show_id = $billdesk_sess_data['show_id']??"";
        $this->session->set_userdata('is_rental',"NO"); 
        if(isset($billdesk_sess_data['is_rental_video']) && $billdesk_sess_data['is_rental_video'] == 1){
            $is_rental = true;
            $this->session->set_userdata('is_rental',"YES"); 
        }
        if($payment_response){
            if(isset($payment_response['terminal_state']) && $payment_response['terminal_state'] == "111"){ // payment terminate case
                $this->payment_failed_status($is_rental, $show_id);
            } else if(isset($payment_response['transaction_response'])){ //die('if'); // payment fail or success case
                $enc_string = $payment_response['transaction_response'];
                $dec_payment_response = $this->decryptPayload($enc_string);
                //pre($dec_payment_response); die;
                if ($dec_payment_response && isset($dec_payment_response['auth_status'])) {  // success case

                    $transaction_status = -1; // pending case
                    if($dec_payment_response['auth_status'] == "0300"){
                        $transaction_status = 1; // success case
                    } else if($dec_payment_response['auth_status'] == "0399"){
                        $transaction_status = 2; // Failure case  
                    }
                
                    $pre_transaction_id = $billdesk_sess_data['pre_transaction_id'];
                    $plan_id = $billdesk_sess_data['planId']??"";
                    $txn_id = $dec_payment_response['transactionid'];
                    //pre($pre_transaction_id);die;
                    $url_pc =  "paymentComplete";
                    $document = array(
                        'pre_transaction_id' => $pre_transaction_id, 
                        'transaction_status'=> $transaction_status,
                        'post_transaction_id' => $txn_id, 
                        'plan_id'=>$plan_id,
                        'enc_res'=>$enc_string
                    );
                    //pre($document); //die;
                    //sleep(300);
                    $data = file_curl_contents($url_pc, $document);
                    //pre($data); die('ok1');
                    if ((isset($data['status']) && $data['status'] == 1 && $transaction_status == 1)) {
                        $this->session->set_userdata('payment_process',"true"); 
                        //pre($this->session->userdata()); die;
                        if($is_rental == true){ //die('if');  // rental case 
                            $url = "activePlan";
                            $activePlan = call_curl_by_get_method($url, []);
                            if(isset($activePlan['data'])){
                                if(isset($activePlan['data']['plan'])){
                                    $this->session->set_userdata('active_plan',$activePlan['data']['plan']);
                                }

                                $profile_data = $this->session->userdata('profile_data');
                                if($profile_data && isset($activePlan['data']['publishers'])){
                                    try{
                                        foreach ($profile_data as $pkey => $pvalue) {
                                            $profile_data[$pkey]['subscriptions'] = $activePlan['data']['publishers'];
                                        }
                                    } catch (Exception $e) {
                                        // logs
                                        log_message('info',"active plan data could not be set in session");
                                    }
                                    $this->session->set_userdata('profile_data', $profile_data);
                                }

                                if(isset($activePlan['data']['detail']['tvod_discount'])){
                                    $price = $activePlan['data']['detail']['tvod_discount'];
                                    $this->session->set_userdata('tvod_discount',$price);
                                }
                                
                                //$view_data['activePlan'] = $activePlan;
                            }
                            redirect(base_url('play-video?id=').$show_id);
                        } else{ //die('else');  // subscription case
                            if($this->session->userdata('manage_device_flag')){  // payment initiate from manage device screen
                                if(isset($data['data']['jwt'])){ 
                                    $this->session->set_userdata('jwt',$data['data']['jwt']);
                                    $this->session->unset_userdata('manage_device_flag');
                                }
                            }
                            // $profile_data = $this->session->userdata('profile_data');
                            // //pre($profile_data); //die;
                            // if($profile_data){
                            //     try{
                            //         foreach ($profile_data as $pkey => $pvalue) {
                            //             //$profile_data[$pkey]['is_subscribe'] = 1;
                            //             $subscriptions = [];
                            //             if(isset($profile_data[$pkey]['subscriptions']) && is_array($profile_data[$pkey]['subscriptions']) && !empty($profile_data[$pkey]['subscriptions'])){
                            //                 $existing_subscriptions = $profile_data[$pkey]['subscriptions'];
                            //                 // Push latest subscription with existing subscriptions

                            //                 $subscriptions = array_merge($existing_subscriptions, $publisher_id);
                            //                 //$subscriptions[] = (int)$publisher_id;
                            //                 $subscriptions = array_unique($subscriptions);
                            //                 $profile_data[$pkey]['subscriptions'] = $subscriptions;
                            //             } else { //die('ok');
                            //                 //$profile_data[$pkey]['subscriptions'] = [(int)$publisher_id];
                            //                 $profile_data[$pkey]['subscriptions'] = $publisher_id;
                            //             }
                            //         }
                            //     } catch (Exception $e) {
                            //         foreach ($profile_data as $pkey => $pvalue) {
                            //             //$profile_data[$pkey]['subscriptions'] = [(int)$publisher_id];
                            //             $profile_data[$pkey]['subscriptions'] = $publisher_id;
                            //         }
                            //     }
                                
                            //     //pre($profile_data); //die;
                            //     $this->session->set_userdata('profile_data', $profile_data);
                            //     //pre($this->session->userdata()); die;
                            // }
                        }
                    } else { //die("00");
                        $this->payment_failed_status($is_rental, $show_id);
                    }
                } else { //die("01");
                    $this->payment_failed_status($is_rental, $show_id);
                } 
            } else { //die("02"); // any other cases 
                $this->payment_failed_status($is_rental, $show_id);
            }
        } else {
            $this->payment_failed_status($is_rental, $show_id);
        }
        //die('ok');

        
        
        $url = "activePlan";
        $activePlan = call_curl_by_get_method($url, $document = array());
        if(isset($activePlan['data'])){
            if(isset($activePlan['data']['plan'])){
                $this->session->set_userdata('active_plan',$activePlan['data']['plan']);
            }

            $profile_data = $this->session->userdata('profile_data');
            if($profile_data && isset($activePlan['data']['publishers'])){
                try{
                    foreach ($profile_data as $pkey => $pvalue) {
                        $profile_data[$pkey]['subscriptions'] = $activePlan['data']['publishers'];
                    }
                } catch (Exception $e) {
                    // logs
                    log_message('info',"active plan data could not be set in session");
                }
                $this->session->set_userdata('profile_data', $profile_data);
            }

            if(isset($activePlan['data']['detail']['tvod_discount'])){
                 $price = $activePlan['data']['detail']['tvod_discount'];
                 $this->session->set_userdata('tvod_discount',$price);
            }
            
            $view_data['activePlan'] = $activePlan;
        }

        //pre($activePlan); die; 
        if (!$activePlan['status'] && $publisher_id == 0) { //die("3");
            $this->session->set_flashdata('msg_status', "400");
            $this->session->set_flashdata('toast_msg', $activePlan['message'] ?? 'Something went wrong. Please try again.');
            redirect(base_url());
            die;
        }
        
        if($publisher_id != 0){ //pre($publisher_id);
            $publisher_redirect_url = base_url('provider?id=').urlencode(aes_cbc_encryption_($publisher_id));
            //pre($publisher_redirect_url); die;
            $this->session->set_userdata('partner_payment','YES');
            redirect($publisher_redirect_url); 
        } 

        $url1 =  "subscriptionPlansV2/0/".$publisher_id;
        $view_data['subscriptions'] = call_curl_by_get_method($url1, $document);

        $url2 = "getLiveChannels";
        $view_data['channels'] = call_curl_by_get_method($url2, $document);

        $view_data['publisherid'] = $publisher_id;
        //pre($view_data); die;
        if (isMobile()) {  // for mobile browser
            $data['page_data'] = $this->load->view('web/subscription/mobile_current_plan', $view_data, true);
        } else {
            $data['page_data'] = $this->load->view('web/subscription/current_plan', $view_data, true);
        }
        $data['without_head'] = 1;
        echo modules::run('web/template/call_default_template', $data);
    }

    public function apply_code()
    {
        if ($this->input->post()) {
            $plan_id = $this->input->post("plan_id");
            $pricing_id = $this->input->post("id");
            $promoCode = $this->input->post("promoCode");
            $url = "applyCoupon";
            $document  = array('pricingId' => $pricing_id, 'planId' => $plan_id, 'couponCode' => $promoCode);
            //pre($document);//die;
            $data = file_curl_contents($url, $document);
            //pre($data);die;
            echo json_encode($data);
        }
    }

    public function razorpost_backup()
    {
      
        if ($_POST['couponApplied'] > 0) {
            matomo_hit("Promocode", "Apply", $_POST['couponApplied'] ?? 0);
        }
        $upgrade = $this->input->post('upgrade') ?? 0;
        if ($upgrade) {
            matomo_hit("CurrentPlanDetail", "Select", "UpgradeSubscription");
        }
        if (empty($this->session->id)) {
            redirect('/user-login');
        }
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        // following files need to be included
        require_once APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php';
        $api = new Api(RAZOR_KEY, RAZOR_SECRET);

        $pid = $this->input->post('plan_id');
        $rental = $this->input->post('rental');
        $price_id = $this->input->post('id');
        $INDUSTRY_TYPE_ID = 'Retail';
        $CHANNEL_ID = 'WEB';
        $amount = $this->input->post('s_price');
        $upgrade = $this->input->post('upgrade');
        $couponApplied = $this->input->post('couponApplied');
        if (!$couponApplied) {
            $couponApplied = 0;
        }
        // $token = base64_decode($this->input->post('token')); 
        $validity = $this->input->post('validity');
        $gst_amount = $this->input->post('gst_amount');
        $channel_id = $this->input->post('channel_id');
        $data  = array(
            'payVia' => "RAZOR_PAY",
            'amount' => (float)$amount,
            'planId' => (float)$pid,
            'pricingId' => (float)$price_id,
            'tax' => (float)$gst_amount,
            'couponApplied' => $couponApplied,
            'channels' => $channel_id ?? '',
            'is_upgrade' => $upgrade ?? 0
        );
        $subscription = 0;
        $document = $data;
        $url = "paymentInitializeV2";
        // API Integrate to fetch order id
        $data = file_curl_contents($url, $document);
        //pre($document); pre($data);die;
        if ($data['status'] == 1) {
            $ORDER_ID = $data['data']['pre_transaction_id'];
        } else {
            $this->session->set_flashdata('error', "Transaction Failed.");
            $this->session->set_flashdata('msg_status', "400");
            $this->session->set_flashdata('toast_msg', $data['message']);
            redirect($_POST['referer'] ?? base_url());
            die;
            // redirect(base_url());
        }
        $orderData = [
            'receipt'         => $ORDER_ID,
            'amount'          => round($amount + $gst_amount) * 100,
            'currency'        => 'INR',
            'payment_capture' => 1
        ];
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $view_data['razorpay_order_id'] = $razorpayOrderId;
        $view_data['pre_transaction_id'] = $data['data']['pre_transaction_id'];
        $view_data['displayAmount'] = $orderData['amount'];
        $view_data['pro_id'] = $pid;
        $view_data['movie_id'] = ($pid) ? $pid : 0;
        $view_data['TXN_AMOUNT'] = $amount;
        $view_data['rental'] = $rental;
        $view_data['validity'] = $validity;

        $view_data['subscription'] = $subscription;
        //pre($view_data); die;
        $this->load->view('web/subscription/razor_pro', $view_data);
    }

    private function convert_sess_to_cookie(){
        if($this->session->userdata()){
            $sess_expire_time = "900";
            $session_data = $this->session->userdata();
            //pre($this->session->userdata());
            $sess_profile_data_data = $session_data['profile_data']??[];
            $all_device = []; $active_plan = [];
            if(isset($session_data['all_devices'])){
                $all_device = $session_data['all_devices'];
                unset($session_data['all_devices']);
            }
            if(isset($session_data['active_plan'])){
                $active_plan = $session_data['active_plan'];
                unset($session_data['active_plan']);
            }
            unset($session_data['avtar'],$session_data['profile_data']);
            //pre($session_data);
            $temp_sess_data = base64_encode(json_encode($session_data));
            $temp_profile_data = base64_encode(json_encode($sess_profile_data_data));
            //pre($temp_sess_data);
            //pre(strlen($temp_sess_data)); die;
    
            $cookie_name1 = "temp_sess_data";
            $cookie_name2 = "temp_profile_data";
            $cookie_expire = time() + $sess_expire_time;  // 15 minutes from now
            $cookie_path = "/";
            $cookie_domain = "";
            $expire_time = gmdate('D, d-M-Y H:i:s T', $cookie_expire);
            header("Set-Cookie: $cookie_name1=$temp_sess_data; expires=".$expire_time."; path=$cookie_path; domain=$cookie_domain; secure; HttpOnly;", false);
            header("Set-Cookie: $cookie_name2=$temp_profile_data; expires=".$expire_time."; path=$cookie_path; domain=$cookie_domain; secure; HttpOnly;", false);
            if(!empty($all_device)){
                $cookie_name3 = "temp_all_device";
                $temp_all_device = base64_encode(json_encode($all_device));
                header("Set-Cookie: $cookie_name3=$temp_all_device; expires=".$expire_time."; path=$cookie_path; domain=$cookie_domain; secure; HttpOnly;", false);
            }
            if(!empty($active_plan)){
                $cookie_name4 = "temp_active_plan";
                $temp_active_plan = base64_encode(json_encode($active_plan));
                header("Set-Cookie: $cookie_name4=$temp_active_plan; expires=".$expire_time."; path=$cookie_path; domain=$cookie_domain; secure; HttpOnly;", false);
            }
            //pre($temp_sess_data); die('ok');
            //$sess_cookie_data = array(
            //     'name'   => 'temp_sess_data',
            //     'value'  => $temp_sess_data,
            //     'expire' => $sess_expire_time, 
            // );
            // set_cookie($sess_cookie_data);
            // $profile_cookie_data = array(
            //     'name'   => 'temp_profile_data',
            //     'value'  => $temp_profile_data,
            //     'expire' => $sess_expire_time, 
            // );
            // set_cookie($profile_cookie_data);

            //die('ok');
            return true;
        }
    }


    private function convert_cookie_to_sess(){ 
        if(get_cookie('temp_sess_data')){ 
            $temp_sess_data = $this->input->cookie('temp_sess_data', TRUE);
            $sess_data = json_decode(base64_decode($temp_sess_data),true);
            //pre($sess_data); die('hgfghf');

            $temp_profile_data =  $this->input->cookie('temp_profile_data', TRUE);
            $sess_data['profile_data'] = @json_decode(base64_decode($temp_profile_data),true);

            $temp_temp_all_device =  $this->input->cookie('temp_all_device', TRUE);
            if($temp_temp_all_device){
                $sess_data['all_devices'] = @json_decode(base64_decode($temp_temp_all_device),true);
            }   
            
            $temp_temp_active_plan =  $this->input->cookie('temp_active_plan', TRUE);
            if($temp_temp_active_plan){
                $sess_data['active_plan'] = @json_decode(base64_decode($temp_temp_active_plan),true);
            } 

            //pre($sess_data['profile_data']); die;
            try{
                //Fetch master data API for Avatar data
                $getMasterData = call_curl_by_get_method("getMasterHit", []);
                //pre($getMasterData);
                if(!empty($getMasterData)){
                    $sess_data['avtar'] = $getMasterData['data']['avatar']??$getMasterData['data']['avtar'];
                }
            } catch (Exception $e){
                $sess_data['avtar'] = [];
            }
            $_SESSION = $sess_data;
            //pre($this->session->userdata()); 
            //pre($sess_data); die;

            // if($this->session->userdata('jwt')){
            //     delete_cookie('temp_sess_data');
            //     delete_cookie('temp_avatar_data');
            //     delete_cookie('temp_profile_data');
            // }
            return true;
        } 
    }

    public function razorpost()
    {
        //pre($this->input->post()); die;
        $upgrade = $this->input->post('upgrade') ?? 0;      
        if (empty($this->session->id)) {
            redirect('/user-login');
        }
        $this->session->unset_userdata('header_data');
        $pid = $this->input->post('plan_id');
        $rental = $this->input->post('rental');
        $price_id = $this->input->post('id');
        $INDUSTRY_TYPE_ID = 'Retail';
        $CHANNEL_ID = 'WEB';
        $amount = $this->input->post('s_price');
        //$amount = "0";
        $upgrade = $this->input->post('upgrade');
        $couponApplied = (isset($_POST['couponApplied']) && $_POST['couponApplied'] != "")?$_POST['couponApplied']:0;
        if(isset($_POST['coupon_applied_final_price'])){ 
            $amount = $this->input->post('coupon_applied_final_price');
        }
        $publisher_id = ($this->session->userdata('publisherid'))?$this->session->userdata('publisherid'):0;
        //pre($publisher_id);
        $validity = $this->input->post('validity');
        $gst_amount = $this->input->post('gst_amount');
        $channel_id = $this->input->post('channel_id');
        $billdesk_data  = array(
            'payVia' => PAYMENT_GATEWAY, // "RAZOR_PAY",
            'amount' => (float)$amount,
            'planId' => (float)$pid,
            'pricingId' => (float)$price_id,
            'tax' => (float)$gst_amount,
            'couponApplied' => $couponApplied,
            'channels' => '',
            'is_upgrade' => $upgrade ?? 0
        );
        //pre($billdesk_data); die;
        if($amount <= 0){  // Case - Free
            $billdesk_data['payVia'] = "FREE"; 
            $billdesk_data['couponApplied'] = $this->input->post('couponId');
            $billdesk_data['tax'] = 0;
            $url = "freePayment";
            //pre($billdesk_data);
            $data = file_curl_contents($url, $billdesk_data);
            //pre($data ); //die;
            if($data['status'] == 1) { 
                $this->session->set_userdata('payment_process',"true");
                if($this->session->userdata('manage_device_flag')){
                    if(isset($data['data']['jwt'])){ 
                        $this->session->set_userdata('jwt',$data['data']['jwt']);
                        $this->session->unset_userdata('manage_device_flag');
                    }
                }
                // $profile_data = $this->session->userdata('profile_data');
                // //pre($profile_data); //die;
                
                // if($profile_data){
                //     try{
                //         foreach ($profile_data as $pkey => $pvalue) {
                //             //$profile_data[$pkey]['is_subscribe'] = 1;
                //             $subscriptions = [];
                //             if(isset($profile_data[$pkey]['subscriptions']) && is_array($profile_data[$pkey]['subscriptions']) && !empty($profile_data[$pkey]['subscriptions'])){ 
                //                 $subscriptions = $profile_data[$pkey]['subscriptions'];
                //                 // Push latest subscription with existing subscriptions
                //                 $subscriptions[] = (int)$publisher_id;
                //                 $subscriptions = array_unique($subscriptions);
                //                 $profile_data[$pkey]['subscriptions'] = $subscriptions;
                //             } else { 
                //                 $profile_data[$pkey]['subscriptions'] = [(int)$publisher_id];
                //             }
                //         }
                //     } catch (Exception $e) {
                //         foreach ($profile_data as $pkey => $pvalue) {
                //         $profile_data[$pkey]['subscriptions'] = [(int)$publisher_id];
                //         }
                //     }
                    
                //     //pre($profile_data); die;
                //     $this->session->set_userdata('profile_data', $profile_data);
                //     //pre($this->session->userdata()); die;
                // }
                $url = "activePlan";
                $activePlan = call_curl_by_get_method($url, $document = array());
                if(isset($activePlan['data'])){
                    if(isset($activePlan['data']['plan'])){
                        $this->session->set_userdata('active_plan',$activePlan['data']['plan']);
                    }

                    $profile_data = $this->session->userdata('profile_data');
                    if($profile_data && isset($activePlan['data']['publishers'])){
                        try{
                            foreach ($profile_data as $pkey => $pvalue) {
                                $profile_data[$pkey]['subscriptions'] = $activePlan['data']['publishers'];
                            }
                        } catch (Exception $e) {
                            // logs
                            log_message('info',"active plan data could not be set in session");
                        }
                        $this->session->set_userdata('profile_data', $profile_data);
                    }

                    if(isset($activePlan['data']['detail']['tvod_discount'])){
                        $price = $activePlan['data']['detail']['tvod_discount'];
                        $this->session->set_userdata('tvod_discount',$price);
                    }
                    
                    $view_data['activePlan'] = $activePlan;
                }
                //pre($activePlan); die; 
                if (!$activePlan['status'] && $publisher_id == 0) { //die("3");
                    $this->session->set_flashdata('msg_status', "400");
                    $this->session->set_flashdata('toast_msg', $activePlan['message'] ?? 'Something went wrong. Please try again.');
                    redirect(base_url());
                    die;
                }
                if($publisher_id != 0){ //pre($publisher_id);
                    $publisher_redirect_url = base_url('provider?id=').urlencode(aes_cbc_encryption_($publisher_id));
                    //pre($publisher_redirect_url); die;
                    $this->session->set_userdata('partner_payment','YES');
                    redirect($publisher_redirect_url); die;
                } else{
                    $data = [];
                    //pre($subscriptions); die;
                    $view_data['channels'] = call_curl_by_get_method("getLiveChannels", []);
                    $view_data['subscriptions'] = call_curl_by_get_method("subscriptionPlansV2/0/".$publisher_id, []);
                    $view_data['publisherid'] = $publisher_id;
                    
                    //pre($view_data); die;
                    if (isMobile()) {  // for mobile browser
                        $data['page_data'] = $this->load->view('web/subscription/mobile_current_plan', $view_data, true);
                    } else {
                        $data['page_data'] = $this->load->view('web/subscription/current_plan', $view_data, true);
                    }
                    $data['without_head'] = 1;
                    echo modules::run('web/template/call_default_template', $data);
                    // if (isMobile()) { 
                    //     redirect(base_url('mobile-upgrade-subscription'));die;
                    // } else {
                    //     redirect(base_url('upgrade-subscription'));die;
                    // }
                }   
            } else { 
                //$this->session->set_userdata('payment_process',"false");
                $this->session->set_flashdata('error', "Transaction Failed.");
                $this->session->set_flashdata('msg_status', "400");
                $this->session->set_flashdata('toast_msg', $data['message']);
                redirect($_POST['referer'] ?? base_url());die;
            }
        } else{ // Case - Paid
            $subscription = 0;
            //pre($billdesk_data);
            $url = "paymentInitializeV2";
            $data = file_curl_contents($url, $billdesk_data);  
            //pre($data); die;
            
            if(PAYMENT_GATEWAY == "BILLDESK"){  //billdesk
                //pre($this->session->userdata()); die('ok1');
                if ($data['status'] == 1) { 
                    $this->session->set_userdata('payment_process',"false");
                    $ORDER_ID = $data['data']['pre_transaction_id'];
                    $billdesk_data['pre_transaction_id'] = $ORDER_ID;
                    $this->session->set_userdata("billdesk_data",$billdesk_data);
                    $this->session->set_userdata("referer",$_SERVER['HTTP_REFERER']??'');
                    $view_data['href'] = $data['data']['links']['href']??BILLDESK_URL;
                    $view_data['bdorderid'] = $data['data']['links']['bdorderid']??"";
                    $view_data['rdata'] = $data['data']['links']['rdata']??"";
                    $view_data['subscription'] = $subscription;
                    //pre($view_data); die;
                    $this->convert_sess_to_cookie(); //die;
                    $this->load->view('web/subscription/billdesk', $view_data);
                } else {  
                    $this->session->set_flashdata('error', "Transaction Failed.");
                    $this->session->set_flashdata('msg_status', "400");
                    $this->session->set_flashdata('toast_msg', $data['message']);
                    redirect($_POST['referer'] ?? base_url());die;
                }          
            } else { // Razorpay
                header("Pragma: no-cache");
                header("Cache-Control: no-cache");
                header("Expires: 0");
                if ($data['status'] == 1) {
                    $ORDER_ID = $data['data']['pre_transaction_id'];
                } else {
                    $this->session->set_flashdata('error', "Transaction Failed.");
                    $this->session->set_flashdata('msg_status', "400");
                    $this->session->set_flashdata('toast_msg', $data['message']);
                    redirect($_POST['referer'] ?? base_url());
                    die;
                    
                }
                $orderData = [
                    'receipt'         => $ORDER_ID,
                    'amount'          => round($amount + $gst_amount) * 100,
                    'currency'        => 'INR',
                    'payment_capture' => 1
                ];
                require_once APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php';
                $api = new Api(RAZOR_KEY, RAZOR_SECRET);

                $razorpayOrder = $api->order->create($orderData);
                $razorpayOrderId = $razorpayOrder['id'];
                $_SESSION['razorpay_order_id'] = $razorpayOrderId;
                $view_data['razorpay_order_id'] = $razorpayOrderId;
                $view_data['pre_transaction_id'] = $data['data']['pre_transaction_id'];
                $view_data['displayAmount'] = $orderData['amount'];
                $view_data['pro_id'] = $pid;
                $view_data['movie_id'] = ($pid) ? $pid : 0;
                $view_data['TXN_AMOUNT'] = $amount;
                $view_data['rental'] = $rental;
                $view_data['validity'] = $validity;
        
                $view_data['subscription'] = $subscription;
                //pre($view_data); die;
                $this->load->view('web/subscription/razor_pro', $view_data);
            }
        }
        
    }

    public function razorpost_rental()
    { 
        //http://localhost/prasar_bharti/pb_webapplication/play-video?id=fJ8RdMZFmRPT76eEF6JzBA==:MTIzNDU2Nzg5MDEyMzQ1Ng==
        if (empty($this->session->id)) {
            redirect('/user-login');
        }
        $this->session->unset_userdata('header_data'); 
        $this->session->set_userdata('is_rental',"YES"); 
        $pid = $this->input->post('plan_id');
        $rental = $this->input->post('rental');
        $price_id = $this->input->post('id');
        $show_id = $this->input->post('show_id');
        $INDUSTRY_TYPE_ID = 'Retail';
        $CHANNEL_ID = 'WEB';
        $amount = $this->input->post('s_price');
        $upgrade = $this->input->post('upgrade');
        $couponApplied = $this->input->post('couponApplied');
        if (!$couponApplied) {
            $couponApplied = 0;
        }
        // if($this->input->post('coupon_applied_final_price')){
        //     $amount = $this->input->post('coupon_applied_final_price');
        // }
        // $token = base64_decode($this->input->post('token')); 
        $validity = $this->input->post('validity');
        $gst_amount = $this->input->post('gst_amount');
        $channel_id = $this->input->post('channel_id');
        $data  = array(
            'payVia' => PAYMENT_GATEWAY,
            'amount' => (float)$amount,
            'planId' => (float)$pid,
            'pricingId' => (float)$price_id,
            'tax' => (float)$gst_amount,
            'couponApplied' => $couponApplied,
            'channels' => '',
            'is_upgrade' => $upgrade ?? 0
        );
        $subscription = 0;
        $document = $data;
        if($amount <= 0){  // Case - Free
            $document['payVia'] = "FREE"; 
            $billdesk_data['tax'] = 0;
            //$document['couponApplied'] = $this->input->post('couponId');
            $url = "freePayment";
            //pre($document); die;
            $data = file_curl_contents($url, $document);
            //pre($data ); die;
            if($data['status'] == 1) { 
                $this->session->set_userdata('payment_process',"true");
                //redirect(base_url('play-video?id=' . aes_cbc_encryption_($show_id)));
            } else {
                $this->session->set_flashdata('error', "Transaction Failed.");
                $this->session->set_flashdata('msg_status', "400");
                $this->session->set_flashdata('toast_msg', $data['message']);
                //$this->session->set_userdata('payment_process',"false");
                //redirect($_POST['referer'] ?? base_url());die;
            }
            //pre($this->session->userdata()); die;

            $activePlan = call_curl_by_get_method("activePlan", []);
            if(isset($activePlan['data'])){
                if(isset($activePlan['data']['plan'])){
                    $this->session->set_userdata('active_plan',$activePlan['data']['plan']);
                }

                $profile_data = $this->session->userdata('profile_data');
                if($profile_data && isset($activePlan['data']['publishers'])){
                    try{
                        foreach ($profile_data as $pkey => $pvalue) {
                            $profile_data[$pkey]['subscriptions'] = $activePlan['data']['publishers'];
                        }
                    } catch (Exception $e) {
                        // logs
                        log_message('info',"active plan data could not be set in session");
                    }
                    $this->session->set_userdata('profile_data', $profile_data);
                }

                if(isset($activePlan['data']['detail']['tvod_discount'])){
                    $price = $activePlan['data']['detail']['tvod_discount'];
                    $this->session->set_userdata('tvod_discount',$price);
                }
            }
            redirect(base_url('play-video?id=' . aes_cbc_encryption_($show_id)));
        } else{ // Case - Paid
            $url = "paymentInitializeV2";
            $data = file_curl_contents($url, $document);
            //pre($data); die;
            if(PAYMENT_GATEWAY == "BILLDESK"){  //billdesk
                if ($data['status'] == 1) {
                    
                    $ORDER_ID = $data['data']['pre_transaction_id'];
                    $billdesk_data['pre_transaction_id'] = $ORDER_ID;
                    $billdesk_data['rental'] = $rental;
                    $billdesk_data['pre_transaction_id'] = $data['data']['pre_transaction_id'];
                    $billdesk_data['displayAmount'] = round($amount + $gst_amount) * 100;
                    $billdesk_data['pro_id'] = $pid;
                    $billdesk_data['movie_id'] = ($pid) ? $pid : 0;
                    $billdesk_data['TXN_AMOUNT'] = $amount;
                    $billdesk_data['rental'] = $rental;
                    $billdesk_data['show_id'] = aes_cbc_encryption_($show_id);
                    $billdesk_data['validity'] = $validity;
                    //$view_data['show_id'] = aes_cbc_encryption_($this->input->post('show_id')); 
                    $billdesk_data['subscription'] = $subscription;
                    $billdesk_data['is_rental_video'] = 1;
                    $this->session->set_userdata("billdesk_data",$billdesk_data);
                    $this->session->set_userdata("referer",$_SERVER['HTTP_REFERER']??'');
                    $view_data['href'] = $data['data']['links']['href']??BILLDESK_URL;
                    $view_data['bdorderid'] = $data['data']['links']['bdorderid']??"";
                    $view_data['rdata'] = $data['data']['links']['rdata']??"";
                    $view_data['subscription'] = $subscription;
                    //pre($view_data); die;
                    $this->convert_sess_to_cookie(); //die;
                    $view_data['is_rental'] = ($billdesk_data['is_rental_video'] == true)?1:0;
                    $this->load->view('web/subscription/billdesk', $view_data);
                } else {  
                    $this->session->set_flashdata('error', "Transaction Failed.");
                    $this->session->set_flashdata('msg_status', "400");
                    $this->session->set_flashdata('toast_msg', $data['message']);
                    //redirect($_POST['referer'] ?? base_url());
                    redirect(base_url('play-video?id=' . aes_cbc_encryption_($show_id)));
                    die;
                }          
            } else { // Razorpay
                // pre($data);die;
                header("Pragma: no-cache");
                header("Cache-Control: no-cache");
                header("Expires: 0");
                require_once APPPATH . 'third_party/razorpay/razorpay-php/Razorpay.php';
                $api = new Api(RAZOR_KEY, RAZOR_SECRET);

                if ($data['status'] == 1) {
                    $ORDER_ID = $data['data']['pre_transaction_id'];
                } else {
                    $this->session->set_flashdata('error', "Transaction Failed.");
                    $this->session->set_flashdata('msg_status', "400");
                    $this->session->set_flashdata('toast_msg', $data['message']);
                    redirect(base_url('play-video?id=' . aes_cbc_encryption_($show_id)));
                    die;
                }
                $orderData = [
                    'receipt'         => $ORDER_ID,
                    'amount'          => round($amount + $gst_amount) * 100,
                    'currency'        => 'INR',
                    'payment_capture' => 1
                ];
                $razorpayOrder = $api->order->create($orderData);
                $razorpayOrderId = $razorpayOrder['id'];
                $_SESSION['razorpay_order_id'] = $razorpayOrderId;
                $view_data['razorpay_order_id'] = $razorpayOrderId;
                $view_data['pre_transaction_id'] = $data['data']['pre_transaction_id'];
                $view_data['displayAmount'] = $orderData['amount'];
                $view_data['pro_id'] = $pid;
                $view_data['movie_id'] = ($pid) ? $pid : 0;
                $view_data['TXN_AMOUNT'] = $amount;
                $view_data['rental'] = $rental;
                $view_data['show_id'] = aes_cbc_encryption_($show_id);
                $view_data['validity'] = $validity;
                //$view_data['show_id'] = aes_cbc_encryption_($this->input->post('show_id')); 
        
                $view_data['subscription'] = $subscription;
                $view_data['is_rental_video'] = true;
                //pre($view_data); die;
                $this->load->view('web/subscription/razor_pro_rental', $view_data);
            } 
        }  
    }

    public function updateChannel()
    {
        $data = array(
            'status' => false,
            'data' => 'something went wrong'
        );
        if ($this->input->post()) {
            $channelIdsString = $this->input->post('channelIdsString');
            if (!empty($channelIdsString)) {
                $url = "updateChannel";
                $document = array(
                    'channels' => $channelIdsString
                );
                $data = file_curl_contents($url, $document);
                // pre($data);die;
            }
        }
        echo json_encode($data);
    }

    public function transaction_history()
    {
        $show_id_str = $this->input->get('id');
        $show_id = str_replace(" ", '+', $show_id_str);
        $show_id = aes_cbc_decryption_($show_id);
        $url = "Menu_master/get_menu_master";
        $url2 = "orderHistory/type/0/page/1";
        $url3 = "orderHistory/type/1/page/1";
        $document = array('user_id' => $this->session->id);
        $document3 = array('page' => 1);
        $view_data['menu_master'] = [];//file_curl_contents($url, $document);
        $view_data['transaction'] = call_curl_by_get_method($url3, []);
        $view_data['subs_status'] = call_curl_by_get_method($url2, []);
        //pre($view_data['transaction']); die;
        $view_data['subs_transaction_exists'] = $view_data['rent_transaction_exists'] = false;
        if(isset($view_data['subs_status']['data']) && !empty($view_data['subs_status']['data'])){
            $this->session->set_userdata('transaction_exists',true);
            $view_data['subs_transaction_exists'] = true;
        } 
        if(isset($view_data['transaction']['data']) && !empty($view_data['transaction']['data'])){
            $this->session->set_userdata('rent_transaction_exists',true);
            $view_data['rent_transaction_exists'] = true;
        }
        if($view_data['subs_transaction_exists'] == false && $view_data['rent_transaction_exists'] == false) {
            redirect('no-data');
        }
        // for testing purpose
        // $view_data['rent_transaction_exists'] = false;
        // $view_data['subs_transaction_exists'] = true;

        
        $view_data['page'] = "transaction-history";
        $data['page_data'] = $this->load->view('web/subscription/transaction_history', $view_data, TRUE);
        $data['without_head'] = 2;
        echo modules::run('web/template/call_default_template', $data);
    }

    public function razor_verify_rental()
    {
        if (isset($_POST['pre_transaction_id']) && $_POST['pre_transaction_id'] != '') {
            $pre_transaction_id = $_POST['pre_transaction_id'];
            $txn_id = $_POST['razorpay_order_id'];
            $movie_id = $_POST['movie_id'];
            $price = $_POST['price_id'];
            $validity = $_POST['validity'];
            $url =  "paymentComplete";
            if ($_POST['price_id'] == 0) {
                $document = array('type' => 2, 'pay_via' => 3, 'pre_transaction_id' => $pre_transaction_id, 'post_transaction_id' => $txn_id, 'transaction_status' => 1, 'payment_mode' => 1, 'movie_id' => $movie_id);
            } else {
                $document = array('type' => 2, 'pay_via' => 3, 'plan_id' => $movie_id, 'pre_transaction_id' => $pre_transaction_id, 'post_transaction_id' => $txn_id, 'transaction_status' => 1, 'payment_mode' => 0);
            }
            $data['success'] = [
                'pro_id' => $_POST['pro_id'],
                'pre_transaction_id' => $pre_transaction_id,
                'post_transaction_id' => $txn_id,
                'plane_price' => $price,
                'validity' => $validity
            ];

            $this->session->set_userdata($data);
            // pre($document);die;
            $data = file_curl_contents($url, $document);

            // $profile_data = $this->session->profile_data;
            // foreach ($profile_data as $pkey => $pvalue) {
            //     $profile_data[$pkey]['is_subscribe'] = 1;
            // }
            // $this->session->set_userdata('profile_data',$profile_data);
            if ($data['status'] == 1) {
                $this->session->set_flashdata('msg_status', "200");
                $this->session->set_flashdata('toast_msg', $data['message']);
                echo json_encode($data);
            }
        } else {
            if (SUBSCRIPTION_CHECK) {
                redirect(base_url('upgrade-subscription'));
            } else {
                redirect(base_url('subscription'));
            }
        }
    }

    public function cancel_subscription()
    {
        $r_data = array(
            'status' => false,
            'data' => 'error'
        );
        if ($this->input->post('mandateId')) {
            $mandate_id = $this->input->post('mandateId');
            $url = "cancelSubscription";
            $data = file_curl_contents($url, ["mandateId"=>$mandate_id]);
            //pre($data);die;
            if($data && isset($data['status'])){
                $r_data = array(
                    'status' => $data['status'],
                    'data' => $data['message']
                );
            }
            
        }
        echo json_encode($r_data);
    }

    public function subscription_plan_exists()
    {
        $r_data = array(
            'status' => false,
        );
        if ($this->input->post('mandateId')) {
            $mandate_id = $this->input->post('mandateId');
            $url = "cancelSubscription";
            $r_data = array(
            'status' => false,
        );
            
        }
        echo json_encode($r_data);
    }
}
