<?php
      include('h.php');
	include('condb.php');
	
$order_no =	$_REQUEST["order_id"] ;	
   $sql = "SELECT * FROM ecu_order 
   INNER JOIN ecu_order_detail
   ON ecu_order.order_id = ecu_order_detail.order_id
   INNER JOIN ecu_product
   ON ecu_order_detail.p_id = ecu_product.p_id
   WHERE ecu_order.order_id LIKE '%".$order_no."%'
   ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC";

   $query = mysqli_query($con,$sql);

 echo ' <table class="table table-hover">';
 echo "
                      <tr bgcolor='#3498DB'>
                      <td>Order id</td>
                      <td>PRODUCT_ID</td>
                      <td>PRODUCT_NAME</td>					  
                      <td>PRODUCT_QTY</td>
                      <td>TOTAL</td>
                    </tr>";
					
while($row = mysqli_fetch_array($query)) {
                  echo "<tr>";
                    echo "<td>" .$row["order_id"] .  "</td> ";
                    echo "<td>" .$row["p_id"] .  "</td> ";
                    echo "<td>" .$row["p_name"] .  "</td> ";					
                    echo "<td>" .$row["p_qty"] .  "</td> ";
                    echo "<td>" .$row["total"] .  "</td> ";
}
mysqli_close($con);
?>