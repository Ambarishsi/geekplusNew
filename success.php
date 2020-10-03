<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}


.container {
  padding: 20px;
  background-color: #f1f1f1;
}

input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}



input[type=submit] {
  background-color: #4CAF50;
  color: white;
  border: none;
}

input[type=submit]:hover {
  opacity: 0.8;
}
</style>
</head>
<body>




  <div class="container">
    <h2>SUCCESS...</h2>
    <p><?php
	if(isset($_SESSION['message']) AND !empty($_SESSION['message'])):
	echo $_SESSION['message'];
	else:
	header("location:index.php");
	endif;
	?>
	</p>
  </div>

  

  <div class="container">
    <a href="index.php"><input type="submit" value="HOME"></a>
  </div>


</body>
</html>
