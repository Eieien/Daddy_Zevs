<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="./styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./styles/settings.css?v=<?php echo time(); ?>">
    <title>Address</title>
</head>
<body>
    <?php include('./user_nav.php') ?>
    
    <main class="content" style="width: 75vw;">
        <?php include('./setting_nav.php') ?>
        <section id="setting">
            <h1>My Address</h1>
            <?php
            if(isset($_SESSION["address"])){
                echo
                "<div id='address-card'>
                    <div class='name'>
                        <h2>".$_SESSION["fname"]." ".$_SESSION["lname"].
                        "<span class='phone-num'> ".$_SESSION["phone_no"]."</span></h2>
                        <form action='./data/user-data.php' method='post'>
                            <button id='delete-address' name='del-add'>
                                <img src='./images/icons/Close_Circle.svg'>
                            </button>
                        </form>   
                    </div>
                    <div class='address'>".$_SESSION["address"]."</div>
                    <button id='add-address' class='change-address'>Edit Address</button>
                </div>";
            } else {
                echo
                "<div id='add-address'>
                    <img src='./images/icons/Add-circle.svg'>
                    <div id='add-address'>Add Address</div>
                </div>";
            }
            ?>

            <form id="edit-address" class="hidden" action="./data/user-data.php" method="post">
                <h2>Contact</h2>
                <div class="contact">
                    <div>
                        <p>Full Name</p>
                        <input type="text" class="field" value="<?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>" disabled>
                    </div>
                    <div>
                        <p>Phone Number</p>
                        <input name="phone" type="tel" class="field" placeholder="+63">
                    </div>
                </div>
                <h2>Address</h2>
                <div class="address">
                    <div>
                        <p>Region, Province City, Barangay</p>
                        <input name="add2" class="field" placeholder="e.g. Region 7, Cebu City, Brgy. Camputhaw" >
                    </div>
                    <div>
                        <p>Postal Code</p>
                        <input name="add3" class="field" placeholder="e.g. 6000">
                    </div>
                    <div>
                        <p>Street Name, Building, House No.</p>
                        <input name="add1" class="field" placeholder="e.g. Pandesal St. Yosemite Apts. House No. 2" >
                    </div>
                </div>
                <div class="button-container">
                    <button class="cancel" type="submit" name="cancel-add-edit">Cancel</button>
                    <button class="submit" type="submit" name="edit-add">Submit</button>
                </div>
            </form>
        
        </section>
    </main>


    <script>
        document.getElementById("add-address").addEventListener('click', () => {
            let addressform = document.getElementById("edit-address");
            addressform.classList.remove('hidden');
            document.getElementById("add-address").classList.add('hidden');
            document.getElementById("address-card").classList.add('hidden');
        })
    </script>
</body>
</html>