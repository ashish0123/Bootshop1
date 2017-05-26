<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php');
?> 
<?php

class Cart{
   private $db;
   private $fm;
   
   public function __construct(){
      $this->db = new Database();
	  $this->fm = new Format();
   }
   public function addToCart($quantity, $proid){
      $quantity = $this->fm->validation($quantity);
	  $quantity = mysqli_real_escape_string($this->db->link, $quantity);
	  $productId    = mysqli_real_escape_string($this->db->link, $proid);
	  $sId      = session_id();
	  
	  $squery = "select * from tbl_product where productId='$productId'";
	  $result = $this->db->select($squery)->fetch_assoc();
	  $productName = $result['productName'];
	  $price       = $result['price'];
	  $image       = $result['image'];
	  
	  $chquery = "select * from tbl_cart where productId='$productId' and sId='$sId'";
	  $getPro = $this->db->select($chquery);
	  if($getPro){
	      $msg = "Product already added !!";
		  return $msg;
	  } else {
	  
	        $query = "insert into tbl_cart(sId, productId, productName, price, quantity, image) 
		           values('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";
            $result = $this->db->insert($query);
	          if($result != false){
		           echo "<script>window.location = 'product_summary.php';</script>";
		      } else {
		           echo "<script>window.location = 'product_details.php';</script>";
		      }
	  }	   
   }
   public function getCartProduct(){
        $sId      = session_id();
		$query = "select * from tbl_cart where sId='$sId'";
	    $result = $this->db->select($query);
		return $result;
   }
   public function updateQuantityById($cartId, $quantity){
        $cartId   = mysqli_real_escape_string($this->db->link, $cartId);
	    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
		
		$query = "update tbl_cart set quantity = '$quantity' where cartId='$cartId'";
	    $result = $this->db->update($query);
   }
   public function delCartProById($delcartid){
         $cartId = mysqli_real_escape_string($this->db->link, $delcartid);
		 $query  = "delete from tbl_cart where cartId='$delcartid'";
		 $result = $this->db->delete($query);
		 return $result;
   }
   public function insertOrderData($id){
         $sId = session_id();
         $id  = mysqli_real_escape_string($this->db->link, $id);
		 
		 $query  = "select * from tbl_cart where sId='$sId'";
		 $getPro = $this->db->select($query);
		 if($getPro){
		   while($result = $getPro->fetch_assoc()){
		       $productId   = $result['productId'];
			   $productName = $result['productName'];
			   $quantity    = $result['quantity'];
			   $price       = $result['price'] * $quantity;
			   $image       = $result['image'];
			   
			   $query = "insert into tbl_order(custId, productId, productName, quantity, price, image) 
		           values('".$id."', '".$productId."', '".$productName."', '".$quantity."', '".$price."', '".$image."')";
               $result = $this->db->insert($query);
		   }
		 }
   }
   public function delCartProBySid(){
        $sId = session_id();
		$query  = "delete from tbl_cart where sId='$sId'";
	    $result = $this->db->delete($query);
		return $result;
   }
   public function getOrderedProduct($id){
        $query  = "select * from tbl_order where status='pending' or status='processing' and custId='$id' order by date desc";
	    $result = $this->db->select($query);
		return $result;
   }
   public function getDelivarProduct($id){
        $query  = "select * from tbl_order where status='delivered' and custId='$id' order by date desc";
	    $result = $this->db->select($query);
		return $result;
   }
   public function getAllOrderInPending(){
        $query  = "select * from tbl_order where status='pending' order by date desc";
	    $result = $this->db->select($query);
		return $result;
   }
   public function getAllOrderInProcessing(){
        $query  = "select * from tbl_order where status='processing' order by date desc";
	    $result = $this->db->select($query);
		return $result;
   }
   public function orderInProcess($id){
        $id    = mysqli_real_escape_string($this->db->link, $id);
		
		$query = "update tbl_order set status = 'processing' where id='".$id."'";
	    $result = $this->db->update($query);
		if($result == true){
		    $msg = "<span class='success'>Product is in Processing now !!</span>";
			return $msg;
	    } else {
		    $msg = "<span class='error'>Product is not in Processing !!</span>";
			return $msg;
	    }
   }
   public function orderDelivered($id){
        $id    = mysqli_real_escape_string($this->db->link, $id);

		$Cdate = date("y-m-d");
		
		$query = "update tbl_order set status = 'delivered', deldate = '$Cdate' where id='".$id."'";
	    $result = $this->db->update($query);
		if($result != false){
		    $msg = "<span class='success'>Product is in Delivered !!</span>";
			return $msg;
	    } else {
		    $msg = "<span class='error'>Product is not Delivered !!</span>";
			return $msg;
	    }
   } 
   
}

?>