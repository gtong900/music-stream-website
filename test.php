<?php


DEFINE ('DB_USER', 'nyu@db-project');
DEFINE ('DB_PASSWORD', 'Ny99999999');
DEFINE ('DB_HOST', 'db-project.mysql.database.azure.com');
DEFINE ('DB_NAME', 'spotify');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' . mysqli_connect_error());

?>