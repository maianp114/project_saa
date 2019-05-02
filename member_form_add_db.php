<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $c_user = $_REQUEST["c_user"];
  $c_pass = $_REQUEST["c_pass"];
  $c_name = $_REQUEST["c_name"];
  $c_email = $_REQUEST["c_email"];
  $c_tel = $_REQUEST["c_tel"];
  $c_lvl = $_REQUEST["c_lvl"];
  $c_address = $_REQUEST["c_address"];
  //เพิ่มเข้าไปในฐานข้อมูล
  $sql = "INSERT INTO ecu_member(c_user, c_pass, c_name, c_email, c_tel,c_level, c_address)
       VALUES('$c_user', '$c_pass', '$c_name', '$c_email', '$c_tel','$c_lvl', '$c_address')";

  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
  
  //ปิดการเชื่อมต่อ database
  mysqli_close($con);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Register Succesfuly');";
  echo "window.location = 'member.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>