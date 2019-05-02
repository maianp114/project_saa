<?php include('h.php');?>
<form  name="register" action="product_type_add_db.php" method="POST" class="form-horizontal">
       <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="type_name" type="text" required class="form-control" id="type_name" placeholder="ประเภทสินค้า"   />
          </div>
      </div> 
      <div class="form-group">
          <div class="col-sm-6" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> เพิ่มประเภท  </button>
          </div>     
      </div>
      </form>