<?php
include "../connect.php";

$getFeedback = 
    "SELECT * FROM feedback
    JOIN customer ON feedback.customer_id = customer.customer_id";
$result = $conn->query($getFeedback);
$feedback = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
header('Content-Type: application/json');
echo $feedback;
$conn->close();
?>