<?php 
    require_once('frame_header.php'); 

	if(isset($_GET['artistid'])){
		$artistid=$_GET['artistid'];
	}
	else{
		header("Location: home.php");
	}

	$artist=new Artist($conn,$artistid);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md text-primary">
			<span class="details">Artist:</span> &nbsp;<?php echo $artist->getTitle() ?>
		</div>
		<div class="col-md text-primary">
			<span class="details">Artist Description</span> &nbsp; <?php echo $artist->getDescription() ?>
		</div>
		<div class="col-md text-primary">
			<?php echo $artist->getNumber() ?>&nbsp; <span class="details">Songs</span>
		</div>
		
	</div>


	<ul class="tracklist">
		<?php
		 	$trackIdArray=$artist->getTrackid();
		 	$i=1;

		 	foreach ($trackIdArray as $trackid) {


		 		$artistTrack=new Track($conn,$trackid);

		 		echo "<li class='row tracklistRow'>
						<div class='col-md-1'>
							<span class='counter'>$i</span>
						</div>

						<div class='col-md-5'>
							<span class='trackName'>" . $artistTrack->getTrackname() . "</span>
						</div>

						<div class='col-md-2'>
							<span class='artistName'>" . $artistTrack->getArtistitle() . "</span>
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