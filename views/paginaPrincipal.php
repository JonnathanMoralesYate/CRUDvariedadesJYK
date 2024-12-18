<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-acale=1.0"/>
    <link rel="icon" href="./photo/logoPesta.ico" type="image/x-icon">
    <title>Minimarket Variedades JYK</title>
    <!-- <link href="fonts/Montserrat,Pacifico/Montserrat/Montserrat-Italic-VariableFont_wght.ttf" rel="stylesheet"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingBody.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingLogin2.css?v=1.0">
</head>

<body>
<div class="container-fluid"  id="barra_navegacion">
        <div class="row p-5 mt-1">
            <div class="col-2">
    <!--Inicio Barra Navegacion-->
    <nav class="img-fluid d-block text-center" id="inicio">
                        <a class="navbar-brand">
                            <img src="./photo/logoPrin1.1.jpeg" alt="Logo" width="90" height="80" class="rounded-3">
                        </a>
                </nav>
            </div>
            <div class="col-10 mt-2">
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
                                    <ul class="navbar-nav me-auto mb-5 mb-lg-0">
                                        <li class="nav-item">
                                            <form action="index.php?action=paginaN" method="GET">
                                                <button type="submit" class="btn btn-outline-secondary m-2 text-white" name="action" value="paginaN">Nosotros</button>
                                            </form>
                                        </li>
                                        <li class="nav-item">
                                            <form action="index.php?action=paginaS" method="GET">
                                                <button type="submit" class="btn btn-outline-secondary m-2 text-white" name="action" value="paginaS">Servicios</button>
                                            </form>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-secondary m-2 text-white" href="#Ubicacion" role="button">Ubicacion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-secondary m-2 text-white" href="#Ubicacion" role="button">Contacto</a>
                                        </li>
                                        <li class="nav-item">
                                            <form class="d-flex" role="search">
                                                <input class="form-control m-2" type="search" placeholder="Buscar Producto" aria-label="Search">
                                                <button class="btn btn-outline-secondary text-white m-2" type="submit">Buscar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                        <!-- <a id="login_inic" class="btn btn-outline-secondary text-white m-2" href="#" role="button">Login</a> -->
                                        <form action="index.php?action=login" method="GET">
                                            <button type="submit" class="btn btn-outline-secondary m-2 text-white" name="action" value="login">Login</button>
                                        </form>
                                </div>
                        </div>
                    </nav>
            </div>
        </div>
</div>
    <!--Final Barra Navegacion-->

<!--Inicio Carrusel-->
            <div class=" row col-12">
                <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item text-center active">
                        <div id="" class="card mx-auto" style="width: 18rem;">
                            <img class="img-fluid mx-auto" src="./photo/atun.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Atun</h5>
                                <p class="card-text">En Agua o Aceite</p>
                            </div>
                        </div>
                    </div>
            <div class="carousel-item text-center">
                <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-1">
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/atun.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body container-fluid">
                                    <h5 id="" class="card-title">Atun</h5>
                                    <p id="" class="card-text">En Aceite</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/cervezas.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Cerveza</h5>
                                    <p id="" class="card-text">Al por mayor y detal</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/Jamoneta.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Jamoneta</h5>
                                    <p id="" class="card-text">Zenu</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item text-center">
                <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-1">
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/atun.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body container-fluid">
                                    <h5 id="" class="card-title">Atun</h5>
                                    <p id="" class="card-text">En Aceite</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/cervezas.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Cerveza</h5>
                                    <p id="" class="card-text">Al por mayor y detal</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/Jamoneta.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Jamoneta</h5>
                                    <p id="" class="card-text">Zenu</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item text-center">
                <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-1">
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/atun.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body container-fluid">
                                    <h5 id="" class="card-title">Atun</h5>
                                    <p id="" class="card-text">En Aceite</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/cervezas.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Cerveza</h5>
                                    <p id="" class="card-text">Al por mayor y detal</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/Jamoneta.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Jamoneta</h5>
                                    <p id="" class="card-text">Zenu</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item text-center">
                <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-1">
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/atun.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body container-fluid">
                                    <h5 id="" class="card-title">Atun</h5>
                                    <p id="" class="card-text">En Aceite</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/cervezas.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Cerveza</h5>
                                    <p id="" class="card-text">Al por mayor y detal</p>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="" src="./photo/Jamoneta.png" class="img-fluid mx-auto" alt="">
                                <div class="card-body">
                                    <h5 id="" class="card-title">Jamoneta</h5>
                                    <p id="" class="card-text">Zenu</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Atras</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Adelante</span>
                        </button>
                </div>
            </div>
