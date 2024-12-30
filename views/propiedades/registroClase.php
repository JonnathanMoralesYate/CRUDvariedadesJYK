<?php include('./views/layautModAdmin/headerModAdmin.php'); ?>

<div class="row">
            <!--Incio de Formulario Registro de Clase-->
            <div class="col-3">
            </div>
            <div class="col-6">
                <div class="text-center text-white mt-3">
                    <h4>Registro Clase</h4>
                </div>
            <form class=" mt-2" action="index.php?action=registroClase" method="post">
                <div class=" mt-2">
                    <label for="nomClase" class="form-label text-white mt-3">Clase:</label>
                    <input type="text" class="form-control" name="nomClase" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-outline-secondary text-white mt-3 text-center">Registrar</button>
                </div>
                
            </form>
        </div>
        <div class="col-3">
        </div>
        </div>

<?php include('./views/layautModAdmin/footerModAdmin.php'); ?>