<?php

class ModeloInventario{

    private $conn;
    private $table= "inventario";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registro de Producto en Inventario
    public function registroInventario($idProducto, $cantidadAct) {
        $query = "INSERT INTO ".$this->table." (idProducto, CantActual) VALUES(?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $cantidadAct]);
    } 


//Consulta de Producto en Inventario
    public function consultaInventarioId($idProducto) {
        $query= "SELECT * FROM ".$this->table." WHERE idProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idProducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //Consulta de Producto en Inventario con Cantidad Actual > 0
    public function consultaInventario($idProducto) {
        $query= "SELECT * FROM ".$this->table." WHERE idProducto=? AND CantActual > 0" ;
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idProducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


//Actualiza la Cantidad Actual del Producto
    public function actualizarStock($cantidadAct, $idProducto) {
        $query = "UPDATE ".$this->table." SET CantActual=? WHERE idProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$cantidadAct, $idProducto]);
    }


//Vista reporte actualizado de inventario
    public function inventarioActualizado() {
        $query= "SELECT idInventario, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', formato_venta.FormatoVenta, CantActual, productos.Foto FROM ".$this->table." INNER JOIN productos ON inventario.idProducto=productos.idProducto INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase INNER JOIN formato_venta ON productos.idFormatoVenta=formato_venta.idFormatoVenta WHERE CantActual > 0";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Vista reporte Productos Proximos a Vencer de inventario
    public function productosAvencer() {
        $query= "SELECT idInventario, entrada_productos.FechaVencimiento, CantActual, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', proveedores.NombreProveedor, productos.Foto FROM ".$this->table." INNER JOIN productos ON inventario.idProducto=productos.idProducto INNER JOIN entrada_productos ON productos.idProducto=entrada_productos.idProducto INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase INNER JOIN proveedores ON entrada_productos.idProveedor=proveedores.idProveedor WHERE entrada_productos.FechaVencimiento >= CURRENT_DATE ORDER BY entrada_productos.FechaVencimiento ASC";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta para ver que prodcutos hay en inventario que estan y no tienen estok
    public function productoSinStock() {
        $query= "SELECT idInventario, productos.CodProducto, productos.Nombre, productos.Marca, productos.Descripcion, CONCAT(presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Contenido Neto', formato_venta.FormatoVenta, CantActual, productos.Foto FROM ".$this->table." INNER JOIN productos ON inventario.idProducto=productos.idProducto INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase INNER JOIN formato_venta ON productos.idFormatoVenta=formato_venta.idFormatoVenta WHERE CantActual = 0";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Actualiza la Cantidad Actual del Producto por salida de varios producto, solo se realizará si la cantidad actual es mayor o igual que la cantidad a restar.
    public function stockActualizado($cantSal, $idProducto) {
        $query = "UPDATE inventario SET CantActual= CantActual - ? WHERE idProducto=? AND CantActual >= ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$cantSal, $idProducto, $cantSal]);
    }


    //Consulta para mostrar los productos con menor stock
    public function productosMenorStock() {
        $query = "SELECT CONCAT(productos.Nombre, ' ', productos.Marca) AS 'Producto', CantActual FROM ".$this->table." INNER JOIN productos ON inventario.idProducto = productos.idProducto ORDER BY inventario.CantActual ASC limit 10";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>