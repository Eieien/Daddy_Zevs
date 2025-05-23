<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userbase</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/pendingOrders.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>
    <?php
        include "admin_header.php";
    ?>
    <main class="content" style="width: 75vw;">
        <?php
            include "admin_nav.php";
        ?>

        <section>
            <div class="order-title">
                <h1>Orders</h1>
                <div class="order-nav">
                    <div class="tab-item active" onclick="selectTab(event,'pending-list')">Pending Orders</div>
                    <div class="tab-item" onclick="selectTab(event,'accepted-list')">Accepted Orders</div>
                    <div class="tab-item" onclick="selectTab(event,'completed-list')">Completed Orders</div>
                </div>

                <div id="pending-list" class="tab-pane active"></div>

                <div id="accepted-list" class="tab-pane"></div>

                <div id="completed-list" class="tab-pane"></div>
            </div>
        </section>
    </main>

    <!-- hidden form -->
    <form action="../data/admin-data.php" method="post" id="submit-ch">
        <input type="hidden" name="ch" id="ch">
        <input type="hidden" name="order-id" id="order-id">
    </form>
    
    <!-- Masonry Layout -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    
    <script>
       

        let choice = document.getElementById("submit-ch");
        let choiceInput = document.getElementById("ch");
        let orderIDInput = document.getElementById("order-id");

        function rejectOrder(x){
            choiceInput.value = 0;
            orderIDInput.value = x;
            choice.submit();
        }
        function acceptOrder(x){
            choiceInput.value = 1;
            orderIDInput.value = x;
            choice.submit();
        }
        function completeOrder(x){
            choiceInput.value = 3;
            orderIDInput.value = x;
            choice.submit();
        }

        let pendingList = document.getElementById("pending-list");
        let acceptedList = document.getElementById("accepted-list");
        let completedList = document.getElementById("completed-list");

        fetch("../data/json/orders-json.php")
            .then(response => response.json())
            .then(orders => orders.forEach((order) => {
                let orderCard = document.createElement('div');
                orderCard.className = "order-card";

                // rejected
                if(order.status <= 0){
                    orderCard.innerHTML =
                    `<p class="order-num">
                        Order #${order.order_id}
                    </p>
                    <div class="card-background">
                        <div class="heading">
                            <div class="name">
                                <h2>${order.first_name} ${order.last_name}</h2>
                                <h3>0${order.phone_no}</h3>
                            </div>
                        </div>
                        <div class="address">
                            ${order.address}
                        </div>
                        <div class="product-list" id='${order.order_id}'></div>
                        <hr>
                        <div class="total">
                            <h3>Total</h3>
                            <h2>P${order.total_price}</h2>
                        </div>
                        <div class="button-container">
                            <button onclick="rejectOrder(${order.order_id})" class="reject" id='reject-${order.order_id}'>Reject</button>
                            <button onclick="acceptOrder(${order.order_id})" class="submit" id='submit-${order.order_id}'>Accept</button>
                        </div>
                    </div>`;
    
                    pendingList.append(orderCard);

                    // if rejected
                    if(order.status < 0){
                        let reject = document.getElementById("reject-"+order.order_id);
                        let accept = document.getElementById("submit-"+order.order_id);

                        accept.remove();
                        reject.removeAttribute("onclick");
                        reject.textContent = "Rejected";
                        reject.style.backgroundColor = "#ECEDE9";
                        reject.style.color = "var(--accent_orange)";
                        reject.style.cursor = "default";
                    }

                } else

                // accepted
                if(order.status || order.status > 0){
                    orderCard.innerHTML =
                    `<p class="order-num">
                        Order #${order.order_id}
                    </p>
                    <div class="card-background">
                        <div class="heading">
                            <div class="name">
                                <h2>${order.first_name} ${order.last_name}</h2>
                                <h3>0${order.phone_no}</h3>
                            </div>
                            <div class="status-dropdown">
                                <button class="dropdown-toggle"></button>
                                <ul class="dropdown-menu" >
                                    <li data-value="1">Making</li>
                                    <li data-value="2">Delivering</li>
                                </ul>
                            </div>
                        </div>
                        <div class="address">
                            ${order.address}
                        </div>
                        <div class="product-list" id='${order.order_id}'></div>
                        <hr>
                        <div class="total">
                            <h3>Total</h3>
                            <h2>P${order.total_price}</h2>
                        </div>
                        <div class="button-container">
                            <button id='cancel-${order.order_id}' class="cancel">Cancel</button>
                            <button id='submit-${order.order_id}' onclick="completeOrder(${order.order_id})" class="submit">Complete</button>
                        </div>
                    </div>`;

                    acceptedList.append(orderCard);

                    // toggle dropdown
                    const togglebtn = orderCard.querySelector(".dropdown-toggle");
                    const menu = orderCard.querySelector(".dropdown-menu");

                    // default style
                    if(order.status === 1){
                        togglebtn.textContent = "Making";
                        togglebtn.style.backgroundColor = "#FF7B28";
                        togglebtn.style.border = "none";
                        togglebtn.style.color = "#FBFCEC";
                    } else
                    if(order.status === 2){
                        togglebtn.textContent = "Delivering";
                        togglebtn.style.backgroundColor = "#FFC628";
                        togglebtn.style.border = "none";
                        togglebtn.style.color = "#FBFCEC";
                    } else
                    if(order.status === 3){
                        togglebtn.remove();

                        let cancel = document.getElementById("cancel-"+order.order_id);
                        let complete = document.getElementById("submit-"+order.order_id);

                        togglebtn.remove();
                        cancel.remove();
                        complete.removeAttribute("onclick");
                        complete.textContent = "Completed";
                        complete.style.backgroundColor = "#ECEDE9";
                        complete.style.color = "#0ada48";
                        complete.style.cursor = "default";
                    }

                    togglebtn.addEventListener("click", () => {
                        menu.style.display = (menu.style.display === "none" || !menu.style.display) ? "block" : "none";
                    });

                    // close dropdown on item click
                    menu.querySelectorAll("li").forEach(item => {
                        item.addEventListener("click", () => {
                            const selectedValue = item.getAttribute('data-value');
                            menu.style.display = "none";
                            togglebtn.textContent = item.textContent; // update button label
                            togglebtn.setAttribute('data-value', selectedValue);
                            // You can also handle updating status in backend here

                            // Custom color based on value
                            switch (selectedValue) {
                                case "1": // Making
                                    togglebtn.style.backgroundColor = "#FF7B28";
                                    togglebtn.style.border = "none";
                                    togglebtn.style.color = "#FBFCEC";
                                    console.log(1); //debug
                                    break;
                                case "2": // Delivering
                                    togglebtn.style.backgroundColor = "#FFC628";
                                    togglebtn.style.border = "none";
                                    togglebtn.style.color = "#FBFCEC";
                                    console.log(order.order_id); //debug
                                    console.log(order.status);
                                    break;
                            }

                            const xhttp = new XMLHttpRequest();
                            xhttp.onload = function (){
                                console.log(this.responseText);
                            }
                            xhttp.open("GET", "../data/admin-data.php?"+
                                    "order-id=" + order.order_id +"&"+
                                    "status=" + order.status);
                            xhttp.send();
                        });
                    });

                    accepted.appended(orderCard);
                    accepted.layout();
                }

                // get order items
                fetch("../data/json/orderitem-json.php")
                    .then(response => response.json())
                    .then(orderItems => orderItems.forEach((item) => {
                        if(item.order_id === order.order_id){
                            let product_list = document.getElementById(String(order.order_id));

                            let quantity = document.createElement("div");
                            quantity.className = "quantity";
                            quantity.textContent = item.quantity+"x";

                            let product_name = document.createElement("div");
                            product_name.className = "product-name";
                            product_name.textContent = item.product_name;

                            let product_price = document.createElement("div");
                            product_price.className = "product-price";
                            product_price.textContent = "P"+item.price;

                            product_list.append(quantity, product_name, product_price);
                        }
                    }))
            }))

        // completed orders
        fetch("../data/json/compOrders-json.php")
            .then(response => response.json())
            .then(orders => orders.forEach((order) => {
                let orderCard = document.createElement('div');
                orderCard.className = "order-card";

                orderCard.innerHTML =
                `<p class="order-num">
                    Order #${order.order_id}
                </p>
                <div class="card-background">
                    <div class="heading">
                        <div class="name">
                            <h2>${order.first_name} ${order.last_name}</h2>
                            <h3>0${order.phone_no}</h3>
                        </div>
                    </div>
                    <div class="address">
                        ${order.address}
                    </div>
                    <div class="product-list" id='${order.completedorder_id}'></div>
                    <hr>
                    <div class="total">
                        <h3>Total</h3>
                        <h2>P${order.total_price}</h2>
                    </div>
                </div>`;

                completedList.append(orderCard);

                // get order items
                fetch("../data/json/itemHistory-json.php")
                    .then(response => response.json())
                    .then(orderItems => orderItems.forEach((item) => {
                        if(item.completedorder_id === order.completedorder_id){
                            let product_list = document.getElementById(String(order.completedorder_id));

                            let quantity = document.createElement("div");
                            quantity.className = "quantity";
                            quantity.textContent = item.quantity+"x";

                            let product_name = document.createElement("div");
                            product_name.className = "product-name";
                            product_name.textContent = item.product_name;

                            let product_price = document.createElement("div");
                            product_price.className = "product-price";
                            product_price.textContent = "P"+item.price;

                            product_list.append(quantity, product_name, product_price);
                        }
                    }))
            }))


        function selectTab(event, tabId) {
            document.querySelectorAll('.tab-item').forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelectorAll('.tab-pane').forEach(content => {
                content.classList.remove('active');
            });

            event.currentTarget.classList.add('active');

            document.getElementById(tabId).classList.add('active');
        }

        

        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
            const togglebtn = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');

            togglebtn.addEventListener('click', () => {
                menu.classList.add('show');
            });

            menu.querySelectorAll('li').forEach(item => {
                item.addEventListener('click', () => {
                    const selectedText = item.textContent;
                    const selectedValue = item.getAttribute('data-value');

                    togglebtn.textContent = selectedText;
                    togglebtn.setAttribute('data-value', selectedValue);
                    menu.classList.remove('show');

                    // Default style
                    togglebtn.style.backgroundColor = "#ECEDE9";
                    togglebtn.style.border = "1px solid #0B2027";
                    togglebtn.style.color = "#0B2027";

                    // Custom color based on value
                    switch (selectedValue) {
                        case "2": // Making
                            togglebtn.style.backgroundColor = "#FF7B28";
                            togglebtn.style.border = "none";
                            togglebtn.style.color = "#FBFCEC";
                            break;
                        case "3": // Delivering
                            togglebtn.style.backgroundColor = "#FFC628";
                            togglebtn.style.border = "none";
                            togglebtn.style.color = "#FBFCEC";
                            break;
                    }
                });
            });

            document.addEventListener('click', (event) => {
                if (!event.target.closest('.status-dropdown')) {
                    menu.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>