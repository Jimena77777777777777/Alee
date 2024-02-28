<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulador de préstamos</title>
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
    <h3>CASO 10 </h3>
  </div>
</header>
<section>
  <form action="caso10.php" method="post">
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>Nombre del cliente:</td>
        <td><input type="text" name="nombre_cliente"></td>
      </tr>
      <tr>
        <td>Monto prestado:</td>
        <td><input type="text" name="monto_prestado"></td>
      </tr>
      <tr>
        <td>Número de cuotas:</td>
        <td>
          <select name="numero_cuotas">
            <option value="3">3</option>
            <option value="6">6</option>
            <option value="9">9</option>
            <option value="12">12</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Cotizar"></td>
      </tr>
      <?php
      error_reporting(0);
      $nombreCliente = $_POST["nombre_cliente"];
      $montoPrestado = $_POST["monto_prestado"];
      $numeroCuotas = $_POST["numero_cuotas"];

      if (empty($nombreCliente)) {
        echo "<tr><td colspan='2'>Debe registrar el nombre del cliente</td></tr>";
      } elseif (empty($montoPrestado) || !is_numeric($montoPrestado)) {
        echo "<tr><td colspan='2'>Debe registrar correctamente el monto de préstamo</td></tr>";
      } else {
        $impuestos = array(0.05, 0.07, 0.10, 0.20);
        $tasaImpuesto = $impuestos[$numeroCuotas / 3 - 1];
    
        // Calcular fechas de pago
        $fechasPago = array();
        $fechaActual = new DateTime();
        $fechaActual->modify('first day of next month');
    
        $i = 0;
        while ($i < $numeroCuotas) {
            $fechasPago[] = $fechaActual->format('Y-m-d');
            $fechaActual->modify('+1 month');
            $i++;
        }
    
        // Calcular monto mensual
        $montoMensual = $montoPrestado * (1 + $tasaImpuesto);
    
        echo "<tr>
        <th>Cuota</th>
        <th>Monto a pagar</th>
        <th>Fecha de pago</th>
        </tr>";

        for ($i = 0; $i < $numeroCuotas; $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>S/. $montoMensual</td>";
            echo "<td>" . $fechasPago[$i] . "</td>";
            echo "</tr>";
        }
      }
      ?>
    </table>
  </form>
</section>
<footer>
    <h6>YUJINN</h6>
  </footer>
</body>
</html>

