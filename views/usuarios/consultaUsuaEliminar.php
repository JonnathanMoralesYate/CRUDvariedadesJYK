<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Eliminar Usuario-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Eliminar Empleado por ID</h4>
            </div>
            <form class=" mt-4" action="index.php?action=eliminarUsuarioId" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="eliminarUsuarioId">
                    <input type="text" class="form-control" placeholder="ID Usuario" name="idUsuario" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($usuarios) && count($usuarios) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo Documento</th>
                        <th>Numero Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td class="text-white"><?= $usuario['idUsuario']; ?></td>
                        <td class="text-white"><?= $usuario['tipoDocum']; ?></td>
                        <td class="text-white"><?= $usuario['NumIdentificacion']; ?></td>
                        <td class="text-white"><?= $usuario['Nombres']; ?></td>
                        <td class="text-white"><?= $usuario['Apellidos']; ?></td>
                        <td class="text-white"><?= $usuario['NumCelular']; ?></td>
                        <td class="text-white"><?= $usuario['Email']; ?></td>
                        <td class="text-white"><?= $usuario['Rol']; ?></td>
                        <td class="text-white"><?= $usuario['Usuario']; ?></td>
                        <td class="text-white"><?= $usuario['Contraseña']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($usuarios)): ?>
                    <p class="text-white">No se Encontro Usuario con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>