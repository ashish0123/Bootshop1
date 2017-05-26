<?php
include('inc/header.php');
?>
<?php
    $login = Session::get('custlogin');
	   if($login == false){
	     echo "<script>window.location = 'login.php';</script>";
	   }
?>
<?php
    $id = Session::get('custId'); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){ 
	     $customerUpdate = $cs->customerUpdate($_POST, $id);
    }
?>
<style>

</style>
<div style="width:60%; margin:0 auto;">		
 <?php
      $id = Session::get('custId');
	  $getdata = $cs->getCustomerData($id);
	  if($getdata){
	    while($result = $getdata->fetch_assoc()){
 
 ?><form action="" method="post">
	<table class="table">
	  <tr>
		  <td colspan="5">
		  <h2>Update Your Profile </h2>
		  </td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">Name Title: </td>
		  <td>
		     <select class="span1" name="title">
			<option value="">-</option>
			<option selected="selected" style="background:#00FF33" value="<?php echo $result['title']; ?>"><?php echo $result['title']; ?></option>
			<option value="Mr.">Mr.</option>
			<option value="Mrs">Mrs</option>
			<option value="Miss">Miss</option>
		   </select>
		  </td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">First Name : </td>
		  <td><input type="text" name="fname" value="<?php echo $result['fname']; ?>"></td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">Last Name : </td>
		  <td><input type="text" name="lname" value="<?php echo $result['lname']; ?>"></td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">Email : </td>
		  <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
	  </tr>

	  <tr>
		  <td style="vertical-align:middle">Date Of Birth : </td>
		  <td><input type="date" name="dob" placeholder="dd-mm-yyyy" value="<?php echo $result['dob']; ?>"></td>
	  </tr>
	  
	  
	  <tr>
		  <td style="vertical-align:middle">Address 1 : </td>
		  <td><input type="text" name="address1" value="<?php echo $result['address1']; ?>"></td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">Address 2 : </td>
		  <td><input type="text" name="address2" value="<?php echo $result['address2']; ?>"></td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">City : </td>
		  <td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">State : </td>
		  <td><input type="text" name="state" value="<?php echo $result['state']; ?>"></td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">Pin/Postal code : </td>
		  <td><input type="text" name="pin" value="<?php echo $result['pin']; ?>"></td>
	  </tr>
	 
	  <tr>
		  <td style="vertical-align:middle">Country : </td>
		  <td>
		       <select name="country" id="state" >
				<option value="">-</option>
				<option selected="selected" value="<?php echo $result['country']; ?>"><?php echo $result['country']; ?></option>
				<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="8">Delaware</option><option value="53">District of Columbia</option><option value="9">Florida</option><option value="10">Georgia</option><option value="11">Hawaii</option><option value="12">Idaho</option><option value="13">Illinois</option><option value="India">India</option><option value="15">Iowa</option><option value="16">Kansas</option><option value="17">Kentucky</option><option value="18">Louisiana</option><option value="19">Maine</option><option value="20">Maryland</option><option value="21">Massachusetts</option><option value="22">Michigan</option><option value="23">Minnesota</option><option value="24">Mississippi</option><option value="25">Missouri</option><option value="26">Montana</option><option value="27">Nebraska</option><option value="28">Nevada</option><option value="29">New Hampshire</option><option value="30">New Jersey</option><option value="31">New Mexico</option><option value="32">New York</option><option value="33">North Carolina</option><option value="34">North Dakota</option><option value="35">Ohio</option><option value="36">Oklahoma</option><option value="37">Oregon</option><option value="38">Pennsylvania</option><option value="51">Puerto Rico</option><option value="39">Rhode Island</option><option value="40">South Carolina</option><option value="41">South Dakota</option><option value="42">Tennessee</option><option value="43">Texas</option><option value="52">US Virgin Islands</option><option value="44">Utah</option><option value="45">Vermont</option><option value="46">Virginia</option><option value="47">Washington</option><option value="48">West Virginia</option><option value="49">Wisconsin</option><option value="50">Wyoming</option>
			</select>
		  </td>
	  </tr>
	  
	  <tr>
		  <td style="vertical-align:middle">Phone : </td>
		  <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
	  </tr>
	  
	  <tr>
	      <td></td>
	      <td><button name="update" style="background:#CCCCCC; border-radius:5px; border:none; padding:7px 5px;">Update</button></td>
	  </tr>	  
</table>
</form>	
<?php }} ?>  	 
</div>
<?php
include('inc/footer.php');
?>