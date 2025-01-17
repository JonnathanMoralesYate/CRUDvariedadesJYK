<?php

require_once('./models/modeloProducto.php');
require_once('./config/conexionBDJYK.php');

class ControladorProducto{

    private $db;
    private $modeloProducto;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloProducto= new ModeloProducto($this->db);
    }

    //Registro de producto
    public function registroProductos() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $codigoProducto= $_POST['codProduc'];
            $idClase= $_POST['tiposClase'];
            $nombre= $_POST['nombreproduc'];
            $marca= $_POST['marcaProduc'];
            $descripcion= $_POST['descriProduc'];
            $idPresentacion= $_POST['tiposPresenta'];
            $idUndBase= $_POST['tiposUnd'];
            $contNeto= $_POST['contNeto'];
            $idFormatoVent= $_POST['formatovent'];
            $precioVenta= $_POST['precioVenta'];

            $foto= $_FILES['fotoProduc']['name'];
            $target_dir="photo/";
            $target_file= $target_dir.basename($foto);
            move_uploaded_file($_FILES['fotoProduc']['tmp_name'], $target_file);
            
            $this->modeloProducto->registroProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $idFormatoVent, $precioVenta, $foto);
            
            echo "
                        <script>
                            alert('Registro del Producto Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProducto';
                        </script>
                        ";
            //header("Location: index.php?action=registroProducto");
            exit;
        }

    }

    //Consulta general de productos vista
    public function listaProductosVista() {
        return $this->modeloProducto->consultGenProductosvista();
    }

    //Consulta general de productos vista
    // Clase
    public function darListaProductosPorClase($idClase) {
        return $this->modeloProducto->darProductosPorClase($idClase);
    }

    //Consulta general de productos por codigo de barras vista
    public function productoVistaCodigo() {
        $codigoProducto = $_GET['codProduc'] ?? '';
        return $this->modeloProducto->consultGenProductosvistaCodigo($codigoProducto);
    }

    //Consulta general de productos por nombre vista
    public function productoVistaNombre() {
        $nombre = $_GET['nombre'] ?? '';
        return $this->modeloProducto->consultGenProductosvistaNombre($nombre);
    }

    //Consulta general de productos por codigo de barras 
    public function productoCodigo() {
        $codigoProducto = $_GET['codProduc'] ?? '';
        return $this->modeloProducto->consultGenProductos($codigoProducto);
    }

    //Actualizar producto
    public function actualizarProducto() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $codigoProducto= $_POST['codProduc'];
            $idClase= $_POST['tiposClase'];
            $nombre= $_POST['nombreproduc'];
            $marca= $_POST['marcaProduc'];
            $descripcion= $_POST['descriProduc'];
            $idPresentacion= $_POST['tiposPresenta'];
            $idUndBase= $_POST['tiposUnd'];
            $contNeto= $_POST['contNeto'];
            $idFormatoVent= $_POST['formatovent'];
            $precioVenta= $_POST['precioVenta'];

            $foto= $_FILES['fotoProduc']['name'] ? $_FILES['fotoProduc']['name'] : null;

            if($foto) {
                $target_dir="photo/";
                $target_file= $target_dir.basename($foto);
                move_uploaded_file($_FILES['fotoProduc']['tmp_name'], $target_file);
            }else {
                $foto= $_POST['fotoProduc_actual'];
            }

            $idProducto= $_POST['idProducto'];
            
            $this->modeloProducto->actualizarProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $idFormatoVent, $contNeto, $precioVenta, $foto, $idProducto);
            
            echo "
                        <script>
                            alert('Actualizacion del Producto Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaProductos';
                        </script>
                        ";
            //header("Location: index.php?action=consultaProductos");
            exit;
        }

    }

    //Eliminar producto
    public function eliminarProducto() {
        $codigoProducto= $_GET['codProduc'] ?? '';
        $this->modeloProducto->eliminarProducto($codigoProducto);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaProductos';
            </script>
            ";
             //header("Location: index.php?action=consultaProductos");
            exit;
    }

      //Registro de producto empleado
    public function registroProductosemp() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $codigoProducto= $_POST['codProduc'];
            $idClase= $_POST['tiposClase'];
            $nombre= $_POST['nombreproduc'];
            $marca= $_POST['marcaProduc'];
            $descripcion= $_POST['descriProduc'];
            $idPresentacion= $_POST['tiposPresenta'];
            $idUndBase= $_POST['tiposUnd'];
            $contNeto= $_POST['contNeto'];
            $idFormatoVent= $_POST['formatovent'];
            $precioVenta= $_POST['precioVenta'];

            $foto= $_FILES['fotoProduc']['name'];
            $target_dir="photo/";
            $target_file= $target_dir.basename($foto);
            move_uploaded_file($_FILES['fotoProduc']['tmp_name'], $target_file);
            
            $this->modeloProducto->registroProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $idFormatoVent, $precioVenta, $foto);
            
            echo "
                        <script>
                            alert('Registro del Producto Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProductoemp';
                        </script>
                        ";

            //header("Location: index.php?action=vistaemple");
            exit;
        }

    }

        //Consulta general de productos vista emppleado
        public function listaProductosVistaemp() {
            return $this->modeloProducto->consultGenProductosvista();
        }
    
        //Consulta general de productos por codigo de barras vista empleado
        public function productoVistaCodigoemp() {
            $codigoProducto = $_GET['codProduc'] ?? '';
            return $this->modeloProducto->consultGenProductosvistaCodigo($codigoProducto);
        }
    
        //Consulta general de productos por nombre vista empleado
        public function productoVistaNombreemp() {
            $nombre = $_GET['nombre'] ?? '';
            return $this->modeloProducto->consultGenProductosvistaNombre($nombre);
        }
    
        //Consulta general de productos por codigo de barras empleado
        public function productoCodigoemp() {
            $codigoProducto = $_GET['codProduc'] ?? '';
            return $this->modeloProducto->consultGenProductos($codigoProducto);
        }

}

?>