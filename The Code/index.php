<!DOCTYPE html>
<html lang="en">

<head>
    <title>SneakerZ-4U</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <div class="theName">
                <a href="index.php">SneakerZ-4U</a>
            </div>
            <li class="nav-item">
                <div class="wrap">
                <!--search bar-->
                <form class="example" action="find_product.php" method="get">
                    <input type="text" placeholder="Search Nike and Adidas" name="name" method="get">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                </div>
            </li>
            <!--Navigation bar headings-->
            <div class="headings">
                <li class="nav-item">
                    <a class="nav-link" href=" register.html">My Account</a>
                </li>
            </div>
            <li class="nav-item">
                <a class="nav-link" href="update-customer.html">Edit Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" logout_customer.php">logout</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=" orders.php">Orders</a>
            </li>
            <li class="nav-item">
            </li>
        </ul>
    </nav>

    <!--carousel-->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/images/sale1.jpg" alt="Los Angeles">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/sale2.png" alt="Chicago">

            </div>
            <div class="carousel-item">
                <img src="/assets/images/bigBrands.jpg" alt="New York">
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <br><br><br>
    <!--footer-->
    <div class="row">
        <div class="col-sm-4">
            <h3><b>Get to Know Us</b></h3>
            <p><a href="#">Social Media</a><br><a href="#">About Us</a></p>
        </div>
        <div class="col">
            <h3><b>Information</b></h3>
            <p><a href="#">FAQS</a><br><a href="#">Return Policy</a></p>
        </div>
        <div class="col">
            <h3><b>Payment Methods</b></h3>
            <p><a href="#">Gift Cards</a><br><a href="#">Top Up Your Account</a></p>
        </div>
    </div>
</body>

</html>