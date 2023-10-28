<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Producto</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url(registro.png);  
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        input[type="submit"] {
            background-color: #d0a98b;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #b08b6f;
        }
    </style>
    <div class="form-container">
        <h1>Registro de Producto</h1>
        <form action="registro_p.php" method="POST">

            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required>

            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>

            <label for="temperatura">Temperatura:</label>
            <input type="text" id="temperatura" name="temperatura">

            <label>Membresía:</label>
            <div class="checkbox-container">
                <input type="radio" id="membresiaSi" name="membresia" value="1" required>
                <label for="membresiaSi">Sí</label>
            </div>
            <div class="checkbox-container">
                <input type="radio" id="membresiaNo" name="membresia" value="0" required>
                <label for="membresiaNo">No</label>
            </div>

            <input type="submit" value="Registrar" name="registrar">
            <a href="admin.php">volver</a>
        </form>
    </div>
    <?php
        require_once('conexion.php'); // Asegúrate de incluir la conexión a la base de datos

        // Obtener el último código registrado desde la base de datos
        $sql_last_code = "SELECT MAX(codigo) as max_code FROM producto";
        $result_last_code = $conexion->query($sql_last_code);

        if ($result_last_code->num_rows > 0) {
            $row = $result_last_code->fetch_assoc();
            $last_code = $row['max_code'];
            // Incrementar el último código en uno para generar el nuevo código
            $new_code = $last_code + 1;
        } else {
            // Si no hay registros previos, puedes comenzar con un código inicial, por ejemplo, 1.
            $new_code = 1;
        }

        if(isset($_POST['registrar'])) {
            $descripcion = $_POST['descripcion'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $tipo = $_POST['tipo'];
            $temperatura = $_POST['temperatura'];
            $membresia = isset($_POST['membresia']) ? $_POST['membresia'] : 0; 
            
            // Utilizar el nuevo código generado
            $sql = "INSERT INTO producto(codigo, descripcion, nombre, precio, tipo, temperatura,menu_esp) VALUES ('$new_code', '$descripcion', '$nombre', '$precio', '$tipo', '$temperatura','$membresia')";
            
            if ($conexion->query($sql) === true) {
                echo '<script>alert("Registro exitoso");</script>';
                // Incrementar el nuevo código en uno para el siguiente producto
                $new_code++;
            } else {
                die("Error al insertar datos: " . $conexion->error);
            }
            
        }
        ?>

</body>
</html>
