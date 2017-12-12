<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['newPlaylist']) && isset($_POST['userId']) && isset($_POST['currenTime']) && isset($_POST['public'])) {
		 $newPlaylist=$_POST['newPlaylist'];
		 $userId=$_POST['userId'];
		 $currenTime=$_POST['currenTime'];
		 $public=$_POST['public'];
		 $query=mysqli_query($conn,"INSERT INTO playlist (ptitle, pdate, powner, public) VALUES ('$newPlaylist', '$currenTime', '$userId', '$public');");
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>