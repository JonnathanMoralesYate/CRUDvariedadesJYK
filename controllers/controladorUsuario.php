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

    public function registroUsua() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $numDocumento= $_POST['documUsu'];
            $nombre= $_POST['nomUsu'];
            $apellido= $_POST['apellUsu'];
            $numCelular= $_POST['numCel'];
            $correoE= $_POST['correoUsu'];
            $rol= $_POST['seleccionRol'];
            $usuario= $_POST['usuario'];
            $clave= $_POST['contraseña'];
            
            $this->modeloUsuario->registroUsuario($numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $clave);
            header("Location: index.php?action=login");
        }

    }


}

?>