<?php
    session_start();
?>
<header>
    <h1>Header</h1>

    <?php
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            echo
            "<a href='menu.php'>Daddy Zev's</a> ".$email.
            "<p>Search Bar</p>
            <div>
                <a href='favorites.php'>Favorites</a>
                <a href='cart.php'>Cart</a>
                <a href='order.php'>Orders</a>
                <a href='account.php'>Account</a>
            </div>";
        }
        else{
            echo
            "<a href='index.php'>Daddy Zev's</a>
            <a href='about.php'>About</a>
            <a href='menu.php'>Menu</a>
            <form action='log-in.php' method='post'>
                <button name='logInForm'>Log In</button>
                <button name='signUpForm'>Sign Up</button>
            </form>";
        }
    ?>
    <hr>
</header>

<style>
    h1{
        text-align: center;
    }
</style>