<?php
include("../../config.php");


if(!isset($_POST['playlistId'])){
    
    echo "ERROR: Could not set Playlist ID";
    exit();
    
}



if(isset($_POST['name']) && $_POST['name'] != ""){
    
    $id = $_POST['playlistId'];
    $name = $_POST['name'];
    
    
    $update = mysqli_query($con, "UPDATE playlists SET name = '$name' WHERE id = '$id'");
    
    echo "Cập nhật thành công!";
    
}


else{
    
    echo "Bạn chưa nhập tên playlist";
    
    
}


?>


















