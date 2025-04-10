<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_404 extends MX_Controller {


    public function __construct() 
    {
        parent::__construct();
        modules::run('web/web_panel_ini/web_ini');
        $this->load->library('form_validation');
        $this->load->helper('url');    
    }   

    public function index(){
        $this->output->set_status_header('404');
        $data['page_data'] = $this->load->view('web/404', [], TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

    public function noData(){
        $this->output->set_status_header('404');
        $data['page_data'] = $this->load->view('web/noData', [], TRUE);
        echo modules::run('web/template/call_default_template', $data);
    }

}