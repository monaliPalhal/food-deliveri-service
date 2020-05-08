<?php

session_start();
error_reporting(0);
$db = "foss";
$dbhostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
$db_selected = mysqli_select_db($link,$db );
$grandtotal = 0;
$id = 0;
if(isset($_POST['placeorder'])) {
  $fnaobno=$_POST['flatbldgnumber'];
  $street=$_POST['streename'];
  $area=$_POST['area'];
  $lndmark=$_POST['landmark'];
  $city=$_POST['city'];
  $userid=$_SESSION['fosuid'];
  $orderno= mt_rand(100000000, 999999999);
  $query="update tblorders set OrderNumber='$orderno',IsOrderPlaced='1' where UserId='$userid' and IsOrderPlaced is null;";
  $query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city');";

  $result = mysqli_multi_query($link, $query);
  if ($result) {

    echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';
    echo "<script>window.location.href='ordersummary.php'</script>";

  }

}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Food Ordering System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Food Ordering System</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/animsition.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">

<style> 
    .search-cat {
        size: 20px;
    }
    h6 {
        font-size:20px;
    }

    .form-control {
        border: 0.1px solid #eaebeb;
        border-radius: 1px;
    }

    .disp {
       padding: 10px 120px;
       margin: 5px 0;
       display: inline-block;
       color: black;
 

    }
    input[type=text] {
        width: 120%;
        padding: 12px 20px;
        margin: 20px 0;
        color: black;
        display: inline-block;
        border: 3px solid #ccc;
        box-sizing: border-box;
    }
    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 30%;
    }

    h6{
        color:yellow;
    }
    img {
        border-image: 50 round;
    }
    .form-control {
      border: 0.1px solid #eaebeb;
      border-radius: 1px;
      size: 20px;
    }
    body{
    	color: black;
    }
    .side{
    	background: 
    	padding: 42px 20px;
        margin: 60px 20;

    }
  
   


</style>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <img src="food-picky-logo.png" class="img-circle" alt="Cinque Terre">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="right-float" ><a href="index.php">Home</a></li>
      <li class = "right-float"><a href="registration.php">Sign Up</a></li>
      <li><a href="login.php">Sign in</a></li>
      <li><a href="cart.php">Cart</a></li>
    </ul>

  </div>
</nav>
<h3>Order Summary</h3>
<div class = op>
  <?php 
      $userid= $_SESSION['fosuid'];
      $query=mysqli_query($link,"select tblfood.Image,tblfood.ItemName,tblfood.ItemDes,tblfood.ItemPrice,tblfood.ItemQty,tblorders.FoodId from tblorders join tblfood on tblfood.ID=tblorders.FoodId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
      $num=mysqli_num_rows($query);
      if($num>0) {
      while ($row=mysqli_fetch_array($query)) { ?>
        <div class = "disp">
          <a class="restaurant-logo pull-left" href="#">
            <img src="<?php echo $row['Image']?>" width="200" height="150"></a>
            <br>
            <br>
            <br>
            <?php
              echo $row['ItemName'] . "<br>";
              $id =  $row['FoodId'];
              echo $row['ItemPrice'] . '$' . "<br>";
              $grandtotal += $row['ItemPrice'];
            ?>
            <form action="delete.php" method="post">
     			<input type="hidden" name="cart_id" value = <?php echo $id?> >
    			<button type='submit' class="btn btn-danger" value="Cancel">Cancel</button>
			</form>

        </div>
        
      <?php }
      }
    ?>
</div>
<div class = "side_bar">
 <form method="post">
                    <div class="col-xs-12 col-md-12 col-lg-3">
                        <div class="sidebar-wrap">
                            <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Your Shopping Cart
                              </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">
                                 
                                        <div class="form-group row no-gutter">
                                            <div class="col-lg-12">
<input type="text" name="flatbldgnumber"  placeholder="Flat or Building Number" class="form-control" required="true">
<input type="text" name="streename" placeholder="Street Name" class="form-control" required="true">       
<input type="text" name="area"  placeholder="Area" class="form-control" required="true">
<input type="text" name="landmark" placeholder="Landmark if any" class="form-control"> 
<input type="text" name="city" placeholder="City" class="form-control">  
<input type="text" name="pincode" placeholder="Pincode" class="form-control">            
                                          
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                               </div>
                          
                            </div>
                        </div>
     
<h4 class="value"><strong><?php echo 'Total  :' . $grandtotal . '$';?></strong></h4>
<p>Free Shipping</p>
<button  type="submit" name="placeorder" class="btn theme-btn btn-lg">Place order</button>
              </div>
                    <!-- end:Right Sidebar -->
                </div>
</div> 
</form>
</div> 
</body>
</html>

