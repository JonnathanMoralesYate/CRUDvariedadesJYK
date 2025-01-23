<?php

require_once('./models/modeloInventario.php');
require_once('./config/conexionBDJYK.php');

class ControladorInventario{

    private $db;
    private $modeloInventario;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloInventario= new ModeloInventario($this->db);
    }


    //Reporte de Inventario
    public function inventarioActual() {
        return $this->modeloInventario->inventarioActualizado();
    }


    //Reporte de Productos Proximos a Vencer
    public function ProductosAvencer() {
        return $this->modeloInventario->productosAvencer();
    }



}

?>