<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$type_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM ecu_product_type WHERE type_id='$type_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<form  name="register" action="product_type_edit_db.php" method="POST" class="form-horizontal">
<input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
       <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="type_name" type="text" required class="form-control" id="type_name" value="<?php echo $type_name; ?>" placeholder="ชื่อประเภท"   />
          </div>
      </div> 
      <div class="form-group">
          <div class="col-sm-6" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> บันทึก </button>
          </div>     
      </div>
      </form>