<?php
include('../Connection/conn.php');
$id = $_GET["id"];
$query = "SELECT * FROM factura WHERE id=$id";
$stmt = sqlsrv_query($conn, $query, array($id));
$row = sqlsrv_fetch_array($stmt);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar Factura | Main</title>
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
      <div class="w-100" style="max-width: 500px" id="home-container">
        <h1 class="text-center" style="font-size: 40px">
          Actualizar Factura
        </h1>
        <hr size="5px" color="white" />
        <br />
        <div
          class="d-flex justify-content-center align-items-center gap-4 w-100"
          id="home-card-container"
        >
          <form action="../Logic/factura.php" method="post" class="w-100">
            <input type="hidden" name="operation" value="update" />
            <input type="hidden" name="id" value="<?php echo $id?>" />
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="categoria" class="form-label">Categoria</label>
                  <input
                    type="text"
                    class="form-control"
                    name="categoria"
                    id="categoria"
                    value="<?php echo $row["categoria"] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="itebis" class="form-label">Itebis</label>
                  <input
                    id="itebis"
                    type="number"
                    class="form-control"
                    name="itebis"
                    value="<?php echo $row["itebis"] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="descuento" class="form-label">Descuento</label>
                  <input
                    id="descuento"
                    type="number"
                    class="form-control"
                    name="descuento"
                    value="<?php echo $row["descuento"] ?>"
                  />
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="cantidad" class="form-label">Cantidad</label>
                  <input
                    id="cantidad"
                    type="number"
                    class="form-control"
                    name="cantidad"
                    value="<?php echo $row["cantidad"] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="precio_u" class="form-label"
                    >Precio Unitario</label
                  >
                  <input
                    id="precio_u"
                    type="number"
                    class="form-control"
                    name="precio_u"
                    value="<?php echo $row["precio_untario"]?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="total_general" class="form-label"
                    >Total General</label
                  >
                  <input
                    id="total_general"
                    type="number"
                    class="form-control"
                    name="total_general"
                    value="<?php echo $row["total_general"] ?>"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="desc" class="form-label">Descripcion</label>
                <textarea
                  rows="3"
                  id="desc"
                  type="number"
                  class="form-control"
                  name="desc"
                ><?php echo $row["descripcion"] ?></textarea>
              </div>
            </div>
            <br />
            <button
              id="btn"
              class="btn rounded-sm w-100 p-3 shadow-sm"
              style="font-family: 'Lexend', sans-serif"
              type="submit"
            >
              Actualizar
            </button>
          </form>
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
