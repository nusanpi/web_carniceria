<?php

class AccesoBD
{
    private static function conectar()
    {
        $bbdd = mysqli_connect("localhost", "root", "DawLab", "bdweb");
        if (mysqli_connect_error()) {
            printf("Error conectando a la base de datos: %s\n", mysqli_connect_error());
            exit();
        }
        return $bbdd;
    }

    private static function desconectar($bbdd)
    {
        mysqli_close($bbdd);
    }

    public static function comprobarUsuarioAdmin($login, $clave)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        if ($st = mysqli_prepare($bbdd, "SELECT * FROM usuarios WHERE usuario=? and clave=? and admin=1")) {
            mysqli_stmt_bind_param($st, "ss", $login, $clave);
            mysqli_stmt_execute($st);
            mysqli_stmt_store_result($st);

            if (mysqli_stmt_num_rows($st) > 0) {
                $result = TRUE;
            }

            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function obtenerListadoUsuarios()
    {
        $bbdd = AccesoBD::conectar();
        $usuarios = [];

        if ($resultado = mysqli_query($bbdd, "SELECT codigo, usuario, activo, admin FROM usuarios")) {
            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($usuarios, $fila);
            }
            mysqli_free_result($resultado);
        }

        AccesoBD::desconectar($bbdd);
        return $usuarios;
    }

    public static function obtenerListadoProductos()
    {
        $bbdd = AccesoBD::conectar();
        $productos = [];

        if ($resultado = mysqli_query($bbdd, "SELECT codigo, descripcion, precio, existencias, imagen FROM productos")) {
            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($productos, $fila);
            }
            mysqli_free_result($resultado);
        }

