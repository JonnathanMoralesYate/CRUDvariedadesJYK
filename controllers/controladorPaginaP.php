<?php

require_once('./models/modeloClases.php');
require_once('./models/modeloProducto.php');
require_once('./config/conexionBDJYK.php');

class ControladorPaginaP {

    private $db;
    private $modeloClase;
    private $modeloProducto;


    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloClase= new ModeloClases($this->db);
        $this->modeloProducto= new ModeloProducto($this->db);

    }

    public function index() {

        $idClase = htmlspecialchars($_GET['clase'] ?? '0', ENT_QUOTES, 'UTF-8');

        $clases = $this->modeloClase->consultGenClases();
        $productos= $this->modeloProducto->darProductosPorClase($idClase);

        include ('./views/paginasWeb/paginaPrincipal.php');

    }
}

?>