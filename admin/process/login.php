<?php
session_start();
$username = $_POST['usrname'];
$password = $_POST['pass'];
require_once 'db_config.php';
$sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
$sql = "SELECT * FROM admin_tbl WHERE username = '$username' and password = '$password'";
$query = $sqlcnt->query($sql);
$usrrow = $query->fetch_assoc();

if(!empty($usrrow)) {
    $_SESSION['username_admin'] = $username;
    header("location:../question_admin.php");
} else {
    header("location:../index.php?error=1");
}

?>
