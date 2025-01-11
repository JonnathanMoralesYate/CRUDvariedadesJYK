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







    
}

?>