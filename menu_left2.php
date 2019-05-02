<title>ECU SHOP</title>
<div class="list-group">
  <a href="test2.php" class="list-group-item ">
    สินค้าทั้งหมด
  </a>
  <?php
                include('condb.php');

                $query = mysqli_query($con, "SELECT * FROM ecu_product_type ORDER BY type_id") or die(mysqli_error($con));
                    while($list = mysqli_fetch_array($query)){
                      $query2 = mysqli_query($con, "SELECT  COUNT(p_id) AS count_type FROM ecu_product WHERE type_id = $list[type_id]  ") or die(mysqli_error($con));
                      while($list2 = mysqli_fetch_array($query2)){
                      echo "<a href='showproduct_type.php?ID=$list[type_id]' class='list-group-item '> $list[type_name]
                       <span class='badge badge-primary'>$list2[count_type]</span> </a> "; 
                               }}
                mysqli_close($con);
                ?>


</div>