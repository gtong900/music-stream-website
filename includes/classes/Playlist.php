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

		public static function getPlaylistsDropdown($conn,$username){
			$dropdown='	<div class="dropdown">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Add to playlist</button>
						<div class="dropdown-menu dropdown-menu-left">';
			$query=mysqli_query($conn,"SELECT p.pid, p.ptitle
										FROM playlist p
										WHERE powner='$username'
										ORDER BY p.pdate");
			while ($row=mysqli_fetch_array($query)) {
				$pid=$row['pid'];
				$ptitle=$row['ptitle'];
				$dropdown=$dropdown."<input type='hidden' class='playlistId' value='$pid'>
										<span class='dropdown-item'>$ptitle</span>";
			}
			return $dropdown."</div>
							</div>";
		}
		
		public function printPlaylist($conn,$playlistArray,$wantCreationDate){
			$i=1;
			//heading
			echo "<li class='row tracklistRow'>
						<div class='col-md-5'>
							<span class='trackName'>Name</span>
						</div>

						<div class='col-md-5'>
							<span class='trackName'>Created by</span>
						</div>";
						
						if($wantCreationDate){
						echo"<div class='col-md-5'>
							<span class='Created on'>Created on</span>
						</div>";
						}						
					  echo"</li>";

		 	foreach ($playlistArray as $pid) {
				$playlist= new Playlist($conn,$pid);
				
				echo "<li class='row tracklistRow'>
						<div class='col-md-5'>
							<a href='playlist.php?pid=".$pid."'><span class='artistName'>".$playlist->getTitle()."</span></a>
						</div>

						<div class='col-md-5'>
							<a href='user.php?username=".$playlist->getOwner()."'><span class='artistName'>".$playlist->getOwner()."</span></a>
						</div>";
						if($wantCreationDate){
						
						echo "<div class='col-md-5'>
							<span class=''>".$playlist->getDate()."</span>
						</div>";		
						}
						//echo "</li><hr class='bg-danger'>";
					   $i = $i + 1;
			}
			
		}
	}
?>