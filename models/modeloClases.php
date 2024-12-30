<?php

class ModeloClases{

    private $conn;
    private $table= "clase_producto";

    public function __construct($db) {
        $this->conn=$db;
    }

    //Registrar clase
    public function registrarClases($nombre) {
        $query= "INSERT INTO ".$this->table." (Clase) VALUES(?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nombre]);
    }


    //Consulta general tabla clase Productos
    public function consultGenClases() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta clase por ID
    public function consultClaseId($idClase) {
        $query= "SELECT * FROM ".$this->table." WHERE idClase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idClase]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta clase por Nombre
    public function consultClaseNombre($nombre) {
        $query= "SELECT * FROM ".$this->table." WHERE Clase LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$nombre. '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Actualizar clase
    public function actualizarClase($nombre, $idClase) {
        $query= "UPDATE ".$this->table." SET Clase=? WHERE idClase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nombre, $idClase]);
    }


    //Eliminar clase
    public function eliminarClase($idClase) {
        $query= "DELETE FROM ".$this->table." WHERE idClase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idClase]);
    }

}

?>