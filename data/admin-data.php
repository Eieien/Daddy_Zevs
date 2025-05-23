<?php
include "./connect.php";
session_start();

// post requests
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // removing users
    if(isset($_POST["user-id"])){
        $customer_id = $_POST["user-id"];

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
        header("location: ../admin/userbase.php");
        exit();
    }

    // accepting/rejecting/completing orders
    if(isset($_POST["ch"]) && isset($_POST["order-id"])){
        $ch = (int)$_POST["ch"];
        $order_id = (int)$_POST["order-id"];

        // rejected
        if(!$ch){
            $conn->query(
        "UPDATE orders 
            SET status = -1
            WHERE order_id = '$order_id' ");
        } else
        // accepted
        if($ch && $ch == 1){
            $conn->query(
        "UPDATE orders 
            SET status = 1
            WHERE order_id = '$order_id' ");
        } else 
        // completed
        if($ch == 3){
            $conn->query(
        "UPDATE orders 
            SET status = 3
            WHERE order_id = '$order_id' ");
        }

        $conn->close();
        header("location: ../admin/pendingOrders.php");
        exit();
    }

    // cancel product edit
    if(isset($_POST["cancel-edit"])){
        header("location: ../admin/listOfProducts.php");
        exit();
    } else
    // submit product edit
    if(isset($_POST["submit-edit"])){
        $id = $_POST["product-id"];
        $name = $_POST["product-name"];
        $price = $_POST["product-price"];
        $desc = $_POST["product-desc"];
        $stock = $_POST["stock"];

        if(!empty($name)){
            $conn->query(
            "UPDATE product
            SET product_name = '$name'
            WHERE product_id = '$id' ");
        }
        if(!empty($price)){
            $conn->query(
            "UPDATE product
            SET price = '$price'
            WHERE product_id = '$id' ");
        }
        if(!empty($desc)){
            $conn->query(
            "UPDATE product
            SET description = '$desc'
            WHERE product_id = '$id' ");
        }
        if(!empty($stock) || $stock == 0){
            $conn->query(
            "UPDATE product
            SET stock = '$stock'
            WHERE product_id = '$id' ");
        }

        $conn->close();
        header("location: ../admin/listOfProducts.php");
        exit();
    }
}

// get requests
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["order-id"]) && isset($_GET["status"])){
        $order_id = (int)$_GET["order-id"];
        $status = (int)$_GET["status"];

        // delivering
        if($status == 1){
            $conn->query(
            "UPDATE orders 
            SET status = 2
            WHERE order_id = '$order_id' ");
        } else 
        // making
        if($status == 2){
            $conn->query(
            "UPDATE orders 
            SET status = 1
            WHERE order_id = '$order_id' ");
        }

        $conn->close();
    }
}
?>