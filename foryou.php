<?php
    require_once('frame_header.php');
     //below are SQL queries
    $query_recentrack="SELECT t.trackname, ar.artistitle, t.trackid 
						FROM ((user u natural join likes l ) natural join track t) natural join albumcontent ac  natural join album a  natural join artist ar
						WHERE u.username='gtong900'
						GROUP BY a.albumreleasedate DESC
						LIMIT 10";
	$query_recentlist="SELECT p.pid, p.ptitle, p.pdate, p.powner
						FROM follows f join playlist p on f.username=p.powner 
						WHERE f.follower='gtong900' AND p.public != 0
						GROUP BY p.powner, p.pdate DESC
						LIMIT 10;";
	$query_recentplay="SELECT t.trackname, a.artistitle, t.trackid
						FROM play p natural join track t natural join artist a
						WHERE p.username='gtong900'
						ORDER BY p.playtime DESC
						LIMIT 60;";
						?>

	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md">
	      <h3 class="text-danger">RECENT LIKED ARTIST TRACKS</h3>
           <div>
           	   <?php

					$result=mysqli_query($conn,$query_recentrack);

					if(mysqli_num_rows($result)>0){
						$array = array();
						while ($row=mysqli_fetch_assoc($result)) {
							array_push($array,$row["trackid"]);
							// find artistid from trackid
							/*$artistid = mysqli_query($conn,"SELECT artistid FROM  track where trackid = '{$row["trackid"]}' limit 1");
							$artistid=mysqli_fetch_assoc($artistid);
			
							echo "<div class='listitem'>
							      <a href='track_details.php?pid=".$row["trackid"]."'><b>".$row["trackname"]."</b><br></a>
								  <a href='artist.php?artistid=".$artistid["artistid"]."'>
								  ".$row["artistitle"]."<hr class='bg-danger'></a></div>";	*/	
						}
					Track::printTracks($conn,$array,false);
				
					}
					
		        ?>
           </div>
	      
	    </div>

	    <div class="col-md">
	      <h3 class="text-primary">RECENT PLAYLIST FOLLOWED</h3>
		      <div>
		      	<?php

					$result=mysqli_query($conn,$query_recentlist);
			
					if(mysqli_num_rows($result)>0){
						$array = array();	
						while ($row=mysqli_fetch_assoc($result)) {
							array_push($array,$row["pid"]);
							//echo "<div class='listitem'>
							//      <a href='playlist.php?pid=".$row["pid"]."'><b>".$row["ptitle"]."</b><br/>".$row["powner"]."<br/><hr class='bg-primary'></a></div>";		
						}
					Playlist::printPlaylist($conn,$array,false);
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
						$array = array();
						while ($row=mysqli_fetch_assoc($result)) {
							array_push($array,$row["trackid"]);
							/*$artistid = mysqli_query($conn,"SELECT artistid FROM  track where trackid = '{$row["trackid"]}' limit 1");
							$artistid=mysqli_fetch_assoc($artistid);
							
							echo "<div class='listitem'>
							      <a href='track_details.php?pid=".$row["trackid"]."'><b>".$row["trackname"]."</b><br></a>
								  <a href='artist.php?artistid=".$artistid["artistid"]."'>
								  ".$row["artistitle"]."<hr class='bg-danger'></a></div>";*/		
						}
					Track::printTracks($conn,$array,false);
					}
					
		        ?>
           </div>
	    </div>
	  </div>
	</div>


<?php
    require_once('frame_footer.php');
?>