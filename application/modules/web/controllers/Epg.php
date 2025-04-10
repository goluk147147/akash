<?php

use Razorpay\Api\Api;

defined('BASEPATH') or exit('No direct script access allowed');

class Epg extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        modules::run('web/web_panel_ini/web_ini');
        $this->load->helper(array('aes', 'url', 'custom', 'custom_helper', 'message_sender'));
        $this->load->library(array('form_validation', 'MatomoTracker'));
        $this->load->library('session');
        // $this->load->model('Page_model');
        $this->load->helper('cookie');
      
    }


    public function tv_guide(){ 
        // if(!$this->session->userdata('id')){
        //     $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        //     $this->session->set_userdata('redirect_url', $redirect_url);
        //     redirect('user-login');
        // }
        $view_data = array();
        $url = "getLiveChannels";
        $document = array('page' => 1);
        $live = call_curl_by_get_method($url, $document);
        $view_data['live'] = $live;
        $view_data['page'] = "live";
        $view_data['is_faourite'] = "Live";
        $view_data['fetch_data_from_cache'] = 1;  // 1-yes, 0-no
        $data['page_data'] = $this->load->view('web/dashboard/tv_guide', $view_data, TRUE);
        $data['without_head'] = 0;
        echo modules::run('web/template/call_default_template', $data);
    }


    public function tv_guide_data(){
        $status = false;
        $msg = $this->lang->line("request_failed");
        $param = $this->input->post('param')??0; // 0-channel, 1-radio
        $data = [];
        $url =  "epg/epgProgramsGuide?param=".$param;
        $date = ($this->input->post('date'))??date("Y-m-d");
        $page = ($this->input->post('page'))??1;
        $url = "epg/epgProgramsGuide/param/$param/page/$page/pageSize/10/currentDate/$date";
        $tv_guide_data = call_curl_by_get_method($url, []);
        if($tv_guide_data['status'] == true){
            $status = true;
            $msg = "success";
            if(!empty($tv_guide_data['data'])){
                foreach($tv_guide_data['data'] as $each_day_key => $each_day){ 
                    if(isset($each_day['channels']) && !empty($each_day)){
                        foreach($each_day['channels'] as $each_ch_key => $each_channel){ 
                            $tv_guide_data['data'][$each_day_key]['channels'][$each_ch_key]['enc_id'] = aes_cbc_encryption_($each_channel['id']);
                        }
                    }
                }
            }
            $data = $tv_guide_data['data'];
        }
        echo json_encode(["status"=>$status,"message"=>$msg,"data"=>$data]);
    }

    // public function tv_guide_data(){
    //     $status = false;
    //     $msg = $this->lang->line("request_failed");
    //     $param = $this->input->post('param')??0; // 0-channel, 1-radio
    //     $data = [];
    //     //$url =  "epg/epgProgramsGuide?param=".$param;
    //     $date = ($this->input->post('date'))??date("Y-m-d");
    //     // $page = ($this->input->post('page'))??1;
    //     $page = 1;
    //     $channel_data = [];
    //     do {
    //         //echo "<br>".$page;
    //         // Build the URL with the current page number
    //         $url = "epg/epgProgramsGuide/param/$param/page/$page/pageSize/10/currentDate/$date";
    //         // Call the API and get the response
    //         $tv_guide_data = call_curl_by_get_method($url, []);
    //         // Check if the status is false to stop the loop
    //         if ((isset($tv_guide_data['status']) && $tv_guide_data['status'] == false) || isset($tv_guide_data['data']) && empty($tv_guide_data['status'])) {
    //             break;
    //         } 
    //         foreach($tv_guide_data['data'] as $each){
    //             $channel_data[] = $each;
    //         }
    //         $page++;

    //     } while (isset($tv_guide_data['status']) && $tv_guide_data['status'] == true);
        
        
    //     //pre(json_encode($channel_data)); die;
    //     if(!empty($channel_data)){
    //         $all_keys = [];
    //         foreach($channel_data as $each){
    //             $all_keys[] = $each['date'];
    //         }
    //         $all_keys = array_unique($all_keys);

    //         $final_data = []; 
    //         if(!empty($all_keys)){
    //             foreach($all_keys as $each_key){ 
    //                 $temp_data = [];
    //                 foreach($channel_data as $each){
    //                     if($each['date'] == $each_key){
    //                         foreach($each['channels'] as $each_channel){
    //                             $temp_data[] = $each_channel;
    //                         }
    //                     }
    //                 }
    //                 $temp_obj['date'] = $each_key;
    //                 $temp_obj['channels'] = $temp_data;
    //                 $final_data[] = $temp_obj;
    //             }
    //         }
    //         //pre(json_encode($final_data)); die;

    //         $tv_guide_data['data'] = $final_data;
    //         $status = true;
    //         $msg = "success";
    //         if(!empty($tv_guide_data['data'])){
    //             foreach($tv_guide_data['data'] as $each_day_key => $each_day){ 
    //                 if(isset($each_day['channels']) && !empty($each_day)){
    //                     foreach($each_day['channels'] as $each_ch_key => $each_channel){ 
    //                         $tv_guide_data['data'][$each_day_key]['channels'][$each_ch_key]['enc_id'] = aes_cbc_encryption_($each_channel['id']);
    //                     }
    //                 }
    //             }
    //         }
    //         $data = $tv_guide_data['data'];
    //     }
    //     echo json_encode(["status"=>$status,"message"=>$msg,"data"=>$data]);
    // }

    public function fav_channels(){
        // if(!$this->session->userdata('id')){
        //     $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        //     $this->session->set_userdata('redirect_url', $redirect_url);
        //     redirect('user-login');
        // }
        $view_data = array();
        $url = "getLiveChannels";
        $document = array('page' => 1);
        $live = call_curl_by_get_method($url, $document);
        //pre($live); die;
        $view_data['live'] = $live;
        $view_data['fav_page'] = true;
        $view_data['page'] = "live";
        $view_data['fetch_data_from_cache'] = 1;  // 1-yes, 0-no
        $view_data['is_faourite']= 'Favourite';
        $data['page_data'] = $this->load->view('web/dashboard/tv_guide', $view_data, TRUE);
        $data['without_head'] = 2;
        echo modules::run('web/template/call_default_template', $data);
    }

    public function tv_past_program(){
        $view_data = array();
        $id = $this->input->get('id');
        $epgurl = "epg/epgDetail/".$id;
        $epgDetailData = call_curl_by_get_method($epgurl, $document=array());
        $totalDay = [];
        $totalEndTime = [];
        if(isset($epgDetailData['data']['past_shows'])){
            foreach($epgDetailData['data']['past_shows'] as $key => $value){
                $day = $this->formatTimestamp($value['start']);
                if(!in_array($day, $totalDay)){
                    $totalDay[] = $day;
                }
                $epgDetailData['data']['past_shows'][$key]['date'] = $day;
                $totalEndTime[] = $value['end'];
            }
        }
        $view_data['epgDetailData'] = $epgDetailData;
        $totalDay = array_reverse($totalDay);
        $view_data['totalDay'] = $totalDay;
        $view_data['totalDayJson'] = json_encode($totalDay);
        $view_data['totalEndTime'] = json_encode($totalEndTime);
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/tvpast_program', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function tv_upcoming_program(){
        $view_data = array();
        $totalEndTime = array();
        $id = $this->input->get('id');
        $epgurl = "epg/epgDetail/".$id;
        $epgDetailData = call_curl_by_get_method($epgurl, $document=array());
        $totalDay = [];
        if(isset($epgDetailData['data']['upcoming_shows'])){
            foreach($epgDetailData['data']['upcoming_shows'] as $key => $value){
                $day = $this->formatTimestamp($value['start']);
                if(!in_array($day, $totalDay)){
                    $totalDay[] = $day;
                }
                $epgDetailData['data']['upcoming_shows'][$key]['date'] = $day;
                $totalEndTime[] = $value['end'];
            }
        }
        $view_data['epgDetailData'] = $epgDetailData;
        $view_data['totalEndTime'] = json_encode($totalEndTime);
        $view_data['totalDayJson'] = json_encode($totalDay);
        $view_data['totalDay'] = $totalDay;
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/tvupcoming_program', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
        
    }

    private function formatTimestamp($timestamp) {
        $daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        $today = strtotime('today');
        $tomorrow = strtotime('tomorrow');
        $yesterday = strtotime('yesterday');
    
        // Determine the relative day (Today, Tomorrow, or the day of the week)
        if ($timestamp >= $today && $timestamp < $tomorrow) {
            $relativeDay = "Today";
        } elseif ($timestamp >= $tomorrow && $timestamp < $tomorrow + 86400) {
            $relativeDay = "Tomorrow";
        } elseif ($timestamp >= $yesterday && $timestamp < $today) {
            $relativeDay = "Yesterday";
        } else {
            $relativeDay = $daysOfWeek[date('w', $timestamp)];
        }
    
        // Format the date with the ordinal suffix
        $dayOfMonth = date('j', $timestamp);
        $ordinalSuffix = date('S', $timestamp);
        $formattedDate = "{$dayOfMonth}{$ordinalSuffix}, {$relativeDay}";
    
        return $formattedDate;
    }

    public function get_encode_id(){
        $return_val = "";
        if($this->input->post('id')){
            $return_val = aes_cbc_encryption_($this->input->post('id'));
        }
        echo $return_val;
    }
}
