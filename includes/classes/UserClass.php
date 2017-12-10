<?php
	/**
	* 
	*/
	class User
	{
		private $username;
		private $conn;
		private $usertitle;
		private $useremail;
		private $usercity;

		public function __construct($conn,$user_name)
		{		
			$this->conn=$conn;
			$this->$username = $user_name;
			$userQuery=mysqli_query($this->conn,"SELECT * FROM user WHERE username='{$this->username}'");
			$user=mysqli_fetch_array($userQuery);
			$this->usertitle=$user['uname'];
			$this->useremail=$user['email'];
			$this->usercity=$user['city'];
		}

		public function getusertitle(){
			
			return $this->usertitle;
		}

		public function getuseremail(){
			 
			return $this->useremail;
		}
		
		public function getusercity){
			 
			return $this->usercity;
		}
		
		public function getPublicPlaylist(){
			$userPlaylistsQuery = "SELECT * FROM playlist WHERE powner = '{$this->username}'";
			$result = mysqli_fetch_array($userPlaylistsQuery);
			return $result;
		}
		
		public function updateEmail($newEmail){
			$updateQuery = 	"UPDATE user
							SET username, uname, email, city, password"
			// WIP				
		
		
		}

	}
?>