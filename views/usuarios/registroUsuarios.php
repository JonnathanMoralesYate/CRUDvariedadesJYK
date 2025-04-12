<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Registro de Usuario-->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-white mt-3">
                <h4>Registro Empleado</h4>
            </div>
            <form class=" mt-2" action="index.php?action=registroUsuario" method="post">
                <div class=" mt-2">
                        <label for="tipoDocum" class="form-label text-white mt-3">Tipo Documento:</label>
                        <select id="tipoDocum" name="tipoDocum" class="form-control" required>
                            <option selected>Seleccione Tipo Documento</option>
                            <?php foreach($tipoDocum as $tipos): ?>
                            <option value="<?= $tipos['idTipoDocum']; ?>">
                            <?= $tipos['tipoDocum']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class=" mt-2">
                    <label for="documUsu" class="form-label text-white mt-3">Numero del Documento:</label>
                    <input type="text" class="form-control" id="documUsu" name="documUsu" required>
                </div>
                <div class="mt-2">
                    <label for="nomUsu" class="form-label text-white mt-3">Nombres:</label>
                    <input type="text" class="form-control" name="nomUsu" required>
                </div>
                <div class="mt-2">
                    <label for="apellUsu" class="form-label text-white mt-3">Apellidos:</label>
                    <input type="text" class="form-control" name="apellUsu" required>
                </div>
                <div class=" mt-2">
                    <label for="numCel" class="form-label text-white mt-3">Numero Celular:</label>
                    <input type="text" class="form-control" name="numCel" required>
                </div>
                <div class="mt-2">
                    <label for="correoUsu" class="form-label text-white mt-3">Email:</label>
                    <input type="email" id="correo" class="form-control" name="correoUsu" required>
                    <small id="correoError" class="text-danger" style="display:none;">Correo no válido</small>
                </div>
                <div class="mb-3">
                    <label for="seleccionRol" class="form-label text-white mt-3">Rol:</label>
                        <select id="seleccionRol" name="seleccionRol" class="form-control" required>
                            <option selected>Seleccione el Rol</option>
                            <option value="2">Empleado</option>
                            <option value="1">Administrador</option>
                        </select>
                </div>
                <div class=" mt-2">
                    <label for="usuario" class="form-label text-white mt-3">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" required>
                </div>
                <div class=" mt-2">
                    <label for="contraseña" class="form-label text-white mt-3">Contraseña:</label>
                    <input type="text" class="form-control" name="contraseña" required>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-light">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
        <script src="./js//verificarUsuario.js?v=1.0"></script>
        <script src="./js/validarCorreo.js?v=1.0"></script>
<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>