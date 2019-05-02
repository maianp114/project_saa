<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$p_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM ecu_product WHERE p_id='$p_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<form  name="register" action="add_stock_db.php" method="POST" class="form-horizontal">
<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
       <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="p_name" type="text"  required class="form-control" id="p_name" value="<?php echo $p_name; ?>"  />
          </div>
      </div> 
      <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="quan" type="text"  required class="form-control" id="quan" value="<?php echo $quantity; ?>" />
          </div>
      </div>      
      <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="add_quantity" type="text" required class="form-control" id="add_quantity"  />
          </div>
      </div>      
      <div class="form-group">
          <div class="col-sm-6" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> บันทึก </button>
          </div>     
      </div>
      </form>