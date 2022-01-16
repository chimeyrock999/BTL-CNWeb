<?php
include("../../config.php");


if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];

	$check_query = mysqli_query($con, "SELECT * FROM playlistSongs WHERE songId='$songId' AND playlistId = '$playlistId' ");

	if(mysqli_num_rows($check_query)==0){
		
		$orderIdQuery = mysqli_query($con, "SELECT MAX(playlistOrder) + 1 as playlistOrder FROM playlistSongs WHERE playlistId='$playlistId'");
		$row = mysqli_fetch_array($orderIdQuery);
		$order = $row['playlistOrder'];

		$query = mysqli_query($con, "INSERT INTO playlistSongs VALUES('', '$songId', '$playlistId', '$order')");
	}

}
else {
	echo "PlaylistId or songId was not passed into addToPlaylist.php";
}



?>