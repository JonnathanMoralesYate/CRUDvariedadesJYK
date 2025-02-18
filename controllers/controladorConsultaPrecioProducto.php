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




        //Obtiene Precio del producto 
        public function valorProducto() {
            $codigoBarras = $_GET['codigo'] ?? '';

            $datos = $this->modeloProducto->ProductoCodigo($codigoBarras);

            // Establecer el encabezado de tipo JSON
            header('Content-Type: application/json');

            // Verificar si se encontro un producto
            if ($datos !== null) {

                // Devuelve el precio en formato JSON para el front-end
                echo json_encode(['Precio Producto' => $datos]);

            } else {

                // Si no se encuentran producto, enviar un mensaje de error
                echo json_encode(['error' => 'Producto no encontrado']);
            }
        }

}

?>