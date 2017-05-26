<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<?php
	        $getCat = $cat->getAllCat();
			if($getCat){
			   while($category = $getCat->fetch_assoc()){
	    ?>
			<li class="subMenu open"><a> <?php echo $category['catName']; ?> [100]</a>
				<ul>
				<?php
				   $catId = $category['catId'];
	               $getSubCat = $cat->getAllSubCat($catId);
			       if($getSubCat){
			         while($subCategory = $getSubCat->fetch_assoc()){
	            ?>
					<li><a class="active" href="products.php?subcatid=<?php echo $subCategory['subCatId']; ?>&subcatname=<?php echo $subCategory['subCatName']; ?>">
					<i class="icon-chevron-right"></i> 
					<?php echo $subCategory['subCatName']; ?> 
					 
					  </a></li>
					
				<?php }} ?>	
				</ul>
			</li>
			
		<?php }} ?>	
		</ul>
	
		<br/>
		 
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->