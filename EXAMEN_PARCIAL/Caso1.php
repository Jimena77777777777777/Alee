<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso_1</title>

</head>
<body>
    <header>
        <h3>GENERADOR DE TICKET</h3>
    </header>
    <section>
        <?php
        error_reporting(0);

        $NOMBRE = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
        $ESTATURA = isset($_POST['txtEstatura']) ? $_POST['txtEstatura'] : '';
        $Edad = isset($_POST['txtEdad']) ? $_POST['txtEdad'] : '';
        $JUICIO = isset($_POST['selOpcion']) ? $_POST['selOpcion'] : '';

        if ($JUICIO == 'SI') {
            $selSi = 'selected';
        } else {
            $selSi = '';
        }

        $altura = isset($_POST['txtEstatura']) ? $_POST['txtEstatura'] : '';
        $mensajeAltura = '';
        $mensajeEdad = '';
        $mensajeJuicio = '';

        if ($altura >= 120) {
            $mensajeAltura = "Supera la altura mínima de 120cm. ";
        } else {
            $mensajeAltura = "No supera la altura mínima de 120cm. ";
        }

        if ($Edad > 16) {
            $mensajeEdad = "Es mayor de 16 años. ";
        } else {
            $mensajeEdad = "No es mayor de 16 años. ";
        }

        if ($JUICIO == 'SI') {
            $mensajeJuicio = "Rechaza llevarnos a juicio por daños y perjuicios de un mal mantenimiento.";
        } else {
            $mensajeJuicio = "No rechaza llevarnos a juicio por daños y perjuicios de un mal mantenimiento.";
        }

        // Verificar todas las condiciones antes de generar el ticket
        if ($altura >= 120 && $Edad > 16 && $JUICIO == 'SI') {
            // Si todo es válido, generar el ticket
            $numeroTicket = sprintf('%05d', rand(1, 99999));
            $mensajeTicket = "¡Felicidades, $NOMBRE! Ticket $numeroTicket";
        } else {
            $mensajeTicket = "No cumple con los requisitos para obtener el ticket.";
        }
        ?>

        <form method="post" action="">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>NOMBRE:</td>
                    <td><input type="text" name="txtNombre" size="60" value="<?php echo $NOMBRE; ?>"></td>
                </tr>
                <tr>
                    <td>ESTATURA</td>
                    <td><input type="text" name="txtEstatura" size="60" value="<?php echo $ESTATURA; ?>"></td>
                </tr>
                <tr>
                    <td>EDAD</td>
                    <td><input type="text" name="txtEdad" size="60" value="<?php echo $Edad; ?>"></td>
                </tr>
                <tr>
                    <td>JUICIO:</td>
                    <td>
                        <select name="selOpcion">
                            <option value="SI" <?php echo $selSi ?>>SI</option>
                            <option value="NO" <?php echo $selNo ?>>NO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Procesar" name="btnProcesar"></td>
                </tr>
                <tr>
                    <td><?php echo $mensajeAltura; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $mensajeEdad; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $mensajeJuicio; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php echo $mensajeTicket; ?></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </section>
 
    <footer>
        <h6>Alejandra Flores parcial caso1</h6>
    </footer>
  
</body>
</html>
