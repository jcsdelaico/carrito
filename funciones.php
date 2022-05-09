<?php

    if ( isset($_POST["btn_comprar"]) ) compra($_POST);
    if ( isset($_POST["btn_agregar_producto"]) ) agregar_producto($_POST);
    if ( isset($_POST["btn_actualizar_producto"]) ) actualizar_producto($_POST);

    function actualizar_producto($post) {
        extract($post);
        require("res/configuracion.inc");

        $fecha_registro = date("Y-m-d H:i:s");
        $sql = "UPDATE productos
                    SET nombre = '$tb_nombre',
                    valor = $tb_valor,
                    descripcion = '$tb_descripcion',
                    fecha_registro = '$fecha_registro'
                        WHERE id = $tb_id_producto
                    ";
        if (mysqli_query($connection, $sql)) {
            // redireccionar a una nueva página
            header("Location: editar.php?productoActualizadoOk&editar=$tb_id_producto");
        } else {
            // redireccionar a una nueva página
            header("Location: editar.php?productoActualizadoError&editar=$tb_id_producto");
        }
    }

    function agregar_producto($post) {
        extract($post);
        require("res/configuracion.inc");

        $fecha_registro = date("Y-m-d H:i:s");
        $sql = "INSERT INTO productos VALUES 
            (null, '$tb_nombre', $tb_valor, '$tb_descripcion', '$fecha_registro')";

        if (mysqli_query($connection, $sql)) {
            // redireccionar a una nueva página
            header("Location: producto.php?productoAgregadoOk");
        } else {
            echo "hubo un error en la compra";
            // redireccionar a una nueva página
            header("Location: producto.php?productoAgregadoError");
        }
    }

    function traer_compras() {
        require("res/configuracion.inc");

        $sql = "SELECT compras.email, compras.fecha_registro,
                productos.nombre, productos.valor
                FROM compras
                    JOIN compras_productos ON compras.id = compras_productos.id_compra
                    JOIN productos ON compras_productos.id_producto = productos.id
                ";
        $res = mysqli_query($connection, $sql);

        $compras = array();
        while ($f = mysqli_fetch_array($res) ) {
            $compras[] = array(
                "email"             => $f["email"],
                "nombre"            => $f["nombre"],
                "valor"             => $f["valor"],
                "fecha_registro"    => $f["fecha_registro"]
            );
        }
        return $compras;
    }

    function compra($post) {
        // saca las variables del vector
        extract($post);
        require("res/configuracion.inc");

        $fecha_registro = date("Y-m-d H:i:s");

        // insertar un registro en la tabla con la compra
        $sql = "INSERT INTO compras VALUES (null, '$tb_email', $tb_cantidad, $tb_total, '$fecha_registro')";
        if (mysqli_query($connection, $sql)) {
            // redireccionar a una nueva página
            header("Location: index.php?compraOk");
        } else {
            echo "hubo un error en la compra";
            // redireccionar a una nueva página
            header("Location: index.php?error");
        }
    }

    function traer_productos() {
        require("res/configuracion.inc");
        $sql = "SELECT * FROM productos";
        // paso las variables:
        // connection => que se crea en configuracion.inc
        // sql => con la consulta que quiero hacer
        $res = mysqli_query($connection, $sql);

        $productos = array();
        while ($f = mysqli_fetch_array($res) ) {
            $productos[] = array(
                "nombre"            => $f["nombre"],
                "valor"             => $f["valor"],
                "descripcion"       => $f["descripcion"],
                "cantidad"          => 0,
                "fecha_registro"    => $f["fecha_registro"],
                "caro"              => $f["valor"] > 2000 ? "caro" : "barato"
            );
        }
        // mandar el array al html
        return $productos;
    }

    function traer_producto($id) {
        require("res/configuracion.inc");
        $sql = "SELECT * FROM productos WHERE id = $id";
        // paso las variables:
        // connection => que se crea en configuracion.inc
        // sql => con la consulta que quiero hacer
        $res = mysqli_query($connection, $sql);

        $producto = array();
        while ($f = mysqli_fetch_array($res) ) {
            $producto = array(
                "id"                => $f["id"],
                "nombre"            => $f["nombre"],
                "valor"             => $f["valor"],
                "descripcion"       => $f["descripcion"],
                "cantidad"          => 0,
                "fecha_registro"    => $f["fecha_registro"]
            );
        }
        // mandar el array al html
        return $producto;
    }

?>