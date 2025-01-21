<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Reporte de Inventario de Productos-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Reporte de Inventario</h4>
            </div>
            

            
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
                <?php if (isset($inventarios) && count($inventarios) > 0): ?>
                <h4 class="text-white">Inventario Actualizado:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Presentacion</th>
                        <th>Formato Venta</th>
                        <th>Cantidad Actual</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($inventarios as $inventario): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $inventario['idInventario']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['CodProducto']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['Nombre']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['Marca']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['Descripcion']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['Contenido Neto']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['FormatoVenta']; ?></td>
                        <td class="text-white align-middle"><?= $inventario['CantActual']; ?></td>
                        <td><img src="photo/<?= $inventario['Foto']; ?>" width="100" alt="foto"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($inventarios)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>



<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>