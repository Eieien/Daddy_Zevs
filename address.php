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
            <div id="address-card">
                <div class="name">
                    <h2>John Doe <span class="phone-num">(02) 8123 4567</span></h2>
                    <img src="./images/icons/Close_Circle.svg">
                </div>
                <div class="address">456 Pandesal Ave., Brgy. Mabuhay, Makati City, Metro Manila, 1200</div>
                <button id="change-address" class="change-address">Edit Address</button>
            </div>
            <div id="add-address">
                <img src="./images/icons/Add-circle.svg">
                <div id="add-address">Add Address</div>
            </div>

            <form id="edit-address" class="hidden">
                <h2>Contact</h2>
                <div class="contact">
                    <div>
                        <p>Full Name</p>
                        <input type="text" class="field" placeholder="e.g. John Doe">
                    </div>
                    <div>
                        <p>Phone Number</p>
                        <input type="tel" class="field" placeholder="+63">
                    </div>
                </div>
                <h2>Address</h2>
                <div class="address">
                    <div>
                        <p>Region, Province City, Barangay</p>
                        <input class="field" placeholder="e.g. Region 7, Cebu City, Brgy. Camputhaw" >
                    </div>
                    <div>
                        <p>Postal Code</p>
                        <input class="field" placeholder="e.g. 6000" >
                    </div>
                    <div>
                        <p>Street Name, Building, House No.</p>
                        <input class="field" placeholder="e.g. Pandesal St. Yosemite Apts. House No. 2" >
                    </div>
                </div>
                <div class="button-container">
                    <button class="cancel" type="submit">Cancel</button>
                    <button class="submit" type="submit">Submit</button>

                </div>
            </form>
        
        </section>
    </main>


    <script>
        document.getElementById("add-address").addEventListener('click', () => {
            let addressform = document.getElementById("edit-address");
            addressform.classList.remove('hidden');
            document.getElementById("add-address").classList.add('hidden');
        })

        document.getElementById("change-address").addEventListener('click', () => {
            let addressform = document.getElementById("edit-address");
            addressform.classList.remove('hidden');
            document.getElementById("add-address").classList.add('hidden');
            document.getElementById("address-card").classList.add('hidden');
        })
    </script>
</body>
</html>