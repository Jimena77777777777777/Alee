<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso_3</title>
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
        <h3>Calculadora de Newsletter</h3>

        <?php
        function calcularPrecio($cantidadEmails, $conSeguro) {
            $precio = 0.0;

            if ($cantidadEmails >= 0 && $cantidadEmails <= 2000) {
                $precio = 0.0;
            } elseif ($cantidadEmails >= 2001 && $cantidadEmails <= 10000) {
                $precio = 0.7;
            } elseif ($cantidadEmails > 10000) {
                $precio = 0.2;
            } else {
                return "No válido";
            }

            if ($conSeguro) {
                $precio += $cantidadEmails * 0.1;
            }

            return $precio;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $cantidadEmails = isset($_POST['cantidad_emails']) ? $_POST['cantidad_emails'] : '';
            $conSeguro = isset($_POST['con_seguro']) && $_POST['con_seguro'] == 'si';

            if (is_numeric($cantidadEmails)) {
                $precioTotal = calcularPrecio($cantidadEmails, $conSeguro);
                echo "<p>Para enviar $cantidadEmails emails";

                if ($conSeguro) {
                    echo " con seguro,";
                }

                echo " el precio total es: S/ $precioTotal.</p>";
            } else {
                echo "<p>Por favor, ingresa un número válido para la cantidad de emails.</p>";
            }
        }
        ?>

        <form method="post" action="">
            <label for="cantidad_emails">Número de Emails a Enviar:</label>
            <input type="text" name="cantidad_emails" required>

            <label for="con_seguro">¿Quieres seguro por cada mensaje?</label>
            <select name="con_seguro">
                <option value="si">Sí</option>
                <option value="no" selected>No</option>
            </select>

            <input type="submit" value="Calcular Precio Total">
        </form>
    </div>
</body>
</html>
