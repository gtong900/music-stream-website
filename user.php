<?php 
    require_once('frame_header.php'); 

	// should check session first. if not go back to index.php
	verifyUserSession();
	
	$userid = $_SESSION["loginUsername"];
	$isOwner = true;
	
	if(isset($_GET['username']) && $_GET['username'] != $userid){
		$isOwner = false;
		$guestid=$_GET['username'];
		$user = new User($conn,$guestid);
	}
	else{
		$user = new User($conn,$userid);
	}
	
	//for testing 
	//$userid = "gtong900";
	echo "<input type='hidden' class='userid' value='$userid'>";
	//$userid = $_SESSION["loginUsername"];
	

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md text-primary">
		<span class="details">Username:</span> &nbsp;<?php echo $user->getusername() ?>
			&nbsp;
			<?php 
			echo "<input type='hidden' value='".$user->getusername()."'>";
			if (!$isOwner) {
				echo "<img src='assets/images/icons/like_follow.png' class='follow'>";
			}
			?>
			</div>
			<?php if($isOwner){ ?>
		<div class="col-md text-primary">
			<span class="details">Name:</span> &nbsp;<?php echo $user->getusertitle() ?>
			</div>
		<div class="col-md text-primary">
			<span class="details">Email:</span> &nbsp;<?php echo $user->getuseremail() ?>			
			</div>
		<div class="col-md text-primary">
			<span class="details">City:</span> &nbsp;<?php echo $user->getusercity() ?>		
			</div>
			<?php
			}?>
			
	</div>
</div>
<br>
<div class="container-fluid">
	  <div class="row">
	    <div class="col-md">
	      <h3 class="text-danger">Playlist</h3>
           <div>
           	<?php
           		if ($isOwner){
           	  echo "<div class='listitem'>
           	  	<input type='text' class='newPlaylist' placeholder='Create New Playlist' required/>
           	  	<label class='switch'>
				  <input type='checkbox' class='makeitprivate' checked>
				  <span class='slider round'></span>
				</label>
			    <img src='assets/images/icons/add.png' class='add'>
			    <hr class='bg-danger'>
			  </div>";
			}
			  ?>

           	   <?php
           	   		if ($isOwner) {
           	   			$userplaylist=$user->getUserAllPlaylist();
           	   		}
           	   		else{
           	   			$userplaylist=$user->getUserPublicPlaylist();
           	   		}
					
			// check if there are results
			  if ($userplaylist->num_rows >0){
				  
				while ($row=mysqli_fetch_assoc($userplaylist)) {
					//ptitle, pdate, powner, public
					$pid = $row["pid"];
					$playlist=new Playlist($conn,$pid);
					$number=$playlist->getNumber();
					echo "<div class='listitem'>
							<input type='hidden' class='pid' value='$pid'>
						    <a href='playlist.php?pid=$pid'><b>".$row["ptitle"]."</b> &nbsp;
						    <span class='unimportant'>$number Songs</span>
						    </a>";
					if ($isOwner) {
						echo "<img src='assets/images/icons/delete.png' class='delete'>";
					}
						echo "<hr class='bg-danger'>
						      </div>";		
				}  
			  }else{
				  echo "<b>None</b>";
			  }
					
		        ?>
           </div>
	      
	    </div>

	    <div class="col-md">
	      <h3 class="text-primary">Likes</h3>
		      <div>
		      	<?php

					$userLikes=$user->getUserLikes();
			// check if there are results
			  if ($userLikes->num_rows >0){
				  
				while ($row=mysqli_fetch_assoc($userLikes)) {
					//ptitle, pdate, powner, public
					$artistid = $row["artistid"];
					$artist = new Artist($conn,$artistid);
					echo "<div class='listitem'>
							<input type='hidden' class='artistid' value='$artistid'>
						  <a href='artist.php?artistid=$artistid'><b>".$artist->getTitle()."</b></a>";
						  if($isOwner){
						  	echo "<img src='assets/images/icons/delete.png' class='unlike'>";
						  }
					echo "<hr class='bg-primary'>
						  </div>";		
				}  
			  }else{
				  echo "<b>None</b>";
			  }

		        ?>
		      </div>
	    </div>
	    <div class="col-md">
	      <h3 class="text-secondary">Follows</h3>
	        <div>
           	   <?php

					$userFollows=$user->getUserFollows();
			// check if there are results
			  if ($userFollows->num_rows >0){
				  
				while ($row=mysqli_fetch_assoc($userFollows)) {
					//ptitle, pdate, powner, public
					$username=$row["username"];
					echo "<div class='listitem'>
							<input type='hidden' value='$username'>
						  <a href='user.php?username=$username'><b>".$username."</b></a>";
				 	if($isOwner){
				 		echo "<img src='assets/images/icons/delete.png' class='unfollow'>";
				 	}		
					echo "<hr class='bg-secondary'>
						  </div>";		
				}  
			  }else{
				  echo "<b>None</b>";
			  }
					
		        ?>
           </div>
	    </div>
	  </div>
	</div>

<?php require_once('frame_footer.php'); ?>