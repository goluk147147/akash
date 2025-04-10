<?php
use Razorpay\Api\Api;

defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    

    public function __construct()
    {
        parent::__construct();
        modules::run('web/web_panel_ini/web_ini');
        $this->load->helper(array('aes', 'url', 'custom', 'custom_helper', 'message_sender'));
        $this->load->library(array('form_validation', 'MatomoTracker', 'session'));
        define("AUDIOVIEW",'web/dashboard/audio');
        define("DIVCLASS",'<div class="');
        define("PBLIVE",'pb_live_details?id=');
        define("IMGSRC",'"><img src="');
    }
   
    public function category()
    {
        $cate_id = $this->getCategoryId();
        $publisher_id = $this->input->get('publisher_id')??'';
        if($publisher_id != ''){
            $publisher_ids = str_replace(" ", '+', $publisher_id);
            $publisher_id = aes_cbc_decryption_($publisher_ids);
        }
        // pre($cate_id);
        if ($cate_id === false) {
            show_error('Invalid category ID.', 400);
            return;
        }
    
        $view_data['details_data'] = $this->getHomeContent($cate_id, $publisher_id );
        if (!$view_data['details_data']) {
            show_error('Failed to retrieve home content.', 500);
            return;
        }
        //pre($view_data['details_data']); die;
        $this->processDetailsData($view_data['details_data']);
    
        $rented_list = $this->getRentedList($view_data['details_data']);
        if ($this->session->id && !empty($rented_list)) {
            $this->updateRentalStatus($view_data['details_data'], $rented_list);
        }
    
        //$view_data['nav_banner'] = $this->getNavBanner($cate_id);
        if (!empty($view_data['details_data']->error) && $view_data['details_data']->error == 100100) {
            $this->logout();
        }
    
        $view_data['page'] = "category";
        $data['page_title'] = "Category";
        //pre($view_data);die;
        $data['page_data'] = $this->load->view('web/dashboard/category_page', $view_data, true);
        echo modules::run(TempMSG, $data);
    }
    
    private function getCategoryId()
    {
        $cate_str = $this->input->get('category_id');
        $cate_id = str_replace(" ", '+', $cate_str);
        return aes_cbc_decryption_($cate_id);
    }
    
    private function getHomeContent($cate_id,$publisher_id)
    {
        $url = "getHomeContent?category_id=" . $cate_id.'&publisher_id='.$publisher_id;
        return call_curl_by_get_method($url, []);
    }

    
    private function processDetailsData(&$details_data)
    {
        if (isset($details_data['data'])) {
            foreach ($details_data['data'] as $keys => $value) {
                $details_data['data'][$keys]['status'] = $value['status'] ?? 1;
                $details_data['data'][$keys]['category_id'] = aes_cbc_encryption_($value['category_id'] ?? 0);
                if(isset($value['shows'])){
                    foreach ($value['shows'] as $key => $values) {
                        $details_data['data'][$keys]['shows'][$key]['in_watchlist'] = 0;
                        $details_data['data'][$keys]['shows'][$key]['is_rented'] = 0;
                    }
                }
            }
        }
    }
    
    private function getRentedList($details_data)
    {
        $rented_list = [];
        if (isset($details_data['data'])) {
            foreach ($details_data['data'] as $value) {
                if(isset($value['shows'])){
                    foreach ($value['shows'] as $values) {
                        $rented_list[] = $values['id'];
                    }
                }
            }
        }
        return $rented_list;
    }
    
    private function updateRentalStatus(&$details_data, $rented_list)
    {
        $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . implode(',', $rented_list);
        $rentData = call_curl_by_get_method($rent_url, []);
    
        if ($rentData['status'] && !empty($rentData['data'])) {
            // Create a lookup array for rental status by show ID
            $rental_status = array_column($rentData['data'], 'isOnRent', 'show_id');
    
            foreach ($details_data['data'] as &$value) {
                foreach ($value['shows'] as &$show) {
                    if (isset($rental_status[$show['id']])) {
                        $show['is_rented'] = $rental_status[$show['id']];
                    }
                }
            }
        }
    }
    
    
    private function getNavBanner($cate_id)
    {
    $url = "getMasterHit";
    $nav_banner = call_curl_by_get_method($url, []);
    if (isset($nav_banner['data']['banners'])) {
        $banner = array_values(array_filter($nav_banner['data']['banners'], function ($var) use ($cate_id) {
            return $var['category_id'] == $cate_id && $var['banner_type'] == 0;
        }));
        $nav_banner['data']['banners'] = $banner;
    }
    return $nav_banner['data']['banners'];
    }

    


    public function play_video(){
        $tvod_discount = $this->session->tvod_discount;
        $id = str_replace(" ", "+", $this->input->get('id'));
        $ban_type = str_replace(" ", "+", $this->input->get('type'));
        $n_type = str_replace(" ", "+", $this->input->get('types'));
        $_SESSION['dataa'] = $this->input->get();
        $content_id = aes_cbc_decryption_($id);
        //pre($content_id); die;
        $n_type_decrypted = aes_cbc_decryption_($n_type);
        $view_data['content_details'] = array();
        $view_data['id'] = $id;
        $view_data['enc_id'] = $id;
        $view_data['tvod_discount'] = $tvod_discount;
        $view_data['content_id'] = $content_id;
        $view_data['n_type'] = $n_type_decrypted;
        $view_data['banners'] = ($ban_type == 'banners') ? $ban_type : '';
        $data['page_data'] = $this->load->view('web/dashboard/hls', $view_data, true);
        echo modules::run(TempMSG, $data);
    }

public function like_dislike()
{
    $url = '';
    $status = false;

    if ($this->input->post()) {
        $rating = $this->input->post('rating');
        $show_id = $this->input->post('show_id');

        if (!empty($show_id)) {
            $apiUrl = empty($rating) ? 'removeRating' : 'likeDislik';

            $data = array(
                'rating' => $rating,
                'show_id' => $show_id,
            );

            $res = file_curl_contents($apiUrl, $data);

            if (isset($res['error']) && $res['error'] == 100100) {
                $this->session->sess_destroy();
                $url = base_url('web/home');
            } elseif ($res['status']) {
                $status = true;
            }
            
        }
    }

    $data = array(
        'url' => $url,
        'status' => $status,
    );

    echo json_encode($data);
}

