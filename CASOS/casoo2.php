<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASO 2</title>
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
    <h3>PAGO DE EMPLEADOS</h3>
    </header>
    <section>
        <form action="caso2.php" method="get">
        <table border="0" cellspacing="0" cellpadding="0">

    <tr>
        <td>Empleado</td>
        <td><input type="text" name="txtEmpleados"></td>
    </tr>
    <tr>
        <td>Horas Trabajadas</td>
        <td><input type="text" name="txtHorasTrabajadas"></td>
    </tr>
    <tr>
        <td>Tarifa por Hora</td>
        <td><input type="text" name="TarifaporHora"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Procesar"></td>
        <td><input type="submit" value="Limpiar"></td>
    </tr>
    <?php
        error_reporting(0);
        $empleado = $_GET['txtEmpleados'];
        $HorasTr = $_GET['txtHorasTrabajadas'];
        $TarifaHor = $_GET['TarifaporHora'];
    ?>
    <tr>
        <td>Empleado: </td>
        <td> 
            <?php
                echo $empleado;
            ?>
        </td>
    </tr>
    <tr>
        <td>Horas Trabajadas: </td>
        <td>
            <?php
                echo $HorasTr;
            ?>
        </td>
    </tr>
    <tr>
        <td>Tarifa por Hora: </td>
        <td>
            <?php
                echo $TarifaHor;
            ?>
        </td>
    </tr>
    <tr>
        <td>Sueldo Bruto: </td>
        <td>
            <?php
                $sueldoBruto = $HorasTr * $TarifaHor;
                echo $sueldoBruto;
            ?>
        </td>
    </tr>
    <tr>
        <td>Descuento ESSALUD: </td>
        <td>
            <?php
                $descuentoESSALUD = $sueldoBruto * 0.09;
                echo $descuentoESSALUD;
            ?>
        </td>
    </tr>
    <tr>
        <td>Descuento AFP: </td>
        <td>
            <?php
                $descuentoAFP = $sueldoBruto * 0.13;
                echo $descuentoAFP;
            ?>
        </td>
    </tr>
    <tr>
        <td>Sueldo neto: </td>
        <td>
            <?php
                $sueldoNeto = $sueldoBruto - $descuentoESSALUD - $descuentoAFP;
                echo $sueldoNeto;
            ?>
        </td>
    </tr>
        </table>
    </form>
    </section>
    <footer>
        <h6>Todos mio @Alee</h6>
    </footer>
</body>
</html>
