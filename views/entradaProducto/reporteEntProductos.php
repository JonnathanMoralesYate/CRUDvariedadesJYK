<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Inicio de Formulario Reporte de Entradas Producto-->
<div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
        <div class="text-center text-white mt-3">
            <h4>Reporte de Entradas de Productos</h4>
        </div>
        <div class="text-center text-white mt-3">
            <p>Fecha de Inicio: <?= htmlspecialchars($entProductos['fechaInc']); ?></p>
            <p>Fecha de Fin: <?= htmlspecialchars($entProductos['fechaFin']); ?></p>
        </div>
    </div>
    <div class="col-2">
    </div>
</div>

<div class="row">
    <div class="col-5">
    </div>
    <div class="col-2 justify-content-center">
        <a class="btn btn-outline-secondary text-white mt-3 text-center w-100" href="index.php?action=reporteEntProductosPDF&fechaInc=<?= htmlspecialchars($entProductos['fechaInc']); ?>&action=reporteEntProductosPDF&fechaFin=<?= htmlspecialchars($entProductos['fechaFin']); ?>" target="_blank">Generar PDF</a>
    </div>
    <div class="col-5">
    </div> 
</div>
<!--Fin de consultar-->

<!--Inicio para mostrar datos para buscar y consultar-->
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <!--Inicio de tabla-->
        <div class="container mt-5">
            <div class="text-center">
                <?php if (isset($entProductos['reporteEntProductos']) && count($entProductos['reporteEntProductos']) > 0): ?>
                    <!-- Tabla responsiva-->
                    <div class="table-responsive mt-5">
                        <table class="table table-hover text-white">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha Entrada</th>
                                    <th>Proveedor</th>
                                    <th>Codigo Producto</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Descripcion</th>
                                    <th>Contenido</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Precio Compra</th>
                                    <th>Cantidad Entrada</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <?php foreach ($entProductos['reporteEntProductos'] as $entProducto): ?>
                                    <tr>
                                        <td class="text-white align-middle"><?= $entProducto['idEntProducto']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['FechaEnt']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['NombreProveedor']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['CodProducto']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['Nombre']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['Marca']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['Descripcion']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['Contenido Neto']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['FechaVencimiento']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['PrecioCompra']; ?></td>
                                        <td class="text-white align-middle"><?= $entProducto['CantEnt']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-white">No se encontró productos con ese criterio de búsqueda.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>