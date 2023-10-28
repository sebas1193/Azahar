<?php

$usuario = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "azahar";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['agregar'])) {
    $producto_id = $_POST['producto_id'];
    if (!isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] = 1;
    } else {
        $_SESSION['carrito'][$producto_id]++;
    }
}

if (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];
    if (isset($_SESSION['carrito'][$producto_id])) {
        if ($_SESSION['carrito'][$producto_id] > 1) {
            $_SESSION['carrito'][$producto_id]--;
        } else {
            unset($_SESSION['carrito'][$producto_id]);
        }
    }
}

if (!empty($_SESSION['carrito'])) {
    $productos_ids = array_keys($_SESSION['carrito']);
    $sql = "SELECT * FROM producto WHERE codigo IN (" . implode(",", $productos_ids) . ")";
    $result = $conn->query($sql);
}

// Consulta para verificar si el usuario tiene membresía
$consulta_membresia = "SELECT membresia FROM cliente WHERE email = '$usuario'";
$resultado_membresia = $conn->query($consulta_membresia);

if ($resultado_membresia) {
    $fila_membresia = $resultado_membresia->fetch_assoc();
    $tiene_membresia = $fila_membresia['membresia'];

    // Consulta de productos en función de la membresía
    if ($tiene_membresia == 1) {
        $consulta_productos = "SELECT * FROM producto";
    } else {
        $consulta_productos = "SELECT * FROM producto WHERE menu_esp = 0";
    }

    $resultado_productos = $conn->query($consulta_productos);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    h1, h2 {
        text-align: center;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    .action-button {
        background-color: #c0a16b;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
    .card {
        border: 1px solid #ccc;
        padding: 10px;
        width: 300px;
        margin: 10px;
    }
    .card h2 {
        margin: 0;
    }
    .card p {
        margin: 10px 0;
    }
    /* Aplicar estilo a todos los botones */
    button {
        background-color: #D3B17D; /* Color café claro */
        color: white; /* Texto blanco */
        border: none; /* Sin borde */
        padding: 10px 20px; /* Espaciado interno */
        border-radius: 5px; /* Bordes redondeados */
        cursor: pointer; /* Cambiar el cursor al pasar por encima */
    }

    /* Cambiar estilo cuando se pasa el cursor por encima */
    button:hover {
        background-color: #A58858; /* Cambiar color al pasar por encima */
    }

</style>
<h1>Carrito de Compras</h1>

<table>
    <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Tipo</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Acción</th>
    </tr>
    <?php
    $total = 0;
    if (!empty($result) && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $producto_id = $row['codigo'];
            $cantidad = $_SESSION['carrito'][$producto_id];
            $subtotal = $cantidad * $row['precio'];
            $total += $subtotal;
            ?>
            <tr>
                <td><?php echo $row['codigo']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo $subtotal; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $row['codigo']; ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    <tr>
        <td colspan="6">Total:</td>
        <td><?php echo $total; ?></td>

        <form method="post" action="pedido.php">
            <input type="hidden" name="carrito_data" value='<?php echo json_encode($_SESSION['carrito']); ?>'>
            <button type="submit" name="comprar">Comprar</button>
        </form>

    </tr>
</table>

<h2>Productos disponibles</h2>
<table>
    <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Tipo</th>
        <th>Acción</th>
    </tr>
    <?php
    if ($resultado_productos && $resultado_productos->num_rows > 0) {
        while ($row = $resultado_productos->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['codigo']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $row['codigo']; ?>">
                        <button type="submit" name="agregar">Agregar al carrito</button>
                    </form>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>

</body>
</html>
