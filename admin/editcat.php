<?php include 'inc/header.php'?>
<?php include '../classes/Category.php'; ?>
<?php
   if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
      echo "<script>window.location = 'viewcat.php';</script>";
   } else {
      
      $catid = $_GET['catid'];
   }
?>
<?php   
   $cat = new Category(); 
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 $catId = $_POST['catId'];
		 $catName = $_POST['catName'];
		 			  
	     $catUpdate = $cat->updateCat($catId, $catName);
    }
?>
  <section class="menuhead">
	
	    <h3 class="dash">Update Category</h3>
	     <form action="" method="post">
		 <?php if(isset($catUpdate)){ echo $catUpdate; } ?>
		   <table>
		     <tr>
			   <li class="lihead"><u>Category</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Update Category &nbsp; :
			   <?php 
			       $getCatById = $cat->getCatByIdData($catid);
				   if($getCatById){
				      while($result = $getCatById->fetch_assoc()){
			   ?>
			   <input type="hidden" name="catId" value="<?php echo $result['catId']; ?>" />
			   <input type="text" name="catName" size="30" value="<?php echo $result['catName']; ?>" class="sicial"/>
			   <?php }} ?>
			   </p>
			   </li>				 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>