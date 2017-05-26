<?php include 'inc/header.php'?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php';  ?>
<?php 
$pd = new Product();
$fm = new Format(); 
?>
<!-- delete data by id-->
<?php 
if(isset($_GET['delproduct']) ){
   $delId = $_GET['delproduct'];
   $delProduct = $pd->delProductById($delId);
} 
?>
  <section class="menuhead">
	
	    <h3 class="dash">View Product</h3>
		<?php if(isset($delProduct)){ echo $delProduct; } ?>
		 <li class="lihead"><u>Product List</u></li>
		 
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
                   <th width="3%">SN</th>
                   <th width="10%">Product Name</th>
				   <th width="10%">Cat Name</th>
				   <th width="10%">Sub Cat Name</th>
				   <th width="20%">Description</th>
				   <th width="10%">Price</th>
				   <th width="12%">Image</th>
				   <th width="10%">Type</th>
                   <th width="15%">Action</th>
                </tr>
				<?php 
			       $getProduct = $pd->getAllproduct();
				   if($getProduct){
				       $i = 0;
				      while($result = $getProduct->fetch_assoc()){
					  $i++;
			    ?>
				<tr>
                   <td><?php echo $i; ?></td>
				   <td><?php echo $result['productName']; ?></td>
				   <td><?php echo $result['catName']; ?></td>
				   <td><?php echo $result['subCatName']; ?></td>
				   <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
				   <td>$<?php echo $result['price']; ?></td>
                   <td><img src="../<?php echo $result['image']; ?>" width="80%" height="80%" /></td>
				   <td>
				   <?php 
				     if($result['type'] == 0){
					     echo "Featured";
					 } elseif($result['type'] == 1) {
					     echo "General";
					 } else {
					     echo "Offer";
					 }
				   ?>
				   </td>
                   <td>
				   <a href="editproduct.php?pid=<?php echo $result['productId']; ?>">Edit</a> ||
				   <a onclick="return confirm('Are you sure want to delete this?')" href="?delproduct=<?php echo $result['productId']; ?>">Delete</a></td>
				</tr>
				<?php }} ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>