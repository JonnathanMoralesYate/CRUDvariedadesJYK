<?php

class ModeloEntProducto{

    private $conn;
    private $table= "entrada_productos";

    public function __construct($db) {
        $this->conn=$db;
    }

//Registrar Entrada Productos
    public function registroEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt) {
        $query = "INSERT INTO ".$this->table." (idProducto, idProveedor, FechaEnt, FechaVencimiento, PrecioCompra, CantEnt) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt]);
    }


//Consulta para actualizar tabla Entrada Productos
    public function consultaGenEntProductos($idEntProducto) {
        $query = "SELECT idEntProducto, productos.CodProducto, proveedores.NitProveedor, FechaEnt, FechaVencimiento, PrecioCompra, CantEnt FROM ".$this->table." INNER JOIN productos ON entrada_productos.idProducto=productos.idProducto INNER JOIN proveedores ON entrada_productos.idProveedor=proveedores.idProveedor WHERE idEntProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idEntProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta para verificar cantidad entrada al actualizar tabla Entrada Productos
    public function consultaCantidadEntProductos($idEntProducto) {
        $query = "SELECT idProducto, CantEnt FROM ".$this->table." WHERE idEntProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idEntProducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


//Consulta general tabla Entrada Productos INNER JOIN
    public function consultaGenEntProductosVista() {
        $query = "SELECT idEntProducto, FechaEnt, proveedores.NombreProveedor, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', FechaVencimiento, PrecioCompra, CantEnt FROM ".$this->table." INNER JOIN productos ON entrada_productos.idProducto=productos.idProducto INNER JOIN proveedores ON entrada_productos.idProveedor=proveedores.idProveedor INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta por Id tabla Entrada Productos INNER JOIN
    public function consultaGenEntProductosVistaId($idEntProducto) {
        $query = "SELECT idEntProducto, FechaEnt, proveedores.NombreProveedor, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', FechaVencimiento, PrecioCompra, CantEnt FROM ".$this->table." INNER JOIN productos ON entrada_productos.idProducto=productos.idProducto INNER JOIN proveedores ON entrada_productos.idProveedor=proveedores.idProveedor INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase WHERE idEntProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idEntProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta por Id tabla Entrada Productos INNER JOIN
    public function consultaGenEntProductosVistaFecha($fecha) {
        $query = "SELECT idEntProducto, FechaEnt, proveedores.NombreProveedor, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', FechaVencimiento, PrecioCompra, CantEnt FROM ".$this->table." INNER JOIN productos ON entrada_productos.idProducto=productos.idProducto INNER JOIN proveedores ON entrada_productos.idProveedor=proveedores.idProveedor INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase WHERE DATE(FechaEnt) LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$fecha.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Actualizar Entrada Productos
    public function actualizarEntProducto($idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt, $idEntProducto) {
        $query = "UPDATE ".$this->table." SET idProducto=?, idProveedor=?, FechaEnt=?, FechaVencimiento=?, PrecioCompra=?, CantEnt=? WHERE idEntProducto=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $idProveedor, $fechaEnt, $fechaVencim, $precioCompra, $cantidadEnt, $idEntProducto]);
    }


//Eliminar Registro de tabla Entrada Productos
    public function eliminarEntProductos($idEntProducto) {
        $query = "DELETE FROM ".$this->table." WHERE idEntProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idEntProducto]);
    }

}

?>