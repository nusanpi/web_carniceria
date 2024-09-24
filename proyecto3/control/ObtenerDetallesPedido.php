<?php 
 
require_once('../model/AccesoBD.php');

session_start();

if (isset($_SESSION['usuario'])) {
    if(isset($_POST['codigo_pedido'])) {
        $codigo_pedido = $_POST['codigo_pedido'];
        $detallesPedido = AccesoBD::obtenerDetallesPedido($codigo_pedido);
        $_REQUEST['detalles-pedido'] = $detallesPedido;
        include_once '../view/DetallesPedido.php';
    }  
} else {
    header("Location: Login.php");
}
?>
