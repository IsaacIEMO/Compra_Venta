<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Store extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
            $this->load->model('Ajax_productos');
            
        }
        
        public function index(){
            $productos = $this->Querys->Products_Select();
            $data = array('productos' => $productos);
            if($this->session->userdata('is_logged')){
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/store', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function Ajax_producto(){
            $producto = $this->input->post('producto');
            $this->Ajax_productos->Ajax($producto);
        }
    }    
?>