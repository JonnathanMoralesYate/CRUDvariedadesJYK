<?php

require_once('./controllers/controladorPaginaP.php');
require_once('./controllers/controladorPaginaN.php');
require_once('./controllers/controladorPaginaS.php');
require_once('./controllers/contoladorPaginaAdmin.php');
require_once('./controllers/controladorPaginaEmple.php');

require_once('./controllers/controladorUsuario.php');
require_once('./controllers/controladorLogin.php');


$vistaPaginaP = new ControladorPaginaP();
$vistaPaginaN = new ControladorPaginaN();
$vistaPaginaS = new ControladorPaginaS();
$vistaAdmin = new ControladorPaginaAdmin();
$vistaEmple = new ControladorPaginaEmple();

$controladorUsuario= new ControladorUsuario();
$controladorLogin= new ControladorLogin();




$action = htmlspecialchars($_GET['action'] ?? 'principal', ENT_QUOTES, 'UTF-8');


switch($action){

//Opciones barra navegacion pagina Principal
    case'paginaP':
    $vistaPaginaP->index();
    break;

    case'paginaN':
        $vistaPaginaN->index();
        break;

    case'paginaS':
        $vistaPaginaS->index();
        break;

    case'vistaAdmin':
        $vistaAdmin->index();
        break;

    case'vistaEmple':
        $vistaEmple->index();
        break;
    

//Login inicio de Sesion
    case'login':
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $sesionUsuario= $controladorLogin->validarUsuario();

            //switch($sesionUsuario){
            //    case'admin';

            //    $nombre = $controladorLogin->idUsuarioSesion();

            //    include('./views/moduloAdministrativo.php');
            //    break;

            //    case'emplea';

            //    $nombre = $controladorLogin->idUsuarioSesion();

            //    include('./views/moduloEmpleado.php');
            //    break;

            //    case'error';
            //    $vistaPaginaP->index();
                //include('');
            //    break;
            //}
        }
        break;

    case'cerrarSesion':
        $controladorLogin->cerraraSesion();
        break;


//Usuario
    case'registroUsuario';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $controladorUsuario->registroUsua();
        }else{
            include('./views/usuarios/registroUsuarios.php');
        }
        break;





    default:
        include './views/paginaPrincipal.php';
        break;
}




?>