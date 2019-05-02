<!DOCTYPE html>
<html lang="en">
  <head>
<?php include('bootstrap_h.php');
include('condb.php');?>
  <title>ECU SHOP</title>
</head>
  <body>


      <?php include('menu.php');?>
       <!-- close container-->
<div class="container">
<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">

      <div class="row">
  <div class="col-sm-3">
   <?php include('menu_left2.php');?>
  </div>
 
  <div class="col-sm-9">
  
  <?php 
include('condb.php');
$type_id = $_REQUEST["ID"];
   $sql = "SELECT * FROM ecu_product 
   INNER JOIN ecu_product_type
   ON ecu_product.type_id = ecu_product_type.type_id
   WHERE ecu_product.type_id LIKE '%".$type_id."%' 
   ORDER BY ecu_product.p_id ASC";

   $query = mysqli_query($con,$sql);
   while($list = mysqli_fetch_array($query)){

      echo"<div class='col-xs-12 col-sm-6 col-md-3'>
      <img src='img/$list[p_img]'  width='180'   style='padding-bottom:10px'/>";
  
      echo"ชื่อสินค้า $list[p_name]"; 
      echo"<br>";
      echo"<font color='#0000FF'> ราคา ",number_format($list['p_price'],2)," บาท";
      echo"</font>";
     echo" <p>";

echo"<a href='product_detail.php?p_id=$list[p_id]' class='btn btn-info btn-xs'> รายละเอียด </a>";
echo"&nbsp";
 if($objResult["c_level"] != "m"){ 
   echo"<a href='login.php'  class='btn btn-success btn-xs'> สั่งซื้อ </a>"; 
    } else{
      echo"<a href='cart.php?p_id=$list[p_id]&act=add'  class='btn btn-success btn-xs'> สั่งซื้อ </a>"; 
    }
   
echo"</p>";
echo" <br/><br/>";
      echo"</div>";

                   }
mysqli_close($con);

?>
  
  </div>
</div>
      </div>
    </div>
  </div>


<?php include('script.php');?> 
<!-- start footer-->
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <?php include('footer.php');?>
    </div>
  </div>
</div>
<!-- end footer-->