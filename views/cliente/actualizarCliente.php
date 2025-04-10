<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Registro de Cliente-->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center text-white mt-3">
                <h4>Actualizar Cliente</h4>
            </div>
            <form class=" mt-2" action="index.php?action=actualizarCliente" method="post">
            <?php foreach($clientes as $cliente): ?>
                <div class=" mt-2">
                    <input type="hidden" class="form-control" name="idCliente" value="<?= $cliente['idCliente']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                <label for="tipoDocum" class="form-label text-white mt-3">Tipo Documento:</label>
                        <?php $tipoDoc= $cliente['idTipoDocum']; ?>
                            <select id="tipoDocum" name="tipoDocum" class="form-control" required>
                                <option selected>Seleccione Tipo Documento</option>
                                    <?php foreach($tipoDocum as $tipos): ?>
                                        <option value="<?= $tipos['idTipoDocum']; ?>" <?= $tipos['idTipoDocum'] == $tipoDoc ? 'selected' : '' ?>>
                                        <?= $tipos['tipoDocum']; ?>
                                </option>
                                    <?php endforeach; ?>
                            </select>
                </div>
                <div class=" mt-2">
                    <label for="documCliente" class="form-label text-white mt-3">Numero Cedula:</label>
                    <input type="text" class="form-control" name="documCliente" value="<?= $cliente['NumIdentificacion']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="nomCliente" class="form-label text-white mt-3">Nombres:</label>
                    <input type="text" class="form-control" name="nomCliente" value="<?= $cliente['Nombres']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="apellCliente" class="form-label text-white mt-3">Apellidos:</label>
                    <input type="text" class="form-control" name="apellCliente" value="<?= $cliente['Apellidos']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="numCel" class="form-label text-white mt-3">No. Celular:</label>
                    <input type="text" class="form-control" name="numCel" value="<?= $cliente['NumCelular']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="correoCliente" class="form-label text-white mt-3">Email:</label>
                    <input type="email" class="form-control" name="correoCliente" value="<?= $cliente['Email']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="puntos" class="form-label text-white mt-3">Puntos Acumulados:</label>
                    <input type="number" class="form-control" name="puntos" value="<?= $cliente['Puntos']; ?>" placeholder="" required>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-outline-light">Actualizar</button>
                </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>