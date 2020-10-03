<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>veryfy account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Verify your account</h2>
  <form action="verify_otp.php" method="post">
    <div class="form-group">
      <label for="email">Enter email</label>
      <input type="text" class="form-control" placeholder="Enter email id" name="email">
      <label for="pwd">Entr OTP: received on the mail</label>
      <input type="text" class="form-control" placeholder="Enter OTP to activate your account" name="otp">
      
    </div>
    
    <button type="submit" class="btn btn-info">Verify</button>
  </form>
</div>

</body>
</html>

