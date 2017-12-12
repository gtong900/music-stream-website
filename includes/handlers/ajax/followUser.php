<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['username'])&&isset($_POST['follower'])&&isset($_POST['followtime'])) {
		 $username=$_POST['username'];
		 $follower=$_POST['follower'];
		 $followtime=$_POST['followtime'];
		 $query=mysqli_query($conn,"INSERT INTO follows VALUES('$username','$follower','$followtime')");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: You already follow this user.";
		 }
		 
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>