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

        // check if user has order in progress
        if($_SESSION['set_order']){
            header("location: ../order_tracking.php");
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
        // check if no address
        if(empty($_SESSION['address'])){
            $_SESSION['empty'] = true;
            $_SESSION['server_message'] = 
            "<h1>You have no address!</h1>
            <p>Please set your address so that you can proceed to checkout</p>";

            header("location: ../cart.php");
            exit();
        }  

        // check if cart is empty
        if(empty($_SESSION['cart'])){
            $_SESSION['empty'] = true;
            $_SESSION['server_message'] = 
            "<h1>Your cart is empty...</h1>
            <p>
            You haven’t added anything yet. Start shopping and fill your cart with great finds!
            </p>";

            header("location: ../cart.php");
            exit();
        }
        
        // delete prev orders if there are
        $order_id = getOrderID();
        deletePrevOrders($order_id);

        // add order to db
        $conn->query(
            "INSERT INTO orders (customer_id)
            VALUES ('$customer_id')");
        $order_id = getOrderID();

        // add order items to db
        foreach($_SESSION['cart'] as $item){
            $product_id = $item->product_id;
            $quantity = $item->quantity;

            // gets price of product
            $result = $conn->query(
                "SELECT price FROM product
                WHERE product_id = '$product_id' ");
            $row = $result->fetch_object();
            $subtotal = $row->price * $quantity;

            $conn->query(
                "INSERT INTO orderitem (order_id, product_id, quantity, subtotal_price)
                VALUES ('$order_id', '$product_id', '$quantity', '$subtotal')");
        }

        // update total price
        $total = $_SESSION['total_price'];
        $conn->query(
            "UPDATE orders
            SET total_price = $total
            WHERE customer_id = '$customer_id' ");

        $_SESSION["order"] = $_SESSION['cart']; // move cart items to order
        unset($_SESSION['cart']); // remove items in cart after checkout
        $_SESSION['order_status'] = 0;
        $_SESSION['set_order'] = true;
        $conn->close();
        header("location: ../order_tracking.php");
        exit();
    }

    // reorder
    if(isset($_POST["reorder"])){
        // check if order is set
        if($_SESSION['set_order']){
            $_SESSION['server_message'] = 
                "<div id='server-msg'>
                    <span>You have an order in progress!</span>
                </div>";

            header("location: ../order_history.php");
            exit();
        }

        // check if no address
        if(empty($_SESSION['address'])){
            $_SESSION['empty'] = true;
            $_SESSION['server_message'] = 
            "<h1>You have no address!</h1>
            <p>Please set your address so that you can proceed to checkout</p>";

            header("location: ../cart.php");
            exit();
        } 

        $completed_id = (int)$_POST["reorder"];

        $result = $conn->query(
            "SELECT itemhistory.*, product.product_name, product.description, product.price, product.image, product.stock
            FROM itemhistory
            JOIN product ON itemhistory.product_id = product.product_id
            WHERE completedorder_id = '$completed_id' "
        );

        $json_order = json_encode($result->fetch_all(MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
        header('Content-Type: application/json');
        echo $_SESSION["order"];

        // delete prev orders if there are
        $order_id = getOrderID();
        deletePrevOrders($order_id);

        // add order to db
        $conn->query(
            "INSERT INTO orders (customer_id)
            VALUES ('$customer_id')");
        $order_id = getOrderID();

        // add order items to db
        $total = 0;
        $_SESSION["order"] = json_decode($json_order);
        foreach($_SESSION["order"] as $item){
            $product_id = $item->product_id;
            $quantity = $item->quantity;
            $subtotal = $item->subtotal_price;

            $stock = $item->stock;
            if($stock == 0){
                unset($_SESSION["order"]);
                $_SESSION['server_message'] = 
                "<div id='server-msg'>
                    <span>One or more products is out of stock!</span>
                </div>";

                header("location: ../order_history.php");
                exit();
            }

            $conn->query(
                "INSERT INTO orderitem (order_id, product_id, quantity, subtotal_price)
                VALUES ('$order_id', '$product_id', '$quantity', '$subtotal')");
            $total += $subtotal;
        }

        // update total price
        $conn->query(
            "UPDATE orders
            SET total_price = $total
            WHERE customer_id = '$customer_id' ");
        unset($_SESSION['cart']); // remove items in cart
        $_SESSION['total_price'] = $total;
        $_SESSION['order_status'] = 0;
        $_SESSION['set_order'] = true;
        $conn->close();
        header("location: ../order_tracking.php");
        exit();
    }

    // updates order status display
    if(isset($_POST["check-status"])){
        // get order status of order
        $result = $conn->query(
            "SELECT * FROM orders
            WHERE customer_id = $customer_id");
        $order = $result->fetch_assoc();

        $_SESSION['order_status'] = $order["status"]; // sets order status of user
        $_SESSION['check_status'] = true; // status has been checked

        $conn->close();
        header("location: ../order_tracking.php");
        exit();
    }

    // check if order is rejected
    if(isset($_POST["rejected"])){
        unset($_SESSION['order']);
        unset($_SESSION["accepted"]);

        $order_id = getOrderID();
        deletePrevOrders($order_id);

        $_SESSION['set_order'] = false;
        header("location: ../menu.php");
        exit();
    }

    // check if order is accepted
    if(isset($_POST["accepted"])){
        $_SESSION["accepted"] = true;
        header("location: ../order_tracking.php");
        exit();
    }

    // check if order is complete
    if(isset($_POST["order-complete"])){
        unset($_SESSION['order']);
        unset($_SESSION["accepted"]);

        $order_id = getOrderID();

        // places order into completed orders
        $conn->query(
        "INSERT INTO completedorders (order_id, customer_id, order_date, total_price)
        SELECT order_id, customer_id, order_date, total_price FROM orders 
        WHERE order_id = '$order_id' ");

        // get completedorder id
        $result = $conn->query(
        "SELECT completedorder_id FROM completedorders
        WHERE order_id = '$order_id' ");
        $row = $result->fetch_assoc();
        $complete = $row["completedorder_id"];

        // places order items into item history referencing completedorder
        $result = $conn->query(
        "SELECT * FROM orderitem
        WHERE order_id = '$order_id' ");
        while($row = $result->fetch_assoc()){
            $product_id = $row["product_id"];
            $quantity = $row["quantity"];
            $subT = $row["subtotal_price"];

            $conn->query(
            "INSERT INTO itemhistory (completedorder_id, product_id, quantity, subtotal_price)
            VALUES ('$complete', '$product_id', '$quantity', '$subT')"); 
        }

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
        if(empty($_POST["fname"]) || empty($_POST["lname"])){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Names cannot be empty!</span>
            </div>";

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

        $_SESSION['server_message'] = 
        "<div id='server-msg' >
            <span style='color: var(--primary_blue);'>Your name has been changed!</span>
        </div>";

        $conn->close();
        header("location: ../account.php");
        exit();
    }

    // edit email
    if(isset($_POST["edit-email"])){
        $_POST['email'] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

        // check if email is NOT empty
        if(empty($_POST["email"])){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Email cannot be empty!</span>
            </div>";

            header("location: ../account.php");
            exit();
        }
        
        $email =  $_POST['email'];

        // check user emails in db for dupes
        $result = $conn->query(
            "SELECT * FROM customer");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["email"] == $email){
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

        $_SESSION['server_message'] = 
        "<div id='server-msg' >
            <span style='color: var(--primary_blue);'>Your email has been changed!</span>
        </div>";

        $conn->close();
        header("location: ../account.php");
        exit();
    }

    // edit password
    if(isset($_POST["edit-password"])){
        $_POST['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST['confirm-password'] = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_SPECIAL_CHARS);

        // check if passwords are NOT empty
        if(empty($_POST["password"]) || empty($_POST["confirm-password"])){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Password cannot be empty!</span>
            </div>";

            header("location: ../account.php");
            exit();
        }

        // check if passwords dont match
        if($_POST["password"] !== $_POST["confirm-password"]){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Password don't match!</span>
            </div>";

            header("location: ../account.php");
            exit();    
        }

        $password = md5($_POST['password']);

        $conn->query(
            "UPDATE customer
            SET password = '$password'
            WHERE customer_id = '$customer_id' ");

        $_SESSION['server_message'] = 
        "<div id='server-msg' >
            <span style='color: var(--primary_blue);'>Your password has been changed!</span>
        </div>";

        $conn->close();
        header("location: ../account.php");
        exit();
    }

    // delete account
    if(isset($_POST["delete-account"])){
        $_SESSION["del-acc"] = true;
        header("location: ../logout.php");
        exit();
    }

    // edit address
    if(isset($_POST["edit-add"])){
        $_POST["phone"] = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["add1"] = filter_input(INPUT_POST, "add1", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["add2"] = filter_input(INPUT_POST, "add2", FILTER_SANITIZE_SPECIAL_CHARS);
        $_POST["add3"] = filter_input(INPUT_POST, "add3", FILTER_SANITIZE_SPECIAL_CHARS);

        $phone = $_POST["phone"];
        $add1 = $_POST["add1"];
        $add2 = $_POST["add2"];
        $add3 = $_POST["add3"];

        // check if there is an order
        if($_SESSION["set_order"]){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>You cannot edit your address because order is in progress!</span>
            </div>";

            header("location: ../address.php");
            exit();
        }

        // check if fields are empty
        if(empty($add1) || empty($add2)|| empty($add3)){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Address fields cannot be empty!</span>
            </div>";

            header("location: ../address.php");
            exit();
        }
        if(empty($phone)){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>Phone number cannot be empty!</span>
            </div>";

            header("location: ../address.php");
            exit();
        }

        $address = "".$add1.", ".$add2.", ".$add3;

        $conn->query(
            "UPDATE customer
            SET phone_no = '$phone', address = '$address'
            WHERE customer_id = '$customer_id' ");

        $_SESSION["phone_no"] = $phone;
        $_SESSION["address"] = $address;

        $conn->close();
        header("location: ../address.php");
        exit();
    }
    
    // delete address
    if(isset($_POST["del-add"])){
        // check if there is an order
        if($_SESSION["set_order"]){
            $_SESSION['server_message'] = 
            "<div id='server-msg'>
                <span>You cannot delete your address because order is in progress!</span>
            </div>";

            header("location: ../address.php");
            exit();
        }

        $phone = $_SESSION["phone_no"];
        $address = $_SESSION["address"];

        $conn->query(
            "UPDATE customer
            SET phone_no = NULL, address = NULL
            WHERE customer_id = '$customer_id' ");

        unset($_SESSION["phone_no"], $_SESSION["address"]);

        $conn->close();
        header("location: ../address.php");
        exit();
    }

    // cancel account edits
    if(isset($_POST["cancel-acc-edit"])){
        header("location: ../account.php");
        exit();
    }
    if(isset($_POST["cancel-add-edit"])){
        header("location: ../address.php");
        exit();
    }

    // submit feedback
    if(isset($_POST["submit-feedback"])){ 
        $rating = (int)$_POST["rating"];
        $comment = htmlspecialchars($_POST["comment"]);

        $stmt = $conn->prepare(
            "INSERT INTO feedback (customer_id, rating, comment) 
            VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $customer_id, $rating, $comment);
        $stmt->execute();

        $_SESSION['server_message'] = 
        "<div id='server-msg' >
            <span style='color: var(--primary_blue);'>Your feedback was submitted!</span>
        </div>";

        $stmt->close();
        $conn->close();
        header("location: ../feedback.php");
        exit();
    }

    // order history
    if(isset($_POST["history-check"])){
        $conn->query(
        "SELECT * FROM completedorders
            WHERE customer_id = '$customer_id' ");
        
        header("location: ../order_history.php");
        exit();
    }



// USER NAV
    // clicked favorites
    if(isset($_POST["nav-fav"])){
        $_SESSION["check_fav"] = true;
        header(header: "location: ../menu.php#product-list");
        exit();
    }

    // search check
    if(isset($_POST["search-bar"])){
        $_POST["search-bar"] = filter_input(INPUT_POST, "search-bar", FILTER_SANITIZE_SPECIAL_CHARS);
        $_SESSION["search"] = $_POST["search-bar"];
        header(header: "location: ../menu.php#product-list");
        exit();
    }
}

// get requests
if($_SERVER["REQUEST_METHOD"] == "GET"){
    // user favorites handling
    if(isset($_GET["product_id"]) && isset($_SESSION["email"])){
        $id = (int)$_GET["product_id"];

        if(empty($_SESSION["fav"])){
            // gets product details from db
            $products = $conn->query(
                "SELECT * FROM product");

            // gets user favorites securely
            $stmt = $conn->prepare(
                "SELECT product_id 
                FROM favorites 
                WHERE customer_id = ?");
            $stmt->bind_param('i', $customer_id);
            $stmt->execute();
            $favorites = $stmt->get_result();

            $_SESSION["fav"] = array();
            $ticked = array();
            
            // stores favorited product IDs
            while($fav = $favorites->fetch_assoc()){
                $ticked[$fav["product_id"]] = true;
            }

            // check products and mark favorites
            while($item = $products->fetch_assoc()){
                $x = $item["product_id"];
                $check = isset($ticked[$x]);
                $_SESSION["fav"][$x] = $check;
            }

            $stmt->close();
            $conn->close();
        }

        if($_SESSION["fav"][$id]){
            echo true;
        } else {
            echo false;
        }
    }

    // checks if user ticks favorite
    if(isset($_GET["id"]) && isset($_GET["fav"])){
        $id = (int)$_GET["id"];
        $fav = filter_var($_GET["fav"], FILTER_VALIDATE_BOOLEAN);
        
        // updates favorites in db
        if($fav){
            $conn->query(
                "INSERT INTO favorites (customer_id, product_id)
                VALUES ('$customer_id', '$id')");
        } else if(!$fav){
            $conn->query(
                "DELETE FROM favorites
                WHERE customer_id = '$customer_id' AND product_id = '$id' ");
        }
        $conn->close();
        
        $_SESSION["fav"][$id] = $fav;
        echo $_SESSION["fav"][$id];
    }

    // search product function
    if(isset($_GET["product_ID"]) && isset($_GET["search-input"]) && isset($_SESSION["email"])){
        $id = (int)$_GET["product_ID"];
        $search = htmlspecialchars($_GET["search-input"]);

        if(empty($_SESSION["search_result"])){
            // get number of products
            $products = $conn->query(
                "SELECT * FROM product");

            // compares product names and description with search input
            $stmt = $conn->prepare(
            "SELECT * FROM product 
            WHERE product_name LIKE ? OR description LIKE ?");
            $like = "%".$search."%";
            $stmt->bind_param("ss", $like, $like);
            $stmt->execute();
            $result = $stmt->get_result();

            $_SESSION["search_result"] = array();
            $compare = array();

            // stores search results in array
            while($row = $result->fetch_assoc()){
                $compare[$row["product_id"]] = true;
            }

            while($item = $products->fetch_assoc()){
                $x = $item["product_id"];
                $check = isset($compare[$x]);
                $_SESSION["search_result"][$x] = $check;
            }

            $stmt->close();
            $conn->close();
        }

        if($_SESSION["search_result"][$id]){
            echo true;
        } else {
            echo false;
        }
    }
}
?>