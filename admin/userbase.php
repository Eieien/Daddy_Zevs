<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/userbase.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php require "admin_header.php"; ?>
    <main class="content" style="width: 75vw;">
        <?php require "admin_nav.php"; ?>

        <section id="user-list">
            <h1>Dashboard</h1>

            <div id="website-statistics">
                <div class="statistic-card">
                    <div class="stat-detail">
                        <p>Users</p>
                        <h2 id="user-amount">0</h2>
                    </div>
                    <div class="stat-icon">
                        <svg  viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.3335 20H10.6668C7.72131 20 5.3335 22.3878 5.3335 25.3333V28H26.6668V25.3333C26.6668 22.3878 24.279 20 21.3335 20Z" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.0002 14.6667C18.9457 14.6667 21.3335 12.2789 21.3335 9.33333C21.3335 6.38781 18.9457 4 16.0002 4C13.0546 4 10.6668 6.38781 10.6668 9.33333C10.6668 12.2789 13.0546 14.6667 16.0002 14.6667Z" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="statistic-card">
                    <div class="stat-detail">
                        <p>Sales</p>
                        <h2 id="sale-amount">0</h2>
                    </div>
                    <div class="stat-icon">
                        <svg  viewBox="0 0 82 82" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M58.083 30.75L45.3722 49.8162C44.9463 50.4551 43.9891 50.3955 43.6457 49.7087L38.3536 39.1246C38.0103 38.4378 37.0531 38.3782 36.6272 39.0171L23.9163 58.0833" stroke="#3464DD" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="10.25" y="10.25" width="61.5" height="61.5" rx="2" stroke="#3464DD" stroke-width="6"/>
                        </svg>

                    </div>
                </div>
                <div class="statistic-card">
                    <div class="stat-detail">
                        <p>Orders</p>
                        <h2 id="order-amount">0</h2>
                    </div>
                    <div class="stat-icon">
                        <svg  viewBox="0 0 72 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M36 77.25V44.25M36 77.25L3.94 57.2125C3.48048 56.9253 3.25072 56.7817 3.12536 56.5555C3 56.3294 3 56.0584 3 55.5165V23.625M36 77.25L52.5 66.9375L68.06 57.2125C68.5195 56.9253 68.7493 56.7817 68.8746 56.5555C69 56.3294 69 56.0584 69 55.5165V23.625M36 44.25L3 23.625M36 44.25L69 23.625M3 23.625L34.94 3.66251C35.4555 3.34034 35.7132 3.17926 36 3.17926C36.2868 3.17926 36.5445 3.34034 37.06 3.66251L69 23.625" stroke="#3464DD" stroke-width="6" stroke-linejoin="round"/>
                            <path d="M49.499 50.4376C49.499 52.0944 50.8422 53.4376 52.499 53.4376C54.1559 53.4376 55.499 52.0944 55.499 50.4376H49.499ZM51.559 33.3501L49.969 35.894L51.559 33.3501ZM52.3737 34.007L54.9976 32.5527L52.3737 34.007ZM19.499 13.3126L17.909 15.8565L49.969 35.894L51.559 33.3501L53.149 30.8061L21.089 10.7686L19.499 13.3126ZM52.499 50.4376H55.499V35.046H52.499H49.499V50.4376H52.499ZM51.559 33.3501L49.969 35.894C50.0907 35.9701 50.1655 36.017 50.2254 36.056C50.2849 36.0947 50.2886 36.0993 50.2665 36.0824C50.2419 36.0635 50.1619 36.0003 50.063 35.8942C49.957 35.7804 49.8464 35.6357 49.7497 35.4613L52.3737 34.007L54.9976 32.5527C54.6659 31.9543 54.238 31.5667 53.9168 31.3205C53.6462 31.1131 53.3309 30.9197 53.149 30.8061L51.559 33.3501ZM52.499 35.046H55.499C55.499 34.8315 55.5022 34.4617 55.4697 34.1224C55.4312 33.7194 55.3293 33.1512 54.9976 32.5527L52.3737 34.007L49.7497 35.4613C49.6531 35.2869 49.589 35.1165 49.5487 34.9663C49.5111 34.8262 49.5 34.7249 49.497 34.6939C49.4944 34.6663 49.4963 34.6718 49.4976 34.7428C49.4989 34.8143 49.499 34.9025 49.499 35.046H52.499Z" fill="#3464DD"/>
                        </svg>


                    </div>
                </div>
            </div>
        </section>
        

        <form action='../data/admin-data.php' method='post' id="del-user">
            <input type="hidden" name="user-id">
        </form>
    </main>

    <script>
        let user_amount = 0;
        let sale_amount = 0;
        let order_amount = 0;

        fetch("../data/json/users-json.php")
            .then(response => response.json())
            .then(users => {users.forEach(() => {
                    user_amount++;
                })
                document.getElementById("user-amount").textContent = user_amount;
            })
            .catch(error => console.error('Error:', error));

        fetch("../data/json/compOrders-json.php")
            .then(response => response.json())
            .then(sales => {sales.forEach(() => {
                    sale_amount++;
                })
                document.getElementById("sale-amount").textContent = sale_amount;
            })
            .catch(error => console.error('Error:', error));

        fetch("../data/json/orders-json.php")
            .then(response => response.json())
            .then(orders => {orders.forEach(() => {
                    order_amount++;
                })
                document.getElementById("order-amount").textContent = order_amount;
            })
            .catch(error => console.error('Error:', error));


        let user_list = document.getElementById("user-list");

        fetch("../data/json/users-json.php")
            .then(response => response.json())
            .then(users => users.forEach((user) => {
                let userCard = document.createElement('div');
                userCard.className = "user-card";

                if(!user.address) user.address = "No Address";

                userCard.innerHTML =
                `<img src='../images/icons/user.svg'>

                <div id='user-info'>
                    <div id='name-email'>
                        <h2>${user.first_name} ${user.last_name}</h2>
                        <span>${user.email}</span>
                    </div>
                    <p>${user.address}</p>
                </div>

                <div id='remove-button'>
                    <button name="remove-user" onclick='removeUser(${user.customer_id})'>Remove User</button>
                </div>`;

                console.log(user.customer_id);

                user_list.append(userCard);
            }))
            .catch(error => console.error('Error:', error));

            function removeUser(id){
                document.querySelector("input[name='user-id']").value = id;
                document.getElementById("del-user").submit();
            }
    </script>
</body>
</html>