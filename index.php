<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
 
	if(isset($_POST['submitquestion'])){
		require 'submitquestion.php';
  }
  elseif(isset($_POST['login'])){
		require 'login.php';
  }
  elseif(isset($_POST['updatequestion'])){
		require 'edit_post.php';
  }
  elseif(isset($_POST['signup'])){
		require 'signup.php';
  }
	
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Geek Plus</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->

<link rel="stylesheet" href="src/richtext.min.css">
<script type="text/javascript" src="src/jquery.richtext.js"></script>

<style>
  /*
  profile section style
  */
  .profile-section-style{
    margin-top:35px;
  }
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;

}

#myBtnTop {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: teal;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtnTop:hover {
  background-color: #555;
}



.city {display:none}
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 8px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 10px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  
}

.textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.redlink:hover {
  color: red;
}
@media screen and (max-width: 600px) {
  #title_message {
    visibility: hidden;
    clear: both;
  
    display: none;
  }
}
</style>

<!--script to fetch item starts here-->
<script>

$(document).ready(function(){
 
 var limit = 5;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetchPosts.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#ambarish').append(data);
    if(data == '')
    {	
     $('#load_data_footer').html("<p>You have reached the end </p>");
     action = 'inactive';
    }
    else
    {
     $('#load_data_message').html("<div><img src='images/loaderx.gif' height='60px' width='60px' class='center img-responsive'/></div>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#ambarish").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   },1000);
  }
 });
 
});
</script>
<!--script to fetch item ends here-->
</head>
<body style="background-color:#EAEDED">

<div class="header navbar-fixed-top" id="ban" >
		<div class="container">
        <button onclick="topFunction()" id="myBtnTop" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>		
			
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
        <?php if(isset($_SESSION['logged_in'])):?>
              <li><a href="#" onclick="document.getElementById('id01x').style.display='block'"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
            <li><a  href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>
				<?php else: ?>
          <li><a data-toggle="modal" data-target="#myModallogin" style='width:auto;'><i class="fa fa-user" aria-hidden="true"></i> LOGIN</a></li>
          <li><a data-toggle="modal" data-target="#myModalsignup" style='width:auto;'><i class="fa fa-sign-in" aria-hidden="true"></i> SignUP</a></li>
				<?php endif; ?>	
                            
              <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a></li>
                      <?php if(isset($_SESSION['logged_in'])):?>
                            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle" aria-hidden="true"></i> Ask Question</a></li>
                      <?php else: ?>
                        <li><a href="#" onclick="logintoask()"><i class="fa fa-question-circle" aria-hidden="true"></i> Ask Question</a></li>
                      <?php endif; ?>	
                            <li><a href="#" data-toggle="modal" data-target="#myModalTrendingIndex"><span class="glyphicon glyphicon-fire"></span> Trending</a></li>
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
	</div>
</br /></br />



	<!-- technology-left -->
	<div class="container">
	<div class="technology">
		<div class="row">
		<div class="col-md-9 technology-left">
		<div class="tech-no">
			<!-- technology-top -->
            <div  id="ambarish"  ></div>
		    <div id="load_data_message"></div>
			<div class="clearfix"></div>
			<!-- technology-top -->
        </div>
          
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right" >
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">
					<div class="search-1 wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
							<form action="search.php" method="post">
								<input type="search" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
								<input type="submit" value=" ">
							</form>
						</div>
					<h4>Trending   <span class="glyphicon glyphicon-fire"></span></h4>
						<?php include "trending.php"?>
						
					
					</div>
					
					
					
				</div>
				
			
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div><!-- technology ends here -->
    </div>
    
</div><!--container ends here-->
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

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

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

  <textarea class="content-richtext" name="questionbody"  style="height:100px" placeholder="Type your questions here" required></textarea></br>
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

