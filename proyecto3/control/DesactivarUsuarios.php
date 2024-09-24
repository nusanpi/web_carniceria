<?php
require_once('../model/AccesoBD.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../view/LoginForm.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];
        if (AccesoBD::desactivarUsuario($codigo)) {
            $_SESSION['msg'] = 'Usuario desacctivado correctamente';
        } else {
            $_SESSION['msg'] = 'Error al desactivar el usuario';
        }
    }
    header('Location: ListarUsuarios.php');
    exit();
} else {
    header('Location: ListarUsuarios.php');
    exit();
}
?>
