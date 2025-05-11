<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>Account</title>
</head>
<body>
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <div id="account-container">
                <h1>My Account</h1>
                <div class="account-details-container">
                    <div>
                        <h3>Name</h3>
                        <div class="username">
                            <div class="name">
                                <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>
                            </div>
                            <button id="button-name" class="change">Edit</button>
                        </div>
                    </div>
                    <div>
                        <h3>Account</h3>
                        <div class="account">
                            <div class="email">
                                <?php echo $_SESSION["email"]; ?>
                            </div>
                            <button id="button-email" class="change">Edit</button>
                        </div>
                    </div>
                    <div>
                        <h3>Password</h3>
                        <div class="password">
                            <div id="password">******************</div>
                            <button id="button-password" class="change">Change Password</button>
                        </div>
                    </div>
                </div>
                <?php
                    if(isset($_SESSION['server_message'])){
                        echo $_SESSION['server_message'];
                        unset($_SESSION['server_message']);
                    }
                ?>
                <form id="remove-account" action="./data/user-data.php" method="post">
                    <h3>Account Removal!</h3>
                    <p>This action is irreversible. Once deleted, you will no longer be able to access your order history, favourites, or any personal information tied to your account.</p>
                    <button class="delete-account" name="delete-account">Delete Account</button>
                </form>
            </div>
            
            <form id="edit-name" class="editing-form hidden" action="./data/user-data.php" method="post">
                <h2>Change fullname</h2>
                <div class="field-container">
                    <div>
                        <p>Last Name</p>
                        <input type="text" name="lname" placeholder="e.g. Doe">
                    </div>
                    <div>
                        <p>First Name</p>
                        <input type="text" name="fname" placeholder="e.g. John">
                    </div>

                </div>
                <div class="button-container">
                    <button type="submit" class="cancel" name="cancel-acc-edit">Cancel</button>
                    <button type="submit" class="submit" name="edit-name">Submit</button>
                </div>
            </form>

            <form id="edit-email" class="editing-form hidden" action="./data/user-data.php" method="post">
                <h2>Change Email</h2>
                <div class="field-container">
                    <div>
                        <p>Email</p>
                        <input type="email" name="email" placeholder="e.g. Johndoe25@gmail.com">
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" class="cancel" name="cancel-acc-edit">Cancel</button>
                    <button type="submit" class="submit" name="edit-email">Submit</button>
                </div>
            </form>

            <form id="edit-password" class="editing-form hidden" action="./data/user-data.php" method="post">
                <h2>Change Password</h2>
                <div class="field-container password">
                    <div>
                        <div class="show-pass">
                            <p>New Password</p>
                            <p id="toggle-real-password">show</p>
                        </div>
                        <input id="new-password" type="password" name="password">
                    </div>
                    <div>
                        <p>Confirm Password</p>
                        <input type="password" name="confirm-password">
                    </div>

                </div>
                <div class="button-container" class="hidden">
                    <button type="submit" class="cancel" name="cancel-acc-edit">Cancel</button>
                    <button type="submit" class="submit" name="edit-password">Submit</button>
                </div>
            </form>
            
        </section>
    </main>

    <script>
        document.getElementById("button-name").addEventListener("click", () => {
            document.getElementById("edit-name").classList.remove("hidden");
            document.getElementById("account-container").classList.add("hidden");
        })

        document.getElementById("button-email").addEventListener("click", () => {
            document.getElementById("edit-email").classList.remove("hidden");
            document.getElementById("account-container").classList.add("hidden");
        })

        document.getElementById("button-password").addEventListener("click", () => {
            document.getElementById("edit-password").classList.remove("hidden");
            document.getElementById("account-container").classList.add("hidden");
        })

        //Show password
        const passwordinput = document.getElementById("new-password");
        const showpassword = document.getElementById("toggle-real-password");
        showpassword.addEventListener("mousedown", () => {
            passwordinput.type = "text";

            const hidePassword = () => {
                passwordinput.type = "password";
                document.removeEventListener("mouseup", hidePassword);
                document.removeEventListener("mouseleave", hidePassword);
            };

            document.addEventListener("mouseup", hidePassword);
            document.addEventListener("mouseleave", hidePassword);
        })
       
    </script>
</body>
</html>