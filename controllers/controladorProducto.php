<?php

require_once('./models/modeloGenerarCodigo.php');
require_once('./models/modeloProducto.php');
require_once('./config/conexionBDJYK.php');

class ControladorProducto{

    private $db;
    private $modeloProducto;
    private $modeloGenerarCodigo;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloProducto= new ModeloProducto($this->db);
        $this->modeloGenerarCodigo= new ModeloGenerarCodigo($this->db);
    }

    //Registro de producto
    public function registroProductos() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $codigoProducto= $_POST['codProduc'];
            $codigoGenerado= $_POST['codigoGenerado'];
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


            if($codigoGenerado){



                $this->modeloProducto->registroProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $idFormatoVent, $precioVenta, $foto);

                $this->modeloGenerarCodigo->actualizarCodigoGenerado($codigoProducto);
            
            echo "
                        <script>
                            alert('Registro del Producto Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProductos';
                        </script>
                        ";
            //header("Location: index.php?action=registroProductos");
            exit;


            }else{

                $this->modeloProducto->registroProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $idFormatoVent, $precioVenta, $foto);
            
            echo "
                        <script>
                            alert('Registro del Producto Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProductos';
                        </script>
                        ";
            //header("Location: index.php?action=registroProductos");
            exit;

            }
            
            
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


    //Consulta general de productos vista
    public function listaClasesP() {
        return $this->modeloProducto->mostrarClasesP();
    }


    // Consulta para verificar si el producto esta registrado en BD
    public function productoCodProducto() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // Leer JSON desde la solicitud
            $inputJSON = file_get_contents("php://input");

            $input = json_decode($inputJSON, true);
    
            if (!isset($input['codProducto']) || empty($input['codProducto'])) {
                echo json_encode(['error' => 'El código del producto es requerido']);
                exit;
            }
    
            $codProducto = $input['codProducto'];

            header("Content-Type: application/json; charset=UTF-8");
    
            $producto = $this->modeloProducto->consultaProducto($codProducto);
    
            if ($producto) {
                echo json_encode(["success" => true, "producto" => $producto]);
            } else {
                echo json_encode(["success" => false, "error" => "Producto No Registrado"]);
            }
        } else {
            echo json_encode(['error' => 'Método no permitido']);
        }
    }


    // Consulta para traer informacion del producto
    public function informacionProducto() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // Leer JSON desde la solicitud
            $inputJSON = file_get_contents("php://input");

            $input = json_decode($inputJSON, true);
    
            if (!isset($input['idProducto']) || empty($input['idProducto'])) {
                echo json_encode(['error' => 'El código del producto es requerido']);
                exit;
            }
    
            $idProducto = $input['idProducto'];

            header("Content-Type: application/json; charset=UTF-8");
    
            $producto = $this->modeloProducto->consultaProductoCodigo($idProducto);
    
            if ($producto) {
                echo json_encode(["success" => true, "producto" => $producto]);
            } else {
                echo json_encode(["success" => false, "error" => "Producto No Registrado"]);
            }
        } else {
            echo json_encode(['error' => 'Método no permitido']);
        }
    }


    // Consulta para traer informacion del producto por idclase
    public function ProductosPorClase() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // Leer JSON desde la solicitud
            $inputJSON = file_get_contents("php://input");

            $input = json_decode($inputJSON, true);
    
            if (!isset($input['idClase']) || empty($input['idClase'])) {
                echo json_encode(['error' => 'El idClase del producto es requerido']);
                exit;
            }
    
            $idClase = $input['idClase'];
    
            header("Content-Type: application/json; charset=UTF-8");

            $infoProducto = $this->modeloProducto->productosPorClase($idClase);
    
            if ($infoProducto) {
                echo json_encode(["success" => true, "inforProducto" => $infoProducto]);
            } else {
                echo json_encode(["success" => false, "error" => "Producto No Registrado"]);
            }
        } else {
            echo json_encode(['error' => 'Método no permitido']);
        }
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
            $idFormatoVent= $_POST['formatoVent'];
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
            
            $this->modeloProducto->actualizarProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $idFormatoVent, $precioVenta, $foto, $idProducto);
            
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

        //Consulta general de productos vista empleado
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