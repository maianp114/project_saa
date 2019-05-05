<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();   
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php include("condb.php");
include("menu.php");?>

<div class="container">
	<div class="row">
    	<div class="col-md-2"></div>
        <div class="col-md-8">

  <p><a href="cart.php">กลับหน้าตะกร้าสินค้า</a> &nbsp; 
  <table width="700" border="1" align="center" class="table">
    <tr>
      <td width="1558" colspan="5" align="center">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr class="success">
    <td align="center">ลำดับ</td>
      <td align="center">สินค้า</td>
      <td align="center">ราคา</td>
      <td align="center">จำนวน</td>
      <td align="center">รวม/รายการ</td>
    </tr>
<?php
	require_once('condb.php');
	$total=0;
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	{
		$sql = "select * from ecu_product where p_id=$p_id";
		$query = mysqli_query($con, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['p_price']*$p_qty;
    $total	+= $sum;
    $net = $total*0.93;
    $vat = $total*0.07;
    echo "<tr>";
	echo "<td align='center'>";
	echo  $i += 1;
	echo "</td>";
    echo "<td>" . $row["p_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
    echo "<td align='right'>$p_qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='4'><b>ราคาสุทธิ</b></td>";
    echo "<td align='right'>"."<b>".number_format($net,2)."</b>"."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td  align='right' colspan='4'><b>ภาษี 7%</b></td>";
    echo "<td align='right'>"."<b>".number_format($vat,2)."</b>"."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td  align='right' colspan='4'><b>รวม</b></td>";
    echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>
</table>

		</div>
	</div>
</div>
    <?php
	session_start();
	include("condb.php");
	$ccon = "SELECT * FROM ecu_member WHERE c_id = '".$_SESSION['UserID']."'";
	$objQuery = mysqli_query($con,$ccon);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	?>
<div class="container">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-5" style="background-color:#f4f4f4">
      <h3 align="center" style="color:green">
      <span class="glyphicon glyphicon-shopping-cart"> </span>
         confirm cart </h3>
      <form  name="formlogin" action="saveorder.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="name" class="form-control" id="c_name" value="<?php echo $objResult["c_name"] ?>" required placeholder="ชื่อ-สกุล" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <textarea name="address" class="form-control"  rows="3" id="c_address"  required placeholder="ที่อยู่ในการส่งสินค้า"><?php echo $objResult["c_address"] ?></textarea> 
          </div>
 
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="phone" class="form-control" id="c_tel" value="<?php echo $objResult["c_tel"] ?>" required placeholder="เบอร์โทรศัพท์" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="email"  name="email" class="form-control" id="c_email" value="<?php echo $objResult["c_email"] ?>" required placeholder="อีเมล์" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <button type="submit" class="btn btn-primary" id="btn">
             ยืนยันสั่งซื้อ </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>
<?php include('script.php');?> 