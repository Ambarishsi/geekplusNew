<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    $uid=$_SESSION['userid'];
    $datecreated = date("Y-m-d");
    $price = $_POST['price'];
    $title = $_POST['title'];
    $qbody = $_POST['questionbody'];
    $qbodyenc = htmlentities($qbody);
    $tags = $_POST['tags'];
    $image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
    if (($_FILES["fileToUpload"]["size"] > 2000000)) {

        $_SESSION['message']="Sorry, your file size more than 2 MB, please choose lesser size image to upload";
		header("location: error.php");
    }
    else{
  
    $sql= "insert into posts(techRelated,title,qbody,dateCreated,upvotes,personId,imgRelated) values('$tags','$title','$qbodyenc','$datecreated','0','$uid ','$image')";
        if($mysqli->query($sql))
		{
			$_SESSION['message']=  "success";
			header("location: index.php");
		}
	
	else
	{
		$_SESSION['message']="Sorry, not added if problem persist please contact point of contact of this application";
		header("location: error.php");
    }
}

}
?>