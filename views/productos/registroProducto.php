<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

    <div class="row">
        <!--Incio de Formulario Registro de Producto-->
            <div class="col-3">
            </div>
            <div class="col-6">
                <div class="text-center text-white mt-3">
                    <h4>Registro de Producto</h4>
                </div>
                <form class=" mt-2" action="index.php?action=registroProducto" method="post" enctype="multipart/form-data">
                <div class=" mt-2">
                    <label for="codProduc" class="form-label text-white mt-3">Codigo Producto:</label>
                    <input type="text" class="form-control" name="codProduc" placeholder="Codigo de barras" required>
                </div>
                <div class="mt-4">
                    <div class="text-center">
                            <label class="check-label text-white" for="flexCheckDefault">Generar Codigo</label>
                        <div class="">
                            <input class="checkbox-inline" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                <label for="tiposClase" class="form-label text-white mt-3">Clase:</label>
                        <select id="tiposClase" name="tiposClase" class="form-control">
                            <option selected>Seleccione Clase del Producto</option>
                            <?php foreach($clases as $clase): ?>
                            <option value="<?= $clase['idClase']; ?>">
                            <?= $clase['Clase']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class=" mt-2">
                    <label for="nombreProduc" class="form-label text-white mt-3">Nombre:</label>
                    <input type="text" class="form-control" name="nombreproduc" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="marcaProduc" class="form-label text-white mt-3">Marca:</label>
                    <input type="text" class="form-control" name="marcaProduc" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="descriProduc" class="form-label text-white mt-3">Descripcion:</label>
                    <input type="text" class="form-control" name="descriProduc" placeholder="" required>
                </div>
                <div class=" mt-2">
                <label for="tiposPresenta" class="form-label text-white mt-3">Presentacion:</label>
                        <select id="tiposPresenta" name="tiposPresenta" class="form-control">
                            <option selected>Seleccione presentacion del Producto</option>
                            <?php foreach($presentaciones as $presentacion): ?>
                            <option value="<?= $presentacion['idPresentacion']; ?>">
                            <?= $presentacion['Presentacion']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="mt-2">
                <label for="tiposUnd" class="form-label text-white mt-3">Unidad Base:</label>
                        <select id="tiposUnd" name="tiposUnd" class="form-control">
                            <option selected>Seleccione Unidad Base</option>
                            <?php foreach($undBases as $undBase): ?>
                            <option value="<?= $undBase['idUndBase']; ?>">
                            <?= $undBase['UndBase']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="mt-2">
                    <label for="contNeto" class="form-label text-white mt-3">Contenido Neto:</label>
                    <input type="number" class="form-control" name="contNeto" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="precioVenta" class="form-label text-white mt-3">Precio de Venta:</label>
                    <input type="number" class="form-control" name="precioVenta" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="fotoProduc" class="form-label text-white mt-3">Foto:</label>
                    <input type="file" class="form-control" name="fotoProduc" placeholder="" required>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar Producto</button>
                </div>
            </form>
            
            </div>
            <div class="col-3">
            </div>
    </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>