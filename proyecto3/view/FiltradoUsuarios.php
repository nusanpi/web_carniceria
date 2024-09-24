<!DOCTYPE html>
<html lang="es">
<title>Pedidos por usuarios</title>
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
    <?php 
    if (isset($_REQUEST['listado-pedidos-usu']) && !empty($_REQUEST['listado-pedidos-usu'])) {
        $pedidos = $_REQUEST['listado-pedidos-usu'];
       
        
          $numero_persona = isset($pedidos[0]['persona']) ? $pedidos[0]['persona'] : "";

        echo "<h1 class='text-center'>Listado de Pedidos de la persona: $numero_persona</h1>";
        
                
 ?>
                <hr>
                <div class="table-responsive">
                    <table class="table table-usu">
            <tr>
                <th>Código</th>
                <th>Persona</th>
                <th>Fecha</th>
                <th>Importe</th>
                <th>Estado</th>
            </tr>
            <?php foreach ($pedidos as $pedido) { ?>
                <tr>
                    <td><?php echo $pedido['codigo']; ?></td>
                    <td><?php echo $pedido['persona']; ?></td>
                    <td><?php echo $pedido['fecha']; ?></td>
                    <td><?php echo $pedido['importe']; ?></td>
                    <td><?php echo $pedido['estado']; ?></td>
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
               <div class="text-center">
                    
                     <a href="../control/ListarPedidos.php" class="btn btn-primary">Volver</a>
                </div>
               </div>
               </div>
               </div>
       
               <mi-pie></mi-pie>
    <?php } else { ?>
        <p>No hay pedidos para mostrar.</p>
    <?php } ?>
    <script src="/js/mis-etiquetas.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
