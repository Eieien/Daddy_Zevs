<?php
include "../connect.php";

$getCompOrders = "SELECT * FROM completedorders";
$result = $conn->query($getCompOrders);
$compOrders = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $compOrders;
$conn->close();
?>