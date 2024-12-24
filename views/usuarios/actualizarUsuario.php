<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Actualizar Usuario-->
            <div class="col-3">
            </div>
            <div class="col-6">
                <div class="text-center text-white mt-3">
                    <h4>Actualizar Empleado</h4>
                </div>
            <form class=" mt-2" action="index.php?action=actualizarUsuario" method="post">
                <div class=" mt-2">
                    <label for="documUsu" class="form-label text-white mt-3">Numero de Cedula:</label>
                    <input type="text" class="form-control" name="documUsu" required>
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
                    <input type="email" class="form-control" name="correoUsu" required>
                </div>
                <div class="mb-3">
                    <label for="seleccionRol" class="form-label text-white mt-3">Rol:</label>
                        <select id="seleccionRol" name="seleccionRol" class="form-control">
                            <option>-Seleccione el Rol-</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Administrador">Administrador</option>
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
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar</button>
                </div>
                
            </form>
        </div>
        <div class="col-3">
        </div>
        </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>