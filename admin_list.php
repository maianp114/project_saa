 <?php
      include('h.php');
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM ecu_member WHERE c_level = 'a' ORDER BY c_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table class="table table-hover">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>ID</td>
                      <td>User</td>
                      <td>Pass</td>
                      <td>Name</td>
                      <td>Email</td>
					  <td>Tel</td>
                      <td>Address</td>
                      <td>Edit</td>
                      <td>Delete</td>                 
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["c_id"] .  "</td> ";
                    echo "<td>" .$row["c_user"] .  "</td> ";
                    echo "<td>" .$row["c_pass"] .  "</td> ";
                    echo "<td>" .$row["c_name"] .  "</td> ";
                     echo "<td>" .$row["c_email"] .  "</td> ";
					 echo "<td>" .$row["c_tel"] .  "</td> ";
                      echo "<td>" .$row["c_address"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<td><a href='admin.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
                    //ลบข้อมูล
                    echo "<td><a href='admin_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>