<?php

require_once('./models/modeloClases.php');
require_once('./config/conexionBDJYK.php');

class ControladorClases{

    private $db;
    private $modeloClases;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloClases= new ModeloClases($this->db);
    }


    //Lista de
    public function listaClases() {
        return $this->modeloClases->consultGenClases();
    }


}


?>