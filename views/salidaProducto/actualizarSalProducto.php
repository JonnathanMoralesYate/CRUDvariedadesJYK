<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Registro de Salida Producto-->
            <div class="col-3">
            </div>
            <div class="col-6">
            <form class=" mt-2" action="index.php?action=actualizarSalProductos" method="post">
                <div class="text-center text-white mt-3">
                    <h4>Actualizar Salida Producto</h4>
                </div>
                <?php foreach ($salProductos as $salProducto): ?>
                    <div class=" mt-2">
                    <input type="hidden" class="form-control" name="idSalProducto" value="<?= $salProducto['idSalProducto']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="codProducto" class="form-label text-white mt-3">Codigo Producto:</label>
                    <input type="text" class="form-control" name="codProducto" value="<?= $salProducto['CodProducto']; ?>" placeholder="Codigo de barras" required>
                </div>
                <div class="mt-2">
                    <label for="numIdentCliente" class="form-label text-white mt-3">Cliente:</label>
                    <input type="text" class="form-control" name="numIdentCliente" value="<?= $salProducto['NumIdentificacion']; ?>" placeholder="Numero de Cedula" required>
                </div>
                <div class="mt-2">
                    <label for="fechaSal" class="form-label text-white mt-3">Fecha Salida:</label>
                    <input type="datetime-local" class="form-control" name="fechaSal" value="<?= $salProducto['FechaSalida']; ?>" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="cantSal" class="form-label text-white mt-3">Cantidad de Salida:</label>
                    <input type="number" class="form-control" name="cantSal" value="<?= $salProducto['CantSalida']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="precioVenta" class="form-label text-white mt-3">Precio Venta:</label>
                    <input type="number" class="form-control" name="precioVenta" value="<?= $salProducto['PrecioVenta']; ?>" placeholder="" required>
                </div>
                <div class=" mt-2">
                <label for="tipoPago" class="form-label text-white mt-3">Modo de Pago:</label>
                <?php $formaDePago= $salProducto['idModoPago']; ?>
                        <select id="tipoPago" name="tipoPago" class="form-control" required>
                            <option selected>Seleccione la Forma de Pago</option>
                            <?php foreach($formaPagos as $formaPago): ?>
                            <option value="<?= $formaPago['idModoPago']; ?>" <?= $formaPago['idModoPago'] == $formaDePago ? 'selected' : '' ?>>
                            <?= $formaPago['ModoPago']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Actualizar Salida</button>
                </div>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="col-3">
        </div>
        </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>