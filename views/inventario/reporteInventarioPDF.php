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
    <title>Reporte Inventario PDF JYK</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingBody.css?v=1.0">
    <link rel="stylesheet" href="./css/DesingExtraModulo.css?v=1.0">
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo claro */
            color: #343a40; /* Color de texto oscuro para mejor legibilidad */
        }

        h1 {
            color: #007bff; /* Color azul para el título */
            margin-bottom: 30px;
        }

        .table {
            background-color: #343a40; /* Fondo oscuro para la tabla */
            border: 1px solid #dee2e6; /* Borde sutil */
            border-radius: 8px; /* Bordes redondeados */
        }

        .table th {
            background-color: #007bff; /* Fondo azul para los encabezados */
            color: white; /* Texto blanco */
            text-align: center;
        }

        .table td {
            color: white; /* Texto blanco en las celdas */
            text-align: center; /* Centrar el texto en las celdas */
            vertical-align: middle;
        }

        .img-thumbnail {
            max-width: 100px;
            border-radius: 8px;
            border: 2px solid #007bff; /* Bordes azules a las imágenes */
        }

        footer {
            background-color: #343a40; /* Fondo oscuro para el pie de página */
            color: white; /* Texto blanco */
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Reporte de Inventario Actualizado</h1>

    <!-- Inicio para mostrar datos para buscar y consultar -->
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <!-- Inicio de tabla -->
            <div class="container mt-5">
                <?php if (isset($inventarios) && count($inventarios) > 0): ?>
                    <!-- Tabla responsiva -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Descripción</th>
                                    <th>Presentación</th>
                                    <th>Formato Venta</th>
                                    <th>Cantidad Actual</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($inventarios as $inventario): ?>
                                    <tr>
                                        <td><?= $inventario['idInventario']; ?></td>
                                        <td><?= $inventario['CodProducto']; ?></td>
                                        <td><?= $inventario['Nombre']; ?></td>
                                        <td><?= $inventario['Marca']; ?></td>
                                        <td><?= $inventario['Descripcion']; ?></td>
                                        <td><?= $inventario['Contenido Neto']; ?></td>
                                        <td><?= $inventario['FormatoVenta']; ?></td>
                                        <td><?= $inventario['CantActual']; ?></td>
                                        <td><img class="img-thumbnail rounded" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/CRUDvariedadesJYK/photo/<?=$inventario['Foto'];?>" alt="foto"></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php elseif (isset($inventarios)): ?>
                    <p class="text-white">No se Encontraron Productos en Stock</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <!-- Inicio de Pie de Página -->
    <footer class="text-center">
        <p>© 2024 - VariedadesJyk® / Minimarket Variedades S.A.S. NIT. 110.370.428-1</p>
    </footer>
    <!-- Fin de Pie de Página -->

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

// Configurar las opciones para permitir el uso de recursos remotos
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

// Cargar el HTML y renderizar el PDF
$dompdf->loadHtml($html);

//(Opcional) Establecer tamaño y orientación de la página
$dompdf->setPaper('letter', 'portrait');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador
$dompdf->stream("ReperteInventario.pdf", array("Attachment" => false));


?>