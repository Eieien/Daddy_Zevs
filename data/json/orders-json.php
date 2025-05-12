<?php
include "../connect.php";

$getOrders = 
    "SELECT * FROM orders
    JOIN customer ON orders.customer_id = customer.customer_id";
$result = $conn->query($getOrders);
$orders = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $orders;
$conn->close();
?>