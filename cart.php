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
<body style="background-color: var(--primary_white);">
    <nav id="user-nav">
        <div class="left">
            <a href="#">
                <div class="logo">
                    <img src="./images/logos/Daddy_zev_enhanced_new 1.svg" width="70px">
                    <div>
                        DADDY ZEV<span>'</span>S
    
                    </div>
                </div>
    
            </a>
            <div >
                <form action="#" method="post" class="search-wrapper">
                    <img class="search-icon" src="./images/icons/search.svg">
                    <input type="text" name="search-bar" class="search" placeholder="What are you craving today?">
    
                </form>
            </div>
        </div>
        <div class="right">
            <a href="#">
                <div class="menu-icon">
                    <img src="./images/icons/heart.svg">
                    <span>Favorites</span>
                </div>
            </a>
            <a href="#">
                <div class="menu-icon">
                    <img src="./images/icons/cart.svg">
                    <span>Cart</span>
                </div>
            </a>
            <a href="#">
                <div class="menu-icon">
                    <img src="./images/icons/orders.svg">
                    <span>Orders</span>
                </div>
            </a>
            
            <a href="#">
                <div class="menu-icon">
                    <img src="./images/icons/user.svg">
                    <span>Account</span>
                </div>
            </a>
            
        </div>
    </nav>
    <div id="contain">

        <!--FOR THE CART SECTION-->
        <div id="cart">
            <h1>My Cart</h1>
            <hr>

            <!--Note the div, maybe use for replication?-->
            <div class="item">
                <input type="checkbox">
                <section id="product-image">
                    <img src="./images/products/CroissantChocolate-removebg 1.svg">
                </section>
                <section id="product-description">
                    <h1>Product Name</h1>
                    <h3>Php 69.00</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis temporibus molestiae totam nam a, id veritatis labore illo odio officia tempora hic ullam nisi! Quo voluptatum at incidunt expedita sit?</p>
                    <div id="inputs">
                        <div class="input-design" id="quantity-input">
                            <div id="minus" onclick="updateQuantity(0)">-</div>
                            <div id="quantity">0</div>
                            <div id="add" onclick="updateQuantity(1)">+</div>
                        </div>
                    </div>
                </section>
            </div>
            <hr>
            <!--dont forget the <hr> :pp -->

        </div>

        <!--FOR THE PAYMENT SECTION-->
        <div id="payment">
            <h1>Payment</h1>
            <h4>Items(1): ____</h4>
            <h4>Shipping: ____</h4>
            <hr>
            <h2>Subtotal</h2>
            <input type="button" id="checkout" value="Checkout" >
        </div>

    </div>    
</body>
</html>
