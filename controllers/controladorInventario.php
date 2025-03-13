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

            header("Content-Type: application/json; charset=UTF-8");
    
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


    //Metodo para actualizar inventario del formulario de salida de productos pór varios productos
    public function actualizarInventario() {

        // Configurar cabeceras para aceptar solicitudes JSON
        header('Content-Type: application/json');

        // Permite el acceso desde cualquier origen (CORS)
        header('Access-Control-Allow-Origin: *');

        // Obtener los datos JSON enviados
        $data = json_decode(file_get_contents('php://input'), true);

        // Verifica si los datos se han recibido correctamente
        if (!isset($data['idProducto']) || !isset($data['cantidad'])) {

            // Preparar y ejecutar la inserción de cada fila
            foreach ($data as $fila) {

                $idProducto = $fila['idProducto'];
                $cantSal = $fila['cantidad'];

                $this->modeloInventario->stockActualizado($cantSal, $idProducto);

            }
            //respuesta al cliente Proceso de actualizacion
            echo json_encode(['success' => true, 'message' => 'Datos actualizados en inventario correctamente']);

        }else{
            //mejorar respuesta cuando no envien todos los datos requeridos
            echo json_encode(['success' => false, 'error' => 'Datos No recibidos']);
        }
    }


    //Metodo para traer datos de productos con menor stock
    public function ProductosMenorStock() {

        header("Content-Type: application/json; charset=UTF-8");

            $menorStock = $this->modeloInventario->productosMenorStock();

            if ($menorStock) {
                echo json_encode(["success" => true, "menorStock" => $menorStock]);
            } else {
                echo json_encode(["success" => false, "error" => "Producto No esta en Inventario o no hay stock"]);
            }
    }

    //Reporte de invenario productos agotados
    public function ProductoSinStock() {
        return $this->modeloInventario->productoSinStock();
    }

//===================================================================================================================================

//Reporte de Inventario
public function inventarioActualEmp() {
    return $this->modeloInventario->inventarioActualizado();
}


//Reporte de Productos Proximos a Vencer
public function ProductosAvencerEmp() {
    return $this->modeloInventario->productosAvencer();
}


// Consulta para verificar si el stock disponible del producto en BD
public function disponibilidadProductoEmp() {

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

    //Metodo para traer datos de productos con menor stock
    public function ProductosMenorStockEmp() {

        header("Content-Type: application/json; charset=UTF-8");

            $menorStock = $this->modeloInventario->productosMenorStock();

            if ($menorStock) {
                echo json_encode(["success" => true, "menorStock" => $menorStock]);
            } else {
                echo json_encode(["success" => false, "error" => "Producto No esta en Inventario o no hay stock"]);
            }
    }

    //Reporte de invenario productos agotados
    public function ProductoSinStockEmp() {
        return $this->modeloInventario->productoSinStock();
    }



    //Metodo para traer datos de productos con menor stock
    public function ProductosProximosAvencer() {

        header("Content-Type: application/json;");

            $proximosAvencer = $this->modeloInventario->productosProximosAvencer();

            if ($proximosAvencer) {
                echo json_encode(["success" => true, "proximosAvencer" => $proximosAvencer]);
            } else {
                echo json_encode(["success" => false, "error" => "No Hay Productos Proximos a Vencer"]);
            }

            exit; // Asegura que no se envíen datos adicionales
    }


}

?>