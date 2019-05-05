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
  $order_no =	$_REQUEST["order_id"] ;	

    
      $sql2 = "SELECT * FROM ecu_order 
      INNER JOIN ecu_order_detail
      ON ecu_order.order_id = ecu_order_detail.order_id
      INNER JOIN ecu_product
      ON ecu_order_detail.p_id = ecu_product.p_id
      WHERE ecu_order.order_id LIKE '%".$order_no."%'
      ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC"
      ;
  $query2 =mysqli_query($con, $sql2);
  $row2 = mysqli_fetch_array($query2);
?>

<div class="container">
	<div class="row">
    	<div class="col-md-2">
      
      
      </div>
        <div class="col-md-8">


  <table width="700" border="1" align="center" class="table">
  <tr>
    <td width="1558" colspan="5" align="center">
     ชื่อ : <?php echo $row2['name']; ?> &nbsp;&nbsp;&nbsp;
    ที่อยู่ : <?php echo $row2['address']; ?></td> <br>
    
    </tr>
    <tr>
    <td width="1558" colspan="5" align="center">
     อีเมลล์ : <?php echo $row2['email']; ?> &nbsp;&nbsp;&nbsp;
    เบอร์โทรศัพท์ : <?php echo $row2['phone']; ?>&nbsp;&nbsp;&nbsp;
    วันที่สั่งซื้อ: <?php echo $row2['order_date']; ?>&nbsp;&nbsp;&nbsp;
    </tr>
    <tr>
      <td width="1558" colspan="5" align="center">
      <strong>รายละเอียดการสั่งซื้อ</strong></td>
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
    $order_no =	$_REQUEST["order_id"] ;	
	
      
        $sql = "SELECT * FROM ecu_order 
        INNER JOIN ecu_order_detail
        ON ecu_order.order_id = ecu_order_detail.order_id
        INNER JOIN ecu_product
        ON ecu_order_detail.p_id = ecu_product.p_id
        WHERE ecu_order.order_id LIKE '%".$order_no."%'
        ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC"
        ;
		$query =mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($query)) {
		$sum	= $row['p_price']*$row['p_qty'];
    $total	+= $sum;
    $total	+= $sum;
    $net = $total*0.93;
    $vat = $total*0.07;
    echo "<tr>";
	echo "<td align='center'>";
	echo  $i += 1;
	echo "</td>";
    echo "<td>" . $row["p_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
    echo "<td align='right'>" .$row["p_qty"] ."</td>";
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

</body>
</html>