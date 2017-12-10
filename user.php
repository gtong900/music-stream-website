<?php 
    require_once('frame_header.php'); 

	// should check session first. if not go back to index.php
	//for testing 
	$userid = "gtong900";
	//$userid = $_SESSION["loginUsername"];
	$user = new User($conn,$userid);

?>

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

	    <div class="col-md">
	      <h3 class="text-danger">TRACK</h3>
           <div>
           	   <?php

					$userplaylist=$user->getUserAllPlaylist();
			// check if ther are results
			  if ($userplaylist->num_rows >0){
				  
				while ($row=mysqli_fetch_assoc($userplaylist)) {
					//ptitle, pdate, powner, public
					$pid = $row["pid"];
					echo "<div class='listitem'>
						  <a href='playlist.php?pid=".$pid."'><b>".$pid."</b><br></a>
						  <a href='playlist.php?pid=".$pid."'>".$row["ptitle"]."<hr class='bg-danger'></a>
						  
						  </div>";		
				}  
			  }

					
		        ?>
           </div>
	      
	    </div>
	<ul class="tracklist">
	 <h3 class="text-danger">Playlist:</h3>
		<?php
		 	$userplaylist=$user->getUserAllPlaylist();
			// check if ther are results
			  if ($userplaylist->num_rows >0){
				  
				while ($row=mysqli_fetch_assoc($userplaylist)) {
					//ptitle, pdate, powner, public
					$pid = $row["pid"];
					echo "<div class='listitem'>
						  <a href='playlist.php?pid=".$pid."'><b>".$pid."</b><br></a>
						  <a href='playlist.php?pid=".$pid."'>".$row["ptitle"]."<hr class='bg-danger'></a>
						  
						  </div>";		
				}  
			  }

			
			
		?>


	</ul>


</div>



<?php require_once('frame_footer.php'); ?>