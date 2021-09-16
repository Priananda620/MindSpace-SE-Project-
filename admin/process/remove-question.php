<?php
session_start();
if(!isset($_SESSION{'username_admin'})){
    header("location:../../index.php?error=2");
}
$questionId = $_GET['questionId'];

require_once 'db_config.php';
$sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
$sql = "DELETE FROM question_tbl WHERE `question_tbl`.`questionID`='$questionId'";

if ($sqlcnt->query($sql) === TRUE) {
    echo "Record deleted successfully";
    
  } else {
    
    echo "Error deleting record: " . $sqlcnt->error;
  }
$sqlcnt->close();

echo "<br><a href=\"../../question_admin.php\">go to previous page</a>"

?>
