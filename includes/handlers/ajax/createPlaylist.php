<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['newPlaylist']) && isset($_POST['userId']) && isset($_POST['currenTime'])) {
		 $newPlaylist=$_POST['newPlaylist'];
		 $userId=$_POST['userId'];
		 $currenTime=$_POST['currenTime'];
		 $query=mysqli_query($conn,"INSERT INTO playlist (ptitle, pdate, powner, public) VALUES ('$newPlaylist', '$currenTime', '$userId', '1');");
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>