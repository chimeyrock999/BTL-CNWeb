<?php
include("../../config.php");


if(!isset($_POST['playlistId'])){
    
    echo "ERROR: Could not set Playlist ID";
    exit();
    
}

if (isset($_POST['submit'])){
    
    $filename = $_FILES["playlistArtwork"]["name"];
    $folder="assets/images/playlist-artwork/";
    $folder=$folder.basename($filename);

    if(move_uploaded_file($_FILES["playlistArtwork"]['tmp_name'], $folder)){
        $update = mysqli_query($con, "UPDATE playlists SET artworkPath = '$folder' WHERE id = '$id'");
        echo "Update successful!";
    }
    else{
        echo "false in updating Playist Artwork";
    }

}


?>
