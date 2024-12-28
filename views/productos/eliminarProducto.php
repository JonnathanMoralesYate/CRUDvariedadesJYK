<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Usuario-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Eliminar Productos</h4>
            </div>
            <form class=" mt-4" action="index.php?action=eliminarProductoCodigo" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="eliminarProductoCodigo">
                    <input type="text" class="form-control" placeholder="Codigo Producto" name="codProduc" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Eliminar</button>
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
                        <th>Unidad Base</th>
                        <th>Contenido Neto</th>
                        <th>Precio Venta</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td class="text-white"><?= $producto['idProducto']; ?></td>
                        <td class="text-white"><?= $producto['CodProducto']; ?></td>
                        <td class="text-white"><?= $producto['Clase']; ?></td>
                        <td class="text-white"><?= $producto['Nombre']; ?></td>
                        <td class="text-white"><?= $producto['Marca']; ?></td>
                        <td class="text-white"><?= $producto['Descripcion']; ?></td>
                        <td class="text-white"><?= $producto['Presentacion']; ?></td>
                        <td class="text-white"><?= $producto['UndBase']; ?></td>
                        <td class="text-white"><?= $producto['ContNeto']; ?></td>
                        <td class="text-white"><?= $producto['PrecioVenta']; ?></td>
                        <td><img src="photo/<?= $producto['Foto']; ?>" width="100" alt="foto"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($productos)): ?>
                    <p class="text-white">No se Encontro Ningun Producto Registrado</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>