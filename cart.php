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
    <link rel="stylesheet" href="./styles/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
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
                    if(empty($_SESSION['total_price'])) $_SESSION['total_price'] = $total;
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
                                <div class='quantity-design'>
                                    <p>Quantity:</p> 
                                    <p>$quantity</p>
                                </div>
                            </div>
                        </div><hr>";

                        $total += $price * $quantity;
                    }

                    $_SESSION['total_price'] = $total;
                }
            ?>
        </div>
        
        <div id="payment">
            <div class="payment-card">
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
                <?php if($total > 0 || $_SESSION['set_order']) 
                echo "<form action='./data/user-data.php' method='post'>"; ?>
                    <button type="submit" id="checkout" name="checkout">Checkout</button>
                </form>

            </div>

            <?php
                if(isset($_SESSION['server_message'])){
                    echo $_SESSION['server_message'];
                    unset($_SESSION['server_message']);
                }
            ?>
        </div>

        <div id="remove" onclick="removeItems()"><p>Remove Items</p></div>

        <!-- hidden form -->
        <form action="./data/user-data.php" method="post" id="remove-items">
            <input type="hidden" name="checked-boxes" id="checked-boxes">
        </form>
    </main>
    
    <?php
        include "./footer.php";
    ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        const removeButton = document.getElementById("remove");

        function checkState(){
            let check = false;

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) check = true;
            }

            if(check){
                removeButton.style.display = "flex";
            }
            else{
                removeButton.style.display = "none";
            }
        }

        function removeItems(){
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) document.getElementById("checked-boxes").value += '1';
                else document.getElementById("checked-boxes").value += '0';
            }
            document.getElementById("remove-items").submit();
        }
    </script>
</body>
</html>
