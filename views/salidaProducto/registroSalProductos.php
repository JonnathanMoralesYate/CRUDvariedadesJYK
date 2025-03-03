<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Registro de Salida Producto-->

    <div class="row">
        <div class="text-center text-white mt-4">
            <h4>Registro de Salida Productos</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-1">
        </div>
        <div class="col-5 d-flex justify-content-center align-items-center">
            <div>
                <label for="codProducto" class="form-label text-white mt-3">Codigo Producto:</label>
                <input type="text" class="form-control" id="codProductoS" name="codProducto" placeholder="Ingrese Codigo de barras">
            </div>
        </div>
        <div class="col-5 d-flex justify-content-center align-items-center">
            <div>
            <div class="mt-2">
                    <label for="numIdentCliente" class="form-label text-white mt-3">Cliente:</label>
                <div class="contenedor">
                    <input type="text" class="form-control" id="numIdentCliente" name="numIdentCliente" placeholder="Numero de Cedula" required>
                    <p id="resultado1"></p>
                </div>
                </div>
            <div class="mt-2">
                <label for="fechaSal" class="form-label text-white mt-3">Fecha Salida:</label>
                <input type="datetime-local" class="form-control" id="fechaSal" name="fechaSal" placeholder="" required>
            </div>
            <div class=" mt-2">
                <label for="tipoPago" class="form-label text-white mt-3">Modo de Pago:</label>
                    <select id="tipoPago" name="tipoPago" class="form-control" required>
                    <?php foreach($formaPagos as $formaPago): ?>
                        <option value="<?= $formaPago['idModoPago']; ?>">
                        <?= $formaPago['ModoPago']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
            </div>
            </div>
        </div>
        <div class="col-1">            
        </div>
    </div>

    <div class="container-fluid row">
        <div class="col-1">            
        </div>
        <div class="col-10">
            <div class="mt-5">
                <div class="text-center text-white mt-3">
                    <h4>Datos de Salida del Producto</h4>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tablaSalidaProductos" class="table text-white">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Contenido</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- <td colspan=""></td> -->
                                <td colspan="6" class="text-white align-middle">Total Venta:</td>
                                <td id="totalVenta" class="text-white align-middle">$0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            
                <!-- Botón para registrar las salidas -->
            <div class="text-center mt-4">
                <button id="registrarSalida" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar Salidas</button>
            </div>
        </div>
        </div>
        <div class="col-1">            
        </div>
    </div>

    <script src="./js/agregaProductoTabla.js?v=1.0"></script>
<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>