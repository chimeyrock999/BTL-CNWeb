<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {

?>

    <div class="panel-title">
        <h1>Insert Artist</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="artist-form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="artist_name">Title</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="artist_name" name="artist_name" class="form-control" required placeholder="Name">
                    </div>
                </div>
                <div class="submit-row">
                    <button class="btn danger">
                      <a href="index.php?view_artists"> Cancel </a>
                    </button>
                    <input type="submit" name="post" value="Upload">
                </div>
        </form>

    </div>

<?php

if(isset($_POST['post'])){
    $name = $_POST['artist_name'];

    $post_artist = "insert into artists (id, name) values ('','$name')";
    $run_artist = mysqli_query($con,$post_artist); 

    if($run_artist){
        echo "<script>alert('Artist Has Been Uploaded Successfully!')</script>";
        echo "<script> window.open('index.php?view_artists','_self')</script>";
    }
    else{
        echo "<script>alert('Artist Name Has Been Duplicated!')</script>";
        echo "<script> window.open('index.php?view_artists','_self')</script>";
    }
}


?>


<?php }  ?>



