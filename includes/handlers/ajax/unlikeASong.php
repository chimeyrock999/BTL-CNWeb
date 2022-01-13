<?php
include("../../config.php");


if(isset($_POST['owner']) && isset($_POST['songId'])) {
	$owner = $_POST['owner'];
	$songId = $_POST['songId'];

    $query = mysqli_query($con, "DELETE FROM likedsongs WHERE songId='$songId' AND owner='$owner'");

}
else {
	echo "owner or songId was not passed into unlikeASong.php";
}



?>