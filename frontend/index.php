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
    <!-- Favicon for pages -->


    <!-- Icons google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Icons Awesome -->
    <script src="https://kit.fontawesome.com/d6da690718.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/hero-section.css">
    <link rel="stylesheet" href="./assets/css/cards.css">

    <!-- Font for pages -->
    <title>Sensi Home</title>
</head>

<body>
    <header>
        <section class="banner__desktop">
            <span class="material-icons">notifications</span>
            <p>Aprovecha este 10% de descuento en salas selecta para tu hogar</p>
        </section>

        <!-- Navbar Desktop elements-->
        <nav hidden class="nav__container nav__desktop">
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
                    <a href="./pages/build-site.html"><span class="material-icons">search</span></a>
                </li>
                <li>
                    <a href="./pages/build-site.html"><span class="material-icons">account_circle</span><span class="text-nav-icon">Acceder</span></a>

                </li>
                <li>
                    <a href="./pages/build-site.html"><span class="material-icons">shopping_cart</span><span class="text-nav-icon">Carrito</span></a>
                </li>
            </ul>
        </nav>

        <!-- Nav bar Desktop elements -->

        <nav class="bar__category">
            <ul>
                <li>
                    <a href="#">Salas</a>
                    <div class="drop__down">
                        <div class="elements-down">
                            <a href="./pages/category.php">Item 1</a>
                            <a href="./pages/category.php">Item 2</a>
                            <a href="./pages/category.php">Item 3</a>
                            <a href="./pages/category.php">Item 4</a>
                            <a href="./pages/category.php">Item 5</a>
                            <a href="./pages/category.php">Item 6</a>
                        </div>
                        <div class="img-down">
                            <img src="https://th.bing.com/th/id/R.6622f856544dccf3e7fa45bf2e0733fa?rik=H53FcEIbOQzQIw&riu=http%3a%2f%2fwww.elmueble.com%2fmedio%2f2016%2f06%2f13%2fsalon-en-tonos-beige-con-suelo-de-terrazo-y-puerta-en-arco_603555ce.jpg&ehk=ZnQsFHb9fF15MLWOxxNtET3Sxc3LU7iK%2fWETmR9V3Xg%3d&risl=&pid=ImgRaw&r=0" alt="Productos sensi">
                        </div>
                    </div>
                </li>

                <li>
                    <a href="#">Comedores</a>
                    <div class="drop__down">
                        <div class="elements-down">
                            <a href="./pages/category.php">Item 1</a>
                            <a href="./pages/category.php">Item 2</a>
                            <a href="./pages/category.php">Item 3</a>
                            <a href="./pages/category.php">Item 4</a>
                            <a href="./pages/category.php">Item 5</a>
                            <a href="./pages/category.php">Item 6</a>
                        </div>
                        <div class="img-down">
                            <img src="https://th.bing.com/th/id/R.6622f856544dccf3e7fa45bf2e0733fa?rik=H53FcEIbOQzQIw&riu=http%3a%2f%2fwww.elmueble.com%2fmedio%2f2016%2f06%2f13%2fsalon-en-tonos-beige-con-suelo-de-terrazo-y-puerta-en-arco_603555ce.jpg&ehk=ZnQsFHb9fF15MLWOxxNtET3Sxc3LU7iK%2fWETmR9V3Xg%3d&risl=&pid=ImgRaw&r=0" alt="Productos sensi">
                        </div>
                    </div>
                </li>

                <li>
                    <a href="#">Recamaras</a>
                    <div class="drop__down">
                        <div class="elements-down">
                            <a href="./pages/category.php">Item 1</a>
                            <a href="./pages/category.php">Item 2</a>
                            <a href="./pages/category.php">Item 3</a>
                            <a href="./pages/category.php">Item 4</a>
                            <a href="./pages/category.php">Item 5</a>
                            <a href="./pages/category.php">Item 6</a>
                        </div>
                        <div class="img-down">
                            <img src="https://th.bing.com/th/id/R.6622f856544dccf3e7fa45bf2e0733fa?rik=H53FcEIbOQzQIw&riu=http%3a%2f%2fwww.elmueble.com%2fmedio%2f2016%2f06%2f13%2fsalon-en-tonos-beige-con-suelo-de-terrazo-y-puerta-en-arco_603555ce.jpg&ehk=ZnQsFHb9fF15MLWOxxNtET3Sxc3LU7iK%2fWETmR9V3Xg%3d&risl=&pid=ImgRaw&r=0" alt="Productos sensi">
                        </div>
                    </div>
                </li>

                <li>
                    <a href="#">Cocinas</a>
                    <div class="drop__down">
                        <div class="elements-down">
                            <a href="./pages/category.php">Item 1</a>
                            <a href="./pages/category.php">Item 2</a>
                            <a href="./pages/category.php">Item 3</a>
                            <a href="./pages/category.php">Item 4</a>
                            <a href="./pages/category.php">Item 5</a>
                            <a href="./pages/category.php">Item 6</a>
                        </div>
                        <div class="img-down">
                            <img src="https://th.bing.com/th/id/R.6622f856544dccf3e7fa45bf2e0733fa?rik=H53FcEIbOQzQIw&riu=http%3a%2f%2fwww.elmueble.com%2fmedio%2f2016%2f06%2f13%2fsalon-en-tonos-beige-con-suelo-de-terrazo-y-puerta-en-arco_603555ce.jpg&ehk=ZnQsFHb9fF15MLWOxxNtET3Sxc3LU7iK%2fWETmR9V3Xg%3d&risl=&pid=ImgRaw&r=0" alt="Productos sensi">
                        </div>
                    </div>
                </li>

                <li>
                    <a href="#">Decoración</a>
                    <div class="drop__down">
                        <div class="elements-down">
                            <a href="./pages/category.php">Item 1</a>
                            <a href="./pages/category.php">Item 2</a>
                            <a href="./pages/category.php">Item 3</a>
                            <a href="./pages/category.php">Item 4</a>
                            <a href="./pages/category.php">Item 5</a>
                            <a href="./pages/category.php">Item 6</a>
                        </div>
                        <div class="img-down">
                            <img src="https://th.bing.com/th/id/R.6622f856544dccf3e7fa45bf2e0733fa?rik=H53FcEIbOQzQIw&riu=http%3a%2f%2fwww.elmueble.com%2fmedio%2f2016%2f06%2f13%2fsalon-en-tonos-beige-con-suelo-de-terrazo-y-puerta-en-arco_603555ce.jpg&ehk=ZnQsFHb9fF15MLWOxxNtET3Sxc3LU7iK%2fWETmR9V3Xg%3d&risl=&pid=ImgRaw&r=0" alt="Productos sensi">
                        </div>
                    </div>
                </li>

                <li>
                    <a href="#">Ofertas</a>
                    <div class="drop__down">
                        <div class="elements-down">
                            <a href="./pages/category.php">Item 1</a>
                            <a href="./pages/category.php">Item 2</a>
                            <a href="./pages/category.php">Item 3</a>
                            <a href="./pages/category.php">Item 4</a>
                            <a href="./pages/category.php">Item 5</a>
                            <a href="./pages/category.php">Item 6</a>
                        </div>
                        <div class="img-down">
                            <img src="https://th.bing.com/th/id/R.6622f856544dccf3e7fa45bf2e0733fa?rik=H53FcEIbOQzQIw&riu=http%3a%2f%2fwww.elmueble.com%2fmedio%2f2016%2f06%2f13%2fsalon-en-tonos-beige-con-suelo-de-terrazo-y-puerta-en-arco_603555ce.jpg&ehk=ZnQsFHb9fF15MLWOxxNtET3Sxc3LU7iK%2fWETmR9V3Xg%3d&risl=&pid=ImgRaw&r=0" alt="Productos sensi">
                        </div>
                    </div>
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
                    <a id="search-open-responsive" href="#"><span class="material-icons">search</span></a>
                </li>
                <li>
                    <a href="./pages/build-site.html"><span class="material-icons">account_circle</span></a>
                </li>
                <li>
                    <a href="./pages/build-site.html"><span class="material-icons">shopping_cart</span></a>
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

                            <a href="./pages/category.php"><small>Art 1</small></a>
                            <a href="./pages/category.php"><small>Art 2</small></a>
                            <a href="./pages/category.php"><small>Art 3</small></a>
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

        <div class="searchView__responsive">
            <div class="search-group">
                <div class="search__responsive-design">
                    <span class="material-icons">search</span>
                    <input type="text" placeholder="Encuentra lo mejor para tu hogar.">
                </div>
                <div class="close-search">
                    <a href="#" id="close-search-responsive"><span class="material-icons">close</span></a>
                </div>
            </div>
            <div class="products-result">

                <div class="result-title">
                    <span>Resultados</span><span class="line-result-title"></span>
                </div>

                <?php
                for ($i = 0; $i < 2; $i++) { ?>
                    <a href="./pages/product.php">
                        <div class="content__cards__rows">

                            <div class="content-card-img">
                                <img src="./product.png" alt="" style="">
                            </div>
                            <div class="content-card-info">
                                <span>
                                    <strong>Sillon padrisimo</strong>
                                </span>
                                <span>$1,890</span>
                            </div>

                        </div>
                    </a>
                <?php } ?>



                <div class="result-title">
                    <span>Promociones</span><span class="line-result-title"></span>
                </div>

                <?php
                for ($i = 0; $i < 2; $i++) { ?>
                    <a href="./pages/product.php">
                        <div class="content__cards__rows">

                            <div class="content-card-img">
                                <img src="./product.png" alt="" style="">
                            </div>
                            <div class="content-card-info">
                                <span>
                                    <strong>Sillon padrisimo</strong>
                                </span>
                                <span>$1,890</span>
                            </div>

                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>



        <section class="banner__responsive">
            <span class="material-icons">notifications</span>
            <p>Aprovecha este 10% de descuento en salas</p>
        </section>
    </header>

    <main>
        <article class="flayer__main__container">
            <div class="flayer-row">
                <div class="flayer-img">
                    <img src="https://cgifurniture.com/wp-content/uploads/2018/06/furniture-photography-7-types-of-images-View6.jpg"
                        alt="Flayer Image">
                </div>
                <div class="flayer-info">
                    <div class="flayer-info-principal">
                        <h1>Comedor <strong>amanecer</strong></h1>
                        <p>Lo mejor para tu hogar</p>
                        <span>$12,000</span>
                    </div>
                    <div class="flayer-phrase">
                        <p>Comodidad y gran estilo, solo en Sensi Home</p>
                    </div>
                </div>
            </div>

            <div class="flayer-divider-info">
                <p>Aprovecha nuestros descuentos de temporada</p>
            </div>
        </article>

        <div class="title-divider">
            <h2>Muebles para alegrar tu hogar</h2>
        </div>

        <section class="cards__products__oferts">


            <?php for ($i = 0; $i < 4; $i++) { ?>
                <div class="card__container">
                    <div class="oferts-product">
                        <span>20%</span>
                    </div>

                    <div class="card-img">
                        <a href="./pages/product.php"><img src="https://espumassantander.com/wp-content/uploads/2017/01/sala-valdiri-jr-1024x442.png" alt="Imagen de producto compuesta"></a>
                    </div>

                    <div class="price">
                        <p>$10,000</p>
                    </div>

                    <div class="rank">
                        <div class="heart-rank">
                            <span><i class="fa-solid fa-heart"></i></span>
                        </div>

                        <div class="stars-rank">
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                        </div>

                        <div class="cart-rank">
                            <span><i class="fa-solid fa-cart-plus"></i></span>
                        </div>
                    </div>

                    <div class="name-product">
                        <span>Nibe</span>
                    </div>
                </div>
            <?php } ?>


        </section>

        <article class="banner__img__container">
            <img src="./fond1.jpg" alt="">
            <span>Frase inspiradora</span>
        </article>

        <div class="title-divider">
            <h2>Exclusivo en tienda</h2>
        </div>

        <section class="cards__products__group">
            <?php
            for ($i = 0; $i < 4; $i++) { ?>
                <div class="card__container">
                    <div class="oferts-product change-color-ofert">
                        <span>20%</span>
                    </div>

                    <div class="card-img">
                        <a href="./pages/product.php"><img src="./product.png" alt="Imagen de producto compuesta"></a>
                    </div>

                    <div class="price">
                        <p>$10,000</p>
                    </div>

                    <div class="rank">
                        <div class="heart-rank">
                            <span><i class="fa-solid fa-heart"></i></span>
                        </div>

                        <div class="stars-rank">
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                            <span class="full-star"><i class="fa-solid fa-star"></i></span>
                        </div>

                        <div class="cart-rank">
                            <span><i class="fa-solid fa-cart-plus"></i></span>
                        </div>
                    </div>

                    <div class="name-product">
                        <span>Nibe</span>
                    </div>
                </div>
            <?php } ?>
        </section>

        <div class="divider-sections-black"></div>
        <section class="banner__txt-img__container">
            <div class="container-info">
                <span>Espacios que <strong>inspiran</strong></span>
                <p>Lo mejor para tu hogar, donde el único límite sea tu creatividad Lo mejor para tu hogar, donde el único límite sea tu creatividad</p>
                <a href="./pages/category.php">Encontrar mi espacio ideal</a>
            </div>

            <div class="container-img">
                <img src="./fond.jpg" alt="Imagen de fondo">
            </div>
        </section>

        <div class="divider-sections-black"></div>




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
                    <a class="elemt-footer-responsive" href="https://wa.me/3333333333"><i class="fa-brands fa-whatsapp"></i><small>WhatsApp</small></a>
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
        <div hidden class="footer__desktop">
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
                    <a class="element-footer-desktop" href="https://wa.me/3333333333"><i class="fa-brands fa-whatsapp"></i><small>WhatsApp</small></a>
                </div>
                <div class="desktop-column">
                    <a href="#" class="desktop-us">Nosotros</a>
                    <a class="element-footer-desktop" href="#"><i class="fa-solid fa-lock"></i><small>Aviso de privacidad</small></a>
                    <a class="element-footer-desktop" href="#"><i class="fa-solid fa-scale-balanced"></i><small>Términos y condiciones</small></a>
                </div>
            </div>



            <span class="desktop-line"></span>
            <a href="" class="desktop-copy-mini">&copy; Sensi Home Todos los derechos reservados.</a>
        </div>
    </footer>

    <!-- Boton whatsap -->
    <a class="whatsapp-float" href="https://wa.me/3333333333">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Boton de arriba -->
    <!-- <a class="arrow-up" href="#">
        <i class="fa-solid fa-arrow-up"></i>
    </a> -->

    <script src="./assets/js/app.js"></script>

    <!-- Boton arriba -->
<!--     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const arrowUp = document.querySelector('.arrow-up');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 200) { // Mostrar el botón después de hacer scroll 200px
                    document.body.classList.add('scrolled');
                } else {
                    document.body.classList.remove('scrolled');
                }
            });

            arrowUp.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script> -->
</body>

</html>