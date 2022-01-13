<?php


include("includes/includedFiles.php");




?>




<div class="userDetails">


    <div class="container borderBottom">
    
        <h2>EMAIL</h2>
        
        <input type="text" class="email" name="email" placeholder="Email address..." value="<?php  echo $userLoggedIn->getEmail(); ?>">
        <span class="message"></span>
        <button class="button" onclick="updateEmail('email')">LƯU</button>
        
        
    </div>
    
    
    

    <div class="container">
        <h2>MẬT KHẨU</h2>
        
                <input type="password" class="oldPassword" name="oldPassword" placeholder="Mật khẩu hiện tại">
                <input type="password" class="newPassword1" name="newPassword1" placeholder="Mật khẩu mới">
                <input type="password" class="newPassword2" name="newPassword2" placeholder="Nhập lại mật khẩu mới">
                <span class="message"></span>
                <button class="button" onclick="updatePassword('oldPassword','newPassword1','newPassword2')">LƯU</button>

    </div>
    
    
</div>


















