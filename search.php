<?php


include("includes/includedFiles.php");

$update_view_query = mysqli_query($con, "UPDATE views SET views = views + 1 WHERE id =1 ");

if(isset($_GET['term']))
    {

        $term = urldecode($_GET['term']);
    
    }


else{
    
    $term ="";
       
}
?>



<?php

if($term == "") 
    exit();

?>



<?php
        
    $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");
                
    if(mysqli_num_rows($songsQuery)!=0){
                
        echo "<div class='trackListContainer borderBottom'>
    
    
                <h2>BÀI HÁT PHỔ BIẾN</h2>
                
                <ul class='trackList'>";

        $songIdArray = array();
            
        $i=1;
        
        while($row = mysqli_fetch_array($songsQuery)){
            
            
            if($i > 15){
                
                break;
            }
            
            
        array_push($songIdArray, $row['id']);
             
        $albumSong = new Song($con, $row['id']);
        $albumArtist = $albumSong->getArtist();
            
        echo "<li class='trackListRow'>
            
            
            
            <div class='trackCount'>
            
                <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"".  $albumSong->getId()  . "\",tempPlaylist, true )' >
                <span class='trackNumber'>$i</span>
                
            
            
            </div>
            
            
            
            <div class='trackInfo'>
                
                <span class='trackName'>" . $albumSong->getTitle() . "</span>
                <span class='artistName'>".$albumArtist->getName() . "</span>
                
            
            
            </div>
            
            
            
       <div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/add.png' onclick='showOptionsMenu(this)'>
					</div>

            
            <div class='trackDuration'>
            
                <span class='duration'>". date("i:s", $albumSong->getDuration()) ."</span>
            
            
            </div>
            
            
            
            
             
            </li>
            </div>";
            
            
        $i++;
            
        }
                           
    }
            
?>
        
        

        
        <script>
        
        
            
            var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
            
            tempPlaylist = JSON.parse(tempSongIds);
            
 
        </script>
        
        
        
    
    
    
    
    </ul>
    



</div>






    
    
    
    <?php
    
    $artistsQuery = mysqli_query($con,"SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");
    
    
    if(mysqli_num_rows($artistsQuery)!=0){
                
                echo "<div class='artistsContainer borderBottom'>

                <h2>NGHỆ SĨ</h2>";
                
                
            
    
    
    
    while($row = mysqli_fetch_array($artistsQuery)){
        
        
        $artistFound = new Artist($con, $row['id']);
        
        echo "<div class='searchResultRow'>
        
            <span class='artistName'>
            
            
                <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" .  $artistFound->getId() ."\")'>
                
                    "
                    
                
                    . $artistFound->getName() .
                            
                    "
                
                </span>
            
                </div>
            
            
            </span>
            
        
        
        
            </div>
            </div>";
        
        
        
        
    }
}
    
    
    ?>








    
    
    
    <?php
    
    
        $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");
    
    
       if(mysqli_num_rows($albumQuery)!=0){
                
                echo "<div class='gridViewContainer'>


                <h2>ALBUMS</h2>";
                
                
            
    
    
        while($row = mysqli_fetch_array($albumQuery)){
        
       
        //echo $row['title'] . "<br>"; // just to check the title from database
        
        echo "<div class='gridViewItem'>
        
            <span  role ='link' tabIndex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")' >

                    <img src='" . $row['artworkPath'] . "'>

                    <div class='gridViewInfo'>"


                    . $row['title'] .


                    "</div>
                    
                    
                    </span>
        
        </div>
        
</div>";
        }
    }
?>

<?php
    
    if((mysqli_num_rows($songsQuery)==0) && (mysqli_num_rows($albumQuery)==0) && (mysqli_num_rows($artistsQuery)==0)){
                
                echo '<div class="trackListContainer borderBottom">
                <span class="noResults">No found matching with "' . $term . '"</span>
                </div>';
        
    }
    
    
?>
    

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>
