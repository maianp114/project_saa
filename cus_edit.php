
<?php

include('condb.php');  

$c_id =  $_REQUEST["UserID"];

$sql = "SELECT * FROM ecu_member WHERE c_id='$c_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<form  name="register" action="cus_edit_db.php" method="POST" class="form-horizontal">
<input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
       <div class="form-group">
          <div class="col-sm-6" align="left">
          <lable class="form-group"> Username </lable>
            <input  name="c_user" type="text" required class="form-control" id="c_user" value="<?php echo $c_user; ?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div> 
        <div class="form-group">
          <div class="col-sm-6" align="left">
          <lable class="form-group"> Password </lable>
            <input  name="c_pass" type="password" required class="form-control" id="c_pass" value="<?php echo $c_pass; ?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
          <lable class="form-group"> ชื่อ - นามสกุล </lable>
            <input  name="c_name" type="text" required class="form-control" id="c_name" value="<?php echo $c_name; ?>" placeholder="ชื่อ-สกุล " />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
          <lable class="form-group"> อีเมล์ </lable>
            <input  name="c_email" type="email" class="form-control" id="c_email" value="<?php echo $c_email; ?>"  placeholder=" อีเมล์ name@hotmail.com"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
          <lable class="form-group"> เบอร์โทร </lable>
            <input  name="c_tel" type="text" class="form-control" id="c_tel" value="<?php echo $c_tel; ?>"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
          <lable class="form-group"> ที่อยู่ </lable>
            <textarea name="c_address" class="form-control"  id="c_address" required><?php echo $c_address; ?></textarea> 
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-6" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> บันทึก </button>
          </div>     
      </div>
      </form>