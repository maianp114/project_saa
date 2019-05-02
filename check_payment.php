 <?php
      include('h.php');

                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $order_id = $_REQUEST["ID"];
                $query = "SELECT * FROM ecu_payment  WHERE order_id = $order_id ORDER BY pay_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                $objResult = mysqli_fetch_array($result);
                extract($objResult);
                ?>
              <div class="row">
              <div class="col-6">
                <form  name="register" action="" method="POST" class="form-horizontal">
                <input type="hidden" name="pay_id" value="<?php echo $pay_id; ?>">
                
                       <div class="form-group" >
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> รหัสการสั่งซื้อ </lable>
                            <input  name="order_id" type="text" required class="form-control"  id="order_id"  value="<?php echo $order_id; ?>"   />
                          </div>
                      </div> 
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> ชื่อผู้โอน </lable>
                            <input  name="pay_name" type="text" required class="form-control" id="pay_name" disabled value="<?php echo $pay_name; ?>"  />
                          </div>
                        </div>
                
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> ยอดเงินโอน </lable>
                            <input  name="email" type="email" class="form-control" id="email" disabled value="<?php echo $pay_total; ?>"  />
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> ธนาคารที่โอน </lable>
                            <input  name="pay_bank" type="text" class="form-control" id="pay_bank" disabled value="<?php echo $pay_bank; ?>"  />
                          </div>
                        </div>
                                              
                        <div class="form-group">
                          <div class="col-sm-12" align="left">
                          <lable class="form-group"> วันที่โอน </lable>
                            <input  name="date_save" type="text" class="form-control" id="date_save" disabled value="<?php echo $date_save; ?>"  />
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-6">
                      <img src="/project_saa/img/payment/<?php echo $pay_img; ?>" width="275" heigth="275" style=" margin: 25px 0 0 0; "><br>
                    </div>
                </div>
<?php
                    //แก้ไขข้อมูล
                    echo "<td><a href='update_payment_status.php?order_no=$objResult[1]' class='btn btn-warning btn-xs' align='center' >แก้ไขสถานะ</a></td> ";                    
                  
            
                //5. close connection
                mysqli_close($con);
                ?>