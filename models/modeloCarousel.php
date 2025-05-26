<?php

class ModeloCarousel
{
    private $conn;
    private $table = "promociones";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Registrar carousel
    public function registroCarousel($idProducto, $descrpcion)
    {
        $query = "INSERT INTO " . $this->table . " (idProducto, Descripcion) VALUES(?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $descrpcion]);
    }

    //Consulta general carousel
    public function ConsultaCarouselVista()
    {
        $query = "SELECT idPromocion, productos.CodProducto, CONCAT(productos.Nombre,' ', productos.Marca) AS 'Producto',
                    productos.Foto, promociones.Descripcion  FROM " . $this->table . "
                    INNER JOIN productos ON promociones.idProducto=productos.idproducto";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Consulta general carousel
    public function consultGenCarousel()
    {
        $query = "SELECT CONCAT(productos.Nombre,' ', productos.Marca,' ', presentacion_producto.Presentacion,' ', productos.ContNeto,' ', unidad_base.UndBase) AS 'Producto',
                    productos.Foto, promociones.Descripcion  FROM " . $this->table . "
                    INNER JOIN productos ON promociones.idProducto = productos.idProducto 
                    INNER JOIN presentacion_producto ON productos.idPresentacion = presentacion_producto.idPresentacion 
                    INNER JOIN unidad_base ON productos.idUndBase = unidad_base.idUndBase";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Actualizar carousel
    public function actualizarCarousel($idProducto, $descrpcion, $idPromocion)
    {
        $query = "UPDATE " . $this->table . " SET idProducto=?, Descripcion=?, WHERE idPromocion=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idProducto, $descrpcion, $idPromocion]);
    }


    //Eliminar carousel
    public function eliminarCarousel($idPromocion)
    {
        $query = "DELETE FROM " . $this->table . " WHERE idPromocion=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$idPromocion]);
    }
}
