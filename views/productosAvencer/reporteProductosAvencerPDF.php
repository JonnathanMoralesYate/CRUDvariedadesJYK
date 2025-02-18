<?php

session_start();

// Verifica si $_SESSION está vacío (no tiene ninguna variable)
if (empty($_SESSION)) {
    // Redirigir a:
    header("Location: index.php?action=paginaP");
    exit;
}

// Verificar si el usuario tiene el rol de administrador
if ($_SESSION['rol'] == 2) {
     // Redirigir a:
    header("Location: index.php?action=vistaEmple");
    exit;
}

ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="/img/logoPesta.ico" type="image/x-icon">
    <title>Reporte Productos Proximos a Vencer PDF JYK</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingBody.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingExtraModulo.css?v=1.0">
</head>
<body>
<div class="container">
    <!--Incio de Reporte de Productos Proximos a Vencer-->
    <div class="row">
        <div class="col-2">
        </div>
    <div class="col-8">
        <div class="text-center text-white mt-3">
            <h4>Reporte de Productos Proximos a Vencer</h4>
        </div>
    </div>
    <div class="col-2">
    </div>
    </div>
    <!--Fin de consultar-->

<!--Inicio para mostrar datos para buscar y consultar-->
<div class="row">
            <div class="col-1">
            </div>
        <div class="col-10">
    <!--Inicio de tabla-->
        <div class="container mt-5">
            <?php if (isset($productosAvencer) && count($productosAvencer) > 0): ?>
    <!-- Tabla responsiva-->
            <div class="table-responsive">
            <table class="table table-hover text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Cantidad Actual</th>
                        <th>Codigo Producto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Presentacion</th>
                        <th>Proveedor</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="">
                <?php foreach ($productosAvencer as $productosVence): ?>
                    <tr>
                        <td class="text-white align-middle"><?= $productosVence['idInventario']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['FechaVencimiento']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['CantActual']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['CodProducto']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Nombre']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Marca']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Descripcion']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['Contenido Neto']; ?></td>
                        <td class="text-white align-middle"><?= $productosVence['NombreProveedor']; ?></td>
                        <td><img class="img-thumbnail rounded" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/CRUDvariedadesJYK/photo/<?=$productosVence['Foto'];?>" alt="foto"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
                <?php elseif (isset($productosAvencer)): ?>
                    <p class="text-white">No se Encontro Productos Proximos a Vencer</p>
                <?php endif; ?>
        </div>
        <div class="col-1">
        </div>
    </div>
    </div>

    <!-- Inicio de Pie de Página -->
    <footer class="text-center">
        <p>© 2024 - VariedadesJyk® / Minimarket Variedades S.A.S. NIT. 110.370.428-1</p>
    </footer>
    <!-- Fin de Pie de Página -->
</div>

    <script src="./js/bootstrap.bundle.min.js?v=1.0"></script>
</body>
</html>

<?php

$html=ob_get_clean();
//echo $html;

require('./library/dompdf/vendor/autoload.php');
use Dompdf\Dompdf;
use Dompdf\Options;

// Crear una nueva instancia de Dompdf
$dompdf = new Dompdf();

// Cargar el HTML si esta en otra ruta
//$html = file_get_contents('./views/productosAvencer/reporteProductosAvencerPDF.php');

// Configurar las opciones para permitir el uso de recursos remotos
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

// Cargar el HTML y renderizar el PDF
$dompdf->loadHtml($html);

//(Opcional) Establecer tamaño y orientación de la página
//$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper('letter', 'landscape');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador
$dompdf->stream("ReperteProductosAvencer.pdf", array("Attachment" => false));

?>