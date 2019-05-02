<?php include('h.php');?>
<form  name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">
       <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="c_user" type="text" required class="form-control" id="c_user" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div> 
        <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="c_pass" type="password" required class="form-control" id="c_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="c_name" type="text" required class="form-control" id="c_name" placeholder="ชื่อ-สกุล " />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="c_email" type="email" class="form-control" id="c_email"   placeholder=" อีเมล์ name@hotmail.com"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
            <input  name="c_tel" type="text" class="form-control" id="c_tel"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6" align="left">
           <select class="form-control form-control-sm" name="c_lvl">
  			<option value="a">Admin </option>
            <option value="m">Member </option>
			</select>
          </div>
        </div>        
        <div class="form-group">
          <div class="col-sm-6" align="left">
            <textarea name="c_address" class="form-control" id="c_address" required></textarea> 
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-6" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> สมัครสมาชิก  </button>
          </div>     
      </div>
      </form>