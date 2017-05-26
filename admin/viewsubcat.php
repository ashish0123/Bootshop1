<?php include 'inc/header.php'?>
<?php include '../classes/SubCategory.php'; ?>
<?php $subcat = new SubCategory(); ?>
<!-- delete data by id-->
<?php 
if(isset($_GET['delsubcat']) ){
   $delid = $_GET['delsubcat'];
   $delSubCat = $subcat->delSubCatById($delid);
} 
?>
 
  <section class="menuhead">
	
	    <h3 class="dash">View Sub Category</h3>
		<?php if(isset($delSubCat)){ echo $delSubCat; } ?>
		 <li class="lihead"><u>Sub Category List</u></li>
		 
		 <li class="litext" style="float:left">
		    <p style="font-size:15px; font-weight:bold; color:#000066">Show :
			<select Name="sort">
			<option value="-1" selected>select..</option>
			<option value="ten">10</option>
			<option value="twenty">20</option>
			<option value="thirty">30</option>
			<option value="fourty">40</option>
			</select> Entries</p>
		 </li>
		 
		 <li class="litext" style="float:right"> 
			   <p style="font-size:17px; font-weight:bold; padding-right:15px; height:22px; color:#000066">Search &nbsp;: &nbsp; 
			   <input type="text" name="fb" size="18" placeholder=" search category here..." class="sicial"/></p>
		 </li>
		 
		 
	     <form class="myform">
		   <table class="tbl">

                <tr>
                   <th width="10%">Serial No.</th>
                   <th width="30%">Category Name</th>
				   <th width="20%">Sub Category Name</th>
                   <th width="40%">Action</th>
                </tr>
				
				<?php 
			       $getSubCat = $subcat->getAllSubCat();
				   if($getSubCat){
				       $i = 0;
				      while($result = $getSubCat->fetch_assoc()){
					  $i++;
			    ?>
				
				<tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $result['catName']; ?></td>
				   <td><?php echo $result['subCatName']; ?></td>
                   <td>
				   <a href="editsubcat.php?subcatid=<?php echo $result['subCatId']; ?>">Edit</a> || 
				   <a onclick="return confirm('Are you sure want to delete this?')" href="?delsubcat=<?php echo $result['subCatId']; ?>">Delete</a></td>
				</tr>
				<?php }} ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>