<?php   session_start();  ?>
<?php
 
      if(!isset($_SESSION['email']))    {
    
          header("Location:index.html");
       
       }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products List</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="loadPage()">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">E deals</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="productList.php">ProductList</a>
                    </li>
                    <li>
                        <a href="topfive.php">Top Five</a>
                    </li>
                    <li>
                        <a href="signout.php">SignOff</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
               	 	<?php 
               	 	$servername = "localhost";
			$username = "saikris1_user";
			$password = "onlineMarketPlace";
			$dbname = "saikris1_onlineMarketPlace";
			$conn = new mysqli($servername, $username, $password, $dbname);	
			$sql="SELECT DISTINCT owner FROM product_info";
			if ($conn->connect_error) {
    				die("Connection failed: " . $conn->connect_error);
			}
			$result = $conn->query($sql);
			$shopCategoryString="";
			$productcatergory="";
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	$productName=$row["owner"];
				$productcatergory=$row["owner"].'-Products';
				$shopCategoryString=$shopCategoryString.' <a href="#" class="list-group-item productcategory" id="'.$productName.'" >'.$productcatergory.'</a>';
			    }
			}
				echo $shopCategoryString;
			$conn->close(); 
			?> 
                </div>
            </div>

            <div class="col-md-9">

               <h1 id="productListHeading"></h1>

                <div class="row">
		<div id="productsList">
                    
                </div>

            </div>

        </div>
</div>
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; Copyright reserved to E deals </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/productListJS.js"></script>

</body>

</html>
