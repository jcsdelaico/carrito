<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/res/css/bootstrap.min.css">
        <link rel="stylesheet" href="/res/css/estilos.css">
    </head>
    <body>

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Carrito</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                    aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="#">Contacto</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- /navbar -->


        <!-- contenido -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h1 class="text-danger">Catálogo</h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-lg-3 text-center">
                    <!-- producto -->
                    <div class="card">
                      <img src="" class="card-img-top" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">$1.500</h6>
                        <p class="card-text">Esta es la descripción del producto 1</p>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-sm btn-primary btn_restar">-</button>
                          <span id="cantidad_producto1">0</span>
                          <button class="btn btn-sm btn-primary btn_sumar">+</button>
                      </div>
                    </div>
                    <!-- /producto -->
                </div>
                <div class="col-10 col-lg-3 text-center">
                    <!-- producto -->
                    <div class="card">
                      <img src="" class="card-img-top" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">$1.500</h6>
                        <p class="card-text">Esta es la descripción del producto 2</p>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-sm btn-primary">-</button>
                          <span>0</span>
                          <button class="btn btn-sm btn-primary btn_sumar">+</button>
                      </div>
                    </div>
                    <!-- /producto -->
                </div>
                <div class="col-10 col-lg-3 text-center">
                    <!-- producto -->
                    <div class="card">
                      <img src="" class="card-img-top" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">$1.500</h6>
                        <p class="card-text">Esta es la descripción del producto 3</p>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-sm btn-primary">-</button>
                          <span>0</span>
                          <button class="btn btn-sm btn-primary">+</button>
                      </div>
                    </div>
                    <!-- /producto -->
                </div>
                <div class="col-10 col-lg-3 text-center">
                    <!-- producto -->
                    <div class="card">
                      <img src="" class="card-img-top" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Producto 4</h5>
                        <h6 class="card-subtitle mb-2 text-muted ">$1.500</h6>
                        <p class="card-text">Esta es la descripción del producto 4</p>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-sm btn-primary">-</button>
                          <span>0</span>
                          <button class="btn btn-sm btn-primary">+</button>
                      </div>
                    </div>
                    <!-- /producto -->
                </div>
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
        <script src="/res/js/funciones.js"></script>
    </body>
</html>