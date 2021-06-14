<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Supplier extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
        }
        
        public function index(){
            if($this->session->userdata('is_logged')){
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/vendors');
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }
    }    
?>