<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configurar cabeceras para aceptar solicitudes JSON
header('Content-Type: application/json');

// Permite el acceso desde cualquier origen (CORS)
header('Access-Control-Allow-Origin: *');

// Obtener los datos JSON enviados
$data = json_decode(file_get_contents('php://input'), true);

// Conéctate a la base de datos (asegúrate de tener tus credenciales correctas)
$mysqli = new mysqli("localhost", "root", "", "jykbd1");

// Verifica la conexión
if ($mysqli->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $mysqli->connect_error]));
}

// Preparar y ejecutar la inserción de cada fila
foreach ($data as $fila) {

    $codProducto = $fila['codigo'];
    $numIdentCliente = $fila['cliente'];
    $fechaSal = $fila['fechaSal'];
    $cantSal = $fila['cantidad'];
    $precioVenta = $fila['total'];
    $idModoPago = $fila['formaPago'];

    // Escapar los valores para prevenir inyección SQL
    $codProducto = $mysqli->real_escape_string($codProducto);
    $numIdentCliente = $mysqli->real_escape_string($numIdentcliente);
    $fechaSal = $mysqli->real_escape_string($fechaSal);
    $cantSal = $mysqli->real_escape_string($cantSal);
    $precioVenta = $mysqli->real_escape_string($precioVenta);
    $idModoPago = $mysqli->real_escape_string($idModoPago);

    // La consulta debería insertarse en la tabla correcta, no en 'usuarios'
    // Asegúrate de usar la tabla y campos correctos
    $sql =  $query = "INSERT INTO salida_productos (idProducto, idCliente, FechaSalida, CantSalida, PrecioVenta, idModoPago)
                    VALUES(VALUES ('$codProducto', '$numIdentCliente', '$fechaSal', '$cantSal', '$precioVenta', '$idModoPago')";

    // Ejecutar la consulta
    if ($mysqli->query($sql) !== TRUE) {
        echo json_encode(['success' => false, 'error' => 'Error al insertar datos: ' . $mysqli->error]);
        exit;
    }
}

// Cerrar la conexión a la base de datos
$mysqli->close();

// Devolver una respuesta al cliente
echo json_encode(['success' => true, 'message' => 'Datos procesados correctamente']);
?>