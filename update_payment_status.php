<?php 
require_once('condb.php');
$order_no =	$_REQUEST["order_no"] ;	
            $status = 'ชำระเงินแล้ว';
            $sql2 = "UPDATE ecu_order SET  
         order_status = '$status'
        WHERE order_id = '$order_no' ";
$resultt = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error($con));

            $sql4 = "SELECT * FROM ecu_product       
            INNER JOIN ecu_order_detail
            ON ecu_product.p_id = ecu_order_detail.p_id ";
$resultttt = mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error($con));

while($row = mysqli_fetch_array($resultttt)) {
 $total = $row['quantity'] - $row['p_qty'];

$sql3 = "UPDATE ecu_product SET  
quantity = '$total'
WHERE p_id = '".$row['p_id']."' ";
$resulttt = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error($con));
}
mysqli_close($con);



if($resultt){
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfuly');";
        echo "window.location = 'order.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "</script>";
      }
?>