  <!--start menu -->
  
  <?php
  include('bootstrap_h.php');
  include('condb.php');
	session_start();
	$ccon = "SELECT * FROM ecu_member WHERE c_id = '".$_SESSION['UserID']."'";
	$objQuery = mysqli_query($con,$ccon);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	?>
    <div class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">ECU SHOP</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="c_index.php">หน้าหลัก</a></li>
      <li><a href="#">วิธีซื้อสินค้า</a></li>
      <?php
       if($objResult["c_level"] == "m") { echo"
      <li><a href='show_order_detail.php'>ตรวจสอบออเดอร์</a></li>
      <li><a href='cus_edit.php?UserID=$objResult[c_id]'>แก้ไขข้อมูลส่วนตัว</a></li>   " ;} ?> 
    </ul>
    
 
    <ul class="nav navbar-nav navbar-right">
    <?php if($objResult["c_level"] == "m") { echo '<li><a href="">',$objResult["c_name"],"</a></li>", 
	'<li><a href="logout.php">Logout</a></li>'; } else { ?>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
      <?php } ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</div>
<!--end menu-->
<?php include('script.php');?> 