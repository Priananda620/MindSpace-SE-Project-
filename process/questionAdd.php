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
$title = $_POST['title'];
$synopsis = $_POST['synopsis'];
$question_image = $_FILES['question_image']['name'];


if(empty($_SESSION['username']) || empty($title) || empty($synopsis) || $connect->connect_error){
    echo json_encode(array('success' => 'false'));
}else{
    $username = $_SESSION['username'];

    $sql = "SELECT id FROM user_tbl WHERE username = '$username'";
    $result = $connect->query($sql);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $usrID = $row['id'];
        }


        if(!empty($question_image)){
            $tmp = explode('.', $question_image);
            $file_name = guidv4().'.'.end($tmp);

            $file_name = "'".$connect->real_escape_string($file_name)."'";
        }else{
            $file_name = "NULL";
        }
        

        $sql = "INSERT INTO question_tbl (userID,question_title,question_synopsis,date_created,question_image) VALUES ('$usrID','$title','$synopsis',now(), $file_name)";
        
        if($connect->query($sql)){
            
            if(!empty($question_image)){
                $path = 'asset/question_images/'.str_replace("'", "", $file_name);
                move_uploaded_file($_FILES['question_image']['tmp_name'], "../".$path);
            }

            echo json_encode(array('success' => 'true', 'session' => 'true'));
        }else{
            echo json_encode(array('success' => 'false', 'session' => 'true', 'duplicate_question' => 'true'));
        }

    }else{
        echo json_encode(array('success' => 'false', 'session' => 'false'));
    }

}
?>