<?php
include "../connect.php";

$getItemHistory = 
    "SELECT * FROM itemhistory
    JOIN product ON itemhistory.product_id = product.product_id";
$result = $conn->query($getItemHistory);
$itemHistory = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $itemHistory;
$conn->close();
?>