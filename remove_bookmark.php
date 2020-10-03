<?php
require 'db.php';
session_start();
$typex=$_POST['type'];
$idx=$_POST['id'];
$loginidx = $_SESSION['userid'];
if($typex=='bookmarkdel')
{   
    $sql1= "DELETE FROM bookmark WHERE profileid='$loginidx' AND postid='$idx'";
    $mysqli->query($sql1);   
}
?>