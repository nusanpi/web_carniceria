<?php
require_once('../model/AccesoBD.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../view/LoginForm.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];
        if (AccesoBD::activarUsuario($codigo)) {
            $_SESSION['msg'] = 'Usuario activado correctamente';
        } else {
            $_SESSION['msg'] = 'Error al activar el usuario';
        }
    }
    header('Location: ListarUsuarios.php');
}
?>
