<script>
var btns = document.getElementsByClassName("btn");
for(let i = 0; i < btns.length; i++){
    btns[i].addEventListener("click", function(){
        let current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

function createProductCard(item){
    let productCard = document.createElement('div');
    productCard.className = "product-card";
    productCard.id = item.product_id;

    productCard.innerHTML = 
    `<div class="out-of-stock">
        <div class="out-of-stock-block">
            <h1>Out Of Stock</h1>
        </div>
    </div>
    <div class="details">
        <div class="favorite-icon">
            <svg class="add-to-favorite" width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.2752 16.5632L16.5 27.1667L26.7248 16.5632C27.8614 15.3844 28.5 13.7857 28.5 12.1187C28.5 8.64741 25.7864 5.83334 22.4391 5.83334C20.8316 5.83334 19.29 6.49555 18.1534 7.67429L16.5 9.3889L14.8466 7.67429C13.71 6.49555 12.1684 5.83334 10.5609 5.83334C7.21356 5.83334 4.5 8.64741 4.5 12.1187C4.5 13.7857 5.13856 15.3844 6.2752 16.5632Z" stroke="#0B2027" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <div class="image-container">
            <img src=${item.image}>
        </div>
        
        <div class="details-container">
            <div class="product-name">
                ${item.product_name}
            </div>
            <div class="price-add">
                <div class="price">
                    Php ${Number(item.price).toFixed(2)}
                </div>
                <button class="add-to-cart">
                    <svg class="add" width="40" height="30" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 11.2917V26.7084M10.2084 19.0001H24.7917" stroke="#FBFCEC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>`;

    let item_json = JSON.stringify(item);
    productCard.querySelector("button[class='add-to-cart']").onclick = () => getProduct(item_json);

    // for featured
    <?php
        if(isset($_SESSION["email"])){
            echo
            "if(item.product_id == 4) document.getElementById(\"feature-button\").onclick = () => getProduct(item_json);";
        }
    ?>

    let heart = productCard.querySelector("svg[class='add-to-favorite']");
    <?php
        if(isset($_SESSION["email"]))
            echo "heart.onclick = () => favoriteItem(item.product_id);";
    ?>

    const xhttp = new XMLHttpRequest();
    xhttp.onload = () => {
        var fav = Number(xhttp.responseText);

        if(fav){
            heart.style.fill = "var(--accent_orange)";
            heart.querySelector("path").style.stroke = "var(--accent_orange)";
        }
        else{
            heart.style.fill = "none";
            heart.querySelector("path").style.stroke = "var(--primary_blue)";
        }
    }
    xhttp.open("GET", "./data/user-data.php?"+
                "product_id=" + item.product_id);
    xhttp.send();

    document.getElementById("product-list").appendChild(productCard);
}
    
function displayProducts(type){
    document.getElementById("product-list").innerHTML = ""; // clear list 1st

    fetch("./data/json/products-json.php")
        .then(response => response.json())
        .then(products => products.forEach((item) => {
            switch(type){
                case 1:
                    if(item.category === "Bread") createProductCard(item);
                    break;
                case 2:
                    if(item.category === "Cake") createProductCard(item);
                    break;
                case 3:
                    if(item.category === "Cookies") createProductCard(item);
                    break;
                case 4:
                    if(item.category === "Filipino Classics") createProductCard(item);
                    break;
                case 5:
                    if(item.category === "Cupcakes") createProductCard(item);
                    break;
                case 6:
                    if(item.category === "Others") createProductCard(item);
                    break;
                case 7:
                    if(item.category === "Donut") createProductCard(item);
                    break;
                case 8:
                    if(item.category === "Tarts") createProductCard(item);
                    break;
                case 9:
                    if(item.category === "Pies") createProductCard(item);
                    break;
                case 10:
                    if(item.category === "Croissants") createProductCard(item);
                    break;
                case "favorite":
                    const favRequest = new XMLHttpRequest();
                    favRequest.onload = () => {
                        var fav = Number(favRequest.responseText);
                        
                        if(fav) createProductCard(item);
                    }
                    favRequest.open("GET", "./data/user-data.php?"+
                                "product_id=" + item.product_id);
                    favRequest.send();
                    break;
                case "search":
                    const searchRequest = new XMLHttpRequest();
                    searchRequest.onload = () => {
                        var result = Number(searchRequest.responseText);
                        
                        if(result) createProductCard(item);
                    }
                    searchRequest.open("GET", "./data/user-data.php?"+
                                "product_ID=" + item.product_id +"&"+
                                "search-input=" + searchInput);
                    searchRequest.send();
                    break;
                default:
                    createProductCard(item);
            }
        }))
        .catch(error => console.error('Error:', error));
}

function favoritesActive(){
    let current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    btns[12].className += " active";
}

<?php
    if(isset($_SESSION["check_fav"])){
        echo 
        "favoritesActive();
        displayProducts('favorite');";
        unset($_SESSION["check_fav"]);
    } else 
    if(isset($_SESSION["search"])){
        echo 
        "let searchInput = '".$_SESSION["search"]."';
        displayProducts('search');";
        unset($_SESSION["search_result"]);  // empties prev search
        unset($_SESSION["search"]);
    } else {
        echo "displayProducts();";
    }
?>

function getProduct(item){
    document.querySelector("input[name='product-info']").value = item;
    document.getElementById("product-form").submit();
}

function favoriteItem(product_id){
    const heart = document.getElementById(product_id).querySelector("svg[class='add-to-favorite']");
    const fill = heart.querySelector("path");
    let checkFav = false;

    if(heart.style.fill === "none"){
        heart.style.fill = "var(--accent_orange)";
        fill.style.stroke = "var(--accent_orange)";
        heart.addEventListener("mouseleave", () => {
            fill.style.stroke = "var(--accent_orange)";
        })
        checkFav = true;
    }
    else{
        heart.style.fill = "none";
        fill.style.stroke = "var(--primary_blue)";
        heart.addEventListener("mouseenter", () => {
            fill.style.stroke = "var(--accent_orange)";
        })
        heart.addEventListener("mouseleave", () => {
            fill.style.stroke = "var(--primary_blue)";
        })
        checkFav = false;
    }

    // saves favorites to server/db
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./data/user-data.php?"+
                "id=" + product_id +"&"+
                "fav=" + checkFav);
    xhttp.send();
}
</script>