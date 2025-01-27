<?php

require_once('./models/modeloProducto.php');
require_once('./config/conexionBDJYK.php');

class ControladorConsultaPrecioProducto{

    private $db;
    private $modeloProducto;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloProducto= new ModeloProducto($this->db);
    }



        //Obtiene datos del producto 
    public function datosProductos() {
        $codigoBarras = $_GET['codProducto'] ?? '';

        $datos = $this->modeloProducto->consultaProductoCodigo($codigoBarras);

        // Establecer el encabezado de tipo JSON
        header('Content-Type: application/json');

        // Verificar si se encontro un producto
        if ($datos) {
            echo json_encode($datos);
        } else {
            // Si no se encuentran producto, enviar un mensaje de error
            echo json_encode(['error' => 'Producto no encontrado']);
        }
    }

}

?>