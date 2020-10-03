<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recover Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Recover your account</h2>
  <form action="" method="post">
    <div class="form-group">
     
      <input type="email" class="form-control" placeholder="Enter email" name="email">
      
    </div>
    
    <button type="submit" name="SubmitButton" class="btn btn-info">Recover</button>
  </form>
</div>

</body>
</html>

<?php
if(isset($_POST['SubmitButton'])){ 
$otp = rand(100000,1000000);
$email=$mysqli->escape_string($_POST['email']);

$result=$mysqli->query("SELECT * FROM profile WHERE profileid='$email'") ;

 
	$sql="UPDATE profile SET otp= '$otp' WHERE profileid='$email'";

	if($mysqli->query($sql))
{		
		$_SESSION['message'] =
		"Password reset link has been sent to $email, plese recover
		your account by clicking on the link in the message! Your OTP is: $otp " ;
		
		$to = $email;
		$subject = 'GEEKPLUS: Password Reset!';
		$message_body = '
		Hello ' . $email.',
		
		Thankyou for being an active user!
		
		Your OTP is: ' .$otp.'
		
		Please click this link to reset your account password:
		
		http://localhost/try/recover_account.php?email='.$email;
		
		mail( $to, $subject, $message_body );
		
		header("location: success.php");
	}
	else {
	
		$_SESSION['message'] = 'Password reset failed!';
			header("location: error.php");
		}
}

?>