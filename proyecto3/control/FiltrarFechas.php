<?php 
    require_once('../model/AccesoBD.php');
    
    session_start();

    
    if (isset($_SESSION['usuario'])) {
        

        $fecha = $_REQUEST['fecha'];
        $operador = $_REQUEST['operador'];
        if ($operador == '<=') {
            $pedidos = AccesoBD::obtenerPedidosPorFechaMenorIgual($fecha);
        }
        else if ($operador == '=') {
            $pedidos = AccesoBD::obtenerPedidosPorFechaIgual($fecha);
        }
        else if ($operador == '>=') {
            $pedidos = AccesoBD::obtenerPedidosPorFechaMayorIgual($fecha);
        }
        $_REQUEST['listado-pedidos-fecha'] = $pedidos;
        include_once '../view/FiltradoFechas.php';

    }
    else {
        header("Location: Login.php");
    }
         
?>