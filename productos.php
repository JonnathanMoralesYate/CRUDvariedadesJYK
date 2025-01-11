<?php

require_once('./controllers/controladorProducto.php');
require_once('./controllers/controladorClases.php');

$controladorClases= new ControladorClases();
$controladorProducto= new ControladorProducto();

$clase = htmlspecialchars($_GET['clase'] ?? '0', ENT_QUOTES, 'UTF-8');

$clases = $controladorClases->listaClases();
$productos = $controladorProducto->darListaProductosPorClase($clase);

include('./views/paginasWeb/paginaPrincipal.php');

?>