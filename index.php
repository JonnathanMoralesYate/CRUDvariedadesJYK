<?php


$action = $_GET['action'] ?? 'dashboard';

switch($action){







    default:
        include './views/paguinaPrincipal.php';
        break;
}


?>