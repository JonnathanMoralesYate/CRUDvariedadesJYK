<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Producto-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="text-center text-white mt-3">
                <h4>Consulta de Productos</h4>
            </div>
            <!-- Consulta por Código -->
            <form class="mt-4" action="index.php?action=consultaProductosCodigo" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" name="action" value="consultaProductosCodigo">
                    <input type="text" class="form-control" placeholder="Código Producto" name="codProduc" required>
                    <button class="btn btn-outline-secondary text-white" type="submit">Buscar</button>
                </div>
            </form>
            <!-- Consulta por Nombre -->
            <form class="mt-2" action="index.php?action=consultaProductosNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" name="action" value="consultaProductosNombre">
                    <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" required>
                    <button class="btn btn-outline-secondary text-white" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin de consultar-->

<!--Inicio para mostrar datos para buscar y consultar-->
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="text-center">
                <?php if (isset($productos) && count($productos) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
                <table class="table table-hover text-white text-center">
                    <thead>
                        <tr>
                        <!-- <th>ID</th> -->
                            <th>Codigo</th>
                            <th>Clase</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Descripcion</th>
                            <th>Presentacion</th>
                            <th>Contenido Neto</th>
                            <!-- <th>Unidad Base</th> -->
                            <th>Formato Venta</th>
                            <th>Precio Venta</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <!-- <td class="text-white align-middle"><?= $producto['idProducto']; ?></td> -->
                                <td class="text-white align-middle"><?= $producto['CodProducto']; ?></td>
                                <td class="text-white align-middle"><?= $producto['Clase']; ?></td>
                                <td class="text-white align-middle"><?= $producto['Nombre']; ?></td>
                                <td class="text-white align-middle"><?= $producto['Marca']; ?></td>
                                <td class="text-white align-middle"><?= $producto['Descripcion']; ?></td>
                                <td class="text-white align-middle"><?= $producto['Presentacion']; ?></td>
                                <!-- <td class="text-white align-middle"><?= $producto['ContNeto']; ?></td> -->
                                <td class="text-white align-middle"><?= $producto['Contenido']; ?></td>
                                <td class="text-white align-middle"><?= $producto['FormatoVenta']; ?></td>
                                <td class="text-white align-middle"><?= $producto['PrecioVenta']; ?></td>
                                <td><img src="photo/<?= $producto['Foto']; ?>" width="100" alt="foto"></td>
                                <td>                        
                                <a href="index.php?action=actualizarProductosCodigo&codProduc=<?= $producto['CodProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Actualizar</a> 
                                <a href="index.php?action=eliminarProductoCodigo&codProduc=<?= $producto['CodProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
                <?php elseif (isset($productos)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
    </div>
</div>


<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>