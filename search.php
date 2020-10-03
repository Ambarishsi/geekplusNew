<?php
require 'db.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Post detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
@media screen and (max-width: 600px) {
  #title_message {
    visibility: hidden;
    clear: both;
    display: none;
  }
}
</style>
</head>
<body style="background-color:#EAEDED">
<div class="header navbar-fixed-top" id="ban" >
		<div class="container">
    
        <nav class="navbar navbar-inverse">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header" >
                <ul class="nav navbar-nav"><li class="active act" id="title_message">
                <a class="navbar-brand" href="index.php"><b><h3>Geek Plus</h3></b></a>
                </li></ul>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="float:left;">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
          </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-7" id="link-effect-7">
						<ul class="nav navbar-nav">
                            <li ><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> 
							<li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle" aria-hidden="true"></i> Ask Question</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModalTrending"><span class="glyphicon glyphicon-fire"></span> Trending</a></li> 
                        </ul>
                        <form class="navbar-form navbar-left" method="post" action="search.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="searchsubmit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </div>
                        </div>
                        </form>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			</div>
			
			<div class="clearfix"> </div>	
	</div>
	<!--start-main-->
	
<br />

	<!-- technology-left -->
    <div class="technology">
	<div class="container">
		<div class="col-md-12 technology">
			<div class="tech-no">
 <!--search posts-->
                <?php
                if(@$_GET['forward']==1)
                {
                    if (!empty($_POST['search'])){
                    $term = $mysqli->escape_string($_POST['search']); 
                    $min_length = 2;
                    if(strlen($term) >= $min_length){ 
                    $sql = $mysqli->query("SELECT * FROM posts WHERE title LIKE '%".$term."%' OR techRelated LIKE '%".$term."%'"); 
                    while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                        $y=$row['id'];
                        $shorbody = $row['qbody'];
                echo '<div class="wthree">
                     <div class="col-md-6 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">';
                     if($row['imgRelated']!=null){
                        echo "<div class='tch-img'>";
                        echo '<center><a href="postDetail.php?id='.$y.'"><img src="data:image/jpeg;base64,' .base64_encode( $row['imgRelated'] ). '" class="img-responsive" alt="Post related image"/></a></center>
                        <!--height="600px" width="1280px"-->
                        </div>';
                        }
                        else{
                            echo '<a href="postDetail.php?id='.$y.'"><img src="images/notf.gif" class="img-responsive" alt="Post related image"></a>';
                        }
                    echo ' </div>
                     <div class="col-md-6 wthree-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">';
                     
                     $x=$row['id'];
                     echo "<h3><a href='postDetail.php?id=$x'>".$row['title']."</a></h3>";
                            
                     echo "<h6>Posted by <a> " . $row['personId']."</a> On <a>" . $row['dateCreated']."</a></h6>";
                     $sbustring = html_entity_decode($shorbody);
                     $subst = substr($sbustring, 0, 10000);

                          echo "<p>".$subst."...</p>";
                                
                    echo "<div class='bht1'>
                    <a href='postDetail.php?id=$x'>Read More</a>
                            </div>
                            
                            <div class='clearfix'></div>
                        
                     </div>
                        <div class='clearfix'></div>
                </div>";
                    }
                }
                else{ // if query length is less than minimum
                    echo '<center><div class="alert alert-success"><strong>Please enter '.$min_length.' or more letters to search:  </strong></div></center>';
                  
                }
                }
            }
                //
                else{
                if (!empty($_POST['search'])){
                $term = $mysqli->escape_string($_POST['search']); 
                $min_length = 2;
                if(strlen($term) >= $min_length){ 
                $sql = $mysqli->query("SELECT * FROM posts WHERE title LIKE '%".$term."%' OR qbody LIKE '%".$term."%' OR techRelated LIKE '%".$term."%'"); 
                
                if( $sql->num_rows == 0){
                
                        echo "<center><h4>We couldn't find anything for <strong> $term </strong></h4><br /><img src='images/404.png' alt='Not found'></center>";      
                    }
                
                
                else{
                while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                    $y=$row['id'];
                    $shorbody = $row['qbody'];

            echo '<div class="wthree">
				 <div class="col-md-6 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">';
                 if($row['imgRelated']!=null){
                    echo "<div class='tch-img'>";
                    echo '<center><a href="postDetail.php?id='.$y.'"><img src="data:image/jpeg;base64,' .base64_encode( $row['imgRelated'] ). '" class="img-responsive" alt="Post related image"/></a></center>
                    <!--height="600px" width="1280px"-->
                    </div>';
                    }
                    else{
                        echo '<a href="postDetail.php?id='.$y.'"><img src="images/notf.gif" class="img-responsive" alt="Post related image"></a>';
                    }
				echo ' </div>
				 <div class="col-md-6 wthree-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">';
                 
                 $x=$row['id'];
                 echo "<h3><a href='postDetail.php?id=$x'>".$row['title']."</a></h3>";
                        
                 echo "<h6>Posted by <a> " . $row['personId']."</a> On <a>" . $row['dateCreated']."</a></h6>";
                 $sbustring = html_entity_decode($shorbody);
                 $subst = substr($sbustring, 0, 20000);
                      echo"  <p>".$subst."...</p>";
                            
                echo "<div class='bht1'>
                <a href='postDetail.php?id=$x'>Read More</a>
					    </div>
						
						<div class='clearfix'></div>
					
				 </div>
					<div class='clearfix'></div>
            </div>";
              
                }  
            
            }
        }
            else{ // if query length is less than minimum
                echo '<center><div class="alert alert-danger"><strong>Please enter '.$min_length.' or more letters to search:  </strong></div></center>';
              
            }
        }
            }
            
        
            ?>
 <!--//search posts-->

			</div>
		</div>
		<!-- technology-right -->
		
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>             
						
<!--footer-->
<div class='footer' ><div class='container'><div class='col-md-3 footer-left' ><h6 style='font-size:18px'><img src='images/slk.png' alt='slk logo' height='40px' width='40px'/> <i class='fa fa-copyright' aria-hidden='true'></i> SLK Software</h6><p>This application is purely focused on questions & answers related to technology</p></div><div class='col-md-5  footer-middle'><h4>Point of Contact</h4><div class='mid-btm'><i class='fa fa-envelope-o' aria-hidden='true' style='color:white'></i><a href='mailto:ambarishparthasarthy@gmail.com'> Santosh B Jamadrakhani</a></div><i class='fa fa-envelope-o' aria-hidden='true' style='color:white'></i><a href='mailto:ambarishparthasarthy@gmail.com'> Ambarish Parthasarthy</a></div><div class='col-md-4 footer-right'><h4>Quick Links</h4><li><a href='#'>Home</a></li><li style='color:white'><div class='input-group'><form method='post' action='search.php'><input type='text' class='form-control' placeholder='Search...' id='myInput' name='search'><input id='myBtn' type='hidden'/></form></div></li></div><div class='clearfix'></div></div></div>

<!--search on click of enter-->
<script>
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>
<!--//search on click of enter-->
<!--footer-->

</body>
</html>