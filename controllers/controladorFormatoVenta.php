<?php

require_once('./models/modeloFormatoVenta.php');
require_once('./config/conexionBDJYK.php');

class ControladorFormatoVenta{

    private $db;
    private $modeloFormatoVenta;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloFormatoVenta= new ModeloFormatoVenta($this->db);
    }


    //registro de Formato Venta
    public function RegistroFormatoVenta() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomFormatoVenta'];
            
            $this->modeloFormatoVenta->registrarFormatoVenta($nombre);
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroFormatoVenta';
                        </script>
                        ";

            //header("Location: index.php?action=registroFormatoVenta");
            exit;
        }

    }


    //Lista de Formato Venta
    public function listaFormatoVenta() {
        return $this->modeloFormatoVenta->consultGenFormatoVenta();
    }


    //consulta de Formato Venta por ID
    public function ConsultFormatoVentaId() {
        $idFormatoVenta= $_GET['idFormatoVenta'] ?? '';
        return $this->modeloFormatoVenta->consultFormatoVentaId($idFormatoVenta);
    }


    //consulta de Formato Venta por nombre
    public function ConsultFormatoVentaNombre() {
        $nombre= $_GET['nomFormatoVenta'] ?? '';
        return $this->modeloFormatoVenta->consultFormatoVentaNombre($nombre);
    }


    //Actualizar Formato Venta
    public function ActualizarFormatoVenta() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomFormatoVenta'];
            $idFormatoVenta= $_POST['idFormatoVenta'];
        
            $this->modeloFormatoVenta->actualizarFormatoVenta($nombre, $idFormatoVenta);
        
                echo "
                    <script>
                        alert('Actualizacion Exitosa!');
                        window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaFormatoVenta';
                    </script>
                    ";
                //header("Location: index.php?action=consultaFormatoVenta");
                exit;
        }

    }


    //Eliminar Formato Venta
    public function EliminarFormatoVenta() {
        $idFormatoVenta = $_GET['idFormatoVenta'] ?? '';
        $this->modeloFormatoVenta->eliminarPresentacion($idFormatoVenta);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaFormatoVenta';
            </script>
            ";
            //header("Location: index.php?action=consultaFormatoVenta");
            exit;
    }
}


?>