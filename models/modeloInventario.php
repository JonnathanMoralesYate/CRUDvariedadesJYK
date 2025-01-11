<?php

class ModeloInventario{

    private $conn;
    private $table= "inventario";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registro de Producto en Inventario
    public function registroInventario($idProducto, $cantidadAct) {
        $query = "INSERT INTO ".$this->table." (idProducto, CantActual) VALUES(?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $cantidadAct]);
    } 


//Consulta de Producto en Inventario
    public function consultaInventarioId($idProducto) {
        $query= "SELECT * FROM ".$this->table." WHERE idProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idProducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


//Actualiza la Cantidad Actual del Producto
    public function actualizarStock($cantidadAct, $idProducto) {
        $query = "UPDATE ".$this->table." SET CantActual=? WHERE idProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$cantidadAct, $idProducto]);
    }




}

?>