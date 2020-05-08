<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $db = "foss";
    $dbhostname = "localhost";
    $db = "foss";
    $dbusername = "root";
    $dbpassword = "";
    $link = mysqli_connect($dbhostname,$dbusername,$dbpassword);
    $db_selected = mysqli_select_db($link,$db );
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query = "select Email from tbluser where Email='$email' || MobileNumber='$contno'";
    $result = mysqli_query($link, $query);
    $result=mysqli_fetch_array($result);
    if($result>0){
            $msg="This email or Contact Number already associated with another account";
    }
    else{
        $query="insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )";
        $result = mysqli_query($link, $query);
        if ($result) {
           $msg="You have successfully registered";
        }
        else
         {   
          $msg="Something Went Wrong. Please try again";
        }
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
}
</style>
</head>
<body>
    <script type="text/javascript">

  function checkpass() {
    if(document.signup.password.value!=document.signup.repeatpassword.value) {
      alert('Password and Repeat Password field does not match');
      document.signup.repeatpassword.focus();
      return false;
    }
    return true;
  } 

</script>
<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <h2 align="center">SignUp</h2>
  <form action="" name="signup" method="post" align = "center" onsubmit="return checkpass();">
    <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    <div class="container" align="center">
        <input class="form-control" placeholder="FirstName" type="text" value="" id="firstname" name="firstname" required="true">
          <input class="form-control" type="text" placeholder="LastName" value="" id="lastname" name="lastname" required="true">
          <input type="email" class="form-control" id="email" placeholder="Email-id" aria-describedby="emailHelp" name="email" required="true"> <small id="emailHelp" class="form-text text-muted"></small> 
          <input class="form-control" type="text" value="" id="mobilenumber" placeholder="MobileNumber" name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}"> <small class="form-text text-muted"></small> 
          <input type="password" class="form-control" id="password" value="" name="password" required="true" required="true"> 
          <input type="password" class="form-control" id="repeatpassword" value="" name="repeatpassword" required="true"> 
          <button type="submit" name="submit" class="btn theme-btn"><i class="ft-user"></i> Register</button>
        </div>

    </form>
</body>
</html>

