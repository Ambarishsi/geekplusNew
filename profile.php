<!DOCTYPE html>
<html>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
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
</style>
<body>

<div class="w3-container">


<button onclick="document.getElementById('id01x').style.display='block'" class="w3-button w3-black">Open Tabbed Modal</button>

<div id="id01x" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01x').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2><i class="fa fa-user"></i> Welcome, <?include "profile_name.php"; ?> </h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'setting')"><i class="fa fa-cog"></i></button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'bookmark')">Bookmarked</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'question')">Your Questions</button>
  </div>

  <div id="setting" class="w3-container city">
   <span class="label label-primary">Language known</span>
   <p>Java, Spring, Html, css</p>
<form>
   <div class="input-group">
      <input id="email" type="text" class="form-control" name="email" placeholder="Add technology">
      <span class="input-group-addon"><button><i class="glyphicon glyphicon-pencil"></button></i></span>   
    </div>
</form>
    <hr>
   <span class="label label-primary">Total upvotes</span>
   <p>402</p>
   <hr>
   <span class="label label-primary">Extention</span>
   <p>3231</p>
   <form>
   <div class="input-group">
      <input id="email" type="text" class="form-control" name="email" placeholder="Add extention">
      <span class="input-group-addon"><button><i class="glyphicon glyphicon-pencil"></button></i></span>   
    </div>
    </form>
  </div>
  <br />

  <div id="bookmark" class="w3-container city">
   <div class="w3-container">

<button class="collapsible">ambarish </button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<br>
<button class="collapsible">ambarish </button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<br>
</div>
  </div>


<div id="question" class="w3-container city">

<div class="w3-container">

<button class="collapsible">ram </button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<br>
<button class="collapsible">ram </button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<br>
</div>

</div>

  
  
  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01x').style.display='none'">Close</button>
  </div>
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
</body>
</html> 
