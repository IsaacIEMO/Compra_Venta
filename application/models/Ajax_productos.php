<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Ajax_productos extends CI_Model {
    
        public function __construct(){

        }
        
            
        public function Ajax($codigo_producto){
            if (empty($codigo_producto)) {
                echo "Error";
                exit;
            }

            $consulta = $this->db->get_where('inventario',array('codigo_producto' => $codigo_producto,'status' => 1));
            foreach($consulta->result() as $item):
            ?>
                <div class="form-group">
                    <label for="compra">Costo</label>
                    <input type="number" name="compra" id="compra" class="form-control" value="<?= $item->precio_compra; ?>">
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control">
                </div>

                <div class="form-group">
                    <label for="venta">Precio</label>
                    <input type="number" name="venta" id="venta" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subtotal">SubTotal</label>
                    <input type="number" name="subtotal" id="subtotal" class="form-control">
                </div>

            <?php
            endforeach;
        }
    
    }
?>
