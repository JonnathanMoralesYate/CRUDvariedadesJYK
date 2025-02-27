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
            $precioVentaString = $_POST['precioVenta'];    // Recibimos el valor como string
            $precioVentaSinPunto = str_replace('.', '', $precioVentaString);    // Intentamos eliminar el punto
            $precioVenta = (int) $precioVentaSinPunto;  // Convertir a entero

            $idModoPago= $_POST['tipoPago'];

            if($clienteId == false){
                header("Location: index.php?action=registroCliente");
                exit;
            }elseif($productoId == false) {
                header("Location: index.php?action=registroProducto");
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

                                                $puntosGanados= ($precioVenta*0.005);

                                                $puntosAct= $puntosBd + $puntosGanados;


                                                $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                                            }

                                //registrar salida producto
                                    $this->modeloSalProducto->registroSalProducto($idProducto, $idCliente, $fechaSal, $cantSal, $precioVenta, $idModoPago);

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
        $idSalProducto = $_GET['idSalProducto'] ?? '';
        return $this->modeloSalProducto->consultaGenSalProductosVistaId($idSalProducto);
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


    //Consulta general por Id para actualizar
    public function consultaGenSalProductosIdP() {
        $idSalProducto = $_GET['idSalProducto'] ?? '';
        return $this->modeloSalProducto->consultaSalProductoIdP($idSalProducto);
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
            $idModoPago= $_POST['tipoPago'];

            $cantidadSal= $this->modeloSalProducto->consultaCantidadSalProductos($idSalProducto);

            $cantidadSalAnterior= $cantidadSal['CantSalida'];

            //echo "<script>
                    //alert('variable: " . $precioProducto . "');
                //</script>";

            if($cantidadSalAnterior == $cantSal) {

                $cantidadActual= $cantSal;

                $this->modeloSalProducto->actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantidadActual, $precioVenta, $idModoPago, $idSalProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa!');
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

                        $puntosGanados= ($precioDifer*0.005);

                        $puntosAct= $puntosBd - $puntosGanados;


                        $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                    }

                    //actualiza el registro de salida producto
                $this->modeloSalProducto->actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantidadActual, $precioVentaAct, $idModoPago, $idSalProducto);

                $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //Modifica la cantidad Entrada
                $cantidad= $cantidadSalAnterior - $cantSal;

                $cantidadAct= $estadoInventario['CantActual'] + $cantidad;
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa!');
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

                        $puntosGanados= ($precioDifer*0.005);

                        $puntosAct= $puntosBd + $puntosGanados;

                        $this->modeloCliente->actualizaPuntos($puntosAct, $idCliente);
                    }

                    //actualiza el registro de salida productos
                $this->modeloSalProducto->actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantidadActual, $precioVentaAct, $idModoPago, $idSalProducto);

                $estadoInventario = $this->modeloInventario->consultaInventarioId($idProducto);

                //Modifica la cantidad Entrada
                $cantidad= $cantSal - $cantidadSalAnterior;

                $cantidadAct= $estadoInventario['CantActual'] - $cantidad;
                $this->modeloInventario->actualizarStock($cantidadAct, $idProducto);

                echo "
                <script>
                    alert('Actualizacion Exitosa!');
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

                        $puntosMenos= ($valorVenta*0.005);

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


    //Generar reporte de salida productos
    public function ReporteSalProductos() {
        $fechaInc= $_GET['fechaInc'] ?? '';
        $fechaFin= $_GET['fechaFin'] ?? '';
        $reporteSalProductos = $this->modeloSalProducto->reporteSalProductos($fechaInc, $fechaFin);

        return [
            'fechaInc' => $fechaInc,
            'fechaFin' => $fechaFin,
            'reporteSalProductos' => $reporteSalProductos
        ];
    }

    //Registro de salidas de productos por salida de varios producto
    public function registrosSalProductos() {

        // Configurar cabeceras para aceptar solicitudes JSON
        header('Content-Type: application/json');

        // Permite el acceso desde cualquier origen (CORS)
        header('Access-Control-Allow-Origin: *');

        // Obtener los datos JSON enviados
        $data = json_decode(file_get_contents('php://input'), true);

        // Verifica si los datos se han recibido correctamente
        if (!isset($data['idProducto']) || !isset($data['idCliente']) || !isset($data['fechaSal'])
            || !isset($data['cantidad']) || !isset($data['precio']) || !isset($data['formaPago'])) {


                // Preparar y ejecutar la inserción de cada fila
                foreach ($data as $fila) {

                    $codProducto = $fila['idProducto'];
                    $numIdentCliente = $fila['idCliente'];
                    $fechaSal = $fila['fechaSal'];
                    $cantSal = $fila['cantidad'];
                    $precioVenta = $fila['precio'];
                    $idModoPago = $fila['formaPago'];

                    $this->modeloSalProducto->registroSalProducto($codProducto, $numIdentCliente, $fechaSal, $cantSal, $precioVenta, $idModoPago);

                }

                //Respuesta al cliente Proceso exitoso
                echo json_encode(['success' => true, 'message' => 'Registro de salida productos correctamente']);

        }else{
            //mejorar respuesta cuando no envien todos lod datos requeridos
            echo "Faltan datos necesarios";
            exit;
        }

    }


}

?>