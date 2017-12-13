<?php

function make_safe($inputText){
  	$inputText=strip_tags($inputText);
  	$inputText=str_replace(" ", "", $inputText);
	return $inputText;
	}

function randHash($len=32)
{
	return substr(md5(openssl_random_pseudo_bytes(20)),-$len);
}

function authenticateUser($connection, $username, $password)
{


	
	
  // Test the username and password parameters
  if (!isset($username) || !isset($password))
    return false;

  // Formulate the SQL find the user
  
  $query = "SELECT * FROM user WHERE username = '$username'
            AND password = '$password'";

  // Execute the query
  
  $result = $connection->query($query);
  //showerror();
  //if (!$result = @ mysql_query ($query, $connection))
    

  // exactly one row? then we have found the user
  if ($result->num_rows != 1){
    return false;}
  else{
	$loginkey = randHash(20);
	$updatekeyquery = "UPDATE user SET loginkey = '$loginkey' WHERE username = '$username'";
	$connection->query($updatekeyquery);
	setcookie('loginkeycookie', $loginkey, time() + (86400 * 1), "/"); // 86400 = 1 day
	?>
<html>
<body>

<?php
    return true;
	}
}

// Connects to a session and checks that the user has
// authenticated and that the remote IP address matches
// the address used to create the session.
// also checks for concurrency
function sessionAuthenticated()
{
   include('sqlconnection.php');
   if(session_status()!=2)
   session_start();
   
   	if((isset($_SESSION["logingmsg"])) && $_SESSION["logingmsg"]=="sign up complete!, please login")
	return false;
   
  // Check if the user hasn't logged in
  if (!isset($_SESSION["loginUsername"]))
  {
    // The request does not identify a session
    $_SESSION["message"] = "You are not authorized to access the URL 
                            {$_SERVER["REQUEST_URI"]}";
	return false;
  }

  // Check if the request is from a different IP address to previously
  if (!isset($_SESSION["loginIP"]) || 
     ($_SESSION["loginIP"] != $_SERVER["REMOTE_ADDR"]))
  {
    // The request did not originate from the machine
    // that was used to create the session.
    // THIS IS POSSIBLY A SESSION HIJACK ATTEMPT

    $_SESSION["message"] = "You are not authorized to access the URL 
                            {$_SERVER["REQUEST_URI"]} from the address 
                            {$_SERVER["REMOTE_ADDR"]}";
	return false;
	}
  
  // for concurrency check if cookie is same as latest on data
	$username = $_SESSION["loginUsername"];
	$query = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);
	  if(!(isset($_COOKIE['loginkeycookie']) && $_COOKIE['loginkeycookie'] == $row['loginkey'])){
	  $_SESSION["logingmsg"]= "You are logged in elsewhere, login again to use on this machine";
	  return false;
	  }
	
  return true;
}

//if session is not verified then direct to index. 
function verifyUserSession(){
	if (!sessionAuthenticated())
		header("location: index.php");

}

?>
