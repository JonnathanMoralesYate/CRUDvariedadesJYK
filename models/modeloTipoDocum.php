<?php

class ModeloTipoDocum{

    private $conn;
    private $table= "tipo_documento";

    public function __construct($db) {
        $this->conn=$db;
    }


    //Consulta general tipo documento
    public function consultGenTipoDocum() {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}




?>