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
            $proveedores = $this->Querys->Supplier_Select();
            $data = array('productos' => $productos, 'proveedores' => $proveedores);
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

        public function Insert_Store(){
            $producto = $this->input->post('producto');
            $proveedor = $this->input->post('proveedor');
            $compra = $this->input->post('compra');
            $venta = $this->input->post('venta');
            $stock = $this->input->post('stock');
            $utilidad = $this->input->post('utilidad'); 
            $descripcion = $this->input->post('descripcion');
            $categoria = $this->input->post('categoria');
            $presentacion = $this->input->post('presentacion');
            $this->Querys->Sales_Insert($producto, $proveedor, $compra, $venta, $stock, $utilidad, $descripcion, $presentacion, $categoria);
        }
    }    
?>