<!--Fin Carrusel -->

<!--Inicio de Barra Categorias -->
<div class="row container-fluid mt-5">
        
        <div class="col-2">
            <div class="text-center text-white">
                <span class="fs-3">Categorias</span>
            </div>
            <div class="mt-3">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Farmacia</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Medicamentos</button></li>
                        <li><button class="dropdown-item" type="button">Muestras Coprologicas</button></li>
                        <li><button class="dropdown-item" type="button">Sueros</button></li>
                        <li><button class="dropdown-item" type="button">Algodon</button></li>
                        <li><button class="dropdown-item" type="button">Alcohol</button></li>
                        <li><button id="changeImgCatPañales" class="dropdown-item" type="button">Pañales</button></li>
                        <li><button class="dropdown-item" type="button">copitos</button></li>
                        <li><button id="changeImgCatVitaminas" class="dropdown-item" type="button">Vitaminas</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Frutas</button>
                    <ul class="dropdown-menu">
                        <li><button onclick="location.href='frutas.html'" class="dropdown-item" type="button"></button></li>
                        <li><button onclick="location.href='VerdurasyOrtalizas.html'" class="dropdown-item" type="button"></button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Verduras</button>
                    <ul class="dropdown-menu">
                        <li><button onclick="location.href='frutas.html'" class="dropdown-item" type="button"></button></li>
                        <li><button onclick="location.href='VerdurasyOrtalizas.html'" class="dropdown-item" type="button"></button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Carnes</button>
                    <ul class="dropdown-menu">
                        <li><button onclick="location.href='carneRes.html'" class="dropdown-item" type="button">Carne De Res</button></li>
                        <li><button onclick="location.href='carneCerdo.html'" class="dropdown-item" type="button">Carne De Cerdo</button></li>
                        <li><button onclick="location.href='pollopavo.html'" class="dropdown-item" type="button">Pollo</button></li> 
                        <li><button onclick="location.href='pescadosMarisco.html'" class="dropdown-item" type="button">Pescados Y Mariscos</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Lacteos</button>
                    <ul class="dropdown-menu">
                        <li><button onclick="location.href='bebidaslacteas.html'" class="dropdown-item" type="button">Bebidas Lacteas</button></li>
                        <li><button onclick="location.href='queso,que,cuaja.html'" class="dropdown-item" type="button">Queso, Quesitos Y Cuajadas</button></li>
                        <li><button onclick="location.href='lechesliquida.html'" class="dropdown-item" type="button">Leches Liquidas</button></li>
                        <li><button onclick="location.href='mantequillas.html'" class="dropdown-item" type="button">Mantequillas Y Esparcibles</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Huevos</button>
                    <ul class="dropdown-menu">
                        <li><button onclick="location.href='huevos.html'" class="dropdown-item" type="button">Huevos AA</button></li>
                        <li><button onclick="location.href='huevos.html'" class="dropdown-item" type="button">Huevos AAA</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Refrigerados</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Alimentos Preparados</button></li>
                        <li><button class="dropdown-item" type="button">Carnes Frias</button></li>
                        <li><button class="dropdown-item" type="button">Postres y Gelatinas</button></li>
                        <li><button class="dropdown-item" type="button">Arepas</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Despensa</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Aceites</button></li>
                        <li><button class="dropdown-item" type="button">Arroz Y Granos</button></li>
                        <li><button class="dropdown-item" type="button">Bebidas Instantaneas E Infuciones</button></li>
                        <li><button class="dropdown-item" type="button">Café</button></li>
                        <li><button class="dropdown-item" type="button">Caldos</button></li>
                        <li><button class="dropdown-item" type="button">Cereales</button></li>
                        <li><button class="dropdown-item" type="button">Chocolates</button></li>
                        <li><button class="dropdown-item" type="button">Condimentos</button></li>
                        <li><button class="dropdown-item" type="button">Encurtidos</button></li>
                        <li><button class="dropdown-item" type="button">Enlatados Carnicos y Vegetales</button></li>
                        <li><button class="dropdown-item" type="button">Galletas</button></li>
                        <li><button class="dropdown-item" type="button">Harinas</button></li>
                        <li><button class="dropdown-item" type="button">Leche En Polvo</button></li>
                        <li><button class="dropdown-item" type="button">Panaderia</button></li>
                        <li><button class="dropdown-item" type="button">Panelas</button></li>
                        <li><button class="dropdown-item" type="button">Pastas</button></li>
                        <li><button class="dropdown-item" type="button">Reposteria</button></li>
                        <li><button class="dropdown-item" type="button">Salsas</button></li>
                        <li><button class="dropdown-item" type="button">Sopas, Cremas Y Bases</button></li>
                        <li><button class="dropdown-item" type="button">Dulceria Y Confiteria</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Licores</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Aguardiente</button></li>
                        <li><button class="dropdown-item" type="button">Cerveza</button></li>
                        <li><button class="dropdown-item" type="button">Ron</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Bebidas</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Aguas Y Tes</button></li>
                        <li><button class="dropdown-item" type="button">Jugos, Refrescos Y Zumos</button></li>
                        <li><button class="dropdown-item" type="button">Bebidas Energizantes</button></li>
                        <li><button class="dropdown-item" type="button">Bebidas Gaseosas</button></li>
                        <li><button class="dropdown-item" type="button">Maltas</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Snacks</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Pasabocas</button></li>
                        <li><button class="dropdown-item" type="button">Frutos Secos</button></li>
                    </ul>            
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Tabaco</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Cigarrillos</button></li>
                        <li><button class="dropdown-item" type="button">Encendedores</button></li>
                    </ul>            
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Mascotas</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Accesorios</button></li>
                        <li><button class="dropdown-item" type="button">Alimentos </button></li>
                        <li><button class="dropdown-item" type="button">Higiene</button></li><li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Cuidado Personal</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Articulos Para Bebe</button></li>
                        <li><button class="dropdown-item" type="button">Cremas Corporales</button></li>
                        <li><button class="dropdown-item" type="button">Cuidado Capilar</button></li>
                        <li><button class="dropdown-item" type="button">Desodorantes</button></li>
                        <li><button class="dropdown-item" type="button">Higiene Corporal</button></li>
                        <li><button class="dropdown-item" type="button">Higiene Oral</button></li>
                        <li><button class="dropdown-item" type="button">Maquinas Y Accesorios De Afeitar</button></li>
                        <li><button class="dropdown-item" type="button">Proteccion Femenina</button></li>
                        <li><button class="dropdown-item" type="button">Removedores Esmaltes</button></li>
                        <li><button class="dropdown-item" type="button">Talcos</button></li>
                        <li><button class="dropdown-item" type="button">Toallas Y Pañuelos Faciales</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Cuidado Del Hogar</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Accesorios De Limpieza</button></li>
                        <li><button class="dropdown-item" type="button">Ambientadores</button></li>
                        <li><button class="dropdown-item" type="button">Baterias Y Lamparas</button></li>
                        <li><button class="dropdown-item" type="button">Blanqueadores</button></li>
                        <li><button class="dropdown-item" type="button">Desmanchadores</button></li>
                        <li><button class="dropdown-item" type="button">Insecticidas y repelentes</button></li>
                        <li><button class="dropdown-item" type="button">Jabones En Barra</button></li>
                        <li><button class="dropdown-item" type="button">Lava Loza</button></li>
                        <li><button class="dropdown-item" type="button">Limpiadores Y Desinfectantes</button></li>
                        <li><button class="dropdown-item" type="button">Papel Higienico</button></li>
                        <li><button class="dropdown-item" type="button">Productos Desechables E Icopor</button></li>
                        <li><button class="dropdown-item" type="button">Servilletas Y Toallas De Cocina</button></li>
                        <li><button class="dropdown-item" type="button">Suavizantes</button></li>
                        <li><button class="dropdown-item" type="button">Velas Y Carbon</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Bisuteria</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Accesorios Para Cuello</button></li>
                        <li><button class="dropdown-item" type="button">Accesorios De Cabello</button></li>
                        <li><button class="dropdown-item" type="button">Accesorios De Manos</button></li>
                        <li><button class="dropdown-item" type="button">Accesorios De Orejas</button></li>   
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Ferreteria</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Puntillas</button></li>
                        <li><button class="dropdown-item" type="button">Herramientas</button></li>
                        <li><button class="dropdown-item" type="button">Mezclas</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Ropa</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Camisetas</button></li>
                        <li><button class="dropdown-item" type="button">Pantalones</button></li>
                        <li><button class="dropdown-item" type="button">Blusas</button></li>
                    </ul>
                </div>
            </div>
            <div class="mt-1">
                <div class="btn-group dropend w-100">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">Zapatos</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Tenis Clasicos</button></li>
                        <li><button class="dropdown-item" type="button">Tenis Deportivos</button></li>
                        <li><button class="dropdown-item" type="button">Sandalias</button></li>
                    </ul>
                </div>
            </div>
        </div>
