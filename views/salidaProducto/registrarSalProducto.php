<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Registro de Salida Producto-->
            <div class="col-3">
            </div>
            <div class="col-6">
            <form class=" mt-2" action="index.php?action=registroSalProductos" method="post">
                <div class="text-center text-white mt-3">
                    <h4>Registro de Salida Producto</h4>
                </div>
                <div class=" mt-2">
                    <label for="codProducto" class="form-label text-white mt-3">Codigo Producto:</label>
                    <input type="text" class="form-control" name="codProducto" placeholder="Codigo de barras" required>
                </div>
                <div class="mt-2">
                    <label for="numIdentCliente" class="form-label text-white mt-3">Cliente:</label>
                    <input type="text" class="form-control" name="numIdentCliente" placeholder="Numero de Cedula" required>
                </div>
                <div class="mt-2">
                    <label for="fechaSal" class="form-label text-white mt-3">Fecha Salida:</label>
                    <input type="datetime-local" class="form-control" name="fechaSal" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="cantSal" class="form-label text-white mt-3">Cantidad de Salida:</label>
                    <input type="number" class="form-control" name="cantSal" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="precioVenta" class="form-label text-white mt-3">Precio Venta:</label>
                    <input type="number" class="form-control" name="precioVenta" placeholder="" required>
                </div>
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar Salida</button>
                </div>
                
            </form>
        </div>
        <div class="col-3">
        </div>
        </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>