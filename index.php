<?php

    # llamar al archivo de funciones.php
    require($_SERVER["DOCUMENT_ROOT"] . "/funciones.php");
    $productos = traer_productos();

    // comentarios php
    # comprobar si existe el idioma forma larga
    // if ( isset($_get["idioma"]) ) echo "existe";
    // if ( !isset($_get["idioma"]) ) echo "no existe";

    # comprobar si existe el idioma forma corta
    #echo isset($_get["idioma"]) ? "existe" : "no existe";

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
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/res/css/bootstrap.min.css">
        <link rel="stylesheet" href="/res/css/estilos.css">
    </head>
    <body>

        <?php
            if ( isset($_get["compraok"]) ) {
                ?>
                    <div class="bg-success py-5">
                        <h2>compra ok</h2>
                        contáctanos al whatsapp para gestionar tu envio.
                    </div>
                <?php
                return;
            } 
            if ( isset($_get["error"]) ) {
                ?>
                    <div class="bg-danger py-5">
                        <h2>compra error</h2>
                        contactá a nuestro administrador para ver que falló
                    </div>
                <?php
                return;
            }
        ?>


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
                                            <?php
                                            if ( $p["caro"] == "caro" ) {
                                                ?>
                                                <div class="bg-danger">Producto caro</div>
                                                <?php
                                            }
                                            ?>
                                            <!-- echo es parar mostrar en pantalla variables en php -->
                                            <h5 class="card-title"><?= $p["nombre"]; ?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted ">$<?= $p["valor"]; ?></h6>
                                            <p class="card-text"><?= $p["descripcion"]; ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <button data-id_boton="<?= $k; ?>" class="btn btn-sm btn-primary btn_restar">-</button>
                                            <span id="cantidad_<?= $k; ?>">0</span>
                                            <button data-id_boton="<?= $k; ?>" class="btn btn-sm btn-primary btn_sumar">+</button>
                                        </div>
                                        <div class="card-footer bg-light text-start">
                                            <p class="border-bottom">Reacciones</p>
                                            <p class="py-0 my-0"><a class="my-0 display-block icono-reaccion"><i class="fa fa-smile-o me-2"></i>Me gusta</a></p>
                                            <p class="py-0 my-0"><a class="my-0 display-block icono-reaccion"><i class="fa fa-smile-o me-2"></i>Me interesa</a></p>
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
                            <form action="funciones.php" method="post">
                                <div class="div-mostrar-productos"></div>
                                <h5>total: <span class="total-pagar"></span></h5>
                                <input type="email" required name="tb_email" placeholder="ingrese su email..." />
                                <input type="hidden" id="tbcantidad" name="tb_cantidad" value="" />
                                <input type="hidden" id="tbtotal" name="tb_total" value="" />
                                <input type="submit" class="btn btn-success" name="btn_comprar" value="comprar" />
                            </form>
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
        <script>
            // pasar variables u objetos php a js
            var productos = <?= json_encode($productos);?>;
        </script>
        <script src="/res/js/funciones.js"></script>
    </body>
            </html>