<?php 
session_start();
if(isset($_SESSION{'username_admin'})){
	header("location:question_admin.php");
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> Login Admin | Mind Space</title>
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
</head>
<body>
<div class="wrap">
	<div id="content">
		<div id="main">
			<div class="full_w">
				<form action="process/login.php" method="post">
					<label for="login">Username:</label>
					<input id="login" name="usrname" class="text" value="<?php if(isset($_SESSION['username_admin'])){echo $_SESSION['username_admin']; }?>"/>
					<label for="pass">Password:</label>
					<input id="pass" name="pass" type="password" class="text" />
					<div class="sep">
						<?php if(isset($_GET['error'])){?>
						<?php $get = $_GET['error']; ?>
						<?php if($get == 1)	{
							echo "<p style='color:red; font-size:14px; text-align:center;'>Maaf Username / Password Yang Anda Masukan Salah</p>";
						}
						
						else if($get == 2) {
							echo "<p style='color:red; font-size:14px; text-align:center;'>Not Logged In!</p>";
						}}
						?>
                    </div>
					<button type="submit" class="ok">Login</button>
				</form>
			</div>
			<div class="footer">&raquo; <a href="">http://yourpage.com</a> | Admin Panel</div>
		</div>
	</div>
</div>

</body>
</html>
