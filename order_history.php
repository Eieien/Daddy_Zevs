<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>Settings</title>
</head>
<body>
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <h1>Order History</h1>
            <div id="order-history-list">
                <div>
                    <div class="date-ordered">August 24, 2025</div>
                    <div id="order-card-list">
                        <div class="order-card">
                            <div class="image-container">
                                <img class="product-image" src="./images/products/3.svg">
    
                            </div>
                            <div class="details-container">
                                <div class="product-name">
                                    <h2>Croissant</h2>
                                    <img src="./images/icons/menu-vertical.svg">
    
                                </div>
                                <div class="description">
                                    A yeast donut filled with creamy custard and topped with a rich chocolate glaze
                                </div>
                                <div class="quantity-price">
                                    <div class="quantity">x1</div>
                                    <div class="price">P25.00</div>
                                </div>
        
                            </div>
                        </div>
                        <div class="order-card">
                            <div class="image-container">
                                <img class="product-image" src="./images/products/3.svg">
    
                            </div>
                            <div class="details-container">
                                <div class="product-name">
                                    <h2>Croissant</h2>
                                    <img src="./images/icons/menu-vertical.svg">
    
                                </div>
                                <div class="description">
                                    A yeast donut filled with creamy custard and topped with a rich chocolate glaze
                                </div>
                                <div class="quantity-price">
                                    <div class="quantity">x1</div>
                                    <div class="price">P25.00</div>
                                </div>
        
                            </div>
                        </div>
    
                    </div>

                </div>
                <div>
                    <div class="date-ordered">August 24, 2025</div>
                    <div id="order-card-list">
                        <div class="order-card">
                            <div class="image-container">
                                <img class="product-image" src="./images/products/3.svg">
    
                            </div>
                            <div class="details-container">
                                <div class="product-name">
                                    <h2>Croissant</h2>
                                    <img src="./images/icons/menu-vertical.svg">
    
                                </div>
                                <div class="description">
                                    A yeast donut filled with creamy custard and topped with a rich chocolate glaze
                                </div>
                                <div class="quantity-price">
                                    <div class="quantity">x1</div>
                                    <div class="price">P25.00</div>
                                </div>
        
                            </div>
                        </div>
                        <div class="order-card">
                            <div class="image-container">
                                <img class="product-image" src="./images/products/3.svg">
    
                            </div>
                            <div class="details-container">
                                <div class="product-name">
                                    <h2>Croissant</h2>
                                    <img src="./images/icons/menu-vertical.svg">
    
                                </div>
                                <div class="description">
                                    A yeast donut filled with creamy custard and topped with a rich chocolate glaze
                                </div>
                                <div class="quantity-price">
                                    <div class="quantity">x1</div>
                                    <div class="price">P25.00</div>
                                </div>
        
                            </div>
                        </div>
    
                    </div>

                </div>
            </div>
            
        </section>
    </main>
</body>
</html>