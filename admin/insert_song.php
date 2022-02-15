<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {

?>

    <div class="panel-title">
        <h1>Insert Song</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="song-form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="song_name">Title</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="song_name" name="song_name" class="form-control" required placeholder="Title...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="song_name">Genre</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="song_genre" name="song_genre" class="form-control" required placeholder="Genre...">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="song_album">Album</label>
                    </div>
                    <div class="col-75">
                    <select id="song_album" name="song_album" class="form-control">
                        <?php

                        $get_album = "select * from albums";
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
                            class="form-control" placeholder="hh:mm:ss">
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
                    <input type="submit" name="post" value="Upload">
                </div>
        </form>

    </div>

<?php

if(isset($_POST['post'])){
    $title = $_POST['song_name'];
    $album = $_POST['song_album'];
    $genre =  $_POST['song_genre'];

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

    $post_song = "insert into songs (title, artist, album, genre,  path, duration, albumOrder) values ('$title','$artist','$album','$genre', '$song_file_path','$duration','$album_order')";
    $run_song = mysqli_query($con,$post_song);

    if($run_song){
        echo "<script>alert('Song Has Been Uploaded Successfully!')</script>";
        echo "<script> window.open('index.php?view_songs','_self')</script>";
    }
}


?>


<?php }  ?>



