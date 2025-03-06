<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Reporte de Salida de Producto-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="text-center text-white mt-3">
                <h4>Reporte de Salida de Productos</h4>
            </div>
            <div class="text-center text-white mt-3">
                <p>Fecha de Inicio: <?= htmlspecialchars($salProductos['fechaInc']); ?></p>
                <p>Fecha de Fin: <?= htmlspecialchars($salProductos['fechaFin']); ?></p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-secondary text-white mt-3 w-50 text-center" 
                href="index.php?action=reporteSalProductosPDF&fechaInc=<?= htmlspecialchars($salProductos['fechaInc']); ?>&fechaFin=<?= htmlspecialchars($salProductos['fechaFin']); ?>" 
                    target="_blank">
                    Generar PDF
                </a>
            </div>
        </div>
    </div>
</div>
<!--Fin de consultar-->

<!--Inicio para mostrar datos para buscar y consultar-->
<<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <?php if (isset($salProductos['reporteSalProductos']) && count($salProductos['reporteSalProductos']) > 0): ?>
    <!-- Tabla responsiva-->
            <div class="table-responsive mt-5">
            <table class="table table-hover text-white text-center">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Fecha Salida</th>
                        <th>Cliente</th>
                        <th>Codigo Producto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Contenido</th>
                        <th>Cantidad Salida</th>
                        <th>Total Venta</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($salProductos['reporteSalProductos'] as $salProducto): ?>
                    <tr>
                        <!-- <td class="text-white align-middle"><?= $salProducto['idSalProducto']; ?></td> -->
                        <td class="text-white align-middle"><?= $salProducto['FechaSalida']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['NumIdentificacion']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['CodProducto']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['Nombre']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['Marca']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['Descripcion']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['Contenido Neto']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['CantSalida']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['PrecioVenta']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php else: ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>