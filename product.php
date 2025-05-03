<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/product.css?v=<?php echo time(); ?>">
    <!-- Placeholder Title -->
    <title><?php echo "Product Name" ?> </title>
</head>
<body>
    <?php
        include "./guest_nav.php";
    ?>

    <main>
        <section id="product-image">
            <img src="./images/products/CroissantChocolate-removebg 1.svg">
        </section>

        <section id="product-description">
            <h1>Product Name</h1>
            <h3>Php 69.00</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis temporibus molestiae totam nam a, id veritatis labore illo odio officia tempora hic ullam nisi! Quo voluptatum at incidunt expedita sit?</p>
            <div id="inputs">
                <div class="input-design" id="quantity-input">
                    <div id="minus" onclick="updateQuantity(0)">-</div>
                    <div id="quantity">0</div>
                    <div id="add" onclick="updateQuantity(1)">+</div>
                </div>
                <div class="input-design" id="cart-input">Add to Cart</div>
            </div>
        </section>
    </main>

    <?php
        include "./footer.php";
    ?>

    <script>
        function updateQuantity(x){
            let quantity = parseInt(document.getElementById("quantity").textContent);

            if(x) quantity++;
            else if(!x && quantity > 0) quantity--;
            console.log(quantity);

            document.getElementById("quantity").textContent = quantity;
        }
    </script>
</body>
</html>