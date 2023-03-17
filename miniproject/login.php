<?php include "header.php";?>
        <div class = "container card col-lg-6 mt-5 ml-9 p-3 shadow">
          <center><h2 id = "headstyle">Login</h2></center>
          <p class = "text-center text-danger"><?php if(isset($msg)) echo $msg;?></p>
        </div>
        <div class = "container card col-lg-6 ml-9 p-3 shadow" id = "login">
          <form action="db.php" method="POST">
            <div class = "form-group">
              <label>Email<span class = "text-danger">*</span></label>
              <input type = "email" name = "email" class = "form-control shadow" required/>
            </div>
            <div class = "form-group">
              <label>Password<span class = "text-danger">*</span></label>
              <input type = "password" name = "password" class = "form-control shadow" required/>
            </div>
            <button type = "reset" name="reset"  class = "btn btn-warning" >Reset</button>
            <button type = "submit" name="login" class = "btn btn-warning"  >Login</button>       
          </form>
        </div>
<?php include "footer.php";?>