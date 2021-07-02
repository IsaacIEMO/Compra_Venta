<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Sales extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Querys');
            $this->load->model('productos_ajax');
            $this->load->library("EscPos");
        }
        
    
        public function index(){
            show_404();
        }

        public function Sales(){
            if($this->session->userdata('is_logged')){
                $productos = $this->Querys->Products_Select();
                $detalle = $this->Querys->Sales_Detalle_Select();
                $data = array('productos' => $productos, 'detalles' => $detalle);
                $this->load->view('layout/header');
                $this->load->view('layout/main');
                $this->load->view('admin/sales', $data);
                $this->load->view('layout/footer');
            }else {
                show_404();
            }
        }

        public function Ajax_producto(){
            $producto = $this->input->post('producto');
            $this->productos_ajax->Ajax($producto);
        }
        
        public function Ajax_precio(){
            $producto = $this->input->post('producto');
            $this->productos_ajax->Ajax_precios($producto);
        }

        public function Insert_Detalle_Sales(){
            $op = $this->input->post('op');
            $producto = $this->input->post('producto');
            $old = $this->input->post('old');
            $stock = $this->input->post('stock');
            $precio = $this->input->post('precio');
            $venta = $this->input->post('venta');
            $this->Querys->Sales_Detalle_Insert($op, $producto, $old, $stock, $precio, $venta);
        }

        public function Delete_Product_Detalle($codigo_detalle){
            if (empty($codigo_detalle)) {
                echo "No vienen datos";
                exit;
            }
            $this->Querys->Sales_Detalle_Delete($codigo_detalle);
        }

        public function Delete_Detalle(){
            $codigo_usuario = $this->session->userdata('codigo_usuario');
            $this->Querys->Sales_Delete_D($codigo_usuario);
        }

        public function Insert_Sales(){
            $nombre = $this->input->post('nombre');
            $direccion = $this->input->post('direccion');
            $telefono = $this->input->post('telefono');
            $this->Querys->Sale_Insert($nombre, $direccion, $telefono);
        }

        public function Sales_L(){
            $productos = $this->Querys->Products_Select();
            $detalle = $this->Querys->Sales_Detalle_Select();
            $factura = $this->Querys->Sales_Select();
            $data = array('productos' => $productos, 'detalles' => $detalle, 'factura' => $factura);
            $this->load->view('layout/header');
            $this->load->view('layout/main');
            $this->load->view('admin/listados', $data);
            $this->load->view('layout/footer');
        }

        public function Printer($codigo_factura){
            $factura = $this->Querys->Sales_Select_W(["codigo_factura" => $codigo_factura]);
            $nombre_usuario = $this->session->userdata('nombre')." ".$this->session->userdata('apellido');;

            foreach($factura as $item):
                $correlativo = $item->correlativo;
                $fecha = $item->fecha;
                $cliente = $item->cliente;
                $direccion = $item->direccion;
                $telefono = $item->telefono;
                $total = $item->total;
            endforeach;

            $this->db->select('*');
            $this->db->from('detalle_factura');
            $this->db->where('codigo_factura', $codigo_factura);
            $consulta = $this->db->get();
            
            try {
                $connector = new Escpos\PrintConnectors\WindowsPrintConnector("POS-80C");
    
                $printer = new Escpos\Printer($connector);
    
                /* PARTE 1 */

                /* Encabezado */
                $printer->text("           COMERCIALIZADORA EL RANCHO\n");
                $printer->text("             San Martín Jilotepeque\n");
                $printer->text("           Tel: 4529-3828 El Rancho\n");
                $printer->text("         Tel: 4665-2910 Tierra Colorado\n");
                $printer->text("         -------------------------------\n");
                $printer->text("               COMPROBANTE DE VENTA\n");
                $printer->text("         -------------------------------\n");
                /* Encabezado */

                /* Cuerpo */
                $printer->text("\n\n");
                $printer->text("CLIENTE: ".$cliente."\n");
                $printer->text("DIRECCION: ".$direccion."\n");
                $printer->text("TELEFONO: ".$telefono."\n");

                $printer->text("\n\n");
                
                $printer->text("Productos:                           Subtotal: \n");
                foreach($consulta->result() as $detalle):
                    $stock = $detalle->cantidad;
                    $codigo_producto = $detalle->codigo_producto;
                    $precio = $detalle->precio;
                    $subtotal = $detalle->subtotal;
                    $this->db->select('*');
                    $this->db->from('inventario');
                    $this->db->join('presentacion', 'presentacion.codigo_presentacion = inventario.codigo_presentacion');
                    $this->db->join('producto', 'producto.codigo_producto = inventario.codigo_producto');
                    $this->db->where('inventario.codigo_producto', $codigo_producto);
                    $productos = $this->db->get();
                    foreach($productos->result() as $prod):
                        $producto = $prod->producto; 
                        $presetacion = $prod->presentacion; 
                    endforeach;
                    if($stock > 10): 
                        $s = $stock; 
                    else: 
                        $s = "0".$stock; 
                    endif;
                    $printer->text($s."   ".$producto." ".$presetacion."   ".$precio."/u      Q ".number_format($subtotal, 2, '.', ',')."\n");
                    
                endforeach;
                $printer->text("\n\n");
                $printer->text("         -------------------------------\n");
                $printer->text("               TOTAL: Q ".number_format($total, 2, '.', ',')."\n");
                $printer->text("         -------------------------------\n");

                /* Cuerpo */

                /* Pie de Pagina */
                $printer->text("CAJERO: ".$nombre_usuario."\n");
                $printer->text("CORRELATIVO: ".$correlativo."\n");
                $printer->text("FECHA: ".$fecha."\n");
                /* Pie de Pagina */
                $printer -> cut();
                
                
                /* PARTE 2 */

                /* Encabezado */
                $printer->text("           COMERCIALIZADORA EL RANCHO\n");
                $printer->text("             San Martín Jilotepeque\n");
                $printer->text("           Tel: 4529-3828 El Rancho\n");
                $printer->text("         Tel: 4665-2910 Tierra Colorado\n");
                $printer->text("         -------------------------------\n");
                $printer->text("               COMPROBANTE DE VENTA\n");
                $printer->text("         -------------------------------\n");
                $printer->text("                      COPIA\n");
                $printer->text("         -------------------------------\n");
                /* Encabezado */

                /* Cuerpo */
                $printer->text("\n\n");
                $printer->text("CLIENTE: ".$cliente."\n");
                $printer->text("DIRECCION: ".$direccion."\n");
                $printer->text("TELEFONO: ".$telefono."\n");

                $printer->text("\n\n");
                
                $printer->text("Productos:                           Subtotal: \n");
                foreach($consulta->result() as $detalle):
                    $stock = $detalle->cantidad;
                    $codigo_producto = $detalle->codigo_producto;
                    $precio = $detalle->precio;
                    $subtotal = $detalle->subtotal;
                    $this->db->select('*');
                    $this->db->from('inventario');
                    $this->db->join('presentacion', 'presentacion.codigo_presentacion = inventario.codigo_presentacion');
                    $this->db->join('producto', 'producto.codigo_producto = inventario.codigo_producto');
                    $this->db->where('inventario.codigo_producto', $codigo_producto);
                    $productos = $this->db->get();
                    foreach($productos->result() as $prod):
                        $producto = $prod->producto; 
                        $presetacion = $prod->presentacion; 
                    endforeach;
                    if($stock > 10): 
                        $s = $stock; 
                    else: 
                        $s = "0".$stock; 
                    endif;
                    $printer->text($s."   ".$producto." ".$presetacion."   ".$precio."/u      Q ".number_format($subtotal, 2, '.', ',')."\n");
                    
                endforeach;
                $printer->text("\n\n");
                $printer->text("         -------------------------------\n");
                $printer->text("               TOTAL: Q ".number_format($total, 2, '.', ',')."\n");
                $printer->text("         -------------------------------\n");

                /* Cuerpo */

                /* Pie de Pagina */
                $printer->text("CAJERO: ".$nombre_usuario."\n");
                $printer->text("CORRELATIVO: ".$correlativo."\n");
                $printer->text("FECHA: ".$fecha."\n");
                /* Pie de Pagina */
                $printer -> cut();

                $printer -> close();
    			header('location:'.base_url('index.php/Sales/Sales_L'));

            } catch (Exception $e) {
                echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
            }
            
        }

        public function Update($codigo_factura){
            $this->Querys->Update_Stock($codigo_factura);
        }
    }
?>