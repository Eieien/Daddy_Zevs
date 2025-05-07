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
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <h1>My Account</h1>
            <div class="account-details-container">
                <div>
                    <h3>Name</h3>
                    <div class="username">
                        <div class="name">John dow</div>
                        <button class="change">Change</button>
                    </div>
                </div>
                <div>
                    <h3>Account</h3>
                    <div class="account">
                        <div class="email">
                            Johndoe204@gmail.com
                        </div>
                        <button class="change">Change</button>
                    </div>
                </div>
                <div class="password-container">
                    <div class="heading">
                        <h3>Password</h3>
                        <button class="show">Show</button>
                    </div>
                    <div class="password">
                        <div id="password">******************</div>
                        <button class="change">Change</button>
                    </div>
                </div>
            </div>
            <div id="remove-account">
                <h3>Account Removal!</h3>
                <p>This action is irreversible. Once deleted, you will no longer be able to access your order history, favourites, or any personal information tied to your account.</p>
                <button class="delete-account">Delete Account</button>
            </div>
        </section>
    </main>
</body>
</html>