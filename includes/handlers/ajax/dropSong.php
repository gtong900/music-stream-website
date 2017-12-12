<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['pId'])&&isset($_POST['trackId'])) {
		 $pId=$_POST['pId'];
		 $trackId=$_POST['trackId'];
		 $query=mysqli_query($conn,"DELETE FROM playlistcontent WHERE pid='$pId'AND trackid='$trackId';");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: Drop fail.";
		 }
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>