<?php 
    require_once('frame_header.php'); 

	if(isset($_GET['pid'])){
		$pid=$_GET['pid'];
	}
	else{
		header("Location: home.php");
	}

	$playlist=new Playlist($conn,$pid);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md text-primary">
			<span class="details">Playlist:</span> &nbsp;<?php echo $playlist->getTitle() ?>
		</div>
		<div class="col-md text-primary">
			<span class="details">Created By</span> &nbsp; <?php echo $playlist->getOwner() ?>
		</div>
		<div class="col-md text-primary">
			<span class="details">Songs</span> &nbsp;<?php echo $playlist->getNumber() ?> 
		</div>
		<div class="col-md text-primary">
			<span class="details">Created At</span> &nbsp; <?php echo $playlist->getDate() ?>
		</div>
	</div>


	<ul class="tracklist">
		<?php
		 	$trackIdArray=$playlist->getTrackid();
		 	$i=1;

		 	foreach ($trackIdArray as $trackid) {


		 		$playlistTrack=new Track($conn,$trackid);

		 		echo "<li class='row tracklistRow'>
						<div class='col-md-1'>
							<span class='counter'>$i</span>
						</div>

						<div class='col-md-5'>
						    <input type='hidden' class='td' value='$trackid'>
							<span class='trackName t'>" . $playlistTrack->getTrackname() . "</span>
						</div>

						<div class='col-md-2'>
							<a href='artist.php?artistid=".$playlistTrack->getArtistid()."'><span class='artistName'>" . $playlistTrack->getArtistitle() . "</span></a>
						</div>

						<div class='col-md-2'>
							<input type='hidden' class='trackId' value='$trackid'>
							<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionMenu(this)'>
						</div>

						<div class='col-md-2'>
							<span class=''>" . "</span>
						</div>						
					  </li>";

			     $i = $i + 1;
		 	}
		?>


	</ul>
</div>
<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<div class="item">
	<?php echo Playlist::getPlaylistsDropdown($conn,'gtong900'); ?>
    </div>
	<div class="item" id="like">Like this artist</div>
</nav>


<?php require_once('frame_footer.php'); ?>