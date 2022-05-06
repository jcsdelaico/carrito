<?php

    function traer_productos() {
        # variables
        $variable_modelo_int = 0;
        $variable_modelo_string = "juan";

        # declarar vector
        $productos = array();

        for ($i = 1; $i < 12; $i++) {
            $productos[] = array(
                "nombre_es"        => "producto $i",
                "nombre_en"        => "product $i",
                "nombre_pt"        => "produto $i",
                "valor"            => rand(500, 4500),
                "descripcion_es"   => "descripción producto $i",
                "descripcion_en"   => "description product $i",
                "descripcion_pt"   => "des prod $i",
                "cantidad"          => 0
            );
        }
        # devolver los productos 
        return $productos;
    }

?>