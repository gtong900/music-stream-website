<html>

<head>

  <meta charset="UTF-8">

  <title>Musico-Sign</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-size: cover;
	-webkit-filter: blur(0px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 5px;
}

.login input[type=email]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 5px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 5px;
}

.login input[type=submit]{
	width: 250px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 5px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
	background-color: #FF1493;
}

.login input[type=submit]:active{
	opacity: 0.6;
}


.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}



::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}

errormsg, .listitem c{
	color: #ff0000;
}

</style>
	
    <script src="js/prefixfree.min.js"></script>
    

		<script>
		<?php

		echo "window.onload = function() {";
		
    	if(session_status()!=2)
		session_start();

		if(isset($_SESSION["UsernameTaken"]) && $_SESSION["UsernameTaken"]!= false){
			echo "document.getElementById('errorBox').innerHTML += 'UserName Taken already please try another</br>';";
			
		}
			

		if(isset($_SESSION["Emailexists"]) && $_SESSION["Emailexists"]!= false){
			echo "document.getElementById('errorBox').innerHTML += 'This email exists, try login</br>';";
			
		}
			
		if(isset($_SESSION["PasswordMatch"]) &&$_SESSION["PasswordMatch"]!= true){
			echo "document.getElementById('errorBox').innerHTML += 'Password do not match, try again</br>';";
			
		}
			
			
		if(isset($_SESSION["EmailMatch"]) &&$_SESSION["EmailMatch"]!= true){
			echo "document.getElementById('errorBox').innerHTML += 'Email do not match, try again</br>';";
			
		}
		echo "}";

		session_destroy();
			
			
		?>
		</script>
</head>


<body>
		<!-- This signing in-->
		<?php
   		require_once('sqlconnection.php');
   		require_once('authentication.inc'); 
		?>

		<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Signup<span> Now</span></div>
		</div>
		<br>

		<form class="login" method="post" action="insertuser.php">

			
			
			<input type="text" size="10" name="username" pattern="[A-Za-z0-9]{1,}" title="cannot have space and no special characters" placeholder="username" required>

		  
		  
			
			<input type="text" size="10" name="fullname" placeholder="full name" required>
		  
		  
		  
			
			<input type="password" size="10" name="password" minlength= 6 placeholder="password" required> 
		  
		  
		  
			
			<input type="password" size="10" name="password_confirm" minlength= 6 placeholder="confirm password" required> 
		  
		  
		  
			
			<input type="email" size="10" name="email" placeholder="email" required>
		  
		  
		   
			
			<input type="email" size="10" name="email_confirm" placeholder="confirm email" required>
		  
		  
			
			<input type="text" size="10" name="city" placeholder="city" required></br>

			<errormsg id="errorBox"></errormsg></br>
		  
		  	<input type="submit" value="Join">

		</form>


			


  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>
</html>