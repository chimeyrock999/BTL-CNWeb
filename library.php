<?php
include("includes/includedFiles.php");
$update_view_query = mysqli_query($con, "UPDATE views SET views = views + 1 WHERE id =1 ");
?>

<div class="playlistsContainer">

	<div class="gridViewContainer">
		<h2>PLAYLISTS</h2>

		<div class="gridViewItem" onclick="createPlaylist()">
			<div class='playlistImage'>
				<img src='assets\images\icons\plus.png'>
			</div>
			<div class='gridViewInfo'> TẠO PLAYLIST MỚI </div>
		</div> 



		<?php
			$username = $userLoggedIn->getUsername();

			$playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username'");

			while($row = mysqli_fetch_array($playlistsQuery)) {

				$playlist = new Playlist($con, $row);

				echo "<div class='gridViewItem' role='link' tabindex='0' 
							onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>

						<div class='playlistImage'>
							<img src='".$playlist->getArtworkPath()."'>
						</div>
						
						<div class='gridViewInfo'>"
							. $playlist->getName() .
						"</div>

					</div>";



			}
		?>






	</div>

</div>