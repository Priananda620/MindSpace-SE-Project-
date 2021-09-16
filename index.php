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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <!-- <script src='main.js'></script> -->
</head>
<body>
	<?php 
        if(!isset($_SESSION['username'])){
    ?>
    <div id="fixed-full">
		<div id="fixed-full-content-wrapper">
			<div id="fixed-full-svg" class="fixed-modal-close"> 
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.9 21.9"><path d="M14.1 11.3c-.2-.2-.2-.5 0-.7l7.5-7.5c.2-.2.3-.5.3-.7s-.1-.5-.3-.7L20.2.3c-.2-.2-.5-.3-.7-.3-.3 0-.5.1-.7.3l-7.5 7.5c-.2.2-.5.2-.7 0L3.1.3C2.9.1 2.6 0 2.4 0s-.5.1-.7.3L.3 1.7c-.2.2-.3.5-.3.7s.1.5.3.7l7.5 7.5c.2.2.2.5 0 .7L.3 18.8c-.2.2-.3.5-.3.7s.1.5.3.7l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3l7.5-7.5c.2-.2.5-.2.7 0l7.5 7.5c.2.2.5.3.7.3s.5-.1.7-.3l1.4-1.4c.2-.2.3-.5.3-.7s-.1-.5-.3-.7l-7.5-7.5z"></path></svg>
			</div>
			<div id="fixed-login-container">
				
				<h1>Login to your account<div></div></h1>
				<form enctype="multipart/form-data">
					<label for="username">username</label>
					<input type="text" name="username" class="form-input" required>
					<label for="password">password</label>
					<input type="password" name="password" class="form-input" required>
					
					<h3 id="username-not-exist">Username Not Exist...</h3>
					<h3 id="incorrect-password">Incorrect Password...</h3>
					
					<button class="hero-button" style="font-family:inherit; margin:2em 0">Login</button>
				</form>
			</div>
			<div id="fixed-register-container">
				
				<h1 style="margin: 0 0 1em 0;">Register An Account<div></div></h1>
				<form enctype="multipart/form-data">
					<label for="email">email</label>
					<input type="email" name="email" class="form-input" required>

					<label for="username">username</label>
					<input type="text" name="username" class="form-input" required>

					<label>profile picture &nbsp;</label>
                    <input type="file" name="picture" placeholder="photo" required>

					<label for="password">password</label>
					<input type="password" name="password" class="form-input" required>
					
					<label for="verify-password">re-type password</label>
					<input type="password" name="verify-password" class="form-input" required>

					
					<h3 id="account-exist">username/email already exist</h3>
					<h3 id="password-unmatch">Password does not match</h3>
					<h3 id="password-length">Password Too Short</h3>
					
					<button class="hero-button" style="font-family:inherit; margin:1em 0">Sign Me Up</button>
				</form>
				
			</div>
			<div class="fa-2x"><i class="fas fa-circle-notch fa-spin"></i></div>
		</div>
	</div>
	<?php }?>
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
						<h1><span>Mind</span></h1>
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
                        <span>&nbsp;by&nbsp;group (idk what group)</span>
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
								<a href="profile.php"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g mirror-in-rtl=""><path d="M14 9V3L22 12L14 21V15C8.44 15 4.78 17.03 2 21C3.11 15.33 6.22 10.13 14 9Z"></path></g></svg></svg>My profile</a>
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
                
        <div id="light">
                <div id="social-media-line"></div>
	            <ul class="btn-list normal">
		            <!-- <li><a href="#" class="btn-gradient facebook"><i class="fa fa-facebook"></i></a></li> -->
		            <!-- <li><a href="#" class="btn-gradient twitter"><i class="fa fa-twitter"></i></a></li> -->
		            <li><a href="#" class="btn-gradient google-plus"><i class="fab fa-google-plus"></i></a></li>
		            <li><a href="instagram.com" class="btn-gradient instagram"><i class="fab fa-instagram"></i></a></li>
		            <!-- <li><a href="#" class="btn-gradient linkedin"><i class="fa fa-linkedin"></i></a></li> -->
		            <li><a href="#" class="btn-gradient github"><i class="fab fa-github"></i></a></li>
		            <!-- <li><a href="#" class="btn-gradient codepen"><i class="fa fa-codepen"></i></a></li> -->
		            <li><a href="#" class="btn-gradient gmail"><i class="fa fa-envelope"></i></a></li>
		            <!-- <li><a href="#" class="btn-gradient skype"><i class="fa fa-skype"></i></a></li> -->
                </ul>
                <div id="social-media-line"></div>
            </div>
            <div class="container">
                <div class="container-content">
                    <h1>Hello There,<br> What Can We<br> <span>Help You To Find</span><div></div></h1>
                    <form action="questions.php" method="get">
						<!-- <label class="search-input-wrap"><h1 id="search-title" class="screen-reader-text">Search</h1><svg viewBox="0 0 56.7 56.7" class="icon-mag"><path d="M42.8 7.3C33-2.4 17.1-2.4 7.3 7.3c-9.8 9.8-9.8 25.7 0 35.5 8.7 8.7 22.2 9.7 32 2.9l9.6 9.6c1.8 1.8 4.7 1.8 6.4 0 1.8-1.8 1.8-4.7 0-6.4l-9.6-9.6c6.8-9.8 5.8-23.3-2.9-32zm-6.2 29.3c-6.4 6.4-16.7 6.4-23.1 0s-6.4-16.7 0-23.1c6.4-6.4 16.7-6.4 23.1 0 6.4 6.4 6.4 16.8 0 23.1z"></path></svg> -->
						<!-- <input autocomplete="off" class="search-input" data-test-id="search-input" name="q" placeholder="Search CodePen..." type="search" value=""> -->
					<input type="search" name="search-query" class="form-input" placeholder="search mindspace for topics..." value="" required>
					<!-- </label> -->
						
					</form>
					<p>MindSpace is a fully featured website platform for knowlege exchangement, ask questions and connect with people who contribute unique insights </p>
                    
                    <div id="hero-button-container">
						<?php 
        					if(!isset($_SESSION['username'])){
    					?>
                        <a class="hero-button" id="hero-button-login">Login</a>
                        <a class="hero-button" id="hero-button-register">Register</a>
						<?php } else {?>
						<a class="hero-button" href="index.php#part2">Meet Us</a>
						<a class="hero-button" href="#">About Us</a>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="hero-bg">
                <svg width="124" height="64" viewBox="0 0 124 64" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient x1="0%" y1="50%" x2="114.418%" y2="50%" id="squares-1-a">
                                            <stop stop-color="#8595ae" offset="0%"></stop>
                                            <stop stop-color="#6EFACC" stop-opacity="0" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <path d="M0 0h4v4H0V0zm0 12h4v4H0v-4zm0 12h4v4H0v-4zm0 12h4v4H0v-4zm0 12h4v4H0v-4zm0 12h4v4H0v-4zM12 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM24 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM36 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM48 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM60 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM72 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM84 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zM96 0h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm12-60h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm12-60h4v4h-4V0zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4zm0 12h4v4h-4v-4z" fill="url(#squares-1-a)" fill-rule="evenodd"></path>
                                </svg>
			    <svg width="720" height="635" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="97.738%" id="a">
								            <stop stop-color="#06101f" offset="0%"></stop>
								            <stop stop-color="#16243c" offset="100%"></stop>
								        </linearGradient>
								    </defs>
								    <path d="M0 0h720v504.382L279.437 630.304c-53.102 15.177-108.454-15.567-123.631-68.669-.072-.25-.142-.5-.211-.75L0 0z" fill="url(#a)" fill-rule="evenodd" style=""></path>
                </svg>
                <svg width="344" height="217" xmlns="http://www.w3.org/2000/svg">
								    <defs>
                                    <linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="line-1-a">
								            <stop stop-opacity="0" offset="0%" stop-color="#ffbc48"></stop>
								            <stop offset="53.489%" stop-color="#c86924"></stop>
								            <stop stop-opacity="0" offset="100%" stop-color="#634230"></stop>
								        </linearGradient>
								    </defs>
								    <path d="M340.86 180.664l2.281 3.287c-79.796 55.378-120.994 39.511-120.994-47.035 0-82.777-47.283-92.246-144.735-27.901-32.607 20.428-55.391 21.53-67.544 2.516C-1.882 93.147-3.092 56.053 5.987 0l3.948.64c-8.928 55.125-7.743 91.453 3.303 108.736 10.644 16.653 31.058 15.666 62.01-3.725 99.65-65.797 150.9-55.534 150.9 31.265 0 83.03 37.371 97.424 114.713 43.748z" fill="url(#line-1-a)" fill-rule="nonzero" transform="matrix(-1 0 0 1 343.141 0)"></path>
                </svg>
                <svg width="500" height="217" xmlns="http://www.w3.org/2000/svg">
								    <defs>
                                    <linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="line-1-a">
								            <stop stop-opacity="0" offset="0%" stop-color="#ffbc48"></stop>
								            <stop offset="53.489%" stop-color="#c86924"></stop>
								            <stop stop-opacity="0" offset="100%" stop-color="#634230"></stop>
								        </linearGradient>
								    </defs>
								    <g transform="matrix(1 0 0 -1 326 124)" fill="#1f2b35">
                                        <path d="M62.225 0l1.415 1.414L1.414 63.64 0 62.225zM66.468 4.243l1.414 1.414L5.657 67.882l-1.414-1.414zM70.71 8.485L72.126 9.9 9.899 72.125 8.485 70.71zM74.953 12.728l1.415 1.414-62.226 62.226-1.414-1.415zM79.196 16.97l1.414 1.415L18.385 80.61l-1.414-1.414zM83.439 21.213l1.414 1.414-62.226 62.226-1.414-1.414zM87.681 25.456l1.414 1.414L26.87 89.095l-1.414-1.414zM91.924 29.698l1.414 1.415-62.225 62.225-1.415-1.414z"></path>
                                        <path d="M91.924 29.698l1.414 1.415-62.225 62.225-1.415-1.414zM96.167 33.941l1.414 1.414-62.226 62.226-1.414-1.414zM100.41 38.184l1.413 1.414-62.225 62.225-1.414-1.414zM104.652 42.426l1.414 1.415-62.225 62.225-1.415-1.414zM108.894 46.669l1.415 1.414-62.226 62.226-1.414-1.415zM113.137 50.912l1.414 1.414-62.225 62.225-1.414-1.414zM117.38 55.154l1.414 1.415-62.225 62.225-1.415-1.414zM121.622 59.397l1.415 1.414-62.226 62.226-1.414-1.415z"></path>
                                        <g>
                                            <path d="M100.811 0l-1.414 1.414 62.225 62.226 1.415-1.415zM96.569 4.243l-1.415 1.414 62.226 62.225 1.414-1.414zM92.326 8.485L90.912 9.9l62.225 62.226 1.414-1.414zM88.083 12.728l-1.414 1.414 62.225 62.226 1.415-1.415zM83.84 16.97l-1.414 1.415 62.226 62.225 1.414-1.414zM79.598 21.213l-1.414 1.414 62.225 62.226 1.414-1.414zM75.355 25.456l-1.414 1.414 62.226 62.225 1.414-1.414zM71.113 29.698l-1.415 1.415 62.226 62.225 1.414-1.414z"></path>
                                            <path d="M71.113 29.698l-1.415 1.415 62.226 62.225 1.414-1.414zM66.87 33.941l-1.414 1.414 62.225 62.226 1.414-1.414zM62.627 38.184l-1.414 1.414 62.226 62.225 1.414-1.414zM58.385 42.426l-1.414 1.415 62.225 62.225 1.414-1.414zM54.142 46.669l-1.414 1.414 62.225 62.226 1.415-1.415zM49.9 50.912l-1.415 1.414 62.226 62.225 1.414-1.414zM45.657 55.154l-1.414 1.415 62.225 62.225 1.414-1.414zM41.414 59.397L40 60.811l62.225 62.226 1.415-1.415z"></path>
                                        </g>
                                    </g>                
                            </svg>
                            <svg viewBox="0 0 940 647" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow:visible;position: absolute;top: 1%;left: -7%;" height="600" width="680">
									<defs>
										<linearGradient x1="100%" y1="0%" x2="0%" y2="100%" id="hero-illustration-a">
											<stop stop-color="#261FB6" offset="0%"></stop>
											<stop stop-color="#4950F6" offset="100%"></stop>
										</linearGradient>
										<linearGradient x1="89.764%" y1="16.809%" x2="11.987%" y2="82.178%" id="hero-illustration-b">
											<stop stop-color="#FC8464" offset="0%"></stop>
											<stop stop-color="#FB5C32" offset="100%"></stop>
										</linearGradient>
										<linearGradient x1="100%" y1="23.096%" x2="4.439%" y2="96.586%" id="hero-illustration-c">
											<stop stop-color="#1ADAB7" offset="0%"></stop>
											<stop stop-color="#55EBD0" offset="100%"></stop>
										</linearGradient>
										<filter x="-13%" y="-150%" width="126.1%" height="400%" filterUnits="objectBoundingBox" id="hero-illustration-d">
											<feGaussianBlur stdDeviation="32" in="SourceGraphic"></feGaussianBlur>
										</filter>
										<linearGradient x1="0%" y1="100%" x2="46.694%" y2="42.915%" id="hero-illustration-f">
											<stop stop-color="#EEF1FA" offset="0%"></stop>
											<stop stop-color="#FFF" offset="100%"></stop>
										</linearGradient>
										<rect id="hero-illustration-e" width="800" height="450" rx="4"></rect>
										<linearGradient x1="100%" y1="-12.816%" x2="0%" y2="-12.816%" id="hero-illustration-g">
											<stop stop-color="#D2DAF0" stop-opacity="0" offset="0%"></stop>
											<stop stop-color="#D2DAF0" offset="50.045%"></stop>
											<stop stop-color="#D2DAF0" stop-opacity="0" offset="100%"></stop>
										</linearGradient>
										<linearGradient x1="116.514%" y1="-21.201%" x2="0%" y2="100%" id="hero-illustration-h">
											<stop stop-color="#55EBD0" offset="0%"></stop>
											<stop stop-color="#4950F6" offset="100%"></stop>
										</linearGradient>
										<path id="hero-illustration-j" d="M0 0h308v288H0z"></path>
										<filter x="-15.6%" y="-12.5%" width="139%" height="141.7%" filterUnits="objectBoundingBox" id="hero-illustration-i">
											<feOffset dx="12" dy="24" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
											<feGaussianBlur stdDeviation="16" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
											<feColorMatrix values="0 0 0 0 0.0666666667 0 0 0 0 0.062745098 0 0 0 0 0.243137255 0 0 0 0.08 0" in="shadowBlurOuter1"></feColorMatrix>
										</filter>
										<circle id="hero-illustration-k" cx="16" cy="16" r="16"></circle>
										<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="hero-illustration-m">
											<stop stop-color="#C6FDF3" offset="0%"></stop>
											<stop stop-color="#C6FDF3" stop-opacity="0" offset="100%"></stop>
										</linearGradient>
										<linearGradient x1="2.875%" y1="89.028%" x2="99.412%" y2="6.885%" id="hero-illustration-n">
											<stop stop-color="#83F0DD" offset="0%"></stop>
											<stop stop-color="#1ADAB7" offset="50.924%"></stop>
											<stop stop-color="#55EBD0" offset="100%"></stop>
										</linearGradient>
										<linearGradient x1="50%" y1="1.569%" x2="50%" y2="97.315%" id="hero-illustration-o">
											<stop stop-color="#FF97AA" offset="0%"></stop>
											<stop stop-color="#FF6381" offset="100%"></stop>
										</linearGradient>
										<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="hero-illustration-p">
											<stop stop-color="#FCAC96" offset="0%"></stop>
											<stop stop-color="#FC8464" offset="100%"></stop>
										</linearGradient>
										<circle id="hero-illustration-r" cx="28" cy="28" r="28"></circle>
										<filter x="-85.7%" y="-64.3%" width="314.3%" height="314.3%" filterUnits="objectBoundingBox" id="hero-illustration-q">
											<feOffset dx="12" dy="24" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
											<feGaussianBlur stdDeviation="16" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
											<feColorMatrix values="0 0 0 0 0.0666666667 0 0 0 0 0.062745098 0 0 0 0 0.243137255 0 0 0 0.08 0" in="shadowBlurOuter1"></feColorMatrix>
										</filter>
										<circle id="hero-illustration-t" cx="36" cy="36" r="36"></circle>
										<filter x="-66.7%" y="-50%" width="266.7%" height="266.7%" filterUnits="objectBoundingBox" id="hero-illustration-s">
											<feOffset dx="12" dy="24" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
											<feGaussianBlur stdDeviation="16" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
											<feColorMatrix values="0 0 0 0 0.0666666667 0 0 0 0 0.062745098 0 0 0 0 0.243137255 0 0 0 0.08 0" in="shadowBlurOuter1"></feColorMatrix>
										</filter>
										<circle id="hero-illustration-v" cx="28" cy="28" r="28"></circle>
										<filter x="-85.7%" y="-64.3%" width="314.3%" height="314.3%" filterUnits="objectBoundingBox" id="hero-illustration-u">
											<feOffset dx="12" dy="24" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
											<feGaussianBlur stdDeviation="16" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
											<feColorMatrix values="0 0 0 0 0.0666666667 0 0 0 0 0.062745098 0 0 0 0 0.243137255 0 0 0 0.08 0" in="shadowBlurOuter1"></feColorMatrix>
										</filter>
										<circle id="hero-illustration-x" cx="24" cy="24" r="24"></circle>
										<filter x="-100%" y="-75%" width="350%" height="350%" filterUnits="objectBoundingBox" id="hero-illustration-w">
											<feOffset dx="12" dy="24" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
											<feGaussianBlur stdDeviation="16" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
											<feColorMatrix values="0 0 0 0 0.0666666667 0 0 0 0 0.062745098 0 0 0 0 0.243137255 0 0 0 0.08 0" in="shadowBlurOuter1"></feColorMatrix>
										</filter>
									</defs>
									<g fill="none" fill-rule="evenodd">
										
										<g transform="translate(435 518)">
											<circle class="anime-element fadeup-animation" fill="url(#hero-illustration-b)" cx="106" cy="32" r="32" style="opacity: 1; transform: translateY(0px);"></circle>
											<circle class="anime-element fadeup-animation" fill="url(#hero-illustration-c)" cx="12" cy="117" r="12" style="opacity: 1; transform: translateY(0px);"></circle>
										</g>
										<g class="anime-element fadeleft-animation" style="opacity: 1; transform: translateX(0px);">
											<g transform="translate(103 75)">
												<path fill-opacity=".24" fill="#11103E" filter="url(#hero-illustration-d)" d="M32 410h736v64H32z"></path>
												<use fill="url(#hero-illustration-f)" xlink:href="#hero-illustration-e"></use>
											</g>
											<g transform="translate(123 87)">
												<circle fill="#D2DAF0" cx="4" cy="4" r="4"></circle>
												<circle fill="#D2DAF0" cx="20" cy="4" r="4"></circle>
												<circle fill="#D2DAF0" cx="36" cy="4" r="4"></circle>
												<path fill-opacity=".56" fill="#FFF" d="M736 2h24v4h-24z"></path>
												<path fill="url(#hero-illustration-g)" d="M27 20h706v2H27z"></path>
											</g>
											<g transform="translate(396 157)">
												<path fill="#FFF" d="M0 0h308v144H0z"></path>
												<path fill="#EEF1FA" d="M28 119h252v1H28zM28 94h252v1H28zM28 69h252v1H28zM28 44h252v1H28z"></path>
												<path stroke="url(#hero-illustration-h)" stroke-width="3" d="M26 119l49.19-38.316 14.615 19.035 16.36-19.035 31.306 4.272 33.079-23.54 34.86 38.303 15.625-50.412 16.356 12.109 16.472-12.11 15.075 21.443 16.976-21.442"></path>
												<rect fill="#D2DAF0" x="28" y="20" width="24" height="4" rx="2"></rect>
											</g>
											<g>
												<path fill="#FFF" d="M396 333h308v144H396z"></path>
												<path fill="#EEF1FA" d="M424 452h252v1H424zM424 427h252v1H424zM424 402h252v1H424zM424 377h252v1H424z"></path>
												<path fill="url(#hero-illustration-o)" d="M28 24h12v96H28z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-p)" d="M52 67h12v53H52z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-o)" d="M76 24h12v96H76z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-p)" d="M100 82h12v38h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-o)" d="M124 45h12v75h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-p)" d="M148 67h12v53h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-o)" d="M172 82h12v38h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-p)" d="M196 45h12v75h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-o)" d="M220 67h12v53h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-p)" d="M244 82h12v38h-12z" transform="translate(396 333)"></path>
												<path fill="url(#hero-illustration-o)" d="M268 45h12v75h-12z" transform="translate(396 333)"></path>
											</g>
										</g>
										<g class="anime-element fadeleft-animation" style="opacity: 1; transform: translateX(0px);">
											<g transform="translate(56 157)">
												<use fill="#000" filter="url(#hero-illustration-i)" xlink:href="#hero-illustration-j"></use>
												<use fill="#FFF" xlink:href="#hero-illustration-j"></use>
												<path fill="#EEF1FA" d="M0 191h308v1H0zM28 44h252v1H28z"></path>
												<rect fill="#D2DAF0" x="28" y="20" width="24" height="4" rx="2"></rect>
												<rect fill="#ABABC9" x="28" y="216" width="64" height="4" rx="2"></rect>
												<rect fill="#D2DAF0" x="256" y="216" width="24" height="4" rx="2"></rect>
												<rect fill="#D2DAF0" x="64" y="20" width="24" height="4" rx="2"></rect>
												<g transform="translate(28 232)">
													<mask id="hero-illustration-l" fill="#fff">
														<use xlink:href="#hero-illustration-k"></use>
													</mask>
													<use fill="#ABABC9" xlink:href="#hero-illustration-k"></use>
													<image mask="url(#hero-illustration-l)" x="-2" width="33" height="33" xlink:href="data:image/png;base64,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"></image>
												</g>
												<path d="M308 89.82v101.063H0v-33.728l3.038-3.799 10.783-7.894 8.687-2.646h9.246l21.198 10.54 9.852 3.251 6.608-3.25 8.644-12.005 6.87-6.388 7.892-1.512 10.906 6.066 13.895 15.802 11.188 5.944h5.692l7.314-3.28 7.19-9.37 5.879-13.65 10.774-21.657 8.34-14.026 9.243-12.336 9.594-7.043 15.407-3.881 6.362 1.497 14.939 7.765 10.531 8.166 13.17 12.338 12.362 7.52 12.756 3.746 8.366-1.542 8.96-5.366 10.183-15.377L308 89.82z" fill="url(#hero-illustration-m)"></path>
												<path d="M308 84.066v8.885c-13.215 32.373-36.292 33.308-68.007 2.699-18.456-17.814-33.74-21.583-47.058-13.978-10.675 6.097-19.593 18.713-29.342 38.963-2.594 5.388-10.386 22.73-11.136 24.336-11.298 24.181-27.067 24.181-45.624.363-12.17-13.657-21.486-13.657-29.221-.248-3.596 6.232-6.872 9.923-10.352 11.627-3.677 1.8-7.4 1.412-12.305-.82-2.416-1.098-12.51-6.8-14.82-7.981a101.498 101.498 0 0 0-4.586-2.208c-11.912-5.359-23.695-.926-35.549 13.65v-4.62c11.94-13.38 24.255-17.4 36.78-11.766 1.571.707 3.13 1.46 4.72 2.273 2.416 1.235 12.425 6.889 14.697 7.922 4.167 1.895 7.013 2.192 9.744.855 2.836-1.388 5.748-4.67 9.072-10.432 8.843-15.326 20.622-15.326 34.123-.172 17.344 22.257 30.338 22.257 40.603.287.734-1.572 8.536-18.936 11.151-24.368 9.998-20.768 19.193-33.776 30.557-40.266 14.618-8.348 31.298-4.234 50.63 14.424 32.601 31.465 54.068 28.367 65.923-9.425z" fill="url(#hero-illustration-n)" fill-rule="nonzero"></path>
											</g>
										</g>
										<g>
											<g class="anime-element fadeleft-animation" style="opacity: 1; transform: translateX(0px);">
												<g transform="translate(164 483)">
													<use fill="#000" filter="url(#hero-illustration-q)" xlink:href="#hero-illustration-r"></use>
													<use fill="#FFF" xlink:href="#hero-illustration-r"></use>
												</g>
												<path d="M200 506c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4h-.8c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z" fill="#1DA1F2" fill-rule="nonzero"></path>
											</g>
											<g class="anime-element fadeleft-animation" style="opacity: 1; transform: translateX(0px);">
												<g transform="translate(251 390)">
													<use fill="#000" filter="url(#hero-illustration-s)" xlink:href="#hero-illustration-t"></use>
													<use fill="#FFF" xlink:href="#hero-illustration-t"></use>
												</g>
												<g fill-rule="nonzero">
													<path d="M290.56 415.485a2.137 2.137 0 1 0-4.066 1.32l5.526 17.004a2.137 2.137 0 0 0 2.6 1.325c1.135-.327 1.826-1.532 1.464-2.646l-5.525-17.003" fill="#DFA22F"></path>
													<path d="M281.996 418.267a2.137 2.137 0 0 0-4.065 1.321l5.526 17.003a2.137 2.137 0 0 0 2.6 1.325c1.134-.326 1.826-1.531 1.464-2.645l-5.525-17.004" fill="#3CB187"></path>
													<path d="M297.515 429.567a2.137 2.137 0 1 0-1.32-4.065l-17.004 5.526a2.137 2.137 0 0 0-1.325 2.6c.327 1.134 1.532 1.825 2.646 1.464l17.003-5.525" fill="#CE1E5B"></path>
													<path fill="#392538" d="M282.735 434.37l4.064-1.321-1.32-4.065-4.065 1.321 1.321 4.064"></path>
													<path d="M291.298 431.587l4.064-1.32-1.32-4.066-4.065 1.321 1.321 4.065" fill="#BB242A"></path>
													<path d="M294.733 421.004a2.137 2.137 0 0 0-1.321-4.066l-17.003 5.527a2.136 2.136 0 0 0-1.325 2.6c.326 1.134 1.531 1.825 2.645 1.463l17.004-5.524" fill="#72C5CD"></path>
													<path d="M279.952 425.806l4.065-1.32c-.5-1.537-.964-2.965-1.32-4.065l-4.066 1.322 1.321 4.063" fill="#248C73"></path>
													<path d="M288.515 423.024l4.065-1.32-1.321-4.066-4.065 1.321 1.321 4.065" fill="#62803A"></path>
												</g>
											</g>
											<g class="anime-element fadeleft-animation" style="opacity: 1; transform: translateX(0px);">
												<g transform="translate(28 221)">
													<use fill="#000" filter="url(#hero-illustration-u)" xlink:href="#hero-illustration-v"></use>
													<use fill="#FFF" xlink:href="#hero-illustration-v"></use>
												</g>
												<text font-family="AppleColorEmoji, Apple Color Emoji" font-size="19" fill="#11103E" transform="translate(28 221)">
													<tspan x="17" y="36">🤗</tspan>
												</text>
											</g>
											<g class="anime-element fadeleft-animation" style="opacity: 1; transform: translateX(0px);">
												<g transform="translate(325 257)">
													<use fill="#000" filter="url(#hero-illustration-w)" xlink:href="#hero-illustration-x"></use>
													<use fill="#FFF" xlink:href="#hero-illustration-x"></use>
												</g>
												<text font-family="AppleColorEmoji, Apple Color Emoji" font-size="16" fill="#11103E" transform="translate(325 257)">
													<tspan x="13" y="31">👋</tspan>
												</text>
											</g>
										</g>
									</g>
								</svg>
                            <!-- <svg width="500" height="300" viewBox="0 0 800 450" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="browser-a">
                                            <stop stop-color="#F6F8FA" stop-opacity=".48" offset="0%"></stop>
                                            <stop stop-color="#F6F8FA" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="50%" y1="100%" x2="50%" y2="0%" id="browser-b">
                                            <stop stop-color="#F6F8FA" stop-opacity=".48" offset="0%"></stop>
                                            <stop stop-color="#F6F8FA" offset="100%"></stop>
                                        </linearGradient>
                                        <linearGradient x1="100%" y1="-12.816%" x2="0%" y2="-12.816%" id="browser-c">
                                            <stop stop-color="#F6F8FA" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#E3E7EB" offset="50.045%"></stop>
                                            <stop stop-color="#F6F8FA" stop-opacity="0" offset="100%"></stop>
                                        </linearGradient>
                                        <filter x="-500%" y="-500%" width="1000%" height="1000%" filterUnits="objectBoundingBox" id="dropshadow-1">
                                            <feOffset dy="16" in="SourceAlpha" result="shadowOffsetOuter"></feOffset>
                                            <feGaussianBlur stdDeviation="24" in="shadowOffsetOuter" result="shadowBlurOuter"></feGaussianBlur>
                                            <feColorMatrix values="0 0 0 0 0.12 0 0 0 0 0.17 0 0 0 0 0.21 0 0 0 0.2 0" in="shadowBlurOuter"></feColorMatrix>
                                        </filter>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <rect width="800" height="450" rx="4" fill="#FFF" style="mix-blend-mode:multiply;filter:url(#dropshadow-1)"></rect>
                                        <rect width="800" height="450" rx="4" fill="#FFF"></rect>
                                        <g fill="url(#browser-a)" transform="translate(47 67)">
                                            <path d="M146 0h122v122H146zM0 0h122v122H0zM292 0h122v122H292zM438 0h122v122H438zM584 0h122v122H584z"></path>
                                        </g>
                                        <g transform="translate(47 239)" fill="url(#browser-b)">
                                            <path d="M146 0h122v122H146zM0 0h122v122H0zM292 0h122v122H292zM438 0h122v122H438zM584 0h122v122H584z"></path>
                                        </g>
                                        <path fill="url(#browser-c)" d="M0 146h706v2H0z" transform="translate(47 67)"></path>
                                        <g transform="translate(0 12)">
                                            <circle fill="#FF6D8B" cx="36" cy="4" r="4"></circle>
                                            <circle fill="#FFCB4F" cx="52" cy="4" r="4"></circle>
                                            <circle fill="#7CE8DD" cx="68" cy="4" r="4"></circle>
                                            <path fill="url(#browser-c)" d="M0 20h800v2H0z"></path>
                                            <path fill="#E3E7EB" d="M742 2h24v4h-24z"></path>
                                        </g>
                                        <g>
                                            <path fill="#F6F8FA" d="M47 385h706v32H47z"></path>
                                            <path fill="#E3E7EB" d="M356 399h88v4h-88z"></path>
                                        </g>
                                    </g>
                                </svg> -->
                <!-- <svg width="728" height="458" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient x1="93.73%" y1="11.55%" x2="20.77%" y2="84.5%" id="a"><stop stop-color="#FFBC48" offset="0%"/><stop stop-color="#FE7E1F" stop-opacity=".785" offset="31.81%"/><stop stop-color="#FE7E1F" stop-opacity="0" offset="100%"/></linearGradient></defs><path d="M177.77 24.36c.043.47-.302.667-.216 1.166-.643-.64-.746-.467-1.422.062-.255-1.31 1.016-.35 1.638-1.227zm.397 1.009c.658.058 1.402-2.051 2.317-.53-1.05.581-1.48.785-1.512 1.857-.35-.237-.609-.701-1.263-.183.128-.482.466-.81.386-1.44.27-.038.198.251.072.296zm-7.411 3.9c1.369 1.327-1.118.671-1.752 1.334.019-.328.41-.417.07-.971.609.074 2 .765 1.682-.363zM104.55 95.896c1.169-2.764 3.996-3.013 5.872-4.806-.334 1.648-4.48 2.914-5.872 4.806zm107.825-87.99c.338-.009.656.007.647.574 1.598-.145 1.857-1.535 3.327-1.765-.203-.75-.488-1.372-1.068-1.54-.348.976-1.01 2.462-2.032 1.279.06.608-.004 1.11-.333 1.374-.057-.324-.542-.34-.541.078zm3.835-.9c1.222-.011.492-2.465-.165-1.379-.081-.419-.18-.809-.652-.618.05 1.023.773.975.817 1.997zm-13.117 3.443c-.642-.33-2.355.07-2.115 1.14.44-.582 2.25-.105 2.115-1.14zm-3.571 2.162c-.306 1.111-1.92 1.202-2.717 1.953-.821-1.025 1.562-1.665 2.717-1.953zm3.957 1.393c.314-1.669 1.914-2.212 3.373-2.709 1.466-.464 2.789-.92 2.549-2.551-1.173.808-.974.68-2.251.353.561 2.094-.94.577-1.094 1.938-.365.067-.363-.55-.677-.575-.807.69-.536 1.46-2.086 1.106.003 1.713-1.84.693-2.762 1.947l.14.68c.172-.016.336-.014.345.286.697-.45.735-1.454 1.646-1.731.138.674.836.286.817 1.256zm-11.938 4.733c.317.973.99 1.158 1.452 1.794l1.338-.196c-.264-1 .624-1.134 1.193-1.513.325.735.949 1.242.617 1.915.248-1.09.775-2.35-.115-2.991.746.583.51-.433.879-.798-.426-.242-3.258.454-1.151.837-2.057-.338-2.45 1.122-4.213.952zm-151.55 99.515c1.217-.565 1.073-.422 2.056-.726.117.488-1.717 1.91-2.055.726zM156.27 60.257c-.32.408-.811.695-1.78 1.138-.104-.909 2.738-2.02 3.097-1.749l-1.317.61zM140.174 74.29c-2.536.918-3.91 2.437-6.348 3.42 1.172-1.372 4.334-4.009 6.348-3.42zm-13.18 7.694c.516-.248 2.5-.827 2.74-2.327-.886.927-5.357 3.555-2.74 2.327zM11.13 136.057c-2.447.295-7.182 3.644-10.636 3.447 3.734-1.54 5.803-2.468 9.583-4.44-.35-.665-1.069.352-1.57.377 11.511-6.164 19.076-9.752 28.56-14.932.626-.598-.1-1.221.045-1.565l4.778-2.625c.58 1.654 1.494 1.134 2.28 1.452.736-.13-.933-1.31-.196-1.438-.392-.631-.925-.323-1.466.032 5.814-4.096 14.874-9.157 23.327-14.395-.183-.672 1.428-.582.606-1.526 4.471.17 6.283-3.71 10.108-5.069-1.024-.674.903-.329 1.046-1.782.561-.34.398.065.56.462 12.477-7.788 25.683-15.74 33.76-22.168 2.092-.443 4.096-1.433 6.116-3.643 4.016-2.1 8.71-3.95 11.295-8.047.338.477.103.661-.157.832 2.04-.526 5.135-2.214 7.159-3.851.493-.286-.662-.633-.722-1.532.394-.407 1.691-.333 1.471-1.066 1.526.533-1.302.67-.348 1.663 1.862.003 3.09-1.57 4.178-3.087 7.49-2.091 14.77-8.342 20.117-10.717.097-1.018-1.285-.197-.605-.856.451-.043.356-.423.237-.82.97-.117.261.992 1.079 1.394 4.18-2.759 6.336-3.386 8.961-6.161-.15 1.391.43-.122.95.396.653-1.205.8-2.764 2.434-3.317.406 1.057-1.344 1.172-1.674 2.347 1.688-.61 3.293-1.13 4.813-2.02 1.537-.849 2.99-2.062 4.396-4.122-.656-1.302-1.383.924-1.79-.516 1.395-1.72 2.588-2.698 4.489-2.41.036.372-.443.356-.322.79-.087-.589 2.671-1.264 2.164-3.043 1.49.614 2.36-.245 2.13-2.33.804.24 1.852-.084 2.39.759.215-.372-.263-.777.52-1.194-1.376-1.225-1.993-.505-4.027.384-.317.756.31.552.433 1.637-1.18.043-.526-1.13-1.722-1.288-1.913.894-1.67 1.932-3.738 2.448-.138-2.502 2.44-2.388 3.82-3.174.241-.7 1.445-2.057 1.377-2.126.202-.795.64.195.518.913 2.327-1.09 1.99-2.637 2.031-4.055.852.168 1.124.79 1.018 1.85 1.93-1.394 5.534-1.257 5.253-5.064.321.153.444.698.946.474.096-1.76 2.225-.13 2.276-2.56 1.334 1.203 2.86-.78 3.953-1.472l.312 1.665c1.557-.656 2.675-1.71 4.07-2.472-1.144-1.408-2.437 1.312-3.984 1.42 1.81-1.77 3.67-3.056 5.626-4.238a146.837 146.837 0 0 1 6.26-3.534c-2.627 2.385-4.985 3.355-7.795 5.304.796.755 1.267-.957 1.991.027 1.354-1.781 5.048-3.918 6.35-3.344.683-1.975 3.256-2.41 5.581-4.079 1.07.556-.76.871-.715 1.452.205 1.11 1.245-1.174 1.205.54-1.316.243-1.21.6-1.776-.473.15 1.502-.756.341-.666 1.783-.586.23-.594-.417-.68-.943-.09.955-.072 2.082-1.258 1.517.313 1.944 2.718.351 2.788-.672 1.472.234 3.194-.042 4.475-1.143.63 0 .685.803.715 1.645.096-.968 2.4.767 1.856 1.897 1.894 1.111 2.226.47 3.754 1.414-.794.97.265.402-.453 1.735.289.944 1.166 1.053 1.75 1.567.282 1.474-.807 1.454-.957 2.453 1.17-.056-.295 1.566 1.412.915-.367.866-1.167 1.418.09 1.693.264 1.257-.98.816-.973 1.776.106 1.19.84 1.455.941 2.646.152.808-.436.772-.166 1.714a46.055 46.055 0 0 1-7.196 6.15c-2.569 1.913-5.287 3.52-8.06 4.92-8.643 4.406-17.431 9.548-26.24 14.22-2.672 1.363-5.533 2.934-8.441 4.319-2.89 1.517-5.82 2.906-8.579 4.295-9.476 4.708-16.602 8.833-24.115 13.26-7.508 4.44-15.39 9.155-26.173 15.75-8.657 5.289-18.61 12.741-28.053 17.524-4.324 2.181.384-.933 1.202-1.469 8.928-5.855 16.615-10.188 25.283-16.377-1.292.17-3.388 1.354-4.591 2.472 6.626-6.098 16.316-10.818 24.034-15.35.112 1.027-.692.632-1.48 1.452 3.467-.568 5.146-3.193 8.946-4.548-1.607-.944-2.327 1.261-4.58 1.742-.365.14-.779.544-1.032.109l.887-.416c6.731-5.078 14.606-8.554 20.78-12.99-4.99 2.131-10.984 4.224-15.913 8.891.015-.336.026-.673-.274-.62-4.921 2.752-9.63 5.322-13.897 8.07 5.394-4.437 11.667-7.613 17.936-11.723-3.602.757-6.569 3.633-10.87 5.308-.547.08-.223.638-.02 1.13-3.325.506-6.075 2.426-8.834 3.896-20.944 11.34-38.171 23.572-62.14 37.967-.992.6-2.029 1.017-3.353 1.935-1.03.72-2.597.697-3.697 1.346-2.794 1.66-4.98 5.026-8.279 4.336-.71.633-2.776 1.466-1.976.73 3.118-2.91 6.834-4.088 9.526-5.82 11.3-7.256 22.617-13.326 32.337-19.826-9.39 3.803-17.538 11.073-25.738 15.245-3.808 1.93-8.214 4.851-11.823 6.398-16.408 7.09-31.122 19.111-49.245 24.116.565-1.252 1.374-1.488 1.71-1.953zM192.203 16.701c-.396.23-.705-1.597.033-1.31-.003.265-.185.382-.132.691 1.157.241.118-1.326 1.024-1.297-.389 1.427.606-.237 1.46-.14-.77 1.093-1.68 1.503-2.385 2.056zM176.68 27.933c-.594-.406-.965.55-2.021.552.346-1.43 1.472-1.363 1.595-2.527.9.253.486 1.59.426 1.975zm-3.943 1.635c-.19.116-.285-.057-.372-.243-.214.587.278 2.246-.756 1.594-.295-.809.936-.625.135-1.768.46-.246.805-.154.993.417zm.683-.476c.684.278-.427 2.235-1.03 1.703-.346-1.022.854-1.021 1.03-1.703zm-3.63 2.602l-.342-.996c.483-.078 1.178-.766 1.257.32-.475.11-.403.588-.914.676zm-5.955 2.317c-.297.005-.426-.563-.75-.469.024-.743 1.39-.654 1.326-1.457.949.507-.065 1.71-.837 1.305l.261.62zm1.542-.212c.568.097 2.603-.736 2.316-2.053.684.637.781.455 1.467-.129.515.89-.299.89-.07 1.59-1.73-.578-2.583 2.64-3.713.592zm-15.73 8.116c-.79.676-.816-1.317-1.234-1.939.712-.303 1.366 1.395 1.234 1.939zm-8.422 5.748c.129-.651.647-1.094 1.418-1.398.186.86-.979 1.611-1.418 1.398zm17.863-7.227c.008-.303.01-.61-.221-1.058 1.159 1.292 2.538-3.003 3.325.137-1.662-1.356-1.73 1.885-3.104.92zm-20.344 9.095c.152-.814 1.345-1.32 1.909-2.383-.123.537-.385.996-.103 1.752-1.048.012-.955 1.085-1.806.63zm17.79-6.92c-.27-.093-.538-.182-.875-.034-.536-.815.23-.847-.026-1.498.553.128 1.098.892.9 1.532zm1.273-1.625c.317.69-.822.492-1.111.812-.141-.664.207-1.03-.15-1.826.884-.092.896.9 1.26 1.014zM123.8 58.561c-.278-1.25 1.813-1.314 2.29-2.18.248 1.778-1.267 1.027-2.29 2.18zm1.978 4.454c.02-.33-.15-.753-.465-1.247l1.328-.56c.648 1.492-.662.743-.863 1.807zm-99.775 61.991c1.56-2.227 5.837-3.105 9.992-6.012-1.692 1.83-6.89 4.085-9.992 6.012zM126.276 78.48c.578 1.359-1.843 1.24-2.524 1.978-1.375-.131 2.458-1.15 2.524-1.978zm-11.672 9.976c-.059-1.109 2.583-.943 2.528-2.053 1.097.667-2.211 2.036-2.528 2.053zm-.63 1.341c-1.333-1.817-3.368 2.288-.393-.18.113.178.232.343.393.18zM97.826 99.71c1.512-1.15 4.097-4.16 6.348-3.42-2.171 1.03-4.856 2.794-6.348 3.42zm-31.673 18.403c1.681-1.28 4.42-2.905 6.201-3.794-.098.955-2.101 1.98-3.795 2.91-1.27.704-4.163 2.275-2.406.884z" transform="translate(364 318)" fill="url(#a)" fill-rule="evenodd"/></svg> -->
			</div>
            
        </div>
        <div class="hero-side-bg">
  
        </div> 
    </section>
    <div id="divider_content">
		<div id="divider_transparentBg"></div>
        <div id="divider" uk-parallax="y:80%;easing:0.7;opacity:.8">
            <div id="divider_background">
            </div>
        </div>
    </div>
    <section id="part2">
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

		$("#fixed-register-container form button.hero-button").on('click', function(e){
			$('#account-exist').css('display', 'none');
			$('#password-unmatch').css('display', 'none');
			$('#password-length').css('display', 'none');
			$('.fa-2x').css('display', 'none');

			let form = $("#fixed-register-container form")[0];
			let fd = new FormData(form);
			if(fd.get('email') != "" && fd.get('username') != "" && fd.get('password') != "" && fd.get('picture').length !== 0 && fd.get('verify-password') != ""){
				e.preventDefault();
	
				console.log("changing....");
				console.log(fd.get("email"));
				$('.fa-2x').css('display', 'flex');
				
				$.ajax({
					url: 'process/register.php',
					method: 'POST',
					data: fd,
					processData: false,
					contentType: false,
					success: function(response){
						$('.fa-2x').css('display', 'none');
						let json = $.parseJSON(response);
						
						if(json.success == 'true'){
							console.log(json.success);
							console.log(json.username);
							location.reload();
						}else if(json.success == 'false' && json.passwordIsUnmatch == 'true'){
							console.log(json.success);
							console.log("passwordIsUnmatch:")
							console.log(json.passwordIsUnmatch);
							$('#password-unmatch').css('display', 'unset');
						}else if(json.success == 'false' && json.accountIsExist == 'true'){
							console.log(json.success);
							console.log("accountIsExist:")
							console.log(json.accountIsExist);
							$('#account-exist').css('display', 'unset');
						}else if(json.success == 'false' && json.passwordLength == 'true'){
							console.log(json.success);
							console.log("passwordLength:")
							console.log(json.passwordLength);
							$('#password-length').css('display', 'unset');
						}else if(json.success == 'false'){
							console.log("success:")
							console.log(json.success);
						}
				    }
				});
			}else{
				return;
			}
			
		});

		$("#fixed-login-container form button.hero-button").on('click', function(e){
			$('#username-not-exist').css('display', 'none');
			$('#incorrect-password').css('display', 'none');

			$('.fa-2x').css('display', 'none');

			let form = $("#fixed-login-container form")[0];
			let fd = new FormData(form);

			if(fd.get('username') != "" && fd.get('password') != ""){
				e.preventDefault();
	
				console.log("changing....");
				console.log(fd.get("username"));
				console.log(fd.get("password"));
				$('.fa-2x').css('display', 'flex');
				
				$.ajax({
					url: 'process/login.php',
					method: 'POST',
					data: fd,
					processData: false,
					contentType: false,
					success: function(response){
						$('.fa-2x').css('display', 'none');
						let json = $.parseJSON(response);
						console.log(json);

						if(json.success == 'false' && json.user == 'false' && json.authenticated == 'false'){
							console.log("success");
							console.log(json.success);
							console.log("user");
							console.log(json.user);
							console.log("authenticated");
							console.log(json.authenticated);
							$('#username-not-exist').css('display', 'unset');
						}else if(json.success == 'false' && json.user == 'true' && json.authenticated == 'false'){
							console.log("success");
							console.log(json.success);
							console.log("user");
							console.log(json.user);
							console.log("authenticated");
							console.log(json.authenticated);
							$('#incorrect-password').css('display', 'unset');
						}else if(json.success == 'true' && json.user == 'true' && json.authenticated == 'true'){
							console.log("success");
							console.log(json.success);
							console.log("user");
							console.log(json.user);
							console.log("authenticated");
							console.log(json.authenticated);
							location.reload();
						}
				    }
				});
			}else{
				return;
			}
			
		});
		
		$("#hero-button-login").click(function(){
  			$("body").addClass("overlay-active");
			$("#fixed-login-container").toggleClass("isActivated");
			$("#fixed-register-container").removeClass("isActivated");
			$("#fixed-full-content-wrapper").css('height', 'auto');
			$("#fixed-full-content-wrapper").css('width', 'auto');
			$("#fixed-full-content-wrapper h3").attr('style', '');
			$('.fa-2x').css('display', 'none');
		});

		$("#hero-button-register").click(function(){
  			$("body").addClass("overlay-active");
			$("#fixed-register-container").addClass("isActivated");
			$("#fixed-login-container").removeClass("isActivated");
			$("#fixed-full-content-wrapper h3").attr('style', '');
			$('.fa-2x').css('display', 'none');
		});

		$(".fixed-modal-close").click(function(){
  			$("body").removeClass("overlay-active");
			$("#fixed-register-container").removeClass("isActivated");
			$("#fixed-login-container").removeClass("isActivated");
			$('#username-exist').css('display', 'none');
			$('#password-unmatch').css('display', 'none');
			$('.fa-2x').css('display', 'none');
			$("#fixed-full-content-wrapper").attr('style', '');
			$("#fixed-full-content-wrapper h3").attr('style', '');
		});

		$("#user-avatar-rounded").click(function(){
			$("#logged-user-options-container").toggleClass("isActivated");
		});
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/js/uikit.min.js'></script>
</body>
</html>