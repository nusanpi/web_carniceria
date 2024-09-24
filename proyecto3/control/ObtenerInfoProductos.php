<?php 
    require_once('../model/AccesoBD.php');

	session_start();

	if (isset($_SESSION['usuario'])) {
        if(isset($_POST['codigo'])) {
            $codigoProducto = $_POST['codigo'];
            $infoproductos = AccesoBD::infoProducto($codigoProducto);
            $_REQUEST['info-productos'] = $infoproductos;
            include_once '../view/EditarProductos.php';
        }  
    	
	} else {
    	header("Location: Login.php");
	}
      
?>
