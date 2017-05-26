<?php include 'inc/header.php'?>
<?php include '../classes/Customer.php'; ?>
<?php
   if(!isset($_GET['custid']) || $_GET['custid'] == NULL){
      echo "<script>window.location = 'order.php';</script>";
   } else {
      
      $custid = $_GET['custid'];
   }
?>
<?php   
   $cs = new Customer(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  echo "<script>window.location = 'order.php';</script>";
    }
?>
<style>
.tbl{width:80%; height:auto; margin:50px auto; background:#FFFFFF; border:1px solid #ddd; border-radius:6px; box-shadow:8px 8px 8px #ccc; padding:20px;}
.tbl table tr td{padding:10px 12px; text-align:left; font-size:18px;}
</style>
  <section class="menuhead">
	
	    <h3 class="dash">Customer Detail</h3>
	     <form action="" method="post" class="tbl">
		   <table >
		     
			   <?php 
			       $getCustById = $cs->getCustomerData($custid);
				   if($getCustById){
				      while($result = $getCustById->fetch_assoc()){
			   ?>
			   <tr>			   
			 
			   <td>Full Name &nbsp; :</td>
			   <td><?php echo $result['title']; ?> <?php echo $result['fname']; ?> <?php echo $result['lname']; ?></td>
			 				 
			  </tr>
			  
			  <tr>			   
			   <td>Email &nbsp; :</td>
			   <td><?php echo $result['email']; ?> </td>				 
			  </tr>
			  
			  <tr>			   
			   <td>phone &nbsp; :</td>
			  <td> <?php echo $result['phone']; ?></td>				 
			  </tr>
			  
			  <tr>			   
			   <td>Full address &nbsp; :</td>
			   <td><?php echo $result['address1']; ?>, <?php echo $result['address2']; ?> </td>				 
			  </tr>
			  
			  <tr>			   
			   <td>City &nbsp; :</td>
			   <td><?php echo $result['city']; ?></td>				 
			  </tr>
			  
			  <tr>			   
			   <td>Pin Code &nbsp; :</td>
			   <td><?php echo $result['pin']; ?></td>				 
			  </tr>
			  
			  <tr>			   
			   <td>State &nbsp; :</td>
			   <td><?php echo $result['state']; ?></td>				 
			  </tr>
			  
			  
			  <?php }} ?>
			    <td></td>
			    <td><input type="submit" name="submit" style="background:#0066FF; color:#FFFFFF; border:none; padding:8px 16px" value="OK"/></td> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>