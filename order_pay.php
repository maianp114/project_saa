<?php
include('bootstrap_h.php');
include('condb.php');
include('bg2.php');
include('menu.php');

?>
  <div class="container" style="margin-top:80px;">
         <div class="col-sm-12">
   <table width="100%" border="1" align="center" class="table table-bordered">
        <tbody bgcolor="#fff">
        <tr>
          <td height="40" colspan="7" align="center" bgcolor="#CCCCCC"><strong>เช็คอเดอร์ของฉัน !</strong></td>
        </tr>
        
    <?php 
    $c_id = $_SESSION["UserID"];
   $sql = "SELECT  * FROM ecu_order  
   INNER JOIN ecu_order_detail
   ON ecu_order.order_id = ecu_order_detail.order_id
   INNER JOIN ecu_product
   ON ecu_order_detail.p_id = ecu_product.p_id
   WHERE ecu_order.order_status = 'รอการชำระเงิน'
   GROUP BY ecu_order.order_id 
   ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC";;
   
   $query = mysqli_query($con,$sql);
   


  
 

  echo ' <table class="table table-hover">';
 echo "
                      <tr bgcolor='#3498DB'>
                      <td>รหัสการสั่งซื้อ</td>
                      <td>ชื่อที่สั่ง</td>
                      <td>จำนวนชิ้น</td>
                      <td>ราคารวม</td>	
                      <td>สถานะ</td>	
                      <td>วันที่สั่งซื้อ</td>		
                      <td>ชำระเงิน</td>					  				  				  
                    </tr>";
  

while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{ 		 
$order_no=$result["order_id"];
$sql2 = "SELECT  COUNT(order_id) AS 'count_order' ,SUM(p_qty) AS 'sum_qty' , SUM(total) AS 'sum_order' 
   FROM ecu_order_detail GROUP BY order_id HAVING order_id=$order_no";  
   $query2 = mysqli_query($con , $sql2);
	 while($data=mysqli_fetch_array($query2,MYSQLI_ASSOC)){
    $num=$data["count_order"];
    $totalprice=$data["sum_order"];
    $sum_qty=$data["sum_qty"];

    $sql3 = "SELECT * FROM ecu_order 
    INNER JOIN ecu_order_detail
    ON ecu_order.order_id = ecu_order_detail.order_id
    INNER JOIN ecu_product
    ON ecu_order_detail.p_id = ecu_product.p_id
    WHERE ecu_order.order_id LIKE '%".$order_no."%'
    ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC";
 
    $query3 = mysqli_query($con,$sql3);
    }  
                  echo "<tr bgcolor='#fff'>";
                    echo "<td>" .$result["order_id"] .  "</td> ";
                    echo "<td>" .$result["name"] .  "</td> ";
                    echo "<td>" .$sum_qty ."</td> ";
                    echo "<td>" .$totalprice ."</td> ";
                    echo "<td>" .$result["order_status"] .  "</td> ";
                    echo "<td>" .$result["order_date"] .  "</td> ";	
                    echo "<td><a href='payment.php?order_id=$order_no' class='btn btn-warning btn-sm'>ชำระเงิน</a></td> ";										
 
                    echo "</tr>";
}
                echo "</table>";




mysqli_close($con);
?>
<?php include('script.php');?> 
</html>