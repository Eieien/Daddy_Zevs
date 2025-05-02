<?php
    include '../db/connect.php';
    include 'nav.php';

    $selectProducts = "SELECT * FROM product";
    $result = $conn->query($selectProducts);
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product List</h1>

    <form action="/db/admin-data.php" method="post" id="orderID-form">
        <input type="hidden" name="orderID">
    </form>

    <div>
        <?php
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo
                    "<div>".
                        $row['product_name']."
                        <a href='editproduct.php'><button>Edit Product</button></a>
                    </div>";
                }   
            }
        ?>
    </div>
</body>
</html>