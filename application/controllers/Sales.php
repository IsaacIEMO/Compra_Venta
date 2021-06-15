<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Sales extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
        }
        
    
        public function index(){
            show_404();
        }

        public function Sales(){
            $this->load->view('layout/header');
            $this->load->view('layout/main');
            $this->load->view('layout/footer');
        }
    
    }
?>