<!--Fin Barra de Categorias-->

<!--Espacio separador de botones de categoria e imagenes del productos-->
        <div class="col-1">
        </div>

<!--Vista de Productos por categoria-->
<div class="col-9">
    <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-1">
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen1" src="./photo/atun.png" class="img-fluid mx-auto" alt="cateGen1">
                        <div class="card-body container-fluid">
                            <h5 id="marcProduc1" class="card-title">Atun</h5>
                            <p id="descriProduc1" class="card-text">En Aceite</p>
                        </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen2" src="./photo/cervezas.png" class="img-fluid mx-auto" alt="cateGen2">
                        <div class="card-body">
                            <h5 id="marcProduc2" class="card-title">Cerveza</h5>
                            <p id="descriProduc2" class="card-text">Al por mayor y detal</p>
                        </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen3" src="./photo/Jamoneta.png" class="img-fluid mx-auto" alt="cateGen3">
                        <div class="card-body">
                            <h5 id="marcProduc3" class="card-title">Jamoneta</h5>
                            <p id="descriProduc3" class="card-text">Zenu</p>
                        </div>
                </div>
            </div>
    </div>


    <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-2">
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen4" src="./photo/frutas.png" class="img-fluid mx-auto" alt="cateGen4">
                        <div class="card-body">
                            <h5 id="marcProduc4" class="card-title">Frutas</h5>
                            <p id="descriProduc4" class="card-text">Frescas</p>
                        </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen5" src="./photo/pollo.png" class="img-fluid mx-auto" alt="cateGen5">
                        <div class="card-body">
                            <h5 id="marcProduc5" class="card-title">Pollo</h5>
                            <p id="descriProduc5" class="card-text">Fresco</p>
                        </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen6" src="./photo/atun1.png" class="img-fluid mx-auto" alt="cateGen6">
                        <div class="card-body">
                            <h5 id="marcProduc6" class="card-title">Atun</h5>
                            <p id="descriProduc6" class="card-text">En Agua</p>
                        </div>
                </div>
            </div>
    </div>


    <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-2">
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen7" src="./photo/frutas.png" class="img-fluid mx-auto" alt="cateGen7">
                        <div class="card-body">
                            <h5 id="marcProduc7" class="card-title">Frutas</h5>
                            <p id="descriProduc7" class="card-text">Fresca</p>
                        </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen8" src="./photo/res.png" class="img-fluid mx-auto" alt="cateGen8">
                        <div class="card-body">
                            <h5 id="marcProduc8" class="card-title">Res</h5>
                            <p id="descriProduc8" class="card-text">Pulpa</p>
                        </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 12rem;">
                    <img id="cateGen9" src="./photo/srdinas.png" class="img-fluid mx-auto" alt="cateGen9">
                        <div class="card-body">
                            <h5 id="marcProduc9" class="card-title">Sardinas</h5>
                            <p id="descriProduc9" class="card-text">En salsa de tomate</p>
                        </div>
                </div>
            </div>
    </div>
    </div>
