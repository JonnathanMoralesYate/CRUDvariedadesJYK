<?php

    //verificar si esta ejecutando archivo
    //echo json_encode(['success' => false, 'error' => 'Test de PHP']);
    //exit;

        // Establecer la cabecera para indicar que la respuesta será en formato JSON
        header('Content-Type: application/json');

        // Verifica si se recibió el código de barras
        if (isset($_POST['idConsecutivo'])) {

        $idConsecutivo = $_POST['idConsecutivo'];

        //imprimir en consola en php
        //print('Código recibido: ' . $_POST['codigo_barras']);

        // Conéctate a la base de datos (asegúrate de tener tus credenciales correctas)
        $mysqli = new mysqli("localhost", "root", "", "jykbd1");

        // Verifica la conexión
        if ($mysqli->connect_error) {
            die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $mysqli->connect_error]));
        }

        // Realiza la consulta para obtener los datos del producto por el código de barras
        $query= "SELECT CodigoBarra FROM codigos_barras WHERE idCodigoBarra=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $idConsecutivo); 
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si se encontró el producto
        if ($result->num_rows > 0) {
            $consecutivo = $result->fetch_assoc();
            echo json_encode(['success' => true, 'consecutivo' => $consecutivo]);

        } else {
            echo json_encode(['success' => false, 'error' => 'Consecutivo no encontrado']);
        }

        // Cierra la conexión
        $stmt->close();
        $mysqli->close();

        } else {
            echo json_encode(['success' => false, 'error' => 'Id de Código de barras no recibido']);
        }


        //valor devuelto si es true 
        //{
        //"success": true,
        //"consecutivo": {
        //"CodigoBarras": "valor_del_codigo_barras"
        //}

?>