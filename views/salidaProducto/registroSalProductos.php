<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<!--Incio de Formulario Registro de Salida Producto-->

    <div class="row">
        <div class="text-center text-white mt-3">
            <h4>Registro de Salida Productos</h4>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-3">
        </div>
        <div class="col-6">
            <div class="mt-2">
                <form class=" mt-4" onsubmit="event.preventDefault(); agregarProducto();">
                <div class=" mt-2">
                    <label for="codProducto" class="form-label text-white mt-3">Codigo Producto:</label>
                    <input type="text" class="form-control" name="codProducto" placeholder="Codigo de barras">
                </div>
                    <!-- <div class="mt-2">
                        <label for="fechaSal" class="form-label text-white mt-3">Fecha Salida:</label>
                        <input type="datetime-local" class="form-control" id="fechaSal" placeholder="">
                    </div>
                    <div class="mt-2">
                        <label for="numIdentCliente" class="form-label text-white mt-3">Cliente:</label>
                        <input type="text" class="form-control" id="numIdentCliente" placeholder="Numero de Cedula">
                    </div> -->
                    <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Agregar Producto</button>
                </div>
                </form>
            </div>
        </div>
        
        <div class="col-3">            
        </div>
    </div>

    <div class=" container row">
        <div class="mt-5">
                <div class="text-center text-white mt-3">
                    <h4>Datos de Salida del Producto</h4>
                </div>
            <div class="table-responsive">
                <table class="table table-hover text-white">
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
                    <tbody>
                        <tr>
                            <td class="text-white align-middle"></td>
                            <td class="text-white align-middle"></td>
                            <td class="text-white align-middle"></td>
                            <td class="text-white align-middle"></td>
                            <td class="text-white align-middle"></td>
                            <td class="text-white align-middle"></td>
                            <td class="text-white align-middle"></td>
                            <td>                        
                                <a href="index.php?action=" class="btn btn-outline-secondary text-white m-2" role="button">Quitar</a>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="5"></td>
                        <td class="text-white align-middle">Total Venta:</td>
                        <td class="text-white align-middle">Cantidad</td>
                
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
    </div>
    <script src="./js/agregaProductoTabla.js"></script>
<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>