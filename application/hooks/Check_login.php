<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$web_version = 'V1.0.6.1.1.1';
if(ENVIRONMENT == "qa" || ENVIRONMENT == "vapt"){
	$web_version = 'V1.0.6.1.1.0';
} else if(ENVIRONMENT == "sandbox"){ 
	$web_version = 'V1.0.6.6.0.0';
} else if(ENVIRONMENT == "production"){
	$web_version = 'V1.0.7.0.0.0';
}
define('WEB_VERSION', $web_version); 
define('PAYMENT_GATEWAY', 'BILLDESK');  //RAZOR_PAY, BILLDESK


class Check_login{

	protected $CI;
	
	function __construct() {
		$this->CI =& get_instance();
		//$this->CI->load->library('session');	
	}

	function check_login(){
		// if($this->CI->input->get('passkey') == "1234abc"){
		// 	$this->CI->session->set_userdata('passKey',true);
		// 	setcookie("passKey", "true", time() + (86400 * 30), "/");
		// }
		$manage_device_flag = ($this->CI->session->userdata('manage_device_flag'))??false;
		$primary_code = ($this->CI->session->userdata('passKey'))??false;
		//$primary_cookie_code = $_COOKIE["passKey"]??false;
		$primary_cookie_code = true;
		$controller = $this->CI->router->fetch_class();
        $method = $this->CI->router->fetch_method();

        $controllers = array(
	        // 'Dashboard' => array('play_episode_audio'),
	        'home' => array('primary')
	        // 'watchlist' => array('get_watchlist')
	    ); 
		$current_route = $controller . '/' . $method;
		$exclude_passkey = array(
				"home/primary",
				"home/language",
				"Dashboard/about_us",
				"Dashboard/contactus",
				"Dashboard/terms_conditions",
				"Dashboard/privacy_policy",
				"dashboard/help_support_content",
				"dashboard/help_support_content_details",
				"Dashboard/terms_conditions_mobile",
				"subscription/billdesk_subscription_status",
				"subscription/subscription_status",
				"subscription/transaction_history",
				"subscription/verify-payment",
				"subscription/upgrade_subscriptions",
				"Login_register/logout"
			);
		//pre($current_route); die;
		if(!in_array($current_route,$exclude_passkey)){
			if ((!$primary_code && !$primary_cookie_code)) {
				if(ENVIRONMENT == "production" || ENVIRONMENT == "sandbox"){
					//redirect(base_url('primary'));die;
				} 
			}
		} 
		

		if($manage_device_flag == true){
			$exclude_methods = array(
				"home/language",
				"Dashboard/manage_device",
				"home/primary",
				"subscription/upgrade_subscriptions",
				"subscription/razorpost",
				"dashboard/razor_verify",
				"subscription/subscription_status",
				"subscription/transaction_history",
				"subscription/verify-payment",
				"dashboard/logout_devices",
				"Login_register/set_temp_lang",
				"Login_register/logout",
				"subscription/billdesk_subscription_status",
				"login_register/get_watching_details",
				"login_register/get_watchlist",
				"login_register/get_ratings",
				"login_register/get_favourite_list",
				"Dashboard/about_us",
				"Dashboard/contactus",
				"Dashboard/terms_conditions",
				"Dashboard/terms_conditions_mobile",
				"Dashboard/privacy_policy",
				"dashboard/help_support_content",
				"dashboard/help_support_content_details"
			);
			if(!in_array($current_route,$exclude_methods)){
				redirect(base_url('manage-device'));
			}
		}
		/*
		$base_url = base_url();
		//if(!$this->CI->session->userdata('id')){
			?><script>
				let session_exists = localStorage.getItem('pb_session');
				//console.log("session_exists",session_exists);
				if(session_exists){
					let api_url = "<?=$base_url;?>"+"web/Login_register/token_to_session";
					//console.log("api_url",api_url);
					fetch(api_url, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded',
						},
						body: 'token=' + encodeURIComponent(session_exists)
					})
					.then(response => response.text())
					.then(data => {
						//alert('PHP received the data: ' + data);
					})
					.catch(error => {
						console.error('Error:', error);
					});
				} 
			</script><?php
		//}
		*/
	}
}