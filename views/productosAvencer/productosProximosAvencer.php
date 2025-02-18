<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Reporte de Inventario de Productos-->
<div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
        <div class="text-center text-white mt-3">
            <h4>Reporte de Productos Proximo a vencer</h4>
        </div>
    </div>
    <div class="col-2">
    </div>
</div>
<div class="row">
    <div class="col-5">
    </div>
    <div class="col-2 justify-content-center">
        <a class="btn btn-outline-secondary text-white mt-3 text-center w-100" href="http://localhost/CRUDvariedadesJYK/index.php?action=productosAvencerPDF" target="_blank">Generar PDF</a>
    </div>
    <div class="col-5">
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
                <?php if (isset($productosAvencer) && count($productosAvencer) > 0): ?>
                <h4 class="text-white">Productos a Vencer:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Cantidad Actual</th>
                        <th>Codigo Producto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Presentacion</th>
                        <th>Proveedor</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($productosAvencer as $productosVence): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $productosVence['idInventario']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['FechaVencimiento']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['CantActual']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['CodProducto']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Nombre']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Marca']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Descripcion']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Contenido Neto']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['NombreProveedor']; ?></td>
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
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>