</div>
<!--Fin Barra Categorias -->

<!--Inicio de Footer-->
<div class="row" id="Ubicacion">
<!--Imagen-->
            <div class="col-12 col-lg-2 mt-5">
                <div class="img-fluid d-block text-center">
                    <a class="navbar-brand" href="index.php"><img src="./photo/logopest2.ico" alt="Logo" class="img-fluid text-center rounded-3"></a>
                </div>
            </div>
<!--Informacion general de VariedadesJYK-->
            <div class="col-12 col-lg-3">
                <div class="text-start">
                    <div class="d-block mt-5 text-white">
                        <div><p>Línea de Servicio al Cliente</p></div>
                        <div class="mt-1"><p>Cel: 320 338 4589</p></div>
                        <div class="d-flex mt-1">
                            <div class="aling-item-center mt-1  me-auto"><p>Cra. 16 Sur # 96-48</p></div>
                            <div class=""><a class="navbar-brand" target="_blank" href="https://g.co/kgs/WpQrABT"><img src="./photo/ubicacion.ico" alt="Ubicacion" width="35" height="35"></a></div>
                        </div>
                        <div class="mt-1"><p>Ibagué - Tolima</p></div>
                        <div class="mt-1"><p>Servicioalcliente@Variedades.com</p></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="text-start">
                    <div class="d-block mt-5 text-white">
                        <div class="mt-1"><p>INFORMACIÓN LEGAL</p></div>
                        <div class="mt-1"><p>Términos y Condiciones de Cambio </p></div>
                        <div class="mt-1"><p>Política Tratamiento de Datos Personales</p></div>
                        <div class="mt-1"><p>Términos y Condiciones Eventos</p></div>
                    </div>
                </div>
            </div>
