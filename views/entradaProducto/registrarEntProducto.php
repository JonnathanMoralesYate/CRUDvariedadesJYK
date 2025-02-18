<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Registro de Entrada Producto-->
            <div class="col-3">
            </div>
            <div class="col-6">
            <form class=" mt-2" action="index.php?action=registroEntProductos" method="post">
                <div class="text-center text-white mt-3">
                    <h4>Registro Entrada de Productos</h4>
                </div>
                <div class=" mt-2">
                    <label for="codProducto" class="form-label text-white mt-3">Codigo Producto:</label>
                    <input type="text" class="form-control" id="codProducto"  name="codProducto" placeholder="Codigo de barras" required>
                </div>
                <div class="mt-2">
                    <label for="idProveedor" class="form-label text-white mt-3">Codigo Proveedor:</label>
                    <input type="text" class="form-control" name="nitProveedor" placeholder="Nit" required>
                </div>
                <div class="mt-2">
                    <label for="fechaEnt" class="form-label text-white mt-3">Fecha de Entrada:</label>
                    <input type="datetime-local" class="form-control" id="fechaEnt" name="fechaEnt" placeholder="" required>
                </div>
                <div class="mt-2">
                    <label for="fechaVencim" class="form-label text-white mt-3">Fecha de Vencimiento:</label>
                    <input type="date" class="form-control" name="fechaVencim" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="precioCompra" class="form-label text-white mt-3">Precio de Compra:</label>
                    <input type="number" class="form-control" name="precioCompra" placeholder="" required>
                </div>
                <div class=" mt-2">
                    <label for="cantidadEnt" class="form-label text-white mt-3">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidadEnt" placeholder="" required>
                </div>             
                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar Entrada</button>
                </div>
                
            </form>
        </div>
        <script src="./js/agregaFechaActualEntProductos.js?v=1.0"></script>
<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>