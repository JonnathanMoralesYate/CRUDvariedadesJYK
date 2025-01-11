<?php

require_once('./models/modeloUndBase.php');
require_once('./config/conexionBDJYK.php');

class ControladorUndBase{

    private $db;
    private $modeloUndBase;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloUndBase= new ModeloUndBase($this->db);
    }


    //registro de clase
    public function RegistroUndBase() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomUndBase'];
            
            $this->modeloUndBase->registrarUndBase($nombre);
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroUndBase';
                        </script>
                        ";

            //header("Location: index.php?action=vistaAdmin");
            exit;
        }

    }


    //Lista de 
    public function listaUndBase() {
        return $this->modeloUndBase->consultGenUndBase();
    }


    //consulta de Unidad Base por ID
    public function consultUndBaseId() {
        $idUndBase= $_GET['idUndBase'] ?? '';
        return $this->modeloUndBase->consultUndBaseId($idUndBase);
    }


    //consulta de Unidad Base por nombre
    public function consultUndBaseNombre() {
        $nombre= $_GET['nomUndBase'] ?? '';
        return $this->modeloUndBase->consultUndBaseNombre($nombre);
    }


    //Actualizar Unidad Base
    public function ActualizarUndBase() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomUndBase'];
            $idUndBase= $_POST['idUndBase'];
            
            $this->modeloUndBase->actualizarUndBase($nombre, $idUndBase);
            echo "
                        <script>
                            alert('Actualizacion Exitosa!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaUndBasen';
                        </script>
                        ";
            //header("Location: index.php?action=consultaUndBasen");
            exit;
        }

    }


    //Eliminar Unidad Base
    public function EliminarUndBase() {
        $idUndBase = $_GET['idUndBase'] ?? '';
        $this->modeloUndBase->eliminarUndBase($idUndBase);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaUndBasen';
            </script>
            ";
            //header("Location: index.php?action=consultaUndBasen");
            exit;
    }


}


?>