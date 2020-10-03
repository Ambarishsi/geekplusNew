<?php
session_start();
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $idc = $_GET['id'];
	if(isset($_POST['submitanswer'])){
    $_SESSION['postid'] = $idc;
		require 'postanswer.php';
  }	
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Post detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="src/richtext.min.css">
<script type="text/javascript" src="src/jquery.richtext.js"></script>
<style>
  .textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
/* The container */
.container-verified {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container-verified .inputCheck {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
  border-radius:50px;
  
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 16px;
  width: 16px;
  border-radius:50px;
  border: solid #68188A;
}



/* When the checkbox is checked, add a blue background */
.container-verified .inputCheck:checked ~ .checkmark {
  border-radius:50px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-verified .inputCheck:checked ~ .checkmark:after {
  display: block;

}

/* Style the checkmark/indicator */
.container-verified .checkmark:after {
  right: -4px;
  top: -15px;
  width: 14px;
  height: 23px;
  border: solid #2E86C1;
  border-width: 0 4px 4px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  
}
.buttonlogin {
  background: #fa4b2a;
    border: 1px solid #fa4b2a;
    padding: .8em 0;
    width: 30%;
    margin-top: .5em;
    font-size: 15px;
    color: #fff;
    letter-spacing: 0.5px;
    outline: none;
    transition: .5s all;
    -webkit-transition: .5s all;
    -moz-transition: .5s all;
    -o-transition: .5s all;
    -ms-transition: .5s all;
	font-family: 'Open Sans', sans-serif;
  text-transform:uppercase;
  text-align: center;
  cursor: pointer;
}
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
				<div class="navbar-header">
                <ul class="nav navbar-nav"><li class="active act">
                <a class="navbar-brand" href="index.php"><b><h3>Geek Plus</h3></b></a>
                </li></ul>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                      <?php if(isset($_SESSION['logged_in'])):?>
                            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle" aria-hidden="true"></i> Ask Question</a></li>
                      <?php else: ?>
                        <li><a href="#" onclick="logintoaskq()"><i class="fa fa-question-circle" aria-hidden="true"></i> Ask Question</a></li>
                      <?php endif; ?>	
                            <li><a href="#" data-toggle="modal" data-target="#myModalTrending"><span class="glyphicon glyphicon-fire"></span> Trending</a></li> 
                        </ul>
                        <form class="navbar-form navbar-left" action="search.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
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
			<div class="agileinfo">

        <!--<h2 class="w3">SINGLE PAGE</h2>-->
    <?php
    $pid = $_GET['id'];
    @$result1 = $mysqli->query("SELECT * FROM posts where id=$pid");
        while(@$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
        {   
            $profile = $row1['personId'];
            echo "<div class='single'>";
            if($row1['imgRelated']!=null){
            echo '<center><img src="data:image/jpeg;base64,' .base64_encode( $row1['imgRelated'] ). '" class="img-responsive" alt="Post related image" /></center>';}
			echo " <div class='b-bottom'> 
			      <h5 class='top'>".$row1['title']."</h5>
				    <p class='sub'>".html_entity_decode($row1['qbody'])."</p>
			      <p>Posted on:<a> ". $row1['dateCreated']."</a> by: <a  data-toggle='modal' data-target='#myModalprofile'>" . $row1['personId']."</a><hr style='border-top: 1px solid red;'/></p>
				</div>
             </div>";

        }
    ?>	
        <!--//<h2 class="w3">SINGLE PAGE</h2>-->

        <!--post comments-->
        <div class='response'>
		<h4>Responses:</h4>
    <?php
    $pid = $_GET['id'];
       @$result2 = $mysqli->query("SELECT * FROM comments where postId=$pid");
       while(@$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
        {      
            if($row2['cBody']==!null){
        echo "<div class='media response-info'>
						<div class='media-left response-text-left'>
             <span class='label label-primary'><span class='glyphicon glyphicon-user'></span> ".$row2['personPostingId']."</span>";
             
             if(@trim($profile)==@trim($_SESSION['userid']) && $row2['verified']!=1){
              if(trim($_SESSION['userid'])!=$row2['personPostingId']){
              echo '<form method="post" action="mark_verified.php">
              <label class="container-verified" style="margin-top:20px;margin-left:5px;">
              <input type="checkbox" class="inputCheck" id="'.$row2['id'].'">
              <span class="checkmark"></span>
              </label>
              <input type="hidden" value="'.$pid.'" name="responseID"/>
              <input type="hidden" value="'.$row2['id'].'" name="responseid"/>
              <button type="submit" class="btn btn-success btn-xs" style="margin-top:20px;" name="marktrue">Confirm</button>
              </form>
              ';
            }
          }

            if($row2['verified']==1){
              echo "<br/>";
              echo '<img src="images/verifed.png" alt="verified" width="20" height="20" style="margin-top:20px">
              ';
            }

            echo" </div>";
            
           echo" <div class='media-body response-text-right'>";
            if($row2['answerimage']!=null){
              echo '<center><img src="data:image/jpeg;base64,' .base64_encode( $row2['answerimage'] ). '" class="img-responsive" alt="Post related image" /></center>';}
							echo "<p>".html_entity_decode($row2['cBody'])."</p>
							<ul>
								<li>".$row2['datePosted']."</li>
							</ul>
            </div>";
           
					echo "<div class='clearfix'> </div>
                </div><hr/>";
            }
            
        }
    ?>
     </div>
     <!--//post comments-->
      	
     <hr style='border-top: 1px solid red;'/>
				<div class="coment-form">
          <h4>Leave your comment</h4>
        <?php
        echo "<form action='postDetail.php?id=$pid' method='post' enctype='multipart/form-data'>";
        ?>
        <input type="file" name="ansimg"><br />
        <textarea class="content-richtext3" name="postanswerx"  style="height:100px"  required></textarea>
        <?php
        if(@$_SESSION['logged_in']){
        echo '<input type="submit" value="Submit Answer" name="submitanswer">';
        }else{
        echo '<input class="buttonlogin" value="Submit Answer" onclick="notLoggedin();"/>';
        }
        ?>
				</form>
				</div>	
				<div class="clearfix"></div>
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

<!--script for ask questions-->
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ask a public question</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
  <form action="index.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload"><br />
  <input type="text" class="form-control" name="title" placeholder="Enter your title here." required></br>

  <textarea class="content-richtext2" name="questionbody"  style="height:100px" required></textarea></br>
  <!--<textarea name="questionbody" class="textarea" placeholder="Type your questions here" required></textarea></br>-->
  <input type="text" class="form-control" name="tags" placeholder="Enter technology related tags." required>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info" name="submitquestion">Submit</button>
</form>
        </div>
        
      </div>
    </div>
  </div>
<!--//script for ask questions-->

<!-- Trigger the modal with a button trending-->
                                <!-- Modal -->

                                <div class="modal fade" id="myModalTrending" role="dialog">
                                <div class="modal-dialog">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Treding Questions</h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <?php include "trending.php"?>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                    
                                </div>
                                </div>
<!-- //Trigger the modal with a button trending-->

<!--trigger model for profile starts here-->
<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModalprofile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#5B2C6F"><span class='glyphicon glyphicon-user'></span> <?php echo $profile; ?></h4>
        </div>
        <div class="modal-body">
        <span class="label label-warning">Technology Known</span>
    <?php
        $result3 = $mysqli->query("SELECT * FROM profile where profileid='$profile'");
        while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC))
        {   
            echo "<p>".$row3['techKnown']."</p>";
            echo ' <span class="label label-warning">Extention</span>';
            echo "<p>".$row3['extn']."</p>";
        }
    ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--//trigger model for profile ends here-->

<script>
function logintoaskq(){
  swal({
      title: "Login to ask Question!",
      icon: "warning",
      button: "OK",
      });
}

function notLoggedin(){
  swal({
      title: "Login to post answer!",
      icon: "warning",
      button: "OK",
      });
}
</script>
<!--rich text editor-->
<script>
        $(document).ready(function() {
            $('.content-richtext2').richText();
            $('.content-richtext3').richText();
        
        });
	
</script>
</body>
</html>