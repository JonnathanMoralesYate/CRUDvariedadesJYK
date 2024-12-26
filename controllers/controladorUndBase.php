<?php

require_once('./models/modeloUndBase.php');
require_once('./config/conexionBDJYK.php');

class ControladorUndBase{

    private $db;
    private $modeloUndBase;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloUndBase= new ModeloUndBase($this->db);
    }


    //Lista de 
    public function listaUndBase() {
        return $this->modeloUndBase->consultGenUndBase();
    }


}


?>