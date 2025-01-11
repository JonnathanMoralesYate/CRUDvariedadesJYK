<?php
class ModeloProducto{

    private $conn;
    private $table= "productos";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registar producto
    public function registroProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $precioVenta, $foto) {
        $query= "INSERT INTO ".$this->table." (CodProducto, idClase, Nombre, Marca, Descripcion, idPresentacion, idUndBase, ContNeto, PrecioVenta, Foto) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $precioVenta, $foto]);
    }


//Consulta general productos por codigo de barras
    public function consultGenProductos($codigoProducto) {
        $query= "SELECT * FROM ".$this->table." WHERE CodProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigoProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta general productos con inner join
    public function consultGenProductosvista() {
        $query= "SELECT idProducto, CodProducto, clase_producto.Clase, Nombre, Marca, Descripcion, presentacion_producto.Presentacion, unidad_base.UndBase, ContNeto, PrecioVenta, Foto FROM ".$this->table." INNER JOIN clase_producto ON productos.idClase = clase_producto.idClase INNER JOIN presentacion_producto ON productos.idPresentacion = presentacion_producto.idPresentacion INNER JOIN unidad_base ON productos.idUndBase = unidad_base.idUndBase";
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta general productos de clase
    public function darProductosPorClase($idClase) {
        $query= "SELECT * FROM ".$this->table." WHERE idClase=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idClase]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//Consulta general productos con inner join por codigo producto
    public function consultGenProductosvistaCodigo($codigoProducto) {
        $query= "SELECT idProducto, CodProducto, clase_producto.Clase, Nombre, Marca, Descripcion, 
        presentacion_producto.Presentacion, unidad_base.UndBase, ContNeto, PrecioVenta, Foto FROM ".$this->table.
        " INNER JOIN clase_producto ON productos.idClase=clase_producto.idClase
        INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion 
        INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase WHERE CodProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigoProducto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//Consulta general productos con inner join por nombre producto
    public function consultGenProductosvistaNombre($nombre) {
        $query= "SELECT idProducto, CodProducto, clase_producto.Clase, Nombre, Marca, Descripcion, 
        presentacion_producto.Presentacion, unidad_base.UndBase, ContNeto, PrecioVenta, Foto FROM ".$this->table.
        " INNER JOIN clase_producto ON productos.idClase=clase_producto.idClase
        INNER JOIN presentacion_producto ON productos.idPresentacion=presentacion_producto.idPresentacion 
        INNER JOIN unidad_base ON productos.idUndBase=unidad_base.idUndBase WHERE Nombre LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$nombre.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//Actualizar producto
    public function actualizarProducto($codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $precioVenta, $foto, $idProducto) {
        $query= "UPDATE ".$this->table." SET CodProducto=?, idClase=?, Nombre=?, Marca=?, Descripcion=?, idPresentacion=?, idUndBase=?, ContNeto=?, PrecioVenta=?, Foto=? WHERE idProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigoProducto, $idClase, $nombre, $marca, $descripcion, $idPresentacion, $idUndBase, $contNeto, $precioVenta, $foto, $idProducto]);
    }

//Eliminar producto
    public function eliminarProducto($codigoProducto) {
        $query= "DELETE FROM ".$this->table." WHERE CodProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigoProducto]);
    }


    //Consulta producto por codigo de barras
    public function consultaProducto($codigoProducto) {
        $query= "SELECT idProducto FROM ".$this->table." WHERE CodProducto=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$codigoProducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>