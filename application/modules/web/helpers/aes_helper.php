<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('OPENSSL_CIPHER_NAME', 'aes-128-cbc');
define('OPENSSL_CIPHER_NAME_256', 'aes-256-cbc');
define('AEC_CBC_KEY', '%!F*&^$)_*%3f&B+');
define('CIPHER_KEY_LEN', '16');
define('ini_vector', '#*$DJvyw2w%!_-$@');

if (!function_exists('random_token')) {

    function random_token() {
        return random_int(1000000000000000, 9999999999999999);
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

    function aes_cbc_encryption($string,$key) {
        $cbc_key = get_keys(AEC_CBC_KEY, $key);
        $ini_vector = get_keys(ini_vector, $key);
        return base64_encode(openssl_encrypt($string, OPENSSL_CIPHER_NAME, fixKey($cbc_key), OPENSSL_RAW_DATA, $ini_vector)).":". base64_encode("1234567890123456");
    }

}

if (!function_exists('aes_cbc_decryption')) {

    function aes_cbc_decryption($string,$key) {
        $cbc_key = get_keys(AEC_CBC_KEY, $key);
        $ini_vector = get_keys(ini_vector, $key);
        return openssl_decrypt(base64_decode(explode(':', $string)[0]), OPENSSL_CIPHER_NAME, fixKey($cbc_key), OPENSSL_RAW_DATA, $ini_vector);
    }

}



if (!function_exists('aes_cbc_encryption_file')) {

    function aes_cbc_encryption_file($file) {
        $contenuto = file_get_contents($file);

        $encodedEncryptedData = openssl_encrypt($contenuto, OPENSSL_CIPHER_NAME, fixKey(AEC_CBC_KEY), OPENSSL_RAW_DATA, ini_vector);
        if ($encodedEncryptedData === false)
            return 'Errors occurred while encrypting the file ';

        $file = str_replace(".mp4", "", $file);
        if (file_put_contents($file, $encodedEncryptedData))
            return $file;
        else
            return 'Errors occurred while saving the encrypted file ';
    }

}

if (!function_exists('aes_cbc_decryption_file')) {

    function aes_cbc_decryption_file($file) {
        $contenuto = file_get_contents($file);
        $decryptedData = openssl_decrypt($data, OPENSSL_CIPHER_NAME, fixKey(AEC_CBC_KEY), OPENSSL_RAW_DATA, ini_vector);
        if ($decryptedData === false)
            return 'Errors occurred while decrypting the file ';
        $file .= ".mp4";
        if (file_put_contents($file, $decryptedData))
            return $file;
        else
            return 'Errors occurred while saving the decrypted file ';
    }

}

if (!function_exists('aes_cbc_decryption_')) {
    function aes_cbc_decryption_($string) {
        $cbc_key = AEC_CBC_KEY;
        $ini_vector = ini_vector;
        return openssl_decrypt(base64_decode(explode(':', $string)[0]), OPENSSL_CIPHER_NAME, fixKey($cbc_key), OPENSSL_RAW_DATA, $ini_vector);
    }
}

if (!function_exists('aes_cbc_encryption_')) {
    function aes_cbc_encryption_($string) {
        $cbc_key = AEC_CBC_KEY;
        $ini_vector = ini_vector;
        return base64_encode(openssl_encrypt($string, OPENSSL_CIPHER_NAME, fixKey($cbc_key), OPENSSL_RAW_DATA, $ini_vector)).":". base64_encode("1234567890123456");
    }
}

if (!function_exists('aes_cbc_encryption_games')) {
    function aes_cbc_encryption_games($string,$key,$ondc = false) {
        $ini_vector = generateCustomIV();
        $ciphertext = openssl_encrypt($string, OPENSSL_CIPHER_NAME_256, $key, OPENSSL_RAW_DATA, $ini_vector);
        // Calculate SHA-256 hash of the encrypted data and IV
        $hash = hash('sha256', $ciphertext . $ini_vector, true);
        if($ondc == true){
            $encoded_string = base64_encode($ini_vector.$ciphertext);
        } else {
            $encoded_string = base64_encode($ini_vector . $ciphertext . $hash);
        }
              
        return  $encoded_string;
    }
}

if (!function_exists('aes_cbc_decryption_games')) {  // $iv not needed, as we have calculated it from the string
    function aes_cbc_decryption_games($encoded_string,$key,$ondc = false,$print_step = false) {
        $ivLength = openssl_cipher_iv_length(OPENSSL_CIPHER_NAME_256);
        $base64_decoded_string = base64_decode(rawurldecode($encoded_string));
        //pre($base64_decoded_string);
        $iv = substr($base64_decoded_string, 0, $ivLength);
        if($print_step == true){
            echo "<br><br><b>Initialization Vector :- </b>".$iv;
        }
        if($ondc == true){
            // Extract the encrypted data from the hash
            $ciphertext = substr($base64_decoded_string, $ivLength);
       } else {
            // Extract the encrypted data from the hash
            $ciphertext = substr($base64_decoded_string, $ivLength, -32);
            // Calculate SHA-256 hash of the encrypted data and IV
            $hash = substr($base64_decoded_string, -32);
        }
        $calculatedHash = hash('sha256', $ciphertext . $iv, true);
        if($print_step == true && $ondc == false){
            echo "<br><br><b>SHA-256:- </b>".$calculatedHash;
        }
        $decoded_string = openssl_decrypt($ciphertext, OPENSSL_CIPHER_NAME_256, $key, OPENSSL_RAW_DATA, $iv);
        //pre($decoded_string); die;
        return  $decoded_string;
    }
}


if (!function_exists('generateCustomIV')) {
    function generateCustomIV($length = 16) {
        // Expanded custom character set
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?~`';
        $iv = '';
        $maxIndex = strlen($characters) - 1;
        // Generate a random string of the specified length
        for ($i = 0; $i < $length; $i++) {
            $iv .= $characters[random_int(0, $maxIndex)];
        }
        return $iv;
    }
}