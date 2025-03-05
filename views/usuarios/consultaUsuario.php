<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Usuario-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta de Empleado</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaUsuarioId" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaUsuarioId">
                    <input type="text" class="form-control" placeholder="Identificacion Usuario" name="numIdentUsuario" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaUsuarioNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaUsuarioNombre">
                    <input type="text" class="form-control" placeholder="Nombre de Usuario" name="nombre" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
        <div class="col-12 col-md-10 offset-md-1">
            <div class="text-center">
                <?php if (isset($usuarios) && count($usuarios) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
                <table class="table table-hover text-white text-center">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Numero Documento</th>
                            <th>Tipo Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Usuario</th>
                            <!-- <th>Contraseña</th> -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <!-- <td class="text-white align-middle"><?= $usuario['idUsuario']; ?></td> -->
                                <td class="text-white align-middle"><?= $usuario['NumIdentificacion']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['tipoDocum']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['Nombres']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['Apellidos']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['NumCelular']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['Email']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['Rol']; ?></td>
                                <td class="text-white align-middle"><?= $usuario['Usuario']; ?></td>
                                <!-- <td class="text-white align-middle"><?= $usuario['Contraseña']; ?></td> -->
                                <td class="text-white align-middle">
                                <a href="index.php?action=actualizarUsuarioId&idUsuario=<?= $usuario['idUsuario']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Actualizar</a> 
                                <a href="index.php?action=eliminarUsuarioId&idUsuario=<?= $usuario['idUsuario']; ?>" class="btn btn-outline-secondary text-white m-2 w-100" role="button">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
                <?php elseif (isset($usuarios)): ?>
                    <p class="text-white">No se Encontro Usuario con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>