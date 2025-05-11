<?php
include "../connect.php";

$getProducts = "SELECT * FROM product";
$result = $conn->query($getProducts);
$products = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $products;
$conn->close();
?>