public function genre_list()
{
    $genre = $this->input->get('genre');
    $tag = $this->input->get('tag');
    $g_title = $this->input->get('g_title');
    $c_title = $this->input->get('c_title');
    $content_language_id = $this->input->get('content_language_id');
    $publisher_id = $this->input->get('publisher_id')??0;
    $title = $this->input->get('title');
    $category = $this->input->get('category');
    $playlist = $this->input->get('playlist')??'';
    if (!empty($category)) {
        $category = str_replace(" ", '+', $category);
        if($category == 'live' || $category == 'upcoming' || $category == 'recent' ||$category == 'all'){
            $live = $category;
            $view_data['live']= $live;
            $view_data['lives']= $title;
            $view_data['catName']= 'live'; 

        }
        $c_title = str_replace(" ", '+', $c_title);
        $c_titles = aes_cbc_decryption_($c_title);
        $category_id = aes_cbc_decryption_($category);
        $view_data['catName']= 'tag'; 
        $view_data['catId']= $category_id;
        $view_data['catTitle']= $c_titles;
    }
    if (!empty($tag)) {
        // $tag = str_replace(" ", '+', $tag);
        // $tag_id = aes_cbc_decryption_($tag);
        $view_data['catTitle']= $title;
        $view_data['tag_id']=  $tag ;
    }
    if (!empty($genre)) {
        $g_title = str_replace(" ", '+', $g_title);
        $genre = str_replace(" ", '+', $genre);
        $genre_id = aes_cbc_decryption_($genre);
        $g_titles = aes_cbc_decryption_($g_title);
        $view_data['g_title'] =  $g_titles;
        $view_data['catName']= 'Genres'; 
        $view_data['catId']= $genre_id;
        $view_data['catTitle']= $title;
    }
    if (!empty($genre)&&!empty($category)){
        $view_data['catName']= 'GenrePage'; 
    }
    if (!empty($content_language_id)) {
        $content_language_id = str_replace(" ", '+', $content_language_id);
        $title = aes_cbc_decryption_(str_replace(" ", '+', $title));
        $lang_ids = aes_cbc_decryption_($content_language_id);
        $view_data['catName']= 'Language'; 
        $view_data['catId']= $lang_ids;
        $view_data['catTitle']= $title;
    }
    if (!empty($publisher_id)) {
        $publisher_id = str_replace(" ", '+', $publisher_id);
        $title = aes_cbc_decryption_(str_replace(" ", '+', $title));
        $lang_ids = aes_cbc_decryption_($publisher_id);
        $view_data['catName'] = 'Publisher';
        $view_data['catId'] = $lang_ids;
        $view_data['catTitle'] = $title;
    }
    $view_data['playlist']= $playlist;
    $view_data['genre'] = $genre;
    $view_data['category'] =  $category;
    $view_data['title'] = $title;
    $view_data['content_language_id'] =  $content_language_id;
    $view_data['publisher_id'] = $publisher_id;
    $data['without_head'] = 1;
    //pre($view_data);die;
    $data['page_data'] = $this->load->view('web/dashboard/view_genre', $view_data, true);
    echo modules::run(TempMSG, $data);
}

    public function get_data()
    {
        $start = $this->input->post('start');
        $genre = $this->input->post('genre');
        $tag = $this->input->post('tag_id');
        $live = $this->input->post('live')?$this->input->post('live'):"";
        $lives = $this->input->post('lives')??false;
        $category = $this->input->post('category');
        $content_language_id = $this->input->post('content_language_id');
        $publisher_id = $this->input->post('publisher_id')??0;
        $playlist = $this->input->post('playlist')??'';
        $url = $this->buildUrl($category, $genre, $content_language_id,$publisher_id,$start,$live,$tag,$playlist);
    // pre($url);
        $document = [];
        // pre($url);
        $data = call_curl_by_get_method($url, $document);
    //    pre($data);die("sjjs");
        $html = $this->generateHtml($data['data'],$live);
        $genres = !empty($data['data']) ? $data['data'][0]['genres'] : '';
        if($live){
            $genres = strtoupper($live);
            if($live =='all'){
                $genres = strtoupper($lives);

            }
        }
        $status = !empty($data['data']);
        $response = ['status' => $status, 'html' => $html, 'genres' => $genres];
        echo json_encode($response);
    }
    
    private function buildUrl($category, $genre, $content_language_id,$publisher_id, $start,$live='',$tag='',$playlist='')
    {
        $url = 'getHomeContent?';
    
        if (!empty($category)) {
            $category = str_replace(" ", '+', $category);
            $url .= 'category_id=' . $category . '&';
        }
        if (!empty($tag)) {
            $tag = str_replace(" ", '+', $tag);
            $url .= 'tag_id=' .  aes_cbc_decryption_($tag) . '&';
            if($playlist){
                $url .= 'playlist_id='.$playlist.'&';
            }
        }
        if (!empty($live)) {
            if($live != 'all'){
            $url = 'getLiveEvents/0/?publisherId=0&event='.$live.'&';   
            }else{
                $url = 'getHomeContent/0?event=live&';
            }
        }
        if (!empty($genre)) {
            $genre = str_replace(" ", '+', $genre);
            $url .= 'genres=' . aes_cbc_decryption_($genre) . '&';
            if($playlist){
                $url .= 'playlist_id='.$playlist.'&';
            }
        }
        if (!empty($content_language_id)) {
            $content_language_id = str_replace(" ", '+', $content_language_id);
            $url .= 'content_language_id=' . aes_cbc_decryption_($content_language_id) . '&';
        }
        if (!empty($publisher_id)) {
            $publisher_id = str_replace(" ", '+', $publisher_id);
            $url .= 'publisher_id=' . aes_cbc_decryption_($publisher_id) . '&';
        } else if ($publisher_id==0) {
            $publisher_id = str_replace(" ", '+', $publisher_id);
            $url .= 'publisher_id=0&';
        }
        $url .= 'page=' . $start;

        return $url;
    }
    
    private function generateHtml($data, $live=false)
    {
        $html = '';
        if (!empty($data)) {
            foreach ($data as $item) {
                $html .= $this->generateCardHtml($item, $live);
            }
        }
        return $html;
    }
    public function formatTimestamp($timestamp) {
        $date = new DateTime();
        $date->setTimestamp($timestamp);
    
        $day = $date->format('j'); // Day of the month without leading zeros
        $daySuffix = function($day) {
            if ($day % 10 === 1 && $day !== 11) return "{$day}st";
            if ($day % 10 === 2 && $day !== 12) return "{$day}nd";
            if ($day % 10 === 3 && $day !== 13) return "{$day}rd";
            return "{$day}th";
        };
        
        $dayWithSuffix = $daySuffix($day);
        $formattedDate = $date->format('M, Y h:i A'); // Format: Mon, Year Hour:Minute AM/PM
        list($monthDate, $time) = explode(", ", $formattedDate);
        
        return "{$dayWithSuffix} {$monthDate}, {$time}";
    }
    private function generateCardHtml($data,$live=null)
    {//pre($data);
        // $data['is_live'] =4; //$data['type'] = 9;
        $id = aes_cbc_encryption_($data['id']);
        $siturl = $this->generateSitUrl($data, $id);
        $siturl1 = $this->generateSitUrl1($data, $id);
        $messge = $this->generateMessage($data);
        $descriptions = $this->getDescription($data['description']);
        $data['thumbnail'] = !empty($data['thumbnail']) ? $data['thumbnail'] : ThumbnailPlaceholder;
        $data['poster_url'] = !empty($data['poster_url']) ? $data['poster_url'] : PosterPlaceholder;
        $html = '';$btndisable = '';$playbtn_hide = 'd-block';
        if($data['type']<2 || $data['type'] == 9 ){
           // if( $data['is_live']!=4){
           $html .= '<a href="' . base_url(PLAYVIDEO . $id) . '">';
         //   }
        $html .='<div class="pb_card_details mb-3  " data-id="' . $data['id'] . '" 
                  data-title="' . $data['title'] . '"  >';
                   $pb_watch_width ='';
                  
                   if($data['type'] == 9){
                    $messge = $this->lang->line('Watchnow') ;
                    if ($data['is_live'] == 1) {

                       $siturl = $siturl1 = 'live?id='.$id;
                       $pb_watch_width = 'pb_watch_width';
                       $messge = $this->lang->line('Watchnow') ;
                    }
                   }
        if ($data['is_live'] == 1) {
            $html .= '<div class="live_upcomingss"> <div class="live_up_lang"><span></span><p class="mb-0">' . $this->lang->line("Live") . '</p></div></div>';
        }else{
            if($data['type']==9 &&  $data['is_live']==0){
                 $datetime = $this->formatTimestamp($data['live_date_time']);
                  $buttonText =  $this->lang->line("began_on")." ".$datetime;
                $messge  =  $buttonText;
                $siturl1 = $siturl = site_url(PLAYVIDEO . $id);
                $pb_watch_width = 'pb_watch_width';
            $html .= '<div class="live_upcomingss"> <div class="live_up_lang"><p class="mb-0">' . $this->lang->line("upcoming") . '</p></div></div>';
 
            }
       
        }
        
        // Open the anchor tag for the card details
        //if( $data['is_live']!=4){
        $html .= '<a class="text-decoration-none" href="' . $siturl . '">';
      //  }
        $html .= '<div class="pb_card_img" >';
        $playbtn = base_url('assets/images/playBtn.png');

        // Add premium or rental badge based on content type
        if ($data['is_paid'] == 1) {
        
            $html .=  DIVCLASS. PMCLASS .IMGSRC . PRIMIUM . '" alt="premium"></div>';
        } else if ($data['is_paid'] == 2) {
         $playbtn = base_url('assets/images/vector.svg');
            $html .= DIVCLASS. PMCLASS .IMGSRC . RENTAL . '" alt="rental"></div>';
        }
        if($data['type']==9 &&  $data['is_live']==4){
            $datetime = $this->formatTimestamp($data['live_date_time']);
            $buttonText =  $this->lang->line("since_text")." ".$datetime;
             $messge =  $buttonText;
           $siturl1 = $siturl ;
           $pb_watch_width = 'pb_watch_width';
           $playbtn_hide = 'd-none';
         //  $btndisable = 'disabled';

      // $html .= '<div class="live_upcomingss"> <div class="live_up_lang"><p class="mb-0">' . $this->lang->line("upcoming") . '</p></div></div>';

       }
       
        $tag = $this->filterVisibleTag($data['tags']);
        $genres =((!empty($data['genres'])) ? implode(' | ', array_slice(explode(',', $data['genres']), 0, 3)) : '');//  isset($item['genres']) ? str_replace(',', ' | ', $item['genres']) : '';   
        $html .= '<img class="img-fluid gen_rat_dts" src="' . $data['thumbnail'] . '">';
        if($tag != ''){
            $html .= '<div class="pre_tags"><img src="'. $tag.'" class="img-fluid" alt="tags_img"></div>';
        }
        $html .= '
        </div>
        <div class="pb_card_img2">
            <div class="pb_card_vd-2">
                <img class="img-fluid" src="' . $data['poster_url'] . '">
            </div>
            
            <div class="pb_card_content">
                <h6>' . $data['title'] . '</h6>
                <p class="discription_gen">' . $genres . '</p>
                <p class="discription_dt">' . $descriptions . '</p>
                <div class="d-flex align-items-center mt-2 pb_add_btns">
                    <a ' . $btndisable . ' href="' . $siturl1 . '" 
                        class="text-decoration-none pb_watch_btn d-block mr-2 ' . $pb_watch_width . '">
                        <img class="img-fluid watchCardImg ' . $playbtn_hide . '" src="' . $playbtn . '" alt="watch">
                        ' . $messge  . '
                    </a>
                </div>
            </div>
        </div>
    
    </div>';
 //   if( $data['is_live']!=4){
     $html .= '</a>';
  //  }
       }else{ 
        $siturl = 'content-detail?id='.$id;
        // if($live){
        //     if($data['is_live'] == 1){
        //         $siturl = 'live?id='.$id;
        //     }else{
        //         $siturl = 'play-video?id='.$id;
        //     }            
        // }
         $html .= '<div class="pb_card_details mb-3  img_pdf_dtes" data-id="' . $data['id'] . '" 
                  data-title="' . $data['title'] . '"  ><a href="'. base_url($siturl) .'">
                    <div class=" pb_img_pdf"><div class="live_upcoming">';
                    // if(isset($data['is_live'])){
                    //     if($data['is_live'] == 1){
                    //         $html .= '<img src="'.LIVEEVENT.'" alt="live">';
                    //     }else if($data['is_live'] == 0){
                    //         $html .= '<img src="'.UPCOMINGEVENT.'" alt="live">';
                    //     }
                    // }
            
            $html .= '</div><img class="img-fluid" src="' . (!empty($data['thumbnail']) ? htmlspecialchars($data['thumbnail'], ENT_QUOTES, 'UTF-8') : base_url(ThumbnailPlaceholder)) . '" ></div>
            </a></div>';

            
       }

        return $html;
    }
    
    
    private function generateSitUrl($data, $id)
    {
        $return = site_url(PLAYVIDEO . $id);
        // if ($data['still_live'] == 1) {
        // $return = site_url(PBLIVE . $id);
        // }
   
        $isSubscribed = SUBSCRIPTION_CHECK;
        if (isset($data['owned_by'])) {
            if ($data['owned_by'] > 0) {
                $constantName = 'SUBSCRIPTION_CHECK' . "_" .$data['owned_by'];
                if (defined($constantName)) {
                    $isSubscribed = constant($constantName);
                }else{
                    $isSubscribed = 0;
                }
            }
        }
        if (!empty($this->session->id) || empty($this->session->id)) {
            if ($data['is_paid'] == 1 && $isSubscribed != 1) {
                $return = site_url(PLAYVIDEO . $id);
            }
        }
        return $return ;
    }

    
    private function generateSitUrl1($data, $id)
    {  if($data['is_paid']== 2){
        return  site_url(PLAYVIDEO . $id);
        }
        if ($data['is_live'] == 1) {
            return site_url(PBLIVE . $id);
        } else {
            return site_url('play-episode?id=' . $id);
        }
    }
    
    private function generateMessage($data)
    {
       
        $isSubscribed = SUBSCRIPTION_CHECK;
        if (isset($data['owned_by'])) {
            if ($data['owned_by'] > 0) {
                $constantName = 'SUBSCRIPTION_CHECK' . "_" .$data['owned_by'];
                if (defined($constantName)) {
                    $isSubscribed = constant($constantName);
                }else{
                    $isSubscribed = 0;
                }
            }
        }
        $return = ($data['type'] == 0) ? $this->lang->line('Watchnow') : $this->lang->line('ListenToWatch');

        if (!empty($this->session->id) && ($data['is_paid'] == 1) && ($isSubscribed != 1)) {
            $return = ($data['type'] == 0) ? $this->lang->line('Subscribewatch') : $this->lang->line('Subscribelisten');
        } elseif (empty($this->session->id) && ($data['is_paid'] == 1) && ($isSubscribed != 1)) {
            $return = ($data['type'] == 0) ? $this->lang->line('Subscribewatch') : $this->lang->line('Subscribelisten');
        } elseif ($data['is_paid'] == 2) {
            $return =  $this->lang->line('available_to_rent');
        } 
        return $return;
    }
    
    private function getDescription($descriptions)
    {
        if (is_array($descriptions)) {
            foreach ($descriptions as $desc) {
                if ($desc['language'] === "English") {
                    return $desc['content'];
                }
            }
        }
        return '';
    }
    

    public function get_popular_data()
    {
        $start = $this->input->post('start');
        $url = "getSearchRecommendations/".$start;
    
        $document = array();
        $data = call_curl_by_get_method($url, $document);
       // pre($data);die;
        $rent_idx = [];
        if(isset($data['data'])){
            foreach ($data['data'] as $key => $value) {
                $data['data'][$key]['is_rented']=0;
                if($value['is_paid']==0){
                    $rent_idx[] = $value['id'];
                }
            }
            if (!empty($rent_idx)) {
                // Ensure $rent_idx is an array before using join
                if (!is_array($rent_idx)) {
                    $rent_idx = explode(',', $rent_idx);  // Convert string to array if necessary
                }
            
                // Create the rent URL
                $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . implode(',', $rent_idx);
            
                // Call the API to get rental data
                $rentData = call_curl_by_get_method($rent_url, []);
            
                // Check if the API call was successful
                if (isset($rentData['status']) && $rentData['status']) {
                    // Loop through the rental data and update the main data
                    foreach ($rentData['data'] as $key => $value) {
                        // Check if the 'show_id' matches in the main data
                        foreach ($data['data'] as $dkey => $dvalue) {
                            if (isset($dvalue['id']) && $value['show_id'] == $dvalue['id']) {
                                // Update 'is_rented' field based on 'isOnRent'
                                if (isset($value['isOnRent'])) {
                                    $data['data'][$dkey]['is_rented'] = $value['isOnRent'];
                                } else {
                                    // Handle the case if 'isOnRent' is not set (optional)
                                    $data['data'][$dkey]['is_rented'] = false;  // Or any default value you prefer
                                }
                            }
                        }
                    }
                }
            }
            
            
        }
        $html = '';
        $status = false;
        //pre($data);die;
        if (!empty($data['data'])) {
            foreach ($data['data'] as $key => $item) {
               // $item['is_live'] = 0;
                // Initialize variables
                $descriptions = $this->getEnglishDescription($item);
                $genres =((!empty($item['genres'])) ? implode(' | ', array_slice(explode(',', $item['genres']), 0, 3)) : '');//  isset($item['genres']) ? str_replace(',', ' | ', $item['genres']) : '';
                $thumbnail = !empty($item['thumbnail']) ? $item['thumbnail'] : ThumbnailPlaceholder;
                $poster_url = !empty($item['poster_url']) ? $item['poster_url'] : PosterPlaceholder;
                $id = aes_cbc_encryption_(trim($item['id']));
                $video_id = aes_cbc_encryption_(trim($item['video_id']));
                $messge = '';
                $isSubscribed = SUBSCRIPTION_CHECK;
                if (isset($item['owned_by'])) {
                    if ($item['owned_by'] > 0) {
                        $constantName = 'SUBSCRIPTION_CHECK' . "_" .$item['owned_by'];
                        if (defined($constantName)) {
                            $isSubscribed = constant($constantName);
                        }else{
                            $isSubscribed = 0;
                        }
                    }
                }  
                // Determine message and URL based on payment status and user session

                if ((!empty($this->session->id) && $item['is_paid'] == 1 && $isSubscribed != 1) ||
                (empty($this->session->id) && $item['is_paid'] == 1 && $isSubscribed != 1)) {            
                    $messge = ($item['type'] == 0) ? $this->lang->line('Subscribewatch') : $this->lang->line('Subscribelisten');
                    $siturl1 = site_url('subscription?publisherid='.($item['owned_by'])??0);

                } elseif ($item['is_paid'] == 2) {
                    $messge = $this->lang->line('available_to_rent');
                    $siturl1 = site_url(PLAYVIDEO . $id);
                } else {
                    $messge = ($item['type'] == 0) ? $this->lang->line('Watchnow') : $this->lang->line('ListenToWatch');
                    $siturl1 = site_url('play-episode?id=' . $id);
                }
    
                $site_url = $site_url1= $item['still_live'] ? site_url(PBLIVE . $id) : site_url(PLAYVIDEO . $id);
                if($item['type'] <2 || $item['type'] == 9){
                    $pb_watch_width =''; $hidebtn ='';  
                    $playbtn_hide = '';
                    $btndisable = '';
                    if($item['type'] == 9 && isset($item['is_live']) && $item['is_live'] == 1){
                        $site_url =  $site_url1 = $siturl = $siturl1 = 'live?id='.$id;
                        $pb_watch_width = 'pb_watch_width';
                        $messge = $this->lang->line('Watchnow') ;
                    } else if ($item['type'] == 9 && isset($item['is_live']) && $item['is_live'] == 0) {
                        $item['live_date_time'] = isset($item['live_date_time']) ?? milliseconds() + 1;
                        $datetime = $this->formatTimestamp($item['live_date_time']);
                        $buttonText =   $this->lang->line("began_on") ." " . $datetime;
                        $messge  =  $buttonText;
                        $pb_watch_width = 'pb_watch_width';
                         $hidebtn = 'd-none';
                        $site_url =   $site_url1=  $siturl1 = $siturl = site_url(PLAYVIDEO . $id);

                    }else  if($item['type']==9 &&  $item['is_live']==4){
                        $datetime = $this->formatTimestamp($item['live_date_time']);
                         $buttonText =$this->lang->line("since_text") ." " . $datetime;
                       $messge  =  $buttonText;
                       $siturl1 = $siturl = '';
                       $pb_watch_width = 'pb_watch_width';
                    }
                   // $item['is_live']=4; $item['type']=9;
                $html .= '<div class="searcSection">';
                // if($item['is_live'] != 4){
                    $html .=  '<a href="' . $site_url . '">';
                // }
                $html .= DIV_START;
                $playbtn =  base_url('assets/images/playBtn.png');
                    if($item['type']==9 && isset($item['is_live']) && $item['is_live'] == 1){
                    $html .= '<div class="live_upcomingss"> <div class="live_up_lang"><span></span><p class="mb-0">' . $this->lang->line("Live") . '</p></div></div>';
                }else{
                    if($item['type']==9 && isset($item['is_live']) && $item['is_live'] == 0){
                        $playbtn = '';
                    $html .= '<div class="live_upcomingss"> <div class="live_up_lang"><p class="mb-0">' . $this->lang->line("upcoming") . '</p></div></div>';
   
                    }
                    if($item['type']==9 && isset($item['is_live']) && $item['is_live'] == 4){
                        $datetime = $this->formatTimestamp($item['live_date_time']);
                         $buttonText =$this->lang->line("since_text") ." " . $datetime;
                            $messge =  $buttonText;
                        $siturl1 = $siturl = '';
                        $pb_watch_width = 'pb_watch_width';
                        $playbtn_hide = 'd-none';
                        //$btndisable = 'disabled';
                    }
                }
                
                if (($item['is_paid'] == 1)) {
                    $playbtn =  base_url('assets/images/playBtn.png');
                } 
                if (($item['is_paid'] == 2)) {
                    $playbtn =  base_url('assets/images/vector.svg');
                    if($item['is_rented'] == 1){
                        $playbtn =  base_url('assets/images/playBtn.png');
                    }
                } 

                if ($item['is_paid'] == 1 || $item['is_paid'] == 2) {
                    $html .= DIVCLASS . PMCLASS . IMGSRC . ($item['is_paid'] == 1 ? PRIMIUM : RENTAL) . '" alt="' . ($item['is_paid'] == 1 ? 'premium' : 'rental') . '"></div>';
                }
                $tag = $this->filterVisibleTag($item['tags']);       
                $html .= '<div class="pb_card_img ">
                            <img src="' . htmlspecialchars($thumbnail, ENT_QUOTES, 'UTF-8') . '" class="img-fluid as3" alt="thumbnail">';
                            if($tag != ''){
                                $html .= '<div class="pre_tags"><img src="'. $tag.'" class="img-fluid" alt="tags_img"></div>';
                            }                        
                             $html .= '</div>
                        <div class="pb_card_img2">
                            <div class="pb_card_vd-2">
                                <img src="' . htmlspecialchars($poster_url, ENT_QUOTES, 'UTF-8') . '" class="img-fluid" alt="image">
                            </div>
                            <div class="pb_card_content">
                                <h6>' . htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') . '</h6>
                                <p class="discription_gen">' . htmlspecialchars($genres, ENT_QUOTES, 'UTF-8') . '</p>
                                <p class="discription_dt">' . htmlspecialchars($descriptions, ENT_QUOTES, 'UTF-8') . '</p>
                                <div class="d-flex align-items-center mt-1 pb_add_btns">
                                    <a href="' . $siturl1 . '" 
                                    class="text-decoration-none pb_watch_btn d-block mr-2 ' . $pb_watch_width . '">
                                    <img class="img-fluid watchCardImg ' . $playbtn_hide . '" src="' . $playbtn . '" alt="watch">
                                    ' . $messge  . '
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
                  //    if($item['is_live'] != 4){
               $html .= ' </a>';
                 //       }
            $html .= '</div>';
                        }else{
                            $siturl = 'content-detail?id='.$id;
                            $html .= '<div class="searcSection"><div class="pb_card_details img_pdf_dtes mb-3"><a href="'. base_url($siturl) .'">
                                       <div class="pb_img_pdf "><img class="img-fluid" src="' .  $thumbnail  . '" ></div>
                                       </a>                
                               </div></div>';
                        }
            }
    
            $status = true;
        }
    
        // Prepare JSON response
        $response = array('status' => $status, 'html' => $html);
        echo json_encode($response);
    }
    
    private function getEnglishDescription($item)
    {
        $descriptions = '';
        if (is_array($item['description'])) {
            foreach ($item['description'] as $desc) {
                if ($desc['language'] === "English") {
                    $descriptions = $desc['content'];
                    break; // Stop looping once the English description is found
                }
            }
        }
        return $descriptions;
    }
    
    private function shouldRedirectToSubscription($item)
    {
        $isSubscribed = SUBSCRIPTION_CHECK;
        if (isset($item['owned_by'])) {
            if ($item['owned_by'] > 0) {
                $constantName = 'SUBSCRIPTION_CHECK' . "_" .$item['owned_by'];
                if (defined($constantName)) {
                    $isSubscribed = constant($constantName);
                }else{
                    $isSubscribed = 0;
                }
            }
        }  
        return !empty($this->session->id) && ($item['is_paid'] == 1) && ($isSubscribed != 1);
    }
    

    public function notification()
    {
        $start = $this->input->post('start');
        $url = "getNotificationList?page={$start}";
        $document = array();
        $data = call_curl_by_get_method($url, $document);
    
        $html = '';
        $status = false;
        $not = aes_cbc_encryption_('notification');
    
        if (!empty($data['data'])) {
            foreach ($data['data'] as $key => $value) {
                if (!empty($value['extra']['content_id'])) {
                    $content_id = aes_cbc_encryption_(trim($value['extra']['content_id']));
                    $url = isset($value['extra']['url']) ? $value['extra']['url'] : base_url('assets/website_assets/images/Frame6358267.png');
                    $title = htmlspecialchars($value['title'], ENT_QUOTES, 'UTF-8');
                    $message = htmlspecialchars(substr(strip_tags($value['message']), 0, 60), ENT_QUOTES, 'UTF-8');
                    $created_date = date('d-m-Y', $value['created']);
    
                    $html .= '<ul>
                    <li onclick="eventfire(\'' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '\', \'' . htmlspecialchars($value['extra']['content_id'], ENT_QUOTES, 'UTF-8') . '\')">
                        <a href="' . htmlspecialchars(site_url("play-video?id={$content_id}&types={$not}"), ENT_QUOTES, 'UTF-8') . '" class="">
                            <div class="notiPic">
                                <img src="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" class="img-fluid" alt="Notification Image">
                                <div>
                                    <p class="notiHead">' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</p>
                                    <span class="notiTittle">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</span>
                                </div>
                            </div>
                            <div>
                                <p class="notiDay">' . htmlspecialchars($created_date, ENT_QUOTES, 'UTF-8') . '</p>
                            </div>
                        </a>
                    </li>
                </ul>';
                
                }
            }
            $status = true;
        }
    
        $response = array('status' => $status, 'html' => $html);
        echo json_encode($response);
    }
    

    public function getMediaUrl()
{
    $response = array(
        'status' => false,
        'msg' => 'data not found'
    );

    if ($this->input->post()) {
        $id = $this->input->post('id');
        if (!empty($id)) {
            $url = "getVideoUrl/" . $id;
            $video_data = call_curl_by_get_method($url, array());
            
            if (isset($video_data['status']) && $video_data['status'] && !empty($video_data['data'])) {
                if ($video_data['data']['is_drm_protected'] == 1) {
                    $drm_url = "createDrmLicense";
                    $drm_params = array(
                        'media_id' => $video_data['data']['id'] ?? '',
                        'vdc_id' => $video_data['data']['vdc_id']
                    );
                    $drm_data = file_curl_contents($drm_url, $drm_params);
                    
                    $response = array(
                        'status' => true,
                        'id' => $video_data['data']['id'],
                        'show_id' => $video_data['data']['show_id'],
                        'file_url' => $drm_data['data']['file_url'] ?? '',
                        'token' => $drm_data['data']['token'] ?? '',
                        'poster_url' => $video_data['data']['poster_url'],
                        'drm' => 1
                    );
                } else {
                    $response = array(
                        'status' => true,
                        'id' => $video_data['data']['id'],
                        'show_id' => $video_data['data']['show_id'],
                        'file_url' => $video_data['data']['file_url'],
                        'poster_url' => $video_data['data']['poster_url'],
                        'drm' => 0
                    );
                }
            }
        }
    }

    echo json_encode($response);
}
public function play_episode_audio()
{
    $episode_id_str = $this->input->get('id');
    $type = $this->input->get('type');
    $type_str = $this->input->get('type');
    $dur = $this->input->get('dur') ?? '';
    if (empty($episode_id_str)) {
        show_404();
        die;
    }
    $redirtct = ($this->session->userdata('redirect')) ?? 0;
    $this->session->unset_userdata('redirect');
    $max_res = $this->session->userdata('max_quality');
    // $max_res = 480;
    $view_data['max_res'] = $max_res;
    $episode_id = str_replace(" ", '+', $episode_id_str);
    $types = str_replace(" ", '+', $type_str);
    $episode_id = aes_cbc_decryption_($episode_id);
    $types = aes_cbc_decryption_($types);
    unset($_SESSION['redirect_url']);
   // $url1 = "getContentDetail?id=" . $episode_id;
   $url1 = "getContentDetails/" . $episode_id;
   $content_details = call_curl_by_get_method($url1, $document = array());
      if(!$content_details['status']){
        $this->session->set_flashdata('msg_status', "400");
        $this->session->set_flashdata('toast_msg', $content_details['message']);
        $referer = $this->input->server('HTTP_REFERER');
        if ($referer) {
            redirect($referer);
        } else {
        redirect(base_url());
        }
       }
       $video_id = 0;
        if ($content_details['status']) {
            if (!empty($content_details['data']['season'][0])) {
                $v_id = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) {
                    return $var['is_trailer'] == '0';
                }));
                $video_id = ($v_id[0]['id']) ?? 0;
            }
        }

        //  pre($video_id);die;
        $view_data['encrypted_id'] = aes_cbc_encryption_($video_id);
        $url =  "getVideoUrl/" . $video_id;
        $document2 = array('video_id' => $video_id);
        $document = array();
        $video_details = call_curl_by_get_method($url, $document);
       if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid'] == 1) && !SUBSCRIPTION_CHECK) {
        $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->session->set_userdata('redirect_url', $redirect_url);
      //  if ($this->session->id) {
        redirect('subscription?publisherid='.($content_details['owned_by'])??0);
            die;
       // } else {
          //  redirect('user-login');
          //  die;
       // }
    } else if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid'] == 2)) {
        // $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . $video_details['data']['show_id'];

        // $rentData = call_curl_by_get_method($rent_url, []);
        // // pre($rentData);
        // // die;
        // if ($this->session->id) {
        //     $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . $video_details['data']['show_id']??0;
        //     $rentData = call_curl_by_get_method($rent_url, []);
        //     if ($rentData['status'] && !empty($rentData['data'])) {
        //         foreach ($rentData['data'] as $key => $value) {
        //             if ($value['show_id'] == $video_details['data']['id']) {
        //                 $video_details['data']['is_rented'] = $value['isOnRent'];
        //             }
        //         }
        //     }
        // }
        if(!($video_details['status']) || !($content_details['status'])){
            $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $referer = $this->input->server('HTTP_REFERER');
            if($this->session->id) {
            $this->session->set_flashdata('msg_status', "400");
            if(!($video_details['status'])){
                $this->session->set_flashdata('toast_msg', $video_details['message']);
            }else if(!($content_details['status'])){
                $this->session->set_flashdata('toast_msg', $content_details['message']);
            }
            if ($referer) {
                redirect($referer);
            } else {                   
                redirect(base_url());
            }
        }else{
            $this->session->set_userdata('redirect_url',  $referer);
             redirect('user-login');
             die;
        }
        }
        if (isset($content_details['data']['is_paid']) && ($content_details['data']['is_paid'] == 2 && ($video_details['status']) && !isset($video_details['data']['title']))) {            
                $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $referer = $this->input->server('HTTP_REFERER'); 
                if($this->session->id) {
             //   $this->session->set_userdata('redirect_url', $redirect_url);
                $this->session->set_flashdata('msg_status', "400");
                $this->session->set_flashdata('toast_msg', $this->lang->line('available_on_rent'));
                if ($referer) {
                    redirect($referer);
                } else {
                   
                redirect(base_url());
                }
               
            } else {
                $this->session->set_userdata('redirect_url',  $referer);
               // pre($_SESSION);die;
                redirect('user-login');
                die;
            }
        }
    }

        // if(!$video_details['status']){
        //     redirect('no-data');
        //     die;
        // }
    
    //  pre($video_details);
    // pre($content_details);die("test");
    // $id = str_replace(" ", "+", $this->input->get('cid'));
    if($this->session->id){
    if (!($video_details['status']) || !($content_details['status']) || ($this->session->userdata('Iskid') != $content_details['data']['is_child'])) {
        redirect(base_url('/')); //die;
    }
   }
    $content_id = $video_details['data']['show_id'] ?? 0;
    // $url1 = "getContentDetail?id=" . $content_id;
    // $content_details = call_curl_by_get_method($url1, $document);
    $time = time();
    if ($types == 'continue_watching') {
        matomo_content_hit('ContinueWatching', 'Select', $episode_id . '/' . $content_details['data']['title'] . '/' . $time, $content_details['data']['genres']);
    }
    if ($types == 'watchlist') {
        matomo_content_hit('Watchlist', 'Play', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
    }
    if ($types == 'next') {
        matomo_content_hit('Audio', 'Next', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
    }
    if ($types == 'prev') {
        matomo_content_hit('Audio', 'Previous', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
    }
    if ($type_str == 'banners') {
        matomo_content_hit('Banners', 'WatchNow', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
    }
    if ($types == 'next') {
        matomo_content_hit('Audio', 'Next', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
    }
    if ($types == 'prev') {
        matomo_content_hit('Audio', 'Previous', $episode_id . '/' . $content_details['data']['title'], $content_details['data']['genres']);
    }

$view_data['episode_id'] = $episode_id;
$view_data['video_details'] = $video_details;
$view_data['dur'] = $dur;
$view_data['content_details'] = $content_details;
if (isset($view_data['video_details']['error']) && $view_data['video_details']['error'] == '100100') {
    $this->logout();
}
$view_data['video_details']['data']['redirtct'] = $redirtct;
$vdc_id = $view_data['video_details']['data']['vdc_id'] ?? '';
//pre($view_data);die;
if (isset($view_data['video_details']['data']['is_drm_protected']) && $view_data['video_details']['data']['is_drm_protected'] == 1) {
    $documents = array('media_id' => $view_data['video_details']['data']['id'] ?? '', 'vdc_id' => $vdc_id);
    $urls = "createDrmLicense";
    $url  = file_curl_contents($urls, $documents);
    //  $url = drm_vdo_validate($vdc_id);
    // pre($documents);
    //   pre($url);die;
    $view_data['video_details']['data']['file_url'] = ($url['data']['file_url']) ?? '';
    $view_data['video_details']['data']['token'] = ($url['data']['token']) ?? '';
}
$bandwidth = array();
// if(isset($view_data['video_details']['data']['is_free']) && $view_data['video_details']['data']['is_free']==0 && !$this->session->userdata('id')){

// redirect('user-login');

// }
if (!$this->session->DeviceType) {
    $browser = detectBrowser();
    $this->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 1);
    $DeviceType = $browser['DeviceType'];
} else {
    $DeviceType = $this->session->DeviceType;
}
$view_data['DeviceType'] = $DeviceType;
if (isset($video_details['data']['media_type']) && ($video_details['data']['media_type']) == 1) {
    if (isset($view_data['video_details']['data']['is_drm_protected']) && $view_data['video_details']['data']['is_drm_protected'] == 1) {
        if ($DeviceType != 2) {
            $bandwidth = $this->get_mpd_bitrate($view_data['video_details']['data']['file_url'], 'bandwidth');
        }
    } else {
        if ($DeviceType != 2) {
            $bandwidth = $this->get_available_bitrates($view_data['video_details']['data']['file_url'], 'AVERAGE-BANDWIDTH');
        }
    }
    $lastSlashPos = strrpos($view_data['video_details']['data']['file_url'], '/');
    $baseurl = substr($view_data['video_details']['data']['file_url'], 0, $lastSlashPos + 1);
    $view_data['baseurl'] = $baseurl;
    $view_data['bandwidth'] = $bandwidth;
    $data['without_head'] = 1;
    $data['page_data'] = $this->load->view(AUDIOVIEW, $view_data, true);
} else {
    if (isset($video_details['data']['is_drm_protected']) && ($video_details['data']['is_drm_protected']) == 1) {
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/dashboard/drm_play', $view_data, true);
    } else {
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/dashboard/play_episode_hls', $view_data, true);
    }
}
echo modules::run('web/template/call_default_template', $data);
}


public function play_media()
{
$episode_id_str = $this->input->get('id');
$type_str = $this->input->get('type');
$dur = $this->input->get('dur') ?? '';
$view_data['dur'] = $dur;
if (empty($episode_id_str)) {
    show_404();
    die;
}
$redirtct = ($this->session->userdata('redirect')) ?? 0;
$this->session->unset_userdata('redirect');
unset($_SESSION['redirect_url']);
$episode_id = str_replace(" ", '+', $episode_id_str);
$types = str_replace(" ", '+', $type_str);
$view_data['encrypted_id'] = $episode_id;
$episode_id = aes_cbc_decryption_($episode_id);
$types = aes_cbc_decryption_($types);
//pre($episode_id);die('sss');
// pre($content_details);die;

$url =  "getVideoUrl/" . $episode_id;
$document2 = array('video_id' => $episode_id);
$document = array();
$video_details = call_curl_by_get_method($url, $document);
// pre($video_details);
// die;
if(!($video_details['status'])){
    $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $referer = $this->input->server('HTTP_REFERER');
    $this->session->set_flashdata('msg_status', "400");
    if(!($video_details['status'])){
        $this->session->set_flashdata('toast_msg', $video_details['message']);
    }
    if ($referer) {
        redirect($referer);
    } else {                   
        redirect(base_url());
    }
}
$isSubscribed = SUBSCRIPTION_CHECK;
    if (isset($data['owned_by'])) {
        if ($data['owned_by'] > 0) {
        $isSubscribed = SUBSCRIPTION_CHECK."_". $data['owned_by'];
        }
        }    if (isset($video_details['data']['is_paid']) && ($video_details['data']['is_paid'] == 1) && ! $isSubscribedK) {
    $redirect_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $this->session->set_userdata('redirect_url', $redirect_url);
  //  if ($this->session->id) {
        redirect('subscription?publisherid='.($data['owned_by'])??0);
        die;
   // } else {
      //  redirect('user-login');
      //  die;
   // }
} else if (isset($video_details['data']['is_paid']) && ($video_details['data']['is_paid'] == 2)) {
    if (isset($video_details['data']['is_paid']) && ($video_details['data']['is_paid'] == 2) && !isset($video_details['data']['title'])) {            
            $this->session->set_flashdata('msg_status', "400");
            $this->session->set_flashdata('toast_msg', $this->lang->line('available_on_rent'));
            $play_url = $_GET['play-video'];
            $redirecturl = PLAYVIDEO . $play_url;
            if(!empty($play_url)){
              redirect( $redirecturl );
              die;
            }else{
                redirect(base_url('/'));
                die;
            }
    }
}
if(!$video_details['status']){
    redirect('no-data');
    die;
}
$content_id = $video_details['data']['show_id'] ?? 0;
$url1 = "getContentDetails/" . $content_id;
$content_details = call_curl_by_get_method($url1, $document);
// pre($content_details);die("sssss");
if($this->session->id){
if (!($video_details['status']) || !($content_details['status']) || ($this->session->userdata('Iskid') != $content_details['data']['is_child'])) {
    redirect(base_url('/'));
    //die;
}
}
$max_res = $this->session->userdata('max_quality');
// $max_res = 480;
$view_data['max_res'] = $max_res;
$view_data['video_details'] = $video_details;
$view_data['content_details'] = $content_details;
if (isset($view_data['video_details']['error']) && $view_data['video_details']['error'] == '100100') {
    $this->logout();
}
$view_data['video_details']['data']['redirtct'] = $redirtct;
$vdc_id = $view_data['video_details']['data']['vdc_id'] ?? '';
//pre($view_data);die;
if (isset($view_data['video_details']['data']['is_drm_protected']) && $view_data['video_details']['data']['is_drm_protected'] == 1) {
    $documents = array('media_id' => $view_data['video_details']['data']['id'] ?? '', 'vdc_id' => $vdc_id, 'is_download' => 0);
    $urls = "createDrmLicense";
    $url  = file_curl_contents($urls, $documents);

    // pre($url);die("sjsjs");
    //  $url = drm_vdo_validate($vdc_id);
    //  pre($url);die;
    $view_data['video_details']['data']['file_url'] = ($url['data']['file_url']) ?? '';
    $view_data['video_details']['data']['token'] = ($url['data']['token']) ?? '';
}

$season_check = '';
if (isset($content_details['data']['season']) && !empty($content_details['data']['season'])) {
    $season_check = array_values(array_filter($content_details['data']['season'][0]['videos'], function ($var) use ($episode_id) {
        return $var['id'] == $episode_id;
    }));
}
$category_title = ($content_details['data']['category_title']) ?? '';
$season_id = isset($season_check[0]['season_id']) ? $season_check[0]['season_id'] : '';
$season_name = isset($season_check[0]['season']) ? $season_check[0]['season'] : '';
$episode_name = isset($season_check[0]['title']) ? $season_check[0]['title'] : '';
$view_data['episode_id'] = $episode_id;
$moto_title = @$content_details['data']['id'] . '/' . @$content_details['data']['title'] . '/' . $category_title . '/' .   $season_id . '/' . $season_name . '/' . $episode_id . '/' . $episode_name;

if ($types == 'continue_watching' && isset($content_details['data']['title'])) {
    matomo_content_hit('ContinueWatching', 'Select',     $moto_title, $content_details['data']['genres']);
}
if (!$this->session->DeviceType) {
    $browser = detectBrowser();
    $this->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 1);
    $DeviceType = $browser['DeviceType'];
} else {
    $DeviceType = $this->session->DeviceType;
}
$view_data['DeviceType'] = $DeviceType;
$bandwidth = array();

if (isset($video_details['data']['media_type']) && ($video_details['data']['media_type']) == 1) {
    if (isset($view_data['video_details']['data']['is_drm_protected']) && $view_data['video_details']['data']['is_drm_protected'] == 1) {
        if ($DeviceType != 2) {
            $bandwidth = $this->get_mpd_bitrate($view_data['video_details']['data']['file_url'], 'bandwidth');
        }
    } else {
        if ($DeviceType != 2) {
            $bandwidth = $this->get_available_bitrates($view_data['video_details']['data']['file_url'], 'AVERAGE-BANDWIDTH');
        }
    }
    $lastSlashPos = strrpos($view_data['video_details']['data']['file_url'], '/');
    $baseurl = substr($view_data['video_details']['data']['file_url'], 0, $lastSlashPos + 1);
    $view_data['baseurl'] = $baseurl;
    $view_data['bandwidth'] = $bandwidth;
    $data['without_head'] = 1;
    $data['page_data'] = $this->load->view(AUDIOVIEW, $view_data, true);
} else {

    if (isset($video_details['data']['is_drm_protected']) && ($video_details['data']['is_drm_protected']) == 1) {
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/dashboard/drm_play', $view_data, true);
    } else {
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/dashboard/play_episode_hls', $view_data, true);
    }
}
//  pre($view_data);die;
echo modules::run('web/template/call_default_template', $data);
}




public function get_available_bitrates($m3u8_url, $search = 'AVERAGE-BANDWIDTH')
{
    $streams = array();
    try {
        try {
            $m3u8_content = @file_get_contents($m3u8_url);
        } catch (Exception $e) {
            $m3u8_content = false;
        }
        if ($m3u8_content !== false) {
            $lines = explode("\n", $m3u8_content);
            $bitrates = array();
            $streams = array();
            $current_bitrate = null;
            foreach ($lines as $line) {
                if (strpos($line, '#EXT-X-STREAM-INF:') === 0) {
                    $parts = explode(',', $line);
                    foreach ($parts as $part) {
                        if (strpos($part, $search . '=') === 0) {
                            $bitrate = substr($part, strlen($search . '='));
                            $current_bitrate = $bitrate;
                            $bitrates[] = $bitrate;
                        }
                    }
                } elseif (!empty($line) && $line[0] !== '#') {
                    if ($current_bitrate !== null) {
                        $streams[$current_bitrate] = trim($line);
                        $current_bitrate = null;
                    }
                }
            }
        } else {
            $streams = array();
        }
    } catch (Exception $e) {
        $streams = array();
    }
    return $streams;
}

public  function get_mpd_bitrate($mpdUrl, $search = 'height')
{
    $bitratesWithUrls = array();
//  pre($mpdUrl);die;
    if ($mpdUrl) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $mpdUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $mpdContent = curl_exec($ch);
            curl_close($ch);

            if ($mpdContent !== false) {
                $pattern = '/<Representation.*?' . $search . '=["\'](\d+)["\'].*?<BaseURL>(.*?)<\/BaseURL>/s';
                    preg_match_all($pattern, $mpdContent, $matches, PREG_SET_ORDER);
                    foreach ($matches as $match) {
                    $bandwidth = $match[1];
                    $baseUrl = rtrim($match[2], '/');
                    if (!empty($bandwidth) && !empty($baseUrl)) {
                        $bitratesWithUrls[$bandwidth] = $baseUrl;
                    }
                }
            } else {
                error_log('Error fetching MPD content from URL: ' . $mpdUrl);
            }
        } catch (Exception $e) {
            
            error_log('Error processing MPD file: ' . $e->getMessage());
        }
    }

    return $bitratesWithUrls;
}
public function terms_conditions()
{
    $page = isset($_GET['type']) ? 'Login' : 'Page';
    $url = "getStaticPage/3";
    $document = [];
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    $view_data['page'] = "terms_conditions";
    $data['without_head'] = 2;
    $data['page_data'] = $this->load->view(PRIVACY, $view_data, true);
            echo modules::run(TempMSG, $data);
}

