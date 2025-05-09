<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/tracker.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include('./user_nav.php') ?>
    <div class="content">
        <div id="status">
            <h1>Order Status</h1>
            <div id="status_bar">
                <div class="icon_status">
                    <div>
                        <svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 11.0833V19H27.4167M19.5 33.25C11.6299 33.25 5.25 26.8701 5.25 19C5.25 11.1299 11.6299 4.75 19.5 4.75C27.3701 4.75 33.75 11.1299 33.75 19C33.75 26.8701 27.3701 33.25 19.5 33.25Z" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <!-- <img src="#"> -->
                    <p>Order Pending</p>
                </div>
                <hr>
                <div class="icon_status">
                    <div>
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.9582 33.25V24.75C22.9582 24.1977 22.5105 23.75 21.9582 23.75H16.0415C15.4892 23.75 15.0415 24.1977 15.0415 24.75V33.25" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.9165 17.4166V29.25C7.9165 31.1356 7.9165 32.0784 8.50229 32.6642C9.08808 33.25 10.0309 33.25 11.9165 33.25H26.0832C27.9688 33.25 28.9116 33.25 29.4974 32.6642C30.0832 32.0784 30.0832 31.1356 30.0832 29.25V17.4166" stroke="#0B2027" stroke-width="2"/>
                            <path d="M7.53793 6.26493C7.71982 5.53737 7.81077 5.17359 8.08203 4.96179C8.35329 4.75 8.72827 4.75 9.47822 4.75H28.5218C29.2717 4.75 29.6467 4.75 29.918 4.96179C30.1892 5.17359 30.2802 5.53737 30.4621 6.26493L32.6287 14.9316C32.9147 16.0755 33.0577 16.6475 32.7574 17.0321C32.4572 17.4167 31.8676 17.4167 30.6884 17.4167H30.3052C28.6868 17.4167 27.8777 17.4167 27.3182 16.9427C26.7587 16.4687 26.6257 15.6706 26.3596 14.0743L26.3223 13.8503C26.2472 13.4001 26.2097 13.1749 26.125 13.1749C26.0403 13.1749 26.0028 13.4001 25.9277 13.8503L25.7889 14.6835C25.6211 15.6901 25.5372 16.1935 25.2764 16.5653C25.0791 16.8465 24.8127 17.0721 24.5029 17.2205C24.0932 17.4167 23.583 17.4167 22.5625 17.4167V17.4167C21.542 17.4167 21.0318 17.4167 20.6221 17.2205C20.3123 17.0721 20.0459 16.8465 19.8486 16.5653C19.5878 16.1935 19.5039 15.6901 19.3361 14.6835L19.1973 13.8503C19.1222 13.4001 19.0847 13.1749 19 13.1749C18.9153 13.1749 18.8778 13.4001 18.8027 13.8503L18.6639 14.6835C18.4961 15.6901 18.4122 16.1935 18.1514 16.5653C17.9541 16.8465 17.6877 17.0721 17.3779 17.2205C16.9682 17.4167 16.458 17.4167 15.4375 17.4167V17.4167C14.417 17.4167 13.9068 17.4167 13.4971 17.2205C13.1873 17.0721 12.9209 16.8465 12.7236 16.5653C12.4628 16.1935 12.3789 15.6901 12.2111 14.6835L12.0723 13.8503C11.9972 13.4001 11.9597 13.1749 11.875 13.1749C11.7903 13.1749 11.7528 13.4001 11.6777 13.8503L11.6404 14.0743C11.3743 15.6706 11.2413 16.4687 10.6818 16.9427C10.1223 17.4167 9.31317 17.4167 7.69483 17.4167H7.31155C6.13242 17.4167 5.54285 17.4167 5.24257 17.0321C4.94229 16.6475 5.08529 16.0755 5.37127 14.9316L7.53793 6.26493Z" stroke="#0B2027" stroke-width="2"/>
                        </svg>
                    </div>
                    <p>Order is being made</p>
                </div>
                <hr>
                <div class="icon_status">
                    <div>
                        <svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25.8332" cy="30.0833" r="3.16667" stroke="#0B2027" stroke-width="2"/>
                            <circle cx="14.7502" cy="30.0833" r="3.16667" stroke="#0B2027" stroke-width="2"/>
                            <path d="M8.41683 22.1667H17.9168V11.0834M17.9168 11.0834V14.25H6.8335V28.0834C6.8335 29.1879 7.72893 30.0834 8.8335 30.0834H11.5835M17.9168 11.0834H24.2502L31.7915 17.1165C32.0287 17.3062 32.1668 17.5935 32.1668 17.8973V20.5834M27.4168 14.25H25.8335V20.5834H32.1668M32.1668 20.5834V28.0834C32.1668 29.1879 31.2714 30.0834 30.1668 30.0834H29.0002M22.6668 30.0834H17.9168" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p>Order is being delivered</p>
                </div>
                <hr>
                <div class="icon_status">
                    <div>
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.8335 31.6667H30.1668C30.9953 31.6667 31.6668 30.9951 31.6668 30.1667V12.9028C31.6668 12.7475 31.6307 12.5944 31.5613 12.4556L29.0529 7.43895C28.7142 6.76138 28.0216 6.33337 27.2641 6.33337H10.7362C9.97869 6.33337 9.28616 6.76138 8.94738 7.43895L6.43907 12.4556C6.36964 12.5944 6.3335 12.7475 6.3335 12.9028V30.1667C6.3335 30.9951 7.00507 31.6667 7.8335 31.6667Z" stroke="#0B2027" stroke-width="2" stroke-linecap="round"/>
                            <path d="M7.9165 12.6666H30.0832" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.8333 6.33337L14.25 12.6667V22.1667L19 19L23.75 22.1667V12.6667L22.1667 6.33337" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                    <p>Order has arrived</p>
                </div>
            </div>
        </div>
        <div id="summary">
            <h1>Order Summary</h1>
            <div id="order-list">
                <?php
                    if(empty($_SESSION["order"])){
                        echo
                        "<p id='no-order'>No Orders found...</p>";
                    }
                    else{
                        foreach($_SESSION["order"] as $item){
                            $product = $item->product_name;
                            $description = $item->description;
                            $price = (float)$item->price;
                            $quantity = (int)$item->quantity;
                            $image = $item->image;

                            echo
                            "<div class='order-card'>
                                <div class='image-container'>
                                    <img class='product-iamge' src=$image>
                                </div>
                                <div class='details-container'>
                                    <h1 class='name'>
                                        $product
                                    </h1>
                                    <p class='description'>$description</p>
                                    <div class='quantity-product'>
                                        <div class='quantity'>
                                            $quantity
                                        </div>
                                        <div class='product'>
                                            Php ".sprintf("%.2f", $price)."
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                ?>
            </div>
            <?php
                if(isset($_SESSION["order"])){
                    echo
                    "<div id='summary_total'>   
                        <h1>TOTAL: <span style='color:var(--primary_blue)'>Php ".$_SESSION["total_price"]."</span></h1>
                    </div>";
                }
                else{
                    echo
                    "<style>
                        #order-list{ margin-bottom: 50px; }
                    </style>";
                }
            ?>
        </div>
    </div>
    <?php include('./footer.php') ?>
</body>
</html>