<?php
include('../Connection/conn.php');

if (isset($_POST["operation"])){
    switch($_POST["operation"]){
        case "add":
            $desc = isset($_POST['desc']) ? htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8') : '';
            $categoria = isset($_POST['categoria']) ? htmlspecialchars($_POST['categoria'], ENT_QUOTES, 'UTF-8') : '';
            $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : '';
            $precio_u = isset($_POST['precio_u']) ? (float)$_POST['precio_u'] : '';
            $itebis = isset($_POST['itebis']) ? (float)$_POST['itebis'] : '';
            $descuento = isset($_POST['descuento']) ? (float)$_POST['descuento'] : '';
            $total_general = isset($_POST['total_general']) ? (float)$_POST['total_general'] : '';
            
            add_factura($desc, $categoria, $cantidad, $precio_u, $itebis, $descuento, $total_general, $conn);
            break;
        case "delete":
            $id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : -1; 
            delete_factura($id, $conn);
            break;
        case "update":
            $id = isset($_POST["id"]) ? htmlspecialchars($_POST["id"]) : -1; 
            $desc = isset($_POST['desc']) ? htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8') : '';
            $categoria = isset($_POST['categoria']) ? htmlspecialchars($_POST['categoria'], ENT_QUOTES, 'UTF-8') : '';
            $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : '';
            $precio_u = isset($_POST['precio_u']) ? (float)$_POST['precio_u'] : '';
            $itebis = isset($_POST['itebis']) ? (float)$_POST['itebis'] : '';
            $descuento = isset($_POST['descuento']) ? (float)$_POST['descuento'] : '';
            $total_general = isset($_POST['total_general']) ? (float)$_POST['total_general'] : '';
            update_factura($id, $desc, $cantidad, $cantidad, $precio_u, $itebis, $desc, $total_general, $conn);
            break;
        default:
            break;
    }
}

?>