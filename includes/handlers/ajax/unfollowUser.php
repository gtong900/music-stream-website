<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['username']) && isset($_POST['follower'])) {
		 $username=$_POST['username'];
		 $follower=$_POST['follower'];
		 $query=mysqli_query($conn,"DELETE FROM follows WHERE username='$username' AND follower='$follower';");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: Delete fail.";
		 }
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>