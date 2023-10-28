<?php
session_start();
$usuario = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        
        .header {
            background-color: #d0a98b;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header a {
            color: white;
            text-decoration: none;
        }
        
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Hola, <?php echo $usuario; ?></h1>
        <a href="salir.php">Salir</a>
    </div>
    <div class="content">
        <?php
        include_once('menu.php');
        ?>
    </div>
</body>
</html>
