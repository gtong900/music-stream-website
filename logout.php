<?php require_once('frame_header.php');
if(session_status()!=2)
   session_start();
session_unset();
session_destroy();  

?>
<h1>Goodby- you are logged out<h1>
<?php require_once('frame_footer.php');?>
