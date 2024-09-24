<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Editar Productos
    </title>
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/estilos.css" type="text/css">


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <mi-cabecera></mi-cabecera>
    <div class="container mt-5">
        <h1 class="text-center">Editar Producto </h1>
        <hr>
        <div class="table-responsive">
            <form method="post" action="ActualizarProductos.php">
                <table class="table tabla-usu">
                    <tbody>
                        <?php if(isset($_REQUEST['info-productos'])): ?>
                            <?php $producto = $_REQUEST['info-productos']; ?>
                            <tr>
                                <th>Código</th>
                                <td><input type="text" name="codigo" value="<?php echo $producto['codigo']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <th>Descripción</th>
                                <td><input type="text" name="descripcion" value="<?php echo $producto['descripcion']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Precio</th>
                                <td><input type="text" name="precio" value="<?php echo $producto['precio']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Existencias</th>
                                <td><input type="text" name="existencias" value="<?php echo $producto['existencias']; ?>"></td>
                            </tr>
                            <tr>
                                <th>Imagen</th>
                                <td><input type="text" name="imagen" value="<?php echo $producto['imagen']; ?>"></td>
                            </tr>
                           
                        <?php endif; ?>




                       
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                     <a href="../control/ListarProductos.php" class="btn btn-primary">Volver</a>
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
