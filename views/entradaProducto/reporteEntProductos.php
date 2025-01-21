<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Reporte de Entradas Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Reporte de Entradas de Productos</h4>
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
                <?php if (isset($entProductos) && count($entProductos) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
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
                <?php foreach ($entProductos as $entProducto): ?>
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
                <?php elseif (isset($entProductos)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>