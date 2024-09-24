<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilos.css" type="text/css">

    <title>Zona Administración</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php 
if (isset($_REQUEST['msg'])) {
?>
    <div class="text-center" style="color: red">
        <?php echo $_REQUEST['msg']?>
    </div>
<?php
}
if (isset($_REQUEST['a_usuario'])) {
    $a_usuario = $_REQUEST['a_usuario'];
} else {
    $a_usuario = '';
}   
?>

<div class="cuerpo">
        <div class="container login-container">
            <div class="card">
              <div class="card-header">
                <h3 class="text-center">ACCESO</h3>
              </div>
              <div class="card-body-index">
              <form  id="loginForm" name="" method="POST" action="../control/Login.php" autocomplete="off">
                  <div class="form-group">
                  <label for="p_usuario">Usuario:</label>
                  <input name="p_usuario" type="text"  class="form-control" value="<?php echo $a_usuario ?>" required autocomplete="off" /><br/>
                  </div>
                  <div class="form-group">
                  <label for="p_clave">Clave:</label>
                  <input name="p_clave" type="password"  class="form-control" required autocomplete="off" /><br/>
                  </div>
                <button type="submit" class="btn btn-primary " >Entrar a mantenimiento</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    

        <script src="/js/mis-etiquetas.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
       
</body>
</html>
