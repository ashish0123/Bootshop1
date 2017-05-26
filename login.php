<?php
include('inc/header.php');
include('inc/sidebar.php');
?>
<?php
    $login = Session::get('custlogin');
	   if($login == true){
	     echo "<script>window.location = 'order.php';</script>";
	   }
?>
<?php  
   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){ 
	     $customerLog = $cs->customerLogin($_POST);
    }
?>
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th>
		<?php if(isset($_GET['msg']) and $_GET['msg'] == 'success'){ ?>
		  <h5 style="color:#00CC66;"> You registered successfully, Now Log In here.</h5>
		<?php } ?>
		
		<?php if(isset($customerLog)){ ?>
	      <div class="alert alert-block alert-error fade in">
		     <button type="button" class="close" data-dismiss="alert">&times;</button>
		   <?php echo $customerLog; ?>
	      </div>	
         <?php } ?>
		
		</tr>
		
		 <tr> 
		 <td>
			<form class="form-horizontal" action="" method="post">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" name="email" id="inputUsername" placeholder="Email">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" name="password" id="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" name="login" class="btn">Sign in</button> OR 
					<a href="register.php" style="background:#0066FF; color:#FFFFFF;" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.php" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>
	
</div>
</div></div>
</div>

<?php
include('inc/footer.php');
?>