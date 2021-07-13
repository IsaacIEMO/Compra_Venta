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

        public function cortes($reservationdate, $corte){

            if ($corte >= 3 && $corte <= 5) {
                $reservationdate = null;
            }

			if (empty($reservationdate) && empty($corte)) {
				echo "No vienen datos";
                exit;
			}

            $inicio = substr($reservationdate, 0, -13);
            $inicio = date("Y-m-d", strtotime($inicio));
            $fin = substr($reservationdate, 13);
            $fin = date("Y-m-d", strtotime($fin));
            $gaseosas = "fb85aee11e7190e586d2422f24a604e6";

            switch ($corte) {
                case '0':
                    $titulo = 'Corte General';
                    $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('fecha >=' => $inicio, 'fecha <=' => $fin, 'estado' => 1));
                break;

                case '1':
                    $titulo = 'Ventas sin gaseosas';
                    $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria !=' => $gaseosas,'fecha >=' => $inicio, 'fecha <=' => $fin, 'estado' => 1));
                break;

                case '2':
                    $titulo = 'Ventas solo gaseosas';
                    $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria' => $gaseosas,'fecha >=' => $inicio, 'fecha <=' => $fin, 'estado' => 1));
                break;

                case '3':
                    $titulo = 'Ultimo corte general';
                break;

                case '4':
                    $titulo = 'Ultimo corte sin gaseosas';
                break;

                case '5':
                    $titulo = 'Ultimo sin gaseosas';
                break;
                
                default:
                    $titulo = 'Error';
                break;
            }
            ?>
                <h2 class="text_v"><?= $titulo; ?></h2>
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Total</th>
                            <th>Descuento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($consulta->result() as $item):
                                $codigo_factura = $item->codigo_factura;

                                $this->db->select('*');
                                $this->db->from('factura');
                                $this->db->where('codigo_factura', $codigo_factura);
                                $fac = $this->db->get();
                                foreach($fac->result() as $inte);
                                $correlativo = $inte->correlativo;
                                $cliente = $inte->cliente;


                                $codigo_categoria = "fb85aee11e7190e586d2422f24a604e6";

                                $this->db->select('*');
                                $this->db->select_sum('subtotal', 'total');
                                $this->db->select_sum('general', 'des');
                                $this->db->from('detalle_factura');
                                if ($corte == 1):
                                    $this->db->where('codigo_categoria !=', $codigo_categoria);
                                elseif($corte == 2):
                                    $this->db->where('codigo_categoria =', $codigo_categoria);
                                endif;
                                $this->db->where('fecha >= ', $inicio);
                                $this->db->where('fecha <= ', $fin);
                                $this->db->where('estado', 1);
                                $consulta = $this->db->get();

                                $codigo_producto = $item->codigo_producto;
                                

                                $this->db->select('*');
                                $this->db->from('producto');
                                $this->db->where('codigo_producto', $codigo_producto);
                                $prod = $this->db->get();
                                foreach($prod->result() as $produc);
                                $producto = $produc->producto;
                                
                                foreach($consulta->result() as $detalle);
                                if (empty($detalle->total)) {
                                    $total = 0;
                                }else {
                                    $total = $detalle->total;
                                }
                                $descuento = $detalle->des;
                                $general = 0;
                                $general = $general + $total ;
                            ?>
                                <tr>
                                    <td class="text_v"><?= $correlativo;?></td>
                                    <td class="text_v"><?= $cliente;?></td>
                                    <td class="text_v"><?= $producto;?></td>
                                    <td class="text_v">Q <?= number_format($item->subtotal, '2', '.', ',');?></td>
                                    <td class="text_v">Q <?= number_format($item->descuento, '2', '.', ',');?></td>
                                </tr>
                        <?php endforeach;?>
                        <td font color="#000000">z</td>
  							<td></td>
  							<td></td>
  							<td>Total: </td>
  							<td>

  								<div class="text_v">
  									Q <?= isset($total) ? number_format($total, '2', '.', ',') : '0'; ?>
  								</div>
  							</td>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Total</th>
                            <th>Descuento</th>
                        </tr>
                    </tfoot>
                </table>


                
            <?php
        }
    }
?>
