<?php

require_once('./models/modeloProveedor.php');
require_once('./config/conexionBDJYK.php');


class ControladorProveedor{

    private $db;
    private $modeloProveedor;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloProveedor= new ModeloProveedor($this->db);
    }


    //Registro de producto
    public function RegistroProveedor() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nitProve= $_POST['nitProveedor'];
            $nomProve= $_POST['nomProveedor'];
            $correoProve= $_POST['correoProv'];
            $celProve= $_POST['celProveedor'];
            $nomVende= $_POST['nomVendedor'];
            $celVende= $_POST['celVendedor'];
            
            $this->modeloProveedor->registroProveedor($nitProve, $nomProve, $correoProve, $celProve, $nomVende, $celVende);
            
            echo "
                        <script>
                            alert('Registro del Proveedor Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroProveedor';
                        </script>
                        ";

            //header("Location: index.php?action=registroProveedor");
            exit;
        }

    }


    //Consulta general de proveedor
    public function listaProveedores() {
        return $this->modeloProveedor->consultGenProveedores();
    }


    //Consulta general por nombre de proveedores 
    public function nombreProveedor() {
        $nomProve = $_GET['nomProveedor'] ?? '';
        return $this->modeloProveedor->consultGenProveedorNombre($nomProve);
    }


    //Consulta general por nombre de vendedor 
    public function nombreVendedor() {
        $nomVende = $_GET['nomVendedor'] ?? '';
        return $this->modeloProveedor->consultGenProveedorNombreVende($nomVende);
    }

    //Consulta general de proveedor por id
    public function proveedorNit() {
        $idProveedor = $_GET['idProveedor'] ?? '';
        return $this->modeloProveedor->consultGenProveedorNit($idProveedor);
    }


    //Actualizar proveedor
    public function ActualizarProducto() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nitProve= $_POST['nitProveedor'];
            $nomProve= $_POST['nomProveedor'];
            $correoProve= $_POST['correoProv'];
            $celProve= $_POST['celProveedor'];
            $nomVende= $_POST['nomVendedor'];
            $celVende= $_POST['celVendedor'];
            $idProveedor= $_POST['idProveedor'];
            
            $this->modeloProveedor->actualizarProveedor($nitProve, $nomProve, $correoProve, $celProve, $nomVende, $celVende, $idProveedor);
            
            echo "
                        <script>
                            alert('Actualizacion del Proveedor Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaProveedor';
                        </script>
                        ";

            //header("Location: index.php?action=consultaProveedor");
            exit;
        }

    }

    //Eliminar proveedor
    public function EliminarProveedor() {
        $idProveedor= $_GET['idProveedor'] ?? '';
        $this->modeloProveedor->eliminarProveedor($idProveedor);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaProveedor';
            </script>
            ";

            //header("Location: index.php?action=consultaProveedor");
            exit;
    }

}


?>