<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estilos.css" type="text/css">
</head>
<body>
    <mi-cabecera></mi-cabecera>
    <div class="container mt-5">
        <h1 class="text-center">Nuevo Producto</h1>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="../control/CrearProducto.php">
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="existencias">Existencias:</label>
                        <input type="number" class="form-control" id="existencias" name="existencias" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Seleccione Imagen:</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Crear Producto</button>

                        <a href="../control/ListarProductos.php" class="btn btn-primary">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <mi-pie></mi-pie>
    <script src="/js/mis-etiquetas.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
