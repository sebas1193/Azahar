<?php
require_once('conexion.php');
session_start();
$usuario = $_SESSION['username'];

$dataArray = array();

$sql = "SELECT tipo, COUNT(*) as conteo FROM producto GROUP BY tipo";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tipo = $row["tipo"];
        $conteo = intval($row["conteo"]);
        $dataArray[] = array($tipo, $conteo);
    }
}

$promedioArray = array();

$sql_promedio = "SELECT tipo, AVG(precio) as promedio_precio FROM producto GROUP BY tipo";
$result_promedio = $conexion->query($sql_promedio);

if ($result_promedio->num_rows > 0) {
    while ($row = $result_promedio->fetch_assoc()) {
        $tipo = $row["tipo"];
        $promedio_precio = floatval($row["promedio_precio"]);
        $promedioArray[] = array($tipo, $promedio_precio);
    }
}

// Obtener información de materia_p para el gráfico
$materiaPrimaArray = array();

$sql_materia_prima = "SELECT nombre, cantidad, p_reorden FROM materia_p";
$result_materia_prima = $conexion->query($sql_materia_prima);

if ($result_materia_prima->num_rows > 0) {
    while ($row = $result_materia_prima->fetch_assoc()) {
        $nombre = $row["nombre"];
        $cantidad = intval($row["cantidad"]);
        $p_reorden = intval($row["p_reorden"]);
        
        // Determinar si hay escasez de producto
        $escasez = ($cantidad < $p_reorden) ? true : false;
        
        // Color del estado
        $color = ($escasez) ? "red" : "green";
        
        $materiaPrimaArray[] = array($nombre, $cantidad, $color);
    }
}
$sql2 = "
    SELECT p.nombre, SUM(d.cant_prodct) as total_vendido
    FROM detalle d
    INNER JOIN producto p ON d.cod_p = p.codigo
    INNER JOIN pedidos pe ON d.n_venta = pe.n_venta
    WHERE pe.fecha >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)
    GROUP BY p.nombre
    ORDER BY total_vendido DESC
    LIMIT 3
";

$result2 = $conexion->query($sql2);

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $nombre_producto = $row["nombre"];
        $total_vendido = intval($row["total_vendido"]);
        $dataArray2[] = array($nombre_producto, $total_vendido);
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }
        
        .header {
            background-color: #d0a98b;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        
        .header a {
            color: white;
            text-decoration: none;
        }
        
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        
        .chart-container {
            width: 45%;
            height: 400px;
        }
    </style>
    <!-- Biblioteca Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tipo');
            data.addColumn('number', 'Conteo');
            data.addRows(<?php echo json_encode($dataArray); ?>);

            var options = {
                title: 'Conteo de Productos por Tipo'
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var dataPromedio = new google.visualization.DataTable();
            dataPromedio.addColumn('string', 'Tipo');
            dataPromedio.addColumn('number', 'Promedio de Precio');
            dataPromedio.addRows(<?php echo json_encode($promedioArray); ?>);

            var optionsPromedio = {
                title: 'Promedio de Precios por Tipo de Producto'
            };

            var chartPromedio = new google.visualization.BarChart(document.getElementById('chart_div_promedio'));
            chartPromedio.draw(dataPromedio, optionsPromedio);



            // Gráfico de estado de materia prima
            var dataMateriaPrima = new google.visualization.DataTable();
            dataMateriaPrima.addColumn('string', 'Nombre');
            dataMateriaPrima.addColumn('number', 'Cantidad');
            dataMateriaPrima.addColumn({type: 'string', role: 'style'}); // Color

            dataMateriaPrima.addRows(<?php echo json_encode($materiaPrimaArray); ?>);

            var optionsMateriaPrima = {
                title: 'Estado de la Materia Prima'
            };

            var chartMateriaPrima = new google.visualization.ColumnChart(document.getElementById('chart_div_materia_prima'));
            chartMateriaPrima.draw(dataMateriaPrima, optionsMateriaPrima);

            // Gráfica de los 3 productos más vendidos en el último mes
            var dataProductosMasVendidos = new google.visualization.DataTable();
            dataProductosMasVendidos.addColumn('string', 'Producto');
            dataProductosMasVendidos.addColumn('number', 'Total Vendido');
            dataProductosMasVendidos.addRows(<?php echo json_encode($dataArray2); ?>);

            var optionsProductosMasVendidos = {
                title: 'Los 3 Productos Más Vendidos en el Último Mes'
            };

            var chartProductosMasVendidos = new google.visualization.BarChart(document.getElementById('chart_div_productos_mas_vendidos'));
            chartProductosMasVendidos.draw(dataProductosMasVendidos, optionsProductosMasVendidos);

        }
    </script>
</head>
<body>
<div class="header">
        <h1>Admin</h1>
        <a href="registro_p.php">Registrar Productos</a>
        <a href="salir.php">Cerrar sesión</a>
    </div>
    <div class="container">
        <div class="chart-container" id="chart_div"></div>
        <div class="chart-container" id="chart_div_promedio"></div>
    </div>
    <div class="container">
        <!-- Gráfica de los 3 productos más vendidos en el último mes -->
        <div class="chart-container" id="chart_div_productos_mas_vendidos"></div>
        <div class="chart-container" id="chart_div_materia_prima"></div>
    </div>
</body>
</html>