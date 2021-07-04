<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Settings extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
        }
        
        /* VIEWS */

        public function index(){
            show_404();
        }

        public function Presentation(){
            if($this->session->userdata('is_logged')){
                $presentacion = $this->Querys->Presentacion_Select();
                $data = array('presentacion' => $presentacion);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/presentation', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function Corte(){
            if($this->session->userdata('is_logged')){
                $dia = $this->Querys->corte_dia();
                $data = array('dia' => $dia);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/roles', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function Ultimo_Corte_S(){
            $this->Querys->corte();
        }
        public function Ultimo_Corte(){
            if($this->session->userdata('is_logged')){
                $dia = $this->Querys->corte_s();
                $data = array('dia' => $dia);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/corte', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        /* QUERYS */

        public function Insert_Presentation(){
            $presentacion = $this->input->post('presentacion');
            $libras = $this->input->post('libras');
            $descripcion = $this->input->post('descripcion');
            $this->Querys->Presentation_Insert($presentacion, $libras, $descripcion);
        }

        public function Delete_Presentation($codigo_presentacion = null){
            if ($codigo_presentacion == null) {
                redirect('');
            }

            $this->Querys->Presentation_Delete($codigo_presentacion);
        }
    
    }
?>