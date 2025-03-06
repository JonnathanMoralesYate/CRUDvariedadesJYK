<?php

class ModeloUsuario{

    private $conn;
    private $table= "registro_usuarios";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registro de Usuario
    public function registroUsuario($idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura) {
        $query= "INSERT INTO ".$this->table." (idTipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, idRol, Usuario, Contraseña) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt=$this->conn->prepare($query);
        $stmt->execute([$idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura]);
    }


//Consulta general de la tabla
    public function consultGenUsua() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//consulta general con inner join
    public function consultGenUsuaVista() {
        $query = "SELECT idUsuario, tipo_documento.tipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, roles.Rol, Usuario, Contraseña FROM ".$this->table." INNER JOIN tipo_documento ON registro_usuarios.idTipoDocum = tipo_documento.idTipoDocum INNER JOIN roles ON registro_usuarios.idRol = roles.idRol";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta por parametro Id
    public function consultUsuaId($idUsua) {
        $query = "SELECT idUsuario, idTipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, idRol, Usuario FROM ".$this->table." WHERE idUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idUsua]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


//consulta general con inner join por Id
    public function consultGenUsuaVistaId($numIdentUsuario) {
        $query = "SELECT idUsuario, tipo_documento.tipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, roles.Rol, Usuario, Contraseña FROM ".$this->table." INNER JOIN tipo_documento ON registro_usuarios.idTipoDocum = tipo_documento.idTipoDocum INNER JOIN roles ON registro_usuarios.idRol = roles.idRol WHERE NumIdentificacion=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$numIdentUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta por parametro Nombre
    //public function consultUsuaNombre($nombre) {
        //$query = "SELECT * FROM ".$this->table." WHERE Nombres=?";
        //$stmt = $this->conn->prepare($query);
        //$stmt->execute(['%'.$nombre.'%']);
        //return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //}


//consulta general con inner join por Nombre
    public function consultGenUsuaVistaNombre($nombre) {
        $query = "SELECT idUsuario, tipo_documento.tipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, roles.Rol, Usuario, Contraseña FROM ".$this->table." INNER JOIN tipo_documento ON registro_usuarios.idTipoDocum = tipo_documento.idTipoDocum INNER JOIN roles ON registro_usuarios.idRol = roles.idRol WHERE Nombres LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['%'.$nombre.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Actualizar usuario
    public function actualizarUsua($idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura, $idUsua) {
        $query = "UPDATE ".$this->table." SET idTipoDocum=?, NumIdentificacion=?, Nombres=?, Apellidos=?, NumCelular=?, Email=?, idRol=?, Usuario=?, Contraseña=? WHERE idUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura, $idUsua]);
    }


//Eliminar usuario
    public function eliminarUsua($idUsua) {
        $query = "DELETE FROM ".$this->table." WHERE idUsuario=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idUsua]);    
    }


//Consulta por numero de identificacion
    public function consultaUsuario($numDocumU) {
        $query = "SELECT idUsuario FROM ".$this->table." WHERE NumIdentificacion=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$numDocumU]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>