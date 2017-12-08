<?php

require_once('frame_header.php');
require_once 'sqlconnection.php';


	// this is the current user
	// $_SESSION["loginUsername"]
		
		// -------- create playlist  --------
			// check if ptitle exists first 
			
			// NEED to get
			//$ptitle
			//$public 
			
			$check_ptitle = "SELECT * from playlist WHERE powner = '$_SESSION["loginUsername"]' 
			AND ptitle = '$ptitle'";
			$result= $conn->query($check_ptitle);
			if($result=->num_rows==0){
				// no matching ptitle found. can insert
				$createplaylist = "Insert INTO playlist ( ptitle, pdate, powner, public )
				VALUES ( '$ptitle', Now(),'$_SESSION["loginUsername"]','$public')";
			}else{
				// prompt user to enter another ptitle
			}
		
		// -------- like artist  --------
		
		// NEED to get
		//$artistid
			
			$likeArtist = "INSERT INTO likes ('$artistid','$_SESSION["loginUsername"]', now())";
			if($result= $conn->query($likeArtist)){ // return false if cannot insert
				//successful
			}else{
				//successful -- already liked before
			}
		
		// -------- follow user  --------
			// follow another user
			
			// NEED to get
			//$followedUser
			
			$followuser = "INSERT INTO follow ('$artistid','$_SESSION["loginUsername"]', now())";
			if($result= $conn->query($likeArtist)){ // return false if cannot insert
				//successful
			}else{
				//successful -- already liked before
			}
		

		require_once('frame_footer.php');
?>