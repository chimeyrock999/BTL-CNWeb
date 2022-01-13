<div id="navBarContainer">
            
    <nav class="navBar">
                
        <span  role ="link" tabIndex="0" onclick="openPage('index.php')" class="logo">            
            <img src="assets/images/logo/logo1.png">      
            <h1> Live Music</h1>                 
        </span>
                    
                    
        <div class="group">  
            
            <div class="navItem" onclick="openPage('home.php')">
                <div  role ="link" tabIndex="0"  class="navItemLink">
                    <span class="navItemTitle">Trang chủ</span>
                    <img src="assets/images/icons/home.png" class="icon" alt="home">
                </div>          
            </div>     

            <div class="navItem" onclick='openPage("search.php")'>           
                <div  role ='link' tabIndex='0'  class="navItemLink" >           
                    <span class="navItemTitle">Tìm kiếm </span>    
                    <img src="assets/images/icons/search.png" class="icon" alt="Search">     
                </div>       
            </div>


            
            <div class="navItem"  onclick="openPage('library.php')">
                <div  role ="link" tabIndex="0" class="navItemLink">
                <img src="assets/images/icons/library.png" class="icon" alt="Library">      
                <span class="navItemTitle"> Thư viện </span>
                </div>
            </div>

        </div>    
                       
        <div class="group">

            <div class="navItem" onclick="openPage('createPlaylist.php')">
                <div role ="link" tabIndex="0"  class="navItemlink">
                    <span class="navItemTitle">Tạo playlist</span>
                    <img src="assets/images/icons/addPlaylist.png" class="icon" alt="addPlayList">
                </div>
            </div>

            <?php
			    $username = $userLoggedIn->getUsername();

			    $playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username'");

			    while($row = mysqli_fetch_array($playlistsQuery)) {

				    $playlist = new Playlist($con, $row);

				    echo "<div class='navItem'>
                            <span role='link' tabIndex='0' onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'
                            class='navItemTitle'>"
                            . $playlist->getName() . "</span>
                            </div>";
                }
		    ?>

               
        </div>
                    
                
                </nav>
            
            
            </div>