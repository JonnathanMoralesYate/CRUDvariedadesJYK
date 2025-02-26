<?php include('./views/layautModEmple/headerModEmplea.php');  ?>

<div class="row">
            <!--Incio de Formulario Registro de Entrada Producto-->
            <div class="col-3">
            </div>
            <div class="col-6">
            <form class=" mt-2" action="index.php?action=registroEntProductos" method="post">
            <div class="text-center text-white mt-3">
                    <h4>Registro Entrada de Productos</h4>
                </div>
                <div class="mt-2">
                    <label for="codProducto" class="form-label text-white mt-3">Código Producto:</label>
                <div class="contenedor">
                    <input type="text" class="form-control" id="codProducto" name="codProducto" placeholder="Código de barras" required>
                    <p id="resultado"></p>
                </div>
                </div>
                <div class="mt-2">
                    <label for="nitProveedor" class="form-label text-white mt-3">Codigo Proveedor:</label>
                <div class="contenedor">
                    <input type="text" class="form-control" id="nitProveedor" name="nitProveedor"  placeholder="Nit" required>
                    <p id="resultado1"></p>
                </div>
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
        <script src="./js/agregaFechaActualEntProductos.js"></script>
<?php include('./views/layautModEmple/footerModEmplea.php');  ?>