public function terms_conditions_mobile()
{
   
    $url = "getStaticPage/3";
    $document = [];
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    $view_data['page'] = "privacy_policy";
    $data['page_data'] = $this->load->view(RESPONSIVE, $view_data, false);
    echo $data['page_data'];
}

public function privacy_policy()
{
$page = isset($_GET['type']) ? 'Login' : 'Page';
$url = "getStaticPage/2";
$document = [];
$view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
$view_data['page'] = "privacy_policy";
$data['without_head'] = 2;
$data['page_data'] = $this->load->view(PRIVACY, $view_data, true);
echo modules::run(TempMSG, $data);
}

public function privacy_policy_mobile()
{
    $url =  "getStaticPage/2";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    $view_data['page'] = "privacy_policy";
    $data['without_head'] = 1;
    $data['page_data'] = $this->load->view(RESPONSIVE, $view_data, false);
    //echo modules::run(TempMSG, $data);
}

public function about_us()
{
    $url =  "getStaticPage/1";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    if(isset($view_data['privacy_policy']['data']['description'])){
        $view_data['privacy_policy']['data']['description'] = html_entity_decode($view_data['privacy_policy']['data']['description']);
    }
    $view_data['page'] = "AboutUs";
    $data['without_head'] = 2;
    $data['page_data'] = $this->load->view(PRIVACY, $view_data, true);
    echo modules::run(TempMSG, $data);
}
public function about_us_mobile()
{
    $url =  "getStaticPage/1";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    if(isset($view_data['privacy_policy']['data']['description'])){
        $view_data['privacy_policy']['data']['description'] = html_entity_decode($view_data['privacy_policy']['data']['description']);
    }
    $view_data['page'] = "AboutUs";
    $data['page_data'] = $this->load->view(RESPONSIVE, $view_data, false);
    // echo modules::run(TempMSG, $data);
}


