<?php

class ModeloCliente{

    private $conn;
    private $table= "clientes";

    public function __construct($db) {
        $this->conn=$db;
    }

    //Registro de Cliente
    public function registroCliente($idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos) {
        $query= "INSERT INTO ".$this->table." (idTipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, Puntos) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt=$this->conn->prepare($query);
        $stmt->execute([$idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos]);
    }


    //Consulta general Cliente
    public function consultGenClienteId($idCliente) {
        $query = "SELECT * FROM ".$this->table." WHERE idCliente=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idCliente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //consulta general con inner join 
    public function consultGenClienteVista() {
        $query = "SELECT idCliente, tipo_documento.tipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, Puntos FROM ".$this->table." INNER JOIN tipo_documento ON clientes.idTipoDocum = tipo_documento.idTipoDocum";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //consulta general con inner join por numero de cedula
    public function consultGenClienteCedula($numCedulaCliente) {
        $query = "SELECT idCliente, tipo_documento.tipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, Puntos FROM ".$this->table." INNER JOIN tipo_documento ON clientes.idTipoDocum = tipo_documento.idTipoDocum WHERE NumIdentificacion=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$numCedulaCliente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //consulta general con inner join por nombre
    public function consultGenClienteNombre($nombre) {
        $query = "SELECT idCliente, tipo_documento.tipoDocum, NumIdentificacion, Nombres, Apellidos, NumCelular, Email, Puntos FROM ".$this->table." INNER JOIN tipo_documento ON clientes.idTipoDocum = tipo_documento.idTipoDocum WHERE Nombres LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['%'.$nombre.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Actualizar Cliente
    public function actualizarCliente($idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos, $idCliente) {
        $query = "UPDATE ".$this->table." SET idTipoDocum=?, NumIdentificacion=?, Nombres=?, Apellidos=?, NumCelular=?, Email=?, Puntos=? WHERE idCliente=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos, $idCliente]);
    }


//Eliminar Cliente
    public function eliminarCliente($idCliente) {
        $query = "DELETE FROM ".$this->table." WHERE idCliente=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idCliente]);    
    }


    //Consulta Cliente por Numero de Identintidad
    public function consultaCliente($numIdentcliente) {
        $query= "SELECT idCliente FROM ".$this->table." WHERE NumIdentificacion=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$numIdentcliente]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //Consulta los Puntos del cliente
    public function consultaPuntos($idCliente) {
        $query= "SELECT Puntos FROM ".$this->table." WHERE idCliente=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idCliente]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //Actualiza los Puntos del cliente en formulario de actualizar cliente y salida de producto por un solo producto
    public function actualizaPuntos($puntosAct, $idCliente) {
        $query = "UPDATE ".$this->table." SET Puntos=? WHERE idCliente=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$puntosAct, $idCliente]);
    }

    //Actualizar los puntos del cliente del formulario de salida de productos pór varios productos
    public function puntosActualizados($puntosAcumulados, $idCliente) {
        $query = "UPDATE clientes SET Puntos= Puntos + ? WHERE idCliente=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$puntosAcumulados, $idCliente]);
    }

}



?>