<?php
    session_start();

    if(isset($_SESSION["email"])){
        header("location: ./menu.php");
        exit();
    }

    if(isset($_POST["signup"])){
        $_SESSION["login"] = false;
    }
    else if(isset($_POST["login"])){
        $_SESSION["login"] = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if(isset($_SESSION["login"])){
            if($_SESSION["login"]){
                echo "<title>Log In</title>";
            }
            else{
                echo "<title>Sign Up</title>";
            }
        }
        else{
            echo "<title>Log In</title>";
        }
    ?>

    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <main>
        <section id="banner">
            <div id="logo">
                <img src="images/logos/Daddy_zev_enhanced_new 1.svg">
                <p>DADDY ZEV<span>'</span>S</p>
            </div>

            <div id="log-in-tagline">
                <h1>Welcome back!</h1>
                <h4>Ready for a delicious experience?</h4>
            </div>

            <div id="sign-up-tagline">
                <h1>Freshly baked,</h1>
                <h1>just for you.</h1>
                <h4>Sign up & savor the experience!</h4>
            </div>
        </section>

        <section id="credentials">
            <div id="back-container">
                <a href="./index.php" id="back">
                    <img src="./images/icons/Back to home.svg">
                    <p>Back to Main</p>
                </a>
            </div>

            <div id="log-in-container">
                <h1>Log in</h1>

                <form action="./data/register.php" method="post">
                    <div class="input-fields">
                        <input type="text" name="email" placeholder="Email" class="textbox" required>
                        <input type="password" name="password" placeholder="Password" class="textbox" required>
                    </div>
                    <div id="remember">
                        <span>
                            <input type="checkbox" name="remember-me" id="remember-me">
                            <label for="remember-me">Remember Me</label>
                        </span>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" name="log-in" value="Log In" class="submit-credentials">
                </form>

                <form action="./data/register.php" method="get">
                    <p>Don't have an account? <input type="submit" name="switch-form" value="Create one"></p>
                </form>

                <?php
                    if(isset($_SESSION['server_message']) && !empty($_SESSION["login"])){
                        echo $_SESSION['server_message'];
                        unset($_SESSION['server_message']);
                    }
                ?>
            </div>

            <div id="sign-up-container">
                <h1>Sign up</h1>

                <form action="./data/register.php" method="post">
                    <div class="input-fields">
                        <div id="names">
                            <input type="text" name="fname" placeholder="First Name" class="textbox" required>
                            <input type="text" name="lname" placeholder="Last Name" class="textbox" required>
                        </div>
                        <input type="text" name="email" placeholder="Email" class="textbox" required>
                        <input type="password" name="password" placeholder="Password" class="textbox" required>
                        <input type="password" name="confirm-password" placeholder="Confirm Password" class="textbox" required>
                    </div>
                    <div id="remember">
                        <span>
                            <input type="checkbox" name="terms-conditions" required>
                            <label for="terms-conditions">Agree to terms and conditions</label>
                        </span>
                    </div>
                    <input type="submit" name="sign-up" value="Sign Up" class="submit-credentials">
                </form>
                
                <form action="./data/register.php" method="get">
                    <p>Already have an account? <input type="submit" name="switch-form" value="Sign In"></p>
                </form>

                <?php
                    if(isset($_SESSION['server_message']) && empty($_SESSION["login"])){
                        echo $_SESSION['server_message'];
                        unset($_SESSION['server_message']);
                    }
                ?>
            </div>

            <p id="copyright">@2025 Daddy Zev's. All rights reserved.</p>
        </section>
    </main>

    <script>
        const logInForm = document.getElementById("log-in-container");
        const logInTag = document.getElementById("log-in-tagline");
        const signUpForm = document.getElementById("sign-up-container");
        const signUpTag = document.getElementById("sign-up-tagline");

        function switchForms(){
            if(signUpForm.style.display === 'none'){
                logInForm.style.display = 'none';
                logInTag.style.display = 'none';
                signUpForm.style.display = 'flex';
                signUpTag.style.display = 'flex';
            }
            else if(logInForm.style.display === 'none'){
                signUpForm.style.display = 'none';
                signUpTag.style.display = 'none';
                logInForm.style.display = 'flex';
                logInTag.style.display = 'flex';
            }
        }

        <?php
            if(isset($_SESSION["login"])){
                switch($_SESSION["login"]){
                    case true:
                        echo "signUpForm.style.display = 'none';
                                signUpTag.style.display = 'none';";
                        break;
                    case false:
                        echo "logInForm.style.display = 'none';
                                logInTag.style.display = 'none';";
                        break;
                }
            }
            else{
                echo "signUpForm.style.display = 'none';
                    signUpTag.style.display = 'none';";
            }
        ?>
    </script>
</body>
</html>