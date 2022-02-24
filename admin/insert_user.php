<?php



if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}

else {
    $new_user_image="assets/images/profile-pics/head_emerald.png";

?>
    <div class="panel-title">
        <h1>Insert User</h1>
    </div>
    <div class="panel-body" id="form-panel-body">
        <form class="admin-profile-form" method="post" enctype="multipart/form-data">
            <div class="collum">
                <div class="row">
                    <div class="col-25">
                        <label for="username">Username</label>
                        
                    </div>
                    <div class="col-75">
                        <input type="text" id="username" name="username" class="form-control" required placeholder="Username...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="user_fname">Firstname</label>
                        
                    </div>
                    <div class="col-75">
                        <input type="text" id="user_fname" name="user_fname" class="form-control" required placeholder="Firstname...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="user_lname">Lastname</label>
                        
                    </div>
                    <div class="col-75">
                        <input type="text" id="user_lname" name="user_lname" class="form-control" required placeholder="Lastname...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="user_email">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="user_email" name="user_email" class="form-control" required placeholder="Email...">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="user_pass">Password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="user_pass" name="user_pass" class="form-control" required  placeholder="Password...">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="user_pass2">Confirm Password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="user_pass2" name="user_pass2" class="form-control"  required placeholder="Password...">
                    </div>
                </div>
            </div>
            <div class="collum"><!-- form-group Starts -->
                <label for="user_image" class="admin_image">
                    <img class="admin_image" src="..\assets\images\artworks\default-arwork.png" >
                </label>
                <input type="file" id="user_image" name="user_image" accept="image/*" class="form-control" >
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
    $username = $_POST['username'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_pass2 = $_POST['user_pass2'];
    $user_image = $_FILES['user_image']['name'];
    $temp_user_image = $_FILES['user_image']['tmp_name'];
    $user_image_path='assets/image/profile-pics/'.$user_image;
    move_uploaded_file($temp_user_image,"../assets/image/profile-pics/".$user_image);
    $date=date("Y-m-d");

    if(empty($user_image)){
        $user_image_path = $new_user_image;
    }
    $get_username = "select * from users where username='$username'";
    $run_username = mysqli_query($con,$get_username);
    $check_username = (mysqli_num_rows($run_username)!=0);

    $get_email = "select * from users where email='$user_email'";
    $run_email = mysqli_query($con,$get_email);
    $check_email= (mysqli_num_rows($run_email)!=0);

    if($check_username){
        echo  "<script>alert('Username has been used!')</script>";
        echo "<script>window.open('index.php?insert_user','_self')</script>";
    }
    else{
        if ($check_email){
            echo  "<script>alert('Email has been used!')</script>";
            echo "<script>window.open('index.php?insert_user','_self')</script>";
        }
        else{
            if($user_pass2==$user_pass){
                $user_pass=md5($user_pass);
                $insert_user = "insert into users (username, firstname, lastname, email, password, date, profilePic) values ('$username','$user_fname','$user_lname','$user_email','$user_pass', '$date','$user_image_path')";
                $run_user = mysqli_query($con,$insert_user);
            
                if($run_user){
                    echo "<script>alert('User Has Been Updated Successfully')</script>";
                    echo "<script>window.open('index.php?view_users','_self')</script>";
                }
            }
            else{
                echo  "<script>alert('Your passwords do not match')</script>";
                echo "<script>window.open('index.php?insert_user','_self')</script>";
            }
        }
        
    }
   
}


?>



<?php }  ?>