public function error()
{
    $this->load->view('web/error_404');
}


public function continue_watching_details()
{
    $url =  "getContinueWatching/lastupdated/0000000000/platform/0";
    $view_data['continue_watching'] = call_curl_by_get_method($url, array());
    if (isset($view_data['continue_watching']['error']) && $view_data['continue_watching']['error'] == '100100') {
        $this->logout();
    }
    $data['without_head'] = 2;
    $data['page_data'] = $this->load->view('web/dashboard/continue_watching_details', $view_data, true);
    echo modules::run(TempMSG, $data);
}

public function logout()
{
    session_unset();
    session_destroy();
    redirect('user-login');
}

public function help_support_mobile()
{
    $url =  "getStaticPage/5";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    if(isset($view_data['privacy_policy']['data']['description'])){
        $view_data['privacy_policy']['data']['description'] = html_entity_decode($view_data['privacy_policy']['data']['description']);
    }
    //$view_data['privacy_policy'] = file_curl_contents($url,$document,$is_encryt=0);
    $view_data['page'] = "Contact Us";
    //print_r($view_data); die();
    $data['page_data'] = $this->load->view(RESPONSIVE, $view_data, true);

    // echo modules::run(TempMSG, $data);
}

public function help_support()
{
    $url =  "getStaticPage/5";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    pre($view_data); die;
    if(isset($view_data['privacy_policy']['data']['description'])){
        $view_data['privacy_policy']['data']['description'] = html_entity_decode($view_data['privacy_policy']['data']['description']);
    }
    //$view_data['privacy_policy'] = file_curl_contents($url,$document,$is_encryt=0);
    $view_data['page'] = "ContactUs";
    //print_r($view_data); die();
    $data['page_data'] = $this->load->view('web/dashboard/faq', $view_data, true);

    echo modules::run(TempMSG, $data);
}

