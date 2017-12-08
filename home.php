<?php
    require_once('frame_header.php');
    require_once('sqlconnection.php');
     //below are SQL queries
    $query_recentrack="SELECT * 
					FROM ((user u natural join likes l ) natural join track t) natural join albumcontent ac  natural join album a 
					WHERE u.username=''
					GROUP BY a.albumreleasedate DESC
					LIMIT 10";
	$query_recentlist="SELECT p.pid, p.ptitle, p.pdate, p.powner
						FROM follows f join playlist p on f.username=p.powner 
						WHERE f.follower='gtong900' AND p.public != 0
						GROUP BY p.powner, p.pdate DESC
						LIMIT 10;";
	$query_recentplay="SELECT *
					FROM play p
					WHERE p.username=''
					ORDER BY p.playtime DESC
					LIMIT 60";
?>


	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md bg-danger text-white">
	      <h3>TRACK</h3>
           
	      <?php

			$result=mysqli_query($conn,$query_recentlist);

			if(mysqli_num_rows($result)>0){

				while ($row=mysqli_fetch_assoc($result)) {
					echo "<div class='listitem'>
					      <a href='track_details.php?pid=".$row["pid"]."'><b>".$row["ptitle"]."</b><br/>".$row["powner"]."<br/>"."
					      </a></div>";		
				}

			}

			$conn->close();
        ?>

	    </div>
	    <div class="col-md bg-primary text-white">
	      <h3>PLAYLIST</h3>
	    </div>
	    <div class="col-md bg-secondary text-white">
	      <h3>RECENT PLAY</h3>
	    </div>
	  </div>
	</div>

<?php
    require_once('frame_footer.php');
?>