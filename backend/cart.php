<?php 
    include('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cart-item{
            background-color: lightgrey;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 25px; 
        }
    </style>
</head>
<body>
    <h1>Cart Page</h1>

    <?php
    if(isset($_SESSION['server_message'])){
        echo "<p>".$_SESSION['server_message']."</p>";
        unset($_SESSION['server_message']);
    }
    ?>

    <h3 id="total-price"></h3>

    <form action='db/user-data.php' method='post'>
        <button name='order'>Checkout</button>
    </form>

    <!-- hidden form -->
    <form action='db/user-data.php' method='post' id="productID-form">
        <input type='hidden' name='product-id'>
    </form>

    <?php
        if(empty($_SESSION['cart'])){
            echo
            "<p>No items in cart</p>";
        }
        else{
            $total = 0;

            foreach($_SESSION['cart'] as $item){
                $id = $item->product_id;
                $product = $item->product_name;
                $description = $item->description;
                $price = (float)$item->price;
                $quantity = (int)$item->quantity;

                echo
                "<div class='cart-item'>
                    <p><b>$product</b></p>
                    <p>$description</p>
                    <p>Php ".sprintf("%.2f", $price)."</p>
                    <p>Quantity: $quantity </p>
                    <input type='submit' onclick='getProductId($id)' value='Remove Item'>
                </div>";

                $total += $price * $quantity;
            }
            echo
            "<script>
                document.getElementById('total-price').innerHTML = 'Total: Php $total';
            </script>";
            $_SESSION['total_price'] = $total;
        }
    ?>

    <script>
        function getProductId(id){
            document.querySelector("input[name='product-id']").value = id;
            document.getElementById("productID-form").submit();
        }
    </script>
</body>
</html>
<?php 
    include('footer.html'); 
?>