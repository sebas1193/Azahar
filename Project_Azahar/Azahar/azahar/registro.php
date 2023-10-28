<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
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
</head>
<body>
    <div class="form-container">
        <h1>Registro de Cliente</h1>
        <form action="registro.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

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
            <a href="login_nuevo.php">¿Ya tienes una cuenta? Inicia sesión</a>
            <a href="index.html">Home</a>
        </form>
    </div>
    <?php
        require_once('conexion.php'); // Asegúrate de incluir la conexión a la base de datos

        if(isset($_POST['registrar'])) {
            $nom = $_POST['nombre'];
            $apell = $_POST['apellido'];
            $direc = $_POST['direccion'];
            $tel =  $_POST['telefono'];
            $email =  $_POST['email'];
            $membresia = isset($_POST['membresia']) ? $_POST['membresia'] : 0; // Por defecto, no membresía
            
            $sql = "INSERT INTO cliente(nombre,apellido,direccion,telefono,email,membresia) VALUES ('$nom', '$apell','$direc','$tel','$email','$membresia')";
            
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
