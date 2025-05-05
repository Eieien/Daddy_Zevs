<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userbase</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/userbase.css?v=<?php echo time(); ?>">
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
            <h1>Users</h1>

            <?php
                for( $i = 0; $i < 5; $i++ ){
                    echo
                    "<div class='user-card'>
                        <img src='../images/icons/user.svg'>

                        <div id='user-info'>
                            <div id='name-email'>
                                <h2><b>John Doe</b></h2>
                                <h2>Johndoe@gmail.com</h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>

                        <div id='remove-button'>
                            <button>Remove User</button>
                        </div>
                    </div>";  
                }     
            ?>
        </section>
    </main>
</body>
</html>