<!DOCTYPE html>
<html lang="en">
<head>
  <title>Musico</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/js/script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  
</head>
<body background="assets\images\backgrounds\home_bg.png">
<?php
   require_once('sqlconnection.php');
   require_once 'authentication.inc'; 
   include("includes/classes/Playlist.php");
   include("includes/classes/Track.php");
   include("includes/classes/Artist.php");
   include("includes/classes/User.php");
   include("includes/classes/Album.php");
?>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php" title="Index page">Musico</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="user.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="foryou.php">For You</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Explore</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Account</a>
      </li>
	  <?php
	  if(sessionAuthenticated()){?>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
	  <?php
	  } ?>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
        <form class="form-inline right" method = "Get" action="search.php">
        <input class="form-control" type="text" name="keyword" placeholder="Search">
        &nbsp;
        <button class="btn btn-success" type="submit">Search</button>
        </form>    
    </ul>
  </div>  
</nav>