
<div id="userProfile">
    <?php 
        $picUrl=$userLoggedIn->getProfilePicture();
        echo "<img src='". $picUrl. "' alt='Avatar' class='avatar'> ";
    ?>

    <b class="userName"> 
        <?php echo $userLoggedIn->getFirstAndLastName();  ?>         
    </b>   
    <img src="assets\images\icons\dropDown.png" class="icon">
    <div class="userProfile-content">
        <a class="userProfile-item" onclick="openPage('updateDetails.php')"> Hồ sơ</a>
        <a class="userProfile-item" onclick="logout()"> Đăng xuất </a>
    </div>
    
</div>