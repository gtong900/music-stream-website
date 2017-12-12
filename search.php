<?php
    require_once('frame_header.php');

	if(isset($_GET['keyword'])){
		$keyword=$_GET['keyword'];
	}
	else{
		header("Location: home.php");
	}

	$userid = "gtong900";
	echo "<input type='hidden' class='userid' value='$userid'>";


     //below are SQL queries
    $query_song="SELECT t.trackname,a.artistitle,t.trackid,a.artistid
				FROM artist a LEFT JOIN track t ON a.artistid=t.artistid
				WHERE t.trackname LIKE '%$keyword%' OR a.artistitle LIKE '%$keyword%';";
	$query_album="SELECT a.albumid, a.albumname, a.albumreleasedate
					FROM album a
					WHERE a.albumname LIKE '%$keyword%';";
	$query_playlist="SELECT p.pid, p.ptitle, p.powner
					FROM playlist p
					WHERE p.ptitle LIKE '%$keyword%' AND (p.public!=0 OR p.powner='$userid');";
	$query_user="SELECT u.username, u.uname, u.city
					FROM user u
					WHERE username LIKE '%$keyword%';";
						?>
	$query

	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md">
	      <h3 class="text-danger">TRACK</h3>
 			<?php

					$result=mysqli_query($conn,$query_song);

					if(mysqli_num_rows($result)>0){
						
						while ($row=mysqli_fetch_assoc($result)) {
							// find artistid from trackid
							$trackid=$row["trackid"];
							$trackname=$row["trackname"];
							$artistid=$row["artistid"];
							$artistitle=$row["artistitle"];
							echo "<div class='row listitem'>
										<div class='col-md-7'>
									  <input type='hidden' class='td trackId' value='$trackid'>
								      <span class='trackName t'>$trackname</span>
								      </div>
								      <div class='col-md-4'>
									  <a href='artist.php?artistid=$artistid'>$artistitle</a>
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

	    <div class="col-md">
	      <h3 class="text-primary">ALBUM</h3>
	      	 			<?php

					$result=mysqli_query($conn,$query_album);

					if(mysqli_num_rows($result)>0){
						
						while ($row=mysqli_fetch_assoc($result)) {
							// find artistid from trackid
							$albumid=$row["albumid"];
							$albumname=$row["albumname"];
							$albumreleasedate=$row["albumreleasedate"];
							echo "<div class='row listitem'>
										<div class='col-md-8'>
								      <a href='album.php?albumid=$albumid'><span class='trackName'>$albumname</span></a>
								      </div>
								      <div class='col-md-4'>
									  <a href=''>$albumreleasedate</a>
									  </div>
								  </div><hr class='bg-primary'>";		
						}

					}
					
		        ?>
	    </div>

	    <div class="col-md">
	      <h3 class="text-warning">PLAYLIST</h3>
	      		      	 			<?php

					$result=mysqli_query($conn,$query_playlist);

					if(mysqli_num_rows($result)>0){
						
						while ($row=mysqli_fetch_assoc($result)) {
							// find artistid from trackid
							$pid=$row["pid"];
							$ptitle=$row["ptitle"];
							$powner=$row["powner"];
							echo "<div class='row listitem'>
										<div class='col-md-8'>
								      <a href='playlist.php?pid=$pid'><span class='trackName'>$ptitle</span></a>
								      </div>
								      <div class='col-md-4'>
									  <a href='user.php?username=$powner'>$powner</a>
									  </div>
								  </div><hr class='bg-warning'>";		
						}

					}
					
		        ?>
	    </div>

	    <div class="col-md">
	      <h3 class="text-secondary">USER</h3>
	      		      		      	 			<?php

					$result=mysqli_query($conn,$query_user);

					if(mysqli_num_rows($result)>0){
						
						while ($row=mysqli_fetch_assoc($result)) {
							// find artistid from trackid
							$username=$row["username"];
							echo "<div class='row listitem'>
										<div class='col-md'>
								      <a href='user.php?username=$username'><span class='trackName'>$username</span></a>
								      </div>
								  </div><hr class='bg-secondary'>";		
						}

					}
					
		        ?>
	    </div>
	  </div>
	</div>


<?php
	require_once("includes/optionsMenu.php");
    require_once('frame_footer.php');
?>