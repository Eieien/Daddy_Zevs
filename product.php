<?php 
    session_start();

    if(isset($_GET["product-info"])){
        $item = json_decode($_GET["product-info"]);

        $product = $item->product_name;
        $description = $item->description;
        $price = $item->price;
        $image = $item->image;
    }
?>
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
        if(empty($_SESSION["email"])){
            include "./guest_nav.php";
        }
        else{
            include "./user_nav.php";
        }
    ?>

    <main>
        <section id="product-image">
            <?php echo "<img src=$image>"; ?>
        </section>

        <section id="product-description">
            <?php echo 
                "<h1>$product</h1>
                <h3>Php ".sprintf("%.2f", $price)."</h3>
                <p>$description</p>"; 
            ?>
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