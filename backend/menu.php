<?php 
    include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #product-list{
            display: grid;
            grid-template-areas: "1fr 1fr 1fr 1fr";
            gap: 20px;
            padding: 0 25px 0 25px;
        }
        .product-card{
            background-color: lightgrey;
            padding: 20px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <h1>Menu Page</h1>

    <!-- hidden form -->
    <form action="product.php" method="get" id="product-form">
        <input type='hidden' name='product-info'>
    </form>

    <button onclick="displayProducts(1)">Bread</button>
    <button onclick="displayProducts(2)">Donut</button>
    <button onclick="displayProducts(3)">Cake</button>
    <button onclick="displayProducts(4)">Cookies</button>

    <main id="product-list"></main>

    <script>
        function displayProducts(type){
            document.getElementById("product-list").innerHTML = "";

            fetch("db/products-json.php")
                .then(response => response.json())
                .then(products => products.forEach((item) => {
                    let check = false;

                    switch(type){
                        case 1:
                            if(item.category === "Bread") check = true;
                            break;
                        case 2:
                            if(item.category === "Donut") check = true;
                            break;
                        case 3:
                            if(item.category === "Cake") check = true;
                            break;
                        case 4:
                            if(item.category === "Cookies") check = true;
                            break;
                        default:
                            check = true;
                    }

                    if(check){
                        let productCard = document.createElement('div');
                        productCard.classList.add('product-card');

                        let item_json = JSON.stringify(item);
                        productCard.onclick = () => getProduct(item_json);

                        productCard.innerHTML = 
                        `<p><b>${item.product_name}</b><br>
                            Image Here</p>
                        <p>Php ${Number(item.price).toFixed(2)}</p>`;

                        document.getElementById("product-list").appendChild(productCard);
                    }
                }))
                .catch(error => console.error('Error:', error));
        }
        displayProducts();

        function getProduct(item){
            document.querySelector("input[name='product-info']").value = item;
            document.getElementById("product-form").submit();
        }
    </script>
</body>
</html>
<?php 
    include "footer.html"; 
?>