<?php include 'inc/header.php'?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/SubCategory.php'; ?>
<?php 
   $subcat = new SubCategory(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $catNameId = $_POST['catNameId'];
		 $subCatName = $_POST['subCatName'];
		 			  
	     $subCatInsert = $subcat->insertSubCat($catNameId, $subCatName);
    }
?>
  <section class="menuhead">
	
	    <h3 class="dash">Add Sub Category</h3>
	     <form action="addsubcat.php" method="post">
		 <?php if(isset($subCatInsert)){ echo $subCatInsert; } ?>
		   <table>
		     <tr>
			   <li class="lihead"><u>Sub Category</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Add New Sub Category &nbsp; :
			   <input type="text" name="subCatName" size="30" placeholder=" enter new category here" class="sicial"/></p>
			   </li>	
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Select Main Category &nbsp; :
			   
			   <select name="catNameId" style="font-size:16px; color:#333333; width:auto">
			   <option value="">select...</option>
			   <?php 
			       $cat = new Category();
			       $getCat = $cat->getAllCat();
				   if($getCat){
				      while($result = $getCat->fetch_assoc()){
			   ?>
			   <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
			   
			   <?php }} ?>
			   </select></p>
			   </li>			 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>