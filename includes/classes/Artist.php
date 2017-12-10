<?php
	/**
	* 
	*/
	class Artist
	{
		private $conn;
		private $artistid;
		private $artisttitle;
		private $artistdescription;

		public function __construct($conn,$artistid)
		{
			$this->conn=$conn;
			$this->artistid=$artistid;
			$artistQuery=mysqli_query($this->conn,"SELECT * FROM artist WHERE artistid='{$this->artistid}'");
			$artist=mysqli_fetch_array($artistQuery);
			$this->artisttitle=$artist['artistitle'];
			$this->artistdescription=$artist['artistdescription'];
		}

		public function getTitle(){
			
			return $this->artisttitle;
		}

		public function getDescription(){
			
			return $this->artistdescription;
		}

		public function getNumber(){ // get the number of tracks by this artist
			$Query=mysqli_query($this->conn,"SELECT trackid FROM track 
			WHERE artistid='$this->artistid' ");
			return mysqli_num_rows($Query);
		}

		public function getTrackid(){
			$Query=mysqli_query($this->conn,"SELECT trackid FROM track 
			WHERE artistid='$this->artistid' ");
			$array=array();
			while ($row=mysqli_fetch_array($Query)) {
				array_push($array, $row['trackid']);
			}
			return $array;
		}
	}
?>