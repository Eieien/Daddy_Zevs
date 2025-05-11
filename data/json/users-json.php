<?php
include "../connect.php";

$getUsers = "SELECT * FROM customer";
$result = $conn->query($getUsers);
$users = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $users;
$conn->close();
?>