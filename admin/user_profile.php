<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}

else {
    if(isset($_GET['user_profile'])){
        $edit_id = $_GET['user_profile'];
        $get_admin = "select * from admins where admin_id='$edit_id'";
        $run_admin = mysqli_query($con,$get_admin);
        $row_admin = mysqli_fetch_array($run_admin);
        $admin_id = $row_admin['admin_id'];
        $admin_name = $row_admin['admin_name'];
        $admin_email = $row_admin['admin_email'];
        $new_admin_pass = $row_admin['admin_pass'];
        $admin_image = $row_admin['admin_image'];
        $new_admin_image = $row_admin['admin_image'];
        $admin_country = $row_admin['admin_country'];
        $admin_job = $row_admin['admin_job'];
        $admin_contact = $row_admin['admin_contact'];
        $admin_about = $row_admin['admin_about'];
    }

?>

    <div class="panel-title">
        <h1>Your Profile</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="admin-profile-form" method="post" enctype="multipart/form-data">
            <div class="collum">
                <div class="row">
                    <div class="col-25">
                        <label for="admin_name">Name</label>
                        
                    </div>
                    <div class="col-75">
                        <input type="text" id="admin_name" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>" placeholder="Your name...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="admin_email">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="admin_email" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>" placeholder="Your email...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="admin_pass">Password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="admin_pass" name="admin_pass" class="form-control"  placeholder="Your password...">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="admin_pass2">Confirm Password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="admin_pass2" name="admin_pass2" class="form-control" placeholder="Your password...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="admin_country">Address</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="admin_country" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>" placeholder="Your adress...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="admin_job" >Position</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="admin_job" name="admin_job" class="form-control" required value="<?php echo $admin_job; ?>" placeholder="Your position...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="admin_contact" >Contact</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="admin_contact" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>" placeholder="Your phone...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="admin_about">About</label>
                    </div>
                    <div class="col-75">
                        <textarea id="admin_about" name="admin_about" placeholder="Write something.." style="height:70px" class="form-control"><?php echo $admin_about; ?></textarea>
                    </div>
                </div>
            
            </div>
            <div class="collum"><!-- form-group Starts -->
                <label for="admin_image" class="admin_image">
                    <img class="admin_image" src="<?Php echo $admin_image; ?>" >
                </label>
                <input type="file" id="admin_image" name="admin_image" accept="image/*" class="form-control" >
            </div><!-- col-md-6 Ends -->
            <div class="submit-row">
                <button class="btn danger">
                      <a href="index.php?dashboard"> Cancel </a>
                </button>
                <input type="submit" name="update" value="Update">
            </div>

        </form><!-- form-horizontal Ends -->

    </div>

<?php

if(isset($_POST['update'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_pass2 = $_POST['admin_pass2'];
    $admin_country = $_POST['admin_country'];
    $admin_job = $_POST['admin_job'];
    $admin_contact = $_POST['admin_contact'];
    $admin_about = $_POST['admin_about'];
    $admin_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    $admin_image_path='assets/admin_image/'.$admin_image;
    move_uploaded_file($temp_admin_image,"assets/admin_image/$admin_image");

    if(empty($admin_image)){
        $admin_image_path = $new_admin_image;
    }
    if(empty($admin_pass)||empty($admin_pass2)){
        $admin_pass=$new_admin_pass;
    }
    else{
        if($admin_pass2==$admin_pass){
            $admin_pass=md5($admin_pass);
            $update_admin = "update admins set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_image='$admin_image_path',admin_contact='$admin_contact',admin_country='$admin_country',admin_job='$admin_job',admin_about='$admin_about' where admin_id='$admin_id'";
            $run_admin = mysqli_query($con,$update_admin);
        
            if($run_admin){
                echo "<script>alert('User Has Been Updated successfully and login again')</script>";
                echo "<script>window.open('login.php','_self')</script>";
                session_destroy();
            }
        }
        else{
            echo  "<script>alert('Your passwords do not match')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
    }
   
}


?>



<?php }  ?>