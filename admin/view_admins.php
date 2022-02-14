<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
    <div class="panel-title">
        <h1>View Admin</h1>
    </div>
    <div class="panel-body">
        <table class="admin-table" ><!-- table table-bordered table-hover table-striped Starts -->

            <thead><!-- thead Starts -->

                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Adress</th>
                    <th>Position</th>
                    <th>Delete</th>

                </tr>

            </thead><!-- thead Ends -->

            <tbody><!-- tbody Starts -->

            <?php
                $i=1;
                $get_admin = "select * from admins";
                $run_admin = mysqli_query($con,$get_admin);

                while($row_admin = mysqli_fetch_array($run_admin)){
                    $admin_id = $row_admin['admin_id'];
                    $admin_name = $row_admin['admin_name'];
                    $admin_email = $row_admin['admin_email'];
                    $admin_image = $row_admin['admin_image'];
                    $admin_country = $row_admin['admin_country'];
                    $admin_job = $row_admin['admin_job'];
                    ?>

                    <tr>
                        <td> <?php echo $i; ?></td>
                        <td><?php echo $admin_name; ?></td>
                        <td><?php echo $admin_email; ?></td>
                        <td><img src="<?php echo $admin_image; ?>" width="60" height="60" ></td>
                        <td><?php echo $admin_country; ?></td>
                        <td><?php echo $admin_job; ?></td>
                        <td>
                            <a onclick="deleteAdmin('<?php echo $admin_id; ?>')" >
                                <img class="icon" src="assets\icons\delete.png"> 
                            </a>
                         </td>


                    </tr>


                <?php 
                    $i++;
                    } ?>

            </tbody><!-- tbody Ends -->

        </table><!-- table table-bordered table-hover table-striped Ends -->
    </div>

<?php }  ?>

<script>
    function deleteAdmin(adminId) {
        var prompt = confirm("Are you sure you want to delete this admin?");
        if(prompt == true) {

            $.post("user_delete.php", {admin_delete: adminId })
            .done(
                function(response) {
                    alert(response);
                    window.open('index.php?view_admin','_self')
                });


	    }
    }
</script>