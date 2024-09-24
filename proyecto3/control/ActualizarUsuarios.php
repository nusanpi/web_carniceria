<?php
 
require_once('../model/AccesoBD.php');

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $codigo = $_POST['codigo'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $admin = $_POST['admin'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    
    $db = new AccesoBD();

    
    $resultado = $db->actualizarUsuario($codigo, $usuario, $clave, $admin, $nombre, $direccion, $cp, $telefono, $correo);

   
    if ($resultado) {
        header("Location: ListarUsuarios.php");
        exit;
    } else {
        $_REQUEST['msg']='No se ha realizado ningún cambio';
        include_once '../control/ListarUsuarios.php';
       
    }
}
?>
