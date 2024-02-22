<?php
$contrasenaAlmacenada = "ALEE123";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena1 = $_POST["contrasena1"];
    if ($contrasena1 === $contrasenaAlmacenada) {
        echo "";
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulario de Producto</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }

                .contenedor {
                    width: 60%;
                    max-width: 400px;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                .formulario {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="contenedor">
                <h3>Subir Producto a la Tienda</h3>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $numSerie = isset($_POST['num_serie']) ? $_POST['num_serie'] : '';
                    $nombreProducto = isset($_POST['nombre_producto']) ? $_POST['nombre_producto'] : '';
                    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
                    echo "<p>Producto subido:</p>";
                    echo "<p>Número de Serie: $numSerie</p>";
                    echo "<p>Nombre del Producto: $nombreProducto</p>";
                    echo "<p>Precio: $precio</p>";
                }
                ?>
                <form class="formulario" method="post" action="">
                    <label for="num_serie">Número de Serie:</label>
                    <input type="text" name="num_serie" size="30" required><br>

                    <label for="nombre_producto">Nombre del Producto:</label>
                    <input type="text" name="nombre_producto" size="30" required><br>

                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" min="0" step="0.01" size="30" required><br>

                    <input type="submit" value="Subir Producto">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .contenedor {
                width: 60%;
                max-width: 400px;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .formulario {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="contenedor">
            <h2>Iniciar Sesión</h2>

            <form class="formulario" action="" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br>

                <label for="contrasena1">Contraseña:</label>
                <input type="password" name="contrasena1" required><br>

                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
