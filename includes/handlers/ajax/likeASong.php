<?php
include("../../config.php");


if(isset($_POST['owner']) && isset($_POST['songId'])) {
	$owner = $_POST['owner'];
	$songId = $_POST['songId'];


	$query = mysqli_query($con, "INSERT INTO likedsongs VALUES('$songId', '$owner')");

}
else {
	echo "owner or songId was not passed into likeASong.php";
}



?>