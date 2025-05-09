<?php
include "./connect.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    // switch between log in & sign in forms
    if(isset($_GET["switch-form"])){
        if($_SESSION["login"] === false){
            $_SESSION["login"] = true;
        } 
        else if(empty($_SESSION["login"]) && $_SESSION["login"] !== false || $_SESSION["login"] === true){
            $_SESSION["login"] = false;
        }

        header("location: ../login.php");
        exit();
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // sign up
    if(isset($_POST["sign-up"])){
        $_POST['fname'] = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['lname'] = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['email'] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['confirm-password'] = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_SPECIAL_CHARS);

        if($_POST['password'] != $_POST['confirm-password']){
            $_SESSION['server_message'] = "Passwords don't match!";
            header("location: ../login.php");
            $conn->close();
            exit();
        }

        $fname= $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $checkEmail = "SELECT * FROM customer WHERE email = '$email' ";
        $result = $conn->query($checkEmail);
        if($result->num_rows > 0){
            $_SESSION['server_message'] = "Email already exists!";
            header("location: ../login.php");
            $conn->close();
            exit();
        }

        $insertUser = "INSERT INTO customer (first_name, last_name, email, password)
                        VALUES ('$fname', '$lname', '$email', '$password')";
        if($conn->query($insertUser) == true){
            $_SESSION['server_message'] = "You have been registered!";
            header("location: ../login.php");
        }
        else{
            $_SESSION['server_message'] = "Error: " . $conn->error;
            header("location: ../login.php");
        }
        $conn->close();
    }

    // log in
    if(isset($_POST["log-in"])){
        $_POST['email'] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $checkUser = "SELECT * FROM customer WHERE email = '$email' and password = '$password' ";
        $result = $conn->query($checkUser);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            $_SESSION['email'] = $row['email'];
            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['set_order'] = false;

            header("location: ../menu.php");
            $conn->close();
        }
        else{
            $checkAdmin = "SELECT * FROM employee WHERE email = '$email' and password = '$password' ";
            $result = $conn->query($checkAdmin);
    
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
    
                $_SESSION['employee_email'] = $row['email'];
                $_SESSION['employee_id'] = $row['customer_id'];
    
                header("location: ../admin/userbase.php");
            }
            else{
                $_SESSION['server_message'] = "Incorrect email or password!";
                header("location: ../login.php");
            }
        }
        $conn->close();
    }

    // log out
    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
        header("location: ../menu.php");
    }
    if(isset($_POST["cancel"]) || $_SESSION['set_order']){
        header("location: ../account.php");
    }
}
?>