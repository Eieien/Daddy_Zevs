<?php 
    include('header.php');

    if(isset($_GET["product-info"])){
        $item = json_decode($_GET["product-info"]);

        $product = $item->product_name;
        $description = $item->description;
        $price = $item->price;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="menu.php">Back to Home</a>

    <h1>Product Page</h1>

    <div>
        <?php
        echo
        "<p>".$product."</p>
        <p>".$description."</p>
        <p>Php ".sprintf("%.2f", $price)."</p>";

        if(isset($_SESSION['email'])){
            $item = json_encode($item);
            echo
            "<form action='db/user-data.php' method='post'>
                <input type='hidden' name='item' value='$item'>
                <input type='number' name='quantity' min='1' value='1'>
                <input type='submit' name='add-to-cart' value='Add to Cart'>
            </form>";
        }
        else{
            echo
            "<input type='number' min='1' value='1'>
            <input type='submit' id='no-add-cart' value='Add to Cart'>
            
            <p id='signed-out'><p>";
        }
        ?>
    </div>

    <?php
    if(isset($_SESSION['server_message'])){
        echo "<p>".$_SESSION['server_message']."</p>";
        unset($_SESSION['server_message']);
    }
    ?>

    <script>
        fetch("db/product-json.php")
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));

        document.getElementById('no-add-cart').addEventListener('click', () => {
            document.getElementById('signed-out').innerHTML = "You are not logged in!";
        });
    </script>
</body>
</html>
<?php 
    include('footer.html'); 
?>