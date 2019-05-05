<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
            <p align='center'>จัดการประเภทสินค้า</p>
		<a href="product_type.php?act=add" button type="button" class="btn btn-danger"><i class="fas fa-plus"></i> เพิ่ม </button> </a>
        <p></p>
		<?php
			$act = $_GET['act'];
			if($act == 'add'){
			include('product_type_add.php');
			}elseif ($act == 'edit') {
			include('product_type_edit.php');
			}			
			else {
			include('product_type_list.php');
			}	
			?>
        
       
      </div>
    </div>
  </div>
  </body>
</html>