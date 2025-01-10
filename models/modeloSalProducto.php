<?php

class ModeloSalProducto{

    private $conn;
    private $table= "salida_productos";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registrar Salida Productos
public function registroSalProducto($idProducto, $idCliente, $fechaSal, $cantSal, $precioVenta) {
    $query = "INSERT INTO ".$this->table." (idProducto, idCliente, FechaSalida, CantSalida, PrecioVenta ) VALUES(?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$idProducto, $idCliente, $fechaSal, $cantSal, $precioVenta]);
}


}



?>