<?php

require_once('./models/modeloPresentacion.php');
require_once('./config/conexionBDJYK.php');

class ControladorPresentacion{

    private $db;
    private $modeloPresentacion;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloPresentacion= new ModeloPresentacion($this->db);
    }


    //registro de presentacion
    public function RegistroPresentacion() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomPresentacion'];
            
            $this->modeloPresentacion->registrarPresentacion($nombre);
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=vistaAdmin';
                        </script>
                        ";

            //header("Location: index.php?action=vistaAdmin");
            exit;
        }

    }


    //Lista de presentacion
    public function listaPresentacion() {
        return $this->modeloPresentacion->consultGenPresentacion();
    }


    //consulta de presentacion por ID
    public function ConsultPresentacionId() {
        $idPresentacion= $_GET['idPresentacion'] ?? '';
        return $this->modeloPresentacion->consultPresentacionId($idPresentacion);
    }


    //consulta de presentacion por nombre
    public function ConsultPresentacionNombre() {
        $nombre= $_GET['nomPresentacion'] ?? '';
        return $this->modeloPresentacion->consultPresentacionNombre($nombre);
    }


    //Actualizar presentacion
    public function ActualizarPresentacion() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomPresentacion'];
            $idPresentacion= $_POST['idPresentacion'];
        
            $this->modeloPresentacion->actualizarPresentacion($nombre, $idPresentacion);
        
                echo "
                    <script>
                        alert('Actualizacion Exitosa!');
                        window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=vistaAdmin';
                    </script>
                    ";

            //header("Location: index.php?action=vistaAdmin");
            exit;
        }

    }


    //Eliminar presentacion
    public function EliminarPresentacion() {
        $idPresentacion = $_GET['idPresentacion'] ?? '';
        $this->modeloPresentacion->eliminarPresentacion($idPresentacion);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=vistaAdmin';
            </script>
            ";
            exit;
    }


}


?>