  <!--start menu -->
  <?php
  session_start();
	$ccon = "SELECT * FROM ecu_member WHERE c_id = '".@$_SESSION['UserID']."'";
	$objQuery = mysqli_query($con,$ccon);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>  ECU SHOP</title>
    <div class="navbar navbar-default" role="navigation">
  <div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="" href="main.php"><img src="https://www.ecu-shop.com/wp-content/uploads/2019/02/ecu-logo-alt.png" style=" max-height: 50px; "></a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="test2.php"><i class="fas fa-home"></i> หน้าหลัก</a></li>
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
    </div>
  </div>
</div>
