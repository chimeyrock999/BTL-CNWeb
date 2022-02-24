<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else {

?>
    
    <div class="panel-title">
        <h1> View Artists </h1>
    </div><!-- panel-title Ends -->  
    <div class="panel-body"><!-- panel-body Starts -->
        <table class="artist-table" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Artist</th>
                    <th>Songs</th>
                    <th>Albums</th>
                    <th>Played Times</th>
                    <th>Likes </th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>

            </thead>

            <tbody>

            <?php
                $i = 0;
                $get_artist = "select * from artists";
                $run_artist= mysqli_query($con,$get_artist);
                while($row_artist=mysqli_fetch_array($run_artist)){
                    $artist_id = $row_artist['id'];
                    $artist_name = $row_artist['name'];
                    $plays=0;
                    $likeds=0;

                    $get_song="select * from songs where artist='$artist_id'";
                    $run_song = mysqli_query($con,$get_song);
                    $artist_song = mysqli_num_rows($run_song);
                    while($row_song=mysqli_fetch_array($run_song)){
                        $song_id = $row_song['id'];
                        $get_liked = "select * from likedsongs where songid='$song_id'";
                        $run_liked= mysqli_query($con,$get_liked);
                        $song_liked = mysqli_num_rows($run_liked);
                        $likeds+=$song_liked;
                        $song_plays= $row_song['plays'];
                        $plays+=$song_plays;
                    }
                    $get_album="select * from albums where artist='$artist_id'";
                    $run_album = mysqli_query($con,$get_album);
                    $artist_album = mysqli_num_rows($run_album);

                    $i++;

            ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $artist_name; ?></td>
                    <td><?php echo $artist_song; ?></td>
                    <td><?php echo $artist_album; ?></td>
                    <td><?php echo $plays; ?></td>
                    <td><?php echo $likeds; ?></td>

                    <td>
                        <a onclick="deleteArtist( '<?php echo $artist_id; ?>')" >
                            <img class="icon" src="assets\icons\delete.png"> 
                        </a>
                    </td>

                    <td>
                        <a href="index.php?edit_artist=<?php echo $artist_id; ?>">
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
    function deleteArtist(artistId) {
        var prompt = confirm("Are you sure you want to delete this artist?");
        if(prompt == true) {

            $.post("delete_artist.php", {artist_delete: artistId })
            .done(
                function(response) {
                    alert(response);
                    window.open('index.php?view_artists','_self')
                });


	    }
    }
</script>