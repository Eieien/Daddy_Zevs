<?php 
    session_start();

    if(isset($_GET["product-info"])){
        $item_json = $_GET["product-info"];
        $item = json_decode($item_json);

        $id = $item->product_id;
        $product = $item->product_name;
        $description = $item->description;
        $price = $item->price;
        $image = $item->image;
        $stock = $item->stock;
    }
?>
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
        <a href="./listOfProducts.php"><div class="back">
            <img src="../images/icons/Back to home.svg"> Go back
        </div></a>
        <div class="product-grid">
            <div id="product-detail">
                <h3>Product Details</h3>
                <div class="product-image-container">
                    <img id="product-image" src=<?php echo ".".$image; ?>>
                </div>
                <h1 class="product-name"><?php echo $product; ?></h1>
                <h2 class="product-price"><?php echo "Php ".sprintf("%.2f", $price); ?></h2>
                <p class="product-description">
                    <?php echo $description; ?>
                </p>
            </div>
            <div id="product-form-container">
                <div class="heading">
                    <div class="name-stock">
                        <h2>Edit Product</h2>
                        <p>Stock: <?php echo $stock; ?></p>
                    </div>
                    <div class="delete">
                        <img src="../images/icons/Trash_Full.svg">
                        <p>Delete Product</p>
                    </div>
                </div>
                <form action="../data/admin-data.php" method="post" id="product-edit-form">
                    <!-- Just add values their values inside the input from the db -->
                    <input name="product-id" type="hidden" value=<?php echo $id; ?> >
                    <div class="name-price">
                        <div>
                            <p>Product Name</p>
                            <input name="product-name" type="text" placeholder="e.g. Bread"> 
                        </div>
                        <div>
                            <p>Price (in php)</p>
                            <input name="product-price" type="number" min="0" placeholder="e.g. 200php"> 
                        </div>
                    </div>
                    <div>
                        <p>Product Description</p>
                        <textarea name="product-desc" class="description"></textarea>
                    </div>
                    <div>
                        <!-- <p>Product Photo</p>
                        <input type="file" accept="image/*" placeholder="Place Image here"> -->
                        <p>Stock</p>
                        <input name="stock" type="number" min="0" placeholder="e.g. Bread"> 
                    </div>
                    <div class="buttons-container">
                        <button name="cancel-edit" type="submit" class="cancel">Cancel</button>
                        <button name="submit-edit" type="submit" class="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>
</html>