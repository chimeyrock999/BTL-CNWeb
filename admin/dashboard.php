<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {
    $most_played_songs = array();
    $get_most_played_song = "select * from songs order by plays desc limit 10";
    $run_most_played_song = mysqli_query($con,$get_most_played_song);
    $most_played_songs = mysqli_fetch_all($run_most_played_song);

    $most_liked_songs = array();
    $get_most_liked_song = "select songid, count(songid) as liked from likedsongs group by songId order by liked desc limit 10";
    $run_most_liked_song = mysqli_query($con,$get_most_liked_song);
    $most_liked_songs=mysqli_fetch_all($run_most_liked_song);

?>
    <div class="panel-title">
        <h1 >Dashboard</h1>
    </div>
    <div class="panel-body">   
        <div class="dashboard-row">
            <div class="dashboard-item">
                <div class="dashboard-item-header">
                    <img src="assets\icons\eye.png" class="icon">
                    <div class="dashboard-item-right">
                        <b class="dashboard-item-number"> <?php echo $views; ?> </b>
                        <div class="dashboard-item-title">Views </div>
                    </div>
                    
                </div>
                <a class="dashboard-item-footer"> </a>
            </div>
            
            <div class="dashboard-item">
                <div class="dashboard-item-header">
                    <img src="assets\icons\songs.png" class="icon">
                    <div class="dashboard-item-right">
                        <b class="dashboard-item-number"> <?php echo $count_songs; ?> </b>
                        <div class="dashboard-item-title">Songs </div>
                    </div>

                </div>
                <div class="dashboard-item-footer">
                    <a href="index.php?view_songs" >
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <img class="arrow-icon" src="assets\icons\arrow.png"></span>
                    </a>
                </div>
                
            </div>
            
            <div class="dashboard-item">
                <div class="dashboard-item-header">
                    <img src="assets\icons\albums.png" class="icon">
                    <div class="dashboard-item-right">
                        <b class="dashboard-item-number"> <?php echo $count_albums; ?> </b>
                        <div class="dashboard-item-title">Albums</div>
                    </div>
                    
                </div>
                <div class="dashboard-item-footer">
                    <a href="index.php?view_albums" >
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <img class="arrow-icon" src="assets\icons\arrow.png"></span>
                    </a>
                </div>
                
            </div>

            <div class="dashboard-item">
                <div class="dashboard-item-header">
                    <img src="assets\icons\artists.png" class="icon">
                    <div class="dashboard-item-right">
                        <b class="dashboard-item-number"> <?php echo $count_artists; ?> </b>
                        <div class="dashboard-item-title">Artists</div>
                    </div>
                </div>
                <div class="dashboard-item-footer">
                    <a href="index.php?view_artists" >
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <img class="arrow-icon" src="assets\icons\arrow.png"></span>
                    </a>
                </div>
               
            </div>

            <div class="dashboard-item">
                <div class="dashboard-item-header">
                    <img src="assets\icons\users.png" class="icon">
                    <div class="dashboard-item-right">
                        <b class="dashboard-item-number"> <?php echo $count_users; ?> </b>
                        <div class="dashboard-item-title">Users</div>
                    </div>
                </div>
                <div class="dashboard-item-footer" >
                    <a href="index.php?view_users">
                        <span class="pull-left"> View Details </span>
                        <span class="pull-right"> <img class="arrow-icon" src="assets\icons\arrow.png"></span>
                    </a>
                </div>
                
            </div>

        </div>

        <div class="dashboard-row">
            <div class="dashboard-table">
                <div class="dashboard-table-title">
                    <b>Top 10 Most Played Songs</b>
                </div>

                <div class="dashboard-table-title">
                    <b>Top 10 Most Liked Songs</b>
                </div>

                <table class="song-table" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Albums</th>
                            <th>Played</th>
                            <th>No</th>
                            <th>Title</th>
                            <th>Artist</th>
                            <th>Albums</th>
                            <th>Liked</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                        $i = 0;
                        
                        
                        while($i<10){
                            $most_played_song = $most_played_songs[$i];
                            $most_played_song_id = $most_played_song[0];
                            $most_played_song_title = $most_played_song[1];

                            $most_played_song_album_id = $most_played_song[3];
                            $get_most_played_song_album ="select title from albums where id='$most_played_song_album_id'";
                            $run_most_played_song_album = mysqli_query($con,$get_most_played_song_album);
                            $row_most_played_song_album = mysqli_fetch_array($run_most_played_song_album);
                            $most_played_song_album = $row_most_played_song_album['title'];

                            $most_played_song_artist_id = $most_played_song[2];
                            $get_most_played_song_artist ="select name from artists where id='$most_played_song_artist_id'";
                            $run_most_played_song_artist = mysqli_query($con,$get_most_played_song_artist);
                            $row_most_played_song_artist= mysqli_fetch_array($run_most_played_song_artist);
                            $most_played_song_artist = $row_most_played_song_artist['name'];

                            $most_played_song_plays= $most_played_song[8];


                            $most_liked_song = $most_liked_songs[$i];
                            $most_liked_song_id = $most_liked_song[0];

                            $get_most_liked_song = "select * from songs where id='$most_liked_song_id'";
                            $run_most_liked_song = mysqli_query($con,$get_most_liked_song);
                            $row_most_liked_song= mysqli_fetch_array($run_most_liked_song);
                            $most_liked_song_title = $row_most_liked_song['title'];

                            $most_liked_song_album_id = $row_most_liked_song['album'];
                            $get_most_liked_song_album ="select title from albums where id='$most_liked_song_album_id'";
                            $run_most_liked_song_album = mysqli_query($con,$get_most_liked_song_album);
                            $row_most_liked_song_album = mysqli_fetch_array($run_most_liked_song_album);
                            $most_liked_song_album = $row_most_liked_song_album['title'];

                            $most_liked_song_artist_id = $row_most_liked_song['artist'];
                            $get_most_liked_song_artist ="select name from artists where id='$most_liked_song_artist_id'";
                            $run_most_liked_song_artist = mysqli_query($con,$get_most_liked_song_artist);
                            $row_most_liked_song_artist= mysqli_fetch_array($run_most_liked_song_artist);
                            $most_liked_song_artist = $row_most_liked_song_artist['name'];

                            $most_liked_song_liked= $most_liked_song[1];

                            $i++;

                    ?>

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $most_played_song_title; ?></td>
                            <td><?php echo $most_played_song_artist; ?></td>
                            <td><?php echo $most_played_song_album; ?></td>
                            <td> <?php echo $most_played_song_plays; ?> </td>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $most_liked_song_title; ?></td>
                            <td><?php echo $most_liked_song_artist; ?></td>
                            <td><?php echo $most_liked_song_album; ?></td>
                            <td> <?php echo $most_liked_song_liked; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>

<?php } ?>