public function help_support_content()
{
  
    $url =  "getHelpAndSupport";
    $document = array();
    $view_data['faq'] = call_curl_by_get_method($url, $document);
    //pre($this->session->userdata()); die;
    //pre($view_data['faq']['data']); die;
    $lang_code = ($this->session->userdata('lang_code'))?$this->session->userdata('lang_code'):"en";
    $lang_code_small = strtolower(($this->session->userdata('lang_id'))?$this->session->userdata('lang_id'):"english");
    $lang_code_caps = ucfirst($lang_code_small);
    //pre($lang_code_small); pre($lang_code_caps); die;
    $all_cat = [];
    if(isset($view_data['faq']['data']) && !empty($view_data['faq']['data'])){
        foreach($view_data['faq']['data'] as $each_cat){
            $updated_arr = [];
            foreach($each_cat as $key => $value){
                if($key == "category_name"){ 
                    if(is_array($value)){
                        $pre_value = $value;
                        if(isset($value[$lang_code_small])){
                            $value = $value[$lang_code_small];
                        } else if(isset($value[$lang_code_caps])){
                            $value = $value[$lang_code_caps];
                        } else if(isset($value[$lang_code])){
                            $value = $value[$lang_code];
                        } else{
                            $value = $pre_value;
                        }
                    } else { 
                        $pre_value = $value;
                        $value = @json_decode($value,true);
                        if(is_array($value)){
                            if(isset($value[$lang_code_small])){
                                $value = $value[$lang_code_small];
                            } else if(isset($value[$lang_code_caps])){
                                $value = $value[$lang_code_caps];
                            } else if(isset($value[$lang_code])){
                                $value = $value[$lang_code];
                            } else{
                                $value = $pre_value;
                            }
                        } else {
                            $value = $pre_value;
                        } 
                    }
                }
                
                if($key == "faq_content"){ //pre($value);
                    $all_faq_content = [];
                    if(is_array($value) && !empty($value)){ 
                        foreach($value as $each_val){
                            $faq_content = [];
                            //pre($each_val);
                            foreach($each_val as $key_2 => $value_2){ 
                                if($key_2 == "title"){  
                                    if(is_array($value_2)){
                                        if(isset($value_2[$lang_code_small])){
                                            $value_2 = $value_2[$lang_code_small];
                                        } else if(isset($value_2[$lang_code_caps])){
                                            $value_2 = $value_2[$lang_code_caps];
                                        } else if(isset($value_2[$lang_code])){
                                            $value_2 = $value_2[$lang_code];
                                        }  else{ 
                                            $value_2 = $pre_value_2;
                                        }
                                    } else { 
                                        $pre_value_2 = $value_2;
                                        $value_2 = @json_decode($value_2,true);
                                        if(is_array($value_2)){
                                            if(isset($value_2[$lang_code_small])){
                                                $value_2 = $value_2[$lang_code_small];
                                            } else if(isset($value_2[$lang_code_caps])){
                                                $value_2 = $value_2[$lang_code_caps];
                                            } else if(isset($value_2[$lang_code])){
                                                $value_2 = $value_2[$lang_code];
                                            }  else{
                                                $value_2 = $pre_value_2;
                                            }
                                        } else {
                                            $value_2 = $pre_value_2;
                                        } 
                                    }
                                }
                                if($key_2 == "description"){  
                                    if(is_array($value_2)){
                                        if(isset($value_2[$lang_code_small])){
                                            $value_2 = $value_2[$lang_code_small];
                                        } else if(isset($value_2[$lang_code_caps])){
                                            $value_2 = $value_2[$lang_code_caps];
                                        } else if(isset($value_2[$lang_code])){
                                            $value_2 = $value_2[$lang_code];
                                        }  else{
                                            $value_2 = $pre_value_2;
                                        }
                                    } else { 
                                        $pre_value_2 = $value_2;
                                        $value_2 = @json_decode($value_2,true);
                                        //pre($value_2); die;
                                        if(is_array($value_2) && !empty($value_2)){
                                            if(isset($value_2[$lang_code_small])){
                                                $value_2 = $value_2[$lang_code_small];
                                            } else if(isset($value_2[$lang_code_caps])){
                                                $value_2 = $value_2[$lang_code_caps];
                                            } else if(isset($value_2[$lang_code])){
                                                $value_2 = $value_2[$lang_code];
                                            }  else{
                                                $value_2 = $pre_value_2;
                                            }
                                        } else {
                                            $value_2 = $pre_value_2;
                                        } 
                                    }
                                } 
                                $faq_content[$key_2] = $value_2;
                            }
                            $all_faq_content[] = $faq_content;
                        }
                    }
                    $value =  $all_faq_content;
                }
                $updated_arr[$key] = $value;
            }

            $all_cat[] = $updated_arr;
        }
    }
    
    $view_data['faq']['data'] = $all_cat;
    //pre($view_data['faq']['data']); die;
    $view_data['page'] = "Help and support";
    $data['without_head'] = 2;
    $data['page_data'] = $this->load->view('web/dashboard/faq', $view_data, true);

    echo modules::run(TempMSG, $data);
}