<!--Iconos de Redes Sociales-->
            <div class="col-12 col-sm-3">
                <div class="text-white mt-5">
                    <h3 class="text-center">Redes Sociales</h3>
                </div>
                <div class="d-flex mt-4 justify-content-evenly aling-item-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://es-es.facebook.com/">
                                <img src="./photo/facebook.ico" alt="Facebook" width="50" height="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://www.instagram.com/">
                                <img src="./photo/instagam.ico" alt="instagram" width="50" height="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://www.youtube.com/">
                                <img src="./photo/youtube.ico" alt="youtube" width="50" height="50">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://www.whatsapp.com/">
                                <img src="./photo/whatsapp.ico" alt="whatsapp" width="50" height="50">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-white text-center mt-4" >
                    <h3>Síguenos</h3>

                </div>
            </div>
</div>
<!--Final de Footer-->

<!--Inicio de Pie de Pagina-->
<div class="row">
        <div class="col-12 text-center text-white">
            <p>© 2024 - VariedadesJyk® / Minimarket Variedades S.A.S. NIT. 110.370.428-1 - Todos los Derechos Reservados.</p>
        </div>
</div>
<!--Fin de Pie de Pagina-->
</div>

<!--Fin ??--->

    <!--Formulario de login ej-->
    <!--<form id="login_form"  action="login.php"  class="login_form" method="post">
        <div id="formulario1"><h4>Login</h4>
        <input type="text" name="user" placeholder="Digita tu Usuario o email" class= "input_sign" id="usuario" required>     
        <input type="password"name="passw" placeholder="Ingresa tu contraseña"  class= "input_sign" id="passw" required>
        <input type="submit" name="Login_buttom"  class= "boton_Login" id="Login_buttom" value="Login">
        <button id="cerrarL" >X</button>
        <div id="message"></div>
        </div>
    </form>-->

    <!--Formulario de login-->
<div id="login_form" class="contenedor_loginG">
        <div class="contenedor-login mt-2">

            <h2>Inicio de sesión</h2>

            <form   action="" method="post">

                <div class="formulario1">
                    <div class="campo mt-3">
                        <label for="usuario">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario">
                    </div>

                    <div class="campo">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña">
                    </div>

                    <div class="campo">
                        <button type="submit" class="boton">Iniciar sesión</button>
                    </div>

                    
                    <button id="cerrarL">X</button>
                    
                    <div id="message"></div>
                </div>
        </form>
    </div>
</div>



        <script src="./js/bootstrap.bundle.min.js?v=1.0"></script>
        <script src="./js/cambioImgBarraCateg.js?v=1.0"></script>
        <script src="./js/LoginInicio.js?v=1.0"></script>

</body>

</html>