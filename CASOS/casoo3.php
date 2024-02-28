<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso 3</title>
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
    <header><h3>VENTA DE PREDUCTO</h3></header>

    <section>
        <form action="caso3.php" method="get">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>Cantidad</td>
                    <td><input type="text" name="txtCantidad"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="procesar"></td>
                    <td><input type="submit" value="limpiar"></td>
                </tr>
                <?php
                error_reporting(0);
                    $Cantidad = $_GET['txtCantidad'];
                    $precioPRO = 20.55;
                 ?>
                <tr>
                    <td>Precio de Producto: </td>
                    <td>
                        <?php
                        echo "$precioPRO"
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cantidad: </td>
                    <td>
                        <?php
                        echo"$Cantidad";
                                   
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Importe de Compra: </td>
                    <td>
                    <?php
                        $ImporteCom = $precioPRO * $Cantidad;
                        echo "$ImporteCom"; 
                        
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Importe de Descuento: </td>
                    <td>
                    <?php
                        $ImporteComT = $precioPRO * $Cantidad;
                        $ImporteDesc = $ImporteComT * 0.1;
                        echo "$ImporteDesc";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Importe Neto</td>
                    <td>
                    <?php
                       $ImporteNeto = $ImporteCom - $ImporteDesc;
                       echo "$ImporteNeto";
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