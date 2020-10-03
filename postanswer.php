<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    $postid = $_SESSION['postid'];
    $rand = $_SESSION['userid'];
    $cbodyx = $_POST['postanswerx'];
    $cbodyencx = htmlentities($cbodyx);
    $imagec = addslashes(file_get_contents($_FILES['ansimg']['tmp_name']));

    $sql= "insert into comments(postid,personPostingId,cBody,answerimage) values('$postid','$rand','$cbodyencx','$imagec')";
        if($mysqli->query($sql))
		{
			echo '<script>
                swal({
                title: "Answer Posted Successfully!",
                icon: "success",
                button: "OK",
                });
            
            </script> ';
			header("location: postDetail.php?id=$postid");
		}
	
	else
	{
		$_SESSION['message']="Sorry, not added if problem persist please contact point of contact of this application";
		header("location: error.php");
    }



}

?>