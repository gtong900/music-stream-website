<?php
	include("../../../sqlconnection.php");
	if (isset($_POST['songId'])) {
		 $songId=$_POST['songId'];
		 $query=mysqli_query($conn,"SELECT AVG(rating) as avg FROM rate 
										WHERE trackid = '$songId' ;");
		 $ar=mysqli_affected_rows($conn);
		 $hold=mysqli_fetch_array($query);
		 $avg = number_format($hold['avg'], 1, '.', '');	
		 if ($avg == 0) {
		 	echo "Currently No Rating";
		 }
		 else{

		 	echo "Average Rating: ".$avg;
		 }
	}
	else{
		echo "Fetch Data Failed";
	}
?>