<?php 
    session_start(); 
    if (!isset($_SESSION['loggedInUserEmailAdmin'])) {
        header('location: indexCMS.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
          <title>Content Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">    
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
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
    
<!------------------------------------------------Managepage Content----------------------------------------------------------------------->
        
        <h1 style="text-align: center; font-family: Harabara">Manage Orders</h1>
        <br>
        <div class="container" id="manageContainer">
          <div class="row content">
              <div class="row col-md-12">
                  
                <!-- Delete Order Modal -->  
                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteOrder"><span class='glyphicon glyphicon-remove'></span>Delete Order</button>
                    
                <!-- Delete Product Modal -->
                <div class="modal fade" id="deleteOrder" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 style="font-family:Harabara;">Enter the id of product you want to delete:</h2>
                            </div>

                            <div class="modal-body">
                                <form action="delete_order.php" method="post">
                                    <div class="col-md-10" >
                                        <input name="id" type="text" placeholder="Enter ID of Order" class="form-control input-md">
                                     </div>
                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table to output the current orders -->
                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Email</th>
                            <th>Products</th>
                        </tr>
                    </thead>
                    <?php
                    
                      //Include libraries
                      require __DIR__ . '/vendor/autoload.php';
    
                      //Create instance of MongoDB client
                      $mongoClient = (new MongoDB\Client);
                      
                      //Select a database
                      $db = $mongoClient->ecommerce;
                    
                      //Select a collection
                      $orders = $db->orders->find();
                    
                      //Add the data from database into table

                        foreach($orders as $document){
                            $arr = $document['products'];
                      $products = json_encode($arr);
                          echo 
                            "<tr>
                              <td>" . $document['_id'] . "</td>
                              <td>" . $document['customerEmail'] . "</td>
                              <td>" . $products . "</td>
                             </tr>";
                            echo '</tbody>';
                            
                        }
                        // var_dump($document);
                      
                    ?>
                </table>
            </div>
          </div>
        </div>
        
<!------------------------------------------------Managepage Content Ends Here------------------------------------------------------------->
        
<!------------------------------------------------Footer----------------------------------------------------------------------------------->

        <footer class="container-fluid text-center">
          <p>Copyright © 2021 Sneakerz-4U</p>
        </footer>
        
<!------------------------------------------------Footer----------------------------------------------------------------------------------->

    </body>
</html>