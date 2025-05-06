<?php
include('connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['customerID'])){
        $customer_id = $_POST['customerID'];

        $checkUser = "SELECT customer_id FROM customer WHERE customer_id = '$customer_id' ";
        $result = $conn->query($checkUser);

        if($result->num_rows > 0){
            $conn->query(
        "DELETE FROM customer
                WHERE customer_id = '$customer_id' ");
        }
        header("location: ../emp/userbase.php");
        $conn->close();
    }

    // allow admin to confirm/reject orders
}
?>