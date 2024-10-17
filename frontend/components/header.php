<?php require_once '../php/model.php'; ?>

<section class="banner__desktop">
    <span class="material-icons">notifications</span>
    <p>Aprovecha este 10% de descuento en salas selecta para tu hogar</p>
</section>

<!-- Navbar Desktop elements-->
<nav hidden class="nav__container nav__desktop">
    <ul>
        <li>
            <a href="../"><img class="icon-nav" src="../assets/img/icons/ico.png" alt="Sensi Home Logo"><span class="text-nav-logo">Sensi Home</span></a>
        </li>
        <li>
            <div class="searchDesktop">
                <span class="material-icons">search</span>
                <input type="text" placeholder="Encuentra lo mejor para tu hogar. productos">
            </div>
        </li>
        <li hidden class="search-responsive">
            <a href="../pages/build-site.html"><span class="material-icons">search</span></a>
        </li>
        <li>
            <a href="../pages/build-site.html"><span class="material-icons">account_circle</span><span class="text-nav-icon">Acceder</span></a>

        </li>
        <li>
            <a href="../pages/build-site.html"><span class="material-icons">shopping_cart</span><span class="text-nav-icon">Carrito</span></a>
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
                    <a href="../pages/category.php">Item 1</a>
                    <a href="../pages/category.php">Item 2</a>
                    <a href="../pages/category.php">Item 3</a>
                    <a href="../pages/category.php">Item 4</a>
                    <a href="../pages/category.php">Item 5</a>
                    <a href="../pages/category.php">Item 6</a>
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
                    <a href="../pages/category.php">Item 1</a>
                    <a href="../pages/category.php">Item 2</a>
                    <a href="../pages/category.php">Item 3</a>
                    <a href="../pages/category.php">Item 4</a>
                    <a href="../pages/category.php">Item 5</a>
                    <a href="../pages/category.php">Item 6</a>
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
                    <a href="../pages/category.php">Item 1</a>
                    <a href="../pages/category.php">Item 2</a>
                    <a href="../pages/category.php">Item 3</a>
                    <a href="../pages/category.php">Item 4</a>
                    <a href="../pages/category.php">Item 5</a>
                    <a href="../pages/category.php">Item 6</a>
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
                    <a href="../pages/category.php">Item 1</a>
                    <a href="../pages/category.php">Item 2</a>
                    <a href="../pages/category.php">Item 3</a>
                    <a href="../pages/category.php">Item 4</a>
                    <a href="../pages/category.php">Item 5</a>
                    <a href="../pages/category.php">Item 6</a>
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
                    <a href="../pages/category.php">Item 1</a>
                    <a href="../pages/category.php">Item 2</a>
                    <a href="../pages/category.php">Item 3</a>
                    <a href="../pages/category.php">Item 4</a>
                    <a href="../pages/category.php">Item 5</a>
                    <a href="../pages/category.php">Item 6</a>
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
                    <a href="../pages/category.php">Item 1</a>
                    <a href="../pages/category.php">Item 2</a>
                    <a href="../pages/category.php">Item 3</a>
                    <a href="../pages/category.php">Item 4</a>
                    <a href="../pages/category.php">Item 5</a>
                    <a href="../pages/category.php">Item 6</a>
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
            <a href="../"><img class="icon-nav" src="../assets/img/icons/ico.png" alt="Sensi Home Logo"><span>Sensi Home</span></a>
        </li>
        <li class="search-responsive">
            <a id="search-open-responsive" href="#"><span class="material-icons">search</span></a>
        </li>
        <li>
            <a href="../pages/build-site.html"><span class="material-icons">account_circle</span></a>
        </li>
        <li>
            <a href="../pages/build-site.html"><span class="material-icons">shopping_cart</span></a>
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
                <a href="#"><img class="icon-nav" src="../assets/img/icons/ico.png" alt="Sensi Home Logo"><span>Sensi Home</span></a>
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

        <?php for ($i = 0; $i < 3; $i++) { ?>
            <a href="../pages/product.php">
                <div class="content__cards__rows">
                    <div class="content-card-img">
                        <img src="../product.png" alt="" >
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

        <?php for ($i = 0; $i < 3; $i++) { ?>
            <a href="../pages/product.php">
                <div class="content__cards__rows">
                    <div class="content-card-img">
                        <img src="../product.png" alt="" >
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