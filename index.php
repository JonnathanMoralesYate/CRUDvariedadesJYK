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
require_once('./controllers/controladorFormatoVenta.php');
require_once('./controllers/controladorProveedor.php');
require_once('./controllers/controladorCliente.php');

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
$controladorFormatoVenta= new ControladorFormatoVenta();
$controladorProveedor= new ControladorProveedor();
$controladorCliente= new ControladorCliente();



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


//Redirecciones Modulo Administrativo
    case'vistaAdmin':
        $vistaAdmin->index();
        break;


//Redirecciones Modulo Empleado
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


//Modulo Administrativo

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
    case'actualizarUsuarioId':
        $usuarios = $controladorUsuario->datosUsuaGenPorId();
        $tipoRoles= $controladorRol->listaRoles();
        $tipoDocum= $controladorTipoDocum->listaTiposDocum();
        include('./views/usuarios/actualizarUsuario.php');
        break;

        case'actualizarUsuario':
            $controladorUsuario->actualizarUsuario();
            break;


        //Eliminar usuario
    case'eliminarUsuarioId':
        $usuarios= $controladorUsuario->eliminarUsuario();
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


        //Actualizar Producto
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


        //Eliminar Producto
    case'eliminarProductoCodigo':
            $productos = $controladorProducto->eliminarProducto();
            break;


//Clases

        //Registro Clase
    case'registroClase':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorClases->registroClase();
            }else{
                include('./views/propiedades/clases/registroClase.php');
            }
            break;


        //Consulta Clase
    case'consultaClase';
        $clases= $controladorClases->listaClases();
        include('./views/propiedades/clases/consultaClase.php');
        break;

    case'consultaClaseId';
        $clases= $controladorClases->consultClaseId();
        include('./views/propiedades/clases/consultaClase.php');
        break;

    case'consultaClaseNombre';
        $clases= $controladorClases->consultClaseNombre();
        include('./views/propiedades/clases/consultaClase.php');
        break;


        //Actualizar Clase
    case'actualizarClaseId':
        $clases= $controladorClases->consultClaseId();
        include('./views/propiedades/clases/actualizarClase.php');
        break;

        case'actualizarClase':
            $controladorClases->ActualizarClase();
            break;

        //Eliminar Clase
    case'eliminarClaseId':
        $clases= $controladorClases->eliminarClase();
        break;


//Presentacion

        //Registro presentacion
    case'registroPresentacion':
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $controladorPresentacion->RegistroPresentacion();
                }else{
                    include('./views/propiedades/presentacion/registroPresentacion.php');
                }
                break;


        //Consulta Presentacion
    case'consultaPresentacion';
        $presentaciones = $controladorPresentacion->listaPresentacion();
        include('./views/propiedades/presentacion/consultaPresentacion.php');
        break;
    
    case'consultaPresentacionId';
        $presentaciones = $controladorPresentacion->ConsultPresentacionId();
        include('./views/propiedades/presentacion/consultaPresentacion.php');
        break;
    
    case'consultaPresentacionNombre';
        $presentaciones = $controladorPresentacion->ConsultPresentacionNombre();
        include('./views/propiedades/presentacion/consultaPresentacion.php');
        break;


        //Actualizar Presentacion
    case'actualizarPresentacionId':
        $presentaciones = $controladorPresentacion->ConsultPresentacionId();
        include('./views/propiedades/presentacion/actualizarPresentacion.php');
        break;

        case'actualizarPresentacion':
            $controladorPresentacion->ActualizarPresentacion();
            break;


        //Eliminar Presentacion
    case'eliminarPresentacionId':
        $presentaciones= $controladorPresentacion->EliminarPresentacion();
        break;


//Unidad Base

        //Registro Unidad Base
    case'registroUndBase':
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $controladorUndBase->RegistroUndBase();
                }else{
                    include('./views/propiedades/unidadBase/registroUndBase.php');
                }
                break;


        //Consulta Unidad Base
    case'consultaUndBasen';
        $undBases = $controladorUndBase->listaUndBase();
        include('./views/propiedades/unidadBase/consultaUndBase.php');
        break;
    
    case'consultaUndBaseId';
        $undBases = $controladorUndBase->consultUndBaseId();
        include('./views/propiedades/unidadBase/consultaUndBase.php');
        break;
    
    case'consultaUndBaseNombre';
        $undBases = $controladorUndBase->consultUndBaseNombre();
        include('./views/propiedades/unidadBase/consultaUndBase.php');
        break;


        //Actualizar Unidad Base
    case'actualizarUndBaseId':
        $undBases = $controladorUndBase->consultUndBaseId();
        include('./views/propiedades/unidadBase/actualizarUndBase.php');
        break;

        case'actualizarUndBase':
            $controladorUndBase->ActualizarUndBase();
            break;


        //Eliminar Unidad Base
    case'eliminarUndBaseId':
        $controladorUndBase->EliminarUndBase();
        break;


