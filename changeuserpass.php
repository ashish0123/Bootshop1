<?php
include('inc/header.php');
?>
<?php
    $login = Session::get('custlogin');
	   if($login == false){
	     echo "<script>window.location = 'login.php';</script>";
	   }
?>
<style>
table tr:nth(2n+1){ background:#9999FF;}
</style>
<div style="width:60%; margin:0 auto;">		
 <?php
         $id = Session::get('custId'); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changepass'])){
	    $oldpass = $_POST['password'];
		$newpass = $_POST['newpassword'];
		$repass  = $_POST['new1password'];
	    $changePass = $cs->changeCustPass($oldpass, $newpass, $repass, $id);
    }
 
 ?>
 <form action="" method="post">
	<table class="table">
	  <tr>
		  <td colspan="5">
		  <h2>Change Password </h2>
		  
		  <?php if(isset($changePass)){ ?>
		 <div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $changePass; ?>
		 </div>	
          <?php } ?>
		  </td>
	  </tr>
	  
	  <tr>
		  <td>Old Password : </td>
		  <td><input type="password" name="password" placeholder=" old password"></td>
	  </tr>
	  
	  <tr>
		  <td>New Password : </td>
		  <td><input type="password" name="newpassword" placeholder=" new password"></td>
	  </tr>
	  
	  <tr>
		  <td>Re-Type Password : </td>
		  <td><input type="password" name="new1password" placeholder=" re-type password"></td>
	  </tr>
	  
	  <tr>
	      <td></td>
	      <td><button name="changepass" style="background:#CCCCCC; border-radius:5px; border:none; padding:7px 5px;">Change Password</button></td>
	  </tr>	
</table>
</form>		 
</div>
<?php
include('inc/footer.php');
?>