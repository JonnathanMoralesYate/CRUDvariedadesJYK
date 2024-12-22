<?php

require_once('./models/modeloLogin.php');
require_once('./config/conexionBDJYK.php');

class ControladorLogin{

    private $db;
    private $modeloLogin;

    public function __construct() {

        $database= new DataBase();
        $this->db= $database->getConnectionJYK();
        $this->modeloLogin= new ModeloLogin($this->db);

    }

    public function validarUsuario() {

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario= $_POST['usuarioL'];
            $clave= $_POST['contraseñaL'];
            
            // Consultar el usuario en la base de datos
            $user= $this->modeloLogin->consultaUsuario($usuario);


            if ($user) {
                
                $idUsua= $user['idUsuario']; 
                $rol= $user['Rol'];
                $contraseñaBD= $user['Contraseña'];     // Contraseña encriptada almacenada
                $nombre= $user['Nombres'];
                $apellido= $user['Apellidos'];
                

            // Verifica la contraseña
            if($clave === $contraseñaBD) {

                // Inicia la sesión.
                session_start();

                // Guarda el id de usuario
                $_SESSION['idUsua'] = $idUsua;
                // Guarda el rol de usuario
                $_SESSION['rol'] = $rol;
                // Guarda el nombre de usuario
                $_SESSION['nombre'] = $nombre;
                // Guarda el apellido de usuario
                $_SESSION['apellido'] = $apellido;


                //Redirige según el rol
                if($rol == 'Administrador') {

                    echo "
                        <script>
                            alert('Has ingresado como Administrador!');
                        </script>
                        ";

                    header("Location: index.php?action=vistaAdmin");
                    exit;
                        //$acceso= "admin";

                        //return $acceso;

                }elseif($rol == 'Empleado'){

                    echo "
                        <script>
                            alert('Has ingresado como Empleado!');
                        </script>
                        ";

                    header("Location: index.php?action=vistaEmple");
                    exit;
                        //$acceso= "emplea";

                        //return $acceso;

                }
            }else {

                    // Contraseña incorrecta
                    echo "
                        <script>
                            alert('Contraseña incorrecta!');
                            
                        </script>
                        ";
                    header("Location: index.php?action=paginaN");
                    exit;

                        //$acceso= "error";

                        //return $acceso;

                } 

                // Asegura que no se ejecute más código después del header
                //exit(); 

    }else{

        // Usuario no encontrado
        echo "
            <script>
                alert('Usuario no encontrado o Incorrecto!');
            </script>
            ";
            header("Location: index.php?action=paginaN");
            exit;

            //$acceso= "error";

            //return $acceso;

        // Si las credenciales no son válidas
        //$error = "Credenciales incorrectas";

    }

}

}

    //Identificar Usuario de la Sesion
    public function idUsuarioSesion() {

        //session_start();

        if(isset($_SESSION['idUsua'])){

            $idUsu = $_SESSION['idUsua'];

            return $this->modeloLogin->consultaNombreUsuario($idUsu);

        }
    }




    //Cerrar Sesion
    public function cerraraSesion() {

        // Inicia la sesión
        session_start();

        // Elimina todas las variables de sesión
        session_unset();

        // Destruye la sesión
        session_destroy();

        // Redirige al login
        echo "
            <script>
                alert('Finalizo Sesion!');
            </script>
            ";

        header("Location: http://localhost/CRUDvariedadesJYK/index.php");

        exit();

        // window.location.href='http://localhost/CRUDvariedadesJYK/index.php';

    }


}

?>