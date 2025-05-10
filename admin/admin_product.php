<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/edit_product.css?v=<?php echo time(); ?>">

</head>
<body>
    <?php 
        include "admin_header.php";
    ?>

    <main class="content">
        <a href="#"><div class="back">
            <img src="../images/icons/Back to home.svg"> Go back
        </div></a>
        <div class="product-grid">
            <div id="product-detail">
                <h3>Product Details</h3>
                <div class="product-image-container">
                    <img id="product-image" src="../images/products/2.svg">
                </div>
                <h1 class="product-name">Boston Cream Donut</h1>
                <h2 class="product-price">Php 25.00</h2>
                <p class="product-description">
                    A yeast donut filled with creamy custard and tapped with a rich chocolate glaze
                </p>
            </div>
            <div id="product-form-container">
                <div class="heading">
                    <div class="name-stock">
                        <h2>Edit Product</h2>
                        <p>Stock: </p>
                    </div>
                    <div class="delete">
                        <img src="../images/icons/Trash_Full.svg">
                        <p>Delete Product</p>
                    </div>
                </div>
                <form id="product-edit-form">
                    <!-- Just add values their values inside the input from the db -->
                    <div class="name-price">
                        <div>
                            <p>Product Name</p>
                            <input type="text" placeholder="e.g. Bread"> 
                        </div>
                        <div>
                            <p>Price (in php)</p>
                            <input type="number" placeholder="e.g. 200php"> 
                        </div>
                    </div>
                    <div>
                        <p>Product Description</p>
                        <textarea class="description">
                            
                        </textarea>
                    </div>
                    <div>
                        <p>Product Photo</p>
                        <input type="image" placeholder="Place Image here">
                    </div>
                    <div class="buttons-container">
                        <button type="submit" class="cancel">Cancel</button>
                        <button type="submit" class="submit">Submit</button>
    
                    </div>
    
                </form>
            </div>

        </div>
    </main>
</body>
</html>