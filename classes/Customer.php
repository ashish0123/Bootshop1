<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php');
?> 
<?php

class Customer{
   private $db;
   private $fm;
   
   public function __construct(){
      $this->db = new Database();
	  $this->fm = new Format();
   }
   public function customerRegistration($data){
      $title    = $this->fm->validation($data['title']);
	  $fname    = $this->fm->validation($data['fname']);
	  $lname    = $this->fm->validation($data['lname']);
	  $email    = $this->fm->validation($data['email']);
	  $password = $this->fm->validation($data['password']);
	  $dob      = $this->fm->validation($data['dob']);
	  $address1 = $this->fm->validation($data['address1']);
	  $address2 = $this->fm->validation($data['address2']);
	  $city     = $this->fm->validation($data['city']);
	  $state    = $this->fm->validation($data['state']);
	  $pin      = $this->fm->validation($data['pin']);
	  $country  = $this->fm->validation($data['country']);
	  $phone    = $this->fm->validation($data['phone']);
	 	  
	  $title    = mysqli_real_escape_string($this->db->link, $data['title']);
	  $fname    = mysqli_real_escape_string($this->db->link, $data['fname']);
	  $lname    = mysqli_real_escape_string($this->db->link, $data['lname']);
	  $email    = mysqli_real_escape_string($this->db->link, $data['email']);
	  $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
	  $dob      = mysqli_real_escape_string($this->db->link, $data['dob']);
	  $address1 = mysqli_real_escape_string($this->db->link, $data['address1']);
	  $address2 = mysqli_real_escape_string($this->db->link, $data['address2']);
	  $city     = mysqli_real_escape_string($this->db->link, $data['city']);
	  $state    = mysqli_real_escape_string($this->db->link, $data['state']);
	  $pin      = mysqli_real_escape_string($this->db->link, $data['pin']);
	  $country  = mysqli_real_escape_string($this->db->link, $data['country']);
	  $phone    = mysqli_real_escape_string($this->db->link, $data['phone']);
	  
	  if($title == "" || $fname == "" || $lname == "" || $email == "" || $password == "" || $dob == "" || $address1 == "" || $address2 == "" || $city          == "" || $state == "" || $pin == "" || $country == "" || $phone == ""){
	      $msg = "<strong>Field </strong> should not be empty !!";
		  return $msg;
	  } 
	  
	  $chkquery = "select * from tbl_customer where email = '$email' limit 1";
	  $result = $this->db->select($chkquery);
	  if($result != false){
	      $msg = "<strong>Email</strong> already Exist !";
		  return $msg;
	  } else {
	  $query = "insert into tbl_customer(title, fname, lname, email, password, dob, address1, address2, city, state, pin, country, phone) 
		values('$title', '$fname', '$lname', '$email', '$password', '$dob','$address1', '$address2', '$city', '$state', '$pin', '$country', '$phone')";
	  $result = $this->db->insert($query);
		    if($result != false){
			    echo "<script>window.location = 'login.php?msg=success';</script>";
		    } else {
			    $msg = "<span class='error'>Registration is not successful !!</span>";
			    return $msg;
		   }
      }
   }
   public function customerLogin($data){
      $email    = $this->fm->validation($data['email']);
	  $password = $this->fm->validation($data['password']);
	  
	  $email    = mysqli_real_escape_string($this->db->link, $data['email']);
	  $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
	  
	  if($email == "" || $password == ""){
	      $msg = "<strong>Field </strong> should not be empty !!";
		  return $msg;
	  }
	  
	  $query = "select * from tbl_customer where email = '$email' and password = '$password'";
	  $result = $this->db->select($query);
	  if($result == false){
				$msg = "<strong>Email or Password</strong> does not match !!";
				return $msg;
	  } else {
			 if($result != false){
				$value = $result->fetch_assoc();
				Session::set('custlogin', true);
				Session::set('custId', $value['id']);
				Session::set('custName', $value['fname']);
				echo "<script>window.location = 'product_summary.php';</script>";
			 } else {
				$msg = "<span class='error'>Login failed, try again !!</span>";
				return $msg;
			 }
	  }
   }
   public function getCustomerData($id){
	  $query = "select * from tbl_customer where id = ".$id;
	  $result = $this->db->select($query);
	  return $result;
   }
   public function customerUpdate($data, $id){
      $title    = $this->fm->validation($data['title']);
	  $fname    = $this->fm->validation($data['fname']);
	  $lname    = $this->fm->validation($data['lname']);
	  $email    = $this->fm->validation($data['email']);
	  $dob      = $this->fm->validation($data['dob']);
	  $address1 = $this->fm->validation($data['address1']);
	  $address2 = $this->fm->validation($data['address2']);
	  $city     = $this->fm->validation($data['city']);
	  $state    = $this->fm->validation($data['state']);
	  $pin      = $this->fm->validation($data['pin']);
	  $country  = $this->fm->validation($data['country']);
	  $phone    = $this->fm->validation($data['phone']);
	 	  
	  $title    = mysqli_real_escape_string($this->db->link, $data['title']);
	  $fname    = mysqli_real_escape_string($this->db->link, $data['fname']);
	  $lname    = mysqli_real_escape_string($this->db->link, $data['lname']);
	  $email    = mysqli_real_escape_string($this->db->link, $data['email']);
	  $dob      = mysqli_real_escape_string($this->db->link, $data['dob']);
	  $address1 = mysqli_real_escape_string($this->db->link, $data['address1']);
	  $address2 = mysqli_real_escape_string($this->db->link, $data['address2']);
	  $city     = mysqli_real_escape_string($this->db->link, $data['city']);
	  $state    = mysqli_real_escape_string($this->db->link, $data['state']);
	  $pin      = mysqli_real_escape_string($this->db->link, $data['pin']);
	  $country  = mysqli_real_escape_string($this->db->link, $data['country']);
	  $phone    = mysqli_real_escape_string($this->db->link, $data['phone']);
	  
	  if($title == "" || $fname == "" || $lname == "" || $email == "" || $dob == "" || $address1 == "" || $address2 == "" || $city == "" || $state == "" || $pin == "" || $country == "" || $phone == ""){
	      $msg = "<strong>Field </strong> should not be empty !!";
		  return $msg;
	  } else {
	  
	  $query = "update  tbl_customer set
	                 title    = '".$title."',
					 fname    = '".$fname."',
					 lname    = '".$lname."',
					 email    = '".$email."',
					 dob      = '".$dob."',
					 address1 = '".$address1."',
					 address2 = '".$address2."',
					 city     = '".$city."',
					 state    = '".$state."',
					 pin      = '".$pin."',
					 country  = '".$country."',
					 phone    = '".$phone."' where id = ".$id;
	  $result = $this->db->update($query);
		    if($result != false){
			    echo "<script>window.location = 'profile.php?update=success';</script>";
		    } else {
			    $msg = "<span class='error'>Profile Not Updated !!</span>";
			    return $msg;
		   }
	  }
   }
   public function changeCustPass($oldpass, $newpass, $repass, $id){
      $id       = $this->fm->validation($id);
	  $oldpass  = $this->fm->validation($oldpass);
	  $newpass  = $this->fm->validation($newpass);
	  $repass   = $this->fm->validation($repass);
	  
	  if($id == "" || $oldpass == "" || $newpass == "" || $repass == ""){
	      $msg = "<strong>Field </strong> should not be empty !!";
		  return $msg;
	  }
	  elseif($newpass != $repass){
	      $msg = "<strong>New Password and Re-Type password</strong> do not matching !!";
		  return $msg;
	  }
	  
	  $id       = mysqli_real_escape_string($this->db->link, $id);
	  $oldpass  = mysqli_real_escape_string($this->db->link, md5($oldpass));
	  $newpass  = mysqli_real_escape_string($this->db->link, md5($newpass));
	  $repass   = mysqli_real_escape_string($this->db->link, md5($repass));
	  
	  $query = "select * from tbl_customer where id = '".$id."' and password ='".$oldpass."'";
	  $result = $this->db->select($query);
	  if($result == false){
			$msg = "<strong>Your Old Password</strong> does not match with Database, Please type correct Password !!";
			return $msg;
	  } else {
	        $query = "update  tbl_customer set password = '".$newpass."' where id =".$id;
	         $result = $this->db->update($query);
		    if($result != false){
			    echo "<script>window.location = 'profile.php?passChange=success';</script>";
		    } else {
			    $msg = "<span class='error'>Password Not Updated !!</span>";
			    return $msg;
		    }       
	  }
   }
   
}

?>