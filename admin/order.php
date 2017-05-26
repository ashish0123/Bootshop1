<?php include 'inc/header.php'?>
<?php include '../classes/Cart.php'; ?>
   
<?php
   $ct = new Cart();
   $fm = new Format();
   
if(isset($_GET['process'])){
    $id = $_GET['process'];
	
	$process = $ct->orderInProcess($id);
}

if(isset($_GET['deliver'])){
    $id = $_GET['deliver'];
	
	$deliver = $ct->orderDelivered($id);
}
?>
  <section class="menuhead">
	
	    <h3 class="dash">View Order</h3>
		<?php if(isset($process)){ echo $process; } if(isset($deliver)){ echo $deliver; } ?>
		 <li class="lihead"><u>Order List in pending</u></li>
		 
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
                   <th width="10%">ID</th>
                   <th width="20%">Order Time</th>
                   <th width="20%">Product</th>
				   <th width="18%">ProductName</th>
				   <th width="2%">Quantity</th>
				   <th width="10%">Price</th>
				   <th width="10%">Address</th>
				   <th width="10%">Action</th>
                </tr>
				<?php 
			       $getOdr = $ct->getAllOrderInPending();
				   if($getOdr){
				      while($result = $getOdr->fetch_assoc()){
			    ?>
				<tr>
                   <td><?php echo $result['custId']; ?></td>
                   <td><?php echo $fm->fullFormatDate($result['date']); ?></td>
				   <td><img src="../<?php echo $result['image']; ?>" width="80px" height="80px" /></td>
				   <td><?php echo $result['productName']; ?></td>
				   <td><?php echo $result['quantity']; ?></td>
				   <td>$<?php echo $result['price']; ?></td>
				   <td><a href="customer.php?custid=<?php echo $result['custId']; ?>">View detail</a></td>
                   <td><a href="?process=<?php echo $result['id']; ?>">Processing</a></td>

				</tr>
				<?php } } else {?>
				<tr><td colspan="8" style="text-align:center"><h2>No Order Available !! </h2></td></tr>
				<?php }?>
				
			</table>
		 </form>
		 
		 
<!-----------------------------------------------------Oredr list in Processing----------------------------------------------------------------->

<li class="lihead"><u>Order List in Processing</u></li>
		 
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
                   <th width="10%">ID</th>
                   <th width="20%">Order Time</th>
                   <th width="20%">Product</th>
				   <th width="18%">ProductName</th>
				   <th width="2%">Quantity</th>
				   <th width="10%">Price</th>
				   <th width="10%">Address</th>
				   <th width="10%">Action</th>
                </tr>
				<?php 
			       $getOdr = $ct->getAllOrderInProcessing();
				   if($getOdr){
				      while($result = $getOdr->fetch_assoc()){
			    ?>
				<tr>
                   <td><?php echo $result['custId']; ?></td>
                   <td><?php echo $fm->fullFormatDate($result['date']); ?></td>
				   <td><img src="../<?php echo $result['image']; ?>" width="80px" height="80px" /></td>
				   <td><?php echo $result['productName']; ?></td>
				   <td><?php echo $result['quantity']; ?></td>
				   <td>$<?php echo $result['price']; ?></td>
				   <td><a href="customer.php?custid=<?php echo $result['custId']; ?>">View detail</a></td>
                   <td><a href="?deliver=<?php echo $result['id']; ?>">Delivered</a></td>

				</tr>
				<?php }} ?>
				
			</table>
		 </form>		 
  </section>
 
 
 
 <?php include 'inc/footer.php'?>