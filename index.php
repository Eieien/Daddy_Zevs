<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

</head>
<body>

    <?php
        include "guest_nav.php";
    ?>

    <div class="hero-section">
        <h5>Big love, Big Flavor - <br>Just Like Daddy Zev</h5>
        <button id="hero-logIn">Join now</button>
    </div>

    <div class="featured-section">
        <div class="featured-content" id="featured-content">
            <h1>
                Golden Glaze Delights
            </h1>
            <p>
                <strong>Soft, fluffy,</strong> and perfectly coated in a <strong>luscious golden glaze</strong>, 
                each bite <strong><em>melts</em> in your mouth</strong>, making every moment <strong><em>sweeter!</em></strong>
            </p>
            <button id="menu-goldenGlaze">View the menu</button>
        </div>
        <div class="featured-img"></div>
    </div>

    <div class="featured-carouselSection">
        <div class="featured-container">

            <div id="featured-carouselDes">
                <h1>A Bite of Bliss, the Daddy Zevs Way</h1>
                <p>Savor every moment with our handcrafted delights. <br>No matter your cravings, we've got something <br>special for you</p>
            </div>
    
            <div class="featured-carouselSlide">

                <div class="swiper">
                    <ul class="card-list swiper-wrapper">
                        <li class="card-item swiper-slide">
                            <a href="#" class="card-link">
                                <img src="./images/products/1.svg" alt="Croissant" class="card-image">
                                <h2 class="card-title">Bacon and Egg Croissant</h2>
                            </a>
                        </li>
                        <li class="card-item swiper-slide">
                            <a href="#" class="card-link">
                                <img src="./images/products/2.svg" alt="Croissant" class="card-image">
                                <h2 class="card-title">Bacon and Egg Croissant</h2>
                            </a>
                        </li>
                        <li class="card-item swiper-slide">
                            <a href="#" class="card-link">
                                <img src="./images/products/3.svg" alt="Croissant" class="card-image">
                                <h2 class="card-title">Bacon and Egg Croissant</h2>
                            </a>
                        </li>
                        <li class="card-item swiper-slide">
                            <a href="#" class="card-link">
                                <img src="./images/products/4.svg" alt="Croissant" class="card-image">
                                <h2 class="card-title">Bacon and Egg Croissant</h2>
                            </a>
                        </li>
                        <li class="card-item swiper-slide">
                            <a href="#" class="card-link">
                                <img src="./images/products/5.svg" alt="Croissant" class="card-image">
                                <h2 class="card-title">Bacon and Egg Croissant</h2>
                            </a>
                        </li>
                        <!-- More li.card-item swiper-slide -->
                    </ul>
                
                    <!-- Pagination and buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
    
            </div>
    
            <div class="featured-carouselMore">
                <button id="menu">Discover More</button>
            </div>

        </div>
    </div>

    <?php
        include "footer.php";
    ?>

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