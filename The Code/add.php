<?php
session_start();
if (!isset($_SESSION['loggedInUserEmailAdmin']))
{
    header('location: indexCMS.html');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta charset="utf-8">
          <title>Content Management System</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">    
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript">var cmpIsOn = true;</script></head>
    <body>
      
<!------------------------------------------------Navbar----------------------------------------------------------------------------------->
        
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="indexCMS.html">Home</a></li>
                <li><a href="add.php">Manage Products</a></li>
                <li><a href="manage.php">Manage Orders</a></li> 
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li data-toggle="dropdown"><a><?php echo $_SESSION['loggedInUserEmailAdmin']; ?><span class="caret"></span></a></li>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
              </ul>
            </div>
          </div>
        </nav>
        
<!------------------------------------------------Navbar----------------------------------------------------------------------------------->
    
<!------------------------------------------------Addpage Content-------------------------------------------------------------------------->
        
        <h1 style="text-align: center; font-family: Harabara;">Manange Products</h1>
        <br>
        <div class="container-fluid" id="addContainer">

            
            <!-- Button to add a new product to database -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProduct"><span class="glyphicon glyphicon-plus"></span>Add New Product</button>
            
            <!-- Modal to add new products -->
            <div class="modal fade" id="addProduct" role="dialog">
                <div class="modal-dialog">
                    
                    <!-- Modal Content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 style="font-family:Harabara; text-align:center">Add New Product</h1>
                        </div>
                        
                        <form class="form-horizontal" action="add_product.php" method="post">
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Image URL</label>  
                                    <div class="col-md-7">
                                        <input name="image_url" type="text" placeholder="https://www.flightclub.com/" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>  
                                    <div class="col-md-7">
                                        <input name="name" type="text" placeholder="Name Of Product" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Description</label>  
                                    <div class="col-md-7">
                                        <input name="description" type="text" placeholder="Description" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Keywords</label>  
                                    <div class="col-md-7">
                                        <input name="keywords" type="text" placeholder="eg. White, Nike, Air max" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Size</label>  
                                    <div class="col-md-7">
                                        <input name="size" type="text" placeholder="etc. 8 UK" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Price</label>  
                                    <div class="col-md-7">
                                        <input name="price" type="text" placeholder="£150" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Stock</label>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <input name="stock_count" class="form-control" placeholder="50" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Available Sizes</label>  
                                    <div class="col-md-7">
                                        <input name="available_sizes" type="text" placeholder="eg.4.5,6,7" class="form-control input-md">
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>       
            
            <button class="btn btn-primary" data-toggle="modal" data-target="#editProduct"><span class="glyphicon glyphicon-edit"></span>Edit Product</button>
            
            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProduct" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 style="font-family:Harabara;text-align:center">Enter the name of the product you would like to edit:</h1>
                        </div>
                        <form class="form-horizontal" action="product_update_forms.php" method="post">  
                            <div class="modal-body">
                                <div class="col-md-10">
                                    <input name="search" type="text" class="form-control input-md" placeholder="e.g. Yeezy Boost 350">
                                </div>
                                <button type="Submit" class="btn btn-success">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Delete Product button -->
            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProduct"><span class='glyphicon glyphicon-remove'></span>Delete Product</button>
            
            <!-- Delete Product Modal -->
            <div class="modal fade" id="deleteProduct" role="dialog">
                <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 style="font-family:Harabara;">Enter the id of product you want to delete:</h2>
                        </div>
                        
                        <div class="modal-body">
                            <form action="delete_products.php" method="post">
                                <div class="col-md-10" >
                                    <input name="id" type="text" placeholder="Enter ID of product" class="form-control input-md">
                                 </div>
                                <button type="submit" class="btn btn-danger settings">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- View Products Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image Url</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Keywords</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Available</th>
                    </tr>
                </thead>
                <!-- Script to view products in the database -->
                <?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$products = $db
    ->products
    ->find();

//Output data
foreach ($products as $document)
{
    echo "<tr>
                                <td>" . $document['_id'] . "</td>
                                <td>" . $document['image_url'] . "</td>
                                <td>" . $document['name'] . "</td>
                                <td>" . $document["description"] . "</td>
                                <td>" . $document['keywords'] . "</td>
                                <td>" . $document["size"] . "</td>
                                <td>£" . $document['price'] . "</td>
                                <td>" . $document['stock_count'] . "</td>
                                <td>" . $document['available_sizes'] . "</td>
                            </tr>";
    echo '</tbody>';
}

?>
            </table>
        </div>
        
<!------------------------------------------------Manage Page Ends Here---------------------------------------------------------------->
        
<!------------------------------------------------Footer----------------------------------------------------------------------------------->

        <footer class="container-fluid text-center">
          <p>Copyright © 2021 Sneakerz-4U</p>
        </footer>
        
<!------------------------------------------------Footer----------------------------------------------------------------------------------->
</body>
</html>
