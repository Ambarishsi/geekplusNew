<style>
.blink_text {
 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;
}

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
}
</style>
<?php
require 'db.php';
$todaysDate = date("Y-m-d"); 
$c = DateTime::createFromFormat("Y-m-d",$todaysDate);
$result = $mysqli->query("SELECT * FROM posts ORDER BY upvotes DESC ");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{  $shorttitle = $row['title'];
    $y=$row['id'];
  $s=$row['dateCreated'];
  $date1 = DateTime::createFromFormat("Y-m-d",$s);
  $upvotes = $row['upvotes'];
  $diff=date_diff($c,$date1);
  $checkdiff= $diff->format("%a");
  if($checkdiff<=4 && $upvotes >=1)
  {
echo '<div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
';
   echo " <div class='blog-grid-left'>";
   if($row['imgRelated']!=null){
   echo '<a href="postDetail.php?id='.$y.'" data-toggle="tooltip" title="'.$shorttitle.'"><img src="data:image/jpeg;base64,' .base64_encode( $row['imgRelated'] ). '" class="img-responsive" alt="Post related image" /></a>';
}else{
    echo '<a href="postDetail.php?id='.$y.'" data-toggle="tooltip" title="'.$shorttitle.'"><img src="images/notf.gif" class="img-responsive" alt="Post related image" /></a>';
}
   
echo "</div>
<div class='blog-grid-right'>";
   
   echo "<h5><a href='postDetail.php?id=$y' data-toggle='tooltip' title='$shorttitle'>".substr("$shorttitle",0,25)." <sub style='font-size:7px;color:#6C3483' class='blink_text'>read more</sub></a></h5>";
echo "</div>
<div class='clearfix'> </div></div>";
        
  }
}
?>

<!--tooltip>-->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!--//tooltip>-->