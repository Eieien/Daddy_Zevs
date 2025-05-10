<?php
include "./connect.php";
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['customer_id'])){
    $email = $_SESSION['email'];
    $customer_id = $_SESSION['customer_id'];
}

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
            $conn->close();
            header("location: ../login.php");
            exit();
        }

        $insertUser = "INSERT INTO customer (first_name, last_name, email, password)
                        VALUES ('$fname', '$lname', '$email', '$password')";
        if($conn->query($insertUser) == true){
            $_SESSION['server_message'] = "You have been registered!";
            $_SESSION['login'] = true;
            header("location: ../login.php");
        }
        else{
            $_SESSION['server_message'] = "Error: " . $conn->error;
            header("location: ../login.php");
        }
        $conn->close();
        exit();
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

            // account details
            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['fname'] = $row['first_name'];
            $_SESSION['lname'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION["phone_no"] = $row['phone_no'];
            $_SESSION["address"] = $row['address'];

            $_SESSION['set_order'] = false;
            $conn->close();
            header("location: ../menu.php");
            exit();
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

    // debug
    $_SESSION['set_order'] = false;

    // log out
    if(isset($_POST["logout"]) && !$_SESSION['set_order']){
        if($_SESSION["del-acc"]){
            $conn->query(
            "DELETE FROM customer WHERE customer_id = '$customer_id' "
            );
            $conn->close();
        }

        session_unset();
        session_destroy();
        header("location: ../menu.php");
        exit();
    }
    else if(isset($_POST["cancel"]) || $_SESSION['set_order']){
        unset($_SESSION["del-acc"]);
        header("location: ../account.php");
        exit();
    }
}
?>