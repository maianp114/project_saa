

<?php include('condb.php');
      include('h.php');
	  
   $order_no =	$_REQUEST["order_id"] ;	
   $sql = "SELECT * FROM ecu_order 
   INNER JOIN ecu_order_detail
   ON ecu_order.order_id = ecu_order_detail.order_id
   INNER JOIN ecu_product
   ON ecu_order_detail.p_id = ecu_product.p_id
   WHERE ecu_order.order_id LIKE '%".$order_no."%'
   ORDER BY ecu_order.order_id ASC , ecu_order_detail.p_id ASC";

   $query = mysqli_query($con,$sql);
	$objResult = mysqli_fetch_array($query,MYSQLI_ASSOC);	
?>

<div class="container">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-5" style="background-color:#f4f4f4">
      <h3 align="center" style="color:green">
      <span class="glyphicon glyphicon-shopping-cart"> </span>
         payment </h3>
      <form  name="formlogin" action="payment_db.php" method="POST" id="login" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-12">
          <p> เลขที่ order </p>
            <input type="text"  name="order_id" class="form-control" id="order_id" value="<?php echo $objResult["order_id"] ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          <p> ชื่อผู้โอน </p>
            <input type="text"  name="p_name" class="form-control" id="p_name" required placeholder="ชื่อ-นามสกุล" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          <p> ยอดเงินที่โอน </p>
            <input type="text"  name="money" class="form-control" id="money"  required placeholder="ยอดเงิน" />
          </div>
        </div>
        
		<div class="radio">
 		 <label><input type="radio" name="optradio" value="kbank" checked> 
	       <img src="img/logo.png" width="30" height="30" >  กสิกรไทย ชื่อ อนุพงศ์ เกาะน้ำใส เลขที่บัญชี 067-292701-3</label>
		</div>
		<div class="radio">
  		<label><input type="radio" name="optradio" value="promtpay">  <img src="img/promtpay.png" width="30" height="30"> พร้อมเพย์ ชื่อ อนุพงศ์ เกาะน้ำใส เลขที่บัญชี 092-720-9955</label>
		</div>
    <div class="form-group">
           <div class="col-sm-12 ">
    <p> วันและเวลาที่โอน </p>
    <input id="input" width="234" name='input'/>
    <script>
        $('#input').datetimepicker({
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
    </script>
          </div>
        </div> 
        <div class="form-group">
           <div class="col-sm-10 ">
            <p> ภาพหลักฐานการโอนเงิน </p>
            <input type="file" name="p_img" class="form-control" />
          </div>
        </div>   
            
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <button type="submit" class="btn btn-primary" id="btn">
             ยืนยันสั่งซื้อ </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<?php
mysqli_close($con);
?>