<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta Formato Venta</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaFormatoVentaId" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaFormatoVentaId">
                    <input type="text" class="form-control" placeholder="ID Formato Venta" name="idFormatoVenta" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaFormatoVentaNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaFormatoVentaNombre">
                    <input type="text" class="form-control" placeholder="Nombre Formato Venta" name="nomFormatoVenta" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>
    </div>
    <div class="col-2">
    </div>
</div>
<!--Fin de consultar-->

<!--Inicio para mostrar datos para buscar y consultar-->
<div class="row">
            <div class="col-1">
            </div>
        <div class="col-10">
    <!--Inicio de tabla-->
        <div class="container mt-5">
            <div class="text-center">
                <?php if (isset($formatoVentas) && count($formatoVentas) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped text-white text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Formato Venta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($formatoVentas as $formatoVenta): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $formatoVenta['idFormatoVenta']; ?></td>
                        <td class="text-white align-middle"><?= $formatoVenta['FormatoVenta']; ?></td>
                        <td>                        
                        <a href="index.php?action=actualizarFormatoVentaId&idFormatoVenta=<?= $formatoVenta['idFormatoVenta']; ?>" class="btn btn-outline-secondary text-white w-20" role="button">Actualizar</a> 
                        <a href="index.php?action=eliminarFormatoVentaId&idFormatoVenta=<?= $formatoVenta['idFormatoVenta']; ?>" class="btn btn-outline-secondary text-white w-20" role="button">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($formatoVentas)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>