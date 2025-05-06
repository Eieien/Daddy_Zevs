<?php
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="db/user-data.php" method="post">
        <input type="text" name="address">
        <input type="submit" name="add-address" value="Add Address">
    </form>

    <form action="db/register.php" method="post">
        <input type="submit" name="log-out" value="Log Out">
    </form>

    <?php
    if(isset($_SESSION['server_message'])){
        echo "<p>".$_SESSION['server_message']."</p>";
        unset($_SESSION['server_message']);
    }
    ?>
</body>
</html>