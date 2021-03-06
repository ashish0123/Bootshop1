<?php
include('inc/header.php');
include('inc/sidebar.php');
?>

<?php
if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
    $id  = Session::get('custId');
	$insertOdata = $ct->insertOrderData($id);
	
	$delcart     = $ct->delCartProBySid();
	if(isset($delcart)){
	    echo "<script>window.location = 'order.php';</script>";
	}
}

?>
<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $cartId = $_POST['cartId'];
		 $quantity = $_POST['quantity'];			  
	     $updateQuantity = $ct->updateQuantityById($cartId, $quantity);
		 
		 if($quantity < 0){
		   $delCartPro = $ct->delCartProById($cartId);
		 }
    }
?>


<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ 
	          <?php
				$getCart = $ct->getCartProduct();
				 if($getCart){
				   $sum =0;
				   while($result = $getCart->fetch_assoc()){
				   $sum=$sum+$result['quantity'];
				   }
			  ?>
	<small><?php  echo $sum; ?> Item(s) </small>
	           <?php }else{ ?><small><?php echo "No Item"; }?>  </small>
	]<a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
		
			
	<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="10%">SL</th>
                  <th width="20%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="20%">Quantity/Update</th>
				  <th width="10%">Price</th>
                  <th width="10%">Total</th>
				  
				</tr>
              </thead>
              <tbody>
			  <?php
			            $getCart = $ct->getCartProduct();
		                 if($getCart){
						   $i = 0;
						   $sum = 0;
				           while($result = $getCart->fetch_assoc()){
						   $i++;
			  ?>
                <tr>
	              <td><?php echo $i; ?></td>
	              <td> <img width="50%" src="<?php echo $result['image'];?>" alt=""/></td>
	              <td><?php echo $result['productName'];?></td>
	              <td>
		               <div class="input-append">
					   <form action="" method="post">
					   <input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>" />
					   <input class="span1" style="max-width:34px" min="1" name="quantity" value="<?php echo $result['quantity'];?>"  size="16" type="number">
					   <button class="btn btn-danger" type="submit"><i class="icon-plus icon-white"></i></button>
					   </form>
					   </div>
	              </td>
	              <td>$<?php echo $result['price'];?></td>
	              <td>$<?php
		              $total = $result['price'] * $result['quantity'];
		              echo $total;
                       ?></td>
	              
                </tr>
				<?php 
				   $sum = $sum + $total;
				?>
			<?php }} ?>	
				
                <tr>
                  <td colspan="5" style="text-align:right">Total Price:	</td>
                  <td>
				   $<?php
				    if(isset($sum)){
				    echo $sum;
					}else{
					echo "0";
					} ?>
				   </td>
                </tr>
                 <tr>
                  <td colspan="5" style="text-align:right">Total Tax:	</td>
                  <td> 
				  <?php
				    $tax = $sum * 0.1;
				    if(isset($sum)){
				    echo "10% ($".$tax.")";
					}else{
					echo "0%";
					} ?>
				  </td>
                </tr>
				 <tr>
                  <td colspan="5" style="text-align:right">
				    <?php
					   $Gtotal = $sum + $tax;
					?>
				  <strong>TOTAL ($<?php if(isset($sum)){ echo $sum; }else{ echo "0"; } ?> + $<?php echo $tax; ?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> $<?php echo $Gtotal; ?> </strong></td>
                </tr>
				</tbody>
            </table>
		
		  <?php
			  $id = Session::get('custId');
			  $getdata = $cs->getCustomerData($id);
			  if($getdata){
				while($result = $getdata->fetch_assoc()){
 
          ?>
            <table class="table table-bordered">
			<tbody>
				 
				   <tr>
						  <td> Name : </td>
						  <td><?php echo $result['title']; ?> <?php echo $result['fname']; ?> <?php echo $result['lname']; ?></td>
	               </tr>
				   
				   <tr>
						  <td>Address : </td>
						  <td><?php echo $result['address1']; ?>, <?php echo $result['address2']; ?> <?php echo $result['city']; ?> Pin- <?php echo $result['pin']; ?>, <?php echo $result['state']; ?></td>
						  <td><a href="?orderid=order" class="btn" style="background:#0066FF; text-shadow:none; padding:8px 10px; font-size:20px;color:#FFF;">Countinue with this address <i class="icon-arrow-right"></i></a></td>
	               </tr>
				
				
				   <tr>
						  <td>Phone No.: </td>
						  <td><?php echo $result['phone']; ?></td>
						   <td><a href="editprofile.php" class="btn btn-large" style="background:#CCFF00">Edit Address</a></td>
	               </tr>
				   
				   
				
			</tbody>
			</table>
			<?php }} ?>
			
			
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->

<?php
include('inc/footer.php');
?>