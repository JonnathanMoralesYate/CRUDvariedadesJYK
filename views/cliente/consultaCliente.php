<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Clientes-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta Clases</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaClienteCedula" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaClienteCedula">
                    <input type="text" class="form-control" placeholder="Numero de Cedula" name="documCliente" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaClienteNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaClienteNombre">
                    <input type="text" class="form-control" placeholder="Nombre Cliente" name="nomCliente" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($clientes) && count($clientes) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover table-striped text-white text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo Documento</th>
                        <th>Numero Documento</th>
                        <th>Nombre</th>
                        <th>Apellid</th>
                        <th>Contacto</th>
                        <th>Correo</th>
                        <th>Puntos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $cliente['idCliente']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['tipoDocum']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['NumIdentificacion']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['Nombres']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['Apellidos']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['NumCelular']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['Email']; ?></td>
                        <td class="text-white align-middle"><?= $cliente['Puntos']; ?></td>
                        <td>                        
                        <a href="index.php?action=actualizarClienteId&idCliente=<?= $cliente['idCliente']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Actualizar</a> 
                        <a href="index.php?action=eliminarClienteId&idCliente=<?= $cliente['idCliente']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($clientes)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>