//Formato Venta

        //Registro Formato Venta
        case'registroFormatoVenta':
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $controladorFormatoVenta->RegistroFormatoVenta();
                }else{
                    include('./views/propiedades/formatoVenta/registrarFormtVenta.php');
                }
                break;


        //Consulta Formato Venta
    case'consultaFormatoVenta';
        $formatoVentas = $controladorFormatoVenta->listaFormatoVenta();
        include('./views/propiedades/formatoVenta/consultaFormtVenta.php');
        break;
    
    case'consultaFormatoVentaId';
        $formatoVentas = $controladorFormatoVenta->ConsultFormatoVentaId();
        include('./views/propiedades/formatoVenta/consultaFormtVenta.php');
        break;
    
    case'consultaFormatoVentaNombre';
        $formatoVentas = $controladorFormatoVenta->ConsultFormatoVentaNombre();
        include('./views/propiedades/formatoVenta/consultaFormtVenta.php');
        break;


        //Actualizar Formato Venta
    case'actualizarFormatoVentaId':
        $formatoVentas = $controladorFormatoVenta->ConsultFormatoVentaId();
        include('./views/propiedades/formatoVenta/actualizarFormtVenta.php');
        break;

        case'actualizarFormatoVenta':
            $controladorFormatoVenta->ActualizarFormatoVenta();
            break;


        //Eliminar Formato Venta
    case'eliminarFormatoVentaId':
        $controladorFormatoVenta->EliminarFormatoVenta();
        break;


//Proveedor

        //Registro Proveedor
    case'registroProveedor':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorProveedor->RegistroProveedor();
            }else{
                include('./views/proveedor/registroProveedor.php');
            }
            break;


        //Consulta Proveedor
    case'consultaProveedor';
        $proveedores= $controladorProveedor->listaProveedores();
        include('./views/proveedor/consultaProveedor.php');
        break;

    case'consultaProveedorId';
        $proveedores= $controladorProveedor->proveedorNit();
        include('./views/proveedor/consultaProveedor.php');
        break;

    case'consultaProveedorNombre';
        $proveedores= $controladorProveedor->nombreProveedor();
        include('./views/proveedor/consultaProveedor.php');
        break;

    case'consultaVendedorNombre';
        $proveedores= $controladorProveedor->nombreVendedor();
        include('./views/proveedor/consultaProveedor.php');
        break;


        //Actualizar Proveedor
    case'actualizarProveedorId':
        $proveedores= $controladorProveedor->proveedorNit();
        include('./views/proveedor/actualizarProveedor.php');
        break;

        case'actualizarProveedor':
            $controladorProveedor->ActualizarProducto();
            break;

        //Eliminar Proveedor
    case'eliminarProveedorId':
        $controladorProveedor->EliminarProveedor();
        break;


//Clientes

        //Registro Clientes
    case'registroCliente':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorCliente->registroCliente();
            }else{
                $tipoDocum= $controladorTipoDocum->listaTiposDocum();
                include('./views/cliente/registroCliente.php');
            }
            break;


        //Consulta Clientes
    case'consultaCliente';
        $clientes = $controladorCliente->listaClientes();
        include('./views/cliente/consultaCliente.php');
        break;
    
    case'consultaClienteCedula';
        $clientes = $controladorCliente->datosClienteCedula();
        include('./views/cliente/consultaCliente.php');
        break;

    case'consultaClienteNombre';
        $clientes = $controladorCliente->datosClienteNombre();
        include('./views/cliente/consultaCliente.php');
        break;


        //Actualizar Cliente
    case'actualizarClienteId':
        $clientes = $controladorCliente->datosClienteId();
        $tipoDocum= $controladorTipoDocum->listaTiposDocum();
        include('./views/cliente/actualizarCliente.php');
        break;

        case'actualizarCliente':
            $controladorCliente->ActualizarCliente();
            include('./views/cliente/consultaCliente.php');
            break;

        //Eliminar Cliente
    case'eliminarClienteId':
        $controladorCliente->EliminarUsuario();
        include('./views/cliente/consultaCliente.php');
        break;


















//Modulo Empleado















    default:
        include('./views/paginasWeb/paginaPrincipal.php');
        break;
}




?>