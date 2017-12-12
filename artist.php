<?php 
    require_once('frame_header.php'); 

	if(isset($_GET['artistid'])){
		$artistid=$_GET['artistid'];
		echo "<input type='hidden' class='artistid' value='$artistid'>";
	}
	else{
		header("Location: home.php");
	}

	$artist=new Artist($conn,$artistid);

	$userid = "gtong900";
	echo "<input type='hidden' class='userid' value='$userid'>";
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 text-primary">
			<span class="details">Artist:</span> &nbsp;<?php echo $artist->getTitle() ?>
			&nbsp;
			<img src='assets/images/icons/like_follow.png' class='like'>
		</div>
		<div class="col-md-6 text-primary">
			<span class="details">Artist Description</span> &nbsp; <?php echo $artist->getDescription() ?>
		</div>
		<div class="col-md-3 text-primary">
			<span class="details">Songs</span>&nbsp;<?php echo $artist->getNumber() ?> 
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
							<input type='hidden' class='td' value='$trackid'>
							<span class='trackName t'>" . $artistTrack->getTrackname() . "</span>
						</div>

						<div class='col-md-2'>
						     <input type='hidden' class='trackId' value='$trackid'>
							 <input type='hidden' class='ai' value='$artistid'>
						     <img class='optionsButton' src='assets/images/icons/more.png' style='float:left' onclick='showOptionMenu(this)'>							
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



<?php
	require_once("includes/optionsMenu.php");
	require_once('frame_footer.php');
 ?>