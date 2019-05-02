<meta charset="UTF-8" />
<?php 
require_once('condb.php');

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$order_id = $_POST['order_id'];
	$p_name = $_POST['p_name'];
    $money = $_POST['money'];
    $optradio = $_POST['optradio'];
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$input = $_POST['input'];
		
	$upload=$_FILES['p_img'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/payment/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['p_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;
	$path_link="img/payment".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
		
	
	}


			 $sql = "INSERT INTO ecu_payment 
					(order_id, 
					pay_name, 
					pay_total,
                    pay_bank, 
					pay_img,
					date_save) 
					VALUES
					('$order_id',
					'$p_name',
					'$money',
                    '$optradio',
					'$newname',
					'$input')";
            $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
            $status = 'รอตรวจสอบ';
                   $sql2 = "UPDATE ecu_order SET  
                order_status='$status'
       WHERE order_id='$order_id' ";

$resultt = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error($con));
    mysqli_close($con);




	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มสินค้าเรียบร้อย');";
			echo "window.location='show_order_detail.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='show_order_detail.php';";
			echo "</script>";
      }
     

	
 ?>
