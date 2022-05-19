"use strict";

//Globals
window.onload = loadBasket;

//Get basket from session storage or create one if it does not exist
function getBasket() {
    let basket;
    if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
        basket = [];
    }
    else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

//Displays basket in page.
function loadBasket() {
    let basket = getBasket();//Load or create basket

    //Build string with basket HTML
    let htmlStr = "<form action='confirm.php' method='post'>";
    let prodIDs = [];
    for (let i = 0; i < basket.length; ++i) {
        htmlStr += "Product name: " + basket[i].name + " id: " + basket[i].id + " quantity: " + basket[i].quantity + " size: " + basket[i].size + " description: " + basket[i].description + " price: £" + basket[i].price + "<br>";
        prodIDs.push({ name: basket[i].name, id: basket[i].id, quantity: basket[i].quantity, size: basket[i].size, description: basket[i].description, price: basket[i].price });//Add to product array
    }
    //Add hidden field to form that contains stringified version of product ids.
    htmlStr += "<input type='hidden' name='prodIDs' value='" + JSON.stringify(prodIDs) + "'>";

    //Add checkout and empty basket buttons along with shipping address field
    htmlStr += "<input type='text' name='shipping_address' placeholder='Shipping Address'>";
    htmlStr += "<input type='submit' value='Confirm Order'></form>";
    htmlStr += "<br><button onclick='emptyBasket()'>Empty Basket</button>";

    //Display nubmer of products in basket
    document.getElementById("basketDiv").innerHTML = htmlStr;
}

//Adds an item to the basket
function addToBasket(productName, productID, quantity, productSize, productDescription, productPrice) {
    let basket = getBasket();//Load or create basket

    //Add product to basket
    basket.push({ name: productName, id: productID, quantity: quantity, size: productSize, description: productDescription, price: productPrice });

    //Store in local storage
    sessionStorage.basket = JSON.stringify(basket);

    //Display basket in page.
    loadBasket();
}

//Deletes all products from basket
function emptyBasket() {
    sessionStorage.clear();
    loadBasket();
}


