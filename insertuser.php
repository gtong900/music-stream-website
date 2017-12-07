<?php

include 'sqlconnection.php';

$username =  $_GET["username"];
$pass1 = $_GET["password"]; 
$pass2 = $_GET["passwordconfirm"]; 
$email = $_GET["email"]; 
$city = $_GET["city"]; 

$conn = OpenCon();

//check if username already exists
  $query = "SELECT password FROM users WHERE user_name = '{$username}'
            AND password = '{$password_digest}'";

  // Execute the query
  
  if($result = $connection->query($query))
  showerror();
  //if (!$result = @ mysql_query ($query, $connection))
    

  // exactly one row? then we have found the user
  if ($result->num_rows != 1)
    return false;
  else
    return true;

//check if email exist

//check for passwork match





?>