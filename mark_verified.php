<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    $ansresponse = $_POST['responseid'];
    $postid = $_POST['responseID'];
    
    $sql= "update comments set verified='1' where id=$ansresponse";
        if($mysqli->query($sql))
		{
			echo '<script>
                swal({
                title: "Verified!",
                icon: "success",
                button: "OK",
                }).then(() => {';
                    header("location: postDetail.php?id=$postid");
                echo'});
            </script> ';
			
		}
	
	else
	{
		$_SESSION['message']="Sorry, not verified if problem persist please contact point of contact of this application";
		header("location: error.php");
    }



}

?>