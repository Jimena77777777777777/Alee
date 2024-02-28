<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CASO 9</title>
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
<body>
  <header>
    <div class="header-container"> <h3>Venta de Productos</h3>
    </div>
  </header>
  <section>
    <table border="0" cellpadding="0" cellspacing="0">
      <form action="caso9.php" method="post">
        <tr>
          <td>Producto:</td>
          <td>
            <select name="producto">
              <option value="Lavadora">Lavadora (S/. 1500.00)</option>
              <option value="Refrigeradora">Refrigeradora (S/. 3500.00)</option>
              <option value="Radiograbadora">Radiograbadora (S/. 500.00)</option>
              <option value="Tostadora">Tostadora (S/. 150.00)</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Cantidad:</td>
          <td><input type="number" name="cantidad" value="1"></td>
        </tr>
        <tr>
          <td>Número de cuotas:</td>
          <td>
            <select name="numeroCuotas">
              <option value="1">1 cuota</option>
              <option value="3">3 cuotas</option>
              <option value="6">6 cuotas</option>
              <option value="12">12 cuotas</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2"><button type="submit">Calcular</button></td>
        </tr>
        <?php
          error_reporting(0);
          $producto = $_POST['producto'];
          $cantidad = $_POST['cantidad'];
          $numeroCuotas = $_POST['numeroCuotas'];
          $precio = 0;

          switch ($producto) {
            case "Lavadora":
              $precio = 1500.00;
              break;
            case "Refrigeradora":
              $precio = 3500.00;
              break;
            case "Radiograbadora":
              $precio = 500.00;
              break;
            case "Tostadora":
              $precio = 150.00;
              break;
          }
          $subtotal = $precio * $cantidad;
          $cuotas = $subtotal / $numeroCuotas;
        ?>
        <tr>
          <td>Producto:</td>
          <td><?php echo $producto ?></td>
        </tr>
        <tr>
          <td>Cantidad:</td>
          <td><?php echo $cantidad ?></td>
        </tr>
        <tr>
          <td>Subtotal:</td>
          <td>S/. <?php echo number_format($subtotal, 2) ?></td>
        </tr>
        <tr>
          <td>Número de cuotas:</td>
          <td><?php echo $numeroCuotas ?></td>
        </tr>
        <tr>
          <td>Monto por cuota:</td>
          <td>S/. <?php echo number_format($cuotas, 2) ?></td>
        </tr>
      </form>
    </table>
  </section>
  <footer>
    <h6>@YUJIN
      
    </h6>
  </footer>
</body>
</html>