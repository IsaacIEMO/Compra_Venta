<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Products extends CI_Controller {
    
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
        }
        

        public function index(){
            show_404();
        }

        /* VIEW'S */

        public function Store(){
           show_404();
        }

        public function new_products(){
            if($this->session->userdata('is_logged')){
                $categorias = $this->Querys->Category_Select();
                $presentacion = $this->Querys->Presentacion_Select();
                $data = array('categorias' => $categorias, 'presentacion' => $presentacion);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/insert', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function list_products(){
            if($this->session->userdata('is_logged')){
                $productos = $this->Querys->Products_Select();
                $data = array('productos' => $productos);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/select',$data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function category(){
            if($this->session->userdata('is_logged')){
                $categorias = $this->Querys->Category_Select();
                $data = array('categorias' => $categorias);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/category',$data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        /* SQL */

        public function Insert_category(){
            $categoria = $this->input->post('category');
            $descripcion = $this->input->post('descripcion');
            $this->Querys->Category_Insert($categoria, $descripcion);
        }

        public function Delete_Category($codigo_categoria){
            if ($codigo_categoria == null) {
                redirect();
            }

            $this->Querys->Category_Delete($codigo_categoria);
        }
        
        public function Insert_Products(){
            $producto = $this->input->post('producto');
            $categoria = $this->input->post('categoria');
            $presentacion = $this->input->post('presentacion');
            $vencimiento = $this->input->post('reservationdate');
            $stock = $this->input->post('stock');
            $compra = $this->input->post('compra');
            $venta = $this->input->post('venta');
            $utilidad = $this->input->post('utilidad');
            $descripcion = $this->input->post('descripcion');
            $libras = $this->input->post('libra');
            $this->Querys->Products_Insert($producto,$categoria, $presentacion, $stock, $compra, $venta, $utilidad, $vencimiento, $libras, $descripcion);
        }

        public function Delete_Product($codigo_producto){
            if ($codigo_producto == null) {
                redirect();
            }

            $this->Querys->Products_Delete($codigo_producto);
        }

        public function Update_Stock(){
            $codigo_producto = $this->input->post('codigo_producto');
            $old = $this->input->post('old');
            $new = $this->input->post('new');
            $utilidad = $this->input->post('utilidad');
            $this->Querys->Products_Update_Stock($codigo_producto, $old, $new, $utilidad);
        }

        public function Update_categoria(){
            $codigo_categoria = $this->input->post('codigo_categoria');
            $categoria = $this->input->post('categoria');
            $description = $this->input->post('description');
            $this->Querys->Update_categorias($codigo_categoria, $categoria, $description);
        }

        public function Update_Cash(){
            $old_c = $this->input->post('old_c');
            $codigo_producto = $this->input->post('codigo_producto');
            $new_c = $this->input->post('new_c');
            $old_v = $this->input->post('old_v');
            $new_v = $this->input->post('new_v');
            $stock = $this->input->post('stock');
           $this->Querys->Products_Update_Cash($old_c, $new_c, $codigo_producto, $old_v, $new_v, $stock);
        }
    
    }
    
    
?>