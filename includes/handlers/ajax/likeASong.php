<?php
include("../../config.php");


if(isset($_POST['owner']) && isset($_POST['songId']) && isset($_POST['liked'])) {
	$owner = $_POST['owner'];
	$songId = $_POST['songId'];
	$liked=$_POST['liked'];
	
	//echo gettype($liked);

	if ($liked == "true"){
		//echo "Like this song succesful!";
		// echo $liked;
		$query = mysqli_query($con, "INSERT INTO likedsongs VALUES('$songId', '$owner')");
	}
	else{
		//echo "Unlike this song succesful!";
		// echo $liked;
		$query = mysqli_query($con, "DELETE FROM likedsongs WHERE songId='$songId' AND owner='$owner'");
	}
	
}
else {
	echo "owner or songId was not passed into unlikeASong.php";
}



?>