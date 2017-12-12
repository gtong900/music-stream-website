<?php 
    require_once('frame_header.php'); 

	verifyUserSession();
	
	$userid = $_SESSION["loginUsername"];
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
		 	$trackIdArray=$album->getTrackid();
		 	$array=array();
		 	foreach ($trackIdArray as $trackid) {
			array_push($array,$trackid);

		 	}
			Track::printTracks($conn,$array,true,false)


		?>


	</ul>
	

</div>



<?php require_once('frame_footer.php'); ?>