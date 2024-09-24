<html>
    <head>
        <title>Zona Administraci&oacute;n - Productos</title>
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
                <h1 class="text-center">Administración de Productos </h1>
                <hr>
                <div class="text-center">
                
                <a href="../view/NuevoProducto.php" class="btn btn-primary">Añadir Producto</a>
            </div>
        <div class="table-responsive">
                    <table class="table table-usu">
                       
       
            <thead>
                <tr>
                    <th>C&oacute;digo</th>
                    <th>Descripci&oacute;n</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Imágenes</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $productos = $_REQUEST['listado-productos'];
                    foreach ($productos as $producto) { 
                ?>
                <tr>
                    <td><?php echo $producto['codigo'] ?></td>
                    <td><?php echo $producto['descripcion'] ?></td>
                    <td><?php echo $producto['precio'] ?></td>
                    <td><?php echo $producto['existencias'] ?></td>
                    <td><img src="../<?php echo $producto['imagen']; ?>" width="100" height="100"></td>
                    <td>
                    <form method="post" action="ObtenerInfoProductos.php" style="display:inline;">
                        <input type="hidden" name="codigo" value="<?php echo $producto['codigo'] ?>">
                        <button type="submit" class="btn btn-primary mb-3">Editar</button>
                    </form>
                        
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
    if (isset($_REQUEST['msg_nuevo'])) {
        ?>
            <script>
                alert("<?php echo $_REQUEST['msg_nuevo']; ?>");
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