<?php include '../classes/Adminlogin.php'; ?>
<?php 
   $al = new Adminlogin(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $adminUser = $_POST['adminUser'];
		 $adminPass = md5($_POST['adminPass']);
			  
	     $loginChk = $al->adminLogin($adminUser, $adminPass);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin Login</title>

	<!-- Google Fonts -->
	<link href='#' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate1.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style1.css">

	<script src="js/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">E-<span>mall</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
		    <form action="login.php" method="post">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" name="adminUser">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" name="adminPass">
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			<a href="#"><p class="small">Forgot your password?</p></a>
			</form>
			<span style="color:#FF0000; font-size:15px;"><?php if(isset($loginChk)){ echo $loginChk; } ?></span>
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>