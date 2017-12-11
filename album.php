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
			<span class="details">Album:</span> &nbsp;<?php echo $playlist->getTitle() ?>
		</div>
		<div class="col-md text-primary">
			<span class="details">Created By</span> &nbsp; <?php echo $playlist->getOwner() ?>
		</div>
		<div class="col-md text-primary">
			<?php echo $playlist->getNumber() ?>&nbsp; <span class="details">Songs</span>
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
							<span class='trackName'>" . $playlistTrack->getTrackname() . "</span>
						</div>

						<div class='col-md-2'>
							<span class='artistName'>" . $playlistTrack->getArtistitle() . "</span>
						</div>

						<div class='col-md-2'>
							<span class=''>" . "</span>
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



<?php require_once('frame_footer.php'); ?>