 <?php
      include('h.php');

                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM ecu_product
                INNER JOIN ecu_product_type
                ON ecu_product.type_id = ecu_product_type.type_id
                 ORDER BY date_save ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr bgcolor='#3498DB' class='tablem1'>
                      <td>id</td>
                      <td>name</td>
                      <td>detail</td>
                      <td>type</td>                      
                      <td>price</td>
                      <td>img</td>
                      <td>datesave</td>
					            <td>edit</td>
					            <td>edit picture</td>					  
                      <td>delete</td>
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["p_id"] .  "</td> ";
                    echo "<td>" .$row["p_name"] .  "</td> ";
                    echo "<td>" .$row["p_detail"] .  "</td> ";
                    echo "<td>" .$row["type_name"] .  "</td> ";                    
                    echo "<td>" .$row["p_price"] .  "</td> ";
					echo '<td><img src="/project_saa/img/'.$row["p_img"].'" width="50" heigth="50"/></td>';
					echo "<td>" .$row["date_save"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btnm1 btn-xs'>แก้ไข</a></td> ";
                    echo "<td><a href='product.php?act=editpic&ID=$row[0]' class='btn btnm2 btn-xs'>แก้ไขรูปภาพ</a></td> ";                    
                    //ลบข้อมูล
                    echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>