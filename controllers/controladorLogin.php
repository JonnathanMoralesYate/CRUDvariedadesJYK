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
                $rol= $user['idRol'];
                $contraseñaBD= $user['Contraseña'];     // Contraseña encriptada almacenada
                $nombre= $user['Nombres'];
                $apellido= $user['Apellidos'];
                

            // Verifica la contraseña
            if(password_verify($clave, $contraseñaBD)) {

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
                //Administrativo
                if($_SESSION['rol'] == 1) {

                    echo "
                        <script>
                            alert('Has ingresado como Administrador!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=vistaAdmin';
                        </script>
                        ";

                    //header("Location: index.php?action=vistaAdmin");
                    exit;

                    //Empleado
                }elseif($_SESSION['rol'] == 2){

                    echo "
                        <script>
                            alert('Has ingresado como Empleado!');
                        </script>
                        ";

                    header("Location: index.php?action=vistaEmple");
                    exit;

                }
            }else {

                    // Contraseña incorrecta
                    echo "
                        <script>
                            alert('Contraseña incorrecta!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=paginaP';
                        </script>
                        ";
                    //header("Location: index.php?action=paginaS");
                    exit;

                } 

                // Asegura que no se ejecute más código después del header
                //exit(); 

    }else{

        // Usuario no encontrado
        echo "
            <script>
                alert('Usuario no encontrado o Incorrecto!');
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=paginaP';
            </script>
            ";
            //header("Location: index.php?action=paginaN");
            exit;

        // Si las credenciales no son válidas
        //$error = "Credenciales incorrectas";

    }

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
                window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=paginaP';
            </script>
            ";

        //header("Location: http://localhost/CRUDvariedadesJYK/index.php");

        exit();

    }


}

?>