<nav id="user-nav">
    <div class="left">
        <a href="./menu.php">
            <div class="logo">
                <img src="./images/logos/Daddy_zev_enhanced_new 1.svg" width="70px">
                <div>
                    DADDY ZEV<span>'</span>S
                </div>
            </div>
        </a>
        <div>
            <form action="./data/user-data.php" method="post" class="search-wrapper">
                <img class="search-icon" src="./images/icons/search.svg">
                <input type="text" name="search-bar" class="search" placeholder="What are you craving today?">
            </form>
        </div>
    </div>
    <div class="right">
        <a href="#">
            <form action="./data/user-data.php" method="post" class="menu-icon">
                <button class="menu-icon" name="nav-fav">
                    <img src="./images/icons/heart.svg">
                    <span>Favorites</span>
                </button>
            </form>
        </a>
        <a href="./cart.php">
            <div class="menu-icon">
                <img src="./images/icons/cart.svg">
                <span>Cart</span>
            </div>
        </a>
        <a href="#">
            <form id="check-status" action="./data/user-data.php" method="post" class="menu-icon">
                <input type="hidden" name="check-status" value="check-status"> 
                <button class="menu-icon" name="check-status">
                    <img src="./images/icons/orders.svg">
                    <span>Orders</span>
                </button>
            </form>
        </a>
        
        <a href="./account.php">
            <div class="menu-icon">
                <img src="./images/icons/user.svg">
                <span>Account</span>
            </div>
        </a>
        
    </div>
</nav>