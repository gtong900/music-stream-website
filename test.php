<?php
   require_once('sqlconnection.php');
	//setcookie("loginkeycookie", "testkjhkjhkjh", time() + (86400 * 1), "/"); // 86400 = 1 day
	?>
<html>
<body>
<?php
session_start();
echo $_SESSION["loginUsername"]."<br>";
$username = $_SESSION["loginUsername"];
	$query = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);
	echo $row['username']."<br>";
	
	$query = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);
	echo $row['loginkey']."<br>";
	
	if(isset($_COOKIE['loginkeycookie'])){
		 echo"cookie exists"."<br>";
	if($_COOKIE['loginkeycookie'] != $row['loginkey']){
	  echo"it doesn't match"."<br>";
	  }
	}
	
	if(!(isset($_COOKIE['loginkeycookie']) && $_COOKIE['loginkeycookie'] == $row['loginkey'])){
	  echo"it doesn't match"."<br>";
	  }
	
echo $_COOKIE['loginkeycookie'];
echo "<br>";
//echo $_SESSION["loginUsername"];
?>