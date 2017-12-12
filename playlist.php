<?php 
    require_once('frame_header.php'); 
	
	verifyUserSession();
	
	$userid = $_SESSION["loginUsername"];

	if(isset($_GET['pid'])){
		$pid=$_GET['pid'];
	}
	else{
		header("Location: user.php");
	}

	$playlist=new Playlist($conn,$pid);

	echo "<input type='hidden' class='userid' value='$userid'>";
	echo "<input type='hidden' class='pid' value='$pid'>";
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
			$array=array();
		 	foreach ($trackIdArray as $trackid) {
			array_push($array,$trackid);

		 	}
			Track::printTracks($conn,$array,true,true)
		?>


	</ul>
</div>


<?php 
    require_once("includes/optionsMenu.php");
	require_once('frame_footer.php'); 
?>