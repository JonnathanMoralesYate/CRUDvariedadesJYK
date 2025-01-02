<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Registro de Proveedor-->
            <div class="col-3">
            </div>
            <div class="col-6">
            <form class=" mt-2" action="index.php?action=actualizarProveedor" method="post">
                <?php foreach($proveedores as $proveedor): ?>
                <div class=" mt-2">
                    <input type="hidden" class="form-control" name="idProveedor" value="<?= $proveedor['idProveedor']; ?>" placeholder="Nit" required>
                </div>
                <div class=" mt-2">
                    <label for="nitProveedor" class="form-label text-white mt-3">Codigo Empresa:</label>
                    <input type="text" class="form-control" name="nitProveedor" value="<?= $proveedor['NitProveedor']; ?>" placeholder="Nit" required>
                </div>
                <div class="mt-2">
                    <label for="nomProveedor" class="form-label text-white mt-3">Nombre Empresa:</label>
                    <input type="text" class="form-control" name="nomProveedor" value="<?= $proveedor['NombreProveedor']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="correoProv" class="form-label text-white mt-3">Email Empresa:</label>
                    <input type="email" class="form-control" name="correoProv" value="<?= $proveedor['Email']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="celProveedor" class="form-label text-white mt-3">No. Celular Empresa:</label>
                    <input type="text" class="form-control" name="celProveedor" value="<?= $proveedor['CelularProveedor']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="nomVendedor" class="form-label text-white mt-3">Nombre Vendedor:</label>
                    <input type="text" class="form-control" name="nomVendedor" value="<?= $proveedor['NombreVendedor']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="celVendedor" class="form-label text-white mt-3">No. Celular Vendedor:</label>
                    <input type="text" class="form-control" name="celVendedor" value="<?= $proveedor['CelularVendedor']; ?>" placeholder="" required>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Actualizar</button>
                </div>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="col-3">
        </div>
        </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>