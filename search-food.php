<?php
session_start();
error_reporting(0); //error is not reported
$db = "foss";
$dbhostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
$db_selected = mysqli_select_db($link,$db );
if(isset($_POST['submit']))
{
$foodid=$_POST['foodid'];
$userid= $_SESSION['fosuid'];
$searchdata = $_POST['searchdata'];
$query=mysqli_query($link,"insert into tblorders(UserId,FoodId) values('$userid','$foodid') ");
if($query)
{
    echo "<script>alert('Food has been added in to the cart');</script>"; 
} 
else {
  echo "<script>alert('Something went wrong.');</script>";      
}
}
$jquery = "select * from  tblcategory";
$jquery = mysqli_query($link,$jquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Food Ordering System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style> 
    .search-cat {
        size: 20px;
    }
    h6 {
        font-size:20px;
    }
    .jumbotron {
            padding: 200px 0px;
            background-color:transparent;
            font-family: Montserrat, sans-serif;
        }

    .form-control {
        border: 0.1px solid #eaebeb;
        border-radius: 1px;
    }

    input[type=text] {
        width: 22%;
        padding: 18px 20px;
        margin: 15px 0;
        color: white;
        display: block;
        border: 3px solid #ccc;
        box-sizing: border-box;
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


</style>
</head>
<body>
    <nav class="navbar navbar-inverse">
         <img src="food-picky-logo.png" class="img-circle" alt="Cinque Terre">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li class = "right-float"><a href="registration.php">Sign Up</a></li>
      <li><a href="login.php">Sign in</a></li>
      <li><a href="cart.php">Cart</a></li>
    </ul>

  </div>
</nav>
    <div class = "side_bar">
        <form name="search" method="post" action="header('index.php');">
        <div class="main-block"> </div>
            <input type="text" class="form-control search-field" placeholder="Search your favorite food" name="searchdata" id="searchdata" > 
        </div>
    </form> 
    </div>
    <div class = "disp">
    <?php echo "<br>";
        echo "<br>"; ?>
        <?php
        $searchdata=$_POST['searchdata'];
        $sql = "SELECT * FROM tblfood where ItemName like '%$searchdata%' ";
        $res_data = mysqli_query($link,$sql);
        $cnt=1;
        while($row = mysqli_fetch_array($res_data)) {
        ?>
             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                <div class="food-item-wrap">
                    <div class="figure-wrap bg-image"> <img src="<?php echo $row['Image'];?>" width="300" height="180" border="5">
                        </div>
                            <div class="content">
                                <div class="product-name"><?php echo substr($row['ItemDes'],0,50);?></div>
                                <div class="price-btn-block"> <span class="price">Rs. <?php echo $row['ItemPrice'];?></span>

                            <form method="post"> 
                                <input type="hidden" name="foodid" value="<?php echo $row['ID'];?>">   
                                <button type="submit" name="submit" class="btn btn-success pull-center">Order Now</button>
                            </form> 
                         </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</body>
</html>
