<?php

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE HTML>
    <html>

        <head>
            <title>Admin Login</title>
            <link rel="stylesheet" href="assets/css/login.css" >
        </head>

        <body>
        <div class="container">
            <form action="" method="post" class="form-login">
                <h2 class="form-login-heading">Login</h2>
                <label for="admin_email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="admin_email"  class="form-control" required>
                <label for="admin_pass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="admin_pass" required>
                <button type="submit" name="admin_login" >Login</button>
            </form>
      
        </div>
        </body>

    </html>

<?php

    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        $admin_pass = md5($admin_pass);
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin = mysqli_query($con,$get_admin);
        $count = mysqli_num_rows($run_admin);

        if($count==1){
            $_SESSION['admin_email']=$admin_email;
            //echo "<script>alert('You are Logged in into admin panel')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }
        else {
            echo "<script>alert('Email or Password is Wrong')</script>";
        }
    }

?>