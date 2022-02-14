
<?php
include("includes/db.php");


if(isset($_POST['artist_delete'])){
    
    $delete_id = $_POST['artist_delete'];
    
    $delete_artist = "delete from artists where id='$delete_id'";
    $run_delete_artist = mysqli_query($con,$delete_artist);
    if($run_delete_artist){
        echo "Artist Has Been Deleted";
    } else{
        echo "Something has been wrong at delete_artist.php'";
    }

}

?>

