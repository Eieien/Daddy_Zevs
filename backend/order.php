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
    <h1>Order Tracking Page</h1>

    <?php
    if(empty($_SESSION['set_order'])){
        echo
        "<p>You have no orders currently.</p>
        <style>
            #order_progress{ display: none; }   
        </style>";
    }
    ?>

    <main id="order_progress">
        <p>Order in progess</p>

        <form action="db/user-data.php" method="post">
            <button name="order-complete">Complete</button>
        </form>
    </main>
</body>
</html>
<?php 
    include('footer.html'); 
?>