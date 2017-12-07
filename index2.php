<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Login</title>
</head>
<body>
<h1>Music Online</h1>
<h3>Login</h3>
		<!-- This signing in-->
		<form method="get" action="authenticateUser.php">
		<body>
		<table>
		  <tr>
			<td>UserName *:</td>
			<td><input type="text" size="10" name="username" required></td>
		  </tr>
		  <tr>
			<td>Password *:</td>
			<td><input type="password" size="10" name="password"></td> </tr>
			
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
</body>
</html>
