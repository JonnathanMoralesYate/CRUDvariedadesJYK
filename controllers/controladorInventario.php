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


    // Consulta para verificar si el stock disponible del producto en BD
    public function disponibilidadProducto() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // Leer JSON desde la solicitud
            $inputJSON = file_get_contents("php://input");

            $input = json_decode($inputJSON, true);
    
            if (!isset($input['idProducto']) || empty($input['idProducto'])) {
                echo json_encode(['error' => 'El ID producto es requerido']);
                exit;
            }
    
            $idProducto = $input['idProducto'];
    
            $stock = $this->modeloInventario->consultaInventario($idProducto);
    
            if ($stock) {
                echo json_encode(["success" => true, "stock" => $stock]);
            } else {
                echo json_encode(["success" => false, "error" => "Producto No esta en Inventario o no hay stock"]);
            }
        } else {
            echo json_encode(['error' => 'Método no permitido']);
        }
    }


}

?>