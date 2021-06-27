<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Querys extends CI_Model {
    
        public function __construct(){
            parent::__construct();
        }
        
        /* CATEGORY */

        public function Category_Insert($categoria, $descripcion){
            if (empty($categoria) && empty($descripcion)) {
                echo "Error, no vienen datos";
                exit;
            }

            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=4;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $cate = "CA-".$code;

            $codigo_usuario = $this->session->userdata('codigo_usuario');
            $codigo_categoria = md5($cate);

            $data = array(
                'codigo_categoria' => $codigo_categoria,
                'codigo' => $cate,
                'categoria' => $categoria,
                'descripcion' => $descripcion,
                'u_registro' => $codigo_usuario
            );

            $consulta = $this->db->insert('categoria', $data);
            if ($consulta) {
                header('location:'.base_url('index.php/Products/category'));
                exit;
            }else {
                echo "No se pudieron guardar datos en la base de datos";
                exit;
            }
            
        }

        public function Category_Select(){
            $consulta = $this->db->order_by('categoria','DESC')->get_where('categoria',array('estado' => 1));    
            return $consulta->result();
        }

        public function Category_Delete($codigo_categoria){
            if (empty($codigo_categoria)) {
                echo "Error, no viene datos";
                exit;
            }

            $date = date('Y-m-d H:i:s A');
            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $data = array(
                'u_eliminacion' => $codigo_usuario,
                'f_eliminacion' => $date,
                'estado' => 0
            );

            $this->db->where('codigo_categoria', $codigo_categoria);
            $this->db->update('categoria', $data);

            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Products/category'));
                exit;
            }else {
                echo "Error al guardar datos";
                exit;
            }
        }

        /* SETTINGS */

        public function Presentation_Insert($presentacion, $libras = null, $descripcion = null){
            if (empty($presentacion)) {
                echo "Error, no hay datos en presentacion";
                exit;
            }

            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=4;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $prese = "PS-".$code;

            $codigo_usuario = $this->session->userdata('codigo_usuario');
            $codigo_presentacion = md5($prese);

            $data = array(
                'codigo_presentacion' => $codigo_presentacion,
                'presentacion' => $presentacion,
                'libras' => $libras,
                'descripcion' => $descripcion,
                'u_registro' => $codigo_usuario
            );

            $consulta = $this->db->insert('presentacion', $data);
            
            if ($consulta) {
                header('location:'.base_url('index.php/Settings/Presentation'));
                exit;
            }else{
                echo "Error, No se puedieron guardar los datos correctamente";
                exit;
            }
            
        }

        public function Presentacion_Select(){
            $consulta = $this->db->order_by('presentacion', 'DESC')->get_where('presentacion', array('estado' => 1));
            return $consulta->result();
        }

        public function Presentation_Delete($codigo_presentacion){
            if (empty($codigo_presentacion)) {
                echo "Error, no vienen datos";
                exit;
            }

            $codigo_usuario = $this->session->userdata('codigo_usuario');
            $date = date('Y-m-d H:i:s A');

            $data = array(
                'f_eliminacion' => $date,
                'u_eliminacion' => $codigo_usuario,
                'estado' => 0
            );

            $this->db->where('codigo_presentacion', $codigo_presentacion);
            $this->db->update('presentacion', $data);
            
            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Settings/Presentation'));
                exit;
            }else {
                echo "Error al guardar datos";
                exit;
            }
            
        }

        public function Roles_Select(){
            $consulta = $this->db->order_by('rol', 'ASC')->get_where('roles', array('estado' => 1));
            return $consulta->result();
        }

        /* PRODUCTS */

        public function Products_Insert($producto,$categoria, $presentacion, $stock, $compra, $venta, $utilidad, $vencimiento, $libras, $descripcion = null){
            if (empty($producto) && empty($categoria) && empty($presentacion)) {
                echo "Error, no viene datos dentro de los paramentros";
                exit;
            }

            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=4;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $prod = "PRS-".$code;

            $codigo_usuario = $this->session->userdata('codigo_usuario');
            $codigo_producto = md5($prod);

            $data = array(
                'codigo_producto' => $codigo_producto,
                'codigo_categoria' => $categoria,
                'codigo_presentacion' => $presentacion,
                'codigo' => $prod,
                'producto' => $producto,
                'detalles' => $descripcion,
                'u_registro' => $codigo_usuario
            );

            $consulta = $this->db->insert('producto', $data);

            $fechaBD = date("Y-m-d", strtotime($vencimiento));

            //$utilidad = (($stock*$venta)-($stock*$compra));
            $utilidades = ($venta-$compra);

            if ($consulta) {

                if ($libras > 0) {
                    $datos = array(
                        'codigo_inventario' => md5('IN-'.$code),
                        'codigo_categoria' => $categoria,
                        'codigo_producto' => $codigo_producto,
                        'codigo_presentacion' => $presentacion,
                        'stock' => $stock,
                        'precio_compra' => $compra,
                        'precio_venta' => $libras,
                        'libras' => 100,
                        'utilidad' => (-1 * $utilidades),
                        'u_lote' => $utilidad,
                        'vencimiento' => $fechaBD,
                        'u_registro' => $codigo_usuario
                    );
                
                }else {
                    $datos = array(
                        'codigo_inventario' => md5('IN-'.$code),
                        'codigo_categoria' => $categoria,
                        'codigo_producto' => $codigo_producto,
                        'codigo_presentacion' => $presentacion,
                        'stock' => $stock,
                        'precio_compra' => $compra,
                        'precio_venta' => $venta,
                        'utilidad' => $utilidades,
                        'u_lote' => $utilidad,
                        'vencimiento' => $fechaBD,
                        'u_registro' => $codigo_usuario
                    );
                }

                $query = $this->db->insert('inventario', $datos);
                if ($query) {
                    header('location:'.base_url('index.php/Products/list_products'));
                    exit;
                }else {
                    echo "Error, no se puedieron guardar los datos solicitados";
                    exit;
                }
            }else {
                echo "Error, no se puedieron guardar los datos solicitados";
                exit;
            }
        }

        public function Products_Select(){
            $consulta = $this->db->order_by('f_registro ', 'ASC')->get_where('producto', array('estado' => 1));
            return $consulta->result();
        }
        
        public function Products_Select_row(){
            $consulta = $this->db->order_by('f_registro ', 'ASC')->get_where('producto', array('estado' => 1));
            return $consulta->num_rows();
        }
        
        public function Products_Select_v(){
            $consulta = $this->db->limit(10)->order_by('vencimiento ', 'ASC')->get_where('inventario', array('estado' => 1));
            return $consulta->result();
        }

        public function Products_Delete($codigo_producto){
            if (empty($codigo_producto)) {
                echo "Error, no viene datos";
                exit;
            }

            $date = date('Y-m-d H:i:s A');
            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $data = array(
                'u_eliminacion' => $codigo_usuario,
                'f_eliminacion' => $date,
                'estado' => 0
            );

            $this->db->where('codigo_producto', $codigo_producto);
            $this->db->update('producto', $data);

            if ($this->db->affected_rows()) {
                $this->db->where('codigo_producto', $codigo_producto);
                $this->db->update('inventario', $data);

                if ($this->db->affected_rows()) {
                    header('location:'.base_url('index.php/Products/list_products'));
                    exit;
                }else {
                    echo "Error 2";
                    exit;
                }
                
            }else {
                echo "Error al guardar datos";
                exit;
            }
        }

        public function Products_Update_Stock($codigo_producto, $old, $new, $utilidad){
            if (empty($codigo_producto) && empty($old) && empty($new)) {
                echo "No viene datos";
                exit;
            }

            $date = date('Y-M-F H:i:s A');
            $codigo_usuarios = $this->session->userdata('codigo_usuario');

            $new_utilidad = $utilidad * $new;

            $data = array(
                'stock' => $new,
                'u_lote' => $new_utilidad,
                'u_actualizacion' => $codigo_usuarios,
                'f_actualizacion' => $date
            );

            $this->db->where('codigo_producto', $codigo_producto);
            $this->db->update('inventario', $data);
            
            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Products/list_products'));
                exit;
            }else {
                echo "Error al actualizar la contraseña";
                exit;
            }
        }

        public function Products_Update_Cash($old_c, $new_c, $codigo_producto, $old_v, $new_v, $stock){
            if (empty($codigo_producto) && empty($stock)) {
                echo "Error, no vienen datos";
                exit;
            }

            if ($new_c != 0) {
                $compra = $new_c;
            }else {
                $compra = $old_c;
            }

            if ($new_v != 0) {
                $venta = $new_v;
            }else {
                $venta = $old_v;
            }

            $utilidad = $venta-$compra;
            $utilidad_l = $utilidad * $stock;

            $date = date('Y-M-F H:i:s A');
            $codigo_usuarios = $this->session->userdata('codigo_usuario');

            $data = array(
                'precio_compra' => $compra,
                'precio_venta' => $venta,
                'utilidad' => $utilidad,
                'u_actualizacion' => $codigo_usuarios,
                'f_actualizacion' => $date
            );

            $this->db->where('codigo_producto', $codigo_producto);
            $this->db->update('inventario', $data);
            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Products/list_products'));
                exit;
            }
        }

        /* USERS */

        public function Users_Insert($nombre, $apellido, $rol, $user, $pass, $password){
            if (empty($nombre) && empty($apellido) && empty($rol) && empty($user) && empty($pass) && empty($password)) {
                echo "No hay campos disponibles";
                exit;
            }

            if ($pass === $password) {
                $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $code = "";
                $longitud=4;
                for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
                $use = "US-".$code;

                $data = array(
                    'codigo_usuario' => md5($use),
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'usuario' => $user,
                    'password' => md5($password),
                    'rol' => $rol
                );

                $consulta = $this->db->insert('auth', $data);

                if ($consulta) {
                    header('location:'.base_url('index.php/Users/List_User'));
                    exit;
                }else {
                    echo "Error al guardar datos";
                    exit;
                }
                
            }
        }
    
        public function Users_Select(){
            $consulta = $this->db->order_by('nombre','ASC')->get_where('auth',array('usuario !=' => "IEMO", 'estado' => 1));    
            return $consulta->result();
        }
        
        public function Users_Select_row(){
            $consulta = $this->db->order_by('nombre','ASC')->get_where('auth',array('usuario !=' => "IEMO", 'estado' => 1));    
            return $consulta->num_rows();
        }

        public function User_Delete($codigo_usuario){
            if (empty($codigo_usuario)) {
                echo "No hay datos";
                exit;
            }
            $date = date('Y-m-d H:i:s A');

            $data = array(
                'fecha_e' => $date,
                'estado' => 0
            );

            $this->db->where('codigo_usuario', $codigo_usuario);
            $this->db->update('auth', $data);
            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Users/List_User'));
                exit;
            }else {
                echo "Error al guardar datos";
                exit;
            }
        }

        public function User_Update($pass, $password, $codigo_usuario){
            if (empty($pass) && empty($password) && empty($codigo_usuario)) {
                echo "No vienen datos";
                exit;
            }

            $date = date('Y-M-F H:i:s A');
            $codigo_usuarios = $this->session->userdata('codigo_usuario');

            if ($pass != $password) {
                echo "Las contraseñas no son iguales";
                exit;
            }

            $data = array(
                'u_actualizacion' => $codigo_usuarios,
                'f_actualizacion' => $date,
                'password' => md5($password)
            );

            $this->db->where('codigo_usuario', $codigo_usuario);
            $this->db->update('auth', $data);
            
            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Products/category'));
                exit;
            }else {
                echo "Error al actualizar la contraseña";
                exit;
            }
        }

        public function Funciones(){
            $consulta = $this->db->order_by('orden','ASC')->get_where('funciones',array('estado' => 1));    
            return $consulta->result();
        }

        /* PROVEEDORES */

        public function Supplier_Insert($nombre, $telefono = null){
            if (empty($nombre)) {
                echo "Error, no vienen datos";
                exit;
            }

            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=4;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $use = "PVR-".$code;
            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $data = array(
                'codigo_proveedor' => md5($use),
                'nombre' => $nombre,
                'telefono' => $telefono,
                'u_registro' => $codigo_usuario
            );

            $consulta = $this->db->insert('proveedor', $data);
            
            if ($consulta) {
                header('location:'.base_url('index.php/Supplier'));
                exit;
            }else {
                echo "Error al guardar datos";
                exit;
            }
        }

        public function Supplier_Select(){
            $consulta = $this->db->order_by('nombre','ASC')->get_where('proveedor',array('estado' => 1));    
            return $consulta->result();
        }

        public function Supplier_Delete($codigo_proveedor){
            if (empty($codigo_proveedor)) {
                echo "Error, no viene datos";
                exit;
            }

            $date = date('Y-m-d H:i:s A');
            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $data = array(
                'u_actualizacion' => $codigo_usuario,
                'estado' => 0
            );

            $this->db->where('codigo_proveedor', $codigo_proveedor);
            $this->db->update('proveedor', $data);

            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Supplier'));
                exit;
            }else {
                echo "No se pudo pudo eliminar el dato solicitado";
                exit;
            }
            
            
        }

        /* COMPRAS */

        public function Sales_Insert($producto, $proveedor, $compras, $venta, $stock, $utilidad, $descripcion = null, $presentacion, $categoria){
            if (empty($producto) && empty($proveedor) && empty($compra) && empty($venta) && empty($stock) && empty($utilidad)) {
                echo "Error, no vienen datos";
                exit;
            }

            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=4;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $sales = "PVR-".$code;
            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $data = array(
                'codigo_compra' => md5($sales),
                'codigo_proveedor' => $proveedor,
                'codigo_categoria' => $categoria,
                'codigo_producto' => $producto,
                'codigo_presentacion' => $presentacion,
                'stock' => $stock,
                'precio_compra' => $compras,
                'precio_venta' => $venta,
                'utilidad' => $utilidad,
                'descripcion' => $descripcion,
                'u_registro' => $codigo_usuario
            );

            $consulta = $this->db->insert('compras', $data);
            if ($consulta) {
                $datas = array(
                    'stock' => $stock,
                    'precio_compra' => $compras,
                    'precio_venta' => $venta,
                    'utilidad' => ($venta - $compras),
                    'u_lote' => $utilidad
                );

                $this->db->where('codigo_producto', $producto);
                $this->db->update('inventario', $datas);
                
                if ($this->db->affected_rows()) {
                    header('location:'.base_url('index.php/Store'));
                    exit;
                }
            }else {
                echo "Error, no se guardaron los datos de compra";
                exit;
            }
        }

        public function Sale_Select(){
            $consulta = $this->db->order_by('f_registro','desc')->get_where('compras',array('estado' => 1));    
            return $consulta->result();
        }

        public function Sale_Select_row(){
            $consulta = $this->db->order_by('f_registro','desc')->get_where('compras',array('estado' => 1));    
            return $consulta->num_rows();
        }

        public function Sales_Detalle_Insert($op, $producto, $old, $stock, $precio){
            if ($op === "insert_detalles") {
                if (empty($producto) && empty($old) && empty($stock)) {
                    echo "Error, no viene datos ";
                    exit;
                }


                $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $code = "";
                $longitud=4;
                for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
                $detalle = "DTL-".$code;
                $codigo_usuario = $this->session->userdata('codigo_usuario');
                

                $data = array(
                    'codigo_detalle' => md5($detalle),
                    'codigo_usuario' => $codigo_usuario,
                    'codigo_producto' => $producto,
                    'cantidad' => $stock,
                    'precio' => $precio,
                    'subtotal' => ($stock*$precio),
                    'estado' => 2
                );

                $consulta = $this->db->insert('detalle_factura', $data);
                if ($consulta) {
                    echo 1;
                    exit;
                }else {
                    echo "error";
                }
            }else {
                echo "Error en el op";
            }
        }

        public function Sales_Detalle_Select(){
            $codigo_usuario = $this->session->userdata('codigo_usuario');
            $consulta = $this->db->order_by('hora','ASC')->get_where('detalle_factura',array('codigo_usuario' => $codigo_usuario ,'estado' => 2));    
            return $consulta->result();
        }

        public function Sales_Detalle_Delete($codigo_detalle){
            if (empty($codigo_detalle)) {
                echo "Error, no viene datos";
                exit;
            }

            $data = array(
                'estado' => 0
            );

            $this->db->where('codigo_detalle', $codigo_detalle);
            $this->db->update('detalle_factura', $data);

            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Sales/Sales'));
                exit;
            }else {
                echo "No se pudo pudo eliminar el dato solicitado";
                exit;
            }
        }

        public function Sales_Delete_D($codigo_usuario){

            $data = array(
                'estado' => 0
            );

            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $this->db->where('codigo_usuario', $codigo_usuario);
            $this->db->update('detalle_factura', $data);

            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Sales/Sales'));
                exit;
            }else {
                echo "No se pudo pudo eliminar el dato solicitado";
                exit;
            }
        }

        public function Sale_Insert($nombre, $direccion = null, $telefono = null){
            if (empty($nombre) && empty($direccion) && empty($telefono)) {
                echo "Error, no vienen datos";
                exit;
            }

            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $this->db->select_sum('subtotal', 'total');
            $this->db->where('codigo_usuario', $codigo_usuario);
            $this->db->where('estado', 2);
            $query = $this->db->get('detalle_factura');
            $resultado = $query->result();
            $total = $resultado[0]->total;

            $anio = date('Y'); 
            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=5;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $factura = "FAC-".$anio."-".$code;

            $data = array(
                'codigo_factura' => md5($factura),
                'codigo_usuario' => $codigo_usuario,
                'correlativo' => $factura,
                'cliente' => $nombre,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'total' => $total
            );

            $consulta = $this->db->insert('factura', $data);
            if ($consulta) {
                $codigo_factura = md5($factura);
                $datas = array(
                    'codigo_factura' => $codigo_factura,
                    'estado' => 1
                );
                $this->db->where('codigo_usuario', $codigo_usuario);
                $this->db->where('estado', 2);
                $this->db->update('detalle_factura', $datas);
                if ($this->db->affected_rows()) {
                    header('location:'.base_url('index.php/Sales/Update/'.$codigo_factura));
                    exit;
                }else {
                    echo "Error al generar el detalle";
                    exit;
                }
            }else {
                echo "Error al guardar la factura";
                exit;
            }
        }

        public function Sales_Select(){
            $consulta = $this->db->order_by('fecha','desc')->get_where('factura',array('estado' => 1));    
            return $consulta->result();
        }
        
        public function Sales_Select_v(){
            $consulta = $this->db->limit(10)->order_by('fecha','desc')->get_where('factura',array('estado' => 1));    
            return $consulta->result();
        }

        public function Sales_Select_row(){
            $consulta = $this->db->order_by('fecha','desc')->get_where('factura',array('estado' => 1));    
            return $consulta->num_rows();
        }

        public function Sales_Select_W($where){
            $consulta = $this->db->order_by('fecha','desc')->get_where('factura', $where);    
            return $consulta->result();
        }

        public function Update_Stock($codigo_factura){
            $this->db->select('*');
            $this->db->from('detalle_factura');
            $this->db->where('codigo_factura', $codigo_factura);
            $this->db->where('estado', 1);
            $consulta = $this->db->get();
            $row = $consulta->row();
            foreach($consulta->result() as $item) {
                $codigo_producto = $item->codigo_producto;
                $cantidad = $item->cantidad;

                $this->db->select('*');
                $this->db->from('inventario');
                $this->db->where('codigo_producto', $codigo_producto);
                $this->db->where('estado', 1);
                $invetario = $this->db->get();
                foreach($invetario->result() as $inve){
                    $stock = $inve->stock;
                    $libras = $inve->libras;
                }

                $this->db->select('*');
                $this->db->from('producto');
                $this->db->where('codigo_producto', $codigo_producto);
                $this->db->where('estado', 1);
                $producto = $this->db->get();
                foreach($producto->result() as $produ):
                    $codigo_categoria = $produ->codigo_categoria;
                endforeach;

                if ($codigo_categoria === "1be3842ece0b6fbab575bc32ea7737f5" || $codigo_categoria === "baa661154ee9582abf982570b201298e") {
                    if ($cantidad > $libras) {
                        $new_libra = $cantidad - $libras;
                        $new_libras = 100 - $new_libra;
                        $new_stock = $stock - 1;
                    }else {
                        $new_libras = $libras - $cantidad;
                        $new_stock = $stock;
                    }
                }else {
                    $new_stock = $stock - $cantidad;
                    $new_libras = 0;
                }

                $data = array(
                    'stock' => $new_stock,
                    'libras' => $new_libras,
                );
                $this->db->trans_start();
                $this->db->where('codigo_producto', $codigo_producto);
                $this->db->update('inventario', $data);
                $this->db->trans_complete();
                if ($this->db->affected_rows()) {
                    header('location:'.base_url('index.php/Sales/Printer/'.$codigo_factura));
                    exit;
                }else {
                    echo "Error, no se puedo actualizar el stock";
                    exit;
                }
                
            }
        }

    }
?>
