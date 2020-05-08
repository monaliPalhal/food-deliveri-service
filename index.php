<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['fosaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <style>
    body {
  background-color:#000080;
  color: white;
  font-family: Arial, Helvetica, sans-serif;}
form 
{
  border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
  width: 30%;
  padding: 14px 20px;
  margin: 8px 0;
  color: white;
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
  align-self: center;
  cursor: pointer;
  width: 15%;
}

button:hover {
  opacity: 0.8;
}

.imgcontainer {
  text-align: center;
  margin: 30px 0 12px 0;
}


.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }

}
</style>
</head>

<body class="gray-bg">

    <h2 class="font-bold">Food Ordering System | Admin Login</h2>
        <form class="m-t" role="form" action="" method="post" name="login">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="username" name="username" required=True>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required=True name="password">
             </div>
            <button type="submit" class="btn btn-primary block full-width m-b" name="login">Login</button>

            <a href="forgot-password.php">
            <p>Forgot password?</p>
             </a>
        </form>
                    
</body>

</html>
