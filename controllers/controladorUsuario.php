<?php

require_once('./models/modeloUsuario.php');
require_once('./config/conexionBDJYK.php');

class ControladorUsuario{

    private $db;
    private $modeloUsuario;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloUsuario= new ModeloUsuario($this->db);

    }


    //registro de usuarios
    public function registroUsua() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTipoDocum= $_POST['tipoDocum'];
            $numDocumento= $_POST['documUsu'];
            $nombre= $_POST['nomUsu'];
            $apellido= $_POST['apellUsu'];
            $numCelular= $_POST['numCel'];
            $correoE= $_POST['correoUsu'];
            $rol= $_POST['seleccionRol'];
            $usuario= $_POST['usuario'];
            $clave= $_POST['contraseña'];

            $claveSegura= password_hash($clave, PASSWORD_BCRYPT);
            
            $this->modeloUsuario->registroUsuario($idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura);
            
            echo "
                        <script>
                            alert('Registro Exitoso!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=registroUsuario';
                        </script>
                        ";

            //header("Location: index.php?action=registroUsuario");
            exit;
        }

    }


    //Consulta general de usuarios
    public function listaUsuarios() {
        return $this->modeloUsuario->consultGenUsua();
    }

    //Consulta por parametro id usuario en tabla general de usuarios
    public function datosUsuaGenPorId() {
        $idUsua = $_GET['idUsuario'] ?? '';
        return $this->modeloUsuario->consultUsuaId($idUsua);
    }
    

    //Consulta general de usuarios vista
    public function listaUsuariosVista() {
        return $this->modeloUsuario->consultGenUsuaVista();
    }

    //Consulta por parametro id usuario
    public function datosUsuaPorId() {
        $numIdentUsuario = $_GET['numIdentUsuario'] ?? '';
        return $this->modeloUsuario->consultGenUsuaVistaId($numIdentUsuario);
    }


    //Consulta por parametro nombre
    public function datosUsuaPorNombre() {
        $nombre = $_GET['nombre'] ?? '';
        return $this->modeloUsuario->consultGenUsuaVistaNombre($nombre);
    }


    //Actualizar usuario
    public function actualizarUsuario() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTipoDocum= $_POST['tipoDocum'];
            $numDocumento= $_POST['documUsu'];
            $nombre= $_POST['nomUsu'];
            $apellido= $_POST['apellUsu'];
            $numCelular= $_POST['numCel'];
            $correoE= $_POST['correoUsu'];
            $rol= $_POST['seleccionRol'];
            $usuario= $_POST['usuario'];
            $clave= $_POST['contraseña'];
            $idUsua= $_POST['idUsuario'];
            
            $claveSegura= password_hash($clave, PASSWORD_BCRYPT);
            
            $this->modeloUsuario->actualizarUsua($idTipoDocum, $numDocumento, $nombre, $apellido, $numCelular, $correoE, $rol, $usuario, $claveSegura, $idUsua);
            
            echo "
            <script>
                alert('Actualizacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaUsuarios';
            </script>
            ";
            //header("Location: index.php?action=consultaUsuarios");
            exit;
            }
        }


    //Eliminar usuario
    public function eliminarUsuario() {
        $idUsua = $_GET['idUsuario'] ?? '';
        $this->modeloUsuario->eliminarUsua($idUsua);

        echo "
            <script>
                alert('Eliminacion Exitosa!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=consultaUsuarios';
            </script>
            ";
            //header("Location: index.php?action=consultaUsuarios");
            exit;
    }


    // Consulta para traer informacion del producto por idclase
    public function ConsultaUsuario() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // Leer JSON desde la solicitud
            $inputJSON = file_get_contents("php://input");

            $input = json_decode($inputJSON, true);
    
            if (!isset($input['documUsu']) || empty($input['documUsu'])) {
                echo json_encode(['error' => 'El idClase del producto es requerido']);
                exit;
            }
    
            $numDocumU = $input['documUsu'];

            header("Content-Type: application/json; charset=UTF-8");
    
            $usuario = $this->modeloUsuario->consultaUsuario($numDocumU);
    
            if ($usuario) {
                echo json_encode(["success" => true, "usuario" => $usuario]);
            } else {
                echo json_encode(["success" => false, "error" => "Usuario No Registrado"]);
            }
        } else {
            echo json_encode(['error' => 'Método no permitido']);
        }
    }


}

?>