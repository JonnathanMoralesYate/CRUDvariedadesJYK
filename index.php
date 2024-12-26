<?php

require_once('./controllers/controladorPaginaP.php');
require_once('./controllers/controladorPaginaN.php');
require_once('./controllers/controladorPaginaS.php');
require_once('./controllers/contoladorPaginaAdmin.php');
require_once('./controllers/controladorPaginaEmple.php');
require_once('./controllers/controladorTipoDocum.php');
require_once('./controllers/controladorRol.php');

require_once('./controllers/controladorUsuario.php');
require_once('./controllers/controladorLogin.php');


$vistaPaginaP = new ControladorPaginaP();
$vistaPaginaN = new ControladorPaginaN();
$vistaPaginaS = new ControladorPaginaS();
$vistaAdmin = new ControladorPaginaAdmin();
$vistaEmple = new ControladorPaginaEmple();

$controladorUsuario= new ControladorUsuario();
$controladorLogin= new ControladorLogin();
$controladorTipoDocum= new ControladorTipoDocum();
$controladorRol= new ControladorRol();




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
        }
        break;

    case'cerrarSesion':
        $controladorLogin->cerraraSesion();
        break;


//Usuario

        //Registro usuario
    case'registroUsuario':
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $controladorUsuario->registroUsua();
        }else{
            $tipoDocum= $controladorTipoDocum->listaTiposDocum();
            include('./views/usuarios/registroUsuarios.php');
        }
        break;


        //Consulta Usuarios
    case'consultaUsuarios':
        $usuarios = $controladorUsuario->listaUsuariosVista();
        include('./views/usuarios/consultaUsuario.php');
        break;

    case'consultaUsuarioId':
        $usuarios = $controladorUsuario->datosUsuaPorId();
        include('./views/usuarios/consultaUsuario.php');
        break;

    case'consultaUsuarioNombre':
        $usuarios = $controladorUsuario->datosUsuaPorNombre();
        include('./views/usuarios/consultaUsuario.php');
        break;


        //Actualizar usuario
    case'inicioActualizar':
        $usuarios = $controladorUsuario->listaUsuariosVista();
        include('./views/usuarios/consultaUsuaActualizar.php');
        break;

        case'ActualizarUsuarioId':
            $usuarios = $controladorUsuario->datosUsuaGenPorId();
            $tipoRoles= $controladorRol->listaRoles();
            $tipoDocum= $controladorTipoDocum->listaTiposDocum();
            include('./views/usuarios/actualizarUsuario.php');
            break;

        case'actualizarUsuario':
            $controladorUsuario->actualizarUsuario();
            break;


        //Eliminar usuario
    case'inicioEliminarUsua':
        $usuarios = $controladorUsuario->listaUsuariosVista();
        include('./views/usuarios/consultaUsuaEliminar.php');
        break;

        case'eliminarUsuarioId':
            $usuarios= $controladorUsuario->eliminarUsuario();
            include('./views/moduloAdministrativo.php');
            break;


    default:
        include('./views/paginaPrincipal.php');
        break;
}




?>