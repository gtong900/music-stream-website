<?php
    require_once('frame_header.php');
    require_once('sqlconnection.php');
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
						
	include 'tiletest.php';
	include 'tiletest.php';

					
    require_once('frame_footer.php');
?>
