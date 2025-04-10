<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web_panel_ini extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('template');
        $this->load->helper('language');
        header("X-XSS-Protection: 1; mode=block");
 		header('X-Frame-Options: DENY');
 		header('X-Content-Type-Options: nosniff');
 		header("Strict-Transport-Security: max-age=31536000; env=HTTPS");
 		header("Referrer-Policy: origin");
		header("Content-Security-Policy: frame-ancestors 'none'");
		header("X-Download-Options: noopen");
		header("Feature-Policy: camera 'none'; microphone 'none'");
		header("Referrer-Policy: same-origin");
        //header("Set-Cookie: cookie_name=cookie_value; expires=" . gmdate('D, d-M-Y H:i:s T', time() + 3600) . "; path=/; secure; HttpOnly; SameSite=Lax");
        // Set specific cookies with SameSite=Lax and Secure attributes
        // header("Set-Cookie: _pk_cvar.1.1fff=cookie_value; expires=" . gmdate('D, d-M-Y H:i:s T', time() + 3600) . "; path=/; secure; HttpOnly; SameSite=Lax");
        // header("Set-Cookie: _pk_ses.1.1fff=cookie_value; expires=" . gmdate('D, d-M-Y H:i:s T', time() + 3600) . "; path=/; secure; HttpOnly; SameSite=Lax");
    }

    public function web_ini()
    {
       
        $lang_id = strtolower($this->session->userdata('lang_id'));
        $this->lang->load('landing_home_lang', $lang_id);
        $user_id = $this->session->userdata('id');
        if (is_numeric($user_id) && $user_id != '' || $user_id != '0') { //blank
            define('USER_ID', $user_id);
        } 
        $subscribe_check = 0;
        $subs_check = "SUBSCRIPTION_CHECK";
        if (isset($_SESSION['profile_data'])) {
            $subscribe_check_arr = array_values(array_filter($_SESSION['profile_data'], function ($var) {
                return (isset($var['profile_id']) && $var['profile_id'] == $_SESSION['profile_id']);
            }));
            // if (isset($subscribe_check_arr[0]['is_subscribe'])) {
            //     $subscribe_check  = $subscribe_check_arr[0]['is_subscribe'];
            // }
            
            if (isset($subscribe_check_arr[0]['subscriptions'])) {
                $users_subscription = $subscribe_check_arr[0]['subscriptions'];
                defined("SUBSCRIBEUSER") OR define("SUBSCRIBEUSER", $users_subscription);
                if(!empty($users_subscription)){
                    foreach ($users_subscription as $each_subscription) { //pre($each_subscription);
                        if($each_subscription == 0){ //echo "<br>if";
                            defined($subs_check) OR define($subs_check, 1);
                        } else { //echo "<br>else";
                            defined($subs_check."_".$each_subscription) OR define($subs_check."_".$each_subscription, 1);
                        }
                    }
                } else {
                    defined($subs_check) OR define($subs_check, 0);
                }
            } else {
                defined($subs_check) OR define($subs_check, 0);
            }
        } else {
            defined($subs_check) OR define($subs_check, 0);
        }
        defined($subs_check) OR define($subs_check, 0);
        defined("SUBSCRIBEUSER") OR define("SUBSCRIBEUSER", []);
        $default_resolution = $this->session->userdata('default_resolution')??0;
        define('DEFAULT_RESOLUTION', $default_resolution);
        

        //pre(SUBSCRIPTION_CHECK_32);die;
        $siteId = '2LSX';
        if(ENVIRONMENT == "production") {
            $siteId = 'VPFF';
        }
        defined('SITE_ID') OR define('SITE_ID', $siteId);
        $data['is_paid'] = 0;
        define("NoDataFound", $this->lang->line('No-data-found'));
        define("NoListFound", $this->lang->line('No-list-found'));
        // define("CatNoDataFound", $this->lang->line('CatNoDataFound'));
        // define("CatNolistFound", $this->lang->line('CatNolistFound'));
        define("NoDataFoundTv", $this->lang->line('nolive_heading'));
        define("NoListFoundTv", $this->lang->line('nolive_paragraph'));

        define("NoDataFoundFav", $this->lang->line('nofavorites_heading'));
        define("NoListFoundFav", $this->lang->line('nofavorites_paragraph'));

        define("EXPLORE_NOW", $this->lang->line('explore_now'));

        define("PLAYVIDEO", 'play-video?id=');
        define("PRIMIUM",  base_url('assets/images/premium-icon.svg'));
        define("RENTAL",  base_url('assets/website_assets/images/rental.svg'));
        define("PMCLASS", 'premium_icondt' );
        define("TempMSG", 'web/template/call_default_template' );
        define("RESPONSIVE", 'web/dashboard/responsive_page' );
        define("PRIVACY", 'web/dashboard/privacy_policy' );
        define("LIVEBLINKER", base_url("assets/images/live_blinkar.gif"));
        define('DIV_START', '<div class="pb_card_details mb-3 ' . (($data['is_paid'] == 0) ? '' : 'pb_card_outer') . '">');
        define("COMMINGSOON",  base_url('assets/images/coming_soon.png'));
        define("NEWRELEASE",  base_url('assets/images/new_release.png'));

        define("RECENTLYADD",  base_url('assets/images/recently_added.png'));
        define("TOP10",  base_url('assets/images/top_10.png'));
        define("TREANDINGNUMBER",  base_url('assets/images/trending_no.png'));
        define("LIVEEVENT",  base_url('assets/images/live_events.png'));
        define("UPCOMINGEVENT",  base_url('assets/images/upcoming_imgs.png'));
        

        if (!defined("APP_ID") || APP_ID == 0) {
            $domain = $_SERVER['HTTP_HOST'];
            define("MOBILE", '8002116652');
            define("email", 'akash@gmail.com');
            define("TITLE", $this->lang->line('project_title'));
            define("LOGO", base_url('/assets/images/WAVES.svg'));
            define("FLOGO", base_url('/assets/images/fav_wave.png'));
            //define("FLOGO", base_url('/assets/images/fav-logo.png'));
            define("TOP_NAVBAR", '');
            define("FONT_COLOR", '');
            define("APP_ID", 53);
            define("faqmob", '+91 9666505499');
            define("faqemail", 'support@cscestore.in');
            //define("SUBSCRIPTION_CHECK", $subscribe_check);
            $this->session->userdata('jwt', '');
        }


        /* default template path */
        if (!defined('WEB_TEMPLATE')) {
            define("WEB_TEMPLATE", "web/template/");
        }
    
        /* default template conatant name  */
        if (!defined('WEB_DEFAULT_TEMPLATE')) {
            define("WEB_DEFAULT_TEMPLATE", "web/template/call_default_template");
        }
        if (!defined('WEB_PANEL_URL')) {
            define("WEB_PANEL_URL", base_url() . 'web/');
        }

        if (!defined('WEB_ASSETS')) {
            define("WEB_ASSETS", base_url() . "assets/");
        }

    }


    public function detectBrowser() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown Browser";
        $browserVersion = "";

        // Check for Internet Explorer
        if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
            $browser = "Explorer";
            $browserVersion = preg_match('/MSIE ([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        } 
        // Check for Edge
        elseif (preg_match('/Edge/i', $userAgent)) {
            $browser = "Edge";
            $browserVersion = preg_match('/Edge\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        } 
        // Check for Chrome
        elseif (preg_match('/Chrome/i', $userAgent) && !preg_match('/Edge/i', $userAgent)) {
            $browser = "Chrome";
            $browserVersion = preg_match('/Chrome\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        } 
        // Check for Firefox
        elseif (preg_match('/Firefox/i', $userAgent)) {
            $browser = "Firefox";
            $browserVersion = preg_match('/Firefox\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        } 
        // Check for Safari
        elseif (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome/i', $userAgent)) {
            $browser = "Safari";
            $browserVersion = preg_match('/Version\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        } 
        // Check for Opera
        elseif (preg_match('/Opera/i', $userAgent)) {
            $browser = "Opera";
            $browserVersion = preg_match('/Opera\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        } 
        // Check for other browsers
        else {
            $browserVersion = preg_match('/\/([0-9.]+)/', $userAgent, $matches) ? $matches[1] : "";
        }

        return array(
            'name' => $browser,
            'version' => $browserVersion
        );
    }

    private function lang_title($lang_id)
    {
        if ($lang_id == 1) {
            $this->lang->load('landing_home_lang', 'english');
            return 'english';
        } elseif ($lang_id == 2) {
            $this->lang->load('landing_home_lang', 'hindi');
        } else {
            $this->lang->load('landing_home_lang', 'english');
        }
    }
}
