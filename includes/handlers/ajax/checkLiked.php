<?php
include("../../config.php");

if(isset($_POST['username'])&& isset($_POST['songId'])) {

	$owner = $_POST['username'];
	$songId = $_POST['songId'];
	$query=mysqli_query($con, "SELECT * FROM likedSongs WHERE owner='$owner' AND songId ='$songId'");
    echo mysqli_num_rows($query);
  
}
else {
	echo "Username parameters not passed into file";
}

?>