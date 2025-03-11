<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Reporte de Inventario de Productos-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="text-center text-white mt-3">
                <h4>Reporte de Productos Proximo a vencer</h4>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-secondary text-white mt-3 w-50 text-center" 
                    href="index.php?action=productosAvencerPDF" 
                    target="_blank">
                    Generar PDF
                </a>
            </div>
        </div>
    </div>
</div>
<!--Fin de consultar-->

<!--Inicio para mostrar datos para buscar y consultar-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="text-center text-white mt-3">
                <?php if (isset($productosAvencer) && count($productosAvencer) > 0): ?>
                <h4 class="text-white">Productos Proximos a Vencer:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white text-center">
                <thead>
                    <tr>
                        <th>Codigo Producto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Presentacion</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Proveedor</th>
                        <th>Cantidad Actual</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($productosAvencer as $productosVence): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $productosVence['CodProducto']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Nombre']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Marca']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Descripcion']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Contenido Neto']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['FechaVencimiento']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['NombreProveedor']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['CantActual']; ?></td>
                        <td><img src="photo/<?= $productosVence['Foto']; ?>" width="100" alt="foto"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($productosAvencer)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>