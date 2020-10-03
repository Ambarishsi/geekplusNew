<?php
require 'db.php';
session_start();

if(isset($_POST["limit"], $_POST["start"]))
{
 $result = $mysqli->query("SELECT * FROM posts ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."");

 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
 {  
    echo "<div class='tc-ch wow fadeInDown'  data-wow-duration=''.8s' data-wow-delay='.2s'>";
    if($row['imgRelated']!=null){
        $y=$row['id'];
        echo "<div class='tch-img'>";
        echo '<center><a href="postDetail.php?id='.$y.'"><img src="data:image/jpeg;base64,' .base64_encode( $row['imgRelated'] ). '" class="img-responsive" alt="Post related image" /></a></center>
        <!--height="600px" width="1280px"-->
        </div>';
        }
        $x=$row['id'];
    echo "<h3><a href='postDetail.php?id=$x'>".$row['title']."</a></h3>";
   



    echo "<h6>Posted by <a style='color:#9029BC;'>" . $row['personId']."</a> On <a style='color:#9029BC;'>" . $row['dateCreated']."</a></h6>";

    $substring = html_entity_decode($row['qbody']);
    echo "<p>".$substring."</p>";
        
        $name_explode = explode(",",$row["techRelated"]); 
        foreach ($name_explode as $value){
            $tags=1;
       echo "<div style='display: inline-block; padding-right:3px;'><form action='search.php?forward=$tags' method='post'>
       <input type='hidden' value=$value name='search'>
       <a href='#' onclick='this.parentNode.submit();'><span class='label label-info'>" .$value. "</span></a></form></div>";
        }
        
        echo "<div class='soci'>
            <ul>
                <li class='hvr-rectangle-out' data-toggle='tooltip' title='Report Duplicate!''><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> </li>&emsp;
                <a href='postDetail.php?id=$x' style='color:#2E4053'><li class='hvr-rectangle-out' data-toggle='tooltip' title='Answers'><i class='fa fa-comment' aria-hidden='true'>"; 
                
                $ansCount = $mysqli->query("SELECT count('postId') as ac FROM comments where postId = '$x' ");
                $answerC = $ansCount->fetch_assoc();
                
                echo "</i> ".$answerC['ac']."
                </li></a>&emsp;
                <li class='hvr-rectangle-out' data-toggle='tooltip' title='Bookmark' onclick='bookmarked($x)'><i class='fa fa-bookmark' aria-hidden='true'></i></li>&emsp;
                <li class='hvr-rectangle-out' data-toggle='tooltip' title='Upvote'><i class='fa fa-thumbs-up' aria-hidden='true' onclick='like_update($x)'></i><span id='like_loop_$x'>".$row['upvotes']."</span></li>
            </ul>
        </div>
        <div class='clearfix'></div>
</div>";
   // echo'<div class="blog-post"><h1>'.$row['id'].'</h1><p>'.$row['title'].'</p><p>'.$row['qbody'].'</p></div>';
    //echo "<p>Item Name: ".$row['itemname']."</p>";

}

}
?>
<!--function to count upvotes-->
<?php if(isset($_SESSION['logged_in'])):?>
<script>
		function like_update(idup){
			jQuery.ajax({
				url:'update_upvotes.php',
				type:'post',
				data:'type=like&id='+idup,
				success:function(result){
                var cur_count=jQuery('#like_loop_'+idup).html();
				cur_count++;
				jQuery('#like_loop_'+idup).html(cur_count);

                swal({
                title: "Upvoted Successfully!",
                icon: "success",
                button: "OK",
                });
				}
			});
		}
</script>

<?php else: ?>
    <script>
  function like_update(idup)
  {
  swal({
  title: "Login first to upvote!",
  icon: "warning",
  button: "OK",
});
  }
</script>
<!--//function to count upvotes-->
<?php endif; ?>