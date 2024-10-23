<!DOCTYPE html>
<html lang="en">
<!-- Semi transparencia quitalo de aqui y muevelo al css
 rgba(0, 0, 0, 0.8); -->

<head>
    <?php include_once '../components/head.php'; ?>
    <link rel="stylesheet" href="../assets/css/product.page.css">
</head>

<body>
    <header>
        <?php include_once '../components/header.php'; ?>
    </header>

    <main>

        <div class="product-select__container">
            <div class="title-section-product">
                <p><strong>Salas</strong></p>
            </div>

            <div class="navegation-bar-position">
                <a href="">Inicio</a><i class="fa-solid fa-greater-than"></i>
                <a href="">Productos</a><i class="fa-solid fa-greater-than"></i>
                <a href="">Esquineras</a>
            </div>

            <div hidden class="card-product-main">
                <div class="title-product">
                    <p>Sillon Padrisimo</p>
                </div>

                <div class="product-img">
                    <img src="../product.png" alt="sillon1">
                </div>

                <div class="paggination-img">
                    <i class="fa-solid fa-circle paggination-position-1"></i>
                    <i class="fa-solid fa-circle paggination-position-2"></i>
                    <i class="fa-solid fa-circle paggination-position-3"></i>
                </div>

                <div class="product-price">
                    <p>$8000</p>
                </div>

                <div class="product-event">
                    <div class="product-counter">

                        <i class="fa-solid fa-square-minus"></i>
                        <span>0</span>
                        <i class="fa-solid fa-square-plus"></i>
                    </div>

                    <div class="product-add">
                        <a href="#">Agregar a carrito</a>
                    </div>
                </div>
            </div>


            <div class="card-product-desktop">
                <div class="col-left-product">
                    <div class="product-group">
                        <div class="img-top">
                            <img src="../product.png" alt="sillon1">
                        </div>

                        <div class="cols-img-bottom">
                            <div class="col-img-bt">
                                <img src="../product.png" alt="sillon1">
                            </div>
                            <div class="col-img-bt">
                                <img src="../product.png" alt="sillon1">
                            </div>
                            <div class="col-img-bt">
                                <img src="../product.png" alt="sillon1">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-right-product">
                    <div class="title-product">
                        <p>Sillon Padrisimo</p>
                    </div>

                    <div class="rate-product">
                        <i class="fa-solid fa-star rang-1"></i>
                        <i class="fa-solid fa-star rang-2"></i>
                        <i class="fa-solid fa-star rang-3"></i>
                        <i class="fa-solid fa-star rang-4"></i>
                        <i class="fa-solid fa-star rang-5"></i>

                    </div>

                    <div class="product-price">
                        <p>$8000</p>
                    </div>

                    <div class="product-description-card">
                        <p>El sillon padrisimo es un sillon muy comodo y elegante, con un diseño moderno y minimalista.</p>
                    </div>

                    <div class="product-event">
                        <div class="product-counter">

                            <i class="fa-solid fa-square-minus"></i>
                            <span>0</span>
                            <i class="fa-solid fa-square-plus"></i>
                        </div>

                        <div class="product-add">
                            <a href="#">Agregar a carrito</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="line-divider-small"><span></span></div>

            <div class="details-product">
                <div class="caracteristic__container">
                    <div class="caracteristic-title">
                        <p>Caracteristicas generales</p>
                    </div>

                    <div class="caracteristic-description">

                    </div>
                </div>

                <div class="measure__container">
                    <div class="measure-title">
                        <p>Dimensiones</p>
                    </div>

                    <div class="measure-description">

                    </div>
                </div>
            </div>
        </div>

        <div hidden class="pop-pup-product">
            <div class="col-1-main">
                <div class="title-pop">
                    <p>Sillon Padrisimo</p>
                    <i class="fa-solid fa-x"></i>
                </div>

                <div class="img-main-pop">
                    <img src="../product.png" alt="sillon1">
                </div>

            </div>

            <div class="col-2-secundary">
                <div class="col-secundary-img">
                    <img src="../product.png" alt="sillon1">
                </div>
                <div class="col-secundary-img">
                    <img src="../product.png" alt="sillon1">
                </div>
                <div class="col-secundary-img">
                    <img src="../product.png" alt="sillon1">
                </div>
            </div>
        </div>

        <div class="divider-sections-black"></div>
    </main>


    <footer>
        <?php include_once '../components/footer.php'; ?>
    </footer>
</body>

</html>