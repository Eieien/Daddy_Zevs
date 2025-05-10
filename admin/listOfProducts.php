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
            <div class="heading-container">
                <h1>Products</h1>
                <div class="create-product">
                    <p>Add New Product</p> 
                    <img src="../images/icons/Add-circle.svg">
                </div>
            </div>
            <div id="product-list">
                <div class="product-card">
                    <div class="out-of-stock-container">
                        <div>Out of Stock?</div>
                        <input type="checkbox">
                    </div>
    
                    <div class="image-container">
                        <img src="../images/products/1.svg">
                    </div>
                    
                    <div class="details-container">
                        <div class="product-name">
                            Bacon and Egg Croissant
                        </div>
                        <div class="price-add">
                            <div class="price">
                                Php 25.00
                            </div>
                            <button class="edit">
                                Edit
                            </button>
                        </div>
                    </div>

                </div>
                <div class="product-card">
                    <div class="out-of-stock-container">
                        <div>Out of Stock?</div>
                        <input type="checkbox">
                    </div>
    
                    <div class="image-container">
                        <img src="../images/products/1.svg">
                    </div>
                    
                    <div class="details-container">
                        <div class="product-name">
                            Bacon and Egg Croissant
                        </div>
                        <div class="price-add">
                            <div class="price">
                                Php 25.00
                            </div>
                            <button class="edit">
                                Edit
                            </button>
                        </div>
                    </div>

                </div>
                <div class="product-card">
                    <div class="out-of-stock-container">
                        <div>Out of Stock?</div>
                        <input type="checkbox">
                    </div>
    
                    <div class="image-container">
                        <img src="../images/products/1.svg">
                    </div>
                    
                    <div class="details-container">
                        <div class="product-name">
                            Bacon and Egg Croissant
                        </div>
                        <div class="price-add">
                            <div class="price">
                                Php 25.00
                            </div>
                            <button class="edit">
                                Edit
                            </button>
                        </div>
                    </div>

                </div>

                
            </div>
        </section>
    </main>
</body>
</html>