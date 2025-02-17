<?php

        // Establecer la cabecera para indicar que la respuesta será en formato JSON
        header('Content-Type: application/json');

        // Verifica si se recibió el código de barras
        if (isset($_POST['nit'])) {

        $nitProveedor = $_POST['nit'];

        //imprimir en consola en php
        //print('Código recibido: ' . $_POST['codigo_barras']);

        // Conéctate a la base de datos (asegúrate de tener tus credenciales correctas)
        $mysqli = new mysqli("localhost", "root", "", "jykbd1");

        // Verifica la conexión
        if ($mysqli->connect_error) {
            die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $mysqli->connect_error]));
        }

        // Realiza la consulta para obtener los datos del producto por el código de barras
        $query= "SELECT idProveedor FROM proveedores WHERE NitProveedor=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $nitProveedor); // 's' para string
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si se encontró el proveedor
        if ($result->num_rows > 0) {
            $proveedor = $result->fetch_assoc();
            echo json_encode(['success' => true, 'proveedor' => $proveedor]);

        } else {
            echo json_encode(['success' => false, 'error' => 'Proveedor no Encontrado']);
        }

        // Cierra la conexión
        $stmt->close();
        $mysqli->close();

        } else {
            echo json_encode(['success' => false, 'error' => 'Nit del Proveedor no recibido']);
        }

?>