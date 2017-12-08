<?php

include 'sqlconnection.php';

$username =  $_GET["username"];
$fullname =  $_GET["fullname"];
$pass1 = $_GET["password"]; 
$pass2 = $_GET["passwordconfirm"]; 
$email1 = $_GET["email"]; 
$email2 = $_GET["email_confirm"]; 
$city = $_GET["city"]; 

$conn = OpenCon();
session_start();
$_SESSION["UsernameTaken"]= false;
$_SESSION["Emailexists"]= false;
$_SESSION["PasswordMatch"]= true;
$_SESSION["EmailMatch"]= true;



//check if username already exists
	  $usernamequery = "SELECT username FROM users WHERE username = '{$username}'";
	  
	  // Execute the query
	  
	  if($result = $conn->query($usernamequery))
	  showerror();
  
	  // exactly one row? then user
	  if ($result->num_rows == 1)
		$_SESSION["UsernameTaken"] = true;
	

//check if email exist
		$emailquery = "SELECT email FROM users WHERE email = '{$email}'";
	  
	  // Execute the query
	  
	  if($result = $conn->query($emailquery))
	  showerror();
  
	  // exactly one row? then user
	  if ($result->num_rows == 1)
		$_SESSION["Emailexists"] = true;


//check for passwork match
		if(pass1!=pass2)
			$_SESSION["PasswordMatch"] = false;
//check for passwork match
		if(email1!=email2)
			$_SESSION["EmailMatch"] = false;

	// if username exists ask to try another one
	// if password confirm doesn't match- ask to re-enter
	// if email confirm doesn't match- ask to re-enter	
	// if email exists, let user know and ask them to login with it
	// continue to insert only if all above is not an issue
	if ($_SESSION["UsernameTaken"]== false &&
	$_SESSION["Emailexists"]== false &&
	$_SESSION["PasswordMatch"]== true &&
	$_SESSION["EmailMatch"]== true){
		$insertNewUser = "Insert into user Values ('{$username}','{$fullname}','{$email1}','{$city}','{$pass1}')";
	
	 if($insertion = $conn->query($insertNewUser))
	  showerror();
	

	
	}	
		

$conn->close();

?>