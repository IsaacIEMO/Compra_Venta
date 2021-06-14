<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {

        
        public function __construct(){
            parent::__construct();
        }
        
    
        public function index(){
            if($this->session->userdata('is_logged')){
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('Dashboard');
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }    
    }
?>