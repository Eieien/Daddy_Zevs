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
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Passwords don't match!</span>
            </div>";
            header("location: ../login.php");
            exit();
        }

        $fname= $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $stmt = $conn->prepare(
        "SELECT * FROM customer WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            // server message
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Email already exists!</span>
            </div>";

            $stmt->close();
            $conn->close();
            header("location: ../login.php");
            exit();
        }

        $stmt = $conn->prepare(
            "INSERT INTO customer (first_name, last_name, email, password)
            VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $email, $password);
        if($stmt->execute() == true){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span style='color: var(--primary_blue);'>You have been registered!</span>
            </div>";

            $_SESSION['login'] = true;
            header("location: ../login.php");
        } else {
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Couldn't sign you in! Please try again</span>
            </div>";
            header("location: ../login.php");
        }

        $stmt->close();
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

        $stmt = $conn->prepare(
            "SELECT * FROM customer WHERE email = ? and password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

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
        } else { // admin log in
            $stmt = $conn->prepare(
                "SELECT * FROM employee WHERE email = ? and password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
    
                $_SESSION['email'] = $row['email'];
                $_SESSION['employee_id'] = $row['employee_id'];
    
                header("location: ../admin/userbase.php");
            }
            else{
                $_SESSION['server_message'] = 
                "<div id='server-msg'>
                    <span>Incorrect email or password!</span>
                </div>";

                header("location: ../login.php");
            }
        }

        $stmt->close();
        $conn->close();
        exit();
    }

    // debug purposes
    // $_SESSION['set_order'] = false;

    // log out
    if(isset($_POST["logout"])){
        // check if order
        if($_SESSION["set_order"]){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>You cannot log out because order is in progress!</span>
            </div>";

            unset($_SESSION["del-acc"]);
            header("location: ../account.php");
            exit();
        }

        if($_SESSION["del-acc"]){
            // delete all order history related data of user
            $result = $conn->query(
            "SELECT completedorder_id FROM completedorders WHERE customer_id = '$customer_id' ");
            while($row = $result->fetch_assoc()){
                $complete = $row["completedorder_id"];

                $conn->query(
                "DELETE FROM itemhistory 
                WHERE completedorder_id = '$complete' ");
            }
            $conn->query(
            "DELETE FROM completedorders 
            WHERE customer_id = '$customer_id' ");

            // delete all table data related to user
            $conn->query(
            "DELETE FROM favorites WHERE customer_id = '$customer_id' ");
            $conn->query(
            "DELETE FROM feedback WHERE customer_id = '$customer_id' ");
            $conn->query(
            "DELETE FROM customer WHERE customer_id = '$customer_id' ");
            $conn->close();
        }

        session_unset();
        session_destroy();
        header("location: ../index.php");
        exit();
    }
    else if(isset($_POST["cancel"]) || $_SESSION['set_order']){
        unset($_SESSION["del-acc"]);
        if(isset($_SESSION['customer_id'])){
            header("location: ../account.php");
            exit();
        } else 
        if(isset($_SESSION['employee_id'])){
            header("location: ../admin/userbase.php");
            exit();
        }
    }
}
?>