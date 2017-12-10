<?php 
    require_once('frame_header.php'); 

	// should check session first. if not go back to index.php
	//for testing 
	$userid = "gtong900";
	//$userid = $_SESSION["loginUsername"];
	$user = new User($conn,$userid);

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md text-primary">
			<span class="details">Userid:</span> &nbsp;<?php echo $user->getTitle() ?>
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