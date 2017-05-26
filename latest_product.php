<h4>Latest Products </h4>
			  <ul class="thumbnails">
			   <?php
			     
			    $getLpd = $pd->getLatestProductByDesc();
		         if($getLpd){
				   while($result = $getLpd->fetch_assoc()){
			   ?>
				<li class="span3">
				  <div class="thumbnail">
					<a  href="product_details.php?proid=<?php echo $result['productId'];?>"><img src="<?php echo $result['image'];?>" alt=""/></a>
					<div class="caption">
					  <h5><?php echo $result['productName'];?></h5>
					  <p> 
						<?php echo $fm->textShorten($result['body'], 50);?> 
					  </p>
					 
					  <h4 style="text-align:center">
					  <a class="btn" href="#"> <i class="icon-zoom-in"></i></a> 
					  <a class="btn" href="product_details.php?proid=<?php echo $result['productId'];?>">Add to <i class="icon-shopping-cart"></i></a> 
					  <a class="btn btn-primary" href="#">$<?php echo $result['price'];?></a>
					  </h4>
					</div>
				  </div>
				</li>
				<?php }} ?>
			  </ul>	

		</div>
		</div>
	</div>
</div>