<?php session_start();
if(!isset($_SESSION['username']) && !isset($_GET['user_id'])){
		header("location:index.php");
}else if(isset($_GET['user_id'])){
    $userID = $_GET['user_id'];
    
}else{
    $usrname = $_SESSION['username'];
    require_once 'process/db_config.php';
    $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
    $sql = "SELECT id FROM user_tbl WHERE username = '$usrname'";
    $query = $sqlcnt->query($sql);
    $row = $query->fetch_assoc();
    $userID = $row['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MindSpace</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="icon" href="asset/icoo.ico" type="image/x-icon">
    <!----fonts---->
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">
    <!--------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/questions.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/profile.css'>
    <!-- <script src='main.js'></script> -->
</head>
<body>
    <div id="fixed-full">
		<div id="fixed-full-content-wrapper">
			<div id="fixed-full-svg" class="fixed-modal-close">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.9 21.9"><path d="M14.1 11.3c-.2-.2-.2-.5 0-.7l7.5-7.5c.2-.2.3-.5.3-.7s-.1-.5-.3-.7L20.2.3c-.2-.2-.5-.3-.7-.3-.3 0-.5.1-.7.3l-7.5 7.5c-.2.2-.5.2-.7 0L3.1.3C2.9.1 2.6 0 2.4 0s-.5.1-.7.3L.3 1.7c-.2.2-.3.5-.3.7s.1.5.3.7l7.5 7.5c.2.2.2.5 0 .7L.3 18.8c-.2.2-.3.5-.3.7s.1.5.3.7l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3l7.5-7.5c.2-.2.5-.2.7 0l7.5 7.5c.2.2.5.3.7.3s.5-.1.7-.3l1.4-1.4c.2-.2.3-.5.3-.7s-.1-.5-.3-.7l-7.5-7.5z"></path></svg>
			</div>
			<div id="fixed-usernameEdit-container">
				<h1>Change Username<div></div></h1>
				<form id="username-form-evoke">
					<label for="username">username</label>
					<input type="text" name="username" class="form-input" required>

                    <h3 id="username-exist" style="display:none">Cannot use that username...</h3>
					
                    <div style="display: flex;justify-content: space-between;">
					    <button class="hero-button" id="username-update-confirmed" type="submit" style="font-family:inherit; margin:4em 0">Update</button>
                        <button class="hero-button fixed-modal-close" type="button" style="font-family:inherit; margin:4em 0">Cancel</button>
                    </div>
				</form>
			</div>
            <div id="fixed-deleteConfirmation-container">
                <h1>Want To Remove This Question?<div></div></h1>
                <h3 id="cannot-delete-question" style="display:none">Cannot delete selected question...</h3>
                
                <div style="display: flex;justify-content: space-between;">
                    <button class="hero-button" id="delete-question-confirmed" style="font-family:inherit; margin:4em 0">Delete</button>
                    <button class="hero-button fixed-modal-close" style="font-family:inherit; margin:4em 0">Cancel</button>
                </div>
			</div>
            <div id="fixed-editQuestion-container">
				
				<h1>Edit Question<div></div></h1>
                
				<form id="question-edit-form">
					<label for="title">title</label>
					<input type="text" name="title" class="form-input" required>

					<label for="synopsis">synopsis</label>
					<textarea name="synopsis" class="form-input" required rows="6" cols="50"></textarea>

					<label>question image &nbsp;</label>
                    <input type="file" name="question_image" placeholder="photo">
                    
                    <h3 id="cannot-edit-question" style="display:none">Cannot edit selected question...</h3>
                    <img id="imageTEST" style="width: 154px;" />
                    <div style="display: flex;justify-content: space-between;">
					    <button class="hero-button" id="question-edit-confirmed" type="button" style="font-family:inherit; margin:2em 0">Update</button>
                        <button class="hero-button fixed-modal-close" type="button" style="font-family:inherit; margin:2em 0">Cancel</button>
                    </div>
                    
				</form>
			</div>
            <div class="fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>
		</div>
	</div>
    <div id="full-page-container">
        <div class="nav nav-hide" id="nav">
            <div class="nav__content">
                <ul class="nav__list">
                    <a href="index.php"><li class="nav__list-item">Home</li></a> 
                    <a href="questions.php?latest=true"><li class="nav__list-item">Latest Question</li></a>
            
                    <li class="nav__list-item">About Us</li>
                </ul>
            </div>
        </div>
        <header id="header">
            <div class="element_flex">
                <div id="logo">
                    
                    <div id="logo-main">
                        <a href="index.php" id="logo-a-href">
                            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg">
                                <path id="blob" d="M441,276Q411,302,393,321.5Q375,341,335,326.5Q295,312,301.5,370Q308,428,279,427Q250,426,224,417.5Q198,409,187,380Q176,351,120.5,368Q65,385,67.5,346.5Q70,308,42.5,279Q15,250,62,227Q109,204,104.5,172.5Q100,141,141.5,149.5Q183,158,188.5,117.5Q194,77,222,94Q250,111,281.5,83Q313,55,339.5,72.5Q366,90,359.5,132.5Q353,175,352.5,196Q352,217,411.5,233.5Q471,250,441,276Z" fill="#fb8332"></path>
                            </svg>
                            <h1>Mind</h1>
                            <img src="asset/logo.png">
                            <h1 id="hide">Space</h1>
                        </a>
                    </div>
                    
                    <div id="logo-main">
                        <h1>&#60;MS</h1>
                        <img src="asset/logo.png">
                        <!-- <h1>vlopy</h1> -->
                        <h1>/&#62;</h1>
                    </div>
                    <div class="has-animation animation-ltr" data-delay="500">
                        <p>
                            <span>|</span>
                            <span>&nbsp;designed</span>
                            <span>&nbsp;and&nbsp;developed</span>
                            <span>&nbsp;by&nbsp;group (idk wat group)</span>
                        </p>
                    </div>
                </div>
                
            </div>
            <div class="element_flex" id="nav-toggle">
                <div class="menu-icon">
                    <span class="menu-icon__line menu-icon__line-left"></span>
                    <span class="menu-icon__line"></span>
                    <span class="menu-icon__line menu-icon__line-right"></span>
                </div>
                <?php 
                    if(isset($_SESSION['username'])){
                ?>
                <div id="user-welcome-wrapper">
                    <div id="user-welcome-wrapper-inner">
                        <p id="user-welcome">Welcome, <span><?php echo $_SESSION['username'];?></span></p>
                        <?php 
                            $usrname = $_SESSION['username'];
                            require_once 'process/db_config.php';
                            $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
                            $sql = "SELECT member_photos FROM user_tbl WHERE username = '$usrname'";
                            $query = $sqlcnt->query($sql);
                            $row = $query->fetch_assoc();
                            $member_photo = $row['member_photos'];
                            echo "<div id=\"user-avatar-rounded\" class=\"image-evoke-update user-options-evoke\" style=\"background-image:url('"."asset/member_images/".$usrname."_".$row['member_photos']."')\">"."</div>";
                        ?>
                        
                    </div>
                    <div id="logged-user-options-container">
                            <ul>
                                <li>
                                    <a href="addQuestion.php"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M14 10H2v2h12v-2zm0-4H2v2h12V6zm4 8v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zM2 16h8v-2H2v2z"></path></g></svg>Add Question</a>
                                </li>
                                <li>
                                    <a href="profile.php"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g mirror-in-rtl=""><path d="M14 9V3L22 12L14 21V15C8.44 15 4.78 17.03 2 21C3.11 15.33 6.22 10.13 14 9Z"></path></g></svg></svg>My Profile</a>
                                </li>
                                <li>
                                    <a href=""><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"></path></g></svg>Help Answer Questions</a>
                                </li>
                                <li>
                                    <a href=""><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" ><g><path d="M12 1l9 4v6c0 5.5-3.8 10.7-9 12-5.2-1.3-9-6.5-9-12V5l9-4zM7.7 15.1A5.3 5.3 0 0 1 12 6.7a5.3 5.3 0 0 1 4.3 8.4c-.6-1.1-3-1.7-4.3-1.7-1.3 0-3.7.6-4.3 1.7zM12 8.3a2.2 2.2 0 0 0-2.2 2.2c0 1.2 1 2.2 2.2 2.2a2.2 2.2 0 0 0 2.2-2.2c0-1.2-1-2.2-2.2-2.2zm0-2.6A6.3 6.3 0 0 0 5.7 12a6.3 6.3 0 0 0 6.3 6.3 6.3 6.3 0 0 0 6.3-6.3A6.3 6.3 0 0 0 12 5.7z"></path></g></svg>Account Settings</a>
                                </li>
                                <li>
                                    <a href="process/logout.php"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g mirror-in-rtl=""><path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" ></path></g></svg>Sign Out</a>
                                </li>
                                <li>
                                    <a href="" style="margin-bottom:10px; border-bottom: 1px solid #cccccc82 !important;"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M0 0h24v24H0z" fill="none"></path><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"></path></g></svg>Send Feedback</a>
                                </li>
                            </ul>
                        </div>
                </div>
                <?php } ?>
            </div>
        </header>
        
        <div id="profile-container">
            <?php 
                require_once 'process/db_config.php';
                $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
                $sql = "SELECT username, date_joined, member_photos FROM user_tbl WHERE id = '$userID'";
                $query = $sqlcnt->query($sql);
                $row = $query->fetch_assoc();
                
                if(!empty($row['username'])){
                    $avatarUsername = isset($_SESSION['username']) && $_SESSION['username'] == $row['username'] ? 'true' : 'false';
                }else{
                    $avatarUsername = 'false';
                }
                

                if(!empty($row['username'])){
            ?>
            <div id="user-welcome-wrapper-inner">
                <?php
                    $time=strtotime($row['date_joined']);
                    $month=date("F",$time);
                    $year=date("Y",$time);
                    $day=date("d",$time);
                ?>
                <?php
                    
                    $editable = $avatarUsername == 'true' ? "edit-active" : '';
                    echo "<div id=\"user-avatar-rounded\" class=\"image-evoke-update image-form-evoke ".$editable."\" style=\"background-image:url('"."asset/member_images/".$row['username']."_".$row['member_photos']."')\">"."</div>";
                ?>
                <form id="form-update" style="display:none">
                    <input id="user-pic-update" type="file" name="user-pic-update" required>
                </form>
                <div id="name_joined_container" class="<?php echo $editable?> current-profile-username">
                
                    <h2><?php echo $row['username'];?></h2>
                    <p>Joined
                        <?php 
                        echo $day." ".$month." ".$year;
                        ?>
                    </p>
                </div>
                <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $row['username']){ ?>
                <a id="account-setting-btn" href="">
                    <button class="hero-button">
                        account settings
                    </button>
                </a>
                <?php } ?>
            </div>
            
            <div id="user-record-box">
                <?php
                    require_once 'process/db_config.php';
                    $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);

                    $sql = "SELECT COUNT(userID) AS answers FROM answer_tbl WHERE userID = '$userID'";
                    $query = $sqlcnt->query($sql);
                    $row = $query->fetch_assoc();
                ?>
                <a href="profile.php?view=answers<?php echo isset($_GET['user_id']) ? '&user_id='.$_GET['user_id'] : '';?>"><div class="record-box-items <?php echo (isset($_GET['view']) == true && $_GET['view'] == 'answers') || !isset($_GET['view']) ? 'border-selected' : 'fefwfef';?>"><p><?php echo "<strong>".$row['answers']?></strong> answers</p></div></a>
                <?php
                    require_once 'process/db_config.php';
                    $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);

                    $sql = "SELECT COUNT(userID) AS questions FROM question_tbl WHERE userID = '$userID'";
                    $query = $sqlcnt->query($sql);
                    $row = $query->fetch_assoc();
                ?>
                <a href="profile.php?view=questions<?php echo isset($_GET['user_id']) ? '&user_id='.$_GET['user_id'] : '';?>"><div class="record-box-items <?php echo isset($_GET['view']) == true && $_GET['view'] == 'questions' ? 'border-selected' : 'fefwfef';?>"><p><?php echo "<strong>".$row['questions']?></strong> questions</p></div></a>
                <?php
                    require_once 'process/db_config.php';
                    $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);

                    $sql = "SELECT COUNT(DISTINCT question_tbl.questionID) AS 'answered_questions' FROM question_tbl INNER JOIN answer_tbl ON question_tbl.questionId = answer_tbl.questionId WHERE question_tbl.userID = '$userID'";
                    $query = $sqlcnt->query($sql);
                    $row = $query->fetch_assoc();
                ?>
                <a href="profile.php?view=answered_questions<?php echo isset($_GET['user_id']) ? '&user_id='.$_GET['user_id'] : '';?>"><div class="record-box-items <?php echo isset($_GET['view']) == true && $_GET['view'] == 'answered_questions' ? 'border-selected' : 'fefwfef';?>"><p><?php echo "<strong>".$row['answered_questions']?></strong> answered questions</p></div></a>
                <?php
                    require_once 'process/db_config.php';
                    $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);

                    $sql = "SELECT COUNT(question_tbl.questionID) AS unanswered_questions FROM question_tbl LEFT JOIN answer_tbl ON question_tbl.questionId = answer_tbl.questionId WHERE question_tbl.userID = '$userID' AND answer_tbl.userID IS NULL";
                    $query = $sqlcnt->query($sql);
                    $row = $query->fetch_assoc();
                ?>
                <a href="profile.php?view=unanswered_questions<?php echo isset($_GET['user_id']) ? '&user_id='.$_GET['user_id'] : '';?>"><div class="record-box-items <?php echo isset($_GET['view']) == true && $_GET['view'] == 'unanswered_questions' ? 'border-selected' : 'fefwfef';?>"><p><?php echo "<strong>".$row['unanswered_questions']?></strong> unanswered questions</p></div></a>
            </div>
            <?php } else { echo "<h2 id=\"alert\">User Not Found</h2>"; }?>
        </div>
        
        <section>
        
            <div id="hero-content">
                <!-- /////////////////////////////////////////////////// -->
            <?php
                            require_once 'process/db_config.php';
                            $sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
                            $view = 50;
                            
                            if (isset ($_GET['page'])){
                                $active_page = $_GET['page'];
                            }  else {
                                $active_page = 1;
                            }
                            $start = ($active_page-1)*$view;

                            if((isset($_GET['view']) && $_GET['view']=="answers") || !isset($_GET['view'])){
                                
                                $sql = "SELECT
                                question_tbl.questionID, 
                                
                                question_tbl.question_synopsis, 
                                question_tbl.date_created, 
                                question_tbl.question_image,
                                user_tbl.username, 
                                user_tbl.member_photos,
                                user_tbl.id AS user_id_query,
                                DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                                question_tbl.`question_title`,
                                COUNT(answer_tbl.answerID) AS 'answerTotal'

                                FROM question_tbl
                                
                                LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                                INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                                
                                WHERE answer_tbl.userID = '$userID'
                                GROUP BY question_tbl.questionID,question_tbl.`question_title`
                                LIMIT $start, $view";

                            }else if(isset($_GET['view']) && $_GET['view']=="questions"){
                                $sql = "SELECT
                                question_tbl.questionID, 
                                
                                question_tbl.question_synopsis, 
                                question_tbl.date_created, 
                                question_tbl.question_image,
                                user_tbl.username, 
                                user_tbl.member_photos,
                                user_tbl.id AS user_id_query,
                                DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                                question_tbl.`question_title`,
                                COUNT(answer_tbl.answerID) AS 'answerTotal'

                                FROM question_tbl
                                
                                LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                                INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                                WHERE question_tbl.userID = '$userID'
                                GROUP BY question_tbl.questionID,question_tbl.`question_title`
                                LIMIT $start, $view";
                            }else if(isset($_GET['view']) && $_GET['view']=="answered_questions"){
                                $sql = "SELECT
                                question_tbl.questionID, 
                                
                                question_tbl.question_synopsis, 
                                question_tbl.date_created, 
                                question_tbl.question_image,
                                user_tbl.username, 
                                user_tbl.member_photos,
                                user_tbl.id AS user_id_query,
                                DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                                question_tbl.`question_title`,
                                COUNT(answer_tbl.answerID) AS 'answerTotal'

                                FROM question_tbl
                                
                                INNER JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                                INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                                WHERE question_tbl.userID = '$userID'
                                GROUP BY question_tbl.questionID,question_tbl.`question_title`
                                LIMIT $start, $view";
                            }else if(isset($_GET['view']) && $_GET['view']=="unanswered_questions"){
                                $sql = "SELECT
                                question_tbl.questionID, 
                                
                                question_tbl.question_synopsis, 
                                question_tbl.date_created, 
                                question_tbl.question_image,
                                user_tbl.username, 
                                user_tbl.member_photos, 
                                user_tbl.id AS user_id_query,
                                DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                                question_tbl.`question_title`,
                                COUNT(answer_tbl.answerID) AS 'answerTotal'

                                FROM question_tbl
                                
                                LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                                INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                                WHERE question_tbl.userID = '$userID' AND answer_tbl.questionID IS NULL
                                GROUP BY question_tbl.questionID,question_tbl.`question_title`
                                LIMIT $start, $view";
                            }
                            
                            
                            $query = $sqlcnt->query($sql);
                            $row = $query->fetch_assoc();

                            if(!empty($row)){
                                    if(isset($_GET['view']) && $_GET['view']=="answers"){
                                        echo "<h2 id=\"alert\">Question Answered</h2>";
                                    } else if(isset($_GET['view']) && $_GET['view']=="questions"){
                                        echo "<h2 id=\"alert\">Posted Question</h2>";
                                    } else if(isset($_GET['view']) && $_GET['view']=="answered_questions"){
                                        echo "<h2 id=\"alert\">Answered Question</h2>";
                                    } else if(isset($_GET['view']) && $_GET['view']=="unanswered_questions"){
                                        echo "<h2 id=\"alert\">Unanswered Questions</h2>";
                                    }
                                    $dataIsAvailable = true;
                            }else{
                                echo "<h2 id=\"alert\">-- NO DATA --</h2>";
                                $dataIsAvailable = false;
                            }
                            
                            ?>
                <div id="wrapper">

                        <?php 
                            if($dataIsAvailable == true){
                                do{
                        ?>
                    <div class="column" question-id="<?php echo $row['questionID'];?>">
                        <div class="post-module">
                            <div class="thumbnail">
                                <div class="date">
                                    <?php
                                        $time=strtotime($row['date_created']);
                                        $month=date("F",$time);
                                        $year=date("Y",$time);
                                    ?>
                                    <div class="day"><?php echo $month?></div>
                                    <div class="month"><?php echo $year?></div>
                                </div>
                                <img src="asset/question_images/<?php 
                                if(isset($row['question_image'])){
                                    echo $row['question_image'];
                                }else {
                                    echo "default_question_mindspace.jpg";
                                }
                                ?>"/>
                            </div>
                            <div class="post-content">
                                <?php
                                    // $answerQuery = "SELECT 'countAnswer' = COUNT(userID) FROM user_tbl WHERE questionID = ".$row['questionID'];
                                    // $query2 = $sqlcnt->query($answerQuery);
                                    // $answerQuery_row = $query2->fetch_assoc();
                                ?>
                                <a href="profile.php?user_id=<?php echo $row['user_id_query'];?>">
                                    <div class="category">
                                        <?php 
                                            echo "<div id=\"user-avatar-rounded\" style=\"background-image:url('"."asset/member_images/".$row['username']."_".$row['member_photos']."')\">"."</div>";
                                        ?>
                                        <p> <?php echo $row['username']?></p>
                                    </div>
                                <a/>
                                <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $row['username'] && $avatarUsername == 'true'){ ?>

                                    <div class="category" id="category-edit" style="right:0; left: unset">
                                        <i class="fas fa-edit question-edit"></i>
                                        <i class="fas fa-trash-alt question-delete"></i>
                                    </div>

                                <?php } ?>
                                <h1 class="title"><?php echo $row['question_title'] ?></h1>
                                <h2 class="sub_title"><?php echo $row['answerTotal'] != 0 ? 'answered' : 'unanswered';?></h2>
                                <p class="description"><?php echo htmlspecialchars(substr($row['question_synopsis'],0,110)) ?></p>
                                <div class="post-meta"><span class="timestamp"> <?php echo $row['dateDifference'] != 0 ? $row['dateDifference']." days"." ago" : 'today';?></span><span class="comments"><i class="fas fa-comments"></i><a href="#"> <?php echo $row['answerTotal'];?> Answer(s)</a></span></div>
                            </div>	
                        </div>
                    </div>
                    

                        <?php } while ($row = $query->fetch_assoc());
                            }
                            
                        ?>

                        
                    <?php 
                        $sqltotal = $sql;
                        $qtotal = $sqlcnt->query($sqltotal);
                        $total_data = $qtotal->num_rows;
                        $total_page = ceil($total_data/$view);
                        // echo "<h1>".$total_data."</h1>";
                        ?>
                        
                <!-- //////////////////////// -->
                </div>
                <div style="    width: -moz-max-content;overflow: hidden;margin: 50px auto;font-size: 18px;position: relative;">
                        <ul style="list-style-type: none;">
                        
                        <?php for ($i=1;$i<=$total_page;$i++){?>
                        <?php  if($i == $active_page) {?>
                        <li style="float:left;width:1.8em;margin:0 2px;color:black">
                            
                            <p style="text-align:center"><?php echo $i; ?></p>
                            
                        </li>
                        <?php } else {?>
                            <li id="hvr"style="float:left;width:1.8em;margin:0 2px;">
                                <a href="
                                <?php if(isset($_GET['search-query'])){
                                    echo "?search-query=";
                                    echo $_GET['search-query'];
                                    echo "&";
                                }else if(isset($_GET['latest'])){
                                    echo "?latest=";
                                    echo $_GET['latest'];
                                    echo "&";
                                }else{
                                    echo "?";
                                }
                                ?>
                                page=<?php echo $i;?>" style="text-decoration:none">
                                <p style="text-align:center;color:#909090">
                                <?php echo $i; ?>
                                </p>
                                </a>
                            </li>
                        <?php }?>
                        <?php }?>
                        </ul>
                        </div>
            </div> 
        </section>
        <div id="divider_content">
            <div id="divider_transparentBg"></div>
            <div id="divider" uk-parallax="y:80%;easing:0.7;opacity:.8">
                <div id="divider_background">
                </div>
            </div>
        </div>
        <section>
            <div>

            </div>
            <div></div>
        </section>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src="js/index.js"></script>
    
    <script>
        $(document).ready(function(){
            $('title').html('MindSpace | '+$('.current-profile-username h2').html());
        });

        $('.has-animation').each(function(index) {
            if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight() ){ 
                $(this).delay($(this).data('delay')).queue(function(){
                    $(this).addClass('animate-in');
                    $('#logo #logo-main h1').addClass('h1-text-active');
                });    
            }
	    });

        $(".user-options-evoke").click(function(){
			$("#logged-user-options-container").toggleClass("isActivated");
		});
        

        var isEditable = <?php echo $avatarUsername;?>;

        if(isEditable){
            $(".image-form-evoke").on('click', function(e){
                e.preventDefault();
                $("#user-pic-update")[0].click();
            });
        
    
            $("#user-pic-update").change(function(){
                console.log("changing....");
                $('.fa-2x').css('display', 'flex');

                // var fd = new FormData();
                // var files = $('#user-pic-update')[0].files;
                // fd.append('user-pic-update',files[0]);
                let form = $('#form-update')[0];
                let fd = new FormData(form);
                console.log(fd.get('user-pic-update'));

                $.ajax({
                    url: 'process/userPictureUpdater.php',
                    method: 'POST',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('.fa-2x').css('display', 'none');
                        let json = $.parseJSON(response);
                        if(json.success == 'true'){
                            console.log(json.success);
                            $('.image-evoke-update').css('background-image', 'url('+json.path+'?t='+new Date().getTime()+')');
                            console.log(json.path);
                        }else{
                            console.log(json.success);
                        }
                    }
                });
            });

            $("#username-update-confirmed").on('click', function(e){
                e.preventDefault();
                console.log("changing....");
                $('.fa-2x').css('display', 'flex');
                $('#username-exist').css('display', 'none');

                let form = $('#username-form-evoke')[0];
                let fd = new FormData(form);

                $.ajax({
                    url: 'process/usernameUpdater.php',
                    method: 'POST',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('.fa-2x').css('display', 'none');
                        let json = $.parseJSON(response);
                        if(json.success == 'true'){
                            console.log(json.success);
                            console.log(json.path);
                            console.log(json.username);
                            $('#name_joined_container h2, #user-welcome span').html(json.username);
                            $('.image-evoke-update').css('background-image', 'url('+json.path+'?t='+new Date().getTime()+')');
                            $(".fixed-modal-close")[0].click();
                        }else{
                            console.log(json.success);
                            $('#username-exist').css('display', 'block');
                        }
                    }
                });
            });
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $('#delete-question-confirmed').click(function(){
                console.log("changing....");
                $('.fa-2x').css('display', 'flex');
                $('#cannot-delete-question').css('display', 'none');

                let fd = new FormData();

                fd.append('question-id', $('.question-selected').attr('question-id'));
                console.log($('.question-selected').attr('question-id'));
                console.log(fd.get('question-id'));

                $.ajax({
                    url: 'process/deleteQuestion.php',
                    method: 'POST',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('.fa-2x').css('display', 'none');
                        let json = $.parseJSON(response);
                        console.log(json);
                        if(json.success == 'true'){
                            console.log(json.success);
                            console.log(json.id);
                            $('.question-selected').remove();
                            $(".fixed-modal-close")[0].click();
                        }else{
                            console.log(json.success);
                            $('#cannot-delete-question').css('display', 'block');
                        }
                    }
                });
                
            });

            $("#question-edit-confirmed").click(function(){
                console.log("changing....");
                $('.fa-2x').css('display', 'flex');
                $('#cannot-edit-question').css('display', 'block');


                let form = $('#question-edit-form')[0];
                let fd = new FormData(form);


                fd.append('question-id', $('.question-selected').attr('question-id'));
                console.log($('.question-selected').attr('question-id'));
                console.log(fd.get('question-id'));
                console.log(fd.get('title'));
                console.log(fd.get('synopsis'));
                console.log(fd.get('question_image')); 

                // let hostName = window.location.hostname;
                // let pathName = window.location.pathname;
                // let r = /[^\/]*$/;
                // pathName = pathName.replace(r, '');
                // console.log(hostName+pathName+$('.question-selected .thumbnail img').attr('src'));

                // imagePath = hostName+pathName+$('.question-selected .thumbnail img').attr('src');
                
                // function srcToFile(src, fileName, mimeType){
                //     return (fetch(src)
                //         .then(function(res){return res.arrayBuffer();})
                //         .then(function(buf){return new File([buf], fileName, {type:mimeType});})
                //     );
                // }
                
                // srcToFile($('.question-selected .thumbnail img').attr('src'), 'new.png', 'image/png')
                // .then(file => {
                //     fd.append("file1", file);
                //     console.log(fd.get('file1'));
                // });
                // console.log(fd.get('file1'));
                // $('#imageTEST').attr('src', URL.createObjectURL(fd.get('file1')));

            });

            $(".question-delete").click(function(e){
                e.stopPropagation();
                $("body").addClass("overlay-active");
                $("#fixed-usernameEdit-container").removeClass("isActivated");
                $("#fixed-editQuestion-container").removeClass("isActivated");
                $("#fixed-deleteConfirmation-container").addClass("isActivated");
                $(this).parents('.column').addClass('question-selected');
            });

            

            $(".question-edit").click(function(e){
                e.stopPropagation();
                $("body").addClass("overlay-active");
                $("#fixed-usernameEdit-container").removeClass("isActivated");
                $("#fixed-deleteConfirmation-container").removeClass("isActivated");
                $("#fixed-editQuestion-container").addClass("isActivated");
                $(this).parents('.column').addClass('question-selected');
                $('#fixed-full-content-wrapper').css('width', 'auto');

                // $('#fixed-full-content-wrapper').css('height', '100%');
                // console.log($(".question-selected .post-content h1.title").html());
                // console.log($(".question-selected .post-content p.description").html());
                
                $("#fixed-editQuestion-container form input[name='title']").val($(".question-selected .post-content h1.title").html());
                $("#fixed-editQuestion-container form textarea[name='synopsis']").val($(".question-selected .post-content p.description").html());
                // $("#fixed-editQuestion-container form input[name='title']").attr("value", $(".question-selected .post-content h1.title").html());
                // $("#fixed-editQuestion-container form textarea[name='synopsis']").html($(".question-selected .post-content p.description").html());

                

                // var file = new File(["foo"], "foo.txt", {
                //     type: "text/plain",
                // });
            });

            $("#name_joined_container").click(function(){
                $("body").addClass("overlay-active");
                $("#fixed-usernameEdit-container").addClass("isActivated");
                $("#fixed-deleteConfirmation-container").removeClass("isActivated");
                $("#fixed-editQuestion-container").removeClass("isActivated");
                // $(".column[question-id=4]").remove();
		    });

		    $(".fixed-modal-close").click(function(){
                $("body").removeClass("overlay-active");
                $("#fixed-usernameEdit-container").removeClass("isActivated");
                $("#fixed-deleteConfirmation-container").removeClass("isActivated");
                $("#fixed-editQuestion-container").removeClass("isActivated");
                $('#username-exist').css('display', 'none');
                $('#cannot-delete-question').css('display', 'none');
                $('#cannot-edit-question').css('display', 'none');
                $('.fa-2x').css('display', 'none');
                $('.question-selected').removeClass('question-selected');
                $('#fixed-full-content-wrapper').attr('style', '');
		    });

            
        }

		$(".column").click(function(){
            //bubbling on question edit and delete
            
            // $(this).parents('.column').addClass('question-selected');
            // location.replace("https://www.w3schools.com");

            // console.log("thread.php?question_id="+$(this).attr('question-id'));

            window.location = "thread.php?question_id="+$(this).attr('question-id');
        });

        // function unfocusUsernameForm() {
        //     $("body").removeClass("overlay-active");
		// 	$("#fixed-register-container").removeClass("isActivated");
		// 	$("#fixed-login-container").removeClass("isActivated");
        // }
        
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="js/script.js"></script>
</body>
</html>