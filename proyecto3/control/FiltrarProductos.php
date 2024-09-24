<?php 
    require_once('../model/AccesoBD.php');
    
    session_start();

    if (isset($_SESSION['usuario'])) {
        
        $producto = $_REQUEST['producto'];
        $productos = AccesoBD::obtenerPedidosPorDescripcionProducto($producto);
        $_REQUEST['listado-productos-desc'] = $productos;
        include_once '../view/FiltradoProductos.php';

    }
    else {
        header("Location: Login.php");
    }
         
?>