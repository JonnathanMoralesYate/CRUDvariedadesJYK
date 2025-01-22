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
            <div class="col-2 mt-2">
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
                                        <a class="navbar-brand text-white">Menu</a>
                                    </div>
                                </nav>
                            </button>
                                <div class="collapse navbar-collapse mt-2" id="navbarTogglerDemo01">
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
                                <div class="collapse navbar-collapse mt-0" id="navbarTogglerDemo01">
                                        <a id="login_inic" class="btn btn-outline-secondary text-white m-2 mt-0" role="button">Login</a> 
                                        <!-- <form action="index.php?action=login" method="GET">
                                            <button type="submit" class="btn btn-outline-secondary m-2 text-white" name="action" value="login">Login</button>
                                        </form> -->
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
<div class="row container-fluid mt-5 text-center">
        <div class="col-3">
            <div class="text-center text-white">
                <span class="fs-3">Categorias</span>
            </div>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <div class="overflow-auto" style="max-height: 500px;">
                    <?php foreach($clases as $clase): ?>
                        <div class="mt-1">
                            <div class="btn-group dropend w-100">
                                <button type="button" class="btn btn-outline-secondary text-white" aria-expanded="false" onclick="location.href='index.php?action=paginaP&clase=<?= $clase['idClase']; ?>'"><?= $clase['Clase']; ?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<!--Vista de Productos por categoria-->
        <div class="col-9">
            <div class="row row-cols-auto g-3 text-center d-flex justify-content-around mt-1">
                <?php foreach ($productos as $producto): ?>
                    <div class="col">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img id="cateGen1" src="photo/<?= $producto['Foto']; ?>" class="img-fluid mx-auto" alt="cateGen1">
                                <div class="card-body container-fluid">
                                    <h5 id="marcProduc1" class="card-title"><?= $producto['Nombre']; ?></h5>
                                    <p id="descriProduc1" class="card-text"><?= $producto['Descripcion']; ?></p>
                                </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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


<!--Formulario de login-->
<div id="login_form" class="contenedor_loginG">
        <div class="contenedor-login mt-2">

            <h2>Inicio de sesión</h2>

            <form action="index.php?action=login" method="post">

                <div class="formulario1">
                    <div class="campo mt-3">
                        <label for="usuarioL">Usuario:</label>
                        <input type="text" id="usuario" name="usuarioL" placeholder="Ingrese su usuario" required>
                    </div>

                    <div class="campo">
                        <label for="contraseñaL">Contraseña:</label>
                        <input type="password" id="contraseña" name="contraseñaL" placeholder="Ingrese su contraseña" required>
                    </div>

                    <div class="campo">
                        <button type="submit" class="btn btn-outline-secondary m-2 text-white text-center">Iniciar sesión</button>
                    </div>

                    
                    <button id="cerrarL">X</button>
                    
                    
                    <div id="message">
                        <!-- */<?php if (isset($error)) echo "<p>$error</p>"; ?>*/ -->
                    </div>
                </div>
        </form>
    </div>
</div>



        <script src="./js/bootstrap.bundle.min.js?v=1.0"></script>
        <script src="./js/cambioImgBarraCateg.js?v=1.0"></script>
        <script src="./js/LoginInicio.js?v=1.0"></script>

</body>

</html>