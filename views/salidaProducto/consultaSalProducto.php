<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar ESalida Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta Salida de Productos</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaSalProductoId" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaSalProductoId">
                    <input type="text" class="form-control" placeholder="ID Salida Producto" name="idSalProducto" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaSalProductoFecha" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaSalProductoFecha">
                    <input type="date" class="form-control" placeholder="Fecha salida Producto" name="fechaSal" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($salProductos) && count($salProductos) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
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
                        <th>Precio Venta</th>
                        <th>Cantidad Salida</th>
                        <th>Forma de Pago</th>
                        <th>Acciones</th>
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
                        <td class="text-white align-middle"><?= $salProducto['PrecioVenta']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['CantSalida']; ?></td>
                        <td class="text-white align-middle"><?= $salProducto['ModoPago']; ?></td>
                        <td>                        
                        <a href="index.php?action=actualizarSalProductosId&idSalProducto=<?= $salProducto['idSalProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Actualizar</a> 
                        <a href="index.php?action=eliminarSalProductoId&idSalProducto=<?= $salProducto['idSalProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Eliminar</a>
                        </td>
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