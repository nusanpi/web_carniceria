<?php 
    require_once('../model/AccesoBD.php');

	session_start();

	if (isset($_SESSION['usuario'])) {
        if(isset($_POST['codigo'])) {
            $codigoUsuario = $_POST['codigo'];
            $infousuarios = AccesoBD::infoUsuario($codigoUsuario);
            $_REQUEST['info-usuarios'] = $infousuarios;
            include_once '../view/EditarUsuarios.php';
        }  
    	
	} else {
    	header("Location: Login.php");
	}
      
?>
