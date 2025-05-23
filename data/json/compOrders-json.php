<?php
include "../connect.php";

$getCompOrders = 
    "SELECT * FROM completedorders
    JOIN customer ON completedorders.customer_id = customer.customer_id";
$result = $conn->query($getCompOrders);
$compOrders = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $compOrders;
$conn->close();
?>