<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class productos_ajax extends CI_Model {
    
        public function __construct(){
            $this->load->database();
        }
            
        public function Ajax($productos){
            if (empty($productos)) {
                echo "Error, no vienen datos";
                exit;
            }

            $consulta = $this->db->get_where('inventario',array('codigo_producto' => $productos,'estado' => 1));
            foreach($consulta->result() as $item):
            ?>
                
            <?php
            endforeach;
        }
    
    }
?>
