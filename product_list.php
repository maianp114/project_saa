<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
 <?php
      include('h.php');
                include('condb.php');
                $query = "SELECT * FROM ecu_product
                INNER JOIN ecu_product_type
                ON ecu_product.type_id = ecu_product_type.type_id
                 ORDER BY date_save ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                ?>                              
                <table class="table table-hover">
              <tr style ="background: linear-gradient(to right, #de6262, #ffb88c); color: #fff;">
              <th scope="col">รหัสสินค้า</th>
              <th scope="col">ชื่อสินค้า</th>
              <th scope="col">ประเภท</th>
              <th scope="col">ราคา</th>
              <th scope="col">รูปสินค้า</th>
              <th scope="col">วันที่</th>
              <th scope="col">แก้ไขข้อมูล</th>
              <th scope="col">แก้ไขรูปภาพ</th>
              <th scope="col">ลบสินค้า</th>
           </tr>  
                  <?php           
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["p_id"] .  "</td> ";
                    echo "<td>" .$row["p_name"] .  "</td> ";
                    echo "<td>" .$row["type_name"] .  "</td> ";                    
                    echo "<td>" .$row["p_price"] .  "</td> ";
					echo '<td><img src="/project_saa/img/'.$row["p_img"].'" width="50" heigth="50"/></td>';
					echo "<td>" .$row["date_save"] .  "</td> ";
                    echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn  btn-xs' style='background: #de6262;'><i class='fas fa-user-edit'></i> แก้ไข</a></td> ";
                    echo "<td><a href='product.php?act=editpic&ID=$row[0]' class='btn  btn-xs' style='background: #feb8b8;'><i class='fas fa-edit'></i>แก้ไขรูปภาพ</a></td> ";                    
                    echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn  btn-xs' style='background: #ffb88c;'><i class='far fa-trash-alt'></i> ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($con);
                ?>