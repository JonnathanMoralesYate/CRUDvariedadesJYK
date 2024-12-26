<?php

class ModeloPresentacion{

    private $conn;
    private $table= "presentacion_producto";

    public function __construct($db) {
        $this->conn=$db;
    }


    //Consulta general tabla presentacion Productos
    public function consultGenPresentacion() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>