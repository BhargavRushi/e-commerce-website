<?php
$id = $_SESSION['id'];
$sql = "select * from users where uid = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res); 
$role = $_SESSION['rid'];
if($role == 1)
{
	include 'adminheader.php';
}
else if($role == 2)
{
	include 'userheader.php';
}
?>
		<form action = "db.php" method = "POST" class = "text-info">
			<h4 class = "text-center font-weight-normal">Change Password</h4>
			<p class = "text-center text-danger"><?php if(isset($msg)) echo $msg;?></p>
			<div class = "form group row mt-3">
				<div class = "col-lg-4">
					<label>old password</label>
				</div>
				<div class = "col-lg-8">
					<input type = "password" class = "form-control" name = 'oldpassword' required = "required"/>
				</div>
			</div><br>
			<div class = "form group row mt-3">
				<div class = "col-lg-4">
					<label>new password</label>
				</div>
				<div class = "col-lg-8">
					<input type = "password" class = "form-control" name = 'new_password1' required = "required"/>
				</div>
			</div><br>
			<div class = "form group row mt-3">
				<div class = "col-lg-4">
					<label>confirm new password</label>
				</div>
				<div class = "col-lg-8">
					<input type = "password" class = "form-control" name = 'new_password2' required = "required"/>
				</div>
			</div>
			<button class = "btn button btn button-info" name = "updatepassword" type = "submit">Change password</button>
			<a href = "db.php?back" class = "btn button btn button-danger">cancel</a>
		</form>
	</div>
</div>
</div>
</div>
