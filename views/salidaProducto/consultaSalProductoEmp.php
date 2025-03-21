<?php include('./views/layautModEmple/headerModEmplea.php');  ?>

<!--Incio de Formulario Consultar ESalida Producto-->
<div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta Salida de Productos</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaSalProductoIdEmp" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaSalProductoIdEmp">
                    <input type="text" class="form-control" placeholder="ID Salida Producto" name="idSalProducto" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaSalProductoFechaEmp" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaSalProductoFechaEmp">
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
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1"> <!-- Ocupa toda la pantalla en móviles, con margen en pantallas grandes -->
            <!-- Inicio de tabla -->
            <div class="text-center">
                <?php if (isset($salProductos) && count($salProductos) > 0): ?>
                <h4 class="text-white">Resultados de la Búsqueda:</h4>
            </div>
            <!-- Tabla responsiva -->
            <div class="table-responsive">
                <table class="table table-hover text-white text-center">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Fecha Salida</th>
                            <th>Cliente</th>
                            <th>Código Producto</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Contenido</th>
                            <th>Precio Venta</th>
                            <th>Cantidad Salida</th>
                            <th>Forma de Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($salProductos as $salProducto): ?>
                        <tr>
                            <!-- <td class="text-white align-middle"><?= $salProducto['idSalProducto']; ?></td> -->
                            <td class="text-white align-middle"><?= $salProducto['FechaSalida']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['NumIdentificacion']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['CodProducto']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['Nombre']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['Marca']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['Descripcion']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['Contenido Neto']; ?></td>
                            <td class="text-white align-middle"><?= '$' . number_format($salProducto['PrecioVenta'], 0, ',', '.'); ?></td>
                            <td class="text-white align-middle"><?= $salProducto['CantSalida']; ?></td>
                            <td class="text-white align-middle"><?= $salProducto['ModoPago']; ?></td>
                            <td>
                                <a href="index.php?action=actualizarSalProductosIdEmp&idSalProducto=<?= $salProducto['idSalProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100">Actualizar</a>                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
                <?php elseif (isset($salProductos)): ?>
                    <p class="text-white text-center">No se encontraron productos con ese criterio de búsqueda</p>
                <?php endif; ?>
        </div>
    </div>
</div>



<?php include('./views/layautModEmple/footerModEmplea.php');  ?>