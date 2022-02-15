<?php


if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {

    if(isset($_GET['edit_artist'])){
        
        
        $edit_id = $_GET['edit_artist'];
        $get_artist = "select * from artists where id='$edit_id'";
        $run_artist = mysqli_query($con,$get_artist);
        $row_artist = mysqli_fetch_array($run_artist);
        $artist_name = $row_artist['name'];
    }

?>

    <div class="panel-name">
        <h1>Edit artist</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="artist-form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="artist_name">Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="artist_name" name="artist_name" class="form-control" required value="<?php echo $artist_name; ?>" placeholder="Name">
                    </div>
                </div>
           
                <div class="submit-row">
                    <button class="btn danger">
                      <a href="index.php?view_artists"> Cancel </a>
                    </button>
                    <input type="submit" name="update" value="Update">
                </div>
        </form>

    </div>

<?php

if(isset($_POST['update'])){
    $name = $_POST['artist_name'];

    $update_artist = "update artists set name='$name' where id='$edit_id'";
    $run_artist = mysqli_query($con,$update_artist);

    if($run_artist){
        echo "<script>alert('artist Has Been Updated Successfully!')</script>";
        echo "<script> window.open('index.php?view_artists','_self')</script>";
    }
}


?>


<?php }  ?>


