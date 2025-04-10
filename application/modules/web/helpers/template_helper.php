<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('page_alert_box')) {

    function page_alert_box($type = '', $title = '', $message = '') {
        $_SESSION['page_alert_box_type'] = $type;
        $_SESSION['page_alert_box_title'] = $title;
        $_SESSION['page_alert_box_message'] = $message;
    }

}

if (!function_exists('redirect_to_back')) {

    function redirect_to_back() {
        echo '<script>window.history.go(-1);</script>';
        die;
    }

}



if (!function_exists('generate_password')) {

    function generate_password($password) {
        $options = array(
            'cost' => 10
        );
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

}


if (!function_exists('total_days')) {
    function total_days($expiry_date, $purchase_date) 
    {
        return round(($expiry_date - $purchase_date)/60/60/24);
    }
}

if (!function_exists('remainingdays')) {
    function remainingdays($expiry_date)
    {
        $future = $expiry_date;
        $timefromdb = strtotime("now");
        $timeleft = $future-$timefromdb;
        return round((($timeleft/24)/60)/60);
    }
}
if (!function_exists('percentage')) {

    function percentage($remaining, $total_days)
    {
        $count1 = $remaining / $total_days;
        $count2 = $count1 * 100;
        return 100 - number_format($count2, 0); 
    }
}

