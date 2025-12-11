<?php
// ver_compras.php


session_start();

if(!isset($_SESSION['nombre'])){
    echo "<script>alert('Debes iniciar sesión');window.location='login.php';</script>";
    exit;
}

// Define la ruta del archivo de registros de compras
$archivo_compras = 'compras_registros.json';
$compras = [];
$mensaje = '';

// ... Lógica para leer el archivo JSON (Sin cambios) ...
if (file_exists($archivo_compras)) {
    $contenido = file_get_contents($archivo_compras);
    $compras = json_decode($contenido, true);
    if ($compras === null || empty($compras)) {
        $compras = [];
        $mensaje = 'El archivo de registros de compras está vacío o el formato JSON es incorrecto.';
    }
} else {
    $mensaje = 'Aún no se ha registrado ninguna compra. El archivo ' . $archivo_compras . ' no existe.';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style2.css">


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
    
</head>
<body class="admin-body"> 
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="123itlac@lcardenas.tecnm.mx">123itlac@lcardenas.tecnm.mx</a>
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
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                       
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

    <div class="container admin-container"> 
        <div> </div>
        <div> </div>
        <div> </div>
        
        <h1 class="admin-title">📋 Registro de compras</h1>
        
        
        <hr class="admin-hr">

        <?php if ($mensaje): ?>
            <div class="alert admin-alert-info" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php else: ?>
            <p>Mostrando <?php echo count($compras); ?> compras registradas.</p>
            
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered admin-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Producto</th>
                            <th>Cantidad</th>
                            <th>Total Pagado</th>
                            <th>ID Transacción PayPal</th>
                            <th>Fecha y Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $contador = 1;
                        $compras_recientes = array_reverse($compras); 
                        foreach ($compras_recientes as $compra): 
                        ?>
                        <tr>
                            <td><?php echo $contador++; ?></td>
                            <td>**<?php echo htmlspecialchars($compra['id_producto']); ?>**</td>
                            <td><?php echo htmlspecialchars($compra['cantidad']); ?></td>
                            <td>$<?php echo number_format(htmlspecialchars($compra['total']), 2); ?></td>
                            <td class="text-break"><?php echo htmlspecialchars($compra['paypal_id']); ?></td>
                            <td><?php echo htmlspecialchars($compra['fecha']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <p class="mt-5">
            <button class="btn btn-secondary admin-btn-back" onclick="window.history.back()">← Volver</button>
        </p>
    </div>
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