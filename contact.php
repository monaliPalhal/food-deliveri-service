<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
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
  width: 100%;
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

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
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
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
   <form action="" name="login" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                  <h3 align="center">Contact us</h3>
                                      <hr/>
                          <p><b>Adrress :</b> Test Addresss</p>
                          <p><b>Contact No. :</b> 8975415882</p>
                          <p><b>Email :</b>bhumika.makwana2899@gmail.com</p>
                                    </div> </div>
 
                              </form>
                           </div>
                        </div>
                     </div>
                    <img src="download.png" alt="" class="img-fluid">
                   </body>
                   </html>