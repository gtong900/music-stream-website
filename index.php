<?php require_once('frame_header.php');?>
<h1>Music Online</h1>
<h3>Login</h3>
		<!-- This signing in-->
		<?php 
    
		// if user input incorrect login
		if(!empty($_GET)){
			?>
			<p> incorrect username or password. Try again
			<?php
		}
		
		?>
		<form method="post" action="authenticateUser.php">
		<body>
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
