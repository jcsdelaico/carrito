<?php

    if ( isset($_POST["btn_comprar"]) ) compra($_POST);

    function compra($post) {
        // saca las variables del vector
        extract($post);
        require("res/configuracion.inc");

        $fecha_registro = date("Y-m-d H:i:s");

        // insertar un registro en la tabla con la compra
        $sql = "INSERT INTO compras VALUES (null, '$tb_email', $tb_cantidad, $tb_total, '$fecha_registro')";
        if (mysqli_query($connection, $sql)) {
            // redireccionar a una nueva página
            header("Location: index.php?compraOk ");
        } else {
            echo "hubo un error en la compra";
            // redireccionar a una nueva página
            header("Location: index.php?error ");
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
                "fecha_registro"    => $f["fecha_registro"]
            );
        }
        // mandar el array al html
        return $productos;
    }

?>