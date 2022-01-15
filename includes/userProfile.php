<?php 
    $term="";
?>
<div class="container-header">
    
    <div class="searchContainer">
        <img src="assets\images\icons\search.png" alt="" class="icon">
        <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Nghệ sĩ, bài hát hoặc album..." onfocus="this.value = this.value">

    </div>

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
</div>



<script>

    
$(".searchInput").focus();



$(function(){
    

    
    
    $(".searchInput").keyup(function(){
        clearTimeout(timer);
        timer = setTimeout(function(){
            var val = $(".searchInput").val();
            openPage("search.php?term=" + val);
        }, 500);
        
        
        
    })
    
    
    
})



</script>