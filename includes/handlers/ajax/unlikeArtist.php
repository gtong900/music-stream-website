<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['username'])&&isset($_POST['artistid'])) {
		 $username=$_POST['username'];
		 $artistid=$_POST['artistid'];
		 $query=mysqli_query($conn,"DELETE FROM likes WHERE username='$username' AND artistid='$artistid';");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: Delete fail.";
		 }
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>