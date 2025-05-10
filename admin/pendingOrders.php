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
                    <div id="pending-order" class="active">Pending Orders</div>
                    <div id="accepted-order">Accepted Orders</div>
                </div>
                <div id="pending-list">
                    <div class="order-card">
                        <p class="order-num">
                            Order #1
                        </p>
                        <div class="card-background">
                            <div class="heading">
                                <div class="name">
                                    <h2>John Doe</h2>
                                    <h3>(02) 8123 4567</h3>
                                </div>
                            </div>
                            <div class="address">
                                456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200
                            </div>
                            <div class="product-list">
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
    
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                            </div>
                            <hr>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>P250</h2>
                            </div>
                            <div class="button-container">
                                <button class="reject">Reject</button>
                                <button class="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                    <div class="order-card">
                        <p class="order-num">
                            Order #2
                        </p>
                        <div class="card-background">
                            <div class="heading">
                                <div class="name">
                                    <h2>John Doe</h2>
                                    <h3>(02) 8123 4567</h3>
                                </div>
                            </div>
                            <div class="address">
                                456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200
                            </div>
                            <div class="product-list">
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
    
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                            </div>
                            <hr>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>P250</h2>
                            </div>
                            <div class="button-container">
                                <button class="reject">Reject</button>
                                <button class="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                    <div class="order-card">
                        <p class="order-num">
                            Order #3
                        </p>
                        <div class="card-background">
                            <div class="heading">
                                <div class="name">
                                    <h2>John Doe</h2>
                                    <h3>(02) 8123 4567</h3>
                                </div>
                            </div>
                            <div class="address">
                                456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200
                            </div>
                            <div class="product-list">
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
    
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                            </div>
                            <hr>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>P250</h2>
                            </div>
                            <div class="button-container">
                                <button class="reject">Reject</button>
                                <button class="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="accepted-list" class="hidden">
                    <div class="order-card">
                        <p class="order-num">
                            Order #1
                        </p>
                        <div class="card-background">
                            <div class="heading">
                                <div class="name">
                                    <h2>John Doe</h2>
                                    <h3>(02) 8123 4567</h3>
                                </div>
                                <div class="status-dropdown">
                                    <button class="dropdown-toggle" >Status</button>
                                    <ul class="dropdown-menu" >
                                        <li data-value="2">Making</li>
                                        <li data-value="3">Delivering</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="address">
                                456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200
                            </div>
                            <div class="product-list">
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
    
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                            </div>
                            <hr>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>P250</h2>
                            </div>
                            <div class="button-container">
                                <button class="cancel">Cancel</button>
                                <button class="submit">Complete</button>
                            </div>

                        </div>
                    </div>
                    <div class="order-card">
                        <p class="order-num">
                            Order #1
                        </p>
                        <div class="card-background">
                            <div class="heading">
                                <div class="name">
                                    <h2>John Doe</h2>
                                    <h3>(02) 8123 4567</h3>
                                </div>
                                <div class="status-dropdown">
                                    <button class="dropdown-toggle" >Status</button>
                                    <ul class="dropdown-menu" >
                                        <li data-value="2">Making</li>
                                        <li data-value="3">Delivering</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="address">
                                456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200
                            </div>
                            <div class="product-list">
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
    
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                            </div>
                            <hr>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>P250</h2>
                            </div>
                            <div class="button-container">
                                <button class="cancel">Cancel</button>
                                <button class="submit">Complete</button>
                            </div>

                        </div>
                    </div>

                    <div class="order-card">
                        <p class="order-num">
                            Order #1
                        </p>
                        <div class="card-background">
                            <div class="heading">
                                <div class="name">
                                    <h2>John Doe</h2>
                                    <h3>(02) 8123 4567</h3>
                                </div>
                                <div class="status-dropdown">
                                    <button class="dropdown-toggle">Status</button>
                                    <ul class="dropdown-menu" >
                                        <li data-value="2">Making</li>
                                        <li data-value="3">Delivering</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="address">
                                456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200
                            </div>
                            <div class="product-list">
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
    
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                                
                                <div class="quantity">1x</div>
                                <div class="product-name">Bacon and Egg Croissant</div>
                                <div class="product-price">P250</div>
                            </div>
                            <hr>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>P250</h2>
                            </div>
                            <div class="button-container">
                                <button class="cancel">Cancel</button>
                                <button class="submit">Complete</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Masonry Layout -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    
    <script>
        var pending_masonry = document.getElementById("pending-list");
        var pending = new Masonry(pending_masonry, {
            itemSelector: ".order-card",
            columnWidth: 380,
            gutter: 16
        });

        var accepted_masonry = document.getElementById("accepted-list");
        var accepted = new Masonry(accepted_masonry, {
            itemSelector: ".order-card",
            columnWidth: 380,
            gutter: 16
        })

        var pending_order_btn = document.getElementById("pending-order");
        var accepted_order_btn = document.getElementById("accepted-order");
        var pending_list = document.getElementById("pending-list");
        var accepted_list = document.getElementById("accepted-list");

        pending_order_btn.addEventListener("click", () => {
            accepted_list.classList.add("hidden");
            pending_list.classList.remove("hidden");
            accepted_order_btn.classList.remove("active");
            pending_order_btn.classList.add("active");

            pending.layout();
            
        });

        accepted_order_btn.addEventListener("click", () => {
            pending_list.classList.add("hidden");
            accepted_list.classList.remove("hidden");
            accepted_order_btn.classList.add("active");
            pending_order_btn.classList.remove("active");
            
            accepted.layout();

        })

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