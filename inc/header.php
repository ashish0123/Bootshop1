<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Session.php'); 
 Session::init();
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php');

 
 spl_autoload_register(function($class){
     include_once 'classes/'.$class.'.php';
 });
 $db  = new Database();
 $fm  = new Format();
 $pd  = new Product();
 $cat = new Category();
 $ct  = new Cart();
 $cs  = new Customer();
?>
<?php
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: Sat,26 Jul 1997 05:00:00 GMT');
header('Cache-Control: max-age=2592000');
?>

<?php  
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){ 
	     $customerLog = $cs->customerLogin($_POST);
    }
?>
<!-- Header ================================================================== -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> User</strong></div>
	<div class="span6">
	<div class="pull-right">
	<?php
	  $login = Session::get('custlogin');
	     if($login == true){
	?>
		<a href="profile.php"><span class="btn btn-mini" style="font-size:18px; width:6%; color:#FFFFFF; background:#0099FF;"><i class="icon-user"></i></span></a>
		
		<span class="btn btn-mini"><a href="order.php">Order</a></span>
		<?php } ?>
		<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.php" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>CLOTHES </option>
			<option>FOOD AND BEVERAGES </option>
			<option>HEALTH & BEAUTY </option>
			<option>SPORTS & LEISURE </option>
			<option>BOOKS & ENTERTAINMENTS </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.php">Specials Offer</a></li>
	 <li class=""><a href="normal.php">Delivery</a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	 <?php
	   if(isset($_GET['cid'])){
	     Session::destroy();
	    }
	 ?>
	 <?php
	 $login = Session::get('custlogin');
	   if($login == false){ ?>
	   
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	 
	<?php } else{ ?> 
	
	<a href="?cid=<?php Session::get('custId'); ?>" role="button" style="padding-right:0"><span class="btn btn-large btn-success">LogOut</span></a>
	
	<?php } ?>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action="" method="post">
			  <div class="control-group">								
				<input type="text" name="email" id="inputEmail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" name="password" id="inputPassword" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
				
			<button type="submit" name="login" class="btn btn-success">Sign in</button> OR
			<a href="register.php"><button class="btn" style="background:#0066FF; color:#FFFFFF" aria-hidden="true">
			Register Now!</button></a>
			</form>	
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->