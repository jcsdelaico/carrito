<?php

    # llamar al archivo de funciones.php
    require($_SERVER["DOCUMENT_ROOT"] . "/funciones.php");
    $productos = traer_productos();

    // comentarios php
    # comprobar si existe el idioma forma larga
    // if ( isset($_GET["idioma"]) ) echo "existe";
    // if ( !isset($_GET["idioma"]) ) echo "no existe";

    # comprobar si existe el idioma forma corta
    #echo isset($_GET["idioma"]) ? "existe" : "no existe";

    # bajar variable de la url y setearla a idioma
    $idioma = isset($_GET["idioma"]) ? $_GET["idioma"] : "es";
    # por si el idioma no es ninguno de los 3 establecidos
    if ( $idioma != "en" && $idioma != "pt" ) $idioma = "es";

    # setear valor en variable
    $titulo_carrito = "Carrito";
    $titulo_catalogo = "Catálogo";

    # condicionales de idioma
    # inglés
    if ( $idioma == "en" ) {
        $titulo_carrito = "Cart";
        $titulo_catalogo = "Catalogue";
    }
    # portugués
    if ( $idioma == "pt" ) {
        $titulo_carrito = "Carritou";
        $titulo_catalogo = "Catalog";
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $titulo_carrito; ?></title>
        <meta name="description" content="Carrito de compras">
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
                    Estás navegando la página en: <b><?= $idioma; ?></b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                    aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="nav-link <?= $idioma == "es" ? "text-danger" : "text-warning"; ?>" aria-current="page" href="#">
                            <?= $idioma == "en" ? "Contact" : ($idioma == "pt" ? "Conctacto portu" : "Contacto") ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /navbar -->


        <!-- contenido -->
        <div class="container">

            <div class="row justify-content-center">
                <!-- productos -->
                <div class="col-10">
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <h1 class="text-danger"><?= $titulo_catalogo; ?></h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        
                    <?php
                        # iterar en el vector productos
                        foreach ( $productos as $k => $p ) {
                            ?>
                                <div class="col-10 col-lg-3 text-center my-2">
                                    <!-- producto -->
                                    <div class="card">
                                    <img src="" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <!-- echo es parar mostrar en pantalla variables en php -->
                                        <h5 class="card-title"><?= $p["nombre_$idioma"]; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted ">$<?= $p["valor"]; ?></h6>
                                        <p class="card-text"><?= $p["descripcion_$idioma"]; ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <button data-id_boton="<?= $k; ?>" class="btn btn-sm btn-primary btn_restar">-</button>
                                        <span id="cantidad_<?= $k; ?>">0</span>
                                        <button data-id_boton="<?= $k; ?>" class="btn btn-sm btn-primary btn_sumar">+</button>
                                    </div>
                                    </div>
                                    <!-- /producto -->
                                </div>

                            <?php
                        }
                    ?>
                    </div>

                </div>
                <!-- /productos -->
                <!-- totales -->
                <div class="col-2">
                    <div class="row justify-content-center">
                        <div class="col text-center mt-5 div-totales">
                            <h5>Cantidad: <span class="cantidad-productos"></span></h5>
                            <h5>Total: <span class="total-pagar"></span></h5>
                        </div>
                    </div>
                </div>
                <!-- /totales -->
            </div>

        </div>         
        <!-- contenido -->

        <!-- footer -->
        <div class="container-fluid bg-light py-3 mt-5">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-4 text-center">Instagram</div>
                <div class="col-10 col-lg-4 text-center">Facebook</div>
                <div class="col-10 col-lg-4 text-center">Linkedin</div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center text-muted">
                    Copyright todos los derechos reservados. 2022
                </div>
            </div>
        </div>
        <!-- /footer -->

























        <script src="/res/js/jquery-3.4.1.min.js"></script>
        <script src="/res/js/popper.min.js"></script>
        <script src="/res/js/bootstrap.min.js"></script>
        <script>
            // pasar variables u objetos php a js
            var productos = <?= json_encode($productos);?>;
        </script>
        <script src="/res/js/funciones.js"></script>
    </body>
            </html>