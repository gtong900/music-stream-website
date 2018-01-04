<?php require_once('frame_header.php');?>

<h1>Music Online</h1>
<h3>Signup</h3>

<?php
// this is to check for form errors
if(session_status()!=2)
session_start();
if(isset($_SESSION["UsernameTaken"]) && $_SESSION["UsernameTaken"]!= false)
	 Echo "<errormsg>UserName Taken already please try another</errormsg></br>";
if(isset($_SESSION["Emailexists"]) && $_SESSION["Emailexists"]!= false)
	 Echo "<errormsg>This email exists, try login</errormsg></br>";
if(isset($_SESSION["PasswordMatch"]) &&$_SESSION["PasswordMatch"]!= true)
	 Echo "<errormsg>Password do not match, try again</errormsg></br>";
if(isset($_SESSION["EmailMatch"]) &&$_SESSION["EmailMatch"]!= true)
	 Echo "<errormsg>Email do not match, try again</errormsg></br>";

?>
		<!-- This signing in-->
		<form method="post" action="insertuser.php">
		<body>
		<table>
		  <tr>
			<td>UserName *:</td>
			<td><input type="text" size="10" name="username" pattern="[A-Za-z0-9]{1,}" title="cannot have space and no special characters" required></td>
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

		
				
<?php require_once('frame_footer.php');?>