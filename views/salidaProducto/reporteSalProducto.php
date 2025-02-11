<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Reporte de Salida de Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Reporte de Salida de Productos</h4>
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
                <?php if (isset($salProductos) && count($salProductos) > 0): ?>
                <h4 class="text-white"></h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive mt-5">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
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
                <?php foreach ($salProductos as $salProducto): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $salProducto['idSalProducto']; ?></td>
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
                <?php elseif (isset($salProductos)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>