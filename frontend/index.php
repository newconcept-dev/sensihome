<?php
require_once './php/model.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS external -->

    <!-- Icons Google -->

    <!-- SEO Meta -->
    <meta name="description" content="Sensi Home">
    <meta name="keywords" content="Sensi Home, Sensi, Home, tienda de muebles, muebles, comprar muebles">
    <meta name="author" content="Sensi Home">
    <meta name="robots" content="index, follow">
    <meta name="language" content="spanish">
    <meta name="generator" content="Sensi Home">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Sensi Home">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sensihome.com">
    <meta property="og:image" content="https://sensihome.com/img/logo.png">
    <meta property="og:description" content="Sensi Home">
    <meta property="og:site_name" content="Sensi Home">
    <meta property="og:locale" content="es_ES">
    <meta property="og:locale:alternate" content="en_US">

    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@sensihome">
    <meta name="twitter:creator" content="@sensihome">
    <meta name="twitter:title" content="Sensi Home">
    <meta name="twitter:description" content="Sensi Home">
    <meta name="twitter:image" content="https://sensihome.com/img/logo.png">
    <meta name="twitter:image:alt" content="Sensi Home">

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/icons/ico.png" type="image/x-icon">

    <!-- Icons google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Icons Awesome -->
    <script src="https://kit.fontawesome.com/d6da690718.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <title>Sensi Home</title>
</head>

