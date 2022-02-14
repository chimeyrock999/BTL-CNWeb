<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else {

?>
    <div class="panel-title">
        <h1> View Songs </h1>  
    </div>
    <div class="panel-body"><!-- panel-body Starts -->
        <table class="song-table" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Albums</th>
                    <th>Genre</th>
                    <th>Duration</th>
                    <th>Played</th>
                    <th>Likes </th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

            </thead>

            <tbody>

            <?php
                $i = 0;
                $get_song = "select * from songs";
                $run_song = mysqli_query($con,$get_song);
                while($row_song=mysqli_fetch_array($run_song)){
                    $song_id = $row_song['id'];
                    $song_title = $row_song['title'];

                    $song_album_id = $row_song['album'];
                    $get_song_album ="select * from albums where id='$song_album_id'";
                    $run_song_album = mysqli_query($con,$get_song_album);
                    $row_song_album = mysqli_fetch_array($run_song_album);
                    $song_album = $row_song_album['title'];

                    $song_artist_id = $row_song['artist'];
                    $get_song_artist ="select * from artists where id='$song_artist_id'";
                    $run_song_artist = mysqli_query($con,$get_song_artist);
                    $row_song_artist= mysqli_fetch_array($run_song_artist);
                    $song_artist = $row_song_artist['name'];

                    $song_genre = $row_song['genre'];
                    $song_duration = date("i:s", $row_song['duration']);
                    $song_plays= $row_song['plays'];

                    $get_liked = "select * from likedsongs where songid='$song_id'";
                    $run_liked= mysqli_query($con,$get_liked);
                    $song_liked = mysqli_num_rows($run_liked);

                    $i++;

            ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $song_title; ?></td>
                    <td><?php echo $song_artist; ?></td>
                    <td><?php echo $song_album; ?></td>
                    <td><?php echo $song_genre; ?></td>
                    <td><?php echo $song_duration; ?></td>
                    <td> <?php echo $song_plays; ?> </td>

                    <td><?php echo $song_liked; ?></td>

                    <td>
                        <a onclick="deleteSong( '<?php echo $song_id; ?>')" >
                            <img class="icon" src="assets\icons\delete.png"> 
                        </a>
                    </td>

                    <td>
                        <a href="index.php?edit_song=<?php echo $song_id; ?>">
                            <img class="icon" src="assets\icons\edit.png">
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table><!-- table table-bordered table-hover table-striped Ends -->
    </div><!-- table-responsive Ends -->



<?php } ?>

<script>
    function deleteSong(songId) {
        var prompt = confirm("Are you sure you want to delete this song?");
        if(prompt == true) {

            $.post("delete_song.php", {song_delete: songId })
            .done(
                function(response) {
                    alert(response);
                    window.open('index.php?view_songs','_self')
                });


	    }
    }
</script>