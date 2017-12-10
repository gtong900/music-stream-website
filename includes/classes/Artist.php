<?php
	/**
	* 
	*/
	class classArtist
	{
		private $conn;
		private $artistid;
		private $artisttitle;
		private $artistdescription;

		public function __construct($conn,$artistid)
		{
			$this->conn=$conn;
			$this->artistid=$artistid;
			$artistQuery=mysqli_query($this->conn,"SELECT * FROM artist WHERE artistid='$this->artistid'");
			$artist=mysqli_fetch_array($playlistQuery);
			$this->ptitle=$playlist['ptitle'];
			$this->powner=$playlist['powner'];
			$this->pdate=$playlist['pdate'];
		}

		public function getTitle(){
			
			return $this->artisttitle;
		}

		public function getDescription(){
			
			return $this->artistdescription;
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