<?php
session_start();
$usuario = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "azahar";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_POST['comprar'])) {
    // Insertar en la tabla pedidos
    $usuario = $_SESSION['username'];
    $fecha = date("Y-m-d");
    $insert_pedido = "INSERT INTO pedidos (fecha, email_c) VALUES ('$fecha', '$usuario')";
    if ($conn->query($insert_pedido) === FALSE) {
        echo "Error al insertar en la tabla pedidos: " . $conn->error;
    } else {
        $n_venta = $conn->insert_id; // Obtener el valor de n_venta generado automáticamente

        // Insertar en la tabla detalle
        foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
            $select_producto = "SELECT * FROM producto WHERE codigo = '$producto_id'";
            $result = $conn->query($select_producto);
            $row = $result->fetch_assoc();
            $descripcion = $row['descripcion'];
            $tipo = $row['tipo']; // Obtener el tipo del producto

            $insert_detalle = "INSERT INTO detalle (cant_prodct, descripcion, cod_p, n_venta) 
                               VALUES ('$cantidad', '$descripcion', '$producto_id', '$n_venta')";
            if ($conn->query($insert_detalle) === FALSE) {
                echo "Error al insertar en la tabla detalle: " . $conn->error;
            }

            // Verificar si el producto es de tipo 'bebida'
            if ($tipo == 'bebida') {
                // Actualizar la tabla materia_p
                $update_materia_p = "UPDATE materia_p SET cantidad = cantidad - 1 WHERE codigo IN (1, 2)";
                if ($conn->query($update_materia_p) === FALSE) {
                    echo "Error al actualizar la tabla materia_p: " . $conn->error;
                }
            }
        }

        $_SESSION['n_venta'] = $n_venta;
        $_SESSION['total'] = $total;
        $_SESSION['productos'] = array();

        foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
            $select_producto = "SELECT * FROM producto WHERE codigo = '$producto_id'";
            $result = $conn->query($select_producto);
            $row = $result->fetch_assoc();
            $nombre_producto = $row['nombre'];
            $precio_producto = $row['precio'];
            $subtotal = $precio_producto * $cantidad;

            $_SESSION['productos'][] = array(
                'nombre' => $nombre_producto,
                'cantidad' => $cantidad,
                'precio' => $precio_producto,
                'subtotal' => $subtotal
            );
        }

        // Vaciar el carrito después de realizar el pedido
        $_SESSION['carrito'] = array();

        // Redirigir a otra página de confirmación
        header("Location: factura.php");
        exit();
    }
}
?>
