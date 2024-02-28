<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASO 5</title>
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
        <h3>Obsequio a clientes</h3>
    </header>
    <section>
        <div class="mensaje-error" id="mensajeError">
            <p>Ticket no válido</p>
            <button class="boton-aceptar" onclick="cerrarVentana()">Aceptar</button>
        </div>
        <form action="caso5.php" method="get" onsubmit="return validarTicket()">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Nombre del cliente: </td>
                    <td><input type="text" name="txtempleado" placeholder="Ingrese el nombre del cliente"></td>
                </tr>
                <tr>
                    <td>Monto total en $: </td>
                    <td><input type="text" name="txtmonto" placeholder="Ingrese el monto a pagar"></td>
                </tr>
                <tr>
                    <td>Numero de Ticket: </td>
                    <td><input type="text" name="txtnumtik" placeholder="Ingrese el numero de ticket obtenido"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Procesar"></td>
                    <td><input type="submit" value="Limpiar"></td>
                </tr>
                <?php
                error_reporting(0);
                $nombreCliente = $_GET['txtempleado'];
                $montoTotal = $_GET['txtmonto'];
                $numeroTicket = $_GET['txtnumtik'];

                $ticketValido = ($numeroTicket >= 1 && $numeroTicket <= 20);
                
                if ($ticketValido) {
                    if ($numeroTicket >= 1 && $numeroTicket <= 4) {
                        $obsequio = 'Canasta de productos diversos';
                        $montocancel = $montoTotal - ($montoTotal * 0.16);

                    } elseif ($numeroTicket >= 5 && $numeroTicket <= 9) {
                        $obsequio = 'Saco de azucar de 50kg';
                        $montocancel = $montoTotal - ($montoTotal * 0.13);

                    } elseif ($numeroTicket >= 10 && $numeroTicket <= 14) {
                        $obsequio = 'Aceite 5 litros';
                        $montocancel = $montoTotal - ($montoTotal * 0.6);

                    } elseif ($numeroTicket >= 15 && $numeroTicket <= 19) {
                        $obsequio = 'Caja de leche de 24 latas grandes';
                        $montocancel = $montoTotal - ($montoTotal * 0.12);

                    } elseif ($numeroTicket == 20) {
                        $obsequio = 'Saco de arroz de 50kg';
                        $montocancel = $montoTotal - ($montoTotal * 0.10);
                    }
                } else {
                    $obsequio = ' ';
                    $montocancel = $montoTotal;
                }
                 
                ?>
                <tr>
                    <td>Monto a cancelar: </td>
                    <td><?php echo "$" . number_format($montocancel, 2); ?></td>
                </tr>
                <tr>
                    <td>Obsequio obtenido: </td>
                    <td><?php echo $obsequio; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            </form>
    </section>
    <footer>
        <h6>Todos mio @Alee</h6>
    </footer>

    <script>
        function validarTicket() {
            var numeroTicket = document.getElementsByName("txtnumtik")[0].value;
            var ticketValido = numeroTicket >= 1 && numeroTicket <= 20;

            if (!ticketValido) {
                document.getElementById("mensajeError").style.display = "block";
                return false;  
            }

            return true;  
        }

        function cerrarVentana() {
            document.getElementById("mensajeError").style.display = "none";
        }
    </script>
</body>
</html>