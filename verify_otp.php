<?php
require 'db.php';
session_start();
$email = $_POST['email'];
$otp = $_POST['otp'];
$otp_garbage = rand(100000,1000000);
$active=1;
$result = $mysqli->query("SELECT * FROM profile WHERE profileid='$email'");

if( $result->num_rows == 0){
	$_SESSION['message'] = "You do not have access!";
	header("location: error.php");
    }
else{
        $user=$result->fetch_assoc();
        if($active != $user['verified']){
        if($otp == $user['otp'])
            {   

                $resultx ="UPDATE profile SET verified= '$active' WHERE profileid='$email'";
                if ($mysqli->query($resultx) === TRUE) {
                    $mysqli->query("UPDATE profile SET otp= '$otp_garbage' WHERE profileid='$email'");
                    $_SESSION['message']="Your account activated successfully!";
                    header("location: success.php");
                  } else {
                    $_SESSION['message']= "Activation error: " . $conn->error;
                    header("location: error.php");
                  }
               
             
            }
        else
            {
            $_SESSION['message']="you have entered wrong otp, try again $email";
             header("location: error.php");
            }
        }
        else{
            $_SESSION['message']= "Your account is already activated";
            header("location: error.php");
        }
    }   

?>