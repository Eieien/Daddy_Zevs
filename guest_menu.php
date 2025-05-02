<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles//header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles//menu.css?v=<?php echo time(); ?>">
    <title>Daddy Zev's Menu</title>
</head>
<body>
    <?php
        include "./guest_nav.php";
    ?>

    <section id="content">
        <div id="menu">
            <div>
                <ul id="categories">
                    <h1>
                        Baked Goods
                    </h1>
                    <li>
                        Breadloaf
                    </li>
                    <li>
                        Donuts
                    </li>
                    <li>
                        Cakes
                    </li>
                    <li>
                        Cookies
                    </li>
                    <li>
                        Brownies
                    </li>
                    <li>
                        Filipino Classics
                    </li>
                </ul>
            </div>
            <div class="product-selecton">
                <div class="navigation-tab">
                    <a href="#">
                        Menu
                    </a>
                    <a href="#">
                        Featured

                    </a>
                    <a href="#">
                        Favorites

                    </a>
                </div>
                <div id="product-list">
                    <div class="product-card">
                        <div style="direction: rtl">
                            <img class="add-to-favorite" src="./images/icons/heart.svg">
                        </div>
                        <img class="product-image" src="./images/products/CroissantChocolate-removebg 1.svg">
                        
                        <div class="details-container">
                            <div class="product-name">
                                Bacon and Egg Croissant
                            </div>
                            <div class="price-add">
                                <div class="price">
                                    Php25.00
                                </div>
                                <button class="add-to-cart">
                                    <svg class="add" width="40" height="30" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5 11.2917V26.7084M10.2084 19.0001H24.7917" stroke="#FBFCEC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <!-- <img class="add" src="./images/icons/plus.svg"> -->
                                    <!-- <img class="add" src="./images/icons/add.svg"> -->
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-card">
                    </div>
                    <div class="product-card">
    
                    </div>
                    <div class="product-card">
    
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <?php
        include "./footer.php";
    ?> -->

    <script>

    </script>
</body>
</html>