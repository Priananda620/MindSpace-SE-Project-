<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// if(!empty($_SESSION['username'])){
//     echo json_encode(array('success' => 'true', 'session' => $_SESSION['username']));
// }else{
//     echo json_encode(array('success' => 'false', 'session'));
// }
require_once 'db_config.php';
$connect = new mysqli($db_host,$db_username,$db_password,$db_name);


if(empty($_SESSION['username']) || empty($_POST['username']) || $connect->connect_error){
    echo json_encode(array('success' => 'false'));
}else{
    
    
    $username = $_POST['username'];
    $sess = $_SESSION['username'];

    $sql = "SELECT member_photos FROM user_tbl WHERE username='$sess'";
    $query = $connect->query($sql);
    $row = $query->fetch_assoc();
    $prevName = '../asset/member_images/'.$sess."_".$row['member_photos'];
    $newName = 'asset/member_images/'.$username."_".$row['member_photos'];

    

    // $connect = new mysqli($db_host,$db_username,$db_password,$db_name);
    $sql = "UPDATE user_tbl SET username ='$username' WHERE username='$sess'";
    
    if ($connect->query($sql)) {
        
        if(!rename( $prevName, '../'.$newName)){
            echo json_encode(array('success' => 'false'));
        }else{
            echo json_encode(array('success' => 'true', 'username' => $username, 'path' => $newName));
            $_SESSION['username'] = $username;
        }
    }else{
        echo json_encode(array('success' => 'false'));
    }
}
?>