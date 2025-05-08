<?php
    session_start();

    // log in requied to access
    if(empty($_SESSION["email"])){
        header("location: ./login.php");
        exit();
    }
?>
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

<body>
    <?php
        include "./user_nav.php";
    ?>

    <main class="content">
        <div id="cart">
            <h1>My Cart</h1><hr>

            <?php
                $total = 0;

                if(empty($_SESSION['cart'])){
                    echo
                    "<p>No items in cart...</p>";
                }
                else{
                    $count = 0;

                    foreach($_SESSION['cart'] as $item){
                        $id = $item->product_id;
                        $product = $item->product_name;
                        $description = $item->description;
                        $price = (float)$item->price;
                        $quantity = (int)$item->quantity;
                        $image = $item->image;

                        // Note: tick function required for each item for deleting item
                        echo
                        "<div class='item'>
                            <input type='checkbox' onclick='checkState()'>

                            <div class='img-box'>
                                <img src=$image>
                            </div>

                            <div class='product-description'>
                                <h1>$product</h1>
                                <h3>".sprintf("%.2f", $price)."</h3>
                                <p>$description</p>
                                <div class='inputs'>
                                    <div class='input-design'>
                                        <div class='minus' onclick='updateQuantity(0)'>-</div>
                                        <div class='quantity'>$quantity</div>
                                        <div class='add' onclick='updateQuantity(1)'>+</div>
                                    </div>
                                </div>
                            </div>
                        </div><hr>";

                        $total += $price * $quantity;
                    }
                }
            ?>
        </div>
        
        <div id="payment">
            <h1>Payment</h1>
            <div class="payment-div">
                <h3 class="black">Subtotal:</h3>
                <h3>Php <?php echo sprintf("%.2f", $total) ?></h3>
            </div>
            <div class="payment-div">
                <h2 class="black">Shipping</h2>
                <h2>free</h2>
            </div>
            <hr>
            <div class="payment-div">
                <h1 class="black">Total</h1>
                <h1>Php <?php echo sprintf("%.2f", $total) ?></h1>
            </div>
            <form action="./data/user-data.php" method="post">
                <input type="hidden">
                <input type="submit" id="checkout" value="Checkout">
            </form>
        </div>
    </main>
    
    <?php
        include "./footer.php";
    ?>

    <script>
        function checkState(){
            const checkboxes = document.querySelectorAll('input[type=checkbox]');
            let check = false;

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) check = true;
            }

            // debug
            if(check) console.log("checked");
            else console.log("not checked");
        }
    </script>
</body>
</html>
