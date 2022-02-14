<?php
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }
    else {
        $admin_image_query= "select admin_image from admins where admin_id='$admin_id'";
        $run_admin_image_query = mysqli_query($con,$admin_image_query);
        $row_admin_image= mysqli_fetch_array($run_admin_image_query);
        $admin_image = $row_admin_image['admin_image'];
?>

        <div class="navbar-header" href="index.php?dashboard">
            <a href="index.php?dashboard" class="navbar-brand">
                LiveMusic Admin Panel
        </a>

        
            <div id="userProfile">
                <img src="<?php echo $admin_image;?>" alt='Avatar' class='avatar'>
            
                <b class="userName"> 
                    <?php echo $admin_name; ?>        
                </b>   
                <img src="assets\icons\dropdown.png" class="dropdown-icon">
                <div class="userProfile-content">
                    <a class="userProfile-item" href="index.php?user_profile=<?php echo $admin_id; ?>"> Profile </a>
                    <a class="userProfile-item"  href="logout.php"> Log Out </a>
                </div>

        
        </div><!-- navbar-header Ends -->

       

        <div class="sidenav"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->
            <ul id="navBarContainer"><!-- nav navbar-nav side-nav Starts -->

                <li><!-- dashboard li Starts -->
                    <a type="button" href="index.php?dashboard" class="collapsible">
                        <img src="assets\icons\dashboard.png" class="icon"> Dashboard
                    </a>
                </li><!-- dashboard li Ends -->

                <li><!-- Songs li Starts -->
                    <a type="button" class="collapsible">
                        <img src="assets\icons\songs.png" class="icon"> Songs
                        <img src="assets\icons\dropdown.png" class="dropdown-icon">
                    </a>

                    <ul id="songs" class="collapsible-content">
                        <li>
                            <a href="index.php?insert_song"> Insert Songs </a>
                        </li>
                        <li>
                            <a href="index.php?view_songs"> View Songs </a>
                        </li>
                    </ul>

                </li><!-- songs li Ends -->

                <li><!-- Albums Li Starts --->
                    <a type="button" class="collapsible">
                        <img src="assets\icons\albums.png" class="icon"> Albums
                        <img src="assets\icons\dropdown.png" class="dropdown-icon">
                    </a>

                    <ul id="albums" class="collapsible-content">
                        <li>
                            <a href="index.php?insert_album"> Insert Album </a>
                        </li>

                        <li>
                            <a href="index.php?view_albums"> View Albums </a>
                        </li>
                    </ul>

                </li><!-- Albums Li Ends --->

                <li><!-- Artist Li Starts -->

                    <a type="button" class="collapsible" >
                        <img src="assets\icons\artists.png" class="icon"> Artists
                        <img src="assets\icons\dropdown.png" class="dropdown-icon">
                    </a>

                    <ul id="artists" class="collapsible-content">
                        <li>
                            <a href="index.php?insert_artist"> Insert Artist </a>
                        </li>

                        <li>
                            <a href="index.php?view_artists"> View Artists </a>
                        </li>
                    </ul>

                </li><!-- Artists Li Ends -->


                <li><!-- Users li Starts -->

                    <a type="button" class="collapsible" >
                        <img class="icon" src="assets\icons\users.png"> Users
                        <img src="assets\icons\dropdown.png" class="dropdown-icon">
                    </a>

                <ul id="users" class="collapsible-content">

                    <li>
                        <a href="index.php?insert_user"> Insert User </a>
                    </li>

                    <li>
                        <a href="index.php?view_users"> View Users </a>
                    </li>

                </ul>

            </li><!-- Users li Ends -->
            

        <li><!-- Admin li Starts -->
            <a type="button" class="collapsible">
                <img src="assets\icons\admins.png" class="icon"> Admins
                <img src="assets\icons\dropdown.png" class="dropdown-icon">
            </a>

            <ul id="admins" class="collapsible-content">
                <li>
                    <a href="index.php?insert_admin"> Insert Admin </a>
                </li>

                <li>
                    <a href="index.php?view_admins"> View Admins </a>
                </li>

                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Profile </a>
                </li>
            </ul>

        </li><!-- Admin li Ends -->

        <li>
            <a href="logout.php" type="button" class="collapsible">
                <img src="assets\icons\logout.png" class="icon"> Log Out
            </a>
        </li><!-- li Ends -->

    </ul><!-- nav navbar-nav side-nav Ends -->

    </div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->


<?php } ?>

<script>
    var dropdown = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } 
            else {
                dropdownContent.style.display = "block";
            }
        });
    }
    // function myFunction() {
    //     document.getElementById("myDropdown").classList.toggle("show");
    //     }
    //     // Close the dropdown menu if the user clicks outside of it
    //     window.onclick = function(event) {
    //     if (!event.target.matches('.dropbtn')) {
    //         var dropdowns = document.getElementsByClassName("dropdown-content");
    //         var i;
    //         for (i = 0; i < dropdowns.length; i++) {
    //         var openDropdown = dropdowns[i];
    //         if (openDropdown.classList.contains('show')) {
    //             openDropdown.classList.remove('show');
    //         }
    //         }
    //     }
    // }
</script>