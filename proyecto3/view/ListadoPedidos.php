<!DOCTYPE html>
<html lang="es">
<head>
<title>Listado pedidos - Pedidos</title>
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
                <h1 class="text-center">Listado de Pedidos </h1>
                <hr>
                <form action="FiltrarUsuario.php" method="post" class="form-inline mb-3">
                <label for="usuario" class="mr-2">Código de Usuario:</label>
                <input type="text" name="usuario" id="usuario" class="form-control mr-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>

                <form method="POST" action="FiltrarProductos.php" class="form-inline mb-3">
                <label for="producto" class="mr-2">Descripción del Producto: </label>
                <input type="text" id="producto" name="producto" class="form-control mr-2" required>
                <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>


                <form method="POST" action="FiltrarFechas.php" class="form-inline mb-3">
                <label for="fecha" class="mr-2">Fecha: </label>
                <input type="date" id="fecha" name="fecha" class="form-control mr-2" required>
                <select id="operador" name="operador" class="form-control mr-2" required>
                    <option value="<=">Menor o Igual</option>
                    <option value="=">Igual</option>
                    <option value=">=">Mayor o Igual</option>
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>

                <div class="table-responsive">
                    <table class="table table-usu">

    <?php
   
    if (isset($_REQUEST['listado-pedidos']) && !empty($_REQUEST['listado-pedidos'])) {
        $pedidos = $_REQUEST['listado-pedidos'];
    ?>
    
  
        <thead>
            <tr>
                <th>Código</th>
                <th>Persona</th>
                <th>Fecha</th>
                <th>Importe</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) { ?>
            <tr>
                <td><?php echo htmlspecialchars($pedido['codigo']); ?></td>
                <td><?php echo htmlspecialchars($pedido['persona']); ?></td>
                <td><?php echo htmlspecialchars($pedido['fecha']); ?></td>
                <td><?php echo htmlspecialchars($pedido['importe']); ?></td>
                <td> 
                    <form action="ActualizarEstado.php" method="post" class="form-inline">
                        <input type="hidden" name="codigo_pedido" value="<?php echo $pedido['codigo']; ?>">
                        <select name="estado" class="form-control mr-2">
                             <option value="1" <?php echo $pedido['estado'] == 1 ? 'selected' : ''; ?>>Pendiente</option>
                             <option value="2" <?php echo $pedido['estado'] == 2 ? 'selected' : ''; ?>>Enviado</option>
                             <option value="3" <?php echo $pedido['estado'] == 3 ? 'selected' : ''; ?>>Entregado</option>
                             <option value="4" <?php echo $pedido['estado'] == 4 ? 'selected' : ''; ?>>Cancelado</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </td>
                <td>
                    <form action="ObtenerDetallesPedido.php" method="post">
                        <input type="hidden" name="codigo_pedido" value="<?php echo $pedido['codigo']; ?>">
                        <button type="submit" class="btn btn-primary">Detalles</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
               
               </table>
             
               </div>
               </div>
               </div>
       
               <mi-pie></mi-pie>
    <?php
    } else {
       
        echo "<p>No hay pedidos disponibles.</p>";
    }
    ?>
     
    <script src="/js/mis-etiquetas.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
