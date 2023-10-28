<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }
        .barra-superior {
            background-color: #d3a075;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .enlace {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .factura {
            background-color: white;
            border: 2px solid #ccc;
            padding: 20px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
        }
        .factura h1 {
            margin-top: 0;
        }
        .factura table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .factura th, .factura td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .factura th {
            background-color: #f2f2f2;
        }
        .factura td:last-child {
            text-align: right;
        }

        .mensaje {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.mensaje p {
    font-size: 24px;
    margin-bottom: 10px;
}

.moto {
    width: 100px;
    height: 60px;
    background-image: url('repartidor.png');
    background-size: cover;
    animation: moverMoto 3s linear infinite;
}

@keyframes moverMoto {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

    </style>
</head>
<body>
    <div class="barra-superior">
        <a class="enlace" href="cerrar_sesion.php">Cerrar Sesión</a>
        <a class="enlace" href="colab.php">Seguir Comprando</a>
    </div>
    <div class="factura">
        <h1>Factura de Compra</h1>
        <p>Cliente: <?php echo $_SESSION['username']; ?></p>
        <p>Fecha: <?php echo date("Y-m-d"); ?></p>
        <p>Número de Venta: <?php echo $_SESSION['n_venta']; ?></p>

        <h2>Productos:</h2>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
            <?php
            $total = 0;

            foreach ($_SESSION['productos'] as $producto) {
                echo "<tr>";
                echo "<td>{$producto['nombre']}</td>";
                echo "<td>{$producto['cantidad']}</td>";
                echo "<td>{$producto['precio']}</td>";
                echo "<td>{$producto['subtotal']}</td>";
                echo "</tr>";

                $total += $producto['subtotal'];
            }
            ?>
            <tr>
                <td colspan="3">Total:</td>
                <td><?php echo $total; ?></td>
            </tr>
        </table>
    </div>
    <div class="mensaje">
    <p>¡Pronto llegará tu pedido!</p>
    <div class="moto"></div>
    </div>

</body>
</html>
