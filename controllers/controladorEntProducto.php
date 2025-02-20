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

            if($productoId == false){

                header("Location: index.php?action=registroProductos");
                //echo "
                    //<script>
                        //alert('Producto No Registardo, Realice el Registro!');
                        //window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProducto';
                    //</script>
                    //";
                    exit;
            }elseif($proveedorId == false) {

                header("Location: index.php?action=registroProveedor");

            }else{

//metodo para cuando se registre una entrada de producto, en el inventario se anexe el producto o sume el stock
            $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

            if($estadoInventario !== false) {
                //el producto ya existe
                $cantidadAct= $cantidadEnt + $estadoInventario['CantActual'];
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);
                 //Regista la Entrada del Producto
                $this->modeloEntProducto->registroEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt);
                echo "
                    <script>
                        alert('Registro Exitoso!');
                        window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroEntProductos';
                    </script>
                    ";
                    exit;

            }else{
                //el Producto no existe

                $this->modeloInventario->registroInventario($idProducto, $cantidadEnt);
                 //Regista la Entrada del Producto
                $this->modeloEntProducto->registroEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt);
                echo "
                <script>
                    alert('Registro Exitoso!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroEntProductos';
                </script>
                ";
                //header("Location: index.php?action=registroEntProductos");
                exit;

            }

            }

        }

    }


    //Consulta general join vista
    public function consultaGenEntProductosVista() {
        return $this->modeloEntProducto->consultaGenEntProductosVista();
    }

    //Consulta por Id Inner Join
    public function consultaGenEntProductosVistaId() {
        $idEntProducto = $_GET['idEntProducto'] ?? '';
        return $this->modeloEntProducto->consultaGenEntProductosVistaId($idEntProducto);
    }


    //Consulta por Fecha Inner Join
    public function consultaGenEntProductosVistaFecha() {
        $fecha = $_GET['fechaEnt'] ?? '';
        return $this->modeloEntProducto->consultaGenEntProductosVistaFecha($fecha);
    }


    //Consulta general por Id
        public function consultaGenEntProductosId() {
        $idEntProducto = $_GET['idEntProducto'] ?? '';
        return $this->modeloEntProducto->consultaGenEntProductos($idEntProducto);
    }


    //Actualizar de Entrada Productos
    public function ActualizarEntProducto() {

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
            $idEntProducto= $_POST['idEntProducto'];

            $cantEnt= $this->modeloEntProducto->consultaCantidadEntProductos($idEntProducto);

            $cantidadEntAnterior= $cantEnt['CantEnt'];

            if($cantidadEntAnterior == $cantidadEnt) {

                $cantidadEntAct= $cantidadEnt;

                $this->modeloEntProducto->actualizarEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEntAct, $idEntProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaEntProductos';
                </script>
                ";

                //header("Location: index.php?action=consultaEntProductos");
                exit;

            }elseif ($cantidadEntAnterior > $cantidadEnt) {

                $cantidadEntAct= $cantidadEnt;

                $this->modeloEntProducto->actualizarEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEntAct, $idEntProducto);

                $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //Modifica la cantidad Entrada
                $cantidad= $cantidadEntAnterior - $cantidadEnt;

                $cantidadAct= $estadoInventario['CantActual'] - $cantidad;
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaEntProductos';
                </script>
                ";

                //header("Location: index.php?action=consultaEntProductos");
                exit;

            } else {

                $cantidadEntAct= $cantidadEnt;

                $this->modeloEntProducto->actualizarEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEntAct, $idEntProducto);

                $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //Modifica la cantidad Entrada
                $cantidad= $cantidadEnt - $cantidadEntAnterior;

                $cantidadAct= $estadoInventario['CantActual'] + $cantidad;
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaEntProductos';
                </script>
                ";

                //header("Location: index.php?action=consultaEntProductos");
                exit;

            }

        }

    }


    //Eliminar Entrada Producto
    public function EliminarEntProducto() {

        $idEntProducto = $_GET['idEntProducto'] ?? '';

                //Consulta antes de eliminar Cantidad entrada Producto
            $cantEnt= $this->modeloEntProducto->consultaCantidadEntProductos($idEntProducto);

            $idProducto= $cantEnt['idProducto'];
            $cantidad= $cantEnt['CantEnt'];

            $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //resta la cantidad Entrada en inventario
            $cantidadAct= $estadoInventario['CantActual'] - $cantidad;
            $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

        $this->modeloEntProducto->eliminarEntProductos($idEntProducto);

        

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaEntProductos';
            </script>
            ";

            //header("Location: index.php?action=consultaEntProductos");
            exit;
    }


    //Generar reporte de entrada de productos
    public function ReporteEntProductos() {       
        $fechaInc= $_GET['fechaInc'] ?? '';
        $fechaFin= $_GET['fechaFin'] ?? '';

        // Depuración: mostrar las fechas antes de la consulta
        //echo "Fecha inicio: $fechaInc, Fecha fin: $fechaFin";

        $reporteEntProductos= $this->modeloEntProducto->reporteEntProductos($fechaInc, $fechaFin);

        return [
            'fechaInc' => $fechaInc,
            'fechaFin' => $fechaFin,
            'reporteEntProductos' => $reporteEntProductos
        ];

        }


}


?>