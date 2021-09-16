<?php session_start();?>
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/questions.css'>
    <!-- <script src='main.js'></script> -->
</head>
<body>
    <div id="fixed-full"></div>
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
							
						echo "<div id=\"user-avatar-rounded\" style=\"background-image:url('"."asset/member_images/".$usrname."_".$row['member_photos']."')\">"."</div>";
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
    <section>
	
        <div id="hero-content">
            <!-- /////////////////////////////////////////////////// -->
        <?php
						require_once 'process/db_config.php';
						$sqlcnt = new mysqli($db_host,$db_username,$db_password,$db_name);
                        $view = 6;
                        
						if (isset ($_GET['page'])){
                            $active_page = $_GET['page'];
                        }  else {
                            $active_page = 1;
                        }
						$start = ($active_page-1)*$view;

						if(isset($_GET['search-query'])){
							$searchString = $_GET['search-query'];
							
                            // $sql = 
                            // "SELECT question_title, question_synopsis, date_created, question_image, q_tbl.userID, u_tbl.id, u_tbl.username, u_tbl.member_photos, DATEDIFF(NOW(), date_created) as 'dateDifference'
                            // FROM question_tbl q_tbl JOIN user_tbl u_tbl 
                            // ON q_tbl.userID = u_tbl.id
                            // WHERE question_title LIKE '%$searchString%' 
                            // LIMIT $start, $view";
                            
                            // $sql = 
                            // "SELECT *, DATEDIFF(NOW(), date_created) as 'dateDifference'
                            // FROM question_tbl JOIN user_tbl
                            // ON user_tbl.id = question_tbl.userID
                            // WHERE question_title LIKE '%$searchString%' 
                            // LIMIT $start, $view";

                            // $sql = 
                            // "SELECT q_tbl.'question_title'
                            // COUNT(a_tbl.answerID) as 'ans_count'
                            // FROM question_tbl  q_tbl
                            // LEFT JOIN answer_tbl a_tbl ON q_tbl.questionID = a_tbl.questionID
                            // GROUP BY q_tbl.questionID, q_tbl.'question_title'";

                            // $sql=
                            // "SELECT
                            // question_tbl.question_title, 
                            // question_tbl.question_synopsis, 
                            // question_tbl.date_created, 
                            // question_tbl.question_image,
                            // user_tbl.username, 
                            // user_tbl.member_photos, 
                            // DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference'
                            // question_tbl.`question_title`,
                            // COUNT(answer_tbl.answerID) AS Total

                            // FROM question_tbl, user_tbl
                            // LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                            // WHERE question_tbl.userID = user_tbl.id
                            // GROUP BY question_tbl.questionID,question_tbl.`question_title`";

                            $sql = "SELECT
                            question_tbl.questionID, 
                            
                            question_tbl.question_synopsis, 
                            question_tbl.date_created, 
                            question_tbl.question_image,
                            user_tbl.username, 
                            user_tbl.member_photos,
                            user_tbl.id AS userID, 
                            DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                            question_tbl.`question_title`,
                            COUNT(answer_tbl.answerID) AS 'answerTotal'

                            FROM question_tbl
                            
                            LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                            INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                            WHERE question_tbl.question_title LIKE '%$searchString%' 
                            GROUP BY question_tbl.questionID,question_tbl.`question_title`
                            LIMIT $start, $view";
// SELECT
// question_tbl.questionID,
// question_tbl.`question_title`,
// COUNT(answer_tbl.answerID) AS Total
// FROM
// question_tbl
// LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
// GROUP BY question_tbl.questionID,question_tbl.`question_title`;

						}else if(isset($_GET['latest'])){
							// $sql = 
                            // "SELECT *, DATEDIFF(NOW(), date_created) as 'dateDifference' 
                            // FROM question_tbl JOIN user_tbl
                            // ON user_tbl.id = question_tbl.userID
                            // ORDER BY date_created DESC 
                            // LIMIT $start, $view";

                            $sql = "SELECT
                            question_tbl.questionID, 

                            question_tbl.question_synopsis, 
                            question_tbl.date_created, 
                            question_tbl.question_image,
                            user_tbl.username, 
                            user_tbl.member_photos,
                            user_tbl.id AS userID, 
                            DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                            question_tbl.`question_title`,
                            COUNT(answer_tbl.answerID) AS 'answerTotal'

                            FROM question_tbl

                            LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                            INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                            
                            GROUP BY question_tbl.questionID,question_tbl.`question_title`
                            ORDER BY date_created DESC 
                            LIMIT $start, $view";
						}else{
                            // $sql = 
                            // "SELECT *, DATEDIFF(NOW(), date_created) as 'dateDifference' 
                            // FROM question_tbl JOIN user_tbl
                            // ON user_tbl.id = question_tbl.userID
                            // LIMIT $start, $view";

                            $sql = "SELECT
                            question_tbl.questionID, 

                            question_tbl.question_synopsis, 
                            question_tbl.date_created, 
                            question_tbl.question_image,
                            user_tbl.username, 
                            user_tbl.member_photos, 
                            user_tbl.id AS userID, 
                            DATEDIFF(NOW(), question_tbl.date_created) AS 'dateDifference',
                            question_tbl.`question_title`,
                            COUNT(answer_tbl.answerID) AS 'answerTotal'

                            FROM question_tbl

                            LEFT JOIN answer_tbl ON question_tbl.questionID = answer_tbl.questionID
                            INNER JOIN user_tbl ON user_tbl.id = question_tbl.userID
                            
                            GROUP BY question_tbl.questionID,question_tbl.`question_title`
                            LIMIT $start, $view";
                        }
						
						
                          $query = $sqlcnt->query($sql);
                          $row = $query->fetch_assoc();

						  if(!empty($row)){
                                if(isset($_GET['latest']) && $_GET['latest']=="true"){
                                    echo "<h2 id=\"alert\">Latest Question</h2>";
                                } else if(isset($_GET['search-query'])){
                                    echo "<h1 id=\"alert\">Question Topic: ";
                                    echo $_GET['search-query'];
                                    echo "</h1>";
                                } else{
                                    echo "<h2 id=\"alert\">Questions</h2>";
                                }
                                $dataIsAvailable = true;
                          }else{
                            echo "<h2 id=\"alert\">-- NOT FOUND --</h2>";
                            $dataIsAvailable = false;
                          }
                          
                          ?>
			<div id="wrapper">

					<?php 
                        if($dataIsAvailable == true){
                            do{
                    ?>
				<div class="column">
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
                              
                            <a href="profile.php?user_id=<?php echo $row['userID'];?>">
                                <div class="category">
                                    <?php echo "<div id=\"user-avatar-rounded\" style=\"background-image:url('"."asset/member_images/".$row['username']."_".$row['member_photos']."')\">"."</div>";?>
                                    <p> <?php echo $row['username']?></p>
                                </div>
                            </a>
        					<h1 class="title"><?php echo $row['question_title'] ?></h1>
        					<h2 class="sub_title"><?php echo $row['answerTotal'] != 0 ? 'answered' : 'unanswered';?></h2>
        					<p class="description"><?php echo htmlspecialchars(substr($row['question_synopsis'],0,110)) ?></p>
        					<div class="post-meta"><span class="timestamp"> <?php echo $row['dateDifference'] != 0 ? $row['dateDifference']." day(s)"." ago" : 'today';?></span><span class="comments"><i class="fa fa-comments"></i><a href="#"> <?php echo $row['answerTotal'];?> Answer(s)</a></span></div>
      					</div>	
    				</div>
  				</div>
                

				    <?php } while ($row = $query->fetch_assoc());
                        }
						
				    ?>

                    
				<?php 
                    $sqltotal = "SELECT * FROM question_tbl";
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script  src="js/index.js"></script>
    <script>
      $('.has-animation').each(function(index) {
  		if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight() ){ 
  			$(this).delay($(this).data('delay')).queue(function(){
      			$(this).addClass('animate-in');
				$('#logo #logo-main h1').addClass('h1-text-active');
    		});    
  		}   
	    });
        $("#user-avatar-rounded").click(function(){
			$("#logged-user-options-container").toggleClass("isActivated");
		});
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script  src="js/script.js"></script>
</body>
</html>