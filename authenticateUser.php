<?php
require_once 'sqlconnection.php';
require_once 'authentication.inc';

	if(authenticateUser($conn,$_POST["username"],$_POST["password"])){
		session_start();
		  $_SESSION["loginUsername"] = $_POST["username"];

		  // Register the IP address that started this session
		  $_SESSION["loginIP"] = $_SERVER["REMOTE_ADDR"];
						
		  // Relocate back to the first page of the application
		  header("Location: user.php");
				
		//found
	}else{
		//not found go back to home page
		 header("Location:index.php?login=notfound");
		//header("Location: http://website2.com/".$fpvalue.".aspx?r=".$frvalue."&s=".$fsvalue);
	}
	

?>
