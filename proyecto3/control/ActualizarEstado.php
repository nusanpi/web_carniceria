<?php

require_once('../model/AccesoBD.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $codigo_pedido = $_POST['codigo_pedido'];
    $estado = $_POST['estado'];

    
    $db = new AccesoBD();

     
    $resultado = $db->cambiarEstadoPedido($codigo_pedido, $estado);

    
    if ($resultado) {
        $_REQUEST['msg']='Estado del pedido actualizado correctamente';
        include_once '../control/ListarPedidos.php';
    } else {
        $_REQUEST['msg']='No se ha realizado ningún cambio';
        include_once '../control/ListarPedidos.php';
    }
}



?>
