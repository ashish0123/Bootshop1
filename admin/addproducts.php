<?php include 'inc/header.php'?>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/subCategory.php'; ?>
<?php 
   $pd = new Product(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 			  
	     $productInsert = $pd->insertProduct($_POST, $_FILES);
    }
?>

  <section class="menuhead">
	
	    <h3 class="dash">Add Product</h3>
		<?php if(isset($productInsert)){ echo $productInsert; } ?>
	     <form action="" method="post" class="myform1" enctype="multipart/form-data">
<table class="tblone" style="width:700px; margin:5px 0">
  <tr>
    <td>Name</td>
    <td><input type="text" name="productName"  /></td>
  </tr>
  
  <tr>
    <td>Category</td>
    <td><select name="catId" class="opt">
	    <option value="-1" selected> select...</option>
	<?php 
	       $cat = new Category();
		   $getCat = $cat->getAllCat();
		   if($getCat){
		    while($result = $getCat->fetch_assoc()){
	?>
	   <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
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
		   $getCat = $subcat->getSubCat();
		   if($getCat){
		    while($result = $getCat->fetch_assoc()){
	    ?>
	      <option value="<?php echo $result['subCatId']; ?>" ><?php echo $result['subCatName']; ?></option>
		<?php }} ?>
     </select></td>
  </tr>

  <tr>
    <td>Description</td>
    <td>
	  <textarea  name="body"></textarea>
      <script>CKEDITOR.replace( 'body' );</script>
	</td>
  </tr>
  
  <tr>
    <td>Price</td>
    <td><input type="text" name="price"  /></td>
  </tr>

  <tr>
    <td>Image</td>
    <td>
       <input type="file" name="image" />
    </td>
  </tr>
  
  <tr>
    <td>Product Type</td>
    <td><select name="type" class="opt">
	   <option value="-1" selected> select Type</option>
	   <option value="0">Featured</option>
	   <option value="1">General</option>
	   <option value="2">Offer</option>
     </select></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input type="submit" name="submit" class="upd" value="Add Product" /></td>
  </tr>

</table>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>