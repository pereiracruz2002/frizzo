<?php

class painel extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('admin/v_painel');
        
        if(!$this->session->userdata('admin'))
            redirect('admin');
    }
}
