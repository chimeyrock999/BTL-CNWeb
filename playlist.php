<?php 
	include("includes/includedFiles.php"); 

	if(isset($_GET['id'])) {
		$playlistId = $_GET['id'];
	}
	else {
		header("Location: index.php");
	}

	$playlist = new Playlist($con, $playlistId);
	$owner = new User($con, $playlist->getOwner());
?>

	<div class="entityInfo">
		<div class="leftSection">
			<form class="leftSectionImage" enctype="multipart/form-data" id="playlistArtworkForm">
				<label for="artwork-input" > 
					<img src="<?php echo $playlist->getArtworkPath(); ?> ">
				</label>
				<input type="text" name="playlistId" value="<?php echo $playlistId; ?>">
				<input id="artwork-input" type="file" name="playlistArtwork" onchange="submitImageForm('<?php echo $playlistId; ?>', 'playlistArtwork' )"> 
			</form>
	</div>
	<div class="rightSection">
		<input type="text" class="playlist-name" name="playlist-name" placeholder="Tên playlist..." value="<?php echo $playlist->getName(); ?>">
		<span class="message"></span>
		<p>Tạo bởi <?php echo $owner-> getFirstAndLastName(); ?></p>
		<p><?php echo $playlist->getNumberOfSongs(); ?> bài hát</p>
		<button class="button id" onclick="updatePlaylistName('<?php echo $playlistId; ?>', 'playlist-name')">LƯU</button>
		<button class="button id"  onclick="deletePlaylist('<?php echo $playlistId; ?>')">XÓA</button>
	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $playlist->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$playlistSong = new Song($con, $songId);
			$songArtist = $playlistSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $playlistSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $playlistSong->getTitle() . "</span>
						<span class='artistName'>" . $songArtist->getName() . "</span>
					</div>

			<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $playlistSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/add.png' onclick='showOptionsMenu(this)'>
					</div>


					<div class='trackDuration'>
						<span class='duration'>" .date("i:s", $playlistSong->getDuration()) . "</span>
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
    <div class="item" onclick="removeFromPlaylist(this, '<?php   echo $playlistId;?>')">Xóa khỏi playlist</div>
    
    
    
    
</nav>














