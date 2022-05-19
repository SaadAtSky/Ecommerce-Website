<?php
 //Include libraries
 require __DIR__ . '/vendor/autoload.php';
    
 //Create instance of MongoDB client
 $mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    'name' => $search_string
 ];

//Find all of the products that match  this criteria
$cursor = $db->products->find($findCriteria);

//Output the results as forms
foreach ($cursor as $prod){
    echo '<form action="save_product.php" method="post">';
    echo '<div class="form-group">
            <div class="col-md-7">
                <input type="hidden" name="_id" value="' . $prod['_id'] . '" required> 
            </div>';
     echo '<div class="form-group">
            <label class="col-md-4 control-label">Image URL</label>
            <div class="col-md-7">
                <input type="text" name="image_url" value="' . $prod['image_url'] . '" required> 
            </div>';
     echo '<div class="form-group">
            <label class="col-md-4 control-label">Name</label>
            <div class="col-md-7">
                <input type="text" name="name" value="' . $prod['name'] . '" required>
            </div>';
     echo '<div class="form-group">
            <label class="col-md-4 control-label">Description</label>
            <div class="col-md-7">
                <input type="text" name="description" value="' . $prod['description'] . '" required>
            </div>';
    echo '<div class="form-group">
            <label class="col-md-4 control-label">Keywords</label>
            <div class="col-md-7">
                <input type="text" name="keywords" value="' . $prod['keywords'] . '" required>
            </div>';
    echo '<div class="form-group">
            <label class="col-md-4 control-label">Size</label>
            <div class="col-md-7">
                <input type="text" name="size" value="' . $prod['size'] . '" required>
            </div>';
    echo '<div class="form-group">
            <label class="col-md-4 control-label">Price</label>
            <div class="col-md-7">
                <input type="text" name="price" value="' . $prod['price'] . '" required>
            </div>';
    echo '<div class="form-group">
            <label class="col-md-4 control-label">Stock</label>
            <div class="col-md-7">
                <input type="text" name="stock_count" value="' . $prod['stock_count'] . '" required>
            </div>';
    echo '<div class="form-group">
            <label class="col-md-4 control-label">Available Sizes</label>
            <div class="col-md-7">
                <input type="text" name="available_sizes" value="' . $prod['available_sizes'] . '" required>
            </div>';
    echo '<input type="submit">';
    echo '</form><br>';
}


 