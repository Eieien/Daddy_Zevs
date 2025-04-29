<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="css/constants.css">
    <link rel="stylesheet" href="css/user-access.css">
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
                <form>
                    <h1 id="form-msg">Log in.</h1>
                    <div>
                        <input type="text" value="Email" class="textbox"><br>
                        <input type="text" value="Password" class="textbox"><br>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <input type="checkbox" name="terms-conditions">
                            <label for="terms-conditions">Remember Me</label>
                        </div>
                        <a>Forgot Password?</a>
                    </div><br>
                    <input type="button" value="Log In" id="create-button"><br>
                    <p>Don't have an account? <a href="#">Sign In</a></p>
                </form>
            </div>
            <p style="margin-top: 15.5vh;" id="copyright">@2025 Daddy Zev's. All rights reserved.</p>
        </div>
    </div>
</body>
</html>