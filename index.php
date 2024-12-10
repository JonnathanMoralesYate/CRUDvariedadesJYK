<?php

require_once './views/formnosotros.php';


$action = $_GET['action'] ?? 'paginaPrincipal';

switch($action){

    case'inicio';
    include './views/formnosotros.php';
    break;

    case'nosotros';
    include './views/formnosotros.php';
    break;

    case'servicio';
    include './views/paginaPrincipal.php';
    break;







    default:
        include './views/paginaPrincipal.php';
        break;
}


?>