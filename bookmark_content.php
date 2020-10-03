<?php
require 'db.php';

$id=$_SESSION['userid'];
    $sql = $mysqli->query( "select * from bookmark where profileid='$id'");
    if( $sql->num_rows > 0){
    while($row = $sql->fetch_assoc())
    {
        $itr = $row['postid']; 
        $sql1 = $mysqli->query( "select * from posts where id=$itr");
        while($row1 = mysqli_fetch_array($sql1,MYSQLI_ASSOC))
        {
            $shorttitle1 = $row1['title'];
            echo "<button class='collapsible'><mark>".$row['postid'].  "</mark>  "  .substr("$shorttitle1",0,60)."....."."</button>
            <div class='content'>";
            $tpi = $row['postid'];
            echo "<i class='fa fa-trash' style='cursor: pointer;' aria-hidden='true' onclick='removebkmark($tpi);'></i> &emsp;";
            echo "<a href='postDetail.php?id=$tpi' style='color:#5B2C6F'>".$row1['title']."</a>
            </div><div style='padding-top:10px'></div>";
        }
    }
}
else{
    echo"<p>No bookmark found!</p>";
}
?>
