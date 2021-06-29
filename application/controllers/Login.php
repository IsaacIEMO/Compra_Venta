<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Auth');
            $this->load->library('form_validation');
            $this->load->helper(array('auth/login_rules'));
            
        }
    
        public function index(){
            $this->load->view('login');
        }

        public function Validation(){
            $this->form_validation->set_error_delimiters('', '');
            $rules = getLoginRules();      
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() === FALSE) {
                $errors = array(
                    'username' => form_error('username'),
                    'password' => form_error('password')
                );
                echo json_encode($errors);
                $this->output->set_status_header(400);
            }else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if (!$res = $this->Auth->login($username, $password)) {
                    echo json_encode(array('msg' => 'Verifique sus credenciales'));
                    $this->output->set_status_header(401);
                    exit;
                }
                $data = array(
                    'codigo_usuario' => $res->codigo_usuario,
                    'usuario' => $res->usuario,
                    'nombre' => $res->nombre,
                    'apellido' => $res->apellido,
                    'rol' => $res->rol,
                    'estado' => $res->estado,
                    'is_logged' => TRUE
                );
                
                $this->session->set_userdata($data);
                $this->session->set_flashdata('msg', 'Bienvenido al sistema'. $data['usuario']);
                if ($res->rol === "c81e728d9d4c2f636f067f89cc14862c") {
                    echo json_encode(array('url' => base_url('index.php/Sales/Sales')));
                    exit;
                }
                echo json_encode(array('url' => base_url('index.php/Dashboard')));
            }
        }

        public function logout(){
            $data = array('codigo_usuario','usuario', 'rol', 'estado', 'is_logged');
            $this->session->unset_userdata($data);
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
?>