<?php
include('connect.php');
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['customer_id'])){
    $email = $_SESSION['email'];
    $customer_id = $_SESSION['customer_id'];
}
// default address here

function getOrderID()
{
    global $conn, $customer_id;

    $result = $conn->query(
        "SELECT * FROM orders
        WHERE customer_id = '$customer_id' ");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $order_id = $row["order_id"];
    }

    return $order_id;
}

function deletePrevOrders($order_id)
{
    global $conn, $customer_id;

    // delete order items of user
    $conn->query(
        "DELETE FROM orderitem
        WHERE order_id = '$order_id' ");

    // delete previous order of user
    $conn->query(
        "DELETE FROM orders
        WHERE customer_id = '$customer_id' ");
}

// post requests
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // adding items to cart
    if(isset($_POST["item-data"])){
        // check if user is logged in
        if(empty($_SESSION['email'])){
            $_SESSION['login'] = false;
            header("location: ../login.php");
            exit();
        }

        if(empty($_SESSION['cart'])) $_SESSION['cart'] = array(); // sets cart as array, only if its empty

        $item = json_decode($_POST["item-data"]);
        $item->quantity = $_POST["quantity"]; // new quantity key

        // checks if item is already in array to update quantity
        foreach($_SESSION['cart'] as $cart_item){
            if($item->product_id == $cart_item->product_id){
                $cart_item->quantity += $item->quantity;
                header("location: ../cart.php");
                exit();
            }
        }

        array_push($_SESSION['cart'], $item);
        header("location: ../cart.php");
        exit();
    }

    // removing items from cart
    if(isset($_POST["checked-boxes"])){
        $check = $_POST["checked-boxes"];

        for($i = 0; $i < strlen($check); $i++){
            if($check[$i]){
                unset($_SESSION['cart'][$i]);
            }
        }

        $_SESSION['cart'] = array_values($_SESSION['cart']); // reorganizes indices in array
        header("location: ../cart.php");
        exit();
    }

    // adding user address
    if(isset($_POST["add-address"])){
        $address = $_POST["address"];
    }

    // checkout
    if(isset($_POST["checkout"])){
        // check if order is set
        if($_SESSION['set_order']){
            header("location: ../cart.php");
            exit();
        }      

        // add order to db
        $conn->query(
            "INSERT INTO orders (customer_id, status)
            VALUES ('$customer_id', 0)");
        $order_id = getOrderID();

        // add order items to db
        foreach($_SESSION['cart'] as $item){
            $product_id = $item->product_id;
            $quantity = $item->quantity;

            $conn->query(
                "INSERT INTO orderitem (order_id, product_id, quantity)
                VALUES ('$order_id', '$product_id', '$quantity')");
        }

        // update total price
        $total = $_SESSION['total_price'];
        $conn->query(
            "UPDATE orders
            SET total_price = $total
            WHERE customer_id = '$customer_id' ");

        $conn->close();
        $_SESSION["order"] = $_SESSION['cart']; // move cart items to order
        unset($_SESSION['cart']); // remove items in cart after checkout
        $_SESSION['set_order'] = true;
        header("location: ../order_tracking.php");
        exit();
    }

    // check if order is complete
    if(isset($_POST["order-complete"])){
        $order_id = getOrderID();
        deletePrevOrders($order_id);

        $_SESSION['set_order'] = false;
        header("location: ../menu.php");
        exit();
    }
}

// get requests
if($_SERVER["REQUEST_METHOD"] == "GET"){
    // user favorites handling
    if(isset($_GET["product_id"])){
        $id = $_GET["product_id"];

        // initializes fav array if empty
        if(empty($_SESSION["fav"])){
            // gets number of products from db
            $result = $conn->query(
                "SELECT * FROM product");
            $conn->close();

            $_SESSION["fav"] = array();
            for($i = 0; $i <= $result->num_rows; $i++){
                array_push($_SESSION["fav"], false);
            }
        }

        if($_SESSION["fav"][$id] === false){
            echo false;
        }
        else{
            echo true;
        }
    }

    // checks if user ticks favorite
    if(isset($_GET["id"]) && isset($_GET["fav"])){
        $id = $_GET["id"];
        $fav = filter_var($_GET["fav"], FILTER_VALIDATE_BOOLEAN);
        $_SESSION["fav"][$id] = $fav;
        echo $_SESSION["fav"][$id];
    }
}
?>