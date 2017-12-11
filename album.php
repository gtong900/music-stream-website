<?php
	/**
	* 
	*/
	class Album
	{
		private $conn;
		private $albumid;
		private $artisttitle;
		private $artistdescription;
		private $num_ofTracks;

		public function __construct($conn,$albumid)
		{
			$this->conn=$conn;
			$this->albumid=$albumid;
			$albumQuery=mysqli_query($this->conn,"SELECT * FROM album WHERE albumid='{$this->albumid}'");
			$album=mysqli_fetch_array($albumQuery);
			$this->albumname=$album['albumname'];
			$this->albumreleasedate=$album['albumreleasedate'];			
			$albumContentQuery=mysqli_query($this->conn,"SELECT * FROM Albumcontent WHERE albumid='{$this->albumid}'");
			$num_ofTracks=mysqli_num_rows($albumContentQuery);
		}

		public function getalbumname(){
			
			return $this->albumname;
		}

		public function getAlbumReleaseDate(){
			
			return $this->albumreleasedate;
		}
		
		public function getNumber(){ // get the number of tracks in this album
			return $this->num_ofTracks;
		}

		public function getTrackid(){
			$array=array();
			while ($row=mysqli_fetch_array($Query)) {
				array_push($array, $row['trackid']);
			}
			return $array;
		}
	}
?>