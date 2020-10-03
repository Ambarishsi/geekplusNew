<?php
require 'db.php';
$uid=$_SESSION['userid'];
$result = $mysqli->query("SELECT * FROM profile WHERE profileid='$uid'");
$user=$result->fetch_assoc();
echo $user['profileid'];
?>