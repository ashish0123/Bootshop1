<?php
include('inc/header.php');
include('inc/sidebar.php');
error_reporting(0);
?>
<!-- remove product by id-->
<?php 
if(isset($_GET['delcartid']) ){
   $delcartid = $_GET['delcartid'];
   $delCartPro = $ct->delCartProById($delcartid);
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
				  <th width="10%">Action</th>
				  
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
	              <td><a onclick="return confirm('Are you sure want to remove this product ?');" href="?delcartid=<?php echo $result['cartId'];?>">
				  <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
				  </a></td>
                </tr>
				<?php 
				   $sum = $sum + $total;
				?>
			<?php }} ?>	
				
                <tr>
                  <td colspan="6" style="text-align:right">Total Price:	</td>
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
                  <td colspan="6" style="text-align:right">Total Tax:	</td>
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
                  <td colspan="6" style="text-align:right">
				    <?php
					   $Gtotal = $sum + $tax;
					?>
				  <strong>TOTAL ($<?php if(isset($sum)){ echo $sum; }else{ echo "0"; } ?> + $<?php echo $tax; ?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> $<?php echo $Gtotal; ?> </strong></td>
                </tr>
				</tbody>
            </table>
		
		
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			<table class="table table-bordered">
			 <tr><th>ESTIMATE YOUR SHIPPING </th></tr>
			 <tr> 
			 <td>
				<form class="form-horizontal">
				  <div class="control-group">
					<label class="control-label" for="inputCountry">Country </label>
					<div class="controls">
					  <input type="text" id="inputCountry" placeholder="Country">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputPost">Post Code/ Zipcode </label>
					<div class="controls">
					  <input type="text" id="inputPost" placeholder="Postcode">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn">ESTIMATE </button>
					</div>
				  </div>
				</form>				  
			  </td>
			  </tr>
            </table>		
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="payment.php" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->

<?php
include('inc/footer.php');
?>