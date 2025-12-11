<?php
session_start();

if(!isset($_SESSION['nombre'])){
    echo "<script>alert('Debes iniciar sesión');window.location='login.php';</script>";
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>RiseLabs Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--Script Paypal &currency=MXN -->
    <script src="https://www.paypal.com/sdk/js?client-id=AXMmFw0tIPtqvcxbvIGxLqpWDk-nuaFQ4aUOaxKVrcF5wd_yR1NfMsC1P0Szq3LxT9_qii-f35ac5jfJ"></script>

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png@cancel">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico@cancel">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop


copipeis

BOTON DE COMPRA DE PAYPAL-----------------------------------
<div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style:{
            color: 'blue',
            shape: 'pill',
            label: 'pay'
            },
        createOrder: function(data, actions){
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: 100
                    }
                }]
            });
        },

        onApprove: function(data, actions){
            actions.order.capture().then(function (detalles){
                alert("Pago realizado")
                console.log(detalles);
            });
        },

        onCancel: function(data){
            alert("Pago cancelado")
            console.log(data);
        }
    }).render('#paypal-button-container')
    </script>
-------------------------------------------------------------








https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">123itlac@lcardenas.tecnm.mx</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">7531685612</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Riselabs
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ver_compras.php">Compras</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                   
                    <a class="nav-icon position-relative text-decoration-none" href="perfil.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class=""></i>
                        <h4>Bienvenido, <?php echo $_SESSION['nombre']; ?> 👋</h4>
                    </a>
                    <a href="logout.php" style="padding:8px 15px;background:red;color:#fff;border-radius:5px;text-decoration:none;">
                            Cerrar sesión
                    </a>

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./ImagenesRiselabs/Wheyprotein.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Riselabs</b> Productos</h1>
                                <h3 class="h2">Suplementos y Equipo Premium para tu Rendimiento</h3>
                                <p>
                                    En RiseLabs impulsamos tu progreso con una línea de suplementos de alta calidad y equipo de entrenamiento profesional diseñados para maximizar fuerza, energía y recuperación.
                                    Cada producto está formulado con precisión científica y materiales de primera para acompañarte en cada meta. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./ImagenesRiselabs/RopaDeportiva.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Mejora tu entrenamiento con estilo</h1>
                                <p>
                                    En RiseLabs combinamos rendimiento y diseño en nuestra línea de ropa deportiva y accesorios funcionales.
Desde camisetas transpirables hasta guantes de levantamiento, cada prenda está hecha para acompañarte en cada repetición.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./ImagenesRiselabs/Creatina.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Recupera. Repara. Rinde.</h1>
                                <h3 class="h2">Suplementos de recuperación y bienestar</h3>
                                <p>
                                    La recuperación es esencial para fortalecer los músculos, reducir la fatiga y preparar tu cuerpo para el siguiente desafío.  
                                    Complementa tu entrenamiento con productos diseñados para cuidar tu rendimiento y bienestar.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestros productos</h1>
                <p>
                    Todo lo que necesitas para entrenar más fuerte, recuperarte mejor y mantener tu cuerpo al máximo nivel.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./ImagenesRiselabs/Creatina.png" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Creatina</h5>
                <p class="text-center"><a class="btn btn-success" href="shop-single-Creatina Birdman.php">Tienda</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./ImagenesRiselabs/Wheyprotein.png" class="rounded-circle img-fluid border" ></a>
                <h2 class="h5 text-center mt-3 mb-3">Proteina</h2>
                <p class="text-center"><a class="btn btn-success" href="shop-single-Proteina Gold Standard.php">Tienda</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./ImagenesRiselabs/Pre-entreno.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Pre-entreno</h2>
                <p class="text-center"><a class="btn btn-success" href="shop-single-Pre-entreno Gold Standard.php">Tienda</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos destacados</h1>
                    <p>
                        Descubre nuestros productos más populares entre atletas y entusiastas del fitness.  
                        Rendimiento, recuperación y energía para alcanzar tu máximo potencial.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single-Proteina Gold Standard.php">
                            <img src="./ImagenesRiselabs/Wheyprotein.png" class="card-img-top" alt="..." >
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$840.00</li>
                            </ul>
                            <a href="shop-single-Proteina Gold Standard.php" class="h2 text-decoration-none text-dark">Gold standard 100% Whey Protein</a>
                            <p class="card-text">
                                Proteína de alta pureza para apoyar el crecimiento y la recuperación muscular. Ideal para después del entrenamiento o como complemento diario de proteínas.
                            </p>
                            <p class="text-muted">Opiniones (24)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single-Creatina Birdman.php">
                            <img src="./ImagenesRiselabs/Creatina.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$780.00</li>
                            </ul>
                            <a href="shop-single-Creatina Birdman.php" class="h2 text-decoration-none text-dark">Creatina Birdman</a>
                            <p class="card-text">
                                Aumenta tu fuerza, potencia y resistencia. Fórmula micronizada para una mejor absorción y resultados visibles en tu rendimiento físico.
                            </p>
                            <p class="text-muted">Opiniones (48)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single-Pre-entreno Gold Standard.php">
                            <img src="./ImagenesRiselabs/Pre-entreno.png" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$660.00</li>
                            </ul>
                            <a href="shop-single-Pre-entreno Gold Standard.php" class="h2 text-decoration-none text-dark">Gold standard Pre-workout</a>
                            <p class="card-text">
                                Energía explosiva y enfoque total en cada entrenamiento. Con cafeína natural y beta-alanina para maximizar tu desempeño desde la primera repetición.
                            </p>
                            <p class="text-muted">Opiniones (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Riselabs</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 tecnm 60950
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">7531685612</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">123itlac@lcardenas.tecnm.mx</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Ropa</a></li>
                        <li><a class="text-decoration-none" href="#">Proteina</a></li>
                        <li><a class="text-decoration-none" href="#">Pre-entreno</a></li>
                        <li><a class="text-decoration-none" href="#">Creatina</a></li>
                        <li><a class="text-decoration-none" href="#">Accesorios</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Informacion</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Inicio</a></li>
                        <li><a class="text-decoration-none" href="#">Sobre nosotros</a></li>
                        <li><a class="text-decoration-none" href="#">Ubicacion</a></li>
                        <li><a class="text-decoration-none" href="#">Contactanos</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Correo</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">-></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2025 RiseLabs </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>