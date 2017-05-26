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
	  $getdata = $cs->getCustomerData($id);
	  if($getdata){
	    while($result = $getdata->fetch_assoc()){
 
 ?>
	<table class="table">
	  <tr>
		  <td colspan="5">
		  <h2>Your Profile </h2>
		  
		  <span style=" background:#CCCCCC; padding:4px 6px; border-radius:5px 2px; ">
		  <a style="text-decoration:none;" href="editprofile.php">Edit profile</a>
		  </span>
		  
		  <span style=" background:#CCCCCC; padding:4px 6px; border-radius:5px 2px; margin-left:10px; ">
		  <a style="text-decoration:none;" href="changeuserpass.php">Change Password</a>
		  </span>
		  
		      <?php if(isset($_GET['update']) && $_GET['update'] == 'success'){ ?>
				<div class="alert alert-block alert-error fade in" style="margin-top:8px;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo "Your Profile Updated Successfully !!"; ?>					 
				 </div>	
			  <?php } ?>
			  
			  <?php if(isset($_GET['passChange']) && $_GET['passChange'] == 'success'){ ?>
				<div class="alert alert-block alert-error fade in" style="margin-top:8px;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo "Password Updated Successfully !!"; ?>					 
				 </div>	
			  <?php } ?>
		  </td>
	  </tr>
	  
	  <tr>
		  <td>Name Title : </td>
		  <td><?php echo $result['title']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>First Name : </td>
		  <td><?php echo $result['fname']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Last Name : </td>
		  <td><?php echo $result['lname']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Email : </td>
		  <td><?php echo $result['email']; ?></td>
	  </tr>

	  <tr>
		  <td>Date Of Birth : </td>
		  <td><?php echo $result['dob']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Address 1 : </td>
		  <td><?php echo $result['address1']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Address 2 : </td>
		  <td><?php echo $result['address2']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>City : </td>
		  <td><?php echo $result['city']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>State : </td>
		  <td><?php echo $result['state']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Pin/Postal code : </td>
		  <td><?php echo $result['pin']; ?></td>
	  </tr>
	 
	  <tr>
		  <td>Country : </td>
		  <td><?php echo $result['country']; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Phone : </td>
		  <td><?php echo $result['phone']; ?></td>
	  </tr>
</table>	
<?php }} ?>  	 
</div>
<?php
include('inc/footer.php');
?>