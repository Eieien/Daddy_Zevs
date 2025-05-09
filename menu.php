<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/menu.css?v=<?php echo time(); ?>">
    <title>Daddy Zev's Menu</title>
</head>
<body>
    <?php
        if(empty($_SESSION["email"])){
            include "./guest_nav.php";
        }
        else{
            include "./user_nav.php";
        }
    ?>

    <!-- hidden form -->
    <form action="./product.php" method="get" id="product-form">
        <input type='hidden' name='product-info'>
    </form>

    <main class="content">
        <?php
            if(isset($_SESSION["email"])){
                echo
                "<div id='featured-banner'>
                    <div class='button-container'>
                        <button>Check it out!</button>
                    </div>
                </div>";
            }
        ?>
        <div id="menu">
            <div id="categories">
                <ul id="baked-goods">
                    <h1>Baked Goods</h1>
                    <li onclick="displayProducts(1)">Breadloaf</li>
                    <li onclick="displayProducts(2)">Cake</li>
                    <li onclick="displayProducts(3)">Cookies</li>
                    <li onclick="displayProducts(4)">Filipino Classics</li>
                    <li onclick="displayProducts(5)">Cupcakes</li>
                    <li onclick="displayProducts(6)">Others</li>
                </ul>
                <ul id="pastries">
                    <h1>Pastries</h1>
                    <li onclick="displayProducts(7)">Donut</li>
                    <li onclick="displayProducts(8)">Tart</li>
                    <li onclick="displayProducts(9)">Pie</li>
                    <li onclick="displayProducts(10)">Croissants</li>
                </ul>
            </div>
            <div class="product-selecton">
                <div class="navigation-tab">
                    <a href="./menu.php">
                        Menu
                    </a>
                    <a href="#">
                        Featured
                    </a>
                    <?php
                        if(isset($_SESSION["email"])){
                            echo "<a href='#' onclick='displayProducts(11)'>";
                        }
                        else{
                            echo "<a href='./login.php'>";
                        }
                    ?>
                        Favorites
                    </a>
                </div>

                <div id="product-list">
                   
                </div>
            </div>
        </div>
    </main>

    <?php
        include "./footer.php";
    ?>

    <!-- script -->
    <?php
        include "./data/menu-js.php";
    ?>
</body>
</html>