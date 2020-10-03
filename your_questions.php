<?php
$id=$_SESSION['userid'];

        $sql1 = $mysqli->query( "select * from posts where personId='$id'");
        if( $sql1->num_rows > 0){
        while($row1 = mysqli_fetch_array($sql1,MYSQLI_ASSOC))
        {
            $shorttitle1 = $row1['title'];
            echo "<button class='collapsible'><mark>".$row1['id'].  "</mark>  "  .substr("$shorttitle1",0,60)."....."."</button>
            <div class='content'>";
            $tpi = $row1['id'];
            $_SESSION['updatepostid']=$tpi;
            echo "<i class='fa fa-trash' style='cursor: pointer;' aria-hidden='true' onclick='removepost($tpi);'></i> &emsp;";
            echo '<i class="fa fa-pencil-square-o" style="cursor: pointer;" aria-hidden="true" data-toggle="modal" data-target="#myModalupdate"></i> &emsp;';
            echo "<a href='postDetail.php?id=$tpi' style='color:#5B2C6F'>".$row1['title']."</a>
            </div><div style='padding-top:10px'></div>";
        }
    }
    else{
        echo"<p>You have not posted any question yet!</p>";
    }
    
?>

