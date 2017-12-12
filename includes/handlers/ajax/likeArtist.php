<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['username'])&&isset($_POST['artistid'])&&isset($_POST['liketime'])) {
		 $username=$_POST['username'];
		 $artistid=$_POST['artistid'];
		 $liketime=$_POST['liketime'];
		 $query=mysqli_query($conn,"INSERT INTO likes VALUES('$artistid','$username','$liketime')");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: You already like this artist.";
		 }
		 
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>