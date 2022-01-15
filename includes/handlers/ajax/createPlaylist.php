<?php
include("../../config.php");
include("../../classes/Playlist.php");

if(isset($_POST['username'])) {

	$username = $_POST['username'];
	$date = date("Y-m-d");
	$artworkPath = "assets/images/icons/playlist.png";
	$playlist_query=mysqli_query($con, "SELECT id FROM playlists WHERE owner='$username'");

	$name="Playlist #";
	$name.=mysqli_num_rows($playlist_query) +1;

	$query = mysqli_query($con, "INSERT INTO playlists VALUES('', '$name', '$username', '$date', '$artworkPath')");
}
else {
	echo "Username parameters not passed into file";
}

?>