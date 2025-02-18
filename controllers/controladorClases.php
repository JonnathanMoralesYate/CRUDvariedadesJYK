<?php

require_once('./models/modeloClases.php');
require_once('./config/conexionBDJYK.php');

class ControladorClases{

    private $db;
    private $modeloClases;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloClases= new ModeloClases($this->db);
    }

    //registro de clase
    public function registroClase() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomClase'];
            
            $this->modeloClases->registrarClases($nombre);

            //echo json_encode(array('Error'=>'Producto No Encontrado'));
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroClase';
                        </script>
                        ";
            //header("Location: index.php?action=registroClase");
            exit;
        }

    }


    //Lista de Clases
    public function listaClases() {
        return $this->modeloClases->consultGenClases();
    }


    //consulta de clase por ID
    public function consultClaseId() {
        $idClase= $_GET['idClase'] ?? '';
        return $this->modeloClases->consultClaseId($idClase);
    }


    //consulta de clase por nombre
    public function consultClaseNombre() {
        $nombre= $_GET['nomClase'] ?? '';
        return $this->modeloClases->consultClaseNombre($nombre);
    }


    //Actualizar clase
    public function ActualizarClase() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre= $_POST['nomClase'];
            $idClase= $_POST['idClase'];
            
            $this->modeloClases->actualizarClase($nombre, $idClase);
            
            echo "
                        <script>
                            alert('Actualizacion Exitosa!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaClase';
                        </script>
                        ";
            //header("Location: index.php?action=consultaClase");
            exit;
        }

    }


    //Eliminar Clase
    public function eliminarClase() {
        $idClase = $_GET['idClase'] ?? '';
        $this->modeloClases->eliminarClase($idClase);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaClase';
            </script>
            ";
            //header("Location: index.php?action=consultaClase");
            exit;
    }


}

?>