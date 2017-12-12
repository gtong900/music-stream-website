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
			$this->username = $user_name;
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
		
		public function getusername(){
			 
			return $this->username;
		}
		
		public function getusercity(){
			 
			return $this->usercity;
		}
		
		public function getUserAllPlaylist(){
			$userPlaylistsQuery = "SELECT * FROM playlist WHERE powner = '{$this->username}'";
			$result = mysqli_query($this->conn,$userPlaylistsQuery);
			return $result;
		}
		
		public function getUserPublicPlaylist(){
			$userPlaylistsQuery = "SELECT * FROM playlist WHERE powner = '{$this->username}' AND public != 0";
			$result = mysqli_query($this->conn,$userPlaylistsQuery);
			return $result;
		}
		
		public function getUserLikes(){
			$Query = "SELECT * FROM likes WHERE username = '{$this->username}'";
			$result = mysqli_query($this->conn,$Query);
			return $result;
		}
		
		public function getUserFollows(){
			$Query = "SELECT * FROM follows WHERE follower = '{$this->username}'";
			$result = mysqli_query($this->conn,$Query);
			return $result;
		}
		
		public function updateEmail(){
			$updateQuery = 	"UPDATE user
							SET username, uname, email, city, password";
			// WIP				
		
		
		}
		
	}
?>