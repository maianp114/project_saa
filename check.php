 <?php
      include('h.php');

                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $order_id = $_REQUEST["ID"];
                $query = "SELECT * FROM ecu_payment  WHERE order_id = $order_id ORDER BY pay_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                $objResult = mysqli_fetch_array($result);
                extract($objResult);
                ?>
              <div class="row">
              <div class="col-6">
                <form  name="register" action="" method="POST" class="form-horizontal">
                <input type="hidden" name="pay_id" value="<?php echo $pay_id; ?>">
                
                       <div class="form-group" >
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> รหัสการสั่งซื้อ </lable>
                            <input  name="order_id" type="text" required class="form-control"  id="order_id"  value="<?php echo $order_id; ?>"   />
                          </div>
                      </div> 
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> ชื่อผู้โอน </lable>
                            <input  name="pay_name" type="text" required class="form-control" id="pay_name" disabled value="<?php echo $pay_name; ?>"  />
                          </div>
                        </div>
                
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> ยอดเงินโอน </lable>
                            <input  name="email" type="email" class="form-control" id="email" disabled value="<?php echo $pay_total; ?>"  />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> ธนาคารที่โอน </lable>
                            <input  name="pay_bank" type="text" class="form-control" id="pay_bank" disabled value="<?php echo $pay_bank; ?>"  />
                          </div>
                        </div>
                                              
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> วันที่โอน </lable>
                            <input  name="date_save" type="text" class="form-control" id="date_save" disabled value="<?php echo $date_save; ?>"  />
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-6">
                      <img src="/project_saa/img/payment/<?php echo $pay_img; ?>" width="275" heigth="275" style=" margin: 25px 0 0 0; "><br>
                    </div>
                </div>
                <?php

include('condb.php');
$order_id = $_REQUEST["ID"];
      $sql2 = "SELECT * FROM ecu_order 
   INNER JOIN ecu_order_detail
   ON ecu_order.order_id = ecu_order_detail.order_id
   INNER JOIN ecu_product
   ON ecu_order_detail.p_id = ecu_product.p_id
   WHERE ecu_order.order_id LIKE '%".$order_id."%' 
   ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC";

   $query = mysqli_query($con,$sql2);

?>
<table width="600" border="1">
  <tr>


    <th width="97"> <div align="center">รหัสสินค้า</div></th>
    <th width="97"> <div align="center">ชื่อสินค้า</div></th>
    <th width="97"> <div align="center">ราคาสินค้า</div></th>
    <th width="97"> <div align="center">จำนวนสินค้า</div></th>
    <th width="97"> <div align="center">ราคารวมสินค้า</div></th>               

  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
  $sum	= $result['total'];
  $total	+= $sum;
  $net = $total*0.93;
  $vat = $total*0.07;
?>
  <tr>

     <td align="right"><?php echo $result["p_id"];?></td>  
     <td align="right"><?php echo $result["p_name"];?></td>  
     <td align="right"><?php echo $result["p_price"];?></td>  
     <td align="right"><?php echo $result["p_qty"];?></td>
      <td align="right"><?php echo $result["total"];?></td>              

  </tr>
<?php
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
<?php
                mysqli_close($con);
                ?>