<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 <?php
      include('h.php');
                include('condb.php');
                $query = "SELECT * FROM ecu_product ORDER BY p_id ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                ?>
                <table class="table table-hover">
              <tr style =" background: linear-gradient(to right, #f12711, #f5af19); color: #fff;">
              <th scope="col">รหัสสินค้า</th>
              <th scope="col">ชื่อสินค้า</th>
              <th scope="col">สินค้าคงเหลือ</th>
              <th scope="col">เพิ่มจำนวนสินค้า</th>
           </tr>  
                  <?php
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["p_id"] .  "</td> ";
                    echo "<td>" .$row["p_name"] .  "</td> ";
                    echo "<td>" .$row["quantity"] .  "</td> ";
                    echo "<td><a href='stock.php?act=add&ID=$row[0]' class='btn  btn-xs'style='background: #FFA500	;'><i class='fas fa-plus'></i> เพิ่มจำนวนสินค้า</a></td> ";                    
                   echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($con);
                ?>