public function help_support_content_details()
{

    $cate_str = $this->input->get('id');
    $type = $this->input->get('type')??'';
    $view_data['type'] = $type;
    $cate_id = str_replace(" ", '+', $cate_str);
    $cate_id = aes_cbc_decryption_($cate_id);
    $url =  "getHelpAndSupport";
    $document = array();
    $view_data['faq'] = call_curl_by_get_method($url, $document);
    //pre($view_data); die;

    $lang_code = ($this->session->userdata('lang_code'))?$this->session->userdata('lang_code'):"en";
    $lang_code_small = strtolower(($this->session->userdata('lang_id'))?$this->session->userdata('lang_id'):"english");
    $lang_code_caps = ucfirst($lang_code_small);
    //pre($view_data['faq']); die;
    //pre($lang_code_small); pre($lang_code_caps); die;
   
    $all_cat = [];
    if(isset($view_data['faq']['data']) && !empty($view_data['faq']['data'])){
        foreach($view_data['faq']['data'] as $each_cat){
            $updated_arr = [];
            foreach($each_cat as $key => $value){
                if($key == "category_name"){ 
                    if(is_array($value)){
                        $pre_value = $value;
                        if(isset($value[$lang_code_small])){
                            $value = $value[$lang_code_small];
                        } else if(isset($value[$lang_code_caps])){
                            $value = $value[$lang_code_caps];
                        } else if(isset($value[$lang_code])){
                            $value = $value[$lang_code];
                        } else{
                            $value = $pre_value;
                        }
                    } else { 
                        $pre_value = $value;
                        $value = @json_decode($value,true);
                        if(is_array($value)){
                            if(isset($value[$lang_code_small])){
                                $value = $value[$lang_code_small];
                            } else if(isset($value[$lang_code_caps])){
                                $value = $value[$lang_code_caps];
                            } else if(isset($value[$lang_code])){
                                $value = $value[$lang_code];
                            } else{
                                $value = $pre_value;
                            }
                        } else {
                            $value = $pre_value;
                        } 
                    }
                }
                
                if($key == "faq_content"){ //pre($value);
                    $all_faq_content = [];
                    if(is_array($value) && !empty($value)){ 
                        foreach($value as $each_val){
                            $faq_content = [];
                            //pre($each_val);
                            foreach($each_val as $key_2 => $value_2){ 
                                if($key_2 == "title"){  
                                    if(is_array($value_2)){
                                        if(isset($value_2[$lang_code_small])){
                                            $value_2 = $value_2[$lang_code_small];
                                        } else if(isset($value_2[$lang_code_caps])){
                                            $value_2 = $value_2[$lang_code_caps];
                                        } else if(isset($value_2[$lang_code])){
                                            $value_2 = $value_2[$lang_code];
                                        }  else{ 
                                            $value_2 = $pre_value_2;
                                        }
                                    } else { 
                                        $pre_value_2 = $value_2;
                                        $value_2 = @json_decode($value_2,true);
                                        if(is_array($value_2)){
                                            if(isset($value_2[$lang_code_small])){
                                                $value_2 = $value_2[$lang_code_small];
                                            } else if(isset($value_2[$lang_code_caps])){
                                                $value_2 = $value_2[$lang_code_caps];
                                            } else if(isset($value_2[$lang_code])){
                                                $value_2 = $value_2[$lang_code];
                                            }  else{
                                                $value_2 = $pre_value_2;
                                            }
                                        } else {
                                            $value_2 = $pre_value_2;
                                        } 
                                    }
                                }
                                if($key_2 == "description"){  
                                    if(is_array($value_2)){
                                        if(isset($value_2[$lang_code_small])){
                                            $value_2 = $value_2[$lang_code_small];
                                        } else if(isset($value_2[$lang_code_caps])){
                                            $value_2 = $value_2[$lang_code_caps];
                                        } else if(isset($value_2[$lang_code])){
                                            $value_2 = $value_2[$lang_code];
                                        }  else{
                                            $value_2 = $pre_value_2;
                                        }
                                    } else { 
                                        $pre_value_2 = $value_2;
                                        $value_2 = @json_decode($value_2,true);
                                        //pre($value_2); die;
                                        if(is_array($value_2) && !empty($value_2)){
                                            if(isset($value_2[$lang_code_small])){
                                                $value_2 = $value_2[$lang_code_small];
                                            } else if(isset($value_2[$lang_code_caps])){
                                                $value_2 = $value_2[$lang_code_caps];
                                            } else if(isset($value_2[$lang_code])){
                                                $value_2 = $value_2[$lang_code];
                                            }  else{
                                                $value_2 = $pre_value_2;
                                            }
                                        } else {
                                            $value_2 = $pre_value_2;
                                        } 
                                    }
                                } 
                                $faq_content[$key_2] = $value_2;
                            }
                            $all_faq_content[] = $faq_content;
                        }
                    }
                    $value =  $all_faq_content;
                }
                $updated_arr[$key] = $value;
            }

            $all_cat[] = $updated_arr;
        }
    }
    //pre($all_cat); die;
    $filteredItems = array_filter($all_cat, function($item) use ($cate_id)  {
        return $item['category_id'] == $cate_id;
    });
    $view_data['faq'] = $filteredItems;

    //pre($filteredItems); die;
    $view_data['page'] = "Help and support";
    $data['without_head'] = 2;
    $data['page_data'] = $this->load->view('web/dashboard/faq_content', $view_data, true);

    echo modules::run(TempMSG, $data);
}

