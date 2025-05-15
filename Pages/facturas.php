<?php
include('../Logic/factura.php');
$stmt = sqlsrv_query($conn, "EXEC getFacturas");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Facturas | Main</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../Styles/style.css" />
  </head>
  <body>
    <div class="container-fluid" id="container">
      <div class="w-75" id="home-container">
        <h1 class="text-center" style="font-size: 40px">Facturas</h1>
        <hr size="5px" color="white" />
        <div class="d-flex gap-3">
          <form action="../Logic/report.php">
            <button
              id="btn"
              type="submit"
              class="btn rounded-sm shadow-sm"
              style="font-family: 'Lexend', sans-serif"
            >
              Imprimir Reporte
            </button>
          </form>
          <a
            id="btn"
            href="main.html"
            class="btn rounded-sm shadow-sm"
            style="font-family: 'Lexend', sans-serif"
          >
            Volver
          </a>
        </div>
        <br />
        <br />
        <div
          class="d-flex justify-content-center align-items-center gap-4"
          id="home-card-container"
        >
          <table class="table table-striped rounded-sm">
            <thead>
              <tr>
                <th style="background-color: #0596b3;" class="text-white">#</th>
                <th style="background-color: #0596b3;" class="text-white">Descripcion</th>
                <th style="background-color: #0596b3;" class="text-white">Categoria</th>
                <th style="background-color: #0596b3;" class="text-white">Cantidad</th>
                <th style="background-color: #0596b3;" class="text-white">Precio Unitario</th>
                <th style="background-color: #0596b3;" class="text-white">Itebis</th>
                <th style="background-color: #0596b3;" class="text-white">Descuento</th>
                <th style="background-color: #0596b3;" class="text-white">Total</th>
                <th style="background-color: #0596b3;" class="text-white"></th>
                <th style="background-color: #0596b3;" class="text-white"></th>
              </tr>
            </thead>
            <tbody>
              <?php

                if ($stmt){
                  while ($row = sqlsrv_fetch_array($stmt)){
                    $id = $row["id"];
                    $desc = $row["descripcion"];
                    $categoria = $row["categoria"];
                    $cant = $row["cantidad"];
                    $precio_u = $row["precio_untario"];
                    $itebis = $row["itebis"];
                    $descuento = $row["descuento"];
                    $total_general = $row["total_general"];

                    echo <<<EOD
                        <tr>
                          <td>$id</td>
                          <td>$desc</td>
                          <td>$categoria</td>
                          <td>$cant</td>
                          <td>$precio_u</td>
                          <td>$itebis</td>
                          <td>$descuento</td>
                          <td>$total_general</td>
                          <td>
                            <a href="update_factura.php?id=$id" class="btn" id="btn">Editar</a>
                          </td>
                          <td>
                            <form action="../Logic/factura.php" method="post">
                              <input type="hidden" name="operation" value="delete"/>
                              <input type="hidden" name="id" value="$id"/>
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                          </td>
                        </tr>
                      EOD;
                    }
                  }
                ?>
            </tbody>
        </div>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>