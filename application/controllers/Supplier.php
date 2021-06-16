<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Supplier extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
        }
        
        public function index(){
            if($this->session->userdata('is_logged')){
                $proveedor = $this->Querys->Supplier_Select();
                $data = array('proveedor' => $proveedor);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/vendors', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function Insert_Supplier(){
            $nombre = $this->input->post('nombre');
            $telefono = $this->input->post('telefono');
            $this->Querys->Supplier_Insert($nombre, $telefono);
        }

        public function Delete_Supplier($codigo_proveedor){
            if ($codigo_proveedor == null) {
                redirect('');
            }

            $this->Querys->Supplier_Delete($codigo_proveedor);
        }
    }    
?>