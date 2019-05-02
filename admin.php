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
            <div class="col-md-6">
		<a href="admin.php?act=add" button type="button" class="btn btn-danger">เพิ่ม </button> </a>
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