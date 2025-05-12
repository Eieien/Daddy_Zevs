<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>History</title>

    <style>
        .orderHighlight{
            color: #3464DD;
        }

        .accountHighlight, .addressHighlight, .feedbackHighlight{
            color: #0B2027;
        }
    </style>
</head>
<body>
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <h1>Order History</h1>
            <div id="order-history-list"></div>
        </section>
    </main>

    <script>
        let order_list = document.getElementById("order-history-list");
        const dateOptions = { // date format options
            month: 'long',
            day: 'numeric',
            year: 'numeric',
        };
        const timeOptions = { // time format options
            hour: 'numeric',
            minute: '2-digit',
            // second: '2-digit',
            hour12: true
        };
        let customerID = <?php echo $_SESSION["customer_id"]; ?>;

        fetch("./data/json/compOrders-json.php")
            .then(response => response.json())
            .then(orders => orders.forEach((order) => {
                if(order.customer_id === customerID){
                    let orderDetails = document.createElement("div");
                    orderDetails.className = "order-details-container";

                    const dateStr = order.completion_date;
                    const dateObj = new Date(dateStr.replace(" ", "T")); // replaces space with 'T' for ISO-compliancy
                    const orderCompDate = dateObj.toLocaleDateString('en-US', dateOptions);
                    const orderCompTime = dateObj.toLocaleTimeString('en-US', timeOptions);

                    order_list.append(orderDetails);

                    let orderListContainer = document.createElement("div");
                    orderListContainer.className = "order-list-container";

                    orderListContainer.innerHTML =
                    `<div class="date-ordered">${orderCompDate}<span>${orderCompTime}</span></div>`;

                    orderDetails.append(orderListContainer);

                    let orderCardList = document.createElement("div");
                    orderCardList.className = "order-card-list";

                    orderListContainer.append(orderCardList);

                    fetch("./data/json/itemHistory-json.php")
                        .then(response => response.json())   
                        .then(items => {
                            items.forEach((item) => {
                            if(item.completedorder_id === order.completedorder_id){
                                let orderCard = document.createElement("div");
                                orderCard.className = "order-card";

                                orderCard.innerHTML =
                                `<div class="image-container">
                                    <img class="product-image" src=${item.image}>
                                </div>
                                <div class="details-container">
                                    <div class="product-name">
                                        <h2>${item.product_name}</h2>
        
                                    </div>
                                    <div class="description">
                                        ${item.description}
                                    </div>
                                    <div class="quantity-price">
                                        <div class="quantity">x${item.quantity}</div>
                                        <div class="price">P${item.price}</div>
                                    </div>
                                </div>`;

                                orderCardList.append(orderCard);
                            }
                        });
                    
                            let totalPrice = document.createElement("div");
                            totalPrice.className = "total-price"

                            totalPrice.innerHTML =
                            `<div class="total">Total</div>
                            <div class="price">P${order.total_price}</div>`;

                            orderCardList.append(totalPrice);
                        })
                }
            }))
    </script>
</body>
</html>