<?php 
    require_once('frame_header.php'); 

	// should check session first. if not go back to index.php
	
	$isOwner = true;
	if(isset($_GET['username'])){
		$username=$_GET['username'];
		$isOwner = false;
	}
	
	
	//for testing 
	$userid = "gtong900";
	//$userid = $_SESSION["loginUsername"];
	$user = new User($conn,$userid);

?>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md text-primary">
		<span class="details">Username:</span> &nbsp;<?php echo $user->getusername() ?><br>
			</div>
		<div class="col-md text-primary">
			<span class="details">Name:</span> &nbsp;<?php echo $user->getusertitle() ?><br>
			<span class="details">Email:</span> &nbsp;<?php echo $user->getuseremail() ?><br>
			<span class="details">City:</span> &nbsp;<?php echo $user->getusercity() ?><br>
			</div>
		<div class="col-md text-primary">
			</div>
		
	</div>
</div>
<br>
<div class="container-fluid">
	  <div class="row">
	    <div class="col-md">
	      <h3 class="text-danger">Playlists</h3>
           <div>
           	   <?php

					$userplaylist=$user->getUserAllPlaylist();
			// check if there are results
			  if ($userplaylist->num_rows >0){
				  
				while ($row=mysqli_fetch_assoc($userplaylist)) {
					//ptitle, pdate, powner, public
					$pid = $row["pid"];
					echo "<div class='listitem'>
						  <a href='playlist.php?pid=".$pid."'><b>".$pid."</b><br></a>
						  <a href='playlist.php?pid=".$pid."'>".$row["ptitle"]."<hr class='bg-danger'></a>
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
						  <a href='artist.php?artistid=".$artistid."'><b>".$artist->getTitle()."</b><br></a><hr class='bg-danger'></a>
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
						  <a href='user.php?username=".$username."'><b>".$username."</b><br></a><hr class='bg-danger'></a>
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