<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php');
?> 
<?php

class SubCategory{
   private $db;
   private $fm;
   
   public function __construct(){
      $this->db = new Database();
	  $this->fm = new Format();
   }
   
   public function insertSubCat($catNameId, $subCatName){
      $catNameId = $this->fm->validation($catNameId);
	  $subCatName = $this->fm->validation($subCatName);
	  $subCatName = $this->fm->stringtoupper($subCatName);
	  	  
	  $catNameId = mysqli_real_escape_string($this->db->link, $catNameId);
	  $subCatName = mysqli_real_escape_string($this->db->link, $subCatName);
	 	  
	  if(empty($catNameId) || empty($subCatName)){
	      $msg = "<span class='error'>Field should not be empty !!</span>";
		  return $msg;
	  } else {
	      $query  = "insert into tbl_subcategory(catNameId, subCatName) values('$catNameId', '$subCatName')";
		  $result = $this->db->insert($query);
		  if($result != false){
		      $msg = "<span class='success'>Sub Category Inserted successfully !!</span>";
			  return $msg;
		  } else {
			  $msg = "<span class='error'>Sub Category Not Inserted !!</span>";
			  return $msg;
		  } 
		  
	  }
   }
   public function getSubCat(){
       $query = "select * from tbl_subcategory order by subCatId DESC";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getAllSubCat(){
       $query = "select tbl_subcategory.*, tbl_category.catName from tbl_subcategory inner join tbl_category on tbl_subcategory.catNameId=tbl_category.catId order by catId DESC";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function getSubCatByIdData($subcatid){
       $subcatid = mysqli_real_escape_string($this->db->link, $subcatid);
       $query = "select * from tbl_subcategory where subCatId='$subcatid'";
	   $result = $this->db->select($query);
	   return $result;
   }
   public function updateSubCat($subCatId, $catNameId, $subCatName){
       $subCatName = $this->fm->validation($subCatName);
	   $subCatName = $this->fm->stringtoupper($subCatName);
	   
       $subCatId = mysqli_real_escape_string($this->db->link, $subCatId);
	   $catNameId = mysqli_real_escape_string($this->db->link, $catNameId);
	   $subCatName = mysqli_real_escape_string($this->db->link, $subCatName);
	   
	   if(empty($subCatId) || empty($catNameId) || empty($subCatName)){
	       $msg = "<span class='error'>Field should not be empty !!</span>"; 
		   return $msg;
	   } else {
       $query = "update tbl_subcategory set catNameId = '$catNameId', subCatName = '$subCatName' where subCatId='$subCatId'";
	   $result = $this->db->update($query);
	      if($result){
		    $msg = "<span class='success'>Sub Category Updated successfully !!</span>";
	        return $msg;
		  } else {
		    $msg = "<span class='error'>Sub Category Not Updated !!</span>";
			return $msg;
		  }
	   }
   }
   public function delSubCatById($delid){
       $delid = mysqli_real_escape_string($this->db->link, $delid);
       $query = "delete from tbl_subcategory where subCatId='$delid'";
	   $result = $this->db->delete($query);
	   if($result){
	       $msg = "<span class='success'>Sub Category Deleted successfully !!</span>";
	       return $msg;
	   } else {
	       $msg = "<span class='error'>Sub Category Not Deleted !!</span>";
		   return $msg;
	   }
	   
   }

}

?>