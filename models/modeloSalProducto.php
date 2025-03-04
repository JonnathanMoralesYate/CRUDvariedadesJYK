<?php

class ModeloSalProducto{

    private $conn;
    private $table= "salida_productos";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registrar Salida Productos
    public function registroSalProducto($idProducto, $idCliente, $fechaSal, $cantSal, $precioVenta, $idModoPago) {
        //var_dump($precioVenta);
        //exit();  // Detiene la ejecución
        // die();  // Hace lo mismo que exit()
        // sleep(5);  // Espera 5 segundos antes de continuar
        // echo "<script>alert('Precio Venta Entero: $precioVentaEntero');</script>";
        $query = "INSERT INTO ".$this->table." (idProducto, idCliente, FechaSalida, CantSalida, PrecioVenta, idModoPago ) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $idCliente, $fechaSal, $cantSal, $precioVenta, $idModoPago]);
    }


//Consulta para actualizar tabla salida Productos
    public function consultaSalProductoId($idSalProducto) {
        $query = "SELECT idSalProducto, productos.CodProducto, clientes.NumIdentificacion, FechaSalida, CantSalida, salida_productos.PrecioVenta, modo_pago.ModoPago FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto=productos.idProducto INNER JOIN clientes ON salida_productos.idCliente=clientes.idCliente INNER JOIN modo_pago ON salida_productos.idModoPago=modo_pago.idModoPago WHERE idSalProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idSalProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta para actualizar tabla salida Productos
    public function consultaSalProductoIdP($idSalProducto) {
        $query = "SELECT idSalProducto, productos.CodProducto, clientes.NumIdentificacion, FechaSalida, CantSalida, salida_productos.PrecioVenta, idModoPago FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto=productos.idProducto INNER JOIN clientes ON salida_productos.idCliente=clientes.idCliente WHERE idSalProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idSalProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta para verificar cantidad salida al actualizar tabla salida Productos
    public function consultaCantidadSalProductos($idSalProducto) {
        $query = "SELECT idProducto, idCliente, CantSalida, PrecioVenta FROM ".$this->table." WHERE idSalProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idSalProducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


//Consulta general tabla Salida Productos INNER JOIN
    public function consultaGenSalProductosVista() {
        $query = "SELECT idSalProducto, FechaSalida, clientes.NumIdentificacion, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', salida_productos.PrecioVenta, CantSalida, modo_pago.ModoPago FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto=productos.idProducto INNER JOIN clientes ON salida_productos.idCliente=clientes.idCliente INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase INNER JOIN modo_pago ON salida_productos.idModoPago=modo_pago.idModoPago";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta por Id Salida Productos INNER JOIN
    public function consultaGenSalProductosVistaId($idSalProducto) {
        $query = "SELECT idSalProducto, FechaSalida, clientes.NumIdentificacion, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', salida_productos.PrecioVenta, CantSalida, modo_pago.ModoPago FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto=productos.idProducto INNER JOIN clientes ON salida_productos.idCliente=clientes.idCliente INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase INNER JOIN modo_pago ON salida_productos.idModoPago=modo_pago.idModoPago WHERE idSalProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idSalProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta por Id Salida Productos INNER JOIN
    public function consultaGenSalProductosVistaFecha($fecha) {
        $query = "SELECT idSalProducto, FechaSalida, clientes.NumIdentificacion, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', salida_productos.PrecioVenta, CantSalida, modo_pago.ModoPago FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto=productos.idProducto INNER JOIN clientes ON salida_productos.idCliente=clientes.idCliente INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase INNER JOIN modo_pago ON salida_productos.idModoPago=modo_pago.idModoPago WHERE DATE(FechaSalida) LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$fecha.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Actualizar Entrada Productos
    public function actualizarSalProducto($idProducto, $idCliente, $fechaSal, $cantSal, $precioVentaEntero, $idModoPago, $idSalProducto) {
        $query = "UPDATE ".$this->table." SET idProducto=?, idCliente=?, FechaSalida=?, CantSalida=?, PrecioVenta=?, idModoPago=? WHERE idSalProducto=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $idCliente, $fechaSal, $cantSal, $precioVentaEntero, $idModoPago, $idSalProducto]);
    }


//Eliminar Registro de tabla Entrada Productos
    public function eliminarSalProductos($idSalProducto) {
        $query = "DELETE FROM ".$this->table." WHERE idSalProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idSalProducto]);
    }


//Consulta para generar informe de salida de productos
    public function reporteSalProductos($fechaInc, $fechaFin) {
        $query = "SELECT idSalProducto, FechaSalida, clientes.NumIdentificacion, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', CantSalida, salida_productos.PrecioVenta FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto=productos.idProducto INNER JOIN clientes ON salida_productos.idCliente=clientes.idCliente INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase WHERE DATE(FechaSalida) BETWEEN ? AND ? ORDER BY FechaSalida DESC";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$fechaInc, $fechaFin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta para ver los productos mas vendidos 
    public function productosMasVendidos() {
        //echo "<script>alert('Modelo salida producto');</script>";
        $query = "SELECT CONCAT(productos.Nombre, ' ', productos.Marca) AS 'Producto', SUM(salida_productos.CantSalida) AS totalVendido FROM ".$this->table." INNER JOIN productos ON salida_productos.idProducto = productos.idProducto GROUP BY productos.idProducto, productos.Nombre, productos.Descripcion ORDER BY totalVendido DESC LIMIT 10";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta para ver las ventas por dias
    public function ventasPorDias() {
        $query = "SELECT DATE(FechaSalida) AS Fecha, SUM(precioVenta) AS TotalVendido FROM ".$this->table." GROUP BY Fecha ORDER BY Fecha DESC limit 8";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>