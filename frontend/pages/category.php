<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/head.php'; ?>
    <link rel="stylesheet" href="../assets/css/range-price.css">
</head>

<body>
    <header>
        <?php include '../components/header.php'; ?>
    </header>

    <main>
        <div class="category__container">
            <div class="category__title">
                <h1>Salas</h1>

                <a hidden href="#">Filtrar</a>
            </div>

            <div class="filter__products">
                <div class="position">
                    <span>Inicio<i class="fa-solid fa-greater-than"></i>Salas<i class="fa-solid fa-greater-than"></i>Esquineras</span>
                </div>

                <div class="price-dropdown">
                    <!-- sumary -->
                    <details>
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
                    <details>
                        <summary>
                            <span>Relevancia</span>
                        </summary>
                        <div class="last-models">
                            <input type="checkbox" id="last-models" name="last-models">
                            <label for="last-models">Ultimos modelos</label>
                        </div>

                        <div class="most-sold">
                            <input type="checkbox" id="most-sold" name="most-sold">
                            <label for="most-sold">Mas vendidos</label>
                        </div>

                        <div class="not-exists">
                            <input type="checkbox" id="not-exists" name="not-exists">
                            <label for="not-exists">Sin existencias</label>
                        </div>
                    </details>
                </div>

                <div class="color-dropdown">
                    <details>
                        <summary>
                            <span>Color</span>
                        </summary>

                        <div class="colors-products">
                            <div class="color">
                                <input type="checkbox" name="color">
                                <label for="color">Amarillo</label>
                            </div>
                        </div>
                    </details>
                </div>

                <div hidden class="enter-filter">
                    <a href="">Aplicar filtros</a>
                </div>



            </div>

        </div>
        <script src="../assets/js/range-price.js"></script>
    </main>


    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>

</html>