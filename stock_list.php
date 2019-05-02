 <?php
      include('h.php');

                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM ecu_product ORDER BY p_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#3498DB'>
                      <td>id</td>
                      <td>name</td>
                      <td>Quantity</td>                      
					  <td>edit</td>				  

                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["p_id"] .  "</td> ";
                    echo "<td>" .$row["p_name"] .  "</td> ";
                    echo "<td>" .$row["quantity"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='stock.php?act=add&ID=$row[0]' class='btn btn-warning btn-xs'>เพิ่มจำนวนสินค้า</a></td> ";                    
                   echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>