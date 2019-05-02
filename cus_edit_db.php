<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $c_id = $_REQUEST["c_id"];
  $c_user = $_REQUEST["c_user"];
  $c_pass = $_REQUEST["c_pass"];
  $c_name = $_REQUEST["c_name"];
  $c_email = $_REQUEST["c_email"];
  $c_tel = $_REQUEST["c_tel"];
  $c_address = $_REQUEST["c_address"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE ecu_member SET  
      c_user='$c_user', 
      c_pass='$c_pass', 
      c_name='$c_name',
      c_email='$c_email',
      c_tel='$c_tel', 
      c_address='$c_address' 
      WHERE c_id='$c_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update Succesfuly');";
  echo "window.location = 'test2.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>