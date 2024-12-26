<?php

class ModeloClases{

    private $conn;
    private $table= "clase_producto";

    public function __construct($db) {
        $this->conn=$db;
    }


    //Consulta general tabla clase Productos
    public function consultGenClases() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>