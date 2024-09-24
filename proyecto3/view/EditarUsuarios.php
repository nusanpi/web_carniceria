<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Editar Usuarios</title>
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/estilos.css" type="text/css">


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <mi-cabecera></mi-cabecera>
    <div class="container mt-5">
        <h1 class="text-center">Editar Usuarios </h1>
        <hr>
        <div class="table-responsive">
            <form method="post" action="ActualizarUsuarios.php">
                <table class="table tabla-usu">
                    <tbody>
                        <?php if(isset($_REQUEST['info-usuarios'])): ?>
                            <?php $usuario = $_REQUEST['info-usuarios']; ?>
                            <tr>
                                <th>Código</th>
                                <td><input type="text" name="codigo" value="<?php echo $usuario['codigo']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Usuario</th>
                                <td><input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Clave</th>
                                <td><input type="text" name="clave" value="<?php echo $usuario['clave']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Admin</th>
                                <td><input type="text" name="admin" value="<?php echo $usuario['admin'] ; ?>"></td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td><input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td><input type="text" name="direccion" value="<?php echo $usuario['direccion']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Código Postal</th>
                                <td><input type="text" name="cp" value="<?php echo $usuario['cp']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td><input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Correo</th>
                                <td><input type="text" name="correo" value="<?php echo $usuario['correo']; ?>"></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="../control/ListarUsuarios.php" class="btn btn-primary">Volver</a>
                    
                </div>
            </form>
        </div>
    </div>
    <mi-pie></mi-pie>
    
    <script src="/js/mis-etiquetas.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
