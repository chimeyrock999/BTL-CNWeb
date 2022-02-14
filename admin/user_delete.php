
<?php
include("includes/db.php");


if(isset($_POST['user_delete'])){
    
    $delete_id = $_POST['user_delete'];
    
    $delete_user = "delete from users where id='$delete_id'";
    $run_delete_user = mysqli_query($con,$delete_user);
    if($run_delete_user){
        echo "User Has Been Deleted";
    } else{
        echo "Something has been wrong at user_delete.php'";
    }

}

?>

