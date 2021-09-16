<?php
error_reporting(E_ERROR | E_PARSE);

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
$username = $_POST['username'];
$pass = $_POST['password'];
$verify_pass = $_POST['verify-password'];
$email = $_POST['email'];
$photo = $_FILES['picture']['name'];

if(empty($username) || empty($pass) || empty($verify_pass) || empty($email) || empty($photo) || $connect->connect_error){
    echo json_encode(array('success' => 'false'));
}else{

    $ip = $_SERVER['REMOTE_ADDR'];
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $city = $details->city;
    $org = $details->org;

    if($verify_pass != $pass){
        echo json_encode(array('success' => 'false', 'passwordIsUnmatch' => 'true'));
    }else if(!(strlen($verify_pass) >= 8)){
        echo json_encode(array('success' => 'false', 'passwordLength' => 'true'));
    }else{
        $tmp = explode('.', $photo);
        $file_name = guidv4().'.'.end($tmp);
        $path = 'asset/member_images/'.$username."_".$file_name;

        $sql = "INSERT INTO 
        
        user_tbl(username,password,org,city,member_photos,address,email,date_joined) 
        
        VALUES ('$username','$pass','$org','$city','$file_name','$ip','$email',now())";

        if ($connect->query($sql)) {
            
            move_uploaded_file($_FILES['picture']['tmp_name'], "../".$path);

            session_start();
            $_SESSION['username'] = $username;
            echo json_encode(array('success' => 'true', 'username' => $username));
            
        }else{
            echo json_encode(array('success' => 'false', 'accountIsExist' => 'true'));
        }
    }
}
?>