<?php require_once('frame_header.php');?>

<h1>Music Online</h1>
<h3>Signup</h3>

<?php
// this is to check for form errors
session_start();
if(isset($_SESSION["UsernameTaken"]) && $_SESSION["UsernameTaken"]!= false)
	 Echo "<b>UserName Taken already please try another</b></br>";
if(isset($_SESSION["Emailexists"]) && $_SESSION["Emailexists"]!= false)
	 Echo "<b>This email exists, try login</b></br>";
if(isset($_SESSION["PasswordMatch"]) &&$_SESSION["PasswordMatch"]!= true)
	 Echo "<b>Password do not match, try again</b></br>";
if(isset($_SESSION["EmailMatch"]) &&$_SESSION["EmailMatch"]!= true)
	 Echo "<b>Email do not match, try again</b></br>";

?>
		<!-- This signing in-->
		<form method="post" action="insertuser.php">
		<body>
		<table>
		  <tr>
			<td>UserName *:</td>
			<td><input type="text" size="10" name="username" required></td>
		  </tr>
		  
		  <tr>
			<td>Full Name *:</td>
			<td><input type="text" size="10" name="fullname" required></td>
		  </tr>
		  
		  <tr>
			<td>Password *:</td>
			<td><input type="password" size="10" name="password" minlength= 6 required></td> </tr>
		  </tr>
		  
		  <tr>
			<td>Confirm Password *:</td>
			<td><input type="password" size="10" name="password_confirm" minlength= 6 required></td> </tr>
		  </tr>
		  
		  <tr>
			<td>Email *:</td>
			<td><input type="email" size="10" name="email" required></td>
		  </tr>
		  
		   <tr>
			<td>Confirm Email *:</td>
			<td><input type="email" size="10" name="email_confirm" required></td>
		  </tr>
		  
		  <tr>
			<td>City *:</td>
			<td><input type="text" size="10" name="city" required></td>
		  </tr>
		  
		</table>
		<p><input type="submit" value="Signup">
		</form>
		</br>
		<h1><form action="index.php" method="get">
		<button  type="submit" value=>Home</button>
		</form></h1>

		
				
<? phprequire_once('frame_footer.php');?>