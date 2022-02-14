<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else {

?>
    <div class="panel-title">
        <h1 >View Users</h1>
    </div>

    <div class="panel-body">
        <table class="user-table" ><!-- table table-bordered table-hover table-striped Starts -->
            <thead><!-- thead Starts -->

                <tr>
                    <th>No</th>
                    <th>Username </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Playlists</th>
                    <th>Liked Songs</th>
                    <th>Delete</th>
                </tr>

            </thead><!-- thead Ends -->


            <tbody><!-- tbody Starts -->

                <?php

                $i=0;

                $get_users = "select * from users";

                $run_users = mysqli_query($con,$get_users);

                while($row_user=mysqli_fetch_array($run_users)){

                    $user_id = $row_user['id'];
                    $username = $row_user['username'];
                    $user_name = $row_user['firstname']. " ".  $row_user['lastname'];
                    $user_email = $row_user['email'];

                    $user_image = $row_user['profilePic'];

                    $get_num_playlists = "select * from playlists where owner='$username'";
                    $run_num_playlists= mysqli_query($con,$get_num_playlists);
                    $num_playlists = mysqli_num_rows($run_num_playlists);

                    $get_num_liked = "select * from likedsongs where owner='$username'";
                    $run_num_liked= mysqli_query($con,$get_num_liked);
                    $num_liked = mysqli_num_rows($run_num_liked);

                    $i++;

                ?>

                <tr>

                    <td><?php echo $i; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><img src="../<?php echo $user_image; ?>" width="60" height="60" ></td>
                    <td><?php echo $num_playlists; ?></td>
                    <td><?php echo $num_liked; ?></td>
                    <td>
                        <a onclick="deleteUser('<?php echo $user_id; ?>')" >
                            <img class="icon" src="assets\icons\delete.png"> 
                        </a>
                    </td>
                </tr>

                <?php } ?>


            </tbody><!-- tbody Ends -->
        </table><!-- table table-bordered table-hover table-striped Ends -->
    </div>

<?php } ?>
<script>
    function deleteUser(userId) {
        var prompt = confirm("Are you sure you want to delete this user?");
        if(prompt == true) {

            $.post("user_delete.php", {user_delete: userId })
            .done(
                function(response) {
                    alert(response);
                    window.open('index.php?view_users','_self')
                });


	    }
    }
</script>
