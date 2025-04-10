<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('OPENSSL_CIPHER_NAME', 'aes-128-cbc');
define('AEC_CBC_KEY', '%!F*&^$)_*%3f&B+');
define('CIPHER_KEY_LEN', '16');
define('ini_vector', '#*$DJvyw2w%!_-$@');

if (!function_exists('random_token')) {

    function random_token() {
        return rand(1000000000000000, 9999999999999999);
    }

}

if (!function_exists('fixKey')) {

    function fixKey($key) {
        if (strlen($key) < CIPHER_KEY_LEN) {
            //0 pad to len 16
            return str_pad("$key", CIPHER_KEY_LEN, "0");
        }
        if (strlen($key) > CIPHER_KEY_LEN) {
            //truncate to 16 bytes
            return substr($key, 0, CIPHER_KEY_LEN);
        }
        return $key;
    }

}

if (!function_exists('get_keys')) {

    function get_keys($key, $string) {
        $key = str_split($key);
        $string = str_split($string);
        $return = "";
        foreach ($string as $value) {
            $return .= $key[$value];
        }
        return $return;
    }

}

if (!function_exists('aes_cbc_encryption')) {

    function aes_cbc_encryption($string, $key) {
        $cbc_key = $key ? get_keys(AEC_CBC_KEY, $key) : AEC_CBC_KEY;
        $ini_vector = $key ? get_keys(ini_vector, $key) : ini_vector;
        return base64_encode(openssl_encrypt($string, OPENSSL_CIPHER_NAME, fixKey($cbc_key), OPENSSL_RAW_DATA, $ini_vector)) . ":" . base64_encode("0161086410274515");
    }

}

if (!function_exists('aes_cbc_decryption')) {

    function aes_cbc_decryption($string, $key) {
        $cbc_key = $key ? get_keys(AEC_CBC_KEY, $key) : AEC_CBC_KEY;
        $ini_vector = $key ? get_keys(ini_vector, $key) : ini_vector;
        return openssl_decrypt(base64_decode(explode(':', $string)[0]), OPENSSL_CIPHER_NAME, fixKey($cbc_key), OPENSSL_RAW_DATA, $ini_vector);
    }

}

