<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// if(!empty($_SESSION['username'])){
//     echo json_encode(array('success' => 'true', 'session' => $_SESSION['username']));
// }else{
//     echo json_encode(array('success' => 'false', 'session'));
// }

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

require_once 'db_config.php';
$connect = new mysqli($db_host,$db_username,$db_password,$db_name);

if(empty($_SESSION['username']) || $connect->connect_error){
    echo json_encode(array('success' => 'false'));
}else{
    
    $photo = $_FILES['user-pic-update'] ['name'];
    $sess = $_SESSION['username'];



    $sql = "SELECT member_photos FROM user_tbl WHERE username='$sess'";
    $query = $connect->query($sql);
    $row = $query->fetch_assoc();
    $del = '../asset/member_images/'.$sess."_".$row['member_photos'];
    unlink($del);
    

    $tmp = explode('.', $photo);
    $file_name = guidv4().'.'.end($tmp);

    // $connect = new mysqli($db_host,$db_username,$db_password,$db_name);
    $sql = "UPDATE user_tbl SET member_photos='$file_name' WHERE username='$sess'";
    
    if ($connect->query($sql)) {
        $path = 'asset/member_images/'.$sess."_".$file_name;
        move_uploaded_file($_FILES['user-pic-update'] ['tmp_name'], "../".$path);
        echo json_encode(array('success' => 'true', 'path' => $path));
    }else{
        echo json_encode(array('success' => 'false'));
    }
}
?>