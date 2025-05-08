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

        // checks if item is already in array to updated quantity
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
    if(isset($_POST["product-id"])){
        $product_id = $_POST["product-id"];
        $i = 0;

        foreach($_SESSION['cart'] as $item){
            if($item->product_id == $product_id){
                unset($_SESSION['cart'][$i]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // reorganizes indices in array
                header("location: ../cart.php");
                exit();
            }
            $i++;
        }
    }

    // adding user address
    if(isset($_POST["add-address"])){
        $address = $_POST["address"];
    }

    // check for order
    if(isset($_POST["order"])){
        // checks if cart is empty
        if(empty($_SESSION['cart'])){
            $_SESSION['server_message'] = "No items in cart to checkout!";
            header("location: ../cart.php");
            exit();
        }

        // checks if order is set
        if($_SESSION['set_order']){
            $_SESSION['server_message'] = "Cannot checkout because order in progress!";
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
        unset($_SESSION['cart']);
        $_SESSION['set_order'] = true;
        header("location: ../order.php");
        exit();
    }

    if(isset($_POST["order-complete"])){
        $order_id = getOrderID();
        deletePrevOrders($order_id);

        $_SESSION['set_order'] = false;
        header("location: ../menu.php");
        exit();
    }
}
?>