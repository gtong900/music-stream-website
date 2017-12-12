<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['trackId']) && isset($_POST['userId']) && isset($_POST['currenTime'])) {
		 $trackId=$_POST['trackId'];
		 $userId=$_POST['userId'];
		 $currenTime=$_POST['currenTime'];
		 $query=mysqli_query($conn,"INSERT INTO play (username, trackid, playtime) VALUES ('$userId', '$trackId', '$currenTime');");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: This play is not recorded in system.";
		 }
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>