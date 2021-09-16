<?php 
session_start();
unset ($_SESSION['username_admin']);
session_destroy();
header("location:../index.php");

?>