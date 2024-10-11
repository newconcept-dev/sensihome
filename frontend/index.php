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
    <link rel="stylesheet" href="./assets/css/hero-section.css">
    <link rel="stylesheet" href="./assets/css/cards.css">

    <title>Sensi Home</title>
</head>

<body>
    <header>
        <?php require_once './components/header.php'; ?>    
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
            <div class="card__container">
                <div class="oferts-product">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="https://espumassantander.com/wp-content/uploads/2017/01/sala-valdiri-jr-1024x442.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product3.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product2.png" alt="Imagen de producto compuesta">
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
        </section>

        <article class="banner__img__container">
            <img src="./fond1.jpg" alt="">
            <span>Frase inspiradora</span>
        </article>

        <div class="title-divider">
            <h2>Exclusivo en tienda</h2>
        </div>

        <section class="cards__products__group">
            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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

            <div class="card__container">
                <div class="oferts-product change-color-ofert">
                    <span>20%</span>
                </div>

                <div class="card-img">
                    <img src="./product.png" alt="Imagen de producto compuesta">
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


        </section>

        <div class="divider-sections-black"></div>
        <section class="banner__txt-img__container">
            <div class="container-info">
                <span>Espacios que <strong>inspiran</strong></span>
                <p>Lo mejor para tu hogar, donde el único límite sea tu creatividad Lo mejor para tu hogar, donde el único límite sea tu creatividad</p>
                <a href="#">Encontrar mi espacio ideal</a>
            </div>

            <div class="container-img">
                <img src="./fond.jpg" alt="Imagen de fondo">
            </div>
        </section>

        <div class="divider-sections-black"></div>




    </main>

    <footer>
        <?php require_once './components/footer.php'; ?>

    </footer>

    <script src="./assets/js/app.js"></script>
</body>

</html>