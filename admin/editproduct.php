<?php include 'inc/header.php'?>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/subCategory.php'; ?>
<!-- get id by global variable-->
<?php
   if(!isset($_GET['pid']) || $_GET['pid'] == NULL){
      echo "<script>window.location = 'viewproducts.php';</script>";
   } else {
      $pid = $_GET['pid'];
   }
?>
<?php
    $pd = new Product();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){ 	 			  
	     $productUpdate = $pd->updateProduct($_POST, $_FILES, $pid);
    }
?>
  <section class="menuhead">
	
	    <h3 class="dash">Update Product</h3>
		<?php if(isset($productUpdate)){ echo $productUpdate; } ?>
		<!-- fetch data by id-->
		 <?php 
			       $getProductById = $pd->getProductByIdData($pid);
				   if($getProductById){
				      while($result = $getProductById->fetch_assoc()){
		 ?>
	     <form action="" method="post" class="myform1" enctype="multipart/form-data">
<table class="tblone" style="width:700px; margin:5px 0">
  <tr>
    <td>Name</td>
    <td><input type="text" name="productName" value="<?php echo $result['productName']; ?>"  /></td>
  </tr>
  
  <tr>
    <td>Category</td>
    <td><select name="catId" class="opt">
	       <option value="-1" selected> select...</option>
	       <?php 
	       $cat = new Category();
		   $getCat = $cat->getAllCat();
		   if($getCat){
		    while($value = $getCat->fetch_assoc()){
	       ?>
	       <option 
	       <?php  if($value['catId'] == $result['catId']) { ?>
	       selected="selected" <?php } ?>
		   value="<?php echo $value['catId']; ?>"><?php echo $value['catName']; ?></option>
	       <?php }} ?>  
          </select></td>
  </tr>
  
  <tr>
    <td>Sub Category</td>
    <td>
	  <select name="subCatId" class="opt">
	     <option value="-1" selected> select...</option>
	    <?php 
	       $subcat = new SubCategory();
		   $getSubCat = $subcat->getSubCat();
		   if($getSubCat){
		    while($value = $getSubCat->fetch_assoc()){
	    ?>
	      <option 
		  <?php  if($value['subCatId'] == $result['subCatId']) { ?>
		  selected="selected" <?php } ?>
		  value="<?php echo $value['subCatId']; ?>" ><?php echo $value['subCatName']; ?></option>
		<?php }} ?>
     </select></td>
  </tr>

  <tr>
    <td>Description</td>
    <td>
	  <textarea  name="body"><?php echo $result['body']; ?></textarea>
      <script>CKEDITOR.replace( 'body' );</script>
	</td>
  </tr>
  
  <tr>
    <td>Price</td>
    <td><input type="text" name="price" value="<?php echo $result['price']; ?>"  /></td>
  </tr>

  <tr>
    <td>Image</td>
    <td>
	   <img src="../<?php echo $result['image']; ?>" width="100px" height="100px" /><br /><br />
       <input type="file" name="image" /><br />
    </td>
  </tr>
  
  <tr>
    <td>Product Type</td>
    <td><select name="type" class="opt">
	   <option value="-1">select type</option>
	    
	      <?php if($result['type'] == '0') { ?>
	   <option selected="selected" value="0">Featured</option>
	   <option value="1">General</option>
	   <option value="2">Offer</option>
	      <?php } ?>
		  <?php if($result['type'] == '1') { ?>
	   <option selected="selected" value="1">General</option>
	   <option value="0">Featured</option>
	   <option value="2">Offer</option>
	      <?php } ?>
		  <?php if($result['type'] == '2') { ?>
	   <option selected="selected" value="2">Offer</option>
	   <option value="0">Featured</option>
	   <option value="1">General</option>
	      <?php } ?>
	   
     </select></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input type="submit" name="submit" class="upd" value="Update Product" /></td>
  </tr>

</table>
</form>
<?php }} ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>