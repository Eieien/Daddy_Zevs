<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["switch-form"])){
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
?>