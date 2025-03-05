<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Consultar Producto-->
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-8">
            <div class="text-center text-white mt-3">
                <h4>Consulta Clases</h4>
            </div>
            <form class=" mt-4" action="index.php?action=consultaClaseId" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaClaseId">
                    <input type="text" class="form-control" placeholder="ID Clase" name="idClase" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary text-white" type="submit" id="button-addon2">Buscar</button>
                </div>
            </form>

            <form class=" mt-2" action="index.php?action=consultaClaseNombre" method="get">
                <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="action" value="consultaClaseNombre">
                    <input type="text" class="form-control" placeholder="Nombre Clase" name="nomClase" aria-label="Recipient's usernam" aria-describedby="button-addon2" required>
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
                <?php if (isset($clases) && count($clases) > 0): ?>
                <h4 class="text-white">Resultados de la Busqueda:</h4>
            </div>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
                <table class="table table-hover text-white text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clase</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php foreach ($clases as $clase): ?>
                            <tr>
                                <td class="text-white align-middle"><?= $clase['idClase']; ?></td>
                                <td class="text-white align-middle"><?= $clase['Clase']; ?></td>
                                <td>                        
                                <a href="index.php?action=actualizarClaseId&idClase=<?= $clase['idClase']; ?>" class="btn btn-outline-secondary text-white m-2 w-30" role="button">Actualizar</a> 
                                <a href="index.php?action=eliminarClaseId&idClase=<?= $clase['idClase']; ?>" class="btn btn-outline-secondary text-white m-2 w-30" role="button">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
                <?php elseif (isset($clases)): ?>
                    <p class="text-white">No se Encontro Productos con ese Criterio de Busqueda</p>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>