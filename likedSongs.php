<?php include("includes/includedFiles.php"); 


$username=$userLoggedIn->getUsername();
$likedSongs = new likedSongs($con, $username);
?>

<div class="entityInfo">

	<div class="leftSection">
        <div class="leftSectionImage" id="likedSongImage"> 
            <img src="assets/images/playlist-artwork/heart.png">
        </div>
		
	</div>

	<div class="rightSection">
		<h2>Bài hát đã thích</h2>
		<p role="link" tabindex="0" ><?php echo $userLoggedIn->getFirstAndLastName(); ?></p>
		<p><?php echo $likedSongs->getNumberOfSongs(); ?> songs</p>

	</div>

</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $likedSongs->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$likedSong = new Song($con, $songId);
			$songArtist = $likedSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $likedSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $likedSong->getTitle() . "</span>
						<span class='artistName'>" . $songArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $likedSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/add.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . date("i:s", $likedSong->getDuration()) . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>


<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>







