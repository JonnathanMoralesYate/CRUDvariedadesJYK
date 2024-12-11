<?php

require_once './controllers/controladorPaginaP.php';
require_once './controllers/controladorPaginaN.php';

$vistaPaginaP = new ControladorPaginaP();
$vistaPaginaN = new ControladorPaginaN();


$action = $_GET['action'] ?? 'paginaPrincipal';


switch($action){

        //Opciones barra navegacion pagina Principal
    case 'paginaP';
    $vistaPaginaP->index();
    break;

    case 'paginaN';
        $vistaPaginaN->index();
        break;

    


    default:
        include './views/paginaPrincipal.php';
        break;
}




?>