<?php
include('inc/header.php');
?>
<?php
    $login = Session::get('custlogin');
	   if($login == false){
	     echo "<script>window.location = 'login.php';</script>";
	   }
?>
<style>
.payment{ width:70%; min-height:450px; text-align:center; border:1px solid #CCCCCC; margin:0 auto;}
.payment h2{ border:1px solid #CCCCCC; margin-bottom:140px; padding-bottom:10px;}
.payment a{ background:#0099FF none repeat scroll 0 0; border-radius:5px 2px; letter-spacing:2px; margin:20px; text-decoration:none; color:#FFFFFF; font-size:34px; padding: 10px 35px;}
.bactocart{ text-align:center; margin-top:25px;}
.bactocart a{background:#0033FF none repeat scroll 0 0; border-radius:3px 2px; letter-spacing:1px; text-decoration:none; color:#FFFFFF; font-size:20px; padding: 10px 20px;}
</style>
<div style="width:60%; margin:0 auto;">		
   <div class="payment">
     <h2>Choose payment Option</h2>
	 <a href="offlinepayment.php">Offline</a>
	 <a href="onlinepayment.php">Online</a>
   </div>
   <div class="bactocart">
     <a href="product_summary.php">Back to Cart</a>
   </div>
</div>
<?php
include('inc/footer.php');
?>