<?php
    include '../db/connect.php';
    include 'nav.php';

    $selectUsers = "SELECT * FROM customer";
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
    <h1>Users</h1>

    <!-- hidden form -->
    <form action="/db/admin-data.php" method="post" id="customerID-form">
        <input type="hidden" name="customerID">
    </form>

    <div>
        <?php
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $customer_id = $row['customer_id'];
                    echo
                    "<div>".
                        $row['first_name']." ".$row['last_name']." - ".$row['email']."
                        <button onclick='getUserId($customer_id)'>Remove User</button>
                    </div>";
                }   
            }
        ?>
    </div>

    <script>
        function getUserId(id){
            document.querySelector("input[name='customerID']").value = id;
            document.getElementById("customerID-form").submit();
        }
    </script>
</body>
</html>