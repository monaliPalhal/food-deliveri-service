<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style >
body {
	background-color:#000080;
	color: white;
	font-family: Arial, Helvetica, sans-serif;}
form 
{
	border: 3px solid #f1f1f1;
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
input[type=password] ,input[type=email] {
  margin: 16px 0;
  color: white;
  width:30%;
}

input[type=text] {
	color: white;
   width:20%;
   margin: 16px 0;
}

button:hover {
  opacity: 0.6;
}

.row {
	 padding: 16px;
}
h1{
	font-size: 24px;
}

</style>


</head>
<body>
	 <h1>Forgot Password</h1>
	 <form action="" name="submit" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Registered Email</label>
                                       <input type="email" name="email" id="email" class="form-control"    required="true" >
                                    </div> </div>
                                    <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Mobile Number</label>
<input type="text" class="form-control" required="true" name="contactno" maxlength="10" pattern="[0-9]{10}">

                                    </div>
                                    
                                      </div>                              
                                 
                                 <div class="row">
                                    <div class="col-sm-4">
                                      <button type="submit" name="submit" class="btn theme-btn"><i class="ft-user"></i>Reset</button>
                                     
                                    </div>
                                    <div class="col-sm-4">
                          <a href="login.php" class="btn theme-btn"><i class="ft-user"></i>Sign In</a>
                        </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </body>
              <img src="city.png" alt="Cinque Terre">
              </html>
