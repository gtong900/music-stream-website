<?php

require_once('frame_header.php');
require_once 'sqlconnection.php';


	// this is the current user
	// 
	$currentuserID = $_SESSION["loginUsername"]
		
		// -------- create playlist  --------
			// check if ptitle exists first 
			
			// NEED to get:
			//$ptitle
			//$public 
			
			$check_ptitle = "SELECT * from playlist WHERE powner = '$_SESSION["loginUsername"]' 
			AND ptitle = '$ptitle'";
			$result= $conn->query($check_ptitle);
			if($result->num_rows==0){
				// no matching ptitle found. can insert
				$createplaylist = "Insert INTO playlist ( ptitle, pdate, powner, public )
				VALUES ( '$ptitle', Now(),'$currentuserID','$public')";
			}else{
				// prompt user to enter another ptitle
			}
		
		// -------- like artist  --------
		
			// NEED to get:
			//$artistid
				
			$likeArtist = "INSERT INTO likes ('$artistid','$currentuserID', now())";
			if($result= $conn->query($likeArtist)){ // return false if cannot insert
				//successful
			}else{
				//unsuccessful -- already liked before
			}
		
		// -------- follow user  --------
			// follow another user
			
			// NEED to get:
			//$followedUser
			
			$followuser = "INSERT INTO follows ('$followedUser','$currentuserID', now())";
			if($result= $conn->query($followuser)){ // return false if cannot insert
				//successful
			}else{
				//unsuccessful -- already followed before
			}
			
		// -------- rate track  --------
			// rate a track
			
			// NEED to get:
			//$track
			
			$ratetrack = "INSERT INTO follows ('$followedUser','$currentuserID', now())";
			if($result= $conn->query($ratetrack)){ // return false if cannot insert
				//successful
			}else{
				//unsuccessful -- already rated before
			}
			
		// -------- play track  --------
			// rlogs play of track
			
			// NEED to get:
			//$track
			
			$ratetrack = "INSERT INTO play ('$currentuserID',$track, now())";
			if($result= $conn->query($ratetrack)){ // return false if cannot insert
				//successful
			}else{
				//unsuccessful -- already followed before
			}
			
			
			
			
			
			
			
		require_once('frame_footer.php');
?>