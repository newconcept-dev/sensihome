<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/head.php'; ?>
    <link rel="stylesheet" href="../assets/css/range-price.css">
    <link rel="stylesheet" href="../assets/css/category.page.css">
</head>

<body>
    <header>
        <?php include '../components/header.php'; ?>
    </header>

    <main>
        <div class="category-page__container">
            <div class="category__container">
                <div class="category__title">
                    <p>Salas</p>

                    <a class="apply-filters-category" hidden href="#">Filtrar</a>
                </div>

                <div class="filter__products">
                    <div class="position-navegation">
                        <span>Inicio<i class="fa-solid fa-greater-than"></i>Salas<i class="fa-solid fa-greater-than"></i>Esquineras</span>
                    </div>

                    <div class="responsive-2-col">
                        <div class="price-dropdown">
                            <!-- sumary -->
                            <details open>
                                <summary>
                                    <span>Precio</span>
                                </summary>
                                <div class="range_container">
                                    <div class="sliders_control">
                                        <div id="fromSliderTooltip" class="slider-tooltip">115</div>
                                        <input id="fromSlider" type="range" value="120" min="50" max="350" steps="10" />
                                        <div id="toSliderTooltip" class="slider-tooltip">120</div>
                                        <input id="toSlider" type="range" value="260" min="50" max="350" steps="10" />
                                    </div>
                                    <div id="scale" class="scale" data-steps="50"></div>
                                </div>
                            </details>
                        </div>

                        <div class="relevance-dropdown">
                            <details open>
                                <summary>
                                    <span>Relevancia</span>
                                </summary>

                                <div class="group-check">
                                    <div class="slide-check-container">
                                        <input type="checkbox" id="last-models" name="last-models">
                                        <label for="last-models"></label>
                                        <span>Ultimos modelos</span>
                                    </div>

                                    <div class="slide-check-container">
                                        <input type="checkbox" id="most-sold" name="most-sold">
                                        <label for="most-sold"></label>
                                        <span>Mas vendidos</span>
                                    </div>

                                    <div class="slide-check-container">
                                        <input type="checkbox" id="not-exists" name="not-exists">
                                        <label for="not-exists"></label>
                                        <span>Sin existencias</span>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>

                    <div class="responsive-1-col">
                        <div class="color-dropdown">
                            <details open>
                                <summary>
                                    <span>Color</span>
                                </summary>

                                <div class="colors-products group-check">
                                    <div class="color-element">
                                        <input type="checkbox" id="color-select" name="color">
                                        <label for="color-select">Amarillo</label>
                                    </div>
                                    <!-- Añadir más elementos de color aquí -->
                                </div>
                            </details>
                        </div>
                    </div>

                    <div hidden class="enter-filter">
                        <a href="">Aplicar filtros</a>
                    </div>



                </div>

            </div>

            <div class="leaked-products__container">
                <div class="filters-selects">
                    <p><strong>Filtros actuales</strong></p>

                    <div class="filter-elements">
                        <div class="filter-element">
                            <span>Precio: </span>
                            <i class="fa-solid fa-x"></i>
                        </div>

                        <div class="filter-element">
                            <span>Precio: </span>
                            <i class="fa-solid fa-x"></i>
                        </div>
                    </div>


                </div>

                <div class="products-filters">

                    <?php
                    for ($i = 0; $i < 12; $i++) { ?>
                        <div class="card__container">
                            <div class="oferts-product change-color-ofert">
                                <span>20%</span>
                            </div>

                            <div class="card-img">
                                <a href="./product.php"><img src="../product.png" alt="Imagen de producto compuesta"></a>
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

                </div>
            </div>
        </div>
        <div class="divider-sections-black"></div>
        <script src="../assets/js/range-price.js"></script>
    </main>


    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>

</html>