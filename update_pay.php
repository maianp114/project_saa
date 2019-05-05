<!DOCTYPE html>
<html>
<head>

<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );?>
<head>
  <body>
    <div class="container">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
      <div class="col-md-3">

        <?php include('menu_left.php');?>
       
      </div>
            <div class="col-md-9">
            <p align='center'>ตรวจสอบออเดอร์</p>
        <p></p>
		<?php
			$act = $_GET['act'];
			if($act == 'add'){
			include('add_product.php');
			}elseif ($act == 'check') {
			include('check_payment.php');
      }
			else {
			include('update_pay_list.php');
			}	
			?>
        
       
      </div>
    </div>
  </div>
  </body>
</html>