<?php 
    require_once('frame_header.php'); 

	if(isset($_GET['albumid'])){
		$albumid=$_GET['albumid'];
	}
	else{
		header("Location: home.php");
	}

	$album=new Album($conn,$albumid);
?>
<br>
<div class="container-fluid">
	<div class="row">
	
		<div class="col-md text-primary">
			<span class="details">Album:</span> &nbsp;<?php echo $album->getalbumname() ?>
		</div>
		<div class="col-md text-primary">
			<?php echo $album->getNumber() ?>&nbsp; <span class="details">Songs</span>
		</div>
		<div class="col-md text-primary">
			<span class="details">Release Date</span> &nbsp; <?php echo $album->getAlbumReleaseDate() ?>
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