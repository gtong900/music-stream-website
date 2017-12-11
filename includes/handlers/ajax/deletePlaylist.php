<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['pId'])) {
		 $pId=$_POST['pId'];
		 $query=mysqli_query($conn,"DELETE FROM playlist WHERE pid='$pId';");
		 $ar=mysqli_affected_rows($conn);
		 if ($ar!=1) {
		 	echo "#ERROR: Delete fail.";
		 }
	}
	else{
		echo "#ERROR: Not set up.";
	}
?>