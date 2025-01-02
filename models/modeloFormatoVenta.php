<?php

class ModeloFormatoVenta{

    private $conn;
    private $table= "formato_venta";

    public function __construct($db) {
        $this->conn=$db;
    }


    //Registrar formato venta
    public function registrarFormatoVenta($nombre) {
        $query= "INSERT INTO ".$this->table." (FormatoVenta) VALUES(?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nombre]);
    }


    //Consulta general tabla formato venta 
    public function consultGenFormatoVenta() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta formato venta por ID
    public function consultFormatoVentaId($idFormatoVenta) {
        $query= "SELECT * FROM ".$this->table." WHERE idFormatoVenta=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idFormatoVenta]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta formato venta por Nombre
    public function consultFormatoVentaNombre($nombre) {
        $query= "SELECT * FROM ".$this->table." WHERE FormatoVenta LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$nombre. '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Actualizar formato venta
    public function actualizarFormatoVenta($nombre, $idFormatoVenta) {
        $query= "UPDATE ".$this->table." SET FormatoVenta=? WHERE idFormatoVenta=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nombre, $idFormatoVenta]);
    }


    //Eliminar formato venta
    public function eliminarPresentacion($idFormatoVenta) {
        $query= "DELETE FROM ".$this->table." WHERE idFormatoVenta=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idFormatoVenta]);
    }
}

?>