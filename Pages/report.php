<?php
    include('../Logic/factura.php');
    require_once('../vendor/autoload.php');

    use Dompdf\Dompdf;
    use Dompdf\Options;

    $dompdf = new Dompdf();
    $options = new Options();

    $options->set("isRemoteEnabled", true);

    $html = "";

    $stmt = sqlsrv_query($conn, "EXEC getFacturas;");

    while($row = sqlsrv_fetch_array($stmt)){
        $id = $row["id"];
        $desc = $row["descripcion"];
        $categoria = $row["categoria"];
        $cant = $row["cantidad"];
        $precio_u = $row["precio_untario"];
        $itebis = $row["itebis"];
        $descuento = $row["descuento"];
        $total_general = $row["total_general"];

        $html .= <<<EOD
        <tr>
            <td>$id</td>
            <td>$desc</td>
            <td>$categoria</td>
            <td>$cant</td>
            <td>$precio_u</td>
            <td>$itebis</td>
            <td>$descuento</td>
            <td>$total_general</td>
        </tr>
        EOD;
    }


    $outHtml = <<<EOD
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <title>Report</title>
            <style>
                body {
                    font-family: "Arial", sans-serif;
                }

                div{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100dvh;
                }

                table {
                    width: 75%;
                    border-collapse: collapse;
                }

                th,
                td {
                    text-align: left;
                    padding: 5px;
                    border: solid 1px black;
                    font-family: 15px;
                }

                th {
                    font-weight: bolder;
                    font-size: 17px;
                    background-color: blue;
                    color: white;
                }
            </style>
        </head>
        <body>
            <div>
                <h1>Reporte de Facturas Registradas</h1>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Itebis</th>
                            <th>Descuento</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        $html
                    </tbody>
                </table>
            </div>
        </body>
        </html>
    EOD;

    $dompdf->loadHtml($outHtml);

    $dompdf->render();

    $dompdf->stream();

?>