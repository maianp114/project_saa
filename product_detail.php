
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <?php include('bootstrap_h.php');?>

  </head>
  <body>


         <?php include('condb.php');?>
        <?php include('menu.php');?>
        <?php 
		
		$p_id = $_REQUEST["p_id"];
			
    $sql = "SELECT * FROM ecu_product WHERE p_id='$p_id' ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    extract($row);

?>
<!-- start show product detail -->
<div class="container">
  <div class="row" align="">
  <h3 align="center"> แสดงรายละเอียดสินค้า </h3>
    <div class="col-xs-12 col-sm-4 col-md-5">
      <!-- show product img -->
    <img src="img/<?php echo $row['p_img']; ?>" width="100%"> </div>
    
    <div class="col-xs-12 col-sm-8 col-md-7 bgdetail">
    ชื่อสินค้า : <?php echo $row['p_name']; ?>
    ราคา : <?php echo $row['p_price']; ?> บาท <br/>
   
    <?php
	if($objResult["c_level"] == "m"){
	echo "<a href='cart.php?p_id=$row[p_id]&act=add'><span class='glyphicon glyphicon-shopping-cart'> </span> เพิ่มลงตะกร้าสินค้า </a>"; }?>
    
    รายละเอียด : <?php print $row['p_detail']; ?> <br/>
    
    
      <!-- show product detail -->
    </div>

    
  </div>
</div>
<!-- end show product detail -->


<!-- start footer-->
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <?php include('footer.php');?>
    </div>
  </div>
</div>
<!-- end footer-->

<?php include('script.php');?>

</body>
</html>