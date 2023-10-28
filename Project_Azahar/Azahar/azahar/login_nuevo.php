<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url(registro.png); 
        }
        
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        
        .login-form {
            text-align: center;
        }
        
        .login-form p {
            margin: 10px 0;
        }
        
        .login-form input[type="email"],
        .login-form input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        
        .login-form label {
            display: block;
            margin-bottom: 5px;
        }
        
        .rol-options {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        
        .login-form a {
            text-decoration: none;
        }
        
        .login-form input[type="submit"] {
            background-color: #d0a98b;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .login-form input[type="submit"]:hover {
            background-color: #b08b6f;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form class="login-form" action="loguera.php" method="POST">
            <p>Correo:</p>
            <input type="email" name="email" required>
            <p>Telefono:</p>
            <input type="password" name="telefono" required>
            <div class="rol-options">
                <label for="membresiaSi">
                    <input type="checkbox" id="membresiaSi" name="rol" value="1">Admin
                </label>
                <label for="membresiaNo">
                    <input type="checkbox" id="membresiaNo" name="rol" value="0">Cliente
                </label>
            </div>
            <p><input type="submit" value="Iniciar Sesión" name="subir"></p>
            <br>
            <a href="registro.php">¿Aún no tienes cuenta? Regístrate</a><br>
            <a href="index.html">Home</a>
        </form>
        <script>
            const membresiaSi = document.getElementById("membresiaSi");
            const membresiaNo = document.getElementById("membresiaNo");

            membresiaSi.addEventListener("change", () => {
                if (membresiaSi.checked) {
                    membresiaNo.checked = false;
                }
            });

            membresiaNo.addEventListener("change", () => {
                if (membresiaNo.checked) {
                    membresiaSi.checked = false;
                }
            });
        </script>
    </div>
    <?php
    if(isset($_POST['subir'])){
        
        $membresia = isset($_POST['rol']) ? $_POST['rol'] : 0; // Por defecto, no membresía
    }
    ?>
</body>
</html>
