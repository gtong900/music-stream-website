<?php
	include("../../../sqlconnection.php");
	if ( isset($_POST['playlistId']) && isset($_POST['songId'])) {
		 $playlistId=$_POST['playlistId'];
		 $songId=$_POST['songId'];
		 $orderIdQuery=mysqli_query($conn,"SELECT MAX(p.porder)+1 as newass FROM playlistcontent p WHERE pid='$playlistId';");
		 $row=mysqli_fetch_array($orderIdQuery);
		 //newass is the porder will be assigned to this track in this playlist
		 $order=$row['newass'];
		 $query=mysqli_query($conn,"INSERT INTO playlistcontent VALUES('$playlistId','$songId','$order')");
	}
	else{
		echo "#ERROR:playlistId or songId was not set up.";
	}
?>