<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

    <div class="row">
        <!--Incio de Formulario Actualizar de Producto-->
            <div class="col-3">
            </div>
            <div class="col-6">
                <div class="text-center text-white mt-3">
                    <h4>Registro de Producto</h4>
                </div>
                <form class=" mt-2" action="index.php?action=actualizarProducto" method="post" enctype="multipart/form-data">
                    <?php foreach($productos as $producto): ?>
                <div>
                    <input type="hidden" class="form-control" name="idProducto" value="<?= $producto['idProducto']; ?>" required>
                </div>
                <div class=" mt-2">
                    <label for="codProduc" class="form-label text-white mt-3">Codigo Producto:</label>
                    <input type="text" class="form-control" name="codProduc" value="<?= $producto['CodProducto']; ?>" placeholder="Codigo de barras" required>
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
                    <?php $tipoClase= $producto['idClase']; ?>
                        <select id="tiposClase" name="tiposClase" class="form-control" required>
                            <option selected>Seleccione Clase del Producto</option>
                            <?php foreach($clases as $clase): ?>
                            <option value="<?= $clase['idClase']; ?>" <?= $clase['idClase'] == $tipoClase ? 'selected' : '' ?>>
                            <?= $clase['Clase']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class=" mt-2">
                    <label for="nombreProduc" class="form-label text-white mt-3">Nombre:</label>
                    <input type="text" class="form-control" name="nombreproduc" value="<?= $producto['Nombre']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="marcaProduc" class="form-label text-white mt-3">Marca:</label>
                    <input type="text" class="form-control" name="marcaProduc" value="<?= $producto['Marca']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="descriProduc" class="form-label text-white mt-3">Descripcion:</label>
                    <input type="text" class="form-control" name="descriProduc" value="<?= $producto['Descripcion']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                <label for="tiposPresenta" class="form-label text-white mt-3">Presentacion:</label>
                    <?php $tipoPresent= $producto['idPresentacion']; ?>
                        <select id="tiposPresenta" name="tiposPresenta" class="form-control" required>
                            <option selected>Seleccione presentacion del Producto</option>
                            <?php foreach($presentaciones as $presentacion): ?>
                            <option value="<?= $presentacion['idPresentacion']; ?>" <?= $presentacion['idPresentacion'] == $tipoPresent ? 'selected' : '' ?>>
                            <?= $presentacion['Presentacion']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="mt-2">
                <label for="tiposUnd" class="form-label text-white mt-3">Unidad Base:</label>
                    <?php $tipoUndB= $producto['idUndBase']; ?>
                        <select id="tiposUnd" name="tiposUnd" class="form-control" required>
                            <option selected>Seleccione Unidad Base</option>
                            <?php foreach($undBases as $undBase): ?>
                            <option value="<?= $undBase['idUndBase']; ?>" <?= $undBase['idUndBase'] == $tipoUndB ? 'selected' : '' ?>>
                            <?= $undBase['UndBase']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="mt-2">
                    <label for="contNeto" class="form-label text-white mt-3">Contenido Neto:</label>
                    <input type="number" class="form-control" name="contNeto" value="<?= $producto['ContNeto']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                <label for="formatovent" class="form-label text-white mt-3">Formato Venta:</label>
                    <?php $tipoVenta= $producto['idFormatoVenta']; ?>
<<<<<<< HEAD
                        <select id="formatovent" name="formatovent" class="form-control" required>
=======
                        <select id="formatoVent" name="formatovent" class="form-control" required>
>>>>>>> d5fde1f884bfe120f6a7152ab68a03e3a67e2a92
                            <option selected>Seleccione Formato Venta</option>
                            <?php foreach($formatoVents as $formatoVent): ?>
                            <option value="<?= $formatoVent['idFormatoVenta']; ?>" <?= $formatoVent['idFormatoVenta'] == $tipoVenta ? 'selected' : '' ?>>
                            <?= $formatoVent['FormatoVenta']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class=" mt-2">
                    <label for="precioVenta" class="form-label text-white mt-3">Precio de Venta:</label>
                    <input type="number" class="form-control" name="precioVenta" value="<?= $producto['PrecioVenta']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="fotoProduc" class="form-label text-white mt-3">Foto Actual:</label>
                    <img src="photo/<?= $producto['Foto']; ?>" class="rounded mx-auto d-block" width="100" alt="foto">
                    <input type="hidden" class="form-control" name="fotoProduc_actual" value="<?= $producto['Foto']; ?>" placeholder="">
                </div>
                <div class="mt-2">
                    <label for="fotoProduN" class="form-label text-white mt-3">Cabiar Foto:</label>
                    <input type="file" class="form-control" name="fotoProduc" placeholder="">
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Actualizar Producto</button>
                </div>
                <?php endforeach; ?>
            </form>
        
            </div>
            <div class="col-3">
            </div>
    </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>