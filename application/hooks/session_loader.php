<?php

function load_session_library() {
    $CI =& get_instance();
    $CI->load->library('session');
}