<body>
    <header>
        <!-- <section class="banner__responsive">
            <span class="material-icons">notifications</span>
            <p>Aprovecha este 10% de descuento en salas exteriores y bonificación de $100 por cada $1000 de compra</p>
        </section> -->


        <!-- Navbar Desktop elements-->
        <nav class="nav__container nav__desktop">
            <ul>
                <li>
                    <a href="#"><img class="icon-nav" src="./assets/img/icons/ico.png" alt="Sensi Home Logo"><span class="text-nav-logo">Sensi Home</span></a>
                </li>

                <li>
                    <div class="searchDesktop">
                        <span class="material-icons">search</span>
                        <input type="text" placeholder="Encuentra lo mejor para tu hogar. productos">
                    </div>
                </li>
                <li hidden class="search-responsive">
                    <a href="#"><span class="material-icons">search</span></a>
                </li>
                <li>
                    <a href=""><span class="material-icons">account_circle</span><span class="text-nav-icon">Acceder</span></a>

                </li>
                <li>
                    <a href="#"><span class="material-icons">shopping_cart</span><span class="text-nav-icon">Carrito</span></a>
                </li>
            </ul>
        </nav>

        <!-- Nav bar Desktop elements -->

        <nav class="bar__category">
            <ul>
                <li>
                    <a href="#">Salas</a>
                </li>

                <li>
                    <a href="#">Comedores</a>
                </li>

                <li>
                    <a href="#">Recamaras</a>
                </li>

                <li>
                    <a href="#">Cocinas</a>
                </li>

                <li>
                    <a href="#">Decoración</a>
                </li>

                <li>
                    <a href="#">Ofertas</a>
                </li>


            </ul>

        </nav>


        <!-- Navbar Responsive elements -->
        <nav hidden class="nav__container navbar__responsive">
            <ul>
                <li>
                    <a href="#"><img class="icon-nav" src="./assets/img/icons/ico.png" alt="Sensi Home Logo"><span>Sensi Home</span></a>
                </li>
                <li class="search-responsive">
                    <a href="#"><span class="material-icons">search</span></a>
                </li>
                <li>
                    <a href=""><span class="material-icons">account_circle</span></a>
                </li>
                <li>
                    <a href="#"><span class="material-icons">shopping_cart</span></a>
                </li>
                <li>
                    <a id="menu-toggle" href="#"><span class="material-icons">menu</span></a>
                </li>
            </ul>
        </nav>

        <!-- Desplegable responsive elements -->
        <nav hidden class="nav__container nav__responsive">
            <ul>
                <li>
                    <a href="#">Nuestros Productos</a>
                </li>

                <?php foreach ($categorias as $categorias): ?>
                    <li>
                        <details class="category-content">
                            <summary>
                                <span class="material-icons">chair</span>
                                <?php echo htmlspecialchars($categorias['nombre']); ?>
                                <span class="material-icons row-category">expand_more</span>
                            </summary>

                            <a href="#"><small>Art 1</small></a>
                            <a href="#"><small>Art 2</small></a>
                            <a href="#"><small>Art 3</small></a>
                        </details>
                    </li>
                <?php endforeach; ?>


                <li class="rectangle"></li>
                <div class="footer__menu__container">
                    <li class="footer__menu">
                        <a href="#"><img class="icon-nav" src="./assets/img/icons/ico.png" alt="Sensi Home Logo"><span>Sensi Home</span></a>
                        <div class="col-II">
                            <div class="col">
                                <a href="#" class="customer-service">Atencion a clientes</a>
                                <a href="https://maps.app.goo.gl/prUPDryhDU49PvJ78"><i class="fa-solid fa-location-dot"></i><small>Sucursal</small></a>
                                <a href="tel:3333333333"><i class="fa-solid fa-phone"></i><small>33-33-33-33-33</small></a>
                                <a href="mailto:soporte@sensihome.com.mx"><i class="fa-solid fa-envelope"></i><small>soporte@sensihome.com.mx</small></a>
                            </div>
                            <div class="col">
                                <a href="#" class="social-networks">Redes Sociales</a>
                                <a href="https://es-la.facebook.com/people/Sensi-Home/100086412055824/"><i class="fa-brands fa-facebook"></i><small>Facebook</small></a>
                                <a href="https://www.instagram.com/sensi.home.mx/"><i class="fa-brands fa-instagram"></i><small>Instagram</small></a>
                                <a href=""><i class="fa-brands fa-whatsapp"></i><small>WhatsApp</small></a>
                            </div>
                        </div>
                        <a href="#" class="us">Nosotros</a>
                        <a href="#"><i class="fa-solid fa-lock"></i><small>Aviso de privacidad</small></a>
                        <a href="#"><i class="fa-solid fa-scale-balanced"></i> <small>Terminos y condiciones</small></a>
                        <span class="line"></span>

                        <a href="#" class="copy-mini">&copy; Sensi Home Todos los derechos reservados.</a>
                    </li>
                </div>

            </ul>
        </nav>

        <!-- <section hidden class="banner__responsive">
            <span class="material-icons">notifications</span>
            <p>Descubre nuestra amplia gama de muebles</p>
        </section> -->
    </header>

    <main>
        <section>
            <div class="sectiond">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_4XreDnpiAnYgZNCXzMXXcyI12KSRd241Yg&s" alt="">
            </div>

        </section>
    </main>

    <footer>
        <span class="line-div-responsive"></span>
        <div hidden class="footer__responsive">
            <div class="logo-footer-responsive">
                <a href="#"><img class="icon-nav" src="./assets/img/icons/ico.png" alt="Sensi Home Logo"></a>
                <span>Sensi Home</span>
            </div>

            <div class="responsive-columns">
                <div class="responsive-column">
                    <a href="#" class="responsive-customer-service">Atención a clientes</a>
                    <a class="elemt-footer-responsive" href="https://maps.app.goo.gl/prUPDryhDU49PvJ78"><i class="fa-solid fa-location-dot"></i><small>Sucursal</small></a>
                    <a class="elemt-footer-responsive" href="tel:3333333333"><i class="fa-solid fa-phone"></i><small>33-33-33-33-33</small></a>
                    <a class="elemt-footer-responsive" href="mailto:soporte@sensihome.com.mx"><i class="fa-solid fa-envelope"></i><small>soporte@sensihome.com.mx</small></a>
                </div>
                <div class="responsive-column">
                    <a href="#" class="responsive-social-networks">Redes Sociales</a>
                    <a class="elemt-footer-responsive" href="https://es-la.facebook.com/people/Sensi-Home/100086412055824/"><i class="fa-brands fa-facebook"></i><small>Facebook</small></a>
                    <a class="elemt-footer-responsive" href="https://www.instagram.com/sensi.home.mx/"><i class="fa-brands fa-instagram"></i><small>Instagram</small></a>
                    <a class="elemt-footer-responsive" href=""><i class="fa-brands fa-whatsapp"></i><small>WhatsApp</small></a>
                </div>
            </div>

            <div class="responsive-us-column">
                <a href="#" class="responsive-us">Nosotros</a>
                <a class="elemt-footer-responsive" href="#"><i class="fa-solid fa-lock"></i><small>Aviso de privacidad</small></a>
                <a class="elemt-footer-responsive" href="#"><i class="fa-solid fa-scale-balanced"></i><small>Términos y condiciones</small></a>
            </div>

            <span class="responsive-line"></span>
            <a href="#" class="responsive-copy-mini">&copy; Sensi Home Todos los derechos reservados.</a>
        </div>

        <!-- Foooter Desktop -->
        <div class="footer__desktop">
            <div class="logo-footer-desktop">
                <a href="#"><img class="icon-nav" src="./assets/img/icons/ico.png" alt="Sensi Home Logo"></a>
                <span>Sensi Home</span>
            </div>

            <div class="desktop-columns">
                <div class="desktop-column">
                    <a href="#" class="desktop-customer-service">Atención a clientes</a>
                    <a class="element-footer-desktop" href="https://maps.app.goo.gl/prUPDryhDU49PvJ78"><i class="fa-solid fa-location-dot"></i><small>Sucursal</small></a>
                    <a class="element-footer-desktop" href="tel:3333333333"><i class="fa-solid fa-phone"></i><small>33-33-33-33-33</small></a>
                    <a class="elemt-footer-responsive" href="mailto:soporte@sensihome.com.mx"><i class="fa-solid fa-envelope"></i><small>soporte@sensihome.com.mx</small></a>
                </div>
                <div class="desktop-column">
                    <a href="#" class="desktop-social-networks">Redes Sociales</a>
                    <a class="element-footer-desktop" href="https://es-la.facebook.com/people/Sensi-Home/100086412055824/"><i class="fa-brands fa-facebook"></i><small>Facebook</small></a>
                    <a class="element-footer-desktop" href="https://www.instagram.com/sensi.home.mx/"><i class="fa-brands fa-instagram"></i><small>Instagram</small></a>
                    <a class="element-footer-desktop" href=""><i class="fa-brands fa-whatsapp"></i><small>WhatsApp</small></a>
                </div>
                <div class="desktop-column">
                <a href="#" class="desktop-us">Nosotros</a>
                <a class="element-footer-desktop" href="#"><i class="fa-solid fa-lock"></i><small>Aviso de privacidad</small></a>
                <a class="element-footer-desktop" href="#"><i class="fa-solid fa-scale-balanced"></i><small>Términos y condiciones</small></a>
            </div>
            </div>



            <span class="desktop-line"></span>
            <a href="#" class="desktop-copy-mini">&copy; Sensi Home Todos los derechos reservados.</a>
        </div>
    </footer>

    <script src="./assets/js/app.js"></script>
</body>

</html>