public function contact_us()
{
    $url =  "getStaticPage/4";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    //$view_data['privacy_policy'] = file_curl_contents($url,$document,$is_encryt=0);
    $view_data['page'] = "Contact Us";
    //print_r($view_data); die();
    $data['page_data'] = $this->load->view(RESPONSIVE, $view_data, false);

    // echo modules::run(TempMSG, $data);
}

public function contactus()
{
    $url =  "getStaticPage/4";
    $document = array();
    $view_data['privacy_policy'] = call_curl_by_get_method($url, $document);
    //$view_data['privacy_policy'] = file_curl_contents($url,$document,$is_encryt=0);
    $view_data['page'] = "ContactUs";
    //print_r($view_data); die();
    $data['without_head'] = 2;
    $data['page_data'] = $this->load->view(PRIVACY, $view_data, true);

    echo modules::run(TempMSG, $data);
}

public function matamo_hit_call()
{
    $user_id = $this->input->get('user_id');
    $action = $this->input->get('action');
    $view = $this->input->get('view');
    $pageaction = $this->input->get('pageaction');


    $CI = &get_instance();
    $tracker = new MatomoTracker('1', 'https://matomo.pb-online.co.in/matomo.php');
    $tracker->setIp($_SERVER['REMOTE_ADDR']);
    $tracker->setUserId($user_id);
    $tracker->doTrackEvent($action, $view, $pageaction); // Example event
    $tracker->setCustomVariable(1, 'video player', 'pageUrl');
    $tracker->setGenerationTime(0.5); // Example generation time in seconds
    pre($tracker);
}


