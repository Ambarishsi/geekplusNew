<?php
require 'db.php';
$email=$mysqli->escape_string($_POST['email']);
$password=$mysqli->escape_string($_POST['password']);
$otp = rand(100000,1000000);
$techKnown="not updated!";
$extn="not updated!";

$result=$mysqli->query("SELECT * FROM profile WHERE profileid='$email'") ;

if($result->num_rows>0)
{
	$_SESSION['message']='User with this email already exists!';
	header("location: error.php");
}
else
{ 
	$sql="INSERT INTO profile (profileid,password,otp,techKnown,extn) VALUES ('$email','$password','$otp','$techKnown','$extn')";
	
	if($mysqli->query($sql))
{		
		$_SESSION['message'] =
		"confirmation link has been sent to $email, plese verify
		your account by clicking on the link in the message! Your OTP is: $otp " ;
		
		$to = $email;
		$subject = 'GEEKPLUS: Account Verification!';
		$message_body = '
		Hello ' . $email.',
		
		Thankyou for signing up!
		
		Your OTP is: ' .$otp.'

		Please click this link to activate your account:
		
		http://localhost/try/verify_account.php?email='.$email;
		
		mail( $to, $subject, $message_body );
		
		header("location: success.php");
	}
	else {
	
		$_SESSION['message'] = 'Registration failed!';
			header("location: error.php");
		}
}