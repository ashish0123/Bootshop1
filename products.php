<?php
include('inc/header.php');
include('inc/sidebar.php');
?>
<?php
   if(!isset($_GET['subcatid']) || $_GET['subcatid'] == NULL || !isset($_GET['subcatname'])){
      echo "<script>window.location = 'index.php';</script>";
   } else {
      $id   = $_GET['subcatid'];
	  $name = $_GET['subcatname'];
   }
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $quantity = $_POST['quantity'];
		 $pId = $_POST['productId'];
		 			  
	     $addCart = $ct->addToCart($quantity, $pId);
    }
?>
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Products Name</li>
    </ul>
	<h3> <?php echo $name; ?> <small class="pull-right"> 40 products are available </small></h3>	

	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
	<?php
	     $getAll = $pd->getAll($id);
		  if($getAll){
		     while($result = $getAll->fetch_assoc()){	
	?>
		<div class="row">	  
			<div class="span2">
			<img src="<?php echo $result['image'];?>" alt=""/>
			</div>
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5><?php echo $result['productName'];?></h5>
				<p>
				<?php echo $fm->textShorten($result['body'], 60);?>
				</p>
				<a class="btn btn-small pull-right" href="product_details.php?proid=<?php echo $result['productId'];?>">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm" action="" method="post">
			<h3> $<?php echo $result['price'];?></h3>
			<input type="hidden" value="<?php echo $result['productId'];?>" name="productId" />
			<input type="number" class="span1" value="1" min="1" name="quantity" placeholder="Qty."/><br/><br/>
			  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
			  <a href="<?php echo $result['image'];?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				</form>
			</div>
	</div>
	<hr class="soft"/>
		<?php }} else {
		         echo "<center><h2 style='color:red;'>Product Not Found !!</h2></center>";
		}?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php
		  $getAll = $pd->getAll($id);
		  if($getAll){
		     while($result = $getAll->fetch_assoc()){
		
		?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.php?proid=<?php echo $result['productId'];?>"><img src="<?php echo $result['image'];?>" alt="<?php echo $result['productName'];?>"/></a>
				<div class="caption">
				  <h5><?php echo $result['productName'];?></h5>
				  <p> 
					<?php echo $fm->textShorten($result['body'], 60);?> 
				  </p>
				  <form action="" method="post">
					  <h4 style="text-align:center">
					  <input type="hidden" value="<?php echo $result['productId']; ?>" name="productId" />
					  <input type="hidden" value="1" name="quantity" />
					  <a class="btn" href="<?php echo $result['image']; ?>"> <i class="icon-zoom-in"></i></a> 
					  <button type="submit" class="btn">Add to <i class="icon-shopping-cart"></i></button> 
					  <a class="btn btn-primary" href="#">$<?php echo $result['price']; ?></a></h4>
				  </form>
				</div>
			  </div>
			</li>
			<?php }}else {
		         echo "<center><h2 style='color:red;'>Product Not Found !!</h2></center>";
		} ?>
		  </ul>
	<hr class="soft"/>
	</div>
</div>

	<a href="compair.php" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination">
			<ul>
			<li><a href="#">&lsaquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>

<?php
include('inc/footer.php');
?>