<?php

    require("funciones.php");

    $compras = traer_compras();

    foreach( $compras as $c ) {
        extract($c);
        echo "<p>venta de: $nombre, $valor, $fecha_registro al mail $email</p>";
    }


?>