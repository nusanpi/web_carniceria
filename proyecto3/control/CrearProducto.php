<?php
require_once('../model/AccesoBD.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];
    $imagen = $_POST['imagen'];
    
    $destino = 'img/' . $imagen;

    $db = new AccesoBD();
    $resultado = $db->insertarProducto($descripcion, $precio, $existencias, $destino);

    if ($resultado) {
        $_REQUEST['msg_nuevo'] = 'Producto creado correctamente';
    } else {
        $_REQUEST['msg_nuevo'] = 'Error al crear el producto';
    }
    
    include_once '../control/ListarProductos.php';
}
?>
