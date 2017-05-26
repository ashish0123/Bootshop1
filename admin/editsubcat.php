<?php include 'inc/header.php'?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/SubCategory.php'; ?>
<!-- get id by global variable-->
<?php
   if(!isset($_GET['subcatid']) || $_GET['subcatid'] == NULL){
      echo "<script>window.location = 'viewsubcat.php';</script>";
   } else {
      
      $subcatid = $_GET['subcatid'];
   }
?>
<!-- update data by id-->
<?php   
   $subcat = new SubCategory(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $subCatId = $_POST['subCatId'];
		 $catNameId = $_POST['catNameId'];
		 $subCatName = $_POST['subCatName'];
		 			  
	     $subCatUpdate = $subcat->updateSubCat($subCatId, $catNameId, $subCatName);
    }
?>

  <section class="menuhead">
	
	    <h3 class="dash">Update Sub Category</h3>
		<!-- fetch data by id-->
		 <?php 
			       $getSubCatById = $subcat->getSubCatByIdData($subcatid);
				   if($getSubCatById){
				      while($result = $getSubCatById->fetch_assoc()){
		 ?>
	     <form action="" method="post">
		 <?php if(isset($subCatUpdate)){ echo $subCatUpdate; } ?>
		   <table>
		     <tr>
			   <li class="lihead"><u>Sub Category</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Add New Sub Category &nbsp; :
			   <input type="hidden" name="subCatId" value="<?php echo $result['subCatId']; ?>" />
			   <input type="text" name="subCatName" size="30" value="<?php echo $result['subCatName']; ?>" class="sicial"/></p>
			   </li>	
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Select Main Category &nbsp; :
			   
			   <select name="catNameId" style="font-size:16px; color:#333333; width:auto">
			   <option value="">select...</option>
			   <?php 
			       $cat = new Category();
			       $getCat = $cat->getAllCat();
				   if($getCat){
				      while($value = $getCat->fetch_assoc()){
			   ?>
			   <option <?php if($value['catId']==$result['catNameId']){ ?>
			     selected="selected" <?php } ?>
			    value="<?php echo $value['catId']; ?>"><?php echo $value['catName']; ?></option>
			   
			   <?php }} ?>
			   </select></p>
			   </li>			 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
		 <?php }} ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>