<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Proveedores-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta de Proveedores</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaProveedorId" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaProveedorId">
                    <input type="text" class="form-control" placeholder="ID Proveedor" name="idProveedor" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaProveedorNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaProveedorNombre">
                    <input type="text" class="form-control" placeholder="Nombre Proveedor" name="nomProveedor" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaVendedorNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaVendedorNombre">
                    <input type="text" class="form-control" placeholder="Nombre Vendedor" name="nomVendedor" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($proveedores) && count($proveedores) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nit</th>
                        <th>Nombre Empresa</th>
                        <th>Correo</th>
                        <th>Contacto de Empresa</th>
                        <th>Nombre Vendedor</th>
                        <th>Contacto Vendedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($proveedores as $proveedor): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $proveedor['idProveedor']; ?></td>
                        <td class="text-white align-middle"><?= $proveedor['NitProveedor']; ?></td>
                        <td class="text-white align-middle"><?= $proveedor['NombreProveedor']; ?></td>
                        <td class="text-white align-middle"><?= $proveedor['Email']; ?></td>
                        <td class="text-white align-middle"><?= $proveedor['CelularProveedor']; ?></td>
                        <td class="text-white align-middle"><?= $proveedor['NombreVendedor']; ?></td>
                        <td class="text-white align-middle"><?= $proveedor['CelularVendedor']; ?></td>
                        <td class="text-white align-middle">
                        <a href="index.php?action=actualizarProveedorId&idProveedor=<?= $proveedor['idProveedor']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Actualizar</a> 
                        <a href="index.php?action=eliminarProveedorId&idProveedor=<?= $proveedor['idProveedor']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($proveedores)): ?>
                    <p class="text-white">No se Encontro Proveedor con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>