<?php 
session_start();
$_SESSION =[];
session_unset();
session_destroy();

setcookie('on', '', time() - 3600);
setcookie('em', '', time() - 3600);


header("Location: login.php");
exit;


?>