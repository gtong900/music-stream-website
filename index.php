<?php require_once('frame_header.php');?>
<h1>Welcome<h1>
<h3>Login</h3>
		<!-- This signing in-->
		<?php 
		
		if(sessionAuthenticated())// if user already logged in then go to user page
			header("location: user.php");
    
		// error message
			if(isset($_SESSION["logingmsg"]))
				echo "<errormsg>".$_SESSION["logingmsg"]."</errormsg>";
		
		?>
		<form method="post" action="authenticateUser.php">
		<table>
		  <tr>
			<td>UserName *:</td>
			<td><input type="text" size="10" name="username" required></td>
		  </tr>
		  <tr>
			<td>Password *:</td>
			<td><input type="password" size="10" name="password" required></td> </tr>
			
		  </tr>
		</table>
		<p><input type="submit" value="Login">
		</form>
		</br>
		<!-- For signing up -->
		<form method="get" action="signup.php">
		<h4>Not a user?? Sign up here:</h4>
		<p><input type="submit" value="signup">
		</form>

<?php require_once('frame_footer.php');?>
