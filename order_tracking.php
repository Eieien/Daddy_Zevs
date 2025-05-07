<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/constants.css">
    <link rel="stylesheet" href="./styles/tracker.css">
    <link rel="stylesheet" href="./styles/header_footer.css">
</head>
<body>
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
    <div id="content">
        <div id="status">
            <h1>Order Status</h1>
            <div id="status_bar">
                <div class="icon_status">
                    <img src="#">
                    <p>Order Pending</p>
                </div>
                <hr>
                <div class="icon_status">
                    <img src="#">
                    <p>Order is being made</p>
                </div>
                <hr>
                <div class="icon_status">
                    <img src="#">
                    <p>Order is being delivered</p>
                </div>
                <hr>
                <div class="icon_status">
                    <img src="#">
                    <p>Order has arrived</p>
                </div>
            </div>
        </div>
        <div id="summary">
            <h1>Order Summary</h1>
            <div id="summary_list">
                <div class="summary_item">
                    <div class="summary_content">
                        <div class="image_text">
                            <img class="summary_img" src="#">
                            <div class="summary_text">
                                <h2>PLACEHOLDER</h2>
                                <p>MHAFKIODASNOFHOHASIDNaDsssssssssssssfddffsdadsasd</p>
                                <div class="summary_quantity">x1</div>
                            </div>
                        </div>    
                        <div class="summary_price">P25.00</div>
                    </div>
                </div>
            </div>
            <div id="summary_total">   
                <h1>ALL TOTAL: <span style="color:var(--primary_blue)">Bajillion dollar</span></h1>
            </div>
        </div>
    </div>
</body>
</html>