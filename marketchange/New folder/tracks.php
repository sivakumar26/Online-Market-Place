<?php   session_start();  ?>
<?php
 
      if(!isset($_SESSION['email']))    {
    
          header("Location:index.html");
       
       }
       else{
       	 $servername = "localhost";
	 $username = "saikris1_user";
	 $password = "onlineMarketPlace";
	$dbname = "saikris1_onlineMarketPlace";
	$conn = new mysqli($servername, $username, $password, $dbname);	
	$sql = "SELECT * FROM product_info WHERE title='tracks'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$productid= $row["productid"];
    				}
			}
	$timestamp=date("F j, Y, g:i a");  
	$emailid=$_SESSION['email'];
	$sql="INSERT INTO tracking VALUES ('".$emailid."','".$productid."','".$timestamp."')";
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){			    	
			
		}
	}				
	$conn->close(); 
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

    <title>products</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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
                <a class="navbar-brand" href="#">E-Deals</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="productList.php">Product List</a>
                    </li>
                    <li>
                        <a href="topfive.php">Top Five</a>
                    </li>
                    <li>
                        <a href="signout.php">Sign Off</a>
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
                <p class="lead">Other Products from the same Seller:</p>
                <div class="list-group">
                    <?php 
               	 	$servername = "localhost";
			$username = "saikris1_user";
			$password = "onlineMarketPlace";
			$dbname = "saikris1_onlineMarketPlace";
			$conn = new mysqli($servername, $username, $password, $dbname);	
			$sql="SELECT * FROM `product_info` WHERE owner='Sivakumar'";
			if ($conn->connect_error) {
    				die("Connection failed: " . $conn->connect_error);
			}
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()){			    	
			    	echo '<a href="'.$row["title"].'.php" class="list-group-item">'.$row["title"].'</a>';
			    }
			}				
			$conn->close(); 
		   ?>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                	
                   <?php 
               	 	$servername = "localhost";
			$username = "saikris1_user";
			$password = "onlineMarketPlace";
			$dbname = "saikris1_onlineMarketPlace";
			$conn = new mysqli($servername, $username, $password, $dbname);	
			$sql="SELECT * FROM `product_info` WHERE title='tracks'";
			$productDesc='<img class="img-responsive" style="width:800px;height:300px;" src="';
			if ($conn->connect_error) {
    				die("Connection failed: " . $conn->connect_error);
			}
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
				$productDesc=$productDesc.$row["lnk"].'" alt=""><div class="caption-full"><h4 class="pull-right">'.$row["cost"].'</h4><h4>'.$row["title"].'</h4><p>'.$row["desc"].'</p></div>';
			    }
			}
				echo $productDesc;
			$conn->close(); 
	 
                   ?> 
                </div>
                    
                <div class="well">

                    <div class="text-left">
                      <p id="productComment">
                      	<form id="commentForm" name="commentForm" onSubmit="return commentSubmit();">
                      	<fieldset class="rating">
				<input  type="radio" name="stars" id="4_stars" value="5" >
        			<label class="stars" for="4_stars">4 stars</label>
        			 <input  type="radio" name="stars" id="3_stars" value="4" >
        			<label class="stars" for="3_stars">3 stars</label>
				<input  type="radio" name="stars" id="2_stars" value="3" >
				<label class="stars" for="2_stars">2 stars</label>  
				<input  type="radio" name="stars" id="1_stars" value="2" >
				<label class="stars" for="1_stars">1 star</label>
				<input  type="radio" name="stars" id="0_stars" value="1" required>
				<label class="stars" for="0_stars">0 star</label>
				
	
			</fieldset class>
                          <div class="form-group">
                            <textarea rows="3" class="form-control" id="reviewText" required placeholder="Please leave your comment here..."></textarea>
                            <input type="hidden" id="emailID" value="<?php echo $_SESSION['email'];?>"></input>
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Leave a Review"></input>
                          </div>
                        </form>
                      </p>    
                    </div>
                   
                   
                   <?php 
               	 	$servername = "localhost";
			$username = "saikris1_user";
			$password = "onlineMarketPlace";
			$dbname = "saikris1_onlineMarketPlace";			
			$conn = new mysqli($servername, $username, $password, $dbname);	
			$sql = "SELECT * FROM product_info WHERE title='tracks'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$productid= $row["productid"];
    				}
			}

			$sql="SELECT * FROM `rating` WHERE productid='".$productid."' AND likes='0' AND dislikes='0'";

 			$commentsList='<hr><div class="row"><div class="col-md-12">';
			if ($conn->connect_error) {
    				die("Connection failed: " . $conn->connect_error);
			}
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$commentsList=$commentsList.'<hr><div class="row"><div class="col-md-12">';
					for($i=1;$i<=$row["rating"];$i++){
						$commentsList= $commentsList.'<span class="glyphicon glyphicon-star"></span>';
						$noStar=$i;
					}
					for($i=0;$i<5-$noStar;$i++){
						$commentsList= $commentsList.'<span class="glyphicon glyphicon-star-empty"></span>';
					}
					$commentsList= $commentsList.$row["EMAIL_ID"].'<span class="pull-right">'.$row["timestamp"].'</span><p>'.$row["comment"].'</p></div></div>';

    				}
			}
			echo $commentsList;
			
 		    ?> 
 		  <p id="new">
                   
                   </p>  
                    

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
                    <p class="lead"> &copy; Copyright reserved to E Deals</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>    
    
    <script src="js/productPageJS.js"></script>
    <link rel='stylesheet' type='text/css' href='css/style-star.css'>

</body>

</html>