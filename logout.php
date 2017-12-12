<?php require_once('frame_header.php');
session_start();
session_unset();
session_destroy();  

?>
<h1>Goodby- you are logged out<h1>
<?php require_once('frame_footer.php');?>
