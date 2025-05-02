<?php
    session_start();

    if(isset($_POST["signUpForm"])){
        echo
        "<style>
            #logInForm{ display: none; }
        </style>";
    }
    else{
        echo
        "<style>
            #signUpForm{ display: none; }
        </style>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="./styles/constants.css">
    <link rel="stylesheet" href="./styles/user-access.css">
</head>
<body>
    <div id="container">
        <div id="banner">
            <div id="logo">
                <img src="#">
                <h1>DADDY ZEV'S</h1>
            </div>
            <div id="tagline">
                <h1>Welcome back!</h1>
                <h3>Ready for a delicious experience?</h3>
            </div>
        </div>
        <div id="credentials">
            <div id="main-page">
                <a href="#"><img src="#">Back to Main</a>
            </div>
            <div id="main-form">
                <section id="logInForm">
                    <form action="db/register.php" method="post">
                        <h1 id="form-msg">Log in.</h1>
                        <div>
                            <input type="text" name="email" placeholder="Email" class="textbox"><br>
                            <input type="password" name="password" placeholder="Password" class="textbox"><br>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <input type="checkbox" name="terms-conditions">
                                <label for="terms-conditions">Remember Me</label>
                            </div>
                            <a>Forgot Password?</a>
                        </div><br>
                        <input type="submit" name="log-in" value="Log In" id="create-button"><br>
                        <p>Don't have an account? <a onclick="displaySignUp()">Sign In</a></p>
                    </form>
                </section>

                <section id="signUpForm">
                    <form action="db/register.php" method="post">
                        <h1 id="form-msg">Sign Up.</h1>
                        <div>
                            <input type="text" name="fname" placeholder="First Name" class="textbox"><br>
                            <input type="text" name="lname" placeholder="Last Name" class="textbox"><br>
                            <input type="text" name="email" placeholder="Email" class="textbox"><br>
                            <input type="password" name="password" placeholder="Password" class="textbox"><br>
                            <input type="password" name="confirm-password" placeholder="Confirm Password" class="textbox"><br>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <input type="checkbox" name="terms-conditions">
                                <label for="terms-conditions">Remember Me</label>
                            </div>
                            <a>Forgot Password?</a>
                        </div><br>
                        <input type="submit" name="sign-up" value="Sign Up" id="create-button"><br>
                        <p>Already have an account? <a onclick="displayLogIn()">Log In</a></p>
                    </form>
                </section>
            </div>
            <p style="margin-top: 15.5vh;" id="copyright">@2025 Daddy Zev's. All rights reserved.</p>
        </div>

        <?php
        if(isset($_SESSION['server_message'])){
            echo "<p>".$_SESSION['server_message']."</p>";
            unset($_SESSION['server_message']);
        }
        ?>
    </div>

    <script>
        function displaySignUp(){
            document.getElementById("logInForm").style.display = 'none';
            document.getElementById("signUpForm").style.display = 'block';
            document.getElementById("error").style.display = 'none';
        }

        function displayLogIn(){
            document.getElementById("logInForm").style.display = 'block';
            document.getElementById("signUpForm").style.display = 'none';
        }
    </script>
</body>
</html>