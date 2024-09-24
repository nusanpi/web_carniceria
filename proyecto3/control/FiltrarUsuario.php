<?php 
    require_once('../model/AccesoBD.php');
    
    session_start();

    if (isset($_SESSION['usuario'])) {
         
            $usuario = $_REQUEST['usuario'];
            $pedidos = AccesoBD::obtenerPedidosUsuario($usuario);
            $_REQUEST['listado-pedidos-usu'] = $pedidos;
            include_once '../view/FiltradoUsuarios.php';
       

    }
    else {
        header("Location: Login.php");
    }
         
?>