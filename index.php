<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daddy Zev's</title>
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>
<body>
    <?php
        if(empty($_SESSION["email"])){
            include "./guest_nav.php";
        }
        else{
            header("location: ./menu.php");
            exit();
        }
    ?>

    <form action="./login.php" method="post" class="hero-section">
        <h5>Big love, Big Flavor - <br>Just Like Daddy Zev</h5>
        <button id="hero-logIn" name="signup">Join now</button>
    </form>

    <div class="featured-section">
        <form action="./menu.php" class="featured-content" id="featured-content">
            <h1>
                Golden Glaze Delights
            </h1>
            <p>
                <strong>Soft, fluffy,</strong> and perfectly coated in a <strong>luscious golden glaze</strong>, 
                each bite <strong><em>melts</em> in your mouth</strong>, making every moment <strong><em>sweeter!</em></strong>
            </p>
            <button id="menu-goldenGlaze">View the menu</button>
        </form>
        <div class="featured-img"></div>
    </div>

    <!-- Fix for dynamic display -->
    <div class="featured-carouselSection">
        <div class="featured-container">

            <div id="featured-carouselDes">
                <h1>A Bite of Bliss, the Daddy Zevs Way</h1>
                <p>Savor every moment with our handcrafted delights. <br>No matter your cravings, we've got something <br>special for you</p>
            </div>
    
            <div class="featured-carouselSlide">
                <div class="swiper">
                    <ul class="card-list swiper-wrapper" id="swiper"></ul>
                
                    <!-- Pagination and buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

                 <!-- hidden form -->
                <form action="./product.php" method="get" id="product-form">
                    <input type='hidden' name='product-info'>
                </form>
            </div>
    
            <form action="./menu.php" class="featured-carouselMore">
                <button id="menu">Discover More</button>
            </form>
        </div>
    </div>

    <?php
        include "footer.php";
    ?>

    <script>
        fetch("./data/products-json.php")
            .then(response => response.json())
            .then(products => products.forEach((item) => {
                let productCard = document.createElement('li');
                productCard.className = "card-item swiper-slide";

                let item_json = JSON.stringify(item);
                productCard.onclick = () => getProduct(item_json);

                productCard.innerHTML = 
                `<div class="card-link">
                    <img src=${item.image} alt=${item.product_name} class="card-image">
                    <h2 class="card-title">${item.product_name}</h2>
                </div>`;

                document.getElementById("swiper").appendChild(productCard);
            }))
            .catch(error => console.error('Error:', error));

        function getProduct(item){
            document.querySelector("input[name='product-info']").value = item;
            document.getElementById("product-form").submit();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Your custom JS -->
    <script>
        new Swiper('.swiper', {
        loop: true,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            0: {slidesPerView: 1},
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
        });
    </script>
</body>
</html>