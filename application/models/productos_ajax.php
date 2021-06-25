<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class productos_ajax extends CI_Model {
    
        public function __construct(){
            $this->load->database();
        }
            
        public function Ajax($producto){
            if (empty($producto)) {
                echo "Error, no vienen datos";
                exit;
            }

            $consulta = $this->db->get_where('inventario',array('codigo_producto' => $producto,'estado' => 1));
            foreach($consulta->result() as $item):
            ?>
                <label for="stock_a">Existencia</label>
                <input type="text" name="stock_a" id="stock_a" class="form-control text_v" value="<?= $item->stock ;?>" readonly>
            <?php
            endforeach;
        }

        public function Ajax_precios($producto){
            if (empty($producto)) {
                echo "Error, no vienen datos";
                exit;
            }

            $consulta = $this->db->get_where('inventario',array('codigo_producto' => $producto,'estado' => 1));
            foreach($consulta->result() as $item):
            ?>
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" class="form-control text_v" step="any" value="<?= $item->precio_venta ;?>" readonly>
            <?php
            endforeach;
        }
    
    }
?>
