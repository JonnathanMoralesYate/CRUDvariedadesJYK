<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Registro de Proveedor-->
            <div class="col-3">
            </div>
            <div class="col-6">
            <form class=" mt-2" action="index.php?action=registroProveedor" method="post">
            <div class="text-center text-white mt-3">
                    <h4>Registro Proveedor</h4>
                </div>
                <div class=" mt-2">
                    <label for="nitProveedor" class="form-label text-white mt-3">Codigo Empresa:</label>
                    <input type="text" class="form-control" name="nitProveedor" placeholder="Nit" required>
                </div>
                <div class="mt-2">
                    <label for="nomProveedor" class="form-label text-white mt-3">Nombre Empresa:</label>
                    <input type="text" class="form-control" name="nomProveedor" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="correoProv" class="form-label text-white mt-3">Email Empresa:</label>
                    <input type="email" class="form-control" name="correoProv" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="celProveedor" class="form-label text-white mt-3">No. Celular Empresa:</label>
                    <input type="text" class="form-control" name="celProveedor" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="nomVendedor" class="form-label text-white mt-3">Nombre Vendedor:</label>
                    <input type="text" class="form-control" name="nomVendedor" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="celVendedor" class="form-label text-white mt-3">No. Celular Vendedor:</label>
                    <input type="text" class="form-control" name="celVendedor" placeholder="" required>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar</button>
                </div>
                
            </form>
        </div>
        <div class="col-3">
        </div>
        </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>