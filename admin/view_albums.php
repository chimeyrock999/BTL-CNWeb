<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else {

?>
    <div class="panel-title">
        <h1> View Albums </h1><!-- panel-title Ends -->  
    </div>
    <div class="panel-body" ><!-- panel-body Starts -->
        <table class="album-table" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Songs</th>
                    <th>Played Times</th>
                    <th>Likes </th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

            </thead>

            <tbody>

            <?php
                $i = 0;
                $get_album = "select * from albums";
                $run_album= mysqli_query($con,$get_album);
                while($row_album=mysqli_fetch_array($run_album)){
                    $album_id = $row_album['id'];
                    $album_title = $row_album['title'];
                    $album_artist_id = $row_album['artist'];
                    $get_album_artist ="select * from artists where id='$album_artist_id'";
                    $run_album_artist = mysqli_query($con,$get_album_artist);
                    $row_album_artist= mysqli_fetch_array($run_album_artist);
                    $album_artist = $row_album_artist['name'];
                    $plays=0;
                    $likeds=0;

                    $get_song="select * from songs where album='$album_id'";
                    $run_song = mysqli_query($con,$get_song);
                    $album_song = mysqli_num_rows($run_song);
                    while($row_song=mysqli_fetch_array($run_song)){
                        $song_id = $row_song['id'];
                        $get_liked = "select * from likedsongs where songid='$song_id'";
                        $run_liked= mysqli_query($con,$get_liked);
                        $song_liked = mysqli_num_rows($run_liked);
                        $likeds+=$song_liked;
                        $song_plays= $row_song['plays'];
                        $plays+=$song_plays;
                    }

                    $i++;

            ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $album_title; ?></td>
                    <td><?php echo $album_artist; ?></td>
                    <td><?php echo $album_song; ?></td>
                    <td><?php echo $plays; ?></td>
                    <td><?php echo $likeds; ?></td>

                    <td>
                        <a onclick="deleteAlbum( '<?php echo $album_id; ?>')" >
                            <img class="icon" src="assets\icons\delete.png"> 
                        </a>
                    </td>

                    <td>
                        <a href="index.php?edit_album=<?php echo $album_id; ?>">
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
    function deleteAlbum(albumId) {
        var prompt = confirm("Are you sure you want to delete this album?");
        if(prompt == true) {

            $.post("delete_album.php", {album_delete: albumId })
            .done(
                function(response) {
                    alert(response);
                    window.open('index.php?view_albums','_self')
                });


	    }
    }
</script>