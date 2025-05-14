<?php

$conn_info = array(
    "Database"=>"facturas_bd"
);

$conn = sqlsrv_connect("MSI", $conn_info);

if (!$conn){
    die(print_r(sqlsrv_errors(), true));
}

function add_factura(string $desc, string $categoria, int $cantidad, string $precio_u, string $itebis, string $descuento, string $total_general, $conn){
    $query = "EXEC addFactura ?, ?, ?, ?, ?, ?, ?;";
    $stmt = sqlsrv_query($conn, $query, array($desc,$categoria, $cantidad, $precio_u, $itebis, $descuento, $total_general));

    if (!$stmt){
        echo "No se pudo agregar la factura, vuelva otra vez.";
        return;
    }

    header("Location: ../Pages/facturas.php");

}

function delete_factura(int $id, $conn){
    $query = "EXEC delFactura ?;";
    $stmt = sqlsrv_query($conn, $query, array($id));

    if (!$stmt){
        echo "No se pudo eliminar la factura, vuelva otra vez."; 
        return;
    }

    header("Location: ../Pages/facturas.php");
}

function update_factura(int $id, string $desc, string $categoria, int $cantidad, string $precio_u, string $itebis, string $descuento, string $total_general, $conn){
    $query = "EXEC updateFactura ?, ?, ?, ?, ?, ?, ?, ?;";
    $stmt = sqlsrv_query($conn, $query, array($id, $desc, $categoria,$cantidad, (float)$precio_u, (float)$itebis, (float)$descuento, (float)$total_general));

    if (!$stmt){
        echo "No se pudo actualizar la factura, vuelva otra vez."; 
        return;
    }
    header("Location: ../Pages/facturas.php");
}


?>