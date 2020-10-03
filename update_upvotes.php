<?php
require 'db.php';
session_start();
$type=$_POST['type'];
$id=$_POST['id'];
$loginid = $_SESSION['userid'];
if($type=='like')
{   
    $result = $mysqli->query("SELECT * FROM upvotes where postid='$id' AND userid='$loginid'");
    if($result->num_rows ==0){
    $sql1= "insert into upvotes(postid,userid) values('$id','$loginid')";
    $mysqli->query($sql1);
    
    $sql= "update posts set upvotes=upvotes+1 where id=$id";
    $mysqli->query($sql);
    }  
    
}
?>