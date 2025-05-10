<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/feedback.css?v=<?php echo time(); ?>">


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
            <h1>Feedback</h1>
            <div id="feedback-list">
                <div class="feedback-card">
                    <div class="user-rating-container">
                        <div class="user-profile">
                            <img src="../images/icons/user.svg">
                            <div>
                                <div class="name-email">
                                    <h2>John Doe</h2>
                                    <span>JohnDoe@gmail.com</span>

                                </div>
                                <p>August 24, 2025</p>
                            </div>
                        </div>
                        <div class="rating">
                            <h3 class="total-rating">
                                4/5
                            </h3>
                            <div class="star-container">
                                <svg class="star" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="star" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="star" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="star" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="star" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 19.8333L7 23.3333L8.75 16.3333L3.5 10.5L11.0833 9.91667L14 3.5L16.9167 9.91667L24.5 10.5L19.25 16.3333L21 23.3333L14 19.8333Z" stroke="#3464DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="user-comment-container">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur vel esse quas, consequatur cum iusto nam libero aut hic corporis sapiente eum est deleniti magni consectetur quam, ratione veritatis quaerat explicabo alias, ipsa magnam laboriosam atque? Laudantium mollitia quasi totam, rerum perspiciatis tenetur reiciendis error nostrum quia itaque optio repudiandae?
                    </div>
                </div>
            </div>

            <!-- <?php
                for( $i = 0; $i < 5; $i++){
                    echo
                    "<div class='user-card'>
                        <div id='user-info'>
                            <div class='user-flex'>
                                <div id='name-email'>
                                    <img src='../images/icons/user.svg'>
                                    <div class='user-details'>
                                        <h2 class='user-name'>John Doe</h2>
                                        <p class='user-date'>August 25,2025</p>
                                    </div>
                                    <h2 class='email'>Johndoe@gmail.com</h2>
                                </div>
                                <div class='user-rate'>
                                    <span class='number-rate'>4/5</span>
                                    <img src=''>
                                    <img src=''>
                                    <img src=''>
                                    <img src=''>
                                    <img src=''>
                                </div>
                            </div>
                            <p class='user-comments'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
                                in voluptate velit esse asdasdasdadwasdwasdwasdwasdwasdwasdwasdwasdwasdwasdwasdwasdwadwcillum dolore eu fugiat nulla pariatur. Excepteur sint oasdadadaAHhaccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                        </div>
                    </div>";  
                }     
            ?> -->
        </section>

    </main>
</body>
</html>