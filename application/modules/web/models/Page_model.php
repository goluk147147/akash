<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_model {

	public function get_faq($data) 
    { 
        $url = 'master_hit/get_app_faq'; 

        $d = file_curl_contents($url, $data);
      
        return $d;
   }

   public function get_policy($data)
   {
        $url = 'master_hit/policies'; 

        $d = file_curl_contents($url, $data, 0);
      
        return $d;
   }
   
   public function get_aboutus($data)
   {
        $url = 'master_hit/about'; 

        $d = file_curl_contents($url, $data, 0);
      
        return $d;
   }

   public function get_refund($data)
   {
        $url = 'master_hit/refund'; 

        $d = file_curl_contents($url, $data, 0);
      
        return $d;
   }

   public function get_terms($data)
   {
        $url = 'master_hit/terms'; 

        $d = file_curl_contents($url, $data, 0);
      
        return $d;
   }

   public function get_contact($data)
   {
        $url = 'master_hit/contact'; 

        $d = file_curl_contents($url, $data, 0);
      
        return $d;
   }


   public function get_footer($data=array())
   {
        $url = 'master_hit/footer'; 

        $d = file_curl_contents($url, $data, 0);
    
        return $d;
   }
}