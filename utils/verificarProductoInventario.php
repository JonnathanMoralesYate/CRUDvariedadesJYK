<?php

        // Establecer la cabecera para indicar que la respuesta será en formato JSON
        header('Content-Type: application/json');

        // Verifica si se recibió el idProducto
        if (isset($_POST['idProducto'])) {

        $idProduc = $_POST['idProducto'];

         //imprimir en consola en php
        //print('id recibido: ' . $_POST['idProducto']);

        // Conéctate a la base de datos (asegúrate de tener tus credenciales correctas)
        $mysqli = new mysqli("localhost", "root", "", "jykbd1");

        // Verifica la conexión
        if ($mysqli->connect_error) {
            die(json_encode(['success' => false, 'error' => 'Error de conexión: ' . $mysqli->connect_error]));
        }

        // Realiza la consulta para verificar si hay producto en inventario para poder realizar la venta
        $query= "SELECT CantActual FROM inventario WHERE idProducto=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $idProduc); // 'i' para int
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si se encontró el producto
        if ($result->num_rows > 0) {
            $stock = $result->fetch_assoc();
            echo json_encode(['success' => true, 'stock' => $stock]);

        } else {
            echo json_encode(['success' => false, 'error' => 'Producto sin registrar en inventario']);
        }

        // Cierra la conexión
        $stmt->close();
        $mysqli->close();

        } else {
            echo json_encode(['success' => false, 'error' => 'Id del producto no recibido']);
        }


        //echo json_encode(['success' => true, 'stock' => $stock]);

        //El valor de cantidadActual en la respuesta es un objeto de la forma:

        //json que envia
        //{
        //"success": true,
        //"stock": {
        //"CantActual": 50
        //}

?>