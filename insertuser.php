<?php

require_once 'sqlconnection.php';

$username =  $_POST["username"];
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
//check for passwork match
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
<<<<<<< HEAD
		$insertNewUser = "Insert into user 
	(username,uname,email,city,password) Values ('{$username}','{$fullname}','{$email1}','{$city}','{$pass1}')";
=======
		$insertNewUser = "Insert into user Values ('{$username}','{$fullname}','{$email1}','{$city}','{$pass1}','')";
>>>>>>> 2cd656aae822ca5ccf8b93558bd4a7ff30f73286
			//reset session
			$_SESSION["UsernameTaken"]= false;
			$_SESSION["Emailexists"]= false;
			$_SESSION["PasswordMatch"]= true;
			$_SESSION["EmailMatch"]= true;
			
		
<<<<<<< HEAD
	$_SESSION["logingmsg"] = "sign up complete!, please login";
	 $conn->query($insertNewUser);
=======
	echo "sign up complete!";
<<<<<<< HEAD
	 //if($insertion = $conn->query($insertNewUser))
>>>>>>> 2cd656aae822ca5ccf8b93558bd4a7ff30f73286
=======
	 $conn->query($insertNewUser);
>>>>>>> 7fcae0260a59b0e2a5cb2c385a7efef618d0bbf8
	  //showerror();
	header("Location: index.php");	
	}else{
		// go back
		header("Location: signup.php");
	}
		


?>