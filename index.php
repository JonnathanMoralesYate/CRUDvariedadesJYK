<?php

require_once('./controllers/controladorPaginaP.php');
require_once('./controllers/controladorPaginaN.php');
require_once('./controllers/controladorPaginaS.php');
require_once('./controllers/controladorPaginaAdmin.php');
require_once('./controllers/controladorPaginaEmple.php');
require_once('./controllers/controladorCategorias.php');

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
require_once('./controllers/controladorEntProducto.php');
require_once('./controllers/controladorSalProducto.php');
require_once('./controllers/controladorInventario.php');

$vistaPaginaP = new ControladorPaginaP();
$vistaPaginaN = new ControladorPaginaN();
$vistaPaginaS = new ControladorPaginaS();
$vistaAdmin = new ControladorPaginaAdmin();
$vistaEmple = new ControladorPaginaEmple();
$vistaProducto = new ControladorCategorias();


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
$controladorEntProducto= new ControladorEntProductos();
$controladorsalProducto= new ControladorSalProducto();
$controladorInventario= new ControladorInventario();

$action = htmlspecialchars($_GET['action'] ?? 'principal', ENT_QUOTES, 'UTF-8');

echo "<script>console.log('Hola desde PHP en la consola!');</script>";

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

    case'paginaP2':
        $vistaProducto->index();
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
    case'registroProductos':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorProducto->registroProductos();
            }else{
                $clases = $controladorClases->listaClases();
                $presentaciones = $controladorPresentacion->listaPresentacion();
                $undBases = $controladorUndBase->listaUndBase();
                $formatoVents = $controladorFormatoVenta->listaFormatoVenta();
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
            $formatoVents = $controladorFormatoVenta->listaFormatoVenta();
            include('./views/productos/actualizarProducto.php');
            break;

        case'actualizarProducto':
            $controladorProducto->actualizarProducto();
            break;


        //Eliminar Producto
    case'eliminarProductoCodigo':
            $productos = $controladorProducto->eliminarProducto();
            break;

//registro de producto empleado

    case'registroProductoemp':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorProducto->registroProductosemp();
            }else{
                $clases = $controladorClases->listaClases();
                $presentaciones = $controladorPresentacion->listaPresentacion();
                $undBases = $controladorUndBase->listaUndBase();
                $formatoVents = $controladorFormatoVenta->listaFormatoVenta();
                include('./views/productos/registroProductoemp.php');
            }
            break;

        //Consulta Producto empleado
    case'consultaProductosemp';
    $productos = $controladorProducto->listaProductosVistaemp();
    include('./views/productos/consultaProductoemp.php');
    break;


    case'consultaProductosCodigoemp';
    $productos = $controladorProducto->productoVistaCodigoemp();
    include('./views/productos/consultaProductoemp.php');
    break;

    case'consultaProductosNombreemp';
    $productos = $controladorProducto->productoVistaNombreemp();
    include('./views/productos/consultaProductoemp.php');
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


        //Registro Proveedor empleado
    case'registroProveedorEmp':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorProveedor->RegistroProveedorEmp();
            }else{
                include('./views/proveedor/reguistroProveedorEmp.php');
            }
            break;


        //Consulta Proveedor empleado
    case'consultaProveedorEmp';
        $proveedores= $controladorProveedor->listaProveedoresEmp();
        include('./views/proveedor/consultaProveedorEmp.php');
        break;

    case'consultaProveedorIdEmp';
        $proveedores= $controladorProveedor->proveedorNitEmp();
        include('./views/proveedor/consultaProveedorEmp.php');
        break;

    case'consultaProveedorNombreEmp';
        $proveedores= $controladorProveedor->nombreProveedorEmp();
        include('./views/proveedor/consultaProveedorEmp.php');
        break;

    case'consultaVendedorNombreEmp';
        $proveedores= $controladorProveedor->nombreVendedorEmp();
        include('./views/proveedor/consultaProveedorEmp.php');
        break;


        //Actualizar Proveedor empleado
    case'actualizarProveedorIdEmp':
        $proveedores= $controladorProveedor->proveedorNitEmp();
        include('./views/proveedor/actualizarProveedorEmp.php');
        break;

        case'actualizarProveedorEmp':
            $controladorProveedor->ActualizarProductoEmp();
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
            break;

        //Eliminar Cliente
    case'eliminarClienteId':
        $controladorCliente->EliminarCliente();
        break;


