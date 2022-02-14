
<?php
include("includes/db.php");


if(isset($_POST['album_delete'])){
    
    $delete_id = $_POST['album_delete'];
    
    $delete_album = "delete from albums where id='$delete_id'";
    $run_delete_album = mysqli_query($con,$delete_album);
    if($run_delete_album){
        echo "Album Has Been Deleted";
    } else{
        echo "Something has been wrong at delete_album.php'";
    }

}

?>

