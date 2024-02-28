<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CASO 8</title>
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
      <h3>Venta de Entradas (Teatro)</h3>
    </div>
  </header>
  <section>
    <form action="caso8.php" method="post">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>Fecha actual:</td>
          <td><input type="text" id="fecha_actual" name="fecha_actual" value="<?php echo date('d/m/Y'); ?>" readonly></td>
        </tr>
        <tr>
          <td>Nombre del comprador:</td>
          <td><input type="text" id="nombre_comprador" name="nombre_comprador" required></td>
        </tr>
        <tr>
          <td>Día de la función:</td>
          <td>
            <select id="dia_funcion" name="dia_funcion" required>
              <option value="">Seleccione un día</option>
              <option value="Lunes">Lunes</option>
              <option value="Martes">Martes</option>
              <option value="Miercoles a Viernes">Miércoles a Viernes</option>
              <option value="Sabado y Domingo">Sábado y Domingo</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Cantidad de entradas (adultos):</td>
          <td><input type="number" id="cant_adultos" name="cant_adultos" min="1" required></td>
        </tr>
        <tr>
          <td>Cantidad de entradas (niños):</td>
          <td><input type="number" id="cant_ninos" name="cant_ninos" min="0" required></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="submit" value="Calcular"></td>
        </tr>
        <?php
          error_reporting(0); // Remove this line if you want to see error messages

          $fecha_actual = $_POST['fecha_actual'];
          $nombre_comprador = $_POST['nombre_comprador'];
          $dia_funcion = $_POST['dia_funcion'];
          $cant_adultos = $_POST['cant_adultos'];
          $cant_ninos = $_POST['cant_ninos'];

          $precio_adulto = 0;
          $precio_nino = 0;

          switch ($dia_funcion) {
            case "Lunes":
              $precio_adulto = 10;
              $precio_nino = 5;
              break;
            case "Martes":
              $precio_adulto = 8;
              $precio_nino = 4;
              break;
            case "Miercoles a Viernes":
              $precio_adulto = 16;
              $precio_nino = 8;
              break;
            case "Sabado y Domingo":
              $precio_adulto = 50;
              $precio_nino = 45;
              break;
          }

          $subtotal_adultos = $cant_adultos * $precio_adulto;
          $subtotal_ninos = $cant_ninos * $precio_nino;
          $total = $subtotal_adultos + $subtotal_ninos;
        ?>
        <tr>
            <td>Nombre del comprador:</td>
            <td><?php echo $nombre_comprador ?></td>
        </tr>
        <tr>
            <td>Fecha actual:</td>
            <td><?php echo $fecha_actual ?></td>
        </tr>
        <tr>
          <td>Subtotal adultos:</td>
          <td>S/. <?php echo number_format($subtotal_adultos, 2) ?></td>
        </tr>
        <tr>
          <td>Subtotal niños:</td>
          <td>S/. <?php echo number_format($subtotal_ninos, 2) ?></td>
        </tr>
        <tr>
          <td>Total:</td>
          <td>S/. <?php echo number_format($total, 2) ?></td>
        </tr>
      </table>
    </form>
  </section>
  <footer>
    <h6>@YU-JINN</h6>
  </footer>
</body>
</html
