<?php
include('inc/header.php');
include('inc/sidebar.php');
?>
<?php
    $login = Session::get('custlogin');
	   if($login == false){
	     echo "<script>window.location = 'login.php';</script>";
	   }
?>
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> ORDERED PRODUCT</li>
    </ul>
	<h3> Ordered Product <a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
		
			
	<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="1%">SL</th>
                  <th width="20%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="10%">Quantity</th>
				  <th width="14%">Total Price</th>
                  <th width="5%">Status</th>
				  <th width="20%">Date</th>
				  <th width="10%">Action</th>
				  
				</tr>
              </thead>
              <tbody>
			  <?php 
			            $id = Session::get('custId');
			            $getOpro = $ct->getOrderedProduct($id);
		                 if($getOpro){
						   $i = 0;
						   $sum = 0;
				           while($result = $getOpro->fetch_assoc()){
						   $i++;
			  ?>
                <tr>
	              <td><?php echo $i; ?></td>
	              <td> <img width="50%" src="<?php echo $result['image'];?>" alt=""/></td>
	              <td><?php echo $result['productName'];?></td>
	              <td><?php echo $result['quantity'];?></td>
	              <td>$<?php echo $result['price'];?></td>
				  <td><?php echo $result['status'];?></td>
				  <td><?php echo $fm->fullFormatDate($result['date']);?></td>
				  <td><a onclick="return confirm('Are you sure want to Cancel this product ?');" href="?delcartid=<?php echo $result['id'];?>">
				  <button class="btn btn-danger" type="button">cancel</button>
				  </a></td>
                </tr>
				<?php $sum = $sum + $result['price']; }?>
				
				<tr>
				  <td colspan="7" style="text-align:right;">Total Price : </td>
				  <td> $<?php echo $sum; ?> </td>
				</tr>	
				
				<tr>
				  <td colspan="7" style="text-align:right;">Total Tax : </td>
				  <td> $<?php echo ($sum * 0.1); ?> </td>
				</tr>
				
				<tr>
				  <td colspan="7" style="text-align:right;"><b>Grand Total :</b></td>
				  <td> $<?php echo $sum + ($sum * 0.1); ?> </td>
				</tr>
				<?php } else {?>
				<tr>
				  <td colspan="8" style="text-align:center;"><h2>You didn't buy anything.</h2><br>
				  <h5>Why aren't you buy something !!</h5></td>
				</tr>
				<?php } ?>
				</tbody>
            </table>
	<?php	
	                  $id = Session::get('custId');
			            $getOpro = $ct->getDelivarProduct($id);
		                 if($getOpro){
	?>	
	    <h3> Delivered Product</h3>
		<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="1%">SL</th>
                  <th width="15%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="10%">Quantity</th>
				  <th width="14%">Total Price</th>
                  <th width="5%">Status</th>
				  <th width="20%">Order Date</th>
				  <th width="15%">Delivar Date</th>
				  
				</tr>
              </thead>
              <tbody>
			  <?php 
			            
						   $i = 0;
						   $sum = 0;
				           while($result = $getOpro->fetch_assoc()){
						   $i++;
			  ?>
                <tr>
	              <td><?php echo $i; ?></td>
	              <td> <img width="50%" src="<?php echo $result['image'];?>" alt=""/></td>
	              <td><?php echo $result['productName'];?></td>
	              <td><?php echo $result['quantity'];?></td>
	              <td>$<?php echo $result['price'];?></td>
				  <td><?php echo $result['status'];?></td>
				  <td><?php echo $fm->fullFormatDate($result['date']);?></td>
				  <td><?php echo $result['deldate'];?></td>
                </tr>
				<?php }?>
				</tbody>
		</table>
	<?php } ?>		
</div>
</div></div>
</div>			
<?php
include('inc/footer.php');
?>