<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{   $pid = $_SESSION['updatepostid'];
    $uid = $_SESSION['userid'];
    $datecreated = date("Y-m-d");
    $title = $_POST['title'];
    $qbody = $_POST['questionbody'];
    $tags = $_POST['tags'];
  
    $sql= "UPDATE posts SET techRelated='$tags',title='$title',qbody='$qbody',dateCreated='$datecreated' WHERE personId = $uid AND id =$pid ";
        if($mysqli->query($sql))
		{
            unset($_SESSION['updatepostid']);
			$_SESSION['message']=  "updated";
			header("location: index.php");
		}
	
	else
	{
		$_SESSION['message']="Sorry, not added if problem persist please contact point of contact of this application";
		header("location: error.php");
    }


}
?>