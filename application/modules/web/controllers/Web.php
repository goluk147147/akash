<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper("services");
		$this->load->library('session');
	}

##################################################################################Bhajan Block Start ################################################################################        
	public function get_bhajan_list(){
		$result=$this->web_model->get_bhajan_list();
		if($result){
			return_data(true,'Success.',$result);
		}else{
			return_data(false,'Failed.',array());
		}
		
	}
##################################################################################Bhajan Block End ################################################################################        

##################################################################################News Block Start ################################################################################                
        
        public function get_news_list() {
		$result = $this->web_model->get_news_list();
		if ($result) {
			return_data(true, 'Success.', $result);
		} else {
			return_data(false, 'Something went wrong.', array());
		}
	}
        
##################################################################################News Block End ################################################################################        

##################################################################################Video Block Start ################################################################################                
        public function get_video_list() {
		$result = $this->web_model->get_home_videos();
		if ($result) {
			return_data(true, 'Success.', $result);
		} else {
			return_data(false, 'Something went wrong.', array());
		}
	}
        
##################################################################################Video Block End ################################################################################                

}