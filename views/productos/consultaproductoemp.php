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


<!--Inicio de Formulario Consultar Producto-->
<?php $data = $productos; ?>

<!-- Formulario de búsqueda -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="text-center text-white mt-3">
                <h4>Consulta de Productos</h4>
            </div>
            <!-- Buscar por Código -->
            <form class="mt-4" action="index.php?action=consultaProductosCodigoEmp" method="get">
                <input type="hidden" name="action" value="consultaProductosCodigoEmp">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Código Producto" name="codProduc" required>
                    <button class="btn btn-outline-secondary text-white" type="submit">Buscar</button>
                </div>
            </form>
            <!-- Buscar por Nombre -->
            <form class="mt-2" action="index.php?action=consultaProductosNombreEmp" method="get">
                <input type="hidden" name="action" value="consultaProductosNombreEmp">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre Producto" name="nombre" required>
                    <button class="btn btn-outline-secondary text-white" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Mostrar resultados -->
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="text-center">
                <?php if (isset($data['productos']) && count($data['productos']) > 0): ?>
                    <h4 class="text-white">Resultados de la Búsqueda:</h4>
            </div>
            <div class="table-responsive">
                <table class="table text-white text-center">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Clase</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Descripción</th>
                            <th>Presentación</th>
                            <th>Contenido Neto</th>
                            <th>Formato Venta</th>
                            <th>Precio Venta</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['productos'] as $producto): ?>
                            <tr>
                                <td><?= $producto['CodProducto']; ?></td>
                                <td><?= $producto['Clase']; ?></td>
                                <td><?= $producto['Nombre']; ?></td>
                                <td><?= $producto['Marca']; ?></td>
                                <td><?= $producto['Descripcion']; ?></td>
                                <td><?= $producto['Presentacion']; ?></td>
                                <td><?= $producto['Contenido']; ?></td>
                                <td><?= $producto['FormatoVenta']; ?></td>
                                <td><?= '$' . number_format($producto['PrecioVenta'], 0, ',', '.'); ?></td>
                                <td><img src="photo/<?= $producto['Foto']; ?>" width="100"></td>
                                <td><a href="index.php?action=actualizarProductosCodigoEmp&codProduc=<?= $producto['CodProducto']; ?>" class="btn btn-outline-secondary text-white m-2 w-100">Actualizar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <?php
                    $totalPaginas = $data['totalPaginas'];
                    $paginaActual = $data['pagina'];
                    $tipo = $data['tipo']; // 'codigo' o 'nombre'
                    $filtro = urlencode($data['filtro']);
                    $param = $tipo === 'codigo' ? "codProduc=$filtro" : "nombre=$filtro";
                    $action = $tipo === 'codigo' ? 'consultaProductosCodigo' : 'consultaProductosNombre';

                    $maxPaginasVisibles = 7;
                    $inicio = max(1, $paginaActual - intval($maxPaginasVisibles / 2));
                    $fin = min($inicio + $maxPaginasVisibles - 1, $totalPaginas);
                    if (($fin - $inicio + 1) < $maxPaginasVisibles) {
                        $inicio = max(1, $fin - $maxPaginasVisibles + 1);
                    }
            ?>

            <!-- Paginación PHP -->
            <?php if ($totalPaginas > 1): ?>
                <?php if ($totalPaginas > 1): ?>
                    <nav>
                        <ul class="pagination justify-content-center flex-wrap mt-5">
                            <!-- Anterior -->
                            <li class="page-item <?= $paginaActual <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?action=<?= $action ?>&<?= $param ?>&pagina=<?= $paginaActual - 1 ?>">Anterior</a>
                            </li>

                            <!-- Numeración -->
                            <?php for ($i = $inicio; $i <= $fin; $i++): ?>
                                <li class="page-item <?= $paginaActual == $i ? 'active' : '' ?>">
                                    <a class="page-link" href="?action=<?= $action ?>&<?= $param ?>&pagina=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Siguiente -->
                            <li class="page-item <?= $paginaActual >= $totalPaginas ? 'disabled' : '' ?>">
                                <a class="page-link" href="?action=<?= $action ?>&<?= $param ?>&pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>

        <?php else: ?>
            <p class="text-white text-center">No se encontraron productos con ese criterio de búsqueda.</p>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php include('./views/layautModEmple/footerModEmplea.php');  ?>