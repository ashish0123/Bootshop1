



		<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			
			  <div class="item ">
			  <ul class="thumbnails">
			   <?php
			     
			    $getFpd = $pd->getFeatureProductByDesc();
		         if($getFpd){
			
				   while($result = $getFpd->fetch_assoc()){
				     
			   ?>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php?proid=<?php echo $result['productId'];?>"><img src="<?php echo $result['image'];?>" alt=""></a>
					<div class="caption">
					  <h5><?php echo $result['productName'];?></h5>
					  <h4><a class="btn" href="product_details.php?proid=<?php echo $result['productId'];?>">VIEW</a> <span class="pull-right">$<?php echo $result['price'];?></span></h4>
					</div>
				  </div>
				</li>
				<?php  }} ?>
			  </ul>
			  </div>
			  
			  <div class="item ">
			  <ul class="thumbnails">
			   <?php
			      $getFpd = $pd->getFeatureProductByAsc();
				   if($getFpd){
				   while($result = $getFpd->fetch_assoc()){
			  ?>
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="product_details.php?proid=<?php echo $result['productId'];?>"><img src="<?php echo $result['image'];?>" alt=""></a>
					<div class="caption">
					  <h5><?php echo $result['productName'];?></h5>
					  <h4><a class="btn" href="product_details.php?proid=<?php echo $result['productId'];?>">VIEW</a> <span class="pull-right">$<?php echo $result['price'];?></span></h4>
					</div>
				  </div>
				</li>
				<?php }} ?>
			  </ul>
			  </div>
			   
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		