<?php
	class LikedSongs {

		private $con;
        private $owner;

		public function __construct($con, $owner) {
			$this->con = $con;
            $this->owner = $owner;   
		}
        
        
        public function getOwner(){
            return $this->owner;
        }

        
        
        public function getNumberOfSongs(){
            
            
            $query = mysqli_query($this->con, "SELECT songid FROM likedSongs WHERE owner='$this->owner'");
            return mysqli_num_rows($query);
            
        }
        
        
             
        public function getSongIds(){
            
            
            $query = mysqli_query($this->con, "SELECT songId FROM likedSongs WHERE owner='$this->owner'");
            
            $array = array();
            
            while($row = mysqli_fetch_array($query)){
                
                array_push($array,$row['songId']);
                
            }
            
            return $array;
            
        }
        
	}
?>