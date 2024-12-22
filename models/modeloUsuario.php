<?php

class ModeloUsuario{

    private $conn;
    private $table= "registro_usuarios";

    public function __construct($db) {
        $this->conn=$db;
    }

//Registro de Usuario
    public function registroUsuario($numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $clave) {
        $query= "INSERT INTO ". $this->table." (NumIdentificacion, Nombres, Apellidos, NumCelular, Email, Rol, Usuario, Contraseña) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt=$this->conn->prepare($query);
        $stmt->execute([$numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $clave]);
    }

}


?>