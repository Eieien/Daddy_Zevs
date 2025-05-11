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
        } else {
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
                    <li onclick="displayProducts(1)" class="btn">Breadloaf</li>
                    <li onclick="displayProducts(2)" class="btn">Cake</li>
                    <li onclick="displayProducts(3)" class="btn">Cookies</li>
                    <li onclick="displayProducts(4)" class="btn">Filipino Classics</li>
                    <li onclick="displayProducts(5)" class="btn">Cupcakes</li>
                    <li onclick="displayProducts(6)" class="btn">Others</li>
                </ul>
                <ul id="pastries">
                    <h1>Pastries</h1>
                    <li onclick="displayProducts(7)" class="btn">Donut</li>
                    <li onclick="displayProducts(8)" class="btn">Tart</li>
                    <li onclick="displayProducts(9)" class="btn">Pie</li>
                    <li onclick="displayProducts(10)" class="btn">Croissants</li>
                </ul>
            </div>
            <div class="product-selecton">
                <div class="navigation-tab">
                    <a  class="btn active" onclick="displayProducts(0)">
                        Menu
                    </a>
                    <a  class="btn" onclick="displayProducts(7)">
                        Featured
                    </a>
                    <?php
                        if(isset($_SESSION["email"])){
                            echo "<a onclick='displayProducts(11)' class='btn'>";
                        } else {
                            echo "<a href='./login.php' class='btn'>";
                        }
                    ?>
                        Favorites
                    </a>
                </div>

                <section id="product-list"></section>
            </div>
        </div>
    </main>

    <?php include "./footer.php"; ?>

    <!-- script -->
    <?php include "./data/menu-js.php"; ?>
</body>
</html>