<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Configurar cabeceras para aceptar solicitudes JSON
    header('Content-Type: application/json');

    // Permite el acceso desde cualquier origen (CORS)
    header('Access-Control-Allow-Origin: *');

    // Obtener los datos JSON enviados
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica si los datos se han recibido correctamente
    if (!isset($data['idProducto']) || !isset($data['idCliente']) || !isset($data['fechaSal']) || !isset($data['cantidad']) || !isset($data['precio']) || !isset($data['formaPago'])) {

        // Conéctate a la base de datos (asegúrate de tener tus credenciales correctas)
    $mysqli = new mysqli("localhost", "root", "", "jykbd1");

    // Verifica la conexión
    if ($mysqli->connect_error) {
        die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $mysqli->connect_error]));
    }

    // Preparar y ejecutar la inserción de cada fila
    foreach ($data as $fila) {

        $codProducto = $fila['idProducto'];
        $numIdentCliente = $fila['idCliente'];
        $fechaSal = $fila['fechaSal'];
        $cantSal = $fila['cantidad'];
        $precioVenta = $fila['precio'];
        $idModoPago = $fila['formaPago'];

        // Escapar los valores para prevenir inyección SQL
        $codProducto = $mysqli->real_escape_string($codProducto);
        //asegura que si $numIdentCliente es null, lo convierte en una cadena vacía antes de pasarlo a real_escape_string.
        $numIdentCliente = $numIdentCliente ? $mysqli->real_escape_string($numIdentCliente) : '';
        $fechaSal = $mysqli->real_escape_string($fechaSal);
        $cantSal = $mysqli->real_escape_string($cantSal);
        $precioVenta = $mysqli->real_escape_string($precioVenta);
        $idModoPago = $mysqli->real_escape_string($idModoPago);

        
        $sql = "INSERT INTO salida_productos (idProducto, idCliente, FechaSalida, CantSalida, PrecioVenta, idModoPago)
                    VALUES($codProducto, $numIdentCliente, '$fechaSal', $cantSal, $precioVenta, $idModoPago)";

        // Ejecutar la consulta
        if ($mysqli->query($sql) !== TRUE) {
            echo json_encode(['success' => false, 'error' => 'Error al insertar datos: ' . $mysqli->error]);
            exit;
        }
    }

    // Cerrar la conexión a la base de datos
    $mysqli->close();

    //Respuesta al cliente Proceso exitoso
    echo json_encode(['success' => true, 'message' => 'Registro de salida productos correctamente']);

    }else{
        //mejorar respuesta cuando no envien todos lod datos requeridos
        echo "Faltan datos necesarios";
        exit;
    }

    
    ?>