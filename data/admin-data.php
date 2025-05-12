<?php
include "./connect.php";
session_start();

// post requests
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // removing users
    if(isset($_POST["user-id"])){
        $id = $_POST["user-id"];

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