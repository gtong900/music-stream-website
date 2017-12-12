<?php
    require_once('frame_header.php');
	
	verifyUserSession();
	
	$userid = $_SESSION["loginUsername"];

	echo "<input type='hidden' class='userid' value='$userid'>";


     //below are SQL queries
    $query_recentrack="SELECT t.trackname, ar.artistitle, t.trackid 
						FROM ((user u natural join likes l ) natural join track t) natural join albumcontent ac  natural join album a  natural join artist ar
						WHERE u.username='{$userid}'
						ORDER BY a.albumreleasedate DESC
						LIMIT 10";
	$query_recentlist="SELECT p.pid, p.ptitle, p.pdate, p.powner
						FROM follows f join playlist p on f.username=p.powner 
						WHERE f.follower='{$userid}' AND p.public != 0
						GROUP BY p.powner, p.pdate DESC
						LIMIT 10;";
	$query_recentplay="SELECT t.trackname, a.artistitle, t.trackid
						FROM play p natural join track t natural join artist a
						WHERE p.username='{$userid}'
						ORDER BY p.playtime DESC
						LIMIT 60;";
						?>

	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md">
	      <h3 class="text-danger">TRACK</h3>
           <div>
           	   <?php

					$result=mysqli_query($conn,$query_recentrack);

					if(mysqli_num_rows($result)>0){
						
						while ($row=mysqli_fetch_assoc($result)) {
							// find artistid from trackid
							$trackid=$row["trackid"];
							$a = mysqli_query($conn,"SELECT artistid FROM  track where trackid = '$trackid' limit 1");
							$b=mysqli_fetch_assoc($a);
							$artistid=$b["artistid"];
							echo "<div class='row listitem'>
										<div class='col-md-7'>
									  <input type='hidden' class='td trackId' value='$trackid'>
								      <span class='trackName t'>".$row["trackname"]."</span>
								      </div>
								      <div class='col-md-4'>
									  <a href='artist.php?artistid=$artistid'>".$row["artistitle"]."</a>
									  </div>
									  <div class='col-md-1'>
									  <input type='hidden' class='ai' value='$artistid'>
									  <input type='hidden' class='trackId' value='$trackid'>
									  <img class='optionsButton' src='assets/images/icons/more.png' style='float:left' onclick='showOptionMenu(this)'>
									  </div>
									  
								  </div><hr class='bg-danger'>";		
						}

					}
					
		        ?>
           </div>
	      
	    </div>

	    <div class="col-md">
	      <h3 class="text-primary">PLAYLIST</h3>
		      <div>
		      	<?php

					$result=mysqli_query($conn,$query_recentlist);

					if(mysqli_num_rows($result)>0){

						while ($row=mysqli_fetch_assoc($result)) {
							echo "<div class='row listitem'>
							      <div class='col-md-8 playlistitle'>
							      <a href='playlist.php?pid=".$row["pid"]."'><b>".$row["ptitle"]."</b></a></div>
							      <div class='col-md-4 playlistowner'>".$row["powner"]."</div>
							      </div><hr class='bg-primary'>";		
						}

					}

		        ?>
		      </div>
	    </div>

	    <div class="col-md">
	      <h3 class="text-secondary">RECENT PLAY</h3>
	        <div>
           	   <?php

					$result=mysqli_query($conn,$query_recentplay);

					if(mysqli_num_rows($result)>0){
						
						while ($row=mysqli_fetch_assoc($result)) {
							// find artistid from trackid
							$trackid=$row["trackid"];
							$a = mysqli_query($conn,"SELECT artistid FROM  track where trackid = '$trackid' limit 1");
							$b=mysqli_fetch_assoc($a);
							$artistid=$b["artistid"];
							echo "<div class='row listitem'>
										<div class='col-md-7'>
									  <input type='hidden' class='td trackId' value='$trackid'>
								      <span class='trackName t'>".$row["trackname"]."</span>
								      </div>
								      <div class='col-md-4'>
									  <a href='artist.php?artistid=$artistid'>".$row["artistitle"]."</a>
									  </div>
									  <div class='col-md-1'>
									  <input type='hidden' class='ai' value='$artistid'>
									  <input type='hidden' class='trackId' value='$trackid'>
									  <img class='optionsButton' src='assets/images/icons/more.png' style='float:left' onclick='showOptionMenu(this)'>
									  </div>
									  
								  </div><hr class='bg-secondary'>";	
						}

					}
					
		        ?>
           </div>
	    </div>
	  </div>
	</div>


<?php
	require_once("includes/optionsMenu.php");
    require_once('frame_footer.php');
?>