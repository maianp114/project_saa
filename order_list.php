 <?php
      include('h.php');

                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM ecu_order ORDER BY order_date ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#3498DB'>
                      <td>order_id</td>
                      <td>c_id</td>                      
                      <td>name</td>
                      <td>phone</td>
                      <td>order_status</td>
                      <td>order_date</td>
					  <td align = 'center' > edit </td>
					  <td align = 'center'> edit picture </td>					  
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["order_id"] .  "</td> ";
                    echo "<td>" .$row["c_id"] .  "</td> ";                    
                    echo "<td>" .$row["name"] .  "</td> ";
                    echo "<td>" .$row["phone"] .  "</td> ";
                    echo "<td>" .$row["order_status"] .  "</td> ";
					echo "<td>" .$row["order_date"] .  "</td> ";
                    //แก้ไขข้อมูล
                    if($row["order_status"] == "ชำระเงินแล้ว"){ 
                    echo "<td><a href='order.php?act=checko&ID=$row[0]' class='btn btn-warning btn-xs'>ตรวจสอบ</a></td> ";
                    }elseif($row["order_status"] == "รอตรวจสอบ"){ 
                    echo "<td><a href='order.php?act=check&ID=$row[0]' class='btn btn-warning btn-xs'>ตรวจสอบ</a></td> ";                                   
                    echo "<td><a href='order.php?act=checkp&ID=$row[0]' class='btn btn-warning btn-xs'>ตรวจสอบการชำระเงิน</a></td> "; 
                    }else{
                      echo "<td><a href='order.php?act=check&ID=$row[0]' class='btn btn-warning btn-xs'>ตรวจสอบ</a></td> ";
                    }
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>