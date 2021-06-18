<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Sales extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
            $this->load->model('productos_ajax');
        }
        
    
        public function index(){
            show_404();
        }

        public function Sales(){
            $productos = $this->Querys->Products_Select();
            $data = array('productos' => $productos);
            $this->load->view('layout/header');
            $this->load->view('layout/main');
            $this->load->view('admin/sales', $data);
            $this->load->view('layout/footer');
        }

        public function Ajax_producto(){
            $productos = $this->input->post('productos');
            $this->productos_ajax->Ajax($productos);
        }
    }
?>