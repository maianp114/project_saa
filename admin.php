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
            <p align='center'>จัดการผู้ดูแลระบบ</p>
		<a href="admin.php?act=add" button type="button" class="btn btn-danger"><i class="fas fa-user-plus"></i> เพิ่ม </button> </a>
    <p></p>
		<?php
			$act = $_GET['act'];
			if($act == 'add'){
			include('admin_form_add.php');
			}elseif ($act == 'edit') {
			include('admin_form_edit.php');
			}
			else {
			include('admin_list.php');
			}	
			?>
      
       
      </div>
    </div>
  </div>
  </body>
</html>