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

        public function Products_Insert($producto,$categoria, $presentacion, $stock, $compra, $venta, $utilidad, $vencimiento, $descripcion = null){
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
                    header('location:'.base_url('index.php/Products/category'));
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
            $consulta = $this->db->order_by('nombre','ASC')->get_where('auth',array('estado' => 1));    
            return $consulta->result();
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

        /*public function Sales_Insert($producto, $proveedor = null, $compras = null, $venta, $stock, $utilidad, $descripcion = null, $presentacion, $categoria){
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
                'codigo_presentacion' => $presentacion,
                'stock' => $stock,
                'precio_compra' => $compra,
                'precio_venta' => $venta,
                'utilidad' => $utilidad,
                'descripcion' => $descripcion,
                'u_registro' => $codigo_usuario
            );

            $consulta = $this->db->insert('compras', $data);
            if ($consulta) {
                $datas = array(
                    'stock' => $stock,
                    'precio_compra' => $compra,
                    'precio_venta' => $venta,
                    'utilidad' => ($venta - $compra),
                    'u_lote' => $utilidad
                );

                $this->db->where('codigo_producto', $producto);
                $this->db->update('inventario', $datas);
                
                if ($this->db->affected_rows()) {
                    header('location:'.base_url('index.php/Store'));
                }
            }else {
                echo "Error, no se guardaron los datos de compra";
                exit;
            }
        }*/
    }
?>
