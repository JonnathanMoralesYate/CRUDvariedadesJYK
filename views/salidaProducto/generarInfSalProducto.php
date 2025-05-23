<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Entradas Producto-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="text-center text-white mt-3">
                <h4>Reporte de Salida de Productos</h4>
            </div>
            <form class=" mt-5" action="index.php?action=reporteSalProductoFecha" method="get">
                <div class=" mt-2">
                <label for="fechaInc" class="form-label text-white mt-3">Fecha Inicial:</label>
                <input type="hidden" class="form-control" name="action" value="reporteSalProductoFecha">
                <input type="date" class="form-control" placeholder="Fecha Inicial" name="fechaInc" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                </div>
                <div class=" mt-2">
                    <label for="fechaFin" class="form-label text-white mt-3">Fecha Final:</label>
                <input type="hidden" class="form-control" name="action" value="reporteSalProductoFecha">
                <input type="date" class="form-control" placeholder="Fecha final" name="fechaFin" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-light" id="button-addon2">Generar Reporte</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin de consultar-->

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>