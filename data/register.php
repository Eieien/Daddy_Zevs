<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    // switch between log in & sign in forms
    if(isset($_GET["switch-form"])){
        if(!isset($_SESSION["login"]) || $_SESSION["login"] === false){
            $_SESSION["login"] = true;
        } 
        else{
            $_SESSION["login"] = false;
        }

        header("location: ../login.php");
        exit();
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // sign up

    // log in
    if(isset($_POST["log-in"])){
        // test
        $_SESSION["email"] = $_POST["email"];
        header("location: ../menu.php");
        exit();
    }
}
?>