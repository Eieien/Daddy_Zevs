<?php
include('connect.php');
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['customer_id'])){
    $email = $_SESSION['email'];
    $customer_id = $_SESSION['customer_id'];
}

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

// ORDER
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

    // checkout
    if(isset($_POST["checkout"])){
        // check if order is set
        if($_SESSION['set_order']){
            header("location: ../cart.php");
            exit();
        }  
        
        // delete prev orders if there are
        $order_id = getOrderID();
        deletePrevOrders($order_id);

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



// ACCOUNT
    // edit name
    if(isset($_POST["edit-name"])){
        $_POST['fname'] = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['lname'] = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
       
        // check if names are NOT empty
        if(empty($_POST["fname"]) && empty($_POST["lname"])){
            header("location: ../account.php");
            exit();
        }

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];

        $conn->query(
            "UPDATE customer
            SET first_name = '$fname', last_name = '$lname'
            WHERE customer_id = '$customer_id' ");

        // update account names
        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;

        $conn->close();
        header("location: ../account.php");
        exit();
    }

    // edit email
    if(isset($_POST["edit-email"])){
        $_POST['email'] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

        // check if email is NOT empty
        if(empty($_POST["email"])){
            header("location: ../account.php");
            exit();
        }
        
        $email =  $_POST['email'];

        // check user emails in db for dupes
        $result = $conn->query(
            "SELECT * FROM customer");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["email"] === $email){
                    $conn->close();
                    header("location: ../account.php");
                    exit();
                }
            }
        }

        $conn->query(
            "UPDATE customer
            SET email = '$email'
            WHERE customer_id = '$customer_id' ");

        $_SESSION["email"] = $email;

        $conn->close();
        header("location: ../account.php");
        exit();
    }

    // edit password
    if(isset($_POST["edit-password"])){
        $_POST['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['confirm-password'] = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_SPECIAL_CHARS);

        // check if email is NOT empty
        if(empty($_POST["password"]) && empty($_POST["confirm-password"]) ||
            $_POST["password"] !== $_POST["confirm-password"]
        ){
            header("location: ../account.php");
            exit();
        }

        $password = md5($_POST['password']);

        $conn->query(
            "UPDATE customer
            SET password = '$password'
            WHERE customer_id = '$customer_id' ");

        $conn->close();
        header("location: ../account.php");
        exit();
    }

    // cancel account edit
    if(isset($_POST["cancel-acc-edit"])){
        header("location: ../account.php");
        exit();
    }

    // delete account
    if(isset($_POST["delete-account"])){
        $_SESSION["del-acc"] = true;
        header("location: ../logout.php");
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