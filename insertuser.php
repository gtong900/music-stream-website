<?php

require_once 'sqlconnection.php';
   require_once 'authentication.inc'; 

$username =  make_safe($_POST["username"]);
$fullname =  $_POST["fullname"];
$pass1 = $_POST["password"]; 
$pass2 = $_POST["password_confirm"]; 
$email1 = $_POST["email"]; 
$email2 = $_POST["email_confirm"]; 
$city = $_POST["city"]; 

session_start();
$_SESSION["UsernameTaken"]= false;
$_SESSION["Emailexists"]= false;
$_SESSION["PasswordMatch"]= true;
$_SESSION["EmailMatch"]= true;



//check if username already exists
	  $usernamequery = "SELECT username FROM user WHERE username = '{$username}'";
	  
	  // Execute the query
	  
	 $result = $conn->query($usernamequery);
		//showerror();
  
	  // exactly one row? then user
	  if ($result->num_rows == 1)
		$_SESSION["UsernameTaken"] = true;
	

//check if email exist
		$emailquery = "SELECT email FROM user WHERE email = '{$email1}'";
	  
	  // Execute the query
	  
	  $result = $conn->query($emailquery);
	  //showerror();
  
	  // exactly one row? then user
	  if ($result->num_rows == 1)
		$_SESSION["Emailexists"] = true;


//check for passwork match
		if($pass1!=$pass2)
			$_SESSION["PasswordMatch"] = false;
//check for email match
		if($email1!=$email2)
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
			//reset session
			$_SESSION["UsernameTaken"]= false;
			$_SESSION["Emailexists"]= false;
			$_SESSION["PasswordMatch"]= true;
			$_SESSION["EmailMatch"]= true;
			
		
	$_SESSION["logingmsg"] = "sign up complete!, please login";
	 //if($insertion = $conn->query($insertNewUser))
	  //showerror();
	header("Location: index.php");	
	}else{
		// go back
		header("Location: signup.php");
	}
		


?>