<?php
    include '../db/connect.php';
    include 'nav.php';

    $selectUsers = "SELECT * FROM orders";
    $result = $conn->query($selectUsers);
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Order List</h1>

    <!-- hidden form -->
    <form action="/db/admin-data.php" method="post" id="orderID-form">
        <input type="hidden" name="orderID">
    </form>

    <div>
        <?php
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    if($row['status'] == 0) $status = "Pending";
                    else if($row['status'] == 1) $status = "Making";
                    else if($row['status'] == 2) $status = "Delivering";
                    else if($row['status'] == 3) $status = "Completed";
                    else if($row['status'] == -1) $status = "Rejected";
                    echo
                    "<div>
                        Order request on ".$row['order_date']." - Php ".$row['total_price']." - ".$status."
                    </div>";
                }   
            }
        ?>
    </div>
</body>
</html>