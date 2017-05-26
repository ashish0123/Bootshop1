<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php');
?>  
<?php

class Category{
   private $db;
   private $fm;
   
   public function __construct(){
      $this->db = new Database();
	  $this->fm = new Format();
   }
   
   public function insertCat($catName){
      $catName = $this->fm->validation($catName);
	  $catName = $this->fm->stringtoupper($catName);
	  	  
	  $catName = mysqli_real_escape_string($this->db->link, $catName);
	 	  
	  if(empty($catName)){
	      $msg = "<span class='error'>Category field should not be empty !!</span>";
		  return $msg;
	  } else {
	      $query  = "insert into tbl_category(catName) values('$catName')";
		  $result = $this->db->insert($query);
		  if($result != false){
		      $msg = "<span class='success'>Category Inserted successfully !!</span>";
			  return $msg;
		  } else {
			  $msg = "<span class='error'>Category Not Inserted !!</span>";
			  return $msg;
		  } 
		  
	  }
   }
   public function getAllCat(){
       $query = "select * from tbl_category order by catId ASC";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getAllSubCat($catId){
       $query = "select * from tbl_subcategory where catNameId = '$catId' order by subCatId ASC";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getCatByIdData($catid){
       $catid = mysqli_real_escape_string($this->db->link, $catid);
       $query = "select * from tbl_category where catId='$catid'";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function updateCat($catId, $catName){
       $catName = $this->fm->validation($catName);
	   $catName = $this->fm->stringtoupper($catName);
       $catId = mysqli_real_escape_string($this->db->link, $catId);
	   $catName = mysqli_real_escape_string($this->db->link, $catName);
	   if(empty($catName)){
	       $msg = "<span class='error'>Field should not be empty !!</span>"; 
		   return $msg;
	   } else {
       $query = "update tbl_category set catName = '$catName' where catId='$catId'";
	   $result = $this->db->update($query);
	      if($result){
		    $msg = "<span class='success'>Category Updated successfully !!</span>";
	        return $msg;
		  } else {
		    $msg = "<span class='error'>Category Not Updated !!</span>";
			return $msg;
		  }
	   }
   }
   public function delCatById($delId){
       $delId = mysqli_real_escape_string($this->db->link, $delId);
	   $query = "select catNameId from tbl_subcategory where catNameId = '$delId'";
	   $result = $this->db->select($query);
	   if($result){
		    $msg = "<span class='error'>First you need to delete sub category which is releted to this category !!</span>";
	        return $msg;
	   } else {
		    $query = "delete from tbl_category where CatId='$delId'";
	        $result = $this->db->delete($query);
			if($result){  
		    $msg = "<span class='success'>Category Deleted Successfully !!</span>";
			return $msg;
			} else {
			$msg = "<span class='error'>Category Not Deleted Successfully !!</span>";
			return $msg;
			}
	   }
   }

}

?>