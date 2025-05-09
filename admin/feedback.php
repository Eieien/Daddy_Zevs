<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/feedback.css?v=<?php echo time(); ?>">


    <style>
        .feedback-grid{
            display: grid;
            grid-template-columns: minmax(300px, 1fr);
        }
    </style>

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

            <?php
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
            ?>
        </section>

    </main>
</body>
</html>