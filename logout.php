<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>Settings</title>
</head>
<body>
    <div class="log-out-container">
        <div class="log-out-card">
            <div class="logo-container">
                <img src="./images/logos/Daddy_zev_enhanced_new 1.svg">
            </div>
            <h1>Your logging out of Daddy Zev's...</h1>
            <p>
                Thanks for stopping by our little corner of sweetness. Whether you came for the vibes, the treats, or just a moment of sugar-coated joy, we’re always here, mixing up something fresh.
            </p>
            <form action="./data/register.php" method="post" id="log-out-form">
                <button class="log-out" name="logout">Log out</button>
                <button class="cancel" name="cancel">Cancel</button>
            </form>

        </div>
    </div>
</body> 
</html>