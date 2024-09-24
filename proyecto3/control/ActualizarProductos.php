<?php

require_once('../model/AccesoBD.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];
    $imagen = $_POST['imagen'];
    
 
    $db = new AccesoBD();  
    $resultado = $db->actualizarProducto($codigo, $descripcion, $precio, $existencias, $imagen);
    if ($resultado) {
        $_REQUEST['msg']='Producto actualizado correctamente';
        include_once '../control/ListarProductos.php';
    } else {
        $_REQUEST['msg']='No se ha realizado ningún cambio';
        include_once '../control/ListarProductos.php';
    }
}



?>
