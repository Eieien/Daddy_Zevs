<?php
include "./connect.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["user-id"])){
        $id = $_POST["user-id"];

        $conn->query(
            "DELETE FROM customer
            WHERE customer_id = '$id' ");

        $conn->close();
        header("location: ../admin/userbase.php");
        exit();
    }
}
?>