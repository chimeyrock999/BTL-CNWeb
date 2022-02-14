<?php
    include("includes/db.php");

    if(isset($_POST['admin_delete'])){

        $delete_id = $_POST['admin_delete'];
        $delete_admin = "delete from admins where admin_id='$delete_id'";
        $run_delete = mysqli_query($con,$delete_admin);

        if($run_delete){
            echo "Admin Has Been Deleted";
        } else{
            echo "Something has been wrong at admin_delete.php'";
        }

    }

?>

