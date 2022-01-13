<?php

ob_start(); // to start ouput buffering data to database
session_start(); // to start a session


$timezone = date_default_timezone_set("Asia/Ho_Chi_Minh");
$con = mysqli_connect("localhost","root", "", "musicwebapp");

if(mysqli_connect_errno()){
    
    echo "Failed to connect: " . mysqli_connect_errno();
    
    
}



?>
