<html>
<head>
<title></title>
</head>
<body>
<?php
	
	include('condb.php');
	$p_id = $_REQUEST["ID"];
	$strSQL = "SELECT * FROM ecu_product WHERE  p_id='$p_id' ";
	$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysqli_fetch_array($objQuery);
?>
	<form name="form1" method="post" action="product_pic_edit_db.php" enctype="multipart/form-data">
	Edit Picture :<br>
    <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
	Name : <input type="text" disabled name="txtName" value="<?php echo $objResult["p_name"];?>"><br><br>
	<img src="/project_saa/img//<?php echo $objResult["p_img"];?>" width="300" height="300"><br><br>
	Picture : <input type="file" name="filUpload"><br><br>
	<input type="hidden" name="p_img" value="<?php echo $objResult["p_img"];?>">
	<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>