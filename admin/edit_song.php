<?php


if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {

    if(isset($_GET['edit_song'])){
        
        $edit_id = $_GET['edit_song'];
        $get_song = "select * from songs where id='$edit_id'";
        $run_song = mysqli_query($con,$get_song);
        $row_song = mysqli_fetch_array($run_song);
        $song_id = $edit_id;
        $song_title = $row_song['title'];
        $song_duration = $row_song['duration'];
        $song_path = $row_song['path'];
        $song_genre = $row_song['genre'];

        $song_album_id = $row_song['album'];
        $get_song_album ="select * from albums where id='$song_album_id'";
        $run_song_album = mysqli_query($con,$get_song_album);
        $row_song_album = mysqli_fetch_array($run_song_album);
        $song_album = $row_song_album['title'];
    }

?>

    <div class="panel-title">
        <h1>Edit Song</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="song-form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="song_name">Title</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="song_name" name="song_name" class="form-control" required value="<?php echo $song_title; ?>" placeholder="Title...">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="song_genre">Genre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="song_genre" name="song_genre" class="form-control" required value="<?php echo $song_genre; ?>" placeholder="Title...">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="song_album">Album</label>
                    </div>
                    <div class="col-75">
                    <select id="song_album" name="song_album" class="form-control">
                      <option value="<?php echo $song_album_id; ?>" selected>
                        <?php echo $song_album; ?>
                      </option>

                        <?php

                        $get_album = "select * from albums where id!='$song_album_id'";
                        $run_album = mysqli_query($con,$get_album);

                        while($row_album= mysqli_fetch_array($run_album)){

                          $album_id = $row_album['id'];
                          $album_title = $row_album['title'];
                          echo "<option value='$album_id'> $album_title</option>";
                        }

                        ?>

                      </select>
                      
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="song_duration">Duration</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="song_duration" name="song_duration" required pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}"
                            class="form-control" value="00:<?php echo date("i:s", $song_duration); ?>" placeholder="hh:mm:ss">
                    </div>
                </div>
                <div class="row">
                  <div class="col-25">
                      <label for="song_file" class="song_file">File</label>
                  </div>
                  <div class="col-75">
                    <input type="file" id="song_file" name="song_file" accept="audio/*" class="form-control">
                </div>
                <div class="submit-row">
                    <button class="btn danger">
                      <a href="index.php?view_songs"> Cancel </a>
                    </button>
                    <input type="submit" name="update" value="Update">
                </div>
        </form>

    </div>

<?php

if(isset($_POST['update'])){
    $title = $_POST['song_name'];
    $album = $_POST['song_album'];
    $genre =$_POST['song_genre'];
    $song_duration = $_POST['song_duration'];
    $durations=explode(":",$song_duration);
    $duration=((int)$durations[0])*3600+((int)$durations[1])*60+((int)$durations[2]);    
    
    $get_album_order= "select albumOrder from songs where album='$album' order by albumOrder desc limit 1" ;
    $run_album_order = mysqli_query($con, $get_album_order);
    $row_album_order = mysqli_fetch_array($run_album_order);
    $album_order = $row_album_order['albumOrder']+1;

    $get_artist= "select artist from albums where id='$album'";
    $run_artist = mysqli_query($con, $get_artist);
    $row_artist = mysqli_fetch_array($run_artist);
    $artist=$row_artist['artist'];

    $song_file = $_FILES['song_file']['name'];
    $temp_song_file = $_FILES['song_file']['tmp_name'];
    $song_file_path='assets/music/'.$song_file;
    move_uploaded_file($temp_song_file,"../assets/music/$song_file");

    if(empty($song_file)){
        $song_file_path = $song_path;
    }

    $update_song = "update songs set title='$title',genre = '$genre',artist='$artist',album='$album', path='$song_file_path', albumOrder = '$album_order', duration='$duration' where id='$edit_id'";
    $run_song = mysqli_query($con,$update_song);

    if($run_song){
        echo "<script>alert('Song Has Been Updated Successfully!')</script>";
        echo "<script> window.open('index.php?view_songs','_self')</script>";
    }
}


?>


<?php }  ?>


