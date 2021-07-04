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
                <label for="stock_a">Existencia Quintal</label>
                <input type="text" name="stock_a" id="stock_a" class="form-control text_v" value="<?= $item->stock ;?>" readonly>

                <label for="stock_l">Existencia Libra</label>
                <input type="text" name="stock_l" id="stock_l" class="form-control text_v" value="<?= $item->stock_libras ;?>" readonly>
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
                <label for="precio">Precio Quintal</label>
                <input type="text" name="precio" id="precio" class="form-control text_v" step="any" value="<?= $item->precio_venta ;?>" readonly>
                <label for="precio_l">Precio Libra</label>
                <input type="text" name="precio_l" id="precio_l" class="form-control text_v" value="<?= $item->precio_libras ;?>" readonly>
            <?php
            endforeach;
        }
    
    }
?>
