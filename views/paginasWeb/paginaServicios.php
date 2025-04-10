<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./photo/logoPesta.ico" type="image/x-icon">
    <title>Minimarket Variedades JYK</title>
    <!-- <link href="fonts/Montserrat,Pacifico/Montserrat/Montserrat-Italic-VariableFont_wght.ttf" rel="stylesheet"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingBody.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingLogin2.css?v=1.0">
</head>

<body>
<div class="container-fluid"  id="barra_navegacion">
        <div class="row p-3">
            <div class="col-2 mt-2">
    <!--Inicio Barra Navegacion-->
                <nav class="img-fluid d-block text-center" id="inicio">
                        <a class="navbar-brand">
                            <img src="./photo/logoPrin1.1.jpeg" alt="Logo" width="90" height="80" class="rounded-3">
                        </a>
                </nav>
            </div>
            <div class="col-10">
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
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item me-5">
                                        <a class="nav-link text-white m-1 fs-5" href='index.php?action=paginaP' role="button">Inicio</a>
                                    </li>
                                    <li class="nav-item me-5">
                                    <a class="nav-link text-white m-1 fs-5" href='index.php?action=paginaN' role="button">Nosotros</a>
                                    </li>
                                    <li class="nav-item me-5">
                                    <a class="nav-link text-white m-1 fs-5" href='index.php?action=paginaS' role="button">Servicios</a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link text-white m-1 fs-5" href="#Ubicacion">Ubicación</a>
                                    </li>
                                    <li class="nav-item me-5">
                                        <a class="nav-link text-white m-1 fs-5" href="#Contacto">Contacto</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                    <a id="login_inic" class="nav-link text-white fs-5" role="button">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
            </div>
        </div>
</div>
<!--Final Barra Navegacion-->

<!--Inicio -->
<div class="row">
    <div class="">
    <div class="card bg-dark text-white col-auto">
        <img src="./photo/logoPesta.ico" class="d-block w-100" alt="...">
    </div>
    </div>
</div>
<!--Fin -->



<!--Inicio de Footer-->
<div class="row" id="Ubicacion">
            <div class="col-12 justify-content-around aling-item-center">
                    <div class="mt-5 text-white">
                            <div class="text-center mt-1 p-2">
                                <p class="text-center">Cra. 16 Sur # 96-48 Ibagué - Tolima 
                                    <a class="navbar-brand" target="_blank" href="https://g.co/kgs/WpQrABT">
                                        <img src="./photo/ubicacion.ico" alt="Ubicacion" width="35" height="35">
                                    </a>
                                </p>
                            </div>
                            <div id="Contacto" class="text-center">
                                <p>Cel: 320 338 4589</p>
                            </div>
                    </div>
                </div>
</div>
<!--Iconos de Redes Sociales-->
        <div class="row">
            <div class="col-12 justify-content-evenly aling-item-center text-center">
                <div class="text-white mt-1">
                    <h3 class="text-center">Redes Sociales</h3>
                </div>
                <div class="d-flex mt-4 justify-content-evenly aling-item-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://es-es.facebook.com/">
                                <img src="./photo/facebook.ico" alt="Facebook" width="40" height="40">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://www.instagram.com/">
                                <img src="./photo/instagam.ico" alt="instagram" width="40" height="40">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://www.youtube.com/">
                                <img src="./photo/youtube.ico" alt="youtube" width="40" height="40">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" target="_blank" href="https://www.whatsapp.com/">
                                <img src="./photo/whatsapp.ico" alt="whatsapp" width="40" height="40">
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
        <div class="col-12 text-center text-white mt-3">
            <p>© 2024 - VariedadesJyk® / Minimarket Variedades S.A.S. NIT. 110.370.428-1 - Todos los Derechos Reservados.</p>
        </div>
    </div>
<!--Fin de Pie de Pagina-->
</div>

<!--Fin ??--->

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
        <script src="./js/LoginInicio.js?v=1.0"></script>

</body>

</html>