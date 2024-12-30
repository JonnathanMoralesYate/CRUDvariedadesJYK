<?php

require_once('./controllers/controladorPaginaP.php');
require_once('./controllers/controladorPaginaN.php');
require_once('./controllers/controladorPaginaS.php');
require_once('./controllers/controladorPaginaAdmin.php');
require_once('./controllers/controladorPaginaEmple.php');


require_once('./controllers/controladorLogin.php');
require_once('./controllers/controladorUsuario.php');
require_once('./controllers/controladorTipoDocum.php');
require_once('./controllers/controladorRol.php');
require_once('./controllers/controladorClases.php');
require_once('./controllers/controladorPresentacion.php');
require_once('./controllers/controladorUndBase.php');
require_once('./controllers/controladorProducto.php');


$vistaPaginaP = new ControladorPaginaP();
$vistaPaginaN = new ControladorPaginaN();
$vistaPaginaS = new ControladorPaginaS();
$vistaAdmin = new ControladorPaginaAdmin();
$vistaEmple = new ControladorPaginaEmple();


$controladorLogin= new ControladorLogin();
$controladorUsuario= new ControladorUsuario();
$controladorTipoDocum= new ControladorTipoDocum();
$controladorRol= new ControladorRol();
$controladorClases= new ControladorClases();
$controladorPresentacion= new ControladorPresentacion();
$controladorUndBase= new ControladorUndBase();
$controladorProducto= new ControladorProducto();



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


//Usuarios

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
    case'inicioActualizarU':
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


//Productos

        //Registro Producto
    case'registroProducto':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorProducto->registroProductos();
            }else{
                $clases = $controladorClases->listaClases();
                $presentaciones = $controladorPresentacion->listaPresentacion();
                $undBases = $controladorUndBase->listaUndBase();
                include('./views/productos/registroProducto.php');
            }
            break;


        //Consulta Producto
    case'consultaProductos';
        $productos = $controladorProducto->listaProductosVista();
        include('./views/productos/consultaProductos.php');
        break;

    case'consultaProductosCodigo';
        $productos = $controladorProducto->productoVistaCodigo();
        include('./views/productos/consultaProductos.php');
        break;

    case'consultaProductosNombre';
        $productos = $controladorProducto->productoVistaNombre();
        include('./views/productos/consultaProductos.php');
        break;


        //Actualizar usuario
    case'inicioActualizarP':
        $productos = $controladorProducto->listaProductosVista();
        include('./views/productos/consultaProducActualizar.php');
        break;

        case'actualizarProductosCodigo':
            $productos = $controladorProducto->productoCodigo();
            $clases = $controladorClases->listaClases();
            $presentaciones = $controladorPresentacion->listaPresentacion();
            $undBases = $controladorUndBase->listaUndBase();
            include('./views/productos/actualizarProducto.php');
            break;

        case'actualizarProducto':
            $controladorProducto->actualizarProducto();
            break;


        //Eliminar usuario
    case'inicioEliminarProducto':
        $productos = $controladorProducto->listaProductosVista();
        include('./views/productos/eliminarProducto.php');
        break;

        case'eliminarProductoCodigo':
            $productos = $controladorProducto->eliminarProducto();
            include('./views/moduloAdministrativo.php');
            break;



        //prueba para definir definir
    case'prueba':
        $productos = $controladorProducto->listaProductosVista();
        include('./views/productos/accionesProductos.php');
        break;


//Clases

        //Registro Clase
    case'registroClase':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorClases->registroClase();
            }else{
                include('./views/propiedades/registroClase.php');
            }
            break;


        //Consulta Clase
    case'consultaClase';
        $clases= $controladorClases->listaClases();
        include('./views/propiedades/consultaClase.php');
        break;

    case'consultaClaseId';
        $clases= $controladorClases->consultClaseId();
        include('./views/propiedades/consultaClase.php');
        break;

    case'consultaClaseNombre';
        $clases= $controladorClases->consultClaseNombre();
        include('./views/propiedades/consultaClase.php');
        break;


    //Actualizar Clase
    case'actualizarClaseId':
        $clases= $controladorClases->consultClaseId();
        include('./views/propiedades/actualizarClase.php');
        break;

        case'actualizarClase':
            $controladorClases->ActualizarClase();
            break;

    //Eliminar usuario
    case'eliminarClaseId':
        $clases= $controladorClases->eliminarClase();
        break;



    default:
        include('./views/paginaPrincipal.php');
        break;
}




?>