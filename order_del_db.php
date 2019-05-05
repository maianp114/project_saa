<meta charset="UTF-8">
<?php
include('condb.php');
$c_id = $_REQUEST["order_id"];
$sql = "DELETE FROM ecu_order WHERE order_id='$c_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$sql2 = "DELETE FROM ecu_order_detail WHERE order_id='$c_id' ";
$result = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
  
if($result || $result2){
    echo "<script type='text/javascript'>";
    echo "window.location = 'show_order_detail.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to delete again');";
    echo "</script>";
  }

?>