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
    <link rel="stylesheet" href="./styles/about-us.css?v=<?php echo time(); ?>">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./images/favicon/site.webmanifest">

    <title>About us!</title>

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

    <div id="about-us-hero">
        <div class="content">
            <h1>About us</h1>
            <p>-Only Daddy can Bake like this-</p>

        </div>
    </div>
    <div id="story">
        <div class="content">
            <h1>Our Story</h1>
            <p>Daddy Zev’s Bakery began as a simple hobby fueled by a deep love for baking. Countless hours spent watching cooking shows and baking series sparked a curiosity in me. One that grew stronger with every episode. I became fascinated by how ingredients transform into delicious desserts, intricate pastries, and delightful creations that bring people together.
What started as a personal passion quickly turned into something more meaningful. Baking became my way of exploring, expressing, and sharing joy. With every new recipe I tried, I discovered not only new techniques, but a deeper purpose.
Today, I’m proud and grateful to have turned that passion into a real bakery. One that’s more than just a place to buy bread or sweets. Daddy Zev’s Bakery is built on the idea of spreading warmth, creating memories, and bringing joy to those around me through every bite.</p>
            <!-- <p>-Daddy Zev and Co.</p> -->
        </div>
    </div>

    
    <div id="staff">
        <div class="content">
            <h1 style="font-size: 3rem; text-align: center;">Our Team</h1>

            <div class="team-grid">
                <div class="profile">
                    <img src="./images/staff/test.jpg" class="pfp">
                    <div class="name">
                        <h1>Zev Torrentira</h1>
                        <p>Head Chef</p>
                    </div>
                </div>
                <div class="profile">
                    <img src="./images/staff/test.jpg" class="pfp">
                    <div class="name">
                        <h1>Arch Steven Betonio</h1>
                        <p>Pastry Designer</p>
                    </div>
                </div>
                <div class="profile">
                    <img src="./images/staff/test.jpg" class="pfp">
                    <div class="name">
                        <h1>Ivan Paul Ruelan</h1>
                        <p>Marketing</p>
                    </div>
                </div>
                <div class="profile">
                    <img src="./images/staff/test.jpg" class="pfp">
                    <div class="name">
                        <h1>Joenell Conrad de Pedro</h1>
                        <p>Finance Manager</p>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

    <?php include "./footer.php" ?>
</body>
</html>