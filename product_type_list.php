<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 <?php
      include('h.php');
                include('condb.php');
                $query = "SELECT * FROM ecu_product_type ORDER BY type_id ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                ?>
                <table class="table table-hover">
              <tr style ="background: linear-gradient(to right, #ff4e50, #f9d423);color: #fff;">
              <th scope="col">รหัสประเภทสินค้า</th>
              <th scope="col">ชื่อประเภทสินค้า</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
           </tr>  
                <?php
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["type_id"] .  "</td> ";
                    echo "<td>" .$row["type_name"] .  "</td> ";
                    echo "<td><a href='product_type.php?act=edit&ID=$row[0]' class='btn  btn-xs'style='background: #FF9900;'><i class='fas fa-user-edit'></i> แก้ไข</a></td> ";                    
                    echo "<td><a href='product_type_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn  btn-xs'style='background: #FFCC33	;'><i class='far fa-trash-alt'></i> ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($con);
                ?>  