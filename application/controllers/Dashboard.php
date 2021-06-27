<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {

        
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
        }
        
    
        public function index(){
            if($this->session->userdata('is_logged')){
                $funciones = $this->Querys->Funciones();
                $row = $this->Querys->Products_Select_row();
                $sales = $this->Querys->Sales_Select_row();
                $users = $this->Querys->Users_Select_row();
                $store = $this->Querys->Sale_Select_row();
                $vencimiento = $this->Querys->Products_Select_v();
                $list = $this->Querys->Sales_Select_v();
                $data = array('funciones' => $funciones, 'row' => $row, 'sales' => $sales, 'users' => $users, 'store' => $store, 'vencer' => $vencimiento, 'list' => $list);
                $this->load->view('layout/header');
                $this->load->view('layout/main', $data);
                $this->load->view('Dashboard');
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }    
    }
?>