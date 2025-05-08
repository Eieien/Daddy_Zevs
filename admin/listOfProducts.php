<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userbase</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/listOfProducts.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        include "admin_header.php";
    ?>
    <main class="content" style="width: 75vw;">
        <?php
            include "admin_nav.php";
        ?>

        <section>
            <h1>Products</h1>
            <div class="list-card">
                <li class="list-item">
                    <input type="checkbox" id="outOfStock">
                    <label for="outOfStock">Out Of Stock?</label>
                    <img src="../images/products/1.svg" alt="" class="list-imageProduct">
                    <div class="list-content">
                        <h2 class="list-productName" id="list-productName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE NAME--> 
                        <h2 class="list-productPrice" id="list-productPrice">Php 25.00 <button id="list-productEdit1">Edit</button></h2> <!--PLACEHOLDER OF THE PRICE-->
                    </div>
                </li>
                <li class="list-item">
                    <input type="checkbox" id="outOfStock">
                    <label for="outOfStock">Out Of Stock?</label>
                    <img src="../images/products/10.svg" alt="" class="list-imageProduct">
                    <div class="list-content">
                        <h2 class="list-productName" id="list-productName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE NAME--> 
                        <h2 class="list-productPrice" id="list-productPrice">Php 25.00 <button id="list-productEdit1">Edit</button></h2> <!--PLACEHOLDER OF THE PRICE-->
                    </div>
                </li>
                <li class="list-item">
                    <input type="checkbox" id="outOfStock">
                    <label for="outOfStock">Out Of Stock?</label>
                    <img src="../images/products/3.svg" alt="" class="list-imageProduct">
                    <div class="list-content">
                        <h2 class="list-productName" id="list-productName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE NAME--> 
                        <h2 class="list-productPrice" id="list-productPrice">Php 25.00 <button id="list-productEdit1">Edit</button></h2> <!--PLACEHOLDER OF THE PRICE-->
                    </div> 
                </li>
                <li class="list-item">
                    <input type="checkbox" id="outOfStock">
                    <label for="outOfStock">Out Of Stock?</label>
                    <img src="../images/products/30.svg" alt="" class="list-imageProduct">
                    <div class="list-content">
                        <h2 class="list-productName" id="list-productName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE NAME--> 
                        <h2 class="list-productPrice" id="list-productPrice">Php 25.00 <button id="list-productEdit1">Edit</button></h2> <!--PLACEHOLDER OF THE PRICE-->
                    </div> 
                </li>
            </div>
        </section>
    </main>
</body>
</html>