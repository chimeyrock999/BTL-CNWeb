<?php 
include("includes/includedFiles.php"); 

?>
                
                
       
<?php
    $now=date("H");
    $title ="";
    if ((0<=$now) && ($now<=11)){
        $title="Buổi sáng tốt lành";
    }
    if ((11<$now) && ($now<=18)){
        $title="Chào buổi chiều";
    }
    if (18<$now){
        $title="Buổi tối vui vẻ";
    }
    echo "<h1 class='pageHeadingBig'>" . $title . "</h1>"
?>


<div class="gridViewContainer">


    <?php
    
    
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 20");
    
        while($row = mysqli_fetch_array($albumQuery)){
        
       
        //echo $row['title'] . "<br>"; // just to check the title from database
        
        echo "<div class='gridViewItem'>
        
            <span  role ='link' tabIndex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")' >

                    <img src='" . $row['artworkPath'] . "'>

                    <div class='gridViewInfo'>"


                    . $row['title'] .


                    "</div>
                    
                    
                    </span>
        
        </div>";
        
        
        
        
        
    }
    
    
    ?>
    

</div>

             