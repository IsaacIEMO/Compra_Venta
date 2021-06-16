<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Ajax_productos extends CI_Model {
    
        public function __construct(){
            $this->load->database();
        }
            
        public function Ajax($producto){
            if (empty($producto)) {
                echo "Error";
                exit;
            }

            $consulta = $this->db->get_where('inventario',array('codigo_producto' => $producto,'estado' => 1));
            foreach($consulta->result() as $item):
            ?>
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="compra">Precio Compra</label>
                            <input type="number" name="compra" id="compra" class="form-control text_v" value="<?= $item->precio_compra; ?>">
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="venta">Precio Venta</label>
                            <input type="number" name="venta" id="venta" class="form-control text_v" value="<?= $item->precio_venta; ?>">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="venta">Unidades</label>
                            <input type="number" name="stock" id="stock" class="form-control text_v" onkeyup="calcular();">
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-6 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="venta">Sub total</label>
                            <input type="number" name="utilidad" id="utilidad" class="form-control text_v" readonly>
                        </div>
                    </div>
                </div>

            <?php
            endforeach;
        }
    
    }
?>
