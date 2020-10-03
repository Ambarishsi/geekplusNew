<?php
$email = $mysqli->escape_string($_POST['email']);

$password = $mysqli->escape_string($_POST['password']);
$result = $mysqli->query("SELECT * FROM profile WHERE profileid='$email'");

if( $result->num_rows == 0){
	$_SESSION['message'] = "User with that email doesn't exist!";
	header("location: error.php");
	}
else{
	$user=$result->fetch_assoc();
	if($password == $user['password'])
		{
			if($user['verified']==1){
			$_SESSION['userid']=$_POST['email'];
			$_SESSION['logged_in']=true;
			header("location: index.php");
			}
			else{
				$_SESSION['message']="Your account is not activated, Please activate your account by clicking on the link which is already sent to your email id";
		 		header("location: error.php");
			}
		}
	else
		{
		$_SESSION['message']="you have entered wrong password, try again";
		 header("location: error.php");
		}
	}
?>