<!--go to the top script>-->
<script>
//Get the button
var mybutton = document.getElementById("myBtnTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<!--//go to the top script-->

<!-- Trigger the modal with a button trending-->
                                <!-- Modal -->

                                <div class="modal fade" id="myModalTrendingIndex" role="dialog">
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

<!--popup login form-->
<!-- Modal -->
<div class="modal fade" id="myModallogin" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form action="index.php" method="post">
    <div class="form-group">
      <label for="usr">Id:</label>
      <input type="text" class="form-control" name="email"  placeholder="Enter your slk email ending with @slkgroup.com" required>
    </div>
    <!--pattern="[a-zA-Z0-9.]*[@]slkgroup.com"-->
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" required>
    </div>
  
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn  btn-success" name="login">Login</button>
          </form> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="forgot_password.php" class="redlink" style="text-decoration:none;float:left;">forgot password ?</a>
        </div>
        
      </div>
      
    </div>
  </div>
  
<!--//popup login form-->

<!--popup signup form-->
<!-- Modal -->
<div class="modal fade" id="myModalsignup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Signup</h4>
        </div>
        <div class="modal-body">
          <form action="index.php" method="post">
    <div class="form-group">
      <label for="usr">Id:</label>
      <input type="text" class="form-control" name="email"  placeholder="Enter your slk email ending with @slkgroup.com" required>
    </div>
    <!--pattern="[a-zA-Z0-9.]*[@]slkgroup.com"-->
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" required>
    </div>
  
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn  btn-info" name="signup">Signup</button>
          </form>
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="verify_account.php" class="redlink" style="text-decoration:none;float:left;">activate account !</a>
        </div>
        
      </div>
      
    </div>
  </div>
  
<!--//popup sign up form-->

<!--Entire profile section strats here-->

<div id="id01x" class="w3-modal profile-section-style">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-padding w3-blue"> 
   <h5><i class="fa fa-user"></i> <?php include "profile_name.php"; ?></h5>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'setting')"><i class="fa fa-cog"></i></button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'bookmark')">Bookmarked</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'question')">Your Questions</button>
  </div>

  <div id="setting" class="w3-container city">
    <br />
   <span class="label label-primary">Language known</span>
   <p>Java, Spring, Html, css</p>
   <form action="#">
   <div class="input-group">
      <input  type="text" class="form-control" name="email" placeholder="Add technology">
      <span class="input-group-addon"><button><i class="glyphicon glyphicon-pencil"></button></i></span>   
    </div>
    </form>
    <hr>
   <span class="label label-primary">Total upvotes</span>
   <p>402</p>
   <hr>
   <span class="label label-primary">Extention</span>
   <p>3231</p>
   <form action="#">
   <div class="input-group">
      <input type="text" class="form-control" name="email" placeholder="Add extention">
      <span class="input-group-addon"><button><i class="glyphicon glyphicon-pencil"></button></i></span>   
    </div>
    </form>
  </div>
  <br />

  <div id="bookmark" class="w3-container city">
   <div class="w3-container">


  <?php include 'bookmark_content.php';?>

<br />

</div>
  </div>


<div id="question" class="w3-container city">

<div class="w3-container">

<?php include 'your_questions.php';?>

<br />
</div>

</div>

  
  
  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01x').style.display='none'">Close</button>
  </div>
 </div>
</div>


<!--tablink starts here-->
<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
<!--tablink ends here-->

<!--your question script starts here-->
 <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<!--your question script ends here-->
<!--//Entire profile section ends here-->

<!--bookmark done alert-->
<?php if(isset($_SESSION['logged_in'])):?>
  <script>
		function bookmarked(idbk){
			jQuery.ajax({
				url:'bookmark.php',
				type:'post',
				data:'type=bookmark&id='+idbk,
				success:function(result){

                swal({
                title: "Bookmarked!",
                icon: "success",
                button: "OK",
                });
				}
			});
		}
</script>
<?php else: ?>
  <script>
  function bookmarked()
  {
  swal({
  title: "Login first to bookmark!",
  icon: "warning",
  button: "OK",
});
  }
</script>
<?php endif; ?>
<!--//bookmark done ends here-->

<!--question added script-->
<?php
if (@$_SESSION['message']=="success"){
echo '<script>
    swal({
      title: "Question Added!",
      icon: "success",
      button: "OK",
      });
 
</script> '; 
}
unset($_SESSION["message"])
?>        
<!--//question added-->


<!--remove bookmark-->
<script>
function removebkmark(rmbk){
	jQuery.ajax({
	url:'remove_bookmark.php',
	type:'post',
	data:'type=bookmarkdel&id='+rmbk,
	success:function(result){
        
      swal({
      title: "bookmark removed!",
      icon: "error",
      timer: 1000,
      buttons: false,
    });
    setTimeout("location.href = 'index.php'",1000); 
           
    }
	});
	}
</script>
<!--//remove bookmark-->

<!--remove user post-->
<script>
function removepost(rmpost){
	jQuery.ajax({
	url:'remove_post.php',
	type:'post',
	data:'type=bookmarkdel&id='+rmpost,
	success:function(result){
        
      swal({
      title: "Your post is removed!",
      icon: "error",
      timer: 1000,
      buttons: false,
    });
    setTimeout("location.href = 'index.php'",1000); 
           
    }
	});
	}
</script>
<!--//remove user post-->


	
	<!-- Update post Modal starts here-->
<div class="modal fade" id="myModalupdate">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Update Post Details</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
  <form action="index.php" method="post" >
  <input type="text" class="form-control" name="title" placeholder="Update your title here."></br>
  <textarea name="questionbody" class="textarea" placeholder="Update your questions here" ></textarea></br>
  <input type="text" class="form-control" name="tags" placeholder="Update technology related tags.">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-info" name="updatequestion">Submit</button>
</form>
        </div>
        
      </div>
    </div>
  </div>
<!-- Update post Modal starts here-->

<!--question updated script-->
<?php
if (@$_SESSION['message']=="updated"){
echo '<script>
    swal({
      title: "updated successfully!",
      icon: "success",
      button: "OK",
      });
 
</script> '; 
}
unset($_SESSION["updated"]);
?>        
<!--//question updated-->

<!--login to ask question-->
<script>
function logintoask(){
  swal({
      title: "Login to ask Question!",
      icon: "warning",
      button: "OK",
      });
}
</script>
<!--//login to ask question-->

<!--rich text editor-->
      <script>
        $(document).ready(function() {
            $('.content-richtext').richText();
        });
	
        </script>
<!--//rich text editor-->
</body>
</html>