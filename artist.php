<?php 
    require_once('frame_header.php'); 
	
	verifyUserSession();
	
	$userid = $_SESSION["loginUsername"];

	if(isset($_GET['artistid'])){
		$artistid=$_GET['artistid'];
		echo "<input type='hidden' class='artistid' value='$artistid'>";
	}
	else{
		header("Location: user.php");
	}

	$artist=new Artist($conn,$artistid);

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
				
			$array=array();
		 	foreach ($trackIdArray as $trackid) {
			array_push($array,$trackid);

		 	}
			Track::printTracks($conn,$array,true,false)

		?>


	</ul>


</div>



<?php
	require_once("includes/optionsMenu.php");
	require_once('frame_footer.php');
 ?>