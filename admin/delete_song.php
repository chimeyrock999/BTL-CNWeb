
<?php
include("includes/db.php");


if(isset($_POST['song_delete'])){
    
    $delete_id = $_POST['song_delete'];
    
    $delete_song = "delete from songs where id='$delete_id'";
    $run_delete_song = mysqli_query($con,$delete_song);
    if($run_delete_song){
        echo "Song Has Been Deleted";
    } else{
        echo "Something has been wrong at delete_song.php'";
    }

}

?>

