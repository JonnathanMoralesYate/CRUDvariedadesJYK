<?php

class ModeloUndBase{

    private $conn;
    private $table= "unidad_base";

    public function __construct($db) {
        $this->conn=$db;
    }


    //Consulta general tabla Unidad Base
    public function consultGenUndBase() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>