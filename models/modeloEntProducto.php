<?php

class ModeloEntProducto{

    private $conn;
    private $table= "entrada_productos";

    public function __construct($db) {
        $this->conn=$db;
    }

//Registrar Entrada Productos
    public function registroEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt) {
        $query = "INSERT INTO ".$this->table." (idProducto, idProveedor, FechaEnt, FechaVencimiento, PrecioCompra, CantEnt) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt]);
    }

}

?>