<!DOCTYPE html>
<html lang="es">
<title>Detalles del Pedido - Pedidos</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/estilos.css" type="text/css">


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<mi-cabecera></mi-cabecera>
<div class="cuerpo-usuarios">
            <div class="container">
                <h1 class="text-center">Detalles del Pedido </h1>
                <hr>
                <div class="table-responsive">
                    <table class="table table-usu">


    <?php
   
    if (isset($_REQUEST['detalles-pedido']) && !empty($_REQUEST['detalles-pedido'])) {
        $detallesPedido = $_REQUEST['detalles-pedido'];
    ?>
    
    
        <thead>
            <tr>
                <th>Código del Pedido</th>
                <th>Descripción del Producto</th>
                <th>Unidades</th>
                <th>Precio Unitario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detallesPedido as $detalle) { ?>
            <tr>
                <td><?php echo htmlspecialchars($detalle['codigo_pedido']); ?></td>
                <td><?php echo htmlspecialchars($detalle['descripcion']); ?></td>
                <td><?php echo htmlspecialchars($detalle['unidades']); ?></td>
                <td><?php echo htmlspecialchars($detalle['precio_unitario']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
             
             </div>
             </div>
           
             </div>
             
             <div class="text-center">
                  
                    <a href="../control/ListarPedidos.php" class="btn btn-primary">Volver</a>
                    
                </div>
             <mi-pie></mi-pie>

    <?php
    } else {
         
        echo "<p>No hay detalles disponibles para este pedido.</p>";
    }
    ?>

<script src="/js/mis-etiquetas.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
