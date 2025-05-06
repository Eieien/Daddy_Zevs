<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="./styles/constants.css">
    <link rel="stylesheet" href="./styles/login.css">
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

            <div id="sign-up-tagline" style="display: none;">
                <h1>Freshly baked,</h1>
                <h1>just for you.</h1>
                <h4>Sign up & savor the experience!</h4>
            </div>
        </section>

        <section id="credentials">
            <div id="back">
                <!-- placeholder image -->
                <img src="images/logos/Daddy_zev_enhanced_new 1.svg"> 
                <p>Back to Main</p>
            </div>

            <div id="log-in-container">
                <h1>Log in</h1>
                <form>
                    <div class="input-fields">
                        <input type="text" placeholder="Email" class="textbox">
                        <input type="password" placeholder="Password" class="textbox">
                    </div>
                    <div id="remember">
                        <span>
                            <input type="checkbox" name="terms-conditions">
                            <label for="terms-conditions">Remember Me</label>
                        </span>
                        <a>Forgot Password?</a>
                    </div>
                    <input type="button" value="Log In"><br>
                    <p>Don't have an account? <span class="form-switch" onclick="switchForms()">Create one</span></p>
                </form>
            </div>

            <div id="sign-up-container" style="display: none;">
                <h1>Sign up</h1>
                <form>
                    <div class="input-fields">
                        <div id="names">
                            <input type="text" placeholder="First Name" class="textbox">
                            <input type="text" placeholder="Last Name" class="textbox">
                        </div>
                        <input type="text" placeholder="Email" class="textbox">
                        <input type="password" placeholder="Password" class="textbox">
                        <input type="password" placeholder="Confirm Password" class="textbox">
                    </div>
                    <div id="remember">
                        <span>
                            <input type="checkbox" name="terms-conditions">
                            <label for="terms-conditions">Agree to terms and conditions</label>
                        </span>
                    </div>
                    <input type="button" value="Sign Up"><br>
                    <p>Already have an account? <span class="form-switch" onclick="switchForms()">Sign In</span></p>
                </form>
            </div>

            <p id="copyright">@2025 Daddy Zev's. All rights reserved.</div>
        </section>
    </main>

    <script>
        const logInForm = document.getElementById("log-in-container");
        const logInTag = document.getElementById("log-in-tagline");
        const signUpForm = document.getElementById("sign-up-container");
        const signUpTag = document.getElementById("sign-up-tagline");

        function switchForms(){
            if(signUpForm.style.display === "none"){
                logInForm.style.display = "none";
                logInTag.style.display = "none";
                signUpForm.style.display = "flex";
                signUpTag.style.display = "flex";
            }
            else if(logInForm.style.display === "none"){
                signUpForm.style.display = "none";
                signUpTag.style.display = "none";
                logInForm.style.display = "flex";
                logInTag.style.display = "flex";
            }
        }
    </script>
</body>
</html>