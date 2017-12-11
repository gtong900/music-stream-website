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
			//$track =array();
			$track= $this->getTrackInfo($this->conn,$trackid);
			$this->trackname=$track['trackname'];
			$this->trackduration=$track['trackduration'];
			$this->artistitle=$track['artistitle'];
			$this->artistid=$track['artistid'];
		}
		
		public function getTrackInfo($conn,$id){
			$trackQuery=mysqli_query($conn,"SELECT *
										FROM track t natural join artist a
										WHERE t.trackid='$id';");
			return mysqli_fetch_array($trackQuery);
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
		
		public function printTracks($conn,$trackIdArray,$wantDuration){
			$i=1;
			//heading
			echo "<li class='row tracklistRow'>
						<div class='col-md-1'>
							<span class='counter'></span>
						</div>

						<div class='col-md-5'>
							<span class='trackName'>Name</span>
						</div>

						<div class='col-md-2'>
							<span class='trackName'>Artist</span>
						</div>

						<div class='col-md-2'>
							<span class='trackName'>Options</span>
						</div>";
						if($wantDuration){
						echo"<div class='col-md-2'>
							<span class='trackName'>Duration</span>
						</div>";
						}						
					  echo"</li>";

		 	foreach ($trackIdArray as $trackid) {
				$track= Track::getTrackInfo($conn,$trackid);
				$duration = date("i:s",floor($track['trackduration']/1000));
				echo "<li class='row tracklistRow'>
						<div class='col-md-1'>
							<span class='counter'>$i</span>
						</div>

						<div class='col-md-5'>
							<span class='trackName'>" . $track['trackname'] . "</span>
						</div>

						<div class='col-md-2'>
							<a href='artist.php?artistid=".$track['artistid']."'><span class='artistName'>".$track['artistitle']."</span></a>
						</div>

						<div class='col-md-2'>
							<input type='hidden' class='trackId' value='$trackid'>
							<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionMenu(this)'>
						</div>";
						if($wantDuration){
						
						echo "<div class='col-md-2'>
							<span class=''>".$duration ."</span>
						</div>";		
						}
						//echo "</li><hr class='bg-danger'>";
					   $i = $i + 1;
			}
			
		}
	}
?>