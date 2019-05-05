<?php
	session_start();
include('condb.php');

	$ccon = "SELECT * FROM ecu_member WHERE c_user = '".mysqli_real_escape_string($con,$_POST['txtUsername'])."' 
	and c_pass = '".mysqli_real_escape_string($con,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($con,$ccon);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
		echo "<script type='text/javascript'>";
		echo  "alert('Username and Password Incorrect');";
		echo "window.location='login.php';";
		echo "</script>";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["c_id"];
			$_SESSION["Status"] = $objResult["c_level"];

			session_write_close();
			
			if($objResult["c_level"] == "a")
			{
				header("location:index.php");
			}
			else
			{
				header("location:test2.php");
			}
	}
	mysqli_close($con);
?>