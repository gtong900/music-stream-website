<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['rating']) && isset($_POST['userId']) && isset($_POST['songId']) && isset($_POST['currenTime'])) {
		 $rating=$_POST['rating'];
		 $userId=$_POST['userId'];
		 $songId=$_POST['songId'];
		 $currenTime=$_POST['currenTime'];
		 $query=mysqli_query($conn,"INSERT INTO rate VALUES('$userId','$songId','$rating','$currenTime');");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: You already rated this song.";
		 }
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>