//Registro Clientes empleado
    case'registroClienteemp':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorCliente->registroClienteemp();
            }else{
                $tipoDocum= $controladorTipoDocum->listaTiposDocum();
                include('./views/cliente/registroClienteemp.php');
            }
            break;
        
        
        //Consulta Clientes empleado
    case'consultaClienteemp';
        $clientes = $controladorCliente->listaClientesemp();
        include('./views/cliente/consultaClienteemp.php');
        break;
            
    case'consultaClienteCedulaemp';
        $clientes = $controladorCliente->datosClienteCedulaemp();
        include('./views/cliente/consultaClienteemp.php');
        break;
        
    case'consultaClienteNombreemp';
        $clientes = $controladorCliente->datosClienteNombreemp();
        include('./views/cliente/consultaClienteemp.php');
        break;

        //Actualizar Cliente  empleado
    case'actualizarClienteIdEmp':
        $clientes = $controladorCliente->datosClienteIdemp();
        $tipoDocum= $controladorTipoDocum->listaTiposDocum();
        include('./views/cliente/actualizarClienteemp.php');
        break;
        
        case'actualizarClienteemp':
            $controladorCliente->ActualizarClienteemp();
            break;


//Entrada de Productos

        //Registro Entrada Productos
    case'registroEntProductos':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorEntProducto->RegistroEntProducto();
            }else{
                include('./views/entradaProducto/registrarEntProducto.php');
            }
            break;


        //Consulta Entrada Productos
    case'consultaEntProductos';
        $entProductos = $controladorEntProducto->consultaGenEntProductosVista();
        include('./views/entradaProducto/consultaEntProductos.php');
        break;

    case'consultaEntProductoId';
        $entProductos = $controladorEntProducto->consultaGenEntProductosVistaId();
        include('./views/entradaProducto/consultaEntProductos.php');
        break;

    case'consultaEntProductoFecha';
        $entProductos = $controladorEntProducto->consultaGenEntProductosVistaFecha();
        include('./views/entradaProducto/consultaEntProductos.php');
        break;


        //Actualizar Entrada Productos
    case'actualizarEntProductosId':
        $entProductos = $controladorEntProducto->consultaGenEntProductosId();
        include('./views/entradaProducto/actualizarEntProducto.php');
        break;

        case'actualizarEntProductos':
            $controladorEntProducto->ActualizarEntProducto();
            break;


        //Eliminar Cliente
    case'eliminarEntProductoId':
        $controladorEntProducto->EliminarEntProducto();
        break;


//Salida de Productos

        //Registro Salida Productos
    case'registroSalProductos':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $controladorsalProducto->RegistroSalProducto();
            }else{
                include('./views/salidaProducto/registrarSalProducto.php');
            }
            break;


        //Registro Salida Productos
    case'registroSalProductosP':
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        }else{
            include('./views/salidaProducto/registroSalProductos.php');
        }
        break;


        //Consulta Salida Productos
    case'consultaSalProductos';
        $salProductos = $controladorsalProducto->consultaGenSalProductosVista();
        include('./views/salidaProducto/consultaSalProducto.php');
        break;

    case'consultaSalProductoId';
        $salProductos = $controladorsalProducto->consultaGenSalProductosVistaId();
        include('./views/salidaProducto/consultaSalProducto.php');
        break;

    case'consultaSalProductoFecha';
        $salProductos = $controladorsalProducto->consultaGenSalProductosVistaFecha();
        include('./views/salidaProducto/consultaSalProducto.php');
        break;


        //Actualizar Salida Productos
    case'actualizarSalProductosId':
        $salProductos = $controladorsalProducto->consultaGenSalProductosId();
        include('./views/salidaProducto/actualizarSalProducto.php');
        break;

        case'actualizarSalProductos':
            $controladorsalProducto->ActualizarSalProductos();
            break;

            //Eliminar Salida Producto
    case'eliminarSalProductoId':
        $controladorsalProducto->EliminarSalProducto();
        break;


//Reportes

        //Inventario
    case'reporteInventario':
        $inventarios= $controladorInventario->inventarioActual();
        include('./views/inventario/inventarioActual.php');
        break;


        //Entrada de Productos
    case'reporteEntProducto':
        include('./views/entradaProducto/generarInforEntProductos.php');
        break;

        case'reporteEntProductoFecha';
            $entProductos = $controladorEntProducto->ReporteEntProductos();
            include('./views/entradaProducto/reporteEntProductos.php');
            break;


        //Salida de Productos
    case'reporteSalProducto':
        include('./views/salidaProducto/generarInfSalProducto.php');
        break;
    
        case'reporteSalProductoFecha';
        $salProductos = $controladorsalProducto->ReporteSalProductos();
            include('./views/salidaProducto/reporteSalProducto.php');
            break;
    









    default:
    
        $clases = $controladorClases->listaClases();
        $productos = [];
        include('./views/paginasWeb/paginaPrincipal.php');
        break;
}




?>