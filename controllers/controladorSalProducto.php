<?php

require_once('./models/modeloSalProducto.php');
require_once('./models/modeloCliente.php');
require_once('./models/modeloEntProducto.php');
require_once('./models/modeloInventario.php');
require_once('./config/conexionBDJYK.php');

class ControladorSalProducto{

    private $db;
    private $modeloSalProducto;
    private $modeloProducto;
    private $modeloCliente;
    private $modeloInventario;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloSalProducto= new ModeloSalProducto($this->db);
        $this->modeloProducto= new ModeloProducto($this->db);
        $this->modeloCliente= new ModeloCliente($this->db);
        $this->modeloInventario= new ModeloInventario($this->db);

    }


    //registro de Salida Producto
    public function RegistroSalProducto() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $codProducto= $_POST['codProducto'];
            $numIdentcliente= $_POST['numIdentCliente'];

            $productoId= $this->modeloProducto->consultaProducto($codProducto);

            $clienteId= $this->modeloCliente->consultaCliente($numIdentcliente);

            $idProducto= $productoId['idProducto'];
            $idCliente= $clienteId['idCliente'];
            $fechaSal= $_POST['fechaSal'];
            $cantSal= $_POST['cantSal'];
            $precioVenta= $_POST['precioVenta'];

            if($clienteId == false){

                header("Location: index.php?action=registroCliente");
                //echo "
                    //<script>
                        //alert('Producto No Registardo, Realice el Registro!');
                        //window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroCliente';
                    //</script>
                    //";
                    exit;
            
            }elseif($productoId == false) {
            
                header("Location: index.php?action=registroProducto");
                //echo "
                    //<script>
                        //alert('Producto No Registardo, Realice el Registro!');
                        //window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProducto';
                    //</script>
                    //";
                    exit;          
            
                }else{

                    //metodo para cuando se registre una Salida de producto, en el inventario se reste el producto del stock
                    $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                        if($estadoInventario !== false) {
                                //el producto ya existe
                                    $cantidadAct= $estadoInventario['CantActual'] - $cantSal;
                                    $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                                //metodo para la acumulacion de puntos del cliente
                                    $puntosCliente= $this->modeloCliente->consultaPuntos($idCliente);

                                        if($puntosCliente) {

                                                $puntosBd= $puntosCliente['Puntos'];

                                                $puntosGanados= ($precioVenta/25000);

                                                $puntosAct= $puntosBd + $puntosGanados;


                                                $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                                            }

                                //registrar salida producto
                                    $this->modeloSalProducto->registroSalProducto($idProducto, $idCliente, $fechaSal, $cantSal, $precioVenta);

                                echo "
                                    <script>
                                        alert('Registro Exitoso!');
                                        window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroSalProductos';
                                    </script>
                                    ";
                                    exit;

                        }else{
                            //el Producto no existe
                            //$this->modeloInventario->registroInventario($idProducto, $cantidadEnt);
                            echo "
                            <script>
                                alert('Registre La Entrada del Producto!');
                                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroEntProductos';
                            </script>
                            ";
                            //header("Location: index.php?action=registroEntProductos");
                            exit;
                        }
                }
        }
    }


    //Consulta General Join Vista
    public function consultaGenSalProductosVista() {
        return $this->modeloSalProducto->consultaGenSalProductosVista();
    }


    //Consulta por Id Inner Join
    public function consultaGenSalProductosVistaId() {
        $idEntProducto = $_GET['idSalProducto'] ?? '';
        return $this->modeloSalProducto->consultaGenSalProductosVistaId($idEntProducto);
    }


    //Consulta por Fecha Inner Join
    public function consultaGenSalProductosVistaFecha() {
        $fecha = $_GET['fechaSal'] ?? '';
        return $this->modeloSalProducto->consultaGenSalProductosVistaFecha($fecha);
    }


    //Consulta general por Id
    public function consultaGenSalProductosId() {
        $idSalProducto = $_GET['idSalProducto'] ?? '';
        return $this->modeloSalProducto->consultaSalProductoId($idSalProducto);
    }


    //Actualizar Salida de Productos
    public function ActualizarSalProductos() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $codProducto= $_POST['codProducto'];
            $numIdentcliente= $_POST['numIdentCliente'];

            $productoId= $this->modeloProducto->consultaProducto($codProducto);

            $clienteId= $this->modeloCliente->consultaCliente($numIdentcliente);

            $idProducto= $productoId['idProducto'];
            $precioProducto= $productoId['Precioventa'];
            $idCliente= $clienteId['idCliente'];
            $fechaSal= $_POST['fechaSal'];
            $cantSal= $_POST['cantSal'];
            $precioVenta= $_POST['precioVenta'];
            $idSalProducto= $_POST['idSalProducto'];

            $cantidadSal= $this->modeloSalProducto->consultaCantidadSalProductos($idSalProducto);

            $cantidadSalAnterior= $cantidadSal['CantSalida'];

            //echo "<script>
                    //alert('variable: " . $precioProducto . "');
                //</script>";

            if($cantidadSalAnterior == $cantSal) {

                $cantidadActual= $cantSal;

                $this->modeloSalProducto->actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantidadActual, $precioVenta, $idSalProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa hh!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaSalProductos';
                </script>
                ";

                //header("Location: index.php?action=consultaSalProductos");
                exit;

            }elseif($cantidadSalAnterior > $cantSal) {

                $cantidadActual= $cantSal;

                //actualizar el precio de la venta
                $precioVentaAct= $precioProducto * $cantidadActual ;

                //actualizar puntos del cliente
                $precioDifer= $precioVenta - $precioVentaAct;

                //metodo para la acumulacion de puntos del cliente
                $puntosCliente= $this->modeloCliente->consultaPuntos($idCliente);

                if($puntosCliente) {

                        $puntosBd= $puntosCliente['Puntos'];

                        $puntosGanados= ($precioDifer/25000);

                        $puntosAct= $puntosBd - $puntosGanados;


                        $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                    }

                    //actualiza el registro de salida producto
                $this->modeloSalProducto->actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantidadActual, $precioVentaAct, $idSalProducto);

                $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //Modifica la cantidad Entrada
                $cantidad= $cantidadSalAnterior - $cantSal;

                $cantidadAct= $estadoInventario['CantActual'] + $cantidad;
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa RR!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaSalProductos';
                </script>
                ";

                //header("Location: index.php?action=consultaSalProductos");
                exit;

            }else {

                $cantidadActual= $cantSal;

                $precioVentaAct= $precioProducto * $cantidadActual ;

                //actualizar puntos del cliente
                $precioDifer= $precioVentaAct - $precioVenta;

                //metodo para la acumulacion de puntos del cliente
                $puntosCliente= $this->modeloCliente->consultaPuntos($idCliente);

                if($puntosCliente) {

                        $puntosBd= $puntosCliente['Puntos'];

                        $puntosGanados= ($precioDifer/25000);

                        $puntosAct= $puntosBd + $puntosGanados;

                        $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                    }

                    //actualiza el registro de salida productos
                $this->modeloSalProducto->actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantidadActual, $precioVentaAct, $idSalProducto);

                $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //Modifica la cantidad Entrada
                $cantidad= $cantSal - $cantidadSalAnterior;

                $cantidadAct= $estadoInventario['CantActual'] - $cantidad;
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa DD!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaSalProductos';
                </script>
                ";

                //header("Location: index.php?action=consultaSalProductos");
                exit;

            }

        }

    }


    //Eliminar Salida Producto
    public function EliminarSalProducto() {

        $idSalProducto = $_GET['idSalProducto'] ?? '';

                //Consulta antes de eliminar salida producto
            $cantSal= $this->modeloSalProducto->consultaCantidadSalProductos($idSalProducto);

            $idProducto= $cantSal['idProducto'];
            $cantidad= $cantSal['CantSalida'];
            $idCliente= $cantSal['idCliente'];
            $valorVenta= $cantSal['PrecioVenta'];

            $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //suma la cantidad Salida en inventario
            $cantidadAct= $estadoInventario['CantActual'] + $cantidad;
            $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                //Descuento de puntos del cliente
            $puntosCliente= $this->modeloCliente->consultaPuntos($idCliente);

                if($puntosCliente) {

                        $puntosBd= $puntosCliente['Puntos'];

                        $puntosMenos= ($valorVenta/25000);

                        $puntosAct= $puntosBd - $puntosMenos;

                        $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                    }

        $this->modeloSalProducto->eliminarSalProductos($idSalProducto);

        echo "
        <script>
            alert('Eliminacion Exitosa!');
            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaSalProductos';
        </script>
        ";

        //header("Location: index.php?action=consultaEntProductos");
        exit;
    }


}

?>