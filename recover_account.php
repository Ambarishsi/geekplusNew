<!DOCTYPE html>
<html lang="en">
<head>
  <title>Password Reset</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Password Reset</h2>
  <form action="" method="post">
    <div class="form-group">
     
      <input type="password" class="form-control" placeholder="Enter new password" name="pass1"><br>
      <input type="password" class="form-control" placeholder="Confirm password" name="pass2"><br>
      <input type="text" class="form-control" placeholder="Enter OTP" name="otp">
      
    </div>
    
    <button type="submit" name="Submitpass" class="btn btn-info">Reset</button>
  </form>
</div>

</body>
</html>

<?php
if(isset($_POST['Submitpass'])){ 
require 'db.php';
session_start();
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
@$email = $_GET['email'];
$otpnew = rand(100000,1000000);
$otp = $_POST['otp'];
if($pass1==$pass2){
$result = $mysqli->query("SELECT * FROM profile WHERE profileid='$email'");

if( $result->num_rows == 0){
	$_SESSION['message'] = "You do not have access!";
	header("location: error.php");
    }
else{  
    $user=$result->fetch_assoc(); 
    if($otp == $user['otp']){
        $resultx ="UPDATE profile SET password= '$pass1' , otp='$otpnew' WHERE profileid='$email'";

    if ($mysqli->query($resultx) === TRUE) {
        $_SESSION['message']="Password reseted successfully!";
        header("location: success.php");
      } else {
        $_SESSION['message']= "reset error: " . $conn->error;
        header("location: error.php");
      }
    }
    else{
        $_SESSION['message']= "Please enter correct OTP, sent to your email ";
        header("location: error.php");
    }
    }   
}
else{
    $_SESSION['message']= "Password missmatch ";
        header("location: error.php");
}
}
?>