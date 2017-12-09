<?php
	/**
	* 
	*/
	class Playlist
	{
		private $conn;
		private $pid;
		private $ptitle;
		private $powner;
		private $pdate;

		public function __construct($conn,$pid)
		{
			$this->conn=$conn;
			$this->pid=$pid;
			$playlistQuery=mysqli_query($this->conn,"SELECT * FROM playlist WHERE pid='$this->pid'");
			$playlist=mysqli_fetch_array($playlistQuery);
			$this->ptitle=$playlist['ptitle'];
			$this->powner=$playlist['powner'];
			$this->pdate=$playlist['pdate'];
		}

		public function getTitle(){
			
			return $this->ptitle;
		}

		public function getOwner(){
			
			return $this->powner;
		}

		public function getDate(){
			
			return $this->pdate;
		}

		public function getNumber(){
			$playlistQuery=mysqli_query($this->conn,"SELECT trackid, porder FROM playlistcontent WHERE pid='$this->pid'");
			return mysqli_num_rows($playlistQuery);
		}

		public function getTrackid(){
			$playlistQuery=mysqli_query($this->conn,"SELECT trackid, porder FROM playlistcontent WHERE pid='$this->pid' ORDER BY porder");
			$array=array();
			while ($row=mysqli_fetch_array($playlistQuery)) {
				array_push($array, $row['trackid']);
			}
			return $array;
		}
	}
?>