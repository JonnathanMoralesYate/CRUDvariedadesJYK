<?php

class ModeloUndBase{

    private $conn;
    private $table= "unidad_base";

    public function __construct($db) {
        $this->conn=$db;
    }

    //Registro unidad base
    public function registrarUndBase($nombre) {
        $query= "INSERT INTO ".$this->table." (UndBase) VALUES(?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nombre]);
    }


    //Consulta general tabla Unidad Base
    public function consultGenUndBase() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta unidad base por ID
    public function consultUndBaseId($idUndBase) {
        $query= "SELECT * FROM ".$this->table." WHERE idUndBase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idUndBase]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta unidad base por Nombre
    public function consultUndBaseNombre($nombre) {
        $query= "SELECT * FROM ".$this->table." WHERE UndBase LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$nombre. '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Actualizar unidad base
    public function actualizarUndBase($nombre, $idUndBase) {
        $query= "UPDATE ".$this->table." SET UndBase=? WHERE idUndBase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nombre, $idUndBase]);
    }


    //Eliminar unidad base
    public function eliminarUndBase($idUndBase) {
        $query= "DELETE FROM ".$this->table." WHERE idUndBase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idUndBase]);
    }

}

?>