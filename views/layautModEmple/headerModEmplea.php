<?php
session_start();

// Verifica si $_SESSION está vacío (no tiene ninguna variable)
if (empty($_SESSION)) {
    // Redirigir a:
    header("Location: index.php?action=paginaP");
    exit;
}

// Verificar si el usuario tiene el rol de Empleado
if ($_SESSION['rol'] == 1) {
    // Si no es Empleado, redirigir o mostrar mensaje de acceso denegado
    //echo "Acceso denegado.";
    header("Location: index.php?action=vistaAdmin");
    exit;
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-acale=1.0"/>
    <link rel="icon" href="/img/logoPesta.ico" type="image/x-icon">
    <title>Modulo Empleado JYK</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingBody.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingExtraModulo.css?v=1.0">
</head>

<body>
    <div class="container-fluid">
        <div class="row p-4 mt-1">
            <div class="text-center text-white mt-1">
                <h2>MINIMARKET VARIEDADES JYK</h2>
            </div>
            <div class="text-center text-white mt-1">
                <h3> Modulo Empleado</h3>
            </div>
            <div class="text-white mt-3">
            <h6>Bienvenido: <?= $_SESSION['nombre'] ?></h6>
            </div>
        </div>
        <div class="row mt-2">
<!--Inicio Barra de Navegacion Empleado-->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <nav class="navbar navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand text-white" href="#">Menu</a>
                            </div>
                        </nav>
                    </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <a class="navbar-brand text-white">Inicio</a>
                                <ul class="nav nav-pills">
<!--Menu Productos-->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false" aria-label="Toggle navigation">Productos</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="index.php?action=paginaP" method="GET">
                                                    <button class="dropdown-item" type="submit" name="action" value="paginaP" class="btn btn-light">Registrar Producto</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="index.php?action=" method="GET">
                                                    <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Consultar Producto</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
<!--Menu Entradas Productos-->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">Entrada de Productos</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="index.php?action=paginaP" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="paginaP" class="btn btn-light">Registrar Entrada</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Consultar Entrada</button>
                                                    </form>
                                                </li>
                                            </ul>
                                    </li>
<!--Menu Salida Productos-->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">Salida de Productos</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="index.php?action=paginaP" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="paginaP" class="btn btn-light">Registrar Salida</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Consultar Salida</button>
                                                    </form>
                                                </li>                                    
                                            </ul>
                                    </li>
<!--Menu Clientes-->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">Clientes</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="index.php?action=paginaP" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="paginaP" class="btn btn-light">Registrar Cliente</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light fs-6">Actualizar Cliente</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Consultar Cliente</button>
                                                    </form>
                                                </li> 
                                            </ul>
                                    </li>
<!--Menu Proveedores-->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">Proveedores</a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown">
                                                    <form action="index.php?action=paginaP" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="paginaP" class="btn btn-light">Registrar Proveedor</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light fs-6">Actualizar Proveedor</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Consultar Proveedor</button>
                                                    </form>
                                                </li> 
                                            </ul>
                                    </li>
<!--Menu Informes-->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button" aria-expanded="false">Reportes</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="index.php?action=paginaP" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="paginaP" class="btn btn-light">Entradas Productos</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light fs-6">Salidas Productos</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Inventario</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="index.php?action=" method="GET">
                                                        <button class="dropdown-item" type="submit" name="action" value="" class="btn btn-light">Productos a Vencer</button>
                                                    </form>
                                                </li> 
                                            </ul>
                                    </li>                                       
                                </ul>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <!-- <a class="btn btn-outline-secondary text-white" href="#" role="button">Login Out</a> -->
                                <form action="index.php?action=cerrarSesion" method="GET">
                                    <button type="submit" class="btn btn-outline-secondary m-2 text-white" name="action" value="cerrarSesion">Login Out</button>
                                </form>
                        </div>
                </div>
            </nav>
        </div>
<!--Fin Barra de Navegacion Empleado-->