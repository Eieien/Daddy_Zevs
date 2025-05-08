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
                <div class="order-right">
                <button class="filter-a" id="filterButton" type="button">
                    <div class="filter-image">
                        <span class="material-symbols-outlined" style="color: #3464dd;">tune</span>
                    </div>
                    <span class="filter">filter</span>
                </button>
                <div class="filter-dropdown" id="filterDropdown">
                    <ul class="filter-ul">
                        <li class="filter-li"><button class="filter-complete">Complete</button></li>
                        <li class="filter-li"><button class="filter-deliver">Delivering</button></li>
                        <li class="filter-li"><button class="filter-making">Making</button></li>
                        <li class="filter-li"><button class="filter-pending">Pending</button></li>
                    </ul>
                </div>
                </div>
            </div>

            <div class="pending-card">
                <li class="pending-item">
                    <div class="pending-itemTop">
                        <div class="pending-top">
                            <div class="pending-topContent">
                                <div class="pending-topContent-up">
                                    <h1>John Doe</h1>
                                    <p class="pending-topContent-up-p">02 8123 4567</p>
                                </div>
                                <div class="pending-topContent-down">
                                    <p class="pending-topContent-down-p">456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200</p>
                                </div>
                            </div>
                            <div class="pending-topButton">
                                <button class="filter-pending">Pending</button>
                            </div>
                            <div class="pending-topIcon">
                                <button class="pending-topIconButton">
                                    <span class="material-symbols-outlined" style="color: #3464dd;">more_vert</span>
                                </button>
                            </div>
                        </div>
                        <div class="pending-order">
                            <div class="pending-orderList">
                                <h2 class="pending-orderQuantity" id="pending-orderQuantity">1x</h2> <!--PLACEHOLDER OF THE NAME--> 
                                <h2 class="pending-orderName" id="pending-orderName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE PRICE-->
                                <h2 class="pending-orderPrice" id="pending-orderPrice">P250</h2>
                            </div>
                            <div class="pending-orderList">
                                <h2 class="pending-orderQuantity" id="pending-orderQuantity">1x</h2> <!--PLACEHOLDER OF THE NAME--> 
                                <h2 class="pending-orderName" id="pending-orderName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE PRICE-->
                                <h2 class="pending-orderPrice" id="pending-orderPrice">P250</h2>
                            </div>
                            <div class="pending-orderList">
                                <h2 class="pending-orderQuantity" id="pending-orderQuantity">1x</h2> <!--PLACEHOLDER OF THE NAME--> 
                                <h2 class="pending-orderName" id="pending-orderName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE PRICE-->
                                <h2 class="pending-orderPrice" id="pending-orderPrice">P250</h2>
                            </div>
                            <div class="pending-orderList">
                                <h2 class="pending-orderQuantity" id="pending-orderQuantity">1x</h2> <!--PLACEHOLDER OF THE NAME--> 
                                <h2 class="pending-orderName" id="pending-orderName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE PRICE-->
                                <h2 class="pending-orderPrice" id="pending-orderPrice">P250</h2>
                            </div>
                        </div>
                    </div>
                    <div class="pending-total">
                        <h2 class="pending-totalWord">TOTAL</h2>
                        <h2 class="pending-totalPrice" id="pending-totalPrice">P250</h2>
                    </div>
                </li>

                <li class="pending-item">
                    <div class="pending-itemTop">
                        <div class="pending-top">
                            <div class="pending-topContent">
                                <div class="pending-topContent-up">
                                    <h1>John Doe</h1>
                                    <p class="pending-topContent-up-p">02 8123 4567</p>
                                </div>
                                <div class="pending-topContent-down">
                                    <p class="pending-topContent-down-p">456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200</p>
                                </div>
                            </div>
                            <div class="pending-topButton">
                                <button class="filter-pending">Pending</button>
                            </div>
                            <div class="pending-topIcon">
                                <button class="pending-topIconButton">
                                    <span class="material-symbols-outlined" style="color: #3464dd;">more_vert</span>
                                </button>
                            </div>
                        </div>
                        <div class="pending-order">
                            <div class="pending-orderList">
                                <h2 class="pending-orderQuantity" id="pending-orderQuantity">1x</h2> <!--PLACEHOLDER OF THE NAME--> 
                                <h2 class="pending-orderName" id="pending-orderName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE PRICE-->
                                <h2 class="pending-orderPrice" id="pending-orderPrice">P250</h2>
                            </div>
                        </div>
                    </div>
                    <div class="pending-total">
                        <h2 class="pending-totalWord">TOTAL</h2>
                        <h2 class="pending-totalPrice" id="pending-totalPrice">P250</h2>
                    </div>
                </li>

                <li class="pending-item">
                    <div class="pending-itemTop">
                        <div class="pending-top">
                            <div class="pending-topContent">
                                <div class="pending-topContent-up">
                                    <h1>John Doe</h1>
                                    <p class="pending-topContent-up-p">02 8123 4567</p>
                                </div>
                                <div class="pending-topContent-down">
                                    <p class="pending-topContent-down-p">456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200</p>
                                </div>
                            </div>
                            <div class="pending-topButton">
                                <button class="filter-pending">Pending</button>
                            </div>
                            <div class="pending-topIcon">
                                <button class="pending-topIconButton">
                                    <span class="material-symbols-outlined" style="color: #3464dd;">more_vert</span>
                                </button>
                            </div>
                        </div>
                        <div class="pending-order">
                            <div class="pending-orderList">
                                <h2 class="pending-orderQuantity" id="pending-orderQuantity">1x</h2> <!--PLACEHOLDER OF THE NAME--> 
                                <h2 class="pending-orderName" id="pending-orderName">Bacon and Egg Croissant</h2> <!--PLACEHOLDER OF THE PRICE-->
                                <h2 class="pending-orderPrice" id="pending-orderPrice">P250</h2>
                            </div>
                        </div>
                    </div>
                    <div class="pending-total">
                        <h2 class="pending-totalWord">TOTAL</h2>
                        <h2 class="pending-totalPrice" id="pending-totalPrice">P250</h2>
                    </div>
                </li>
                
                
            </div>
        </section>
    </main>
    
    <script>
        document.getElementById('filterButton').addEventListener('click', function () {
            document.getElementById('filterDropdown').classList.toggle('show');
        });

        window.addEventListener('click', function (e) {
            const dropdown = document.getElementById('filterDropdown');
            const button = document.getElementById('filterButton');
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>