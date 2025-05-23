<?php

require_once('./models/modeloLogin.php');
require_once('./config/conexionBDJYK.php');

class ControladorLogin
{

    private $db;
    private $modeloLogin;

    public function __construct()
    {

        $database = new DataBase();
        $this->db = $database->getConnectionJYK();
        $this->modeloLogin = new ModeloLogin($this->db);
    }

    public function validarUsuario()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuarioL'];
            $clave = $_POST['contraseñaL'];

            // Consultar el usuario en la base de datos
            $user = $this->modeloLogin->consultaUsuario($usuario);


            if ($user) {

                $idUsua = $user['idUsuario'];
                $rol = $user['idRol'];
                $contraseñaBD = $user['Contraseña'];     // Contraseña encriptada almacenada
                $nombre = $user['Nombres'];
                $apellido = $user['Apellidos'];


                // Verifica la contraseña
                if (password_verify($clave, $contraseñaBD)) {

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
                    if ($_SESSION['rol'] == 1) {

                        header("Location: index.php?action=vistaAdmin");
                        exit;

                        //Empleado
                    } elseif ($_SESSION['rol'] == 2) {

                        header("Location: index.php?action=vistaEmple");
                        exit;
                    }
                } else {

                    // Contraseña incorrecta
                    echo "
                        <script>
                            alert('Contraseña incorrecta!');
                            window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=Principal';
                        </script>
                    ";
                    exit;
                }
            } else {

                // Usuario no encontrado
                echo "
                    <script>
                        alert('Usuario no encontrado o Incorrecto!');
                        window.location.href='http://localhost/CRUDvariedadesJYK/index.php?action=Principal';
                    </script>
                ";
                exit;
            }
        }
    }

    //Cerrar Sesion
    public function cerrarSesion()
    {
        // 1. Iniciar sesión sólo si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 2. Regenerar ID (opcional, por seguridad)
        session_regenerate_id(true);

        // 3. Borrar todas las variables de sesión
        $_SESSION = [];
        session_unset();

        // 4. Destruir la sesión en el servidor
        session_destroy();

        // 5. Eliminar la cookie de sesión del navegador
        setcookie(
            session_name(),
            '',
            time() - 42000,
            '/'
        );

        // Redirección con JavaScript
        echo '
        <script>
            alert("Sesión cerrada con éxito");
            window.location.href = "index.php?action=Principal";
        </script>';
        exit;

        // 6. Redirigir con header()
        // Puedes pasar un flag por GET: index.php?action=Principal&msg=logout
        //header('Location: index.php?action=Principal');
        //exit;
    }
}
