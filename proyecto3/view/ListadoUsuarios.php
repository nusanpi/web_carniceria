<html>
    <head>
        <title>Zona Administraci&oacute;n - Usuarios</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/estilos.css" type="text/css">


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
	<body>
        <mi-cabecera></mi-cabecera>
        <div class="cuerpo-usuarios">
            <div class="container">
                <h1 class="text-center">Administración de Usuarios </h1>
                <hr>
        <div class="table-responsive">
                    <table class="table table-usu">
                       
       
            <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th>Login</th>
                    <th>Es administrador</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                            <?php
                                $usuarios = $_REQUEST['listado-usuarios'];
                                foreach ($usuarios as $usuario) { 
                            ?>
                            <tr>
                                <td><?php echo $usuario['codigo'] ?></td>
                                <td><?php echo $usuario['usuario'] ?></td>
                                <td><?php echo ($usuario['admin'] == 1) ? '&#10003;' : '&#10060;'; ?></td>
                                <td><?php echo ($usuario['activo'] == 1) ? '&#10003;' : '&#10060;'; ?></td>
                                <td>
                                <form method="post" action="Obtenerinfousuarios.php" style="display:inline;">
                                    <input type="hidden" name="codigo" value="<?php echo $usuario['codigo'] ?>">
                                    <button type="submit" class="btn btn-primary mb-3">Editar</button>
                                </form>
                                    <?php if ($usuario['activo'] == 1) { ?>
                                        <form method="post" action="DesactivarUsuarios.php" style="display:inline;">
                                            <input type="hidden" name="codigo" value="<?php echo $usuario['codigo'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                        </form>
                                    <?php } else { ?>
                                        <form method="post" action="../control/ActivarUsuarios.php" style="display:inline;">
                                            <input type="hidden" name="codigo" value="<?php echo $usuario['codigo'] ?>">
                                            <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>      
                        </tbody>
               
        </table>
      
        </div>
        </div>
        </div>

        <mi-pie></mi-pie>
        <?php 
    if (isset($_REQUEST['msg'])) {
    ?>
        <script>
            alert("<?php echo $_REQUEST['msg']; ?>");
        </script>
    <?php
    }
    ?>

        
        <script src="/js/mis-etiquetas.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    </body>
</html>

