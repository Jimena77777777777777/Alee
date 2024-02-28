<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASO 7</title>
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
<header>
    <div class="header-container">
        <h3>CONTROL DE MENSUALIDAD</h3>
    </div>
</header>
<section>
    <table border="0" cellpadding="0" cellspacing="0">
        <form action="caso7.php" method="post">
        <?php
        error_reporting(0);
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $promedio = $_POST['promedio'];
        $monto_mensual = '';
        $descuento = '';
        $monto_a_pagar = '';

        if (!empty($nombre) && !empty($categoria) && !empty($promedio) && $promedio >= 0 && $promedio <= 20) {
            switch ($categoria) {
                case 'A':
                    $monto_mensual = 850;
                    break;
                case 'B':
                    $monto_mensual = 750;
                    break;
                case 'C':
                    $monto_mensual = 650;
                    break;
                case 'D':
                    $monto_mensual = 500;
                    break;
                default:
                    break;
            }

            if ($promedio < 12) {
                $porcentaje_descuento = 0;
            } elseif ($promedio >= 13 && $promedio <= 15) {
                $porcentaje_descuento = 10;
            } elseif ($promedio >= 16 && $promedio <= 17) {
                $porcentaje_descuento = 15;
            } elseif ($promedio >= 18 && $promedio <= 19) {
                $porcentaje_descuento = 25;
            } elseif ($promedio == 20) {
                $porcentaje_descuento = 50;
            }

            $descuento = ($monto_mensual * $porcentaje_descuento) / 100;
            $monto_a_pagar = $monto_mensual - $descuento;
        } else {
            echo htmlspecialchars("Debes completar los campos correctamente para calcular.");
        }
        ?>
            <tr>
                <td colspan="2"><h2>Control de Mensualidad</h2></td>
            </tr>
            <tr>
                <td>
                    Nombre del alumno:<br>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br><br>

                    Categoría del alumno:<br>
                    <select id="categoria" name="categoria">
                        <option value="">Selecciona una categoría</option>
                        <option value="A" <?php if ($categoria == "A") echo "selected"; ?>>A</option>
                        <option value="B" <?php if ($categoria == "B") echo "selected"; ?>>B</option>
                        <option value="C" <?php if ($categoria == "C") echo "selected"; ?>>C</option>
                        <option value="D" <?php if ($categoria == "D") echo "selected"; ?>>D</option>
                    </select><br><br>

                    Promedio ponderado obtenido:<br>
                    <input type="number" id="promedio" name="promedio" step="0.01" value="<?php echo htmlspecialchars($promedio); ?>"><br><br>

                    <input type="submit" name="submit" value="Calcular">
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <th>Resultado:</th>
            </tr>
            <tr>
                <td>Monto mensual: </td>
                <td> S/. <?php echo isset($monto_mensual) ? htmlspecialchars($monto_mensual) : ''; ?></td>
            </tr>
            <tr>
                <td>Descuento: </td>
                <td> S/. <?php echo isset($descuento) ? htmlspecialchars($descuento) : ''; ?></td>
            </tr>
            <tr>
                <td>Monto a pagar: </td>
                <td> S/. <?php echo isset($monto_a_pagar) ? htmlspecialchars($monto_a_pagar) : ''; ?></td>
            </tr>
        </form>
    </table>
</section>
<footer>
    <h6>@yu-jinnn </h6>
</footer>
</body>
</html>
