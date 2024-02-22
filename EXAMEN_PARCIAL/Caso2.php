<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso_2</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .formulario {
            width: 60%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="formulario">
        <header>
            <h3>INGRESO DE DATOS-</h3>
        </header>
        <section>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
                $sexo = isset($_POST['radioSexo']) ? $_POST['radioSexo'] : '';
                $numHijos = isset($_POST['txtNumHijos']) ? $_POST['txtNumHijos'] : 0;

                $frase = "Estimad@ $nombre ";

                if ($sexo == 'masculino') {
                    $frase .= $numHijos == 1 ? "tiene 1 hijo." : "tiene $numHijos hijos.";
                } elseif ($sexo == 'femenino') {
                    $frase .= $numHijos == 1 ? "tiene 1 hijo." : ($numHijos > 0 ? "tiene $numHijos hijos." : "no tiene hijos.");
                }

                echo "<p>$frase</p>";
            }
            ?>

            <form method="post" action="">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" required><br>

                <label for="radioSexo">Sexo:</label>
                <input type="radio" name="radioSexo" value="masculino" required> Masculino
                <input type="radio" name="radioSexo" value="femenino" required> Femenino<br>

                <label for="txtNumHijos">Número de hijos:</label>
                <input type="number" name="txtNumHijos" min="0" required><br>

                <input type="submit" value="Enviar">
            </form>
        </section>
        <footer>

        </footer>
    </div>
</body>
</html>
