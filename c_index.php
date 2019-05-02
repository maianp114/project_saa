<!DOCTYPE html>
<html lang="en">
  <head>
<?php include('bootstrap_h.php');
include('condb.php');?>

</head>
  <body>

  <?php include('menu.php');?>

<!-- start show product -->

    <div class="container">
<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">

      <div class="row">
  <div class="col-sm-3">
   <?php include('menu_left2.php');?>
  </div>
 
  <div class="col-sm-9">
  
  <?php include('showproduct_index.php');?>
  
  </div>
</div>
      </div>
    </div>
  </div>

<!-- end show product -->


<!-- start footer-->
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
<?php include('footer.php');?> 
    </div>
  </div>
</div>
<!-- end footer-->

<?php include('script.php');?> 
