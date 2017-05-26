<?php
 include '../lib/Session.php';
 Session::checkSession();
?>
<?php
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: Sat,26 Jul 1997 05:00:00 GMT');
header('Cache-Control: max-age=2592000');
?>

<!DOCTYPE html>
<html>
<head>

<title>E-mall</title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/sidebar-menu.css">
</head>
<body>
<div class="container-fluid">
   <div class="row header">
   
     <div class="sm-col-6" style="float:left;">
      <span><img src="images/logo.png" class="img-responsive" width="90%" alt="logo"/></span>
	  <h3>E-Mall</h3>
     </div>
	 
	 <div class="sm-col-6" style="float:right;">
	 <?php 
	    if(isset($_GET['action']) && isset($_GET['action']) == "logout"){
		   Session::destroy();
		}
	 ?>
	  <p> <i class="fa fa-user" aria-hidden="true">&nbsp;&nbsp; Hello <?php echo Session::get('adminName'); ?> &rsaquo;&rsaquo; <a href="?action=logout" style="text-decoration:none"><i class="fa fa-power-off" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Logout</i></a></i></p>  
	 </div>
	 
   </div>
</div>

<div class="container-fluid" style="border-radius:0">
  <nav class="nav">
    <ul>
        <li><a href="index.php"><i class="fa fa-dashboard" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Dashboard</i></a></li>
		<li><a href="#"><i class="fa fa-edit" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;User Profile</i></a></li>
	    <li><a href="pass.php"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:20px;">&nbsp;&nbsp;Change Password</i></a></li>
	    <li><a href="order.php"><i class="fa fa-inbox" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Order</i></a></li>
	    <li><a href="#"><i class="fa fa-desktop" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Visit Website</i></a></li>
	</ul>
  </nav>	
</div>
<?php include 'inc/sidemenu.php'?>