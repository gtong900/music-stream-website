<?php
	/**
	* 
	*/
	class Track
	{
		private $conn;
		private $trackid;
		private $trackname;
		private $trackduration;
		private $artistitle;

		public function __construct($conn,$trackid)
		{
			$this->conn=$conn;
			$this->trackid=$trackid;
			$trackQuery=mysqli_query($this->conn,"SELECT *
										FROM track t natural join artist a
										WHERE t.trackid='$this->trackid';");
			$track=mysqli_fetch_array($trackQuery);
			$this->trackname=$track['trackname'];
			$this->trackduration=$track['trackduration'];
			$this->artistitle=$track['artistitle'];
			$this->artistid=$track['artistid'];
		}

		public function getTrackname(){
			
			return $this->trackname;
		}

		public function getTrackduration(){
			
			return $this->trackduration;
		}


		public function getArtistitle(){
			
			return $this->artistitle;
		}

		public function getArtistid(){
			
			return $this->artistid;
		}
	}
?>