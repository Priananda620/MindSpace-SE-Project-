<?php session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MindSpace | Add Question</title>
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
                                    <a href=""><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M14 10H2v2h12v-2zm0-4H2v2h12V6zm4 8v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zM2 16h8v-2H2v2z"></path></g></svg>Add Question</a>
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
            <h1 style="margin: 0 0 2em 0; line-height: 1.5em;">Question Form <div></div></h1>

            <form id="question-form">
                <label for="title">title<span style="color:red"> *</span></label>
                <input style="margin: 0 0 1em 0" type="text" name="title" class="form-input" required>

                <label for="synopsis">synopsis<span style="color:red"> *</span></label>
                <textarea name="synopsis" class="form-input" required rows="6" cols="50"></textarea>

                <label>question image <span style="color:red"> (optional)</span></label>
                <input type="file" name="question_image" placeholder="photo" style="margin: 0 0 1em 0">
                
                <h3 id="question-title-exist" style="display: unset; opacity: 0">Question Title Already Exist...</h3>
                <h3 id="cannot-add-question" style="display: unset; opacity: 0">Cannot Add Question</h3>
                <div style="display: flex; align-items: center;">
                    <button class="hero-button" style="font-family:inherit; margin:2em 20px 2em 0" id="question-button-submit" style="font-family:inherit; margin:2em 0">Add Question</button>
                    <div class="fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                
            </form>
        </div>
        
        <section>
            <div>&nbsp;</div>
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

        $("#question-button-submit").click(function(e){
            $(".fa-2x").css('display', 'none');
            $("#question-title-exist").css({
                'display' : 'unset',
                'opacity' : '0',
            });
            $("#cannot-add-question").css({
                'display' : 'unset',
                'opacity' : '0',
            });

            let form = $("#question-form")[0];
			let fd = new FormData(form);
            

            if(fd.get('title') != "" && fd.get('synopsis') != ""){
                e.preventDefault();

                console.log("changing....");
				console.log(fd.get("title"));
                console.log(fd.get("synopsis"));
                console.log(fd.get("question_image"));
				$('.fa-2x').css('display', 'flex');

                $.ajax({
					url: 'process/questionAdd.php',
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
                            window.location.href = 'questions.php?latest=true';
						}else if(json.success == 'false' && json.duplicate_question == 'true'){
							console.log(json.success);
							console.log("duplicate_question:")
							console.log(json.duplicate_question);
							$("#question-title-exist").css({
                                'display' : 'unset',
                                'opacity' : '1',
                            });
						}else if(json.success == 'false'){
                            $("#cannot-add-question").css({
                                'display' : 'unset',
                                'opacity' : '1',
                            });
                        }
				    }
				});
            }else{
				return;
			}
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