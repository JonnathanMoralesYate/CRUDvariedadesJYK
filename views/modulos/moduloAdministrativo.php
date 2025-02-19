<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-1">
        </div>
        <div class="col-12 col-sm-4">
            <div class="container-fluid text-center text-white">
                <h5 class="">Productos mas vendidos</h5>
            </div>
            <div class="mt-4">
                <canvas id="myChart" width="100" height="100"></canvas>
            </div>
        </div>
        <div class="col-2">
        </div>
        <div class="col-12 col-sm-4">
            <div class="container-fluid text-center text-white">
                <h5 class="">Ventas</h5>
            </div>
            <div class="mt-4">
                <canvas id="myChart1" width="100" height="100"></canvas>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-1">
        </div>
        <div class="col-12 col-sm-4">
            <div class="container-fluid text-center text-white">
                <h5 class="">Entrada y Salidas</h5>
            </div>
            <div class="mt-4">
                <canvas id="myChart2" width="100" height="100"></canvas>
            </div>
        </div>
        <div class="col-2">
        </div>
        <div class="col-12 col-sm-4">
            <div class="container-fluid text-center text-white">
                <h5 class="">Productos de menor Stock</h5>
            </div>
            <div class="mt-4">
                <canvas id="myChart3" width="100" height="100"></canvas>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>


</div>

<script src="./js/graficasModulos.js?v=1.0"></script>
<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>