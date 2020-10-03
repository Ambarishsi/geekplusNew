<?php
require 'db.php';
session_start();
$type=$_POST['type'];
$id=$_POST['id'];
$loginid = $_SESSION['userid'];
if($type=='bookmark')
{   
    $result = $mysqli->query("SELECT * FROM bookmark where profileid='$loginid' AND postid='$id'");
    if($result->num_rows ==0){
    $sql1= "insert into bookmark(profileid,postid) values('$loginid','$id')";
    $mysqli->query($sql1);
    }  
    
}
?>