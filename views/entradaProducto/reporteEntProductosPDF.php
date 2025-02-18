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
    <title>Reporte Inventario PDF JYK</title>

<style>
/* Configurar el tamaño de la página para PDF */
@page {
    size: A4 landscape;
    margin: 20px;
}

/* Estilos generales */
body {
    font-family: Arial, sans-serif;
    font-size: 12px;
    margin: 0;
    padding: 20px;
    background: white;
}

/* Encabezado */
.header {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background-color: #004080;
    color: white;
    padding: 20px;
    border-radius: 10px;
}

.logo {
    width: 100px;
    height: 100px;
    margin-right: 20px;
}

/* Contenedor principal: usa flexbox para dividir en dos columnas */
.report-container {
    display: flex;
    justify-content: center; /* Distribuye los elementos a los extremos */
    padding: 5px;
    margin-bottom: 5px;
}

/* Estilos para ambas secciones */
.report-info, .report-date {
    display: grid;
    justify-content: center; /* Distribuye los elementos a los extremos */
    align-items: center; /* Alinea verticalmente */
    padding: 15px;
    background-color: #f8f8f8; /* Fondo gris claro */
    border-radius: 5px;
}

/* Texto dentro de las secciones */
.report-info h4, .report-info h5, 
.report-date h4, .report-date p {
    margin: 5px 0;
}

.report-info span {
    font-weight: bold;
    color: #004080;
}

/* Tabla optimizada para PDF */
.table-container {
    width: 100%;
    overflow: hidden;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 10px;  /* Reducimos el tamaño de la fuente */
}

thead {
    background-color: #004080;
    color: white;
    font-weight: bold;
}

th, td {
    border: 1px solid #000;
    padding: 5px;
    text-align: center;
    word-wrap: break-word;
}

/* Alternar colores de filas */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Pie de página */
footer {
    text-align: center;
    font-size: 10px;
    padding: 5px;
    margin-top: 10px;
    /*border-top: 2px solid #004080;*/
}
</style>
</head>

<body>

    <!-- Encabezado con Logo -->
    <div class="header">
        <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/CRUDvariedadesJYK/photo/logoPrin1.1.jpeg" alt="Logo" class="logo">
        <h2>MINIMARKET VARIEDADES JYK</h2>
    </div>

    <!-- Contenedor principal para los datos generales -->
<div class="report-container">
    
    <!-- Datos Generales del Reporte (Izquierda) -->
    <div class="report-info">
        <div><h4>Reporte generado por: <span><?= htmlspecialchars($_SESSION['nombre']); ?></span></h4></div>
        <div><h5>Fecha generación: <span><?php date_default_timezone_set('America/Bogota'); echo date('Y-m-d H:i:s'); ?></span></h5></div>
    </div>

    <!-- Información del Reporte (Derecha) -->
    <div class="report-date">
        <div><h4>Reporte de Entradas de Productos</h4></div>
        <div><p><strong>Fecha de Inicio:</strong> <?= htmlspecialchars($entProductos['fechaInc']); ?></p></div>
        <div><p><strong>Fecha de Fin:</strong> <?= htmlspecialchars($entProductos['fechaFin']); ?></p></div>
    </div>

</div>

    <!-- Tabla de Reporte de Entradas de Productos -->
    <div class="table-container">
        <?php if (!empty($entProductos['reporteEntProductos'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Entrada</th>
                        <th>Proveedor</th>
                        <th>Código Producto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Contenido</th>
                        <th>Fecha Vencimiento</th>
                        <th>Precio Compra</th>
                        <th>Cantidad Entrada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entProductos['reporteEntProductos'] as $entProducto): ?>
                        <tr>
                            <td><?= htmlspecialchars($entProducto['idEntProducto']); ?></td>
                            <td><?= htmlspecialchars($entProducto['FechaEnt']); ?></td>
                            <td><?= htmlspecialchars($entProducto['NombreProveedor']); ?></td>
                            <td><?= htmlspecialchars($entProducto['CodProducto']); ?></td>
                            <td><?= htmlspecialchars($entProducto['Nombre']); ?></td>
                            <td><?= htmlspecialchars($entProducto['Marca']); ?></td>
                            <td><?= htmlspecialchars($entProducto['Descripcion']); ?></td>
                            <td><?= htmlspecialchars($entProducto['Contenido Neto']); ?></td>
                            <td><?= htmlspecialchars($entProducto['FechaVencimiento']); ?></td>
                            <td><?= htmlspecialchars($entProducto['PrecioCompra']); ?></td>
                            <td><?= htmlspecialchars($entProducto['CantEnt']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No se encontraron productos con ese criterio de búsqueda.</p>
        <?php endif; ?>
    </div>

    <!-- Pie de Página -->
    <footer>
        <p>© 2024 - VariedadesJyk® / Minimarket Variedades S.A.S. NIT. 110.370.428-1</p>
    </footer>

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
$dompdf->setPaper('A4', 'landscape');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador
$dompdf->stream("ReperteEntProductos.pdf", array("Attachment" => false));


?>