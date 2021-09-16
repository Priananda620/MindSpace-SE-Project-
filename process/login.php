<?php
require_once 'db_config.php';

$connect = new mysqli($db_host,$db_username,$db_password,$db_name);
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username) || empty($password) || $connect->connect_error){
    echo json_encode(array('success' => 'false', 'user' => 'false', 'authenticated' => 'false'));   
}else{

    
    $sql = "SELECT * FROM user_tbl WHERE username = '$username'";
    
    $result = $connect->query($sql);

    if($result -> num_rows > 0){
        $usernameExist = true;
    }else{
        $usernameExist = false;
    }

    $sql = "SELECT * FROM user_tbl WHERE username = '$username' AND password = '$password'";
    
    $result = $connect->query($sql);

    if($result -> num_rows > 0){
        $authenticated = true;
    }else{
        $authenticated = false;
    }

    if(!$usernameExist && !$authenticated) {
        echo json_encode(array('success' => 'false', 'user' => 'false', 'authenticated' => 'false')); 
    } else if($usernameExist && !$authenticated) {
        echo json_encode(array('success' => 'false', 'user' => 'true', 'authenticated' => 'false'));   
    }else if($usernameExist && $authenticated) {
        echo json_encode(array('success' => 'true', 'user' => 'true', 'authenticated' => 'true'));
        session_start();
        $_SESSION['username'] = $username;
    }
    
}

?>
