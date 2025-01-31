<?php

    // Configurar cabeceras para aceptar solicitudes JSON
    header('Content-Type: application/json');

    // Permite el acceso desde cualquier origen (CORS)
    header('Access-Control-Allow-Origin: *');

    // Obtener los datos JSON enviados
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica si los datos se han recibido correctamente
    if (!isset($data['idCliente']) || !isset($data['precio'])) {

        // Conéctate a la base de datos (asegúrate de tener tus credenciales correctas)
    $mysqli = new mysqli("localhost", "root", "", "jykbd1");

    // Verifica la conexión
    if ($mysqli->connect_error) {
        die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $mysqli->connect_error]));
    }

    // Preparar y ejecutar la inserción de cada fila
    foreach ($data as $fila) {

        $idCliente = $fila['idCliente'];
        $precioVenta = $fila['precio'];

        $puntosAcumulados = ($precioVenta*0.005);

        // Escapar los valores para prevenir inyección SQL
        $idCliente = $mysqli->real_escape_string($idCliente);
        $puntosAcumulados = $mysqli->real_escape_string($puntosAcumulados);

        //la actualización de puntos del cliente
        $sql = "UPDATE clientes SET Puntos= Puntos + ? WHERE idCliente=?";

       // Preparar la declaración
        if ($stmt = $mysqli->prepare($sql)) {

            // Vincular los parámetros (i = integer, s = string)
            $stmt->bind_param('ii', $puntosAcumulados, $idCliente);  

            // Ejecutar la consulta
            if ($stmt->execute()) {

            } else {

                echo json_encode(['success' => false, 'error' => 'Error al actualizar puntos del cliente: ' . $stmt->error]);

            }

    } else {

        //mejorar respuesta cuando no envien todos lod datos requeridos
        echo json_encode(['success' => false, 'error' => 'Consulta no ejecutada']);

    }

    }

    // Cerrar la declaración
    $stmt->close();

    //respuesta al cliente Proceso de actualizacion
    echo json_encode(['success' => true, 'message' => 'Puntos actualizados del Cliente']);

    }else{

        //mejorar respuesta cuando no envien todos lod datos requeridos
        echo json_encode(['success' => false, 'error' => 'Datos No recibidos']);

    }

    ?>