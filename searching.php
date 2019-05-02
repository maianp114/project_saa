<html>
<head>
<title></title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>

<?php

	include('condb.php');
	
   $sql = "SELECT * FROM order 
   INNER JOIN order_detail
   ON order.order_id = order_detail.order_id
   INNER JOIN product
   ON order_detail.p_id = product.p_id
   WHERE order.order_id LIKE '%".$strKeyword."%' 
   ORDER BY order.order_id ASC , order_detail.p_id ASC";

   $query = mysqli_query($con,$sql);

?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">Order_ID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="98"> <div align="center">Address </div></th>    
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">Phone </div></th>
    <th width="97"> <div align="center">pid </div></th>
    <th width="97"> <div align="center">pname </div></th>
    <th width="97"> <div align="center">pqty </div></th>
    <th width="97"> <div align="center">total</div></th>               
    <th width="59"> <div align="center">Order_date </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["order_id"];?></div></td>
    <td><?php echo $result["name"];?></td>
    <td><?php echo $result["address"];?></td>
    <td><div align="center"><?php echo $result["email"];?></div></td>
    <td align="right"><?php echo $result["phone"];?></td>
     <td align="right"><?php echo $result["p_id"];?></td>  
     <td align="right"><?php echo $result["p_name"];?></td>  
     <td align="right"><?php echo $result["p_qty"];?></td>
      <td align="right"><?php echo $result["total"];?></td>              
    <td align="right"><?php echo $result["order_date"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($con);
?>
</body>
</html>