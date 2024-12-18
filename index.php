<?php

require_once './controllers/controladorPaginaP.php';
require_once './controllers/controladorPaginaN.php';
require_once './controllers/controladorPaginaS.php';

$vistaPaginaP = new ControladorPaginaP();
$vistaPaginaN = new ControladorPaginaN();
$vistaPaginaS = new ControladorPaginaS();


$action = $_GET['action'] ?? 'paginaP';


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

        case'login':
            include './views/moduloAdministrativo.php';
            break;

            case'loginP':
                include './views/moduloEmpleado.php';
                break;
    


    default:
        include './views/paginaPrincipal.php';
        break;
}




?>