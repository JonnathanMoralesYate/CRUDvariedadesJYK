<?php

require_once('./models/modeloPresentacion.php');
require_once('./config/conexionBDJYK.php');

class ControladorPresentacion{

    private $db;
    private $modeloPresentacion;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloPresentacion= new ModeloPresentacion($this->db);
    }


    //Lista de 
    public function listaPresentacion() {
        return $this->modeloPresentacion->consultGenPresentacion();
    }


}


?>