<?php include('./views/layautModEmple/headerModEmplea.php');  ?>


<!--Incio de Formulario Consultar Entradas Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta Entrada de Productos</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaEntProductoIdEmp" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaEntProductoIdEmp">
                    <input type="text" class="form-control" placeholder="ID Entrada Producto" name="idEntProducto" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaEntProductoFechaEmp" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaEntProductoFechaEmp">
                    <input type="date" class="form-control" placeholder="Fecha Entrada Producto" name="fechaEnt" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($entProductos) && count($entProductos) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
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
                        <th>Acciones</th>
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
                        <td class="text-white align-middle"><?= '$' . number_format($entProducto['PrecioCompra'], 0, ',', '.'); ?></td>
                        <td class="text-white align-middle"><?= $entProducto['CantEnt']; ?></td>
                        <td>                        
                        <a href="index.php?action=actualizarEntProductosIdEmp&idEntProducto=<?= $entProducto['idEntProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($EntProductos)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>
<?php include('./views/layautModEmple/footerModEmplea.php');  ?>