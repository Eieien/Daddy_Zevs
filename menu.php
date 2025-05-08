<?php
    session_start();
    
    // comment out for now to remove logged in account
    // unset($_SESSION["email"]);
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
                    <a href="#">
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

    <script>
        function displayProducts(type){
            document.getElementById("product-list").innerHTML = "";

            fetch("data/products.json")
                .then(response => response.json())
                .then(products => products.forEach((item) => {
                    let check = false;

                    switch(type){
                        case 1:
                            if(item.category === "Bread") check = true;
                            break;
                        case 2:
                            if(item.category === "Cake") check = true;
                            break;
                        case 3:
                            if(item.category === "Cookies") check = true;
                            break;
                        case 4:
                            if(item.category === "Filipino Classics") check = true;
                            break;
                        case 5:
                            if(item.category === "Cupcakes") check = true;
                            break;
                        case 6:
                            if(item.category === "Others") check = true;
                            break;
                        case 7:
                            if(item.category === "Donut") check = true;
                            break;
                        case 8:
                            if(item.category === "Tarts") check = true;
                            break;
                        case 9:
                            if(item.category === "Pies") check = true;
                            break;
                        case 10:
                            if(item.category === "Croissants") check = true;
                            break;
                        default:
                            check = true;
                    }

                    if(check){
                        let productCard = document.createElement('div');
                        productCard.className = "product-card";

                        let item_json = JSON.stringify(item);
                        productCard.onclick = () => getProduct(item_json);

                        productCard.innerHTML = 
                        `<div class="favorite-icon">
                            <svg class="add-to-favorite" width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.2752 16.5632L16.5 27.1667L26.7248 16.5632C27.8614 15.3844 28.5 13.7857 28.5 12.1187C28.5 8.64741 25.7864 5.83334 22.4391 5.83334C20.8316 5.83334 19.29 6.49555 18.1534 7.67429L16.5 9.3889L14.8466 7.67429C13.71 6.49555 12.1684 5.83334 10.5609 5.83334C7.21356 5.83334 4.5 8.64741 4.5 12.1187C4.5 13.7857 5.13856 15.3844 6.2752 16.5632Z" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>
                        <div class="image-container">
                            <img src=${item.image}>
                        </div>
                        
                        <div class="details-container">
                            <div class="product-name">
                                ${item.product_name}
                            </div>
                            <div class="price-add">
                                <div class="price">
                                    Php ${Number(item.price).toFixed(2)}
                                </div>
                                <button class="add-to-cart">
                                    <svg class="add" width="40" height="30" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5 11.2917V26.7084M10.2084 19.0001H24.7917" stroke="#FBFCEC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </button>
                            </div>
                        </div>`;

                        document.getElementById("product-list").appendChild(productCard);
                    }
                }))
                .catch(error => console.error('Error:', error));
        }
        displayProducts();

        function getProduct(item){
            document.querySelector("input[name='product-info']").value = item;
            document.getElementById("product-form").submit();
        }
    </script>
</body>
</html>