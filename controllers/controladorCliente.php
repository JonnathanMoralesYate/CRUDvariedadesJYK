<?php

require_once('./models/modeloCliente.php');
require_once('./config/conexionBDJYK.php');

class ControladorCliente{

    private $db;
    private $modeloCliente;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloCliente= new ModeloCliente($this->db);
    }


    //registro de Clientes
    public function registroCliente() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTipoDocumC= $_POST['tipoDocum'];
            $numDocumentoC= $_POST['documCliente'];
            $nombreC= $_POST['nomCliente'];
            $apellidoC= $_POST['apellCliente'];
            $numCelularC= $_POST['numCel'];
            $correoC= $_POST['correoCliente'];
            $puntos= $_POST['puntos'];
            
            $this->modeloCliente->registroCliente($idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos);
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroCliente';
                        </script>
                        ";

            //header("Location: index.php?action=vistaRegistroCliente");
            exit;
        }

    }


    //Consulta General Vista 
    public function listaClientes() {
        return $this->modeloCliente->consultGenClienteVista();
    }


    //Consulta ID Cliente
    public function datosClienteId() {
        $idCliente = $_GET['idCliente'] ?? '';
        return $this->modeloCliente->consultGenClienteId($idCliente);
    }


    //Consulta Cedula Cliente
    public function datosClienteCedula() {
        $numCedulaCliente = $_GET['documCliente'] ?? '';
        return $this->modeloCliente->consultGenClienteCedula($numCedulaCliente);
    }


    //Consulta Nombre Cliente
    public function datosClienteNombre() {
        $nombreC = $_GET['nomCliente'] ?? '';
        return $this->modeloCliente->consultGenClienteNombre($nombreC);
    }


    //Actualizar de Clientes
    public function ActualizarCliente() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTipoDocumC= $_POST['tipoDocum'];
            $numDocumentoC= $_POST['documCliente'];
            $nombreC= $_POST['nomCliente'];
            $apellidoC= $_POST['apellCliente'];
            $numCelularC= $_POST['numCel'];
            $correoC= $_POST['correoCliente'];
            $puntos= $_POST['puntos'];
            $idCliente= $_POST['idCliente'];
            
            $this->modeloCliente->ActualizarCliente($idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos, $idCliente);
            
            echo "
                <script>
                    alert('Actualizacion Exitoso!');
                    window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaCliente';
                </script>
                ";

            //header("Location: index.php?action=consultaCliente");
            exit;
        }

    }


    //Eliminar Cliente
    public function EliminarCliente() {
        $idCliente = $_GET['idCliente'] ?? '';
        $this->modeloCliente->eliminarCliente($idCliente);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaCliente';
            </script>
            ";

            //header("Location: index.php?action=consultaCliente");
            exit;
    }

    //registro de Clientes empleado
    public function registroClienteemp() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTipoDocumC= $_POST['tipoDocum'];
            $numDocumentoC= $_POST['documCliente'];
            $nombreC= $_POST['nomCliente'];
            $apellidoC= $_POST['apellCliente'];
            $numCelularC= $_POST['numCel'];
            $correoC= $_POST['correoCliente'];
            $puntos= $_POST['puntos'];
            
            $this->modeloCliente->registroCliente($idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos);
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroClienteemp';
                        </script>
                        ";

            //header("Location: index.php?action=registroClienteemp");
            exit;
        }

    }

        //Consulta General Vista empleado
        public function listaClientesemp() {
            return $this->modeloCliente->consultGenClienteVista();
        }
    
    
        //Consulta ID Cliente empleado
        public function datosClienteIdemp() {
            $idCliente = $_GET['idCliente'] ?? '';
            return $this->modeloCliente->consultGenClienteId($idCliente);
        }
    
    
        //Consulta Cedula Cliente empleado
        public function datosClienteCedulaemp() {
            $numCedulaCliente = $_GET['documCliente'] ?? '';
            return $this->modeloCliente->consultGenClienteCedula($numCedulaCliente);
        }
    
    
        //Consulta Cedula Cliente empleado
        public function datosClienteNombreemp() {
            $nombreC = $_GET['nomCliente'] ?? '';
            return $this->modeloCliente->consultGenClienteNombre($nombreC);
        }
    
    
        //Actualizar de Clientes EMPLEADO
        public function ActualizarClienteemp() {
    
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $idTipoDocumC= $_POST['tipoDocum'];
                $numDocumentoC= $_POST['documCliente'];
                $nombreC= $_POST['nomCliente'];
                $apellidoC= $_POST['apellCliente'];
                $numCelularC= $_POST['numCel'];
                $correoC= $_POST['correoCliente'];
                $puntos= $_POST['puntos'];
                $idCliente= $_POST['idCliente'];
                
                $this->modeloCliente->ActualizarCliente($idTipoDocumC, $numDocumentoC, $nombreC, $apellidoC, $numCelularC, $correoC, $puntos, $idCliente);
                
                echo "
                            <script>
                                alert('Actualizacion Exitoso!');
                                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=vistaAdmin';
                            </script>
                            ";
    
                //header("Location: index.php?action=vistaAdmin");
                exit;
            }

        }

}


?>