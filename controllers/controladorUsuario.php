<?php

require_once('./models/modeloUsuario.php');
require_once('./config/conexionBDJYK.php');

class ControladorUsuario{

    private $db;
    private $modeloUsuario;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloUsuario= new ModeloUsuario($this->db);

    }


    //registro de usuarios
    public function registroUsua() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTipoDocum= $_POST['tipoDocum'];
            $numDocumento= $_POST['documUsu'];
            $nombre= $_POST['nomUsu'];
            $apellido= $_POST['apellUsu'];
            $numCelular= $_POST['numCel'];
            $correoE= $_POST['correoUsu'];
            $rol= $_POST['seleccionRol'];
            $usuario= $_POST['usuario'];
            $clave= $_POST['contraseña'];

            $claveSegura= password_hash($clave, PASSWORD_BCRYPT);
            
            $this->modeloUsuario->registroUsuario($idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura);
            
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


    //Consulta general de usuarios
    public function listaUsuarios() {
        return $this->modeloUsuario->consultGenUsua();
    }
    

    //Consulta general de usuarios vista
    public function listaUsuariosVista() {
        return $this->modeloUsuario->consultGenUsuaVista();
    }

    //Consulta por parametro id usuario
    public function datosUsuaPorId() {
        $idUsua = $_GET['idUsuario'] ?? '';
        return $this->modeloUsuario->consultGenUsuaVistaId($idUsua);
    }


    //Consulta por parametro nombre
    public function datosUsuaPorNombre() {
        $nombre = $_GET['nombre'] ?? '';
        return $this->modeloUsuario->consultGenUsuaVistaNombre($nombre);
    }


    //Actualizar usuario
    public function actualizarUsuario() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idUsua= $_POST['idUsuario'];
            $numDocumento= $_POST['documUsu'];
            $nombre= $_POST['nomUsu'];
            $apellido= $_POST['apellUsu'];
            $numCelular= $_POST['numCel'];
            $correoE= $_POST['correoUsu'];
            $rol= $_POST['seleccionRol'];
            $usuario= $_POST['usuario'];
            $clave= $_POST['contraseña'];
            
            $this->modeloUsuario->registroUsuario($numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $clave, $idUsua);
            header("Location: index.php?action=");
        }
    }


    //Eliminar usuario
    public function eliminarUsuario() {
        $idUsua = $_GET['idUsuario'] ?? '';
        $this->modeloUsuario->eliminarUsua($idUsua);
    }


}

?>