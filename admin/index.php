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
                        if(isset($_GET['dashboard'])){
                            include("dashboard.php");
                        }

                        if(isset($_GET['insert_song'])){
                            include("insert_song.php");
                        }

                        if(isset($_GET['view_songs'])){
                            include("view_songs.php");
                        }

                        if(isset($_GET['delete_song'])){
                            include("delete_song.php");
                        }

                        if(isset($_GET['edit_song'])){
                            include("edit_song.php");
                        }

                        if(isset($_GET['insert_artist'])){
                            include("insert_artist.php");
                        }

                        if(isset($_GET['view_artists'])){
                            include("view_artists.php");
                        }

                        if(isset($_GET['delete_artist'])){
                            include("delete_artist.php");
                        }

                        if(isset($_GET['edit_artist'])){
                            include("edit_artist.php");
                        }

                        if(isset($_GET['insert_ablum'])){
                            include("insert_album.php");
                        }

                        if(isset($_GET['view_albums'])){
                            include("view_albums.php");
                        }

                        if(isset($_GET['delete_album'])){
                            include("delete_album.php");
                        }

                        if(isset($_GET['edit_album'])){
                            include("edit_album.php");

                        }

                        if(isset($_GET['insert_admin'])){
                            include("insert_slide.php");
                        }

                        if(isset($_GET['view_admins'])){
                            include("view_admins.php");
                        }

                        if(isset($_GET['delete_admin'])){
                            include("delete_admin.php");
                        }


                        if(isset($_GET['view_users'])){
                            include("view_users.php");
                        }

                        if(isset($_GET['user_delete'])){
                            include("user_delete.php");
                        }
                        
                        if(isset($_GET['insert_user'])){
                            include("insert_user.php");
                        }

    if(isset($_GET['view_orders'])){

    include("view_orders.php");

    }

    if(isset($_GET['order_delete'])){

    include("order_delete.php");

    }


    if(isset($_GET['view_payments'])){

    include("view_payments.php");

    }

    if(isset($_GET['payment_delete'])){

    include("payment_delete.php");

    }




    if(isset($_GET['user_profile'])){

    include("user_profile.php");

    }

    if(isset($_GET['insert_box'])){

    include("insert_box.php");

    }

    if(isset($_GET['view_boxes'])){

    include("view_boxes.php");

    }

    if(isset($_GET['delete_box'])){

    include("delete_box.php");

    }

    if(isset($_GET['edit_box'])){

    include("edit_box.php");

    }

    if(isset($_GET['insert_term'])){

    include("insert_term.php");

    }

    if(isset($_GET['view_terms'])){

    include("view_terms.php");

    }

    if(isset($_GET['delete_term'])){

    include("delete_term.php");

    }

    if(isset($_GET['edit_term'])){

    include("edit_term.php");

    }

    if(isset($_GET['edit_css'])){

    include("edit_css.php");

    }

    if(isset($_GET['insert_manufacturer'])){

    include("insert_manufacturer.php");

    }

    if(isset($_GET['view_manufacturers'])){

    include("view_manufacturers.php");

    }

    if(isset($_GET['delete_manufacturer'])){

    include("delete_manufacturer.php");

    }

    if(isset($_GET['edit_manufacturer'])){

    include("edit_manufacturer.php");

    }


    if(isset($_GET['insert_coupon'])){

    include("insert_coupon.php");

    }

    if(isset($_GET['view_coupons'])){

    include("view_coupons.php");

    }

    if(isset($_GET['delete_coupon'])){

    include("delete_coupon.php");

    }


    if(isset($_GET['edit_coupon'])){

    include("edit_coupon.php");

    }


    if(isset($_GET['insert_icon'])){

    include("insert_icon.php");

    }


    if(isset($_GET['view_icons'])){

    include("view_icons.php");

    }

    if(isset($_GET['delete_icon'])){

    include("delete_icon.php");

    }

    if(isset($_GET['edit_icon'])){

    include("edit_icon.php");

    }

    if(isset($_GET['insert_bundle'])){

    include("insert_bundle.php");

    }

    if(isset($_GET['view_bundles'])){

    include("view_bundles.php");

    }

    if(isset($_GET['delete_bundle'])){

    include("delete_bundle.php");

    }


    if(isset($_GET['edit_bundle'])){

    include("edit_bundle.php");

    }


    if(isset($_GET['insert_rel'])){

    include("insert_rel.php");

    }

    if(isset($_GET['view_rel'])){

    include("view_rel.php");

    }

    if(isset($_GET['delete_rel'])){

    include("delete_rel.php");

    }


    if(isset($_GET['edit_rel'])){

    include("edit_rel.php");

    }


    if(isset($_GET['edit_contact_us'])){

    include("edit_contact_us.php");

    }

    if(isset($_GET['insert_enquiry'])){

    include("insert_enquiry.php");

    }


    if(isset($_GET['view_enquiry'])){

    include("view_enquiry.php");

    }

    if(isset($_GET['delete_enquiry'])){

    include("delete_enquiry.php");

    }

    if(isset($_GET['edit_enquiry'])){

    include("edit_enquiry.php");

    }


    if(isset($_GET['edit_about_us'])){

    include("edit_about_us.php");

    }


    if(isset($_GET['insert_store'])){

    include("insert_store.php");

    }

    if(isset($_GET['view_store'])){

    include("view_store.php");

    }

    if(isset($_GET['delete_store'])){

    include("delete_store.php");

    }

    if(isset($_GET['edit_store'])){

    include("edit_store.php");

    }

    ?>

    </div><!-- container-fluid Ends -->

    </div><!-- page-wrapper Ends -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    </body>


</html>

<?php } ?>