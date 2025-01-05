<?php

require_once('./models/modeloProducto.php');
require_once('./models/modeloProveedor.php');
require_once('./models/modeloEntProducto.php');
require_once('./models/modeloInventario.php');
require_once('./config/conexionBDJYK.php');

class ControladorEntProductos{

    private $db;
    private $modeloEntProducto;
    private $modeloProducto;
    private $modeloProveedor;
    private $modeloInventario;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloEntProducto= new ModeloEntProducto($this->db);
        $this->modeloProducto= new ModeloProducto($this->db);
        $this->modeloProveedor= new ModeloProveedor($this->db);
        $this->modeloInventario= new ModeloInventario($this->db);


    }


    //registro de Entrada Productos
    public function RegistroEntProducto() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $codProducto= $_POST['codProducto'];
            $nitProveedor= $_POST['nitProveedor'];

            $productoId= $this->modeloProducto->consultaProducto($codProducto);

            $proveedorId= $this->modeloProveedor->consultaProveedor($nitProveedor);


            $idProducto= $productoId['idProducto'];
            $idProveedor= $proveedorId['idProveedor'];
            $fechaEnt= $_POST['fechaEnt'];
            $fechaVencim= $_POST['fechaVencim'];
            $precioCompra= $_POST['precioCompra'];
            $cantidadEnt= $_POST['cantidadEnt'];
            
            $this->modeloEntProducto->registroEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt);

//metodo para cuando se registre una entrada de producto, en el inventario se anexe el producto o sume el stock
            $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

            if($estadoInventario !== false) {
                //el producto ya existe
                $cantidadAct= $cantidadEnt + $estadoInventario['CantActual'];
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                    <script>
                        alert('Registro Exitoso!');
                        window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroEntProductos';
                    </script>
                    ";

            }else{
                //el Producto no existe

                $this->modeloInventario->registroInventario($idProducto, $cantidadEnt);

                echo "
                <script>
                    alert('Registro Exitoso!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroEntProductos';
                </script>
                ";

            }
            
            

            //header("Location: index.php?action=registroEntProductos");
            exit;
        }

    }
}


?>