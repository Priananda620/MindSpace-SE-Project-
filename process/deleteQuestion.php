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


if(empty($_SESSION['username']) || empty($_POST['question-id']) || $connect->connect_error){
    echo json_encode(array('success' => 'false'));
}else{
    $POST_question_id = $_POST['question-id'];
    $sess = $_SESSION['username'];

    $sql = "SELECT userID AS 'question_userID', (SELECT id FROM user_tbl WHERE username = '$sess') AS 'user_userID' FROM question_tbl WHERE questionID = '$POST_question_id'";
    $query = $connect->query($sql);
    $row = $query->fetch_assoc();
    if($row['question_userID'] != $row['user_userID']){
        echo json_encode(array('success' => 'false'));
    }else{
        $sql = "SELECT question_image FROM question_tbl WHERE questionID = '$POST_question_id'";
        $result = $connect->query($sql);
        while($row = $result->fetch_assoc()){
            $questionImage = $row['question_image'];
        }

        $sql = "DELETE FROM question_tbl WHERE questionID = '$POST_question_id'";
    
        if ($connect->query($sql)) {
            
            if(!empty($questionImage)){
                unlink('../asset/question_images/'.$questionImage);
            }

            echo json_encode(array('success' => 'true', 'id' => $POST_question_id, 'img' => $questionImage));
        }else{
            echo json_encode(array('success' => 'false'));
        }

    }
}
?>