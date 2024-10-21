<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../components/head.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/userpage.css">
    <link rel="stylesheet" href="../assets/css/cards.css">
</head>

<body>
    <header>
        <?php include_once '../components/header.php'; ?>
    </header>

    <main>

        <div class="title-view-user">
            <h1>Informacion de contacto</h1>
        </div>

        <nav class="user-info__menu">


            <ul>
                <li>
                    <a href="#">Perfil</a>
                </li>


                <li>
                    <a href="#">Pedidos</a>
                </li>

                <li>
                    <a href="#">Lista de deseos</a>
                </li>
            </ul>
        </nav>

        <div class="info-user__container">

            <div class="profile-info">

                <div class="info-user-now">
                    <div class="group-info">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Ricardo Centeno Aguirre</span>
                    </div>

                    <div class="group-info">
                        <i class="fa-solid fa-envelope"></i>
                        <span>ricardo@gmail.com</span>
                    </div>

                    <div class="group-info">
                        <i class="fa-solid fa-phone"></i>
                        <span>1234567890</span>
                    </div>

                    <div class="group-info check-gi">
                        <input type="checkbox">
                        <span>Cambiar direccion de correo</span>
                    </div>

                    <div class="group-info check-gi">
                        <input type="checkbox">
                        <span>Cambiar mi contraseña</span>
                    </div>

                    <div class="group-info check-gi">
                        <input type="checkbox">
                        <span>Actualizar mi informacion personal</span>
                    </div>

                </div>

                <div class="change-data-user">
                    <form action="">
                        <div class="form-row-group">
                            <label for="email-correctly">Correo <span>*</span></label>
                            <input type="email" name="email-correctly" id="email-correctly" required>
                        </div>

                        <!-- contraseña -->
                        <div class="form-row-group">
                            <label for="password-correctly">Contraseña <span>*</span></label>
                            <input type="password" name="password-correctly" id="password-correctly" required>
                        </div>

                        <!-- Repetir contraseña -->
                        <div class="form-row-group">
                            <label for="password-correctly">Repetir contraseña <span>*</span></label>
                            <input type="password" name="password-correctly-repeat" id="password-correctly-repeat" required>
                        </div>

                        <div class="form-row-group">
                            <label for="name-correctly">Nombre <span>*</span></label>
                            <input type="text" name="name-correctly" id="name-correctly" required>
                        </div>

                        <div class="form-row-group">
                            <label for="lastname-correctly">Apellido <span>*</span></label>
                            <input type="text" name="lastname-correctly" id="lastname-correctly" required>
                        </div>

                        <div class="form-row-group">
                            <label for="phone-correctly">Telefono <span>*</span></label>
                            <input type="tel" name="phone-correctly" id="phone-correctly" required>
                        </div>

                        <button>
                            Actualizar datos
                        </button>


                    </form>
                </div>

            </div>

            <div class="orders-info">
                <?php
                for ($i = 0; $i < 1; $i++) { ?>
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

            <div class="wishlist-info">
                <?php
                for ($i = 0; $i < 2; $i++) { ?>
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
    </main>
    <div class="divider-sections-black"></div>
    <footer>
        <?php include_once '../components/footer.php'; ?>
    </footer>

</body>

</html>