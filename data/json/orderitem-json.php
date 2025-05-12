<?php
include "../connect.php";

$getOrderItems = 
    "SELECT orderitem.*, product.product_name, product.price
    FROM orderitem
    JOIN product ON orderitem.product_id = product.product_id;";
$result = $conn->query($getOrderItems);
$orderItems = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $orderItems;
$conn->close();
?>