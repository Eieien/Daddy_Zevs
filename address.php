<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>Feedback</title>
</head>
<body>
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <h1>My Address</h1>
            <div id="address-card">
                <div class="name">
                    <h2>John Doe <span class="phone-num">(02) 8123 4567</span></h2>
                    <img src="./images/icons/menu-vertical.svg">
                </div>
                <div class="address">456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200</div>
            </div>
            <div id="add-address">
                <img src="./images/icons/Add-circle.svg">
                <div>Add Address</div>
            </div>
        </section>
    </main>
</body>
</html>