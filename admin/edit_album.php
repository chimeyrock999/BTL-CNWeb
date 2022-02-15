<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {
    if(isset($_GET['edit_album'])){
        $edit_id = $_GET['edit_album'];
        $get_album = "select * from albums where id='$edit_id'";
        $run_album = mysqli_query($con,$get_album);
        $row_album = mysqli_fetch_array($run_album);
        $album_title = $row_album['title'];
        $album_artist = $row_album['artist'];
        $album_genre = $row_album['genre'];
        $album_image = $row_album['artworkPath'];
        $new_album_image = $row_album['artworkPath'];

        $get_album_artist ="select * from artists where id='$album_artist'";
        $run_album_artist = mysqli_query($con,$get_album_artist);
        $row_album_artist = mysqli_fetch_array($run_album_artist);
        $album_artist_name = $row_album_artist['name'];
    }

?>

    <div class="panel-title">
        <h1>Edit Album</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="admin-profile-form" method="post" enctype="multipart/form-data">
            <div class="collum">
                <div class="row">
                    <div class="col-25">
                        <label for="album_title">Title</label>
                        
                    </div>
                    <div class="col-75">
                        <input type="text" id="album_title" title="album_title" class="form-control" required value="<?php echo $album_title; ?>" placeholder="Your title...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="album_artist">Artist</label>
                    </div>
                    <div class="col-75">
                    <select id="album_artist" name="album_artist" class="form-control">
                      <option value="<?php echo $album_artist; ?>" selected>
                        <?php echo $album_artist_name; ?>
                      </option>

                        <?php

                        $get_artist = "select * from artists where id!='$album_artist'";
                        $run_artist = mysqli_query($con,$get_artist);

                        while($row_artist= mysqli_fetch_array($run_artist)){

                          $artist_id = $row_artist['id'];
                          $artist_name = $row_artist['name'];
                          echo "<option value='$artist_id'> $artist_name</option>";
                        }

                        ?>

                      </select>
                      
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="album_genre">Genre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="album_genre" title="album_genre" class="form-control" required value="<?php echo $album_genre; ?>" placeholder="Genre...">
                    </div>
                </div>

            </div>
            <div class="collum"><!-- form-group Starts -->
                <label for="album_image" class="admin_image">
                    <img class="admin_image" src="../<?php echo $album_image; ?>" >
                </label>
                <input type="file" id="album_image" title="album_image" accept="image/*" class="form-control" >
            </div><!-- col-md-6 Ends -->
            <div class="submit-row">
                <button class="btn danger">
                      <a href="index.php?view_albums"> Cancel </a>
                </button>
                <input type="submit" title="update" value="Update">
            </div>

        </form><!-- form-horizontal Ends -->

    </div>

<?php

if(isset($_POST['update'])){
    $album_title = $_POST['album_title'];
    $album_artist = $_POST['album_artist'];
    $album_genre = $_POST['album_genre'];
    $album_job = $_POST['album_job'];
    $album_about = $_POST['album_about'];
    $album_image = $_FILES['album_image']['name'];
    $temp_album_image = $_FILES['album_image']['tmp_name'];
    $album_image_path='assets/images/artworks/'.$album_image;
    move_uploaded_file($temp_album_image,"../assets/images/artworks/$album_image");

    if(empty($album_image)){
        $album_image_path = $new_album_image;
    }

    $update_album = "update albums set title='$album_title', artist='$album_artist', genre='$album_genre', artworkPath='$album_image_path' where id='$edit_id'";
    $run_album_update = mysqli_query($con,$update_album);

    if($run_album_update){
        echo "<script>alert('Album Has Been Updated Successfully')</script>";
        echo "<script>window.open('index.php?view_artists','_self')</script>";
    }
}


?>


<?php }  ?>