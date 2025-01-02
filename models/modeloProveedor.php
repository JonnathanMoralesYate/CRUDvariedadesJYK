<?php 

class ModeloProveedor{

    private $conn;
    private $table= "proveedores";

    public function __construct($db) {
        $this->conn=$db;
    }


//Registrar Proveedor
    public function registroProveedor($nitProve, $nomProve, $correoProve, $celProve, $nomVende, $celVende) {
    $query = "INSERT INTO ".$this->table." (NitProveedor, NombreProveedor, Email, CelularProveedor, NombreVendedor, CelularVendedor) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt= $this->conn->prepare($query);
    $stmt->execute([$nitProve, $nomProve, $correoProve, $celProve, $nomVende, $celVende]);
    }


    //Consulta general proveedor
    public function consultGenProveedores() {
        $query= "SELECT * FROM ".$this->table;
        $stmt= $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta general proveedor por nit
    public function consultGenProveedorNit($idProveedor) {
        $query= "SELECT * FROM ".$this->table." WHERE idProveedor=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idProveedor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta general proveedor por nombre 
    public function consultGenProveedorNombre($nomProve) {
        $query= "SELECT * FROM ".$this->table." WHERE NombreProveedor LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$nomProve.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Consulta general proveedor por nombre vendedor
    public function consultGenProveedorNombreVende($nomVende) {
        $query= "SELECT * FROM ".$this->table." WHERE NombreVendedor LIKE ?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute(['%'.$nomVende.'%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Actualizar proveedor
    public function actualizarProveedor($nitProve, $nomProve, $correoProve, $celProve, $nomVende, $celVende, $idProveedor) {
        $query= "UPDATE ".$this->table." SET NitProveedor=?, NombreProveedor=?, Email=?, CelularProveedor=?, NombreVendedor=?, CelularVendedor=? WHERE idProveedor=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$nitProve, $nomProve, $correoProve, $celProve, $nomVende, $celVende, $idProveedor]);
    }

//Eliminar proveedor
    public function eliminarProveedor($idProveedor) {
        $query= "DELETE FROM ".$this->table." WHERE idProveedor=?";
        $stmt= $this->conn->prepare($query);
        $stmt->execute([$idProveedor]);
    }

}

?>