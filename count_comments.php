<?php
$postid = $_SESSION['postid'];
$sql= "SELECT count(*) as c FROM comments where postId = $postid";
if($mysqli->query($sql))
{
 while($row=mysqli_fetch_assoc($result))
  {
        echo $row['c'];
  }     

}
?>


