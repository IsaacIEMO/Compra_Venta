<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Users extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
        }
        
        public function index(){
            show_404();
        }

        public function New_user(){
            $roles = $this->Querys->Roles_Select();
            $data = array('roles' => $roles);
            if($this->session->userdata('is_logged')){
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/new_user', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }


        /* SQL */
        public function Insert_User(){
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $rol = $this->input->post('roles');
            $user = $this->input->post('user');
            $pass = $this->input->post('pass');
            $password = $this->input->post('password');
            $this->Querys->Users_Insert($nombre, $apellido, $rol, $user, $pass, $password);
        }

        public function List_User(){
            $users = $this->Querys->Users_Select();
            $data = array('users' => $users);
            if($this->session->userdata('is_logged')){
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/list_user', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function Delete_User($codigo_usuario = null){
            if ($codigo_usuario == null) {
                redirect('');
            }

            $this->Querys->User_Delete($codigo_usuario);
        }

        public function Update_User(){
            $pass = $this->input->post('pass');
            $password = $this->input->post('password');
            $user = $this->input->post('user');
            $this->Querys->User_Update($pass, $password, $user);
        }
    
    }
?>