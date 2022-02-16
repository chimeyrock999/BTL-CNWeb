<?php

    session_start();
    include("includes/db.php");
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }

else {
    
    $admin_session = $_SESSION['admin_email'];
    $get_admin = "select * from admins where admin_email='$admin_session'";
    $run_admin = mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_image = $row_admin['admin_image'];
    $admin_country = $row_admin['admin_country'];
    $admin_job = $row_admin['admin_job'];
    $admin_contact = $row_admin['admin_contact'];
    $admin_about = $row_admin['admin_about'];

    $get_songs = "select * from songs";
    $run_songs = mysqli_query($con,$get_songs);
    $count_songs = mysqli_num_rows($run_songs);

    $get_users = "select * from users";
    $run_users = mysqli_query($con,$get_users);
    $count_users = mysqli_num_rows($run_users);

    $get_albums = "select * from albums";
    $run_albums = mysqli_query($con,$get_albums);
    $count_albums = mysqli_num_rows($run_albums);

    $get_artists = "select * from artists";
    $run_artists = mysqli_query($con,$get_artists);
    $count_artists = mysqli_num_rows($run_artists);

    $get_views = "select views from views where id=1";
    $run_views = mysqli_query($con,$get_views);
    $row_views=mysqli_fetch_array($run_views);
    $views = $row_views['views'];

?>


<!DOCTYPE html>
<html>

    <head>
        <title>LiveMusic Admin Panel</title>
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body>
            <?php include("includes/sidebar.php");  ?>
                <div id="page-wrapper"><!-- page-wrapper Starts -->
                    <div id="container"><!-- container-fluid Starts -->

                    <?php
                        $post=false;
                        if(isset($_GET['dashboard'])){
                            include("dashboard.php");
                            $post=true;
                        }

                        if(isset($_GET['insert_song'])){
                            include("insert_song.php");
                            $post=true;
                        }

                        if(isset($_GET['view_songs'])){
                            include("view_songs.php");
                            $post=true;
                        }

                        if(isset($_GET['delete_song'])){
                            include("delete_song.php");
                            $post=true;
                        }

                        if(isset($_GET['edit_song'])){
                            include("edit_song.php");
                            $post=true;
                        }

                        if(isset($_GET['insert_artist'])){
                            include("insert_artist.php");
                            $post=true;
                        }

                        if(isset($_GET['view_artists'])){
                            include("view_artists.php");
                            $post=true;
                        }

                        if(isset($_GET['delete_artist'])){
                            include("delete_artist.php");
                            $post=true;
                        }

                        if(isset($_GET['edit_artist'])){
                            include("edit_artist.php");
                            $post=true;
                        }

                        if(isset($_GET['insert_ablum'])){
                            include("insert_album.php");
                            $post=true;
                        }

                        if(isset($_GET['view_albums'])){
                            include("view_albums.php");
                            $post=true;
                        }

                        if(isset($_GET['delete_album'])){
                            include("delete_album.php");
                            $post=true;
                        }

                        if(isset($_GET['edit_album'])){
                            include("edit_album.php");
                            $post=true;
                        }

                        if(isset($_GET['insert_admin'])){
                            include("insert_admin.php");
                            $post=true;
                        }

                        if(isset($_GET['view_admins'])){
                            include("view_admins.php");
                            $post=true;
                        }

                        if(isset($_GET['delete_admin'])){
                            include("delete_admin.php");
                            $post=true;
                        }


                        if(isset($_GET['view_users'])){
                            include("view_users.php");
                            $post=true;
                        }

                        if(isset($_GET['user_delete'])){
                            include("user_delete.php");
                            $post=true;
                        }
                        
                        if(isset($_GET['insert_user'])){
                            include("insert_user.php");
                            $post=true;
                        }

                        if(isset($_GET['user_profile'])){
                            include("user_profile.php");
                            $post=true;
                        }

                        if (!$post){
                            include("dashboard.php");
                        }
    ?>

    </div><!-- container-fluid Ends -->

    </div><!-- page-wrapper Ends -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    </body>


</html>

<?php } ?>