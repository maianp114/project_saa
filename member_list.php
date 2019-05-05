<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<?php
      include('h.php');
                include('condb.php');  
                $query = "SELECT * FROM ecu_member WHERE c_level = 'm' ORDER BY c_id ASC" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                ?>
                <table class="table table-hover">   
          <tr style =" background: linear-gradient(to right, #dd5e89, #f7bb97); color: #fff;">
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Telephone</th>
              <th scope="col">Address</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
           </tr>
                <?php
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                    echo "<td>" .$row["c_id"] .  "</td> ";
                    echo "<td>" .$row["c_user"] .  "</td> ";
                    echo "<td>" .$row["c_pass"] .  "</td> ";
                    echo "<td>" .$row["c_name"] .  "</td> ";
                     echo "<td>" .$row["c_email"] .  "</td> ";
					 echo "<td>" .$row["c_tel"] .  "</td> ";
                      echo "<td>" .$row["c_address"] .  "</td> ";
                    echo "<td><a href='member.php?act=edit&ID=$row[0]' class='btn  btn-xs'style='background: #F08080;'> <i class='fas fa-user-edit'></i> แก้ไข</a></td> ";  
                    echo "<td><a href='member_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn  btn-xs' style='background: #FFCC99;'><i class='far fa-trash-alt'></i> ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                mysqli_close($con);
                ?>