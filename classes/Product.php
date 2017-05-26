<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php');
?> 
<?php

class Product{
   private $db;
   private $fm;
   
   public function __construct(){
      $this->db = new Database();
	  $this->fm = new Format();
   }
   
   public function insertProduct($data, $file){
      $productName = $this->fm->validation($data['productName']);
	  $catId       = $this->fm->validation($data['catId']);
	  $subCatId    = $this->fm->validation($data['subCatId']);
	  $body        = $this->fm->validation($data['body']);
	  $price       = $this->fm->validation($data['price']);
	  $type        = $this->fm->validation($data['type']);
	 	  
	  $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
	  $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
	  $subCatId    = mysqli_real_escape_string($this->db->link, $data['subCatId']);
	  $body        = mysqli_real_escape_string($this->db->link, $data['body']);
	  $price       = mysqli_real_escape_string($this->db->link, $data['price']);
	  $type        = mysqli_real_escape_string($this->db->link, $data['type']);
			 
	  $permited = array('jpg', 'jpeg', 'png', 'gif');
	  $file_name= $file['image']['name'];
	  $file_size= $file['image']['size'];
	  $file_temp= $file['image']['tmp_name'];
      $div      = explode('.',$file_name);
	  $file_ext = strtolower(end($div));
	  $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	  $uploade_image = "../themes/images/products/".$unique_image;
	  $image = "themes/images/products/".$unique_image;
	  
	  if($file_size>1048567){
   	          $msg  = "<span class='error'>Image should be less than 1MB!!.</span>";
			  return $msg;
          } elseif(in_array($file_ext, $permited) === false){
              $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."!!.</span>";
			  return $msg;
          } 
	  
	  if($productName == "" || $catId == "" || $subCatId == "" || $body == "" || $price == "" || $file_name == "" || $type == ""){
	      $msg = "<span class='error'>Field should not be empty !!</span>";
		  return $msg;
	      
	  } else {
	      move_uploaded_file($file_temp, $uploade_image);
		  $query = "insert into tbl_product(productName, catId, subCatId, body, price, image,type) 
		           values('$productName', '$catId', '$subCatId', '$body', '$price', '$image','$type')";
		  $result = $this->db->insert($query);
		    if($result != false){
		        $msg = "<span class='success'>Product Inserted successfully !!</span>";
			    return $msg;
		    } else {
			    $msg = "<span class='error'>Product Not Inserted !!</span>";
			    return $msg;
		   } 
	  }
   }		  
   public function getAllProduct(){
       $query = "select p.*, c.catName, sc.subCatName from tbl_product as p, tbl_category as c, tbl_subCategory as sc
	             where p.catId = c.catId and p.subCatId = sc.subCatId
				 order by p.productId desc";
				 
      /* $query = "select tbl_product.*, tbl_category.catName, tbl_subCategory.subCatName from tbl_product 
	             inner join tbl_category on tbl_product.catId = tbl_category.catId
	             inner join tbl_subCategory on tbl_product.subCatId = tbl_subCategory.subCatId
	             order by tbl_product.productId desc"; */
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getProductByIdData($pid){
       $pid = mysqli_real_escape_string($this->db->link, $pid);
       $query = "select * from tbl_product where productId='$pid'";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function updateProduct($data, $file, $pid){
	   
       $productName = $this->fm->validation($data['productName']);
	   $productName = $this->fm->stringtoupper($data['productName']);
	   $catId       = $this->fm->validation($data['catId']);
	   $subCatId    = $this->fm->validation($data['subCatId']);
	   $body        = $this->fm->validation($data['body']);
	   $price       = $this->fm->validation($data['price']);
	   $type        = $this->fm->validation($data['type']);
	 	  
	   $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
	   $catId       = mysqli_real_escape_string($this->db->link, $data['catId']);
	   $subCatId    = mysqli_real_escape_string($this->db->link, $data['subCatId']);
	   $body        = mysqli_real_escape_string($this->db->link, $data['body']);
	   $price       = mysqli_real_escape_string($this->db->link, $data['price']);
	   $type        = mysqli_real_escape_string($this->db->link, $data['type']);
	   
	   $permited = array('jpg', 'jpeg', 'png', 'gif');
	   $file_name= $file['image']['name'];
	   $file_size= $file['image']['size'];
	   $file_temp= $file['image']['tmp_name'];
       $div      = explode('.',$file_name);
	   $file_ext = strtolower(end($div));
	   $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	   $uploade_image = "../themes/images/products/".$unique_image;
	   $image = "themes/images/products/".$unique_image;
	   
	   if($file_name == ""){
	       if($productName == "" || $catId == "" || $subCatId == "" || $body == "" || $price == "" || $type == ""){
	          $msg = "<span class='error'>Field should not be empty !!</span>";
		      return $msg;
	       } else {
		      $query = "update tbl_product set productName = '$productName', catId = '$catId', subCatId = '$subCatId', body = '$body', price =                       '$price', type = '$type' where productId='$pid'";
		      $result = $this->db->update($query);
		      if($result != false){
		           $msg = "<span class='success'>Product Updated successfully !!</span>";
			       return $msg;
		      } else {
			       $msg = "<span class='error'>Product Not Updated !!</span>";
			       return $msg;
		      } 
	       }
	   } else {
	       if($productName == "" || $catId == "" || $subCatId == "" || $body == "" || $price == "" || $file_name == "" || $type == ""){
		      $msg = "<span class='error'>Field should not be empty !!</span>";
		      return $msg;
		   } else {
		      if($file_size>1048567){
   	             echo "<span class='error'>Image should be less than 1MB!!.</span>";
              } elseif(in_array($file_ext, $permited) === false){
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."!!.</span>";
              }
	          move_uploaded_file($file_temp, $uploade_image);
			  
			   $delquery   = "select * from tbl_product where productId = '$pid'";
	           $getData = $this->db->select($delquery);
	           if($getData){
		         while($delimg = $getData->fetch_assoc()){
		         $dellink = $delimg['image'];
		         unlink('../'.$dellink);
		         }
	           }
			  
		      $query = "update tbl_product set productName = '$productName', catId = '$catId', subCatId = '$subCatId', body = '$body', price =                       '$price', image = '$image', type = '$type' where productId='$pid'";
		      $result = $this->db->update($query);
		      if($result != false){
		           $msg = "<span class='success'>Product Updated successfully !!</span>";
			       return $msg;
		      } else {
			       $msg = "<span class='error'>Product Not Updated !!</span>";
			       return $msg;
		      } 
		   }
	   }
   }
   public function delProductById($delId){
       $delId = mysqli_real_escape_string($this->db->link, $delId);
	   
	   $query   = "select * from tbl_product where productId = '$delId'";
	   $getData = $this->db->select($query);
	   if($getData){
		   while($delimg = $getData->fetch_assoc()){
		   $dellink = $delimg['image'];
		   unlink('../'.$dellink);
		   }
	   }
	   
       $delquery = "delete from tbl_product where productId='$delId'";
	   $result = $this->db->delete($delquery);
	   if($result){
	       $msg = "<span class='success'>Product Deleted successfully !!</span>";
	       return $msg;
	   } else {
	       $msg = "<span class='error'>Product Not Deleted !!</span>";
		   return $msg;
	   }
	   
   }
   public function getFeatureProductByDesc(){
       $query  = "select * from tbl_product where type = '0' order by productId DESC limit 4";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getFeatureProductByAsc(){
       $query  = "select * from tbl_product where type = '0' order by productId ASC limit 4";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getLatestProductByDesc(){
       $query  = "select * from tbl_product where type = '1' order by productId DESC limit 6";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getDetailProductById($proid){
       $query = "select p.*, c.catName, sc.subCatName from tbl_product as p, tbl_category as c, tbl_subCategory as sc
	             where p.catId = c.catId and p.subCatId = sc.subCatId and p.productId = '$proid'";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getRelatedProductByDesc($subcatid){
       $subcatid = mysqli_real_escape_string($this->db->link, $subcatid);
       $query  = "select * from tbl_product where subCatId = '$subcatid' order by productId DESC limit 6";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getOfferProduct(){
       $query  = "select * from tbl_product where type = '2' order by productId DESC limit 9";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getAll($id){
       $id = mysqli_real_escape_string($this->db->link, $id);
       $query  = "select * from tbl_product where subCatId = '$id' order by productId DESC";
	   $result = $this->db->select($query);
	   return $result;
   }

}

?>