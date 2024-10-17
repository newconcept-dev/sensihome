<?php include_once '../php/model.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d6da690718.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/gangway.css">
    <title>Confirmacion del pago</title>
</head>

<body>
    <header>
        <nav class="payment-nav">
            <a href="#"><img class="icon-nav" src="../assets/img/icons/ico.png" alt="Sensi Home Logo"><span class="text-nav-logo">Sensi Home</span></a>
            <a href="#">¿Necesitas ayuda? <a href=""><strong>33-33-33-33-33</strong></a></a>
        </nav>
    </header>

    <div class="payment-progress">
        <span class="bar-status"></span>
        <div class="stape-one-pp stape-pp">
            <i class="fa-solid fa-circle"></i>
            <span>Envio</span>
        </div>

        <div class="stape-two-pp stape-pp">
            <i class="fa-solid fa-circle"></i>
            <span>Pago</span>
        </div>

        <div class="stape-three-pp stape-pp">
            <i class="fa-solid fa-circle"></i>
            <span>Revision</span>
        </div>
    </div>

    <main>
        <div class="payment__container">
            <div class="payment-title">
                <p><strong>Resumen del pedido</strong></p>
            </div>

            <div class="cart-review">
                <details open>
                    <summary>1 Producto</summary>
                    <span class="line-cr"></span>

                    <!-- bucle con php para mostrar contenido html 5 veces -->
                    <?php for ($i = 0; $i < 2; $i++) { ?>
                        <div class="cart-review__product">
                            <div class="cart-review__product__img">
                                <img src="../product.png" alt="product">
                            </div>
                            <div class="cart-review__product__info">
                                <div class="cr-info-top">
                                    <p><strong>Sofa Lemvig-piel</strong></p>
                                    <span>04 Oct - 8 Oct al CP 45400</span>
                                </div>

                                <div class="cr-info-bottom">
                                    <p><strong>Costo</strong></p>
                                    <p><strong>Cant</strong></p>
                                    <p><strong>Total</strong></p>
                                    <span>$9000</span>
                                    <span>1</span>
                                    <span>$9000</span>
                                </div>
                            </div>

                        </div>
                    <?php } ?>


                    <div class="payment-count">
                        <p>Subtotal</p>
                        <span>$9000</span>
                        <p>Envio</p>
                        <span>$0</span>
                        <p><strong>Total</strong></p>
                        <span><strong>$9000</strong></span>
                    </div>
                </details>
            </div>
            </div>                
            

            <div class="form-client">
                <form action="">
                    <div class="form-client__title">
                        <p><strong>Información de contacto</strong></p>
                    </div>

                    <div class="form-client__input">
                        <div class="form-group-cl">
                            <label for="name-client">Nombre <span>*</span></label>
                            <input type="text" id="name-client" name="name-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="last-name-client">Apellidos <span>*</span></label>
                            <input type="text" id="last-name-client" name="last-name-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="email-client">Correo <span>*</span></label>
                            <input type="email" id="email-client" name="email-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="phone-client">Teléfono <span>*</span></label>
                            <input type="tel" id="phone-client" name="phone-client" required>
                        </div>

                        <div class="form-client__title">
                            <p><strong>Direccion de envio</strong></p>
                        </div>

                        <div class="form-group-cl">
                            <label for="street-client">Calle <span>*</span></label>
                            <input type="text" id="street-client" name="street-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="number-ext-client">Numero exterior <span>*</span></label>
                            <input type="number" id="number-ext-client" name="number-ext-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="number-int-client">Numero interior</label>
                            <input type="number" id="number-int-client" name="number-int-client">
                        </div>


                        <div class="form-group-cl">
                            <label for="postal-code-client">Codigo postal <span>*</span></label>
                            <input type="number" id="postal-code-client" name="postal-code-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="colony-client">Colonia <span>*</span></label>
                            <input type="text" id="colony-client" name="colony-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="city-client">Ciudad <span>*</span></label>
                            <input type="text" id="city-client" name="city-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="state-client">Estado <span>*</span></label>
                            <input type="text" id="state-client" name="state-client" required>
                        </div>

                        <div class="form-group-cl">
                            <label for="indication-delivery-cl">Indicaciones de entrega <span>*</span></label>
                            <textarea name="indication-delivery-cl" id="indication-delivery-cl" cols="30" rows="5" ></textarea>
                        </div>

                        <button class="confirm-group-cl">Continuar</button>

                    </div>
                </form>
            </div>
        
    </main>

</body>

</html>