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
		<a href="add_product.php?act=add" button type="button" class="btn btn-danger">เพิ่ม </button> </a>
        <p></p>
		<?php
			$act = $_GET['act'];
			if($act == 'add'){
			include('add_product.php');
			}elseif ($act == 'edit') {
			include('product_form_edit.php');
			}elseif ($act == 'editpic') {
			include('product_pic_form_edit.php');
			}
			
			else {
			include('product_list.php');
			}	
			?>
        
       
      </div>
    </div>
  </div>
  </body>
</html>