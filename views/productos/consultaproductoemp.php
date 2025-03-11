<?php include('./views/layautModEmple/headerModEmplea.php');  ?>

<!--Incio de Formulario Consultar Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta de Productos</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaProductosCodigoemp" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaProductosCodigoemp">
                    <input type="text" class="form-control" placeholder="Codigo Producto" name="codProduc" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaProductosNombreemp" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaProductosNombreemp">
                    <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($productos) && count($productos) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Clase</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Presentacion</th>
                        <th>Contenido Neto</th>
                        <th>Precio Venta</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $producto['idProducto']; ?></td>
                        <td class="text-white align-middle"><?= $producto['CodProducto']; ?></td>
                        <td class="text-white align-middle"><?= $producto['Clase']; ?></td>
                        <td class="text-white align-middle"><?= $producto['Nombre']; ?></td>
                        <td class="text-white align-middle"><?= $producto['Marca']; ?></td>
                        <td class="text-white align-middle"><?= $producto['Descripcion']; ?></td>
                        <td class="text-white align-middle"><?= $producto['Presentacion']; ?></td>
                        <td class="text-white align-middle"><?= $producto['Contenido']; ?></td>
                        <td class="text-white align-middle"><?= '$' . number_format($producto['PrecioVenta'], 0, ',', '.'); ?></td>
                        <td><img src="photo/<?= $producto['Foto']; ?>" width="100" alt="foto"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($productos)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModEmple/footerModEmplea.php');  ?>