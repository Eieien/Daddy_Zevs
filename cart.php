<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="./styles/cart.css">
    <link rel="stylesheet" href="./styles/constants.css">
    <link rel="stylesheet" href="./styles/header_footer.css">
</head>
<body style="background-color: var(--primary_white);">
    <?php
        if(empty($_SESSION["email"])){
            header("location: ./login.php");
        }
    ?>

    <div id="contain">

        <!--FOR THE CART SECTION-->
        <div id="cart">
            <h1>My Cart</h1>
            <hr>

            <!--Note the div, maybe use for replication?-->
            <div class="item">
                <!-- Note: Need delete function -->
                <input type="checkbox">
                <section id="product-description">
                    <h1>Product Name</h1>
                    <h3>Php 69.00</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis temporibus molestiae totam nam a, id veritatis labore illo odio officia tempora hic ullam nisi! Quo voluptatum at incidunt expedita sit?</p>
                    <div class="inputs">
                        <div class="input-design">
                            <div class="minus" onclick="updateQuantity(0)">-</div>
                            <div class="quantity">0</div>
                            <div class="add" onclick="updateQuantity(1)">+</div>
                        </div>
                    </div>
                </section>
            </div>
            <hr>
            <!--dont forget the <hr> :pp -->

        </div>

        <!--FOR THE PAYMENT SECTION-->
        <div id="payment">
            <h1>Payment</h1>
            <h4>Items(1): ____</h4>
            <h4>Shipping: ____</h4>
            <hr>
            <h2>Subtotal</h2>
            <input type="button" id="checkout" value="Checkout" >
        </div>

    </div>    
</body>
</html>