public function ajax_data_details()
{
    $id = $this->input->post('id');
    $url = "getContentDetails/{$id}/0";
    $document = [];
    $content_details = call_curl_by_get_method($url, $document);
    if ($content_details['status'] && !empty($content_details['data'])) {
        // $publisher_id = $content_details['data']['owned_by'];
        //     if( $publisher_id > 0){
        //     $url5 =  "subscriptionPlansV2/0/".$publisher_id;
        //     $getplandata =  call_curl_by_get_method($url5, $document);
        //     if(isset($getplandata['data']['plans']['0']['pricing'])&& !empty($getplandata['data']['plans']['0']['pricing']) ){
        //     $content_details['data']['plan_pricing']=$getplandata['data']['plans']['0']['pricing']['0'];
        //     }
        //     }
        $content_details['data']['is_rented'] = 0;
        if ($this->session->id) {
            $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . $id;
            $rentData = call_curl_by_get_method($rent_url, []);
                if ($rentData['status'] && !empty($rentData['data'])) {
                foreach ($rentData['data'] as $value) {
                    if ($value['show_id'] == $id) {
                        $content_details['data']['is_rented'] = $value['isOnRent'];
                        break;
                    }
                }
            }
        }
    }

  if (isset($content_details['data']['related'])) {
foreach ($content_details['data']['related'] as &$related_item) {
    $related_item['enc_id'] = aes_cbc_encryption_($related_item['id']);
    $related_item['in_watchlist'] = 0; 
}
unset($related_item); // Unset the reference variable after the loop

$related_ids = implode(",", array_column($content_details['data']['related'], 'id'));
$watchlist_url = 'getWatchListById/showIds/' . $related_ids;
$watchList = call_curl_by_get_method($watchlist_url, []);

if ($watchList['status']) {
    foreach ($content_details['data']['related'] as &$related_item) {
        foreach ($watchList['data'] as $watchlist_item) {
            if ($related_item['id'] == $watchlist_item['show_id']) {
                $related_item['in_watchlist'] = $watchlist_item['isOnWatchlist'];
                break;
            }
        }
    }
    unset($related_item); // Unset the reference variable after the inner loop
}
}

    if (isset($content_details['data']['season'])) {
        foreach ($content_details['data']['season'] as &$season) {
            if (isset($season['videos'])) {
                foreach ($season['videos'] as &$video) {
                    $video['enc_id'] = aes_cbc_encryption_($video['id']);
                }
            }
        }
    }

    echo json_encode($content_details);
}


    public function check_header(){
        if($this->input->get('developer_mode') == 1){
            pre($_SERVER);
            pre(getallheaders()); die;
        }  else{
            redirect("no-data"); die;
        }  
    }




    public function subscription_and_rental()
    {
        $url2 = "rentedContent/contentType/0/page/1";
        $url3 = "rentedContent/contentType/1/page/1";
        $document = array('page' => 1);
        $document3 = array('page' => 1);
        $view_data['page'] = "subscription-and-rental";
        $view_data['s_vod'] = call_curl_by_get_method($url3, []);
        $view_data['t_vod'] = call_curl_by_get_method($url2, []);
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/subscription_and_rental', $view_data, TRUE);
        echo modules::run(TempMSG, $data);
    }

    public function search_page()
    {
        
        $view_data = array();
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/search_page', $view_data, TRUE);
        echo modules::run(TempMSG, $data);
    }
    public function manage_device()
    {
        
        if (!$this->session->userdata('manage_device_flag') || $this->session->userdata('manage_device_flag') == false ) {
            redirect('/');
        }
        $view_data = array();
        $url =  "subscriptionPlansV2/0/0";
        $subscription_plans = call_curl_by_get_method($url, []);
        //pre(json_encode($subscription_plans)); //die;
        $has_best_plan = false;
        $best_plan = $features = [];
        if(isset($subscription_plans['data'])){
            $all_plan = $subscription_plans['data']['plans']??[];
            $features = $subscription_plans['data']['features']??[];
            //pre($subscription_plans['data']); die('ghjgj');
            if(!empty($all_plan)){
                $best_plan = $all_plan[0];
                $best_plan_device_features = $this->findArrayByType($features, 4);
                //pre($best_plan_device_features); die;
                if($best_plan){
                    $best_plan['device_feature'] = $best_plan_device_features;
                    foreach($best_plan['pricing'] as $each) {
                        if($each['is_upgradable'] == 0){
                            $has_best_plan = true;
                        }
                    }
                }
            } 
        }
        //pre($best_plan); pre($has_best_plan); die;
        if(empty($best_plan)){ 
            $has_best_plan = true;
        }
        $view_data['subscription_plans'] = $best_plan;
        $view_data['has_best_plan'] = $has_best_plan;
        $view_data['features'] = $features;
        $view_data['all_devices']  = $this->session->userdata('all_devices');
        $view_data['all_devices_count'] = count($this->session->userdata('all_devices'),0);
        //pre($view_data); die;
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/manage_device', $view_data, TRUE);
        echo modules::run(TempMSG, $data);
    }

    private function findArrayByType($data, $type) {
        foreach ($data as $item) {
            if ($item['type'] == $type) {
                return $item;
            }
        }
        return null; // Return null if no matching item is found
    }

    public function generate_visitor_id(){
        $unique_visitor_id = "";
        if($this->input->post('system_id')){
            // $user_id = "";
            // if ($this->session->userdata('id')) {
            //     $user_id = $this->session->userdata('id');
            // }
            //$video_card_name =  base64_decode($this->input->post('system_id'));
            //$unique_visitor_id = aes_cbc_encryption_($user_id . $video_card_name);
            $unique_visitor_id = $this->input->post('system_id');
            $this->session->set_userdata('unique_visitor_id', $unique_visitor_id);
            //$this->session->set_userdata('browser_name', $this->input->post('browser_name'));
            $this->session->set_userdata('browser_append_val', $this->input->post('browser_append_val'));
        }
        //pre($unique_visitor_id); 
        echo true;
    }

    public function logout_devices(){
        $status = true;
        $redirect_url = base_url('manage-device');
        $msg = $this->lang->line("request_failed");
        $token = "";
        if($this->input->post('user_device_info_id')){
            //$my_device = $this->input->post('my_device');
            $url =  "logout-device";
            $device_logged_out_res = file_curl_contents($url, ["user_device_info_id"=>$this->input->post('user_device_info_id')]);
            //pre($device_logged_out_res);
            if($device_logged_out_res && $device_logged_out_res['status']){
                if($device_logged_out_res['status'] == true){
                    if($this->session->userdata('manage_device_flag')){
                        if(isset($device_logged_out_res['data']['jwt'])){
                            $this->session->set_userdata('jwt',$device_logged_out_res['data']['jwt']);
                            $this->session->set_userdata('user_device_info_id',$device_logged_out_res['data']['user_device_info_id']);
                            $this->session->unset_userdata('manage_device_flag');
                            $this->session->set_userdata('manage_profile_flag');
                            $redirect_url = base_url('watching-profile');
                        }
                    }
                    $status = true;
                    $token = base64_encode(json_encode($_SESSION));
                    $msg = $this->lang->line("successfully_logout");
                }
            }
        }
        echo json_encode(["status"=>$status,"url"=>$redirect_url,"message"=>$msg,"token"=>$token]);
    }


    public function tv_guide(){
        $view_data = array();
        // $url =  "subscriptionPlansV2/0";
        // $subscription_plans = call_curl_by_get_method($url, []);
        //pre($subscription_plans); die;
        
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/tv_guide', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

    function filterVisibleTag($tags) {
        if (!isset($tags) || empty($tags)) {
            return ''; 
        }
        $visibleTags = array_values(array_filter($tags, function($tag) {
            return $tag['visible'] == 1;
        }));
        if (!empty($visibleTags)) {
            return $visibleTags[0]['url'];
        } else {
            return ''; 
        }
    }

    public function content_detail(){
        header('X-Frame-Options: ALLOWALL');
        $view_data = array();
        $lang_title = ($this->session->lang_id)?ucwords($this->session->lang_id):"English";
        $id = str_replace(" ", "+", $this->input->get('id'));
        $content_id = aes_cbc_decryption_($id);
        //pre($content_id); die;
        $url = "getContentDetails/{$content_id}";
        $content_details = call_curl_by_get_method($url, []);
        //pre($content_details); die;
        if ($content_details['status'] && !empty($content_details['data'])) {
            $content_details['data']['is_rented'] = 0;
            // if ($this->session->id) {
            //     $rent_url = 'retrieveRentalStatusByContentIds/contentIds/' . $id;
            //     $rentData = call_curl_by_get_method($rent_url, []);
            //         if ($rentData['status'] && !empty($rentData['data'])) {
            //         foreach ($rentData['data'] as $value) {
            //             if ($value['show_id'] == $id) {
            //                 $content_details['data']['is_rented'] = $value['isOnRent'];
            //                 break;
            //             }
            //         }
            //     }
            // }
        } else {
            redirect('no-data');die;
        }
    
        if (isset($content_details['data']['related'])) {
            foreach ($content_details['data']['related'] as &$related_item) {
                $related_item['enc_id'] = aes_cbc_encryption_($related_item['id']);
                $related_item['in_watchlist'] = 0; 
            }
            unset($related_item); // Unset the reference variable after the loop

            $related_ids = implode(",", array_column($content_details['data']['related'], 'id'));
            $watchlist_url = 'getWatchListById/showIds/' . $related_ids;
            $watchList = call_curl_by_get_method($watchlist_url, []);

            if ($watchList['status']) {
                foreach ($content_details['data']['related'] as &$related_item) {
                    foreach ($watchList['data'] as $watchlist_item) {
                        if ($related_item['id'] == $watchlist_item['show_id']) {
                            $related_item['in_watchlist'] = $watchlist_item['isOnWatchlist'];
                            break;
                        }
                    }
                }
                unset($related_item); // Unset the reference variable after the inner loop
            }
        } else {
            redirect('no-data');die;
        }

        $view_data = ($content_details && isset($content_details['data']))?$content_details['data']:[];
        $allowed_media_type = ['4','5','6','7'];
        if(!isset($view_data['type']) || !in_array($view_data['type'],$allowed_media_type)){
            redirect('no-data');die;
        }
        $descriptions = '';
        if (is_array($view_data['description'])) {
            foreach ($view_data['description'] as $desc) { 
                if ($desc['language'] === $lang_title) {
                    $descriptions = $desc['content'];
                    break;
                }
            }
            $view_data['description'] = $descriptions;
        }
        $view_data['enc_id'] = $id;
        $view_data['id'] = $content_details['data']['id'];
        $view_data['title'] = $content_details['data']['title'];
        $view_data['genres'] = $content_details['data']['genres'];
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/image_pdf', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function epub_reader(){
        $view_data = array();
        if($this->input->get('xcv')){
            $encoded_url = str_replace(" ", "+", $this->input->get('xcv'));
            $epub_url = aes_cbc_decryption_($encoded_url);
            //pre($epub_url); die;
            $pattern = '/https?:\/\/[^\s]+\.epub/';
            if (!preg_match($pattern, $epub_url, $matches)) {
                 redirect('no-data');die;
            }  
        } else {
            redirect('no-data');die;
        }
        $view_data['epub_url'] = $epub_url;
        //pre($view_data); die;
        $data['without_head'] = 1;
        // $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/epub_reader', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }


    public function download_file(){
        if($this->session->userdata('id')){
            //redirect('no-data');die;
            if (isset($_GET['file'])) {
                $fileUrl = str_replace(" ", "", $_GET['file']);
                if (filter_var($fileUrl, FILTER_VALIDATE_URL)) {
                    // Initialize cURL session
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $fileUrl);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_NOPROGRESS, false); // Optional: show progress
                    curl_setopt($ch, CURLOPT_BUFFERSIZE, 4096); // Small buffer size for large files

                    // Open output buffer for streaming
                    ob_end_clean(); // Clear the buffer to avoid interference
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="' . basename($fileUrl) . '"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');

                    // Stream data in chunks to avoid memory issues
                    curl_setopt($ch, CURLOPT_WRITEFUNCTION, function ($ch, $data) {
                        echo $data;
                        flush(); // Flush the output buffer to the browser
                        return strlen($data);
                    });

                    // Execute the download and check for errors
                    if (curl_exec($ch) === false) {
                        error_log('Curl error: ' . curl_error($ch));
                    }

                    curl_close($ch); // Close cURL session
                    exit; // End script after download
                } else {
                    return false;
                }
            } else {
                redirect('no-data');
                die;
            }
        }

    }

    public function image_viewerall(){
        $view_data = array();
        // $url =  "subscriptionPlansV2/0";
        // $subscription_plans = call_curl_by_get_method($url, []);
        //pre($subscription_plans); die;
        
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/image_viewerall', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function image_viewer(){
        $file_url = $this->input->get('file_url');
        $view_data = array();
        $view_data['file_url'] = $file_url;
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/dashboard/image_viewer', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

     public function game_view(){
        $view_data = array();
        // $url =  "subscriptionPlansV2/0";
        // $subscription_plans = call_curl_by_get_method($url, []);
        //pre($subscription_plans); die;
        
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/game_view', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }
       public function edit_profiles(){
        $view_data = array();
        // $url =  "subscriptionPlansV2/0";
        // $subscription_plans = call_curl_by_get_method($url, []);
        //pre($subscription_plans); die;
        
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/edit_profiles', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }
      public function view_episode(){
        $view_data = array();
        $episode_id = $this->input->get('id')??'';
        if($episode_id != ''){
            $episode_ids = str_replace(" ", '+', $episode_id);
            $episode_id = aes_cbc_decryption_($episode_ids);
        }
        $url = "getContentDetails/{$episode_id}/0";
        $document = [];
        $content_details = call_curl_by_get_method($url, $document);
        $view_data['sessons'] = $content_details['data']['season'];
        $data['without_head'] = 2;
        $data['page_data'] = $this->load->view('web/dashboard/view_episode', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }
     public function videopage(){
        $view_data = array();
        $url = "getLiveChannels";
        //$document = array('page' => 1);
        $live = call_curl_by_get_method($url, $document=[]);
        // pre($live);die;
        //if (!$this->session->DeviceType) {
            $browser = detectBrowser();
            $this->session->set_userdata('DeviceType', $browser['DeviceType'] ?? 2);
            $DeviceType = $browser['DeviceType'];
        // } else {
        //     $DeviceType = $this->session->DeviceType;
        // }
        $view_data['DeviceType'] = $DeviceType;
        $view_data['live'] = $live;
        $data['without_head'] = 1;
        $data['page_data'] = $this->load->view('web/dashboard/videopage', $view_data, TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }
    
        public function demoinvoice(){
         //   $file_url = $this->input->get('file_url');
            $view_data = array();
          //  $view_data['file_url'] = $file_url;
            $data['without_head'] = 1;
            $data['page_data'] = $this->load->view('web/dashboard/invoice', $view_data, TRUE);
            echo modules::run('web/template/call_default_template', $data);
        }

        public function invoiceprint() { 
            include_once APPPATH . '/third_party/mpdf/autoload.php';
            $invoiceno = $this->readWritedata($_POST);
            $this->generate_custom_invoice($_POST, $invoiceno);
        }
        public function readWritedata($data){
            $json_file_path = $_SERVER['DOCUMENT_ROOT'] . '/demo/assets/website_assets/data.json'; // Adjust the path if needed
            $json_data = json_decode(@file_get_contents($json_file_path), true);
            $year = date("y");
            $month = date('m', strtotime($data['dateOfJourney']));
            if (!isset($json_data[$year])) {
                $json_data[$year] = array();
            }
            if (!isset($json_data[$year][$month])) {
                $json_data[$year][$month] = array();
            }
            $last_key = array_key_last($json_data[ $year][$month]);
            $last_number = (int) substr($last_key, 3);
            $new_number = str_pad($last_number + 1, 2, '0', STR_PAD_LEFT);
            $new_key = "AAA" . $new_number;
            $json_data[ $year][$month][$new_key] = array(
            "name" => $data['name'],
            "source" =>$data['source'],
            "destination" => $data['destination'],
            "totalAmount" => $data['totalAmount'],
            "paidAmount" => $data['paidAmount'],
            "duesAmount" => $data['duesAmount'],
            "dateOfJourney" => $data['dateOfJourney']
    
            );
            $new_json_data = json_encode($json_data, JSON_PRETTY_PRINT);
            file_put_contents($json_file_path, $new_json_data);
            $invoiceno =  array_key_last($json_data[ $year][$month]);
            return $invoiceno;
           }
        

        public function generate_custom_invoice($data,$invoiceno){    
            $this->pdf_file_path = getcwd() . "/assets/website_assets/pdf/fsg.pdf";
            $view_data = array();
            $view_data['data'] = $data;
            $pdf_body = $this->load->view("web/dashboard/invoicec", $view_data, true);
            include_once APPPATH . '/third_party/mpdf/autoload.php';
            $mpdf = new \Mpdf\Mpdf(['c', 'A4', '', '', 0, 0, 0, 0, 0, 0]);
            $mpdf->useSubstitutions = false;
            $mpdf->simpleTables = true;
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->SetWatermarkText('AAA');
            $mpdf->showWatermarkText = true;
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->WriteHTML($pdf_body);
            $mpdf->Output($this->pdf_file_path, "F");
            $this->download_invoice($this->pdf_file_path,$invoiceno);
            // echo json_encode(['status' => 'success', 'pdf_url' => base_url('assets/website_assets/pdf/fsg_' . $invoiceno . '.pdf')]);
            // exit;
       }

       
       public function download_invoice($pdf_file_path, $invoiceno)
       {
           // Check if the file exists
           if (file_exists($pdf_file_path)) {
               // Set headers to initiate file download
               header('Content-Type: application/pdf');
               header('Content-Disposition: attachment; filename="' . $invoiceno . '.pdf"');
               header('Content-Length: ' . filesize($pdf_file_path));
       
               // Read the file and send it to the client
               readfile($pdf_file_path);
               // After the file has been downloaded, delete the temporary file
               unlink($pdf_file_path);
       
               // Respond back to the frontend with a success message
               echo json_encode(['status' => 'success', 'message' => 'PDF downloaded successfully']);
               exit;
           } else {
               // Handle error if file does not exist
               echo json_encode(['status' => 'error', 'message' => 'The invoice file does not exist.']);
               exit;
           }
       }
    
}