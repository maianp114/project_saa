<?php 
require_once('condb.php');
$order_no =	6;	

$sql4 = "SELECT * FROM product       
            INNER JOIN order_detail
            ON product.p_id = order_detail.p_id ";
$resultttt = mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error($con));

while($row = mysqli_fetch_array($resultttt)) {
 $total = $row['quantity'] - $row['p_qty'];
 echo $total,"<br>" ;
// $sql3 = "UPDATE tbl_product SET  
// quantity = '$total'
// WHERE order_id = '$order_no' ";
// $resulttt = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error($con));
}
mysqli_close($con);
?>