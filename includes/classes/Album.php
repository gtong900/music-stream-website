<?php
	/**
	* 
	*/
	class Album
	{
		private $conn;
		private $pid;

		public function __construct($conn,$pid)
		{
			$this->conn=$conn;
			$this->pid=$pid;
		}

		public function getTitle(){
			$playlistQuery=mysqli_query($this->conn,"SELECT ptitle FROM album WHERE pid='$this->pid'");
			$title=mysqli_fetch_array($playlistQuery);
			return $title;
		}
	}
?>