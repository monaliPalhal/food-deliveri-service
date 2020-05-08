<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
  $db = "foss";
  $dbhostname = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
  $db_selected = mysqli_select_db($link,$db );
  $emailcon=$_POST['emailcont'];
  $password=$_POST['password'];
  $query= "SELECT ID FROM tbluser where  Email= '$emailcon' && password = '$password' ";
  $result = mysqli_query($link, $query);
  $ret=mysqli_fetch_array($result);
  if($ret>0){
    echo "ohhhskd";
    $_SESSION['fosuid']=$ret['ID'];
    header('location:index.php');
  }
  else{
    $msg="Invalid Details.";
  }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Food Ordering Managment System</title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 50%;
  align-items: center;
  padding: 12px 20px;
  margin: 20px 0;
  display: block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 15%;
  border-radius: 50%;
}

.container {
  padding: 8px;
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
  
</style>
</head>
<body>
     
  <p style="font-size:20px; color:red" align="center"> 
    <?php if($msg){
                echo $msg;
    }  
  ?> </p>
  <h2 align="center">Login</h2>
  <form action="" name="login" method="post" align = "center">
    <div class="imgcontainer">
       <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
      <div class="container" align="center">
          <input type="text" name="emailcont" id="email"placeholder="Registered Email" required="true" >
 
        <input type="password" id="password" value="" name="password" required="true" placeholder="Password">

        <button type="submit" name="login" class="btn theme-btn"><i class="ft-user"></i>Login</button>
    </div>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <?php echo "<br>"?>
    <a href="registration.php">Forgot password</a>
  </label>
  </div>
  </form>

</body>
</html>