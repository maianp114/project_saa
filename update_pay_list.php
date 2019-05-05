<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
 <?php
      include('h.php');
                include('condb.php');
                $query = "SELECT * FROM ecu_order WHERE order_status = 'รอตรวจสอบ' ORDER BY order_date ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                ?>
                <table class="table table-hover">
              <tr style =" background: linear-gradient(to right, #ff4e50, #f9d423); color: #fff;">
              <th scope="col">Order_id</th>
              <th scope="col">รหัสลูกค้า</th>
              <th scope="col">ชื่อลูกค้า</th>
              <th scope="col">เบอร์โทรศัพท์</th>
              <th scope="col">สถานะ</th>
              <th scope="col">วันที่สั่งซื้อ</th>
              <th scope="col">ตรวจสอบการชำระเงิน</th>
           </tr>                 
                    <?php
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["order_id"] .  "</td> ";
                    echo "<td>" .$row["c_id"] .  "</td> ";                    
                    echo "<td>" .$row["name"] .  "</td> ";
                    echo "<td>" .$row["phone"] .  "</td> ";
                    echo "<td>" .$row["order_status"] .  "</td> ";
					echo "<td>" .$row["order_date"] .  "</td> ";                                 
                    echo "<td><a href='update_pay.php?act=check&ID=$row[0]' class='btn  btn-xs'style='background: #ff4e50	;'><i class='fas fa-money-check-alt'></i> ตรวจสอบการชำระเงิน</a></td> "; 
                  echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($con);
                ?>