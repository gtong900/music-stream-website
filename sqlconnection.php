<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser 
// It should be saved outside of the main web documents folder
// and imported when needed

/*
Command that gives the database user the least amount of power
as is needed.
GRANT INSERT, SELECT, DELETE, UPDATE ON test3.* 
TO 'studentweb'@'localhost' 
IDENTIFIED BY 'turtledove';
SELECT : Select rows in tables
INSERT : Insert new rows into tables
UPDATE : Change data in rows
DELETE : Delete existing rows (Remove privilege if not required)
*/
/*
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'nyu@db-project');
DEFINE ('DB_PASSWORD', 'Ny99999999');
DEFINE ('DB_HOST', 'db-project.mysql.database.azure.com');
DEFINE ('DB_NAME', 'spotify');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());
/*
*/
function OpenCon()
 {
 $dbhost = "db-project.mysql.database.azure.com";
 $dbuser = "nyu@db-project";
 $dbpass = "Ny99999999";
 $db = "spotify";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db)  or die('Could not connect: ' . mysql_error());
 // mysql_connect($dbhost, $dbuser, $dbpass)  or die('Could not connect: ' . mysql_error());
 
 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
 
?>