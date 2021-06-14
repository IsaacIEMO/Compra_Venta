<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Auth extends CI_Model {
    
        public function __construct(){
            
        }
        
        public function login($username, $password){
            $pass = md5($password);
            $consulta = $this->db->get_where('auth', array('usuario' => $username, 'password' => $pass, 'estado' => 1), 1);
            if (!$consulta->result()) {
                return false;
            }
            return $consulta->row();
        }
    
    }
?>