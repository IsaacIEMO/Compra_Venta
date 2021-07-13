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

        public function Products_Insert($producto, $categoria, $presentacion, $stock, $compra, $venta, $utilidad, $vencimiento, $stock_libra, $precio_libra, $descripcion = null){
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

            if ($vencimiento != "") {
                $fechaBD = date("Y-m-d", strtotime($vencimiento));
            }

            $utilidades = ($venta-$compra);

            if ($consulta) {

                $datos = array(
                    'codigo_inventario' => md5('IN-'.$code),
                    'codigo_categoria' => $categoria,
                    'codigo_producto' => $codigo_producto,
                    'codigo_presentacion' => $presentacion,
                    'stock' => $stock,
                    'precio_compra' => $compra,
                    'precio_venta' => $venta,
                    'u_lote' => $utilidad,
                    'utilidad' => $utilidades,
                    'stock_libras' => $stock_libra,
                    'precio_libras' => $precio_libra,
                    'vencimiento' => $fechaBD,
                    'u_registro' => $codigo_usuario
                );

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

        public function Update_categorias($codigo_categoria, $categoria, $description){
            if (empty($codigo_categoria) && empty($categoria) && empty($descripcion)) {
                echo "No vienen datos";
                exit;
            }

            $date = date('Y-m-d H:i:s A');
            $codigo_usuarios = $this->session->userdata('codigo_usuario');

            $data = array(
                'categoria' => $categoria,
                'descripcion' => $description,
                'u_actualizacion' => $codigo_usuarios,
                'f_actializacion' => $date
            );

            $this->db->where('codigo_categoria', $codigo_categoria);
            $this->db->update('categoria', $data);
            
            if ($this->db->affected_rows()) {
                header('location:'.base_url('index.php/Products/category'));
                exit;
            }else {
                echo "Error al actualizar la contraseña";
                exit;
            }
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

        public function Sales_Insert($producto, $proveedor, $compras, $venta, $stock, $utilidad, $descripcion, $presentacion, $categoria){
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

            $this->db->select('stock');
            $this->db->from('inventario');
            $this->db->where('codigo_producto', $producto);
            $cons = $this->db->get();
            foreach($cons->result() as $inve);
            $new_stock = $inve->stock;

            $consulta = $this->db->insert('compras', $data);
            if ($consulta) {
                $datas = array(
                    'stock' => ($stock+$new_stock),
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

        public function Sales_Detalle_Insert($op, $producto, $old, $stock, $precio, $venta, $descuento, $codigo_categoria){
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

                $this->db->select('*');
                $this->db->from('inventario');
                $this->db->where('codigo_producto', $producto);
                $consultas = $this->db->get();
                foreach($consultas->result() as $item);

                if ($venta == 1) {
                    $precio = $item->precio_libras;
                }

                $data = array(
                    'codigo_detalle' => md5($detalle),
                    'codigo_usuario' => $codigo_usuario,
                    'codigo_categoria' => $codigo_categoria,
                    'codigo_producto' => $producto,
                    'tipo' => $venta,
                    'cantidad' => $stock,
                    'precio' => $precio,
                    'descuento' => $descuento,
                    'general' => ($descuento*$stock),
                    'subtotal' => (($stock*$precio)),
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
            if (empty($codigo_factura)) {
                echo "Error, no vienen datos";
            }

            $this->db->select('*');
            $this->db->from('detalle_factura');
            $this->db->where('codigo_factura', $codigo_factura);
            $consulta = $this->db->get();
            foreach($consulta->result() as $item){
                $tipo = $item->tipo;
                $codigo_productos = $item->codigo_producto;
                $stock = $item->cantidad;

                $this->db->select('*');
                $this->db->from('inventario');
                $this->db->where('codigo_producto', $codigo_productos);
                $inventario = $this->db->get();
                foreach($inventario->result() as $inve);
                $stock_qq = $inve->stock;
                $stock_l = $inve->stock_libras;
                $codigo_inventario = $inve->codigo_inventario;

                
                if ($tipo == 1) {
                    if($stock_l == 0){
                        $new_stock_l = 100 - $stock;
                        $new_stock_qq = $stock_qq - 1;
                    }else {
                        $new_stock_l = $stock_l - $stock; 
                    }
                    $data = array(
                        'stock' => $new_stock_qq,
                        'stock_libras' => $new_stock_l
                    );
                }else {
                    $new_stock_qq = $stock_qq - $stock;

                    if ($new_stock_qq < 0) {
                        $new_stock_qq = $new_stock_qq * -1;
                    }
                    $data = array(
                        'stock' => $new_stock_qq
                    );
                }

                $this->db->where('codigo_inventario', $codigo_inventario);
                $this->db->update('inventario', $data);
                if ($this->db->affected_rows()) {
                    header('location:'.base_url('index.php/Sales/Printer/'.$codigo_factura));
                }else {
                    echo "Error";
                }
            }
        }

        public function Sales_Delete($codigo_factura){
            if (empty($codigo_factura)) {
                echo "Error, no vienen datos";
            }

            $this->db->select('*');
            $this->db->from('detalle_factura');
            $this->db->where('codigo_factura', $codigo_factura);
            $consulta = $this->db->get();
            foreach($consulta->result() as $item){
                $tipo = $item->tipo;
                $codigo_productos = $item->codigo_producto;
                $stock = $item->cantidad;

                $this->db->select('*');
                $this->db->from('inventario');
                $this->db->where('codigo_producto', $codigo_productos);
                $inventario = $this->db->get();
                foreach($inventario->result() as $inve);
                $stock_qq = $inve->stock;
                $stock_l = $inve->stock_libras;
                $codigo_inventario = $inve->codigo_inventario;

                if ($tipo == 1) {
                    $new_stock_l = $stock_l + $stock;
                    $data = array(
                        'stock_libras' => $new_stock_l
                    );
                }else {
                    $new_stock_qq = $stock_qq + $stock;
                    $data = array(
                        'stock' => $new_stock_qq
                    );
                }

                $this->db->where('codigo_inventario', $codigo_inventario);
                $this->db->update('inventario', $data);
                if ($this->db->affected_rows()) {
                    $datas = array(
                        'estado' => 0
                    );
                    $this->db->where('codigo_factura', $codigo_factura);
                    $this->db->update('detalle_factura', $datas);
                    $this->db->where('codigo_factura', $codigo_factura);
                    $this->db->update('factura', $datas);
                    if ($this->db->affected_rows()) {
                        header('location:'.base_url('index.php/Sales/Sales_L'));
                    }else {
                        echo "Error, no se pudo eliminar la factura";
                        exit;
                    }
                }else {
                    echo "Error";
                }
            }
        }

        public function corte_dia(){
            $gaseosas = "fb85aee11e7190e586d2422f24a604e6";
            $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria !=' => $gaseosas,'fecha' => date('Y-m-d'), 'estado' => 1));
            return $consulta->result();
        }

        public function corte_diac_g(){
            $gaseosas = "fb85aee11e7190e586d2422f24a604e6";
            $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria' => $gaseosas,'fecha' => date('Y-m-d'), 'estado' => 1));
            return $consulta->result();
        }
        
        public function corte_dia_g(){
            $gaseosas = "fb85aee11e7190e586d2422f24a604e6";
            $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria !=' => $gaseosas,'fecha =' => date('Y-m-d'), 'estado' => 1));
            return $consulta->result();
        }

        public function corte(){
            $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code = "";
            $longitud=4;
            for($i=0;$i<$longitud;$i++){$code .= $alpha[rand(0, strlen($alpha)-1)];}
            $codigo = "PVR-".$code;
            $codigo_usuario = $this->session->userdata('codigo_usuario');

            $this->db->select('*');
            $this->db->from('corte');
            $this->db->order_by('fecha_fin', 'desc');
            $consulta = $this->db->get();
            foreach($consulta->result() as $item);
            $ultima_fecha = $item->fecha_fin;
            $nuevafecha = strtotime ( '+1 day' , strtotime ( $ultima_fecha ) ) ;
            $nuevafecha = date ( 'Y-m-d' , $nuevafecha );


            $data = array(
                'codigo_corte' => md5($codigo),
                'codigo_usuario' => $codigo_usuario,
                'fecha_inicio' => $nuevafecha,
                'fecha_fin' => date('Y-m-d')
            );

            $consultas = $this->db->insert('corte', $data);
            if ($consultas) {
                header('location:'.base_url('index.php/Dashboard'));
                exit;
            }else {
                echo "Error al generar el corte";
                exit;
            }
        }
        
        public function corte_s(){
            $this->db->select('*');
            $this->db->from('corte');
            $this->db->order_by('fecha_fin', 'desc');
            $consulta = $this->db->get();
            foreach($consulta->result() as $item);
            $ultima_fecha = $item->fecha_fin;
            $nuevafecha = strtotime ( '+1 day' , strtotime ( $ultima_fecha ) ) ;
            $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
            
            $date = date('Y-m-d');
            $gaseosas = "fb85aee11e7190e586d2422f24a604e6";
            $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria !=' => $gaseosas,'fecha >=' => $nuevafecha, 'fecha <=' => $date, 'estado' => 1));
            return $consulta->result(); 
            
        }
        
        public function corte_s_g(){
            $this->db->select('*');
            $this->db->from('corte');
            $this->db->order_by('fecha_fin', 'desc');
            $consulta = $this->db->get();
            foreach($consulta->result() as $item);
            $ultima_fecha = $item->fecha_fin;
            $nuevafecha = strtotime ( '+1 day' , strtotime ( $ultima_fecha ) ) ;
            $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
            
            $date = date('Y-m-d');

            $gaseosas = "fb85aee11e7190e586d2422f24a604e6";
            $consulta = $this->db->order_by('fecha','asc')->get_where('detalle_factura',array('codigo_categoria' => $gaseosas,'fecha >=' => $nuevafecha, 'fecha <=' => $date, 'estado' => 1));
            return $consulta->result();
        }
    }
?>
