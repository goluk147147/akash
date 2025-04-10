<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MX_Controller {

  public function __construct() {
        parent::__construct();
         modules::run('web/web_panel_ini/web_ini');
        $this->load->helper(array('aes','url', 'custom', 'custom_helper', 'message_sender'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function allsearch(){
       
        $searchStr = $this->input->get('q');
        //print_r($searchStr);die;
        $url = "dashboard/dashboard/search_list";
        $url2 = "Menu_master/get_menu_master";
        $document = array('search_string' => $searchStr); 
        $document2 = array(); 
        $view_data['menu_master'] = file_curl_contents($url2,$document2);
        $view_data['search_data'] = file_curl_contents($url,$document); 
        //pre( $view_data['search_data']);die;
        $view_data['search'] = $searchStr;
        $view_data['page'] = "search_result";
        $data['page_data'] = $this->load->view('web/search/search_result', $view_data, true);
        echo modules::run('web/template/call_default_template',$data);
    }
    public function prasarsearch(){
       
      $searchStr = str_replace(' ','%20',$this->input->post('q'));
      $start = $this->input->post('start')??1;
      $url = "getSearchContent/search/".$searchStr."/page/". $start;
      // $document = array('search_string' => $searchStr); 
      $view_data= call_curl_by_get_method($url,$document=array(),'V1/');
      if (isset($view_data['data']) && !empty($view_data['data'])) {
          foreach ($view_data['data'] as $key => $value) {
            $view_data['data'][$key]['is_rented'] = 0;
            if($value['is_paid']==2){
              $rent_url = 'retrieveRentalStatusByContentIds/contentIds/'.$value['id'];
                $rentData = call_curl_by_get_method($rent_url,[]);
                if($rentData['status'] && !empty($rentData['data'])){
                  foreach ($rentData['data'] as $rentKey => $rentValue) {
                      if($rentValue['show_id'] == $value['id']){
                          $view_data['data'][$key]['is_rented'] = $rentValue['isOnRent'];
                      }
                  }
              }
            }
            $view_data['data'][$key]['dec_id'] = $value['id'];
            $view_data['data'][$key]['id'] = aes_cbc_encryption_($value['id']);
          }
      }
     echo json_encode($view_data);
  }
  
  public function prasarsearchroute($id,$type){

    $ids = aes_cbc_encryption_($id);
    $types = aes_cbc_encryption_($type);
    //pre($ids)

    redirect(base_url()."play-video?id='.$ids.'&&type_id='.$types.'");

  }

    public function index(){
        $searchStr = htmlentities($this->input->get('q'));
        $url = "dashboard/dashboard/search_list";
        $url2 = "Menu_master/get_menu_master";
        // $document = array('search_string' => $searchStr,'search_limit' => 5); 
        $document = array('search_string' => $searchStr,'search_limit' => 5); 
        $document2 = array(); 
        $view_data['menu_master'] = file_curl_contents($url2,$document2);
        $view_data['search_data'] = file_curl_contents($url,$document);
        $view_data['search'] = $searchStr;
        $view_data['page'] = "search_result";        
        $output = '';        
        $i=1;
    //  print_r($view_data['search_data']);die;
  if(!empty($view_data['search_data']['status']))
  { 
   // print_r($view_data['search_data']['data']);
    foreach ($view_data['search_data']['data'] as $data)
   { 
    if($i<=5){
   $out = strlen($data['title'],'UTF-8') > 30 ? substr($data['title'],0,30,'UTF-8')."..." : $data['title'];
    $id = aes_cbc_encryption_($data['id']);
            $type_id = aes_cbc_encryption_($data['type_id']);
    $output .= '
   
          <div class="result-holder element-show search_o">
               <div class=""><article class="ripple show-card normal search-card">
                  <a href="play-video?id='.$id.'&&type_id='.$type_id.'" target="">

                <div class="thumbnail-container search_img_detail d-flex p-2">
                  <div class="card card-img-container live_search_dt mr-3">
                   <img src="'.$data['movie_poster_url'].'" 
                   class="img-loader lazy-img-loader loaded" loading="lazy" alt="">
                  </div>
                  <div class="title live_search_data">
                <h6>'.$out.'</h6>
                  
                   <span class="content-title ti_image_dt"> 
                  '.$data['type'].'</span>
                </div>
                </div>
                </a>
                 
              </div>
           </div>
        ';
}
    $i++;

   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5"><?= NoDataFound; ?></td>
       <td  colspan="5"><?= NoListFound; ?></td>
      </tr>';
  }
   $output .= '<a href="/search?q='.$searchStr.'" class="more-result" id="more-link" to="/in/search?q=a" target="">More results</a>';
  // $output .= '<a href="/web/MVF/Search/allsearch?q='.$searchStr.'" class="more-result" id="more-link" to="/in/search?q=a" target=""></a>';
  echo $output;
  //akhilesh end
        // print_r($view_data['search_data']);die;
      //  $data['page_data'] = $this->load->view('web/search/search_result', $view_data, FALSE);
    }
    
   // public function index(){
   //     $searchStr = $this->input->post('search_string');
   //     $url = "dashboard/dashboard/search_list";
   //     $document = array('search_string' => $searchStr); 
   //     $res = file_curl_contents($url,$document); 
   //     echo json_encode($res);
   // }

}
