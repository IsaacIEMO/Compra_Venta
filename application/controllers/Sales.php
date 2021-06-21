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
            $producto = $this->input->post('producto');
            $this->productos_ajax->Ajax($producto);
        }
        
        public function Ajax_precio(){
            $producto = $this->input->post('producto');
            $this->productos_ajax->Ajax_precios($producto);
        }

        public function Insert_Detalle_Sales(){
            $op = $this->input->post('op');
            $producto = $this->input->post('producto');
            $old = $this->input->post('old');
            $stock = $this->input->post('stock');
            $this->Querys->Sales_Detalle_Insert($op, $producto, $old, $stock);
        }
    }
?>