        AccesoBD::desconectar($bbdd);
        return $productos;
    }

    public static function obtenerListadoPedidos()
    {
    
    $bbdd = AccesoBD::conectar();
    $pedidos = [];

   
    $consulta = "SELECT codigo, persona, fecha, importe, estado FROM pedidos";

    if ($resultado = mysqli_query($bbdd, $consulta)) {
     
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            array_push($pedidos, $fila);
        }
       
        mysqli_free_result($resultado);
    }

   
    AccesoBD::desconectar($bbdd);

    return $pedidos;
    }



    public static function insertarProducto($descripcion, $precio, $existencias, $imagen)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        if ($st = mysqli_prepare($bbdd, "INSERT INTO productos (codigo, descripcion, precio, existencias, imagen) VALUES (NULL, ?, ?, ?, ?)")) {
            mysqli_stmt_bind_param($st, "sdis", $descripcion, $precio, $existencias, $imagen);
            mysqli_stmt_execute($st);

            $result = mysqli_stmt_affected_rows($st) > 0;
            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function activarUsuario($codigo)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        if ($st = mysqli_prepare($bbdd, "UPDATE usuarios SET activo=1 WHERE codigo=?")) {
            mysqli_stmt_bind_param($st, "i", $codigo);
            mysqli_stmt_execute($st);

            $result = mysqli_stmt_affected_rows($st) > 0;
            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function desactivarUsuario($codigo)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        if ($st = mysqli_prepare($bbdd, "UPDATE usuarios SET activo=0 WHERE codigo=?")) {
            mysqli_stmt_bind_param($st, "i", $codigo);
            mysqli_stmt_execute($st);

            $result = mysqli_stmt_affected_rows($st) > 0;
            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function infoUsuario($codigo)
    {
        $bbdd = AccesoBD::conectar();
        $result = [];

        if ($st = mysqli_prepare($bbdd, "SELECT codigo, usuario, clave, admin, nombre, direccion, cp, telefono, correo FROM usuarios WHERE codigo=?")) {
            mysqli_stmt_bind_param($st, "i", $codigo);
            mysqli_stmt_execute($st);
            mysqli_stmt_bind_result($st, $codigo, $usuario, $clave, $admin, $nombre, $direccion, $cp, $telefono, $correo);

            if (mysqli_stmt_fetch($st)) {
                $result = [
                    'codigo' => $codigo,
                    'usuario' => $usuario,
                    'clave' => $clave,
                    'admin' => $admin,
                    'nombre' => $nombre,
                    'direccion' => $direccion,
                    'cp' => $cp,
                    'telefono' => $telefono,
                    'correo' => $correo
                ];
            }

            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function actualizarUsuario($codigo, $usuario, $clave, $admin, $nombre, $direccion, $cp, $telefono, $correo)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        
        if ($stmt = mysqli_prepare($bbdd, "UPDATE usuarios SET usuario=?, clave=?, admin=?, nombre=?, direccion=?, cp=?, telefono=?, correo=? WHERE codigo=?")) {
            mysqli_stmt_bind_param($stmt, "ssisssssi", $usuario, $clave, $admin, $nombre, $direccion, $cp, $telefono, $correo, $codigo);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_affected_rows($stmt) > 0;
            mysqli_stmt_close($stmt);
        }
        
        AccesoBD::desconectar($bbdd);
        return $result;
    }



    public static function infoProducto($codigo)
    {
        $bbdd = AccesoBD::conectar();
        $result = [];

        if ($st = mysqli_prepare($bbdd, "SELECT codigo, descripcion, precio, existencias, imagen FROM productos WHERE codigo=?")) {
            mysqli_stmt_bind_param($st, "i", $codigo);
            mysqli_stmt_execute($st);
            mysqli_stmt_bind_result($st, $codigo, $descripcion, $precio, $existencias, $imagen);

            if (mysqli_stmt_fetch($st)) {
                $result = [
                    'codigo' => $codigo,
                    'descripcion' => $descripcion,
                    'precio' => $precio,
                    'existencias' => $existencias,
                    'imagen' => $imagen
                ];
            }

            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function actualizarProducto($codigo, $descripcion, $precio, $existencias, $imagen)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        if ($st = mysqli_prepare($bbdd, "UPDATE productos SET descripcion=?, precio=?, existencias=?, imagen=? WHERE codigo=?")) {
            mysqli_stmt_bind_param($st, "sdisi", $descripcion, $precio, $existencias, $imagen, $codigo);
            mysqli_stmt_execute($st);
            $result = mysqli_stmt_affected_rows($st) > 0;
            mysqli_stmt_close($st);
        }

        AccesoBD::desconectar($bbdd);
        return $result;
    }

    public static function obtenerDetallesPedido($codigo_pedido)
    {
        $bbdd = AccesoBD::conectar();
        $detallesPedido = [];

        $consulta = "
            SELECT dp.codigo_pedido, p.descripcion, dp.unidades, dp.precio_unitario
            FROM detalle dp
            JOIN productos p ON dp.codigo_producto = p.codigo
            WHERE dp.codigo_pedido = ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            mysqli_stmt_bind_param($stmt, "i", $codigo_pedido);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($detallesPedido, $fila);
            }

            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $detallesPedido;
    }   

    public static function cambiarEstadoPedido($codigo_pedido, $estado)
    {
        $bbdd = AccesoBD::conectar();
        $result = FALSE;

        $consulta = "UPDATE pedidos SET estado = ? WHERE codigo = ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            mysqli_stmt_bind_param($stmt, "si", $estado, $codigo_pedido);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_affected_rows($stmt) > 0;
            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $result;
    }

    public static function obtenerPedidosUsuario($codigo_usuario)
    {
        $bbdd = AccesoBD::conectar();
        $pedidos = [];

        $consulta = "SELECT codigo, persona, fecha, importe, estado FROM pedidos WHERE persona = ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            mysqli_stmt_bind_param($stmt, "i", $codigo_usuario);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($pedidos, $fila);
            }

            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $pedidos;
    }

    public static function obtenerPedidosPorDescripcionProducto($descripcion_producto)
    {
        $bbdd = AccesoBD::conectar();
        $pedidos = [];

        $consulta = "
            SELECT p.codigo, p.persona, p.fecha, p.importe, p.estado
            FROM pedidos p
            JOIN detalle d ON p.codigo = d.codigo_pedido
            JOIN productos pr ON d.codigo_producto = pr.codigo
            WHERE pr.descripcion LIKE ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            $descripcion_producto = "%$descripcion_producto%";
            mysqli_stmt_bind_param($stmt, "s", $descripcion_producto);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($pedidos, $fila);
            }

            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $pedidos;
    }

    public static function obtenerPedidosPorFechaIgual($fecha)
    {
        $bbdd = AccesoBD::conectar();
        $pedidos = [];

        $consulta = "SELECT codigo, persona, fecha, importe, estado FROM pedidos WHERE fecha = ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            mysqli_stmt_bind_param($stmt, "s", $fecha);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($pedidos, $fila);
            }

            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $pedidos;
    }

    public static function obtenerPedidosPorFechaMenorIgual($fecha)
    {
        $bbdd = AccesoBD::conectar();
        $pedidos = [];

        $consulta = "SELECT codigo, persona, fecha, importe, estado FROM pedidos WHERE fecha <= ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            mysqli_stmt_bind_param($stmt, "s", $fecha);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($pedidos, $fila);
            }

            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $pedidos;
    }

    public static function obtenerPedidosPorFechaMayorIgual($fecha)
    {
        $bbdd = AccesoBD::conectar();
        $pedidos = [];

        $consulta = "SELECT codigo, persona, fecha, importe, estado FROM pedidos WHERE fecha >= ?";

        if ($stmt = mysqli_prepare($bbdd, $consulta)) {
            mysqli_stmt_bind_param($stmt, "s", $fecha);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                array_push($pedidos, $fila);
            }

            mysqli_stmt_close($stmt);
        }

        AccesoBD::desconectar($bbdd);

        return $pedidos;
    }

}


?>
