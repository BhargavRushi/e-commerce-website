<?php include "header.php";?>
        <div class = "container card col-lg-10 mt-5 ml-9 p-3 shadow">
          <h2 class = "mx-auto" id = "headstyle">Sign Up</h2>
          <p class = "text-center text-danger"><?php if(isset($msg)) echo $msg;?></p>
        </div>
        <div class = "container card col-lg-10 ml-9 p-3 shadow">
          <form method="POST" action="db.php">
            <div class = "row">
              <div class = "col-lg-5">
                <div class = "form-group row">
                  <label class = "col-lg-3">Name<span class = "text-danger">*</span></label>
                  <input type = "text" name = "name" class = "col-lg-8 form-control shadow" required = "required"/>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-3">Mobile<span class = "text-danger">*</span></label>
                  <input type = "text" name = "mobile" class = "col-lg-8 form-control shadow" required = "required"/>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-3">Email<span class = "text-danger">*</span></label>
                  <input type = "email" name = "email" class = "col-lg-8 form-control shadow" required = "required"/>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-3">Address</label>
                  <textarea type = "text" name = "address" class = "col-lg-8 form-control"></textarea>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-3">City/Town</label>
                  <input type = "text" name = "city" class = "col-lg-8 form-control shadow"/>
                </div>
              </div>
              <div class = "col-lg-5">
                <div class = "form-group row">
                  <label class = "col-lg-4">State</label>
                  <input type = "text" name = "state" class = "col-lg-8 form-control shadow"/>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-4">Pincode</label>
                  <input type = "text" name = "pincode" class = "col-lg-8 form-control shadow"/>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-4">Create Password<span class = "text-danger">*</span></label>
                  <input type = "password" name = "pass1" class = "col-lg-8 form-control shadow" required = "required"/>
                </div>
                <div class = "form-group row">
                  <label class = "col-lg-4">Confirm Password<span class = "text-danger">*</span></label>
                  <input type = "password" name = "pass2" class = "col-lg-8 form-control shadow" required = "required"/>
                </div>
              </div>
            </div>
            
            <button type = "reset" class = "btn btn-warning">Reset</button>
            <button type = "submit" name="Register" class = "btn btn-warning">SignUp</button>
          </form>        
        </div>
<?php include "footer.php";?>
