<?php

    # llamar al archivo de funciones.php
    require($_SERVER["DOCUMENT_ROOT"] . "/funciones.php");

    $producto = traer_producto($_GET["editar"]);


    # bajar variable de la url y setearla a idioma
    $idioma = isset($_get["idioma"]) ? $_get["idioma"] : "es";
    # por si el idioma no es ninguno de los 3 establecidos
    if ( $idioma != "en" && $idioma != "pt" ) $idioma = "es";

    # setear valor en variable
    $titulo_carrito = "carrito";
    $titulo_catalogo = "catálogo";

    # condicionales de idioma
    # inglés
    if ( $idioma == "en" ) {
        $titulo_carrito = "cart";
        $titulo_catalogo = "catalogue";
    }
    # portugués
    if ( $idioma == "pt" ) {
        $titulo_carrito = "carritou";
        $titulo_catalogo = "catalog";
    }

    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $titulo_carrito; ?></title>
        <meta name="description" content="carrito de compras">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/res/css/bootstrap.min.css">
        <link rel="stylesheet" href="/res/css/estilos.css">
    </head>
    <body>


        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <?= $titulo_carrito; ?> <br />
                    estás navegando la página en: <b><?= $idioma; ?></b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarid"
                    aria-controls="navbarid" aria-expanded="false" aria-label="toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarid">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="#">home</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="nav-link <?= $idioma == "es" ? "text-danger" : "text-warning"; ?>" aria-current="page" href="#">
                            <?= $idioma == "en" ? "contact" : ($idioma == "pt" ? "conctacto portu" : "contacto") ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /navbar -->

        <?php
            if ( isset($_GET["productoActualizadoOk"]) ) {
                ?>
                <div class="container-fluid py-2 bg-success">
                    Producto agregado ok
                </div>
                <?php
            }
            if ( isset($_GET["productoActualizadoError"]) ) {
                ?>
                <div class="container-fluid py-2 bg-danger">
                    Producto no se pude agregar
                </div>
                <?php
            }
        ?>

        <!-- contenido -->
        <div class="container">

            <div class="row justify-content-center">
                <!-- productos -->
                <div class="col-10 mt-3">
                    <form action="funciones.php" method="post">
                        <input type="text" name="tb_nombre" value="<?= $producto["nombre"];?>" placeholder="Nombre del producto" required />
                        <input type="number" name="tb_valor" value="<?= $producto["valor"];?>" placeholder="Valor del producto" required />
                        <input type="text" name="tb_descripcion" value="<?= $producto["descripcion"];?>" placeholder="Descripción del producto" required />
                        <input type="hidden" name="tb_id_producto" value="<?= $producto["id"]; ?>" />
                        <input type="submit" name="btn_actualizar_producto" value="Actualizar producto" class="btn btn-sm btn-primary" />
                    </form>
                </div>
                <!-- /productos -->
            </div>

        </div>         
        <!-- contenido -->

        <!-- footer -->
        <div class="container-fluid bg-light py-3 mt-5">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-4 text-center">instagram</div>
                <div class="col-10 col-lg-4 text-center">facebook</div>
                <div class="col-10 col-lg-4 text-center">linkedin</div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center text-muted">
                    copyright todos los derechos reservados. 2022
                </div>
            </div>
        </div>
        <!-- /footer -->

























        <script src="/res/js/jquery-3.4.1.min.js"></script>
        <script src="/res/js/popper.min.js"></script>
        <script src="/res/js/bootstrap.min.js"></script>
        <script src="/res/js/funciones.js"></script>
    </body>
        </html>