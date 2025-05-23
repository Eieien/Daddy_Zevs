<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userbase</title>
    <link rel="stylesheet" href="../styles/constants.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="../styles/header_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/listOfProducts.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        include "admin_header.php";
    ?>

    <!-- hidden form -->
    <form action="./admin_product.php" method="get" id="product-form">
        <input type='hidden' name='product-info'>
    </form>

    <main class="content" style="width: 75vw;">
        <?php
            include "admin_nav.php";
        ?>

        <section>
            <div class="heading-container">
                <h1>Products</h1>
                <div class="create-product">
                    <p>Add New Product</p> 
                    <img src="../images/icons/Add-circle.svg">
                </div>
            </div>

            <div id="product-list"></div>
        </section>
    </main>

    <script>
        let product_list = document.getElementById("product-list");

        fetch("../data/json/products-json.php")
            .then(response => response.json())
            .then(products => products.forEach((product) => {
                let productCard = document.createElement("div");
                productCard.className = "product-card";

                productCard.innerHTML =
                `<div class="out-of-stock-container">   
                    <div id='stock-${product.product_id}' class="hidden"><b>Out of Stock</b></div>
                </div>

                <div class="image-container">
                    <img src=".${product.image}">
                </div>
                
                <div class="details-container">
                    <div class="product-name">
                        ${product.product_name}
                    </div>
                    <div class="price-add">
                        <div class="price">
                            Php ${product.price}.00
                        </div>
                        <button class="edit">
                            Edit
                        </button>
                    </div>
                </div>`;

                let item_json = JSON.stringify(product);
                productCard.querySelector("button[class='edit']").onclick = () => getProduct(item_json);

                product_list.append(productCard);

                if(product.stock === 0){
                    document.getElementById('stock-'+String(product.product_id)).classList.remove("hidden");
                }
            }))

        function getProduct(item){
            document.querySelector("input[name='product-info']").value = item;
            document.getElementById("product-form").submit();
        